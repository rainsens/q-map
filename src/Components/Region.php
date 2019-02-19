<?php
namespace Rainsens\QMap\Components;

use Rainsens\QMap\Contracts\RegionInterface;
use Rainsens\QMap\Exceptions\HttpException;

class Region extends Base implements RegionInterface
{
	/**
	 * GET
	 * @var string
	 */
	private $listUrl = 'https://apis.map.qq.com/ws/district/v1/list';
	/**
	 * GET
	 * @var string
	 */
	private $childrenUrl = 'https://apis.map.qq.com/ws/district/v1/getchildren';
	/**
	 * GET
	 * @var string
	 */
	private $searchUrl = 'https://apis.map.qq.com/ws/district/v1/search';
	
	/**
	 * Region constructor.
	 * @param string $key
	 */
	public function __construct(string $key)
	{
		$this->key = $key;
	}
	
	/**
	 * Get all regions.
	 * @return array
	 * @throws HttpException
	 */
	public function list(): array
	{
		try {
			$response = $this->getHttpClient()->get($this->listUrl, ['query' => ['key' => $this->key]])->getBody()->getContents();
			return json_decode($response, true);
		} catch (\Exception $e) {
			throw new HttpException($e->getMessage(), $e->getCode(), $e);
		}
	}
	
	/**
	 * Gets children regions
	 * @param string $id
	 * @return array
	 * @throws HttpException
	 */
	public function children(string $id = ''): array
	{
		$query = ['key' => $this->key, 'id' => $id];
		try {
			$response = $this->getHttpClient()->get($this->childrenUrl, ['query' => $query])->getBody()->getContents();
			return json_decode($response, true);
		} catch (\Exception $e) {
			throw new HttpException($e->getMessage(), $e->getCode(), $e);
		}
	}
	
	/**
	 * Searches certain region
	 * @param string $keywords
	 * @return array
	 * @throws HttpException
	 */
	public function search(string $keywords = ''): array
	{
		$query = explode(',', $keywords);
		$query['key'] = $this->key;
		try {
			$response = $this->getHttpClient()->get($this->searchUrl, ['query' => $query])->getBody()->getContents();
			return json_decode($response, true);
		} catch (\Exception $e) {
			throw new HttpException($e->getMessage(), $e->getCode(), $e);
		}
	}
}
