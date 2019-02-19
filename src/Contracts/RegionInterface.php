<?php
namespace Rainsens\QMap\Contracts;

interface RegionInterface
{
	/**
	 * @return array
	 */
	public function list(): array;
	
	/**
	 * @param string $id
	 * @return array
	 */
	public function children(string $id = null): array;
	
	/**
	 * @param string $keywords
	 * @return array
	 */
	public function search(string $keywords = null): array;
}
