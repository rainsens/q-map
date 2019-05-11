<?php
namespace Rainsens\QMap\Components;

use Rainsens\QMap\Exceptions\HttpException;
use Rainsens\QMap\Contracts\GeoCoderInterface;
use Rainsens\Map\Exceptions\InvalidArgumentException;

class GeoCoder extends Base implements GeoCoderInterface
{
	/**
	 * @var string
	 */
	protected $url = 'https://apis.map.qq.com/ws/geocoder/v1';
	
	/**
	 * GeoCoder constructor.
	 * @param string $key
	 */
	public function __construct(string $key)
	{
		$this->key = $key;
	}
	
	/**
	 * @param string $address
	 * @param string $format
	 * @return array
	 * @throws HttpException
	 */
	public function get(string $address, string $format = 'json'): array
	{
		if (!in_array(strtolower($format), ['xml', 'json'])) {
			throw new InvalidArgumentException('Invalid response format: '.$format);
		}
		
		$query = array_filter([
			'key'       => $this->key,
			'address'   => $address,
			'output'    => strtolower($format),
		]);
		
		try {
			$response = $this->getHttpClient()->get($this->url, ['query' => $query])->getBody()->getContents();
			return $format === 'json' ? json_decode($response, true) : $response;
		} catch (\Exception $exception) {
			throw new HttpException($exception->getMessage(), $exception->getCode(), $exception);
		}
	}
}
