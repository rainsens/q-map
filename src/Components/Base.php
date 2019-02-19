<?php
namespace Rainsens\QMap\Components;

use GuzzleHttp\Client;

abstract class Base
{
	/**
	 * Map Key
	 * @var
	 */
	protected $key;
	
	/**
	 * Default url:GET
	 * @var
	 */
	protected $url;
	
	/**
	 * @var array
	 */
	protected $guzzleOptions = [];
	
	/**
	 * @param array $options
	 */
	public function setGuzzleOptions(array $options)
	{
		$this->guzzleOptions = $options;
	}
	
	/**
	 * @return Client
	 */
	public function getHttpClient()
	{
		return new Client($this->guzzleOptions);
	}
}
