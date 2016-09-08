<?php
namespace tectiv3\Phumbor;

use Config;
use Illuminate\Support\ServiceProvider;

class PhumborServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot() {
		$this->publishes([
			__DIR__.'/../../config/config.php' => config_path('phumbor.php'),
		]);
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register() {
		$this->app['phumbor'] = $this->app->share(function($app) {
			return \Thumbor\Url\BuilderFactory::construct(Config::get('phumbor.server'), Config::get('phumbor.key'));
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides() {
		return [];
	}

}