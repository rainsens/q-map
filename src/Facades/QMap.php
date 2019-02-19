<?php
namespace Rainsens\QMap\Facades;

use Illuminate\Support\Facades\Facade;

class QMap extends Facade
{
	protected static function getFacadeAccessor()
	{
		return 'q_map';
	}
}
