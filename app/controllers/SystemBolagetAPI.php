<?php

class SystemBolagetAPI extends \BaseController {
    /*
    public function getLoadData(){
        $drinks = simplexml_load_file('data/drinks.xml');      
       
        foreach ($drinks->artikel as $drink){
            $newDrink = new Product();
            $newDrink->articleId                = (String)$drink->Artikelid;
            $newDrink->productId                = (String)$drink->Varnummer;
            $newDrink->name                     = (String)$drink->Namn;
            $newDrink->name2                    = (String)$drink->Namn2;
            $newDrink->priceVAT                 = (String)$drink->Prisinklmoms;
           // $newDrink->priceExVAT= $drink[0]->Prisexklmoms;
            $newDrink->volume                   = (String)$drink->Volym;
            $newDrink->priceperlitre            = (String)$drink->PrisPerLiter;
            $newDrink->sellstart                = (String)$drink->Saljstart;
            $newDrink->enddelivery              = (String)$drink->Slutlev;
            $newDrink->productcategory          = (String)$drink->Varugrupp;
            $newDrink->packaging                = (String)$drink->Forpackning;
            $newDrink->sealing                  = (String)$drink->Forslutning;
            $newDrink->origin                   = (String)$drink->Ursprung;
            $newDrink->originlandname           = (String)$drink->Ursprunglandnamn;
            $newDrink->producer                 = (String)$drink->Producent;
            $newDrink->supplier                 = (String)$drink->Leverantor;
            $newDrink->year                     = (String)$drink->Argang;
            $newDrink->testedvintage            = (String)$drink->Provadargang;
            $newDrink->alcoholic                = (String)$drink->Alkoholhalt;
            $newDrink->range                    = (String)$drink->Sortiment;
            $newDrink->organic                  = (String)$drink->Ekologisk;
            $newDrink->kosher                   = (String)$drink->Koscher;
            $newDrink->rawmaterialdescription   = (String)$drink->RavarorBeskrivning;
            
            $newDrink->save();
        }
        
        return "Load completed";
    }
    */
    
    public function getShowAllDrinks(){
        $product = Product::all();
    
        return $product;  
    }


	/**
	 * Display the specified product.
	 *
	 * @return Response
	 */
	public function getById(){
        $product = Product::find(Input::get("id"));
    
        return $product;  
	}
    
    /**
	 * Search for product
	 *
	 * @return Response
	 */
	public function getSearch(){
        $result = Product::where("name",Input::get("s"))
                        ->orWhere("name2",Input::get("s"))
                        ->orWhere("productcategory",Input::get("s"))
                        ->orWhere("packaging",Input::get("s"))
                        ->orWhere("sealing",Input::get("s"))
                        ->orWhere("origin",Input::get("s"))
                        ->orWhere("originlandname",Input::get("s"))
                        ->orWhere("supplier",Input::get("s"))
                        ->orWhere("year",Input::get("s"))
                        ->orWhere("producer",Input::get("s"))->get();
        return $result;  
	}
}
