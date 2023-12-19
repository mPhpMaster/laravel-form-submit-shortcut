<?php
/** @noinspection PhpIllegalPsrClassPathInspection */

/*
 * Copyright © 2023. mPhpMaster(https://github.com/mPhpMaster) All rights reserved.
 */

namespace MPhpMaster\LaravelFormSubmitShortcut\Providers;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Schema\Builder;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

/**
 * Class HelperProvider
 *
 * @package MPhpMaster\LaravelFormSubmitShortcut\Providers
 */
class HelperProvider extends ServiceProvider
{
	public function register()
	{
		$this->registerMacros();

		if($this->app->runningInConsole()) {
			$this->publishes([
				__DIR__.'/../../config/' => config_path(),
			], 'form-submit-shortcut-config');

			$this->publishes([
				__DIR__.'/../../resources/js' => public_path('js'),
			], 'form-submit-shortcut-js');

		}

		$this->mergeConfigFrom(__DIR__.'/../../config/form_submit_shortcut.php', 'form_submit_shortcut');
	}

	/**
	 *
	 */
	public function registerMacros()
	{

	}

	/**
	 * Bootstrap services.
	 *
	 * @param Router $router
	 *
	 * @return void
	 */
	public function boot(Router $router)
	{
		// Builder::defaultStringLength(191);
		// Schema::defaultStringLength(191);

		if(class_exists(\Laravel\Nova\Nova::class)) {
			// loading custom files
			\Laravel\Nova\Nova::serving(
				function(\Laravel\Nova\Events\ServingNova $event) {
					\Laravel\Nova\Nova::provideToScript(
						[
							'formSubmitShortcut' => (array) config('form_submit_shortcut'),
						],
					);

					$jsPath = public_path('js/formSubmitShortcut.js');
					$jsPath = file_exists($jsPath) ? $jsPath : __DIR__.'/../../resources/js/formSubmitShortcut.js';
					\Laravel\Nova\Nova::script('formSubmitShortcut', $jsPath);
				},
			);
		}

	}

	/**
	 * @return array
	 */
	public function provides()
	{
		return [];
	}
}
