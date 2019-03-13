<?php

namespace ApuRed\ GenerarFormulario;

use Illuminate\ Support\ ServiceProvider;

class GenerarFormularioServiceProvider extends ServiceProvider {
	/**
	 * Register services.
	 *
	 * @return void
	 */
	public
	function register() {
		/*$this->loadRoutesFrom( __DIR__ . '/routes.php' );
		$this->app->make( 'FaredCesar\GenerarFormulario\Controllers\MainController' );
		$this->app['Formgenerator'] = $this->app->share(function($app)
		{
			return new Formgenerator($app['form']);
		});*/
		$this->registerGenerarFormulario();
		$this->app->alias('GenerarFormulario', GenerarFormulario::class);
	}
	protected function registerGenerarFormulario()
    {
        $this->app->singleton('GenerarFormulario', function ($app) {
            return new GenerarFormulario($app['html'], $app['url'], $app['view'], $app['session.store']->token() ,$app['request']);
        });
    }
	/**
	 * Bootstrap services.
	 *
	 * @return void
	 */
	public
	function boot() {
		//
	}
	public function provides()
	{
		return [GenerarFormulario::class];
	}
}