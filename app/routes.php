<?php
	Route::get('/', function()
	{
		return Redirect::to('/home');
	});
	
	/*
	|--------------------------------------------------------------------------
	| Home.
	|--------------------------------------------------------------------------
	*/	
	Route::controller('/home', 'HomeController');	
    Route::controller('/systembolaget', 'SystemBolagetAPI');	
	