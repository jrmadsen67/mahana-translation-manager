<?php namespace Jrmadsen67\MahanaTranslationManager;

use Illuminate\Support\ServiceProvider;

class MahanaTranslationManagerServiceProvider extends ServiceProvider {

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
	public function boot()
	{
		$this->package('jrmadsen67/mahana-translation-manager');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind('Jrmadsen67\MahanaTranslationManager\repositories\TranslationManagerRepositoryInterface', 
			'Jrmadsen67\MahanaTranslationManager\repositories\TranslationManagerEloquentRepository');

	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('mahana-translation-manager');
	}

}
