<?php namespace Mattbrown\Laracurl\Facades;

use Illuminate\Support\Facades\Facade;

class Laracurl extends Facade {

	/**
	 * Get the registered name of the component
	 *
	 * @return string
	 */
	protected static function getFacadeAccessor() { return 'laracurl'; }
}