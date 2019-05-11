<?php
namespace Rainsens\QMap\Contracts;

interface GeoCoderInterface
{
	/**
	 * Get a geo code for giving address.
	 *
	 * @param string $address
	 * @param string $format
	 * @return array
	 */
	public function get(string $address, string $format = 'json') : array ;
}
