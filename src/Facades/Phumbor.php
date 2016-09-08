<?php
namespace tectiv3\Phumbor\Facades;

use Illuminate\Support\Facades\Facade;

class Phumbor extends Facade {

	protected static function getFacadeAccessor() {
		return 'phumbor';
	}
}