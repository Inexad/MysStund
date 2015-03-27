<?php

class MysStundAPI extends \BaseController {

    public function getIndex(){
        return View::make("MysStundAPI");
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
}
