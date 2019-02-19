<?php
namespace Rainsens\QMap;

use Rainsens\QMap\Components\Region;

class QMap
{
	const VERSION = '0.0.2';
	
	/**
	 * @var string
	 */
	protected $key;
	
	/**
	 * Map constructor.
	 * @param string $key
	 */
	public function __construct(string $key)
	{
		$this->key = $key;
	}
	
	/**
	 * @return Region
	 */
	public function region()
    {
    	return new Region($this->key);
	}
}
