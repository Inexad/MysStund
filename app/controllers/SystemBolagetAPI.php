<?php

class SystemBolagetAPI extends \BaseController {

    public function getIndex(){
        return View::make("systembolaget");
    }  
    /**
     * Load all data.
     *
     */
    public function getLoadData(){ 
        //Most secure way to store an password.
        $password   = "ollert";
        $input      = Input::get("key");
        
        if(isset($input)){
            if(Input::get("key") == $password){
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
                    
                    return "Load completed";
                }  
            }else return "Wrong key.";
        }else return "Key needed to access this functionality";
    }
    
    
    /**
	 * Display all drinks.
	 *
	 * @return result
	 */
    public function getShowAllDrinks(){
        $product = Product::all();
    
        return $product;  
    }
    
    /**
    * 
    */
    public function getCountDrinks(){
        $product = Product::all();
    
        return sizeOf($product);  
    }

	/**
	 * Display the specified product by id.
	 *
	 * @return result
	 */
	public function getById(){
        $product = Product::find(Input::get("id"));
    
        return $product;  
	}
    
    /**
	 * Search for product by search string.
	 *
	 * @return result
	 */
	public function getSearch(){
        return $this->search(Input::get("s"));
	}
    
    public function search($title){
        $result = Product::where("name","LIKE", "%".$title."%")
                        ->orWhere("name2","LIKE", "%".$title."%")
                        ->orWhere("productcategory",$title)
                        ->orWhere("packaging",$title)
                        ->orWhere("sealing",$title)
                        ->orWhere("origin",$title)
                        ->orWhere("originlandname",$title)
                        ->orWhere("supplier",$title)
                        ->orWhere("year",$title)
                        ->orWhere("producer",$title)->get();
        return $result;  
    }
    
    
    /**
	 * Search for product by alcoholic.
	 *
	 * @return result
	 */
	public function getByAlcoholic(){
        $result = Product::where("alcoholic", "LIKE", "%".Input::get("alcoholic")."%")->get();
        return $result;  
	}    
}
