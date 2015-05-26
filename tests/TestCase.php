<?php

class TestCase extends Illuminate\Foundation\Testing\TestCase {

	public function setUp()
	{
	    parent::setUp();
	
	    Artisan::call('migrate');
	    Artisan::call('db:seed');
	    Mail::pretend(true);		
	}
	
	/**
	 * Creates the application.
	 *
	 * @return \Illuminate\Foundation\Application
	 */
	public function createApplication()
	{
		$app = require __DIR__.'/../bootstrap/app.php';

		$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

		return $app;
	}

}
