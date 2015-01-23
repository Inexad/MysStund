<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function getIndex(){
		return View::make('home');
	}

	
	public function postNewMovie(){
	
	}
	
	public function postUpdateFile(){
		$ids 	= (array)Input::get("data");

		$fp=fopen("data/beverage.txt","w+");
		
		foreach($ids as $key => $value){
			fwrite($fp,$value."\n");
		}

		return $ids;
	}
}
