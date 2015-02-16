<?php

class Product extends Eloquent{

    protected $connection = "systembolaget";
    
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'products';

}