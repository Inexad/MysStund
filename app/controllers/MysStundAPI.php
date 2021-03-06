<?php

class MysStundAPI extends \SystemBolagetAPI {
    
    public $searchVariable;
    public $liquors;
    public $adj;
    public $meth;
    public $consumption;
    public $price;
    public $gender;
    public $mood;   
        
    public function getIndex(){
        return View::make("MysStundAPI");
    }
    /**
     * Load all data.
     *
     */
    public function getHasch(){
        $this->gender = strtolower(Input::get("gender"));
        $this->price  = strtolower(Input::get("price"));
        $this->mood   = strtolower(Input::get("mood"));
    
        $data = array();
        
        if(Input::get("gender") == "" || Input::get("gender") == "kön"){
           $data[0] = "Jag menade inte 'kön' bildligt... du ska skriva ditt kön alltså.";
        }
        
        if(Input::get("price") == "" || Input::get("price") == "pris"){
           $data[1] = "Jag menade inte 'pris' bildligt... du ska skriva priset du kan tänkas betala alltså.";
        }
        
        if(Input::get("mood") == "" || Input::get("mood") == "humör"){
           $data[2] = "Jag menade inte 'humör' bildligt... du ska skriva ditt humör alltså.";
        }
        
        if(!empty($data)) return json_encode($data, JSON_UNESCAPED_UNICODE);
        
        $price      = $this->price;
        $mood       = $this->mood;
        $gender     = $this->gender;
        
        if(isset($gender) && isset($price) && isset($mood)){
            if($gender == "kvinna"){
                
                if($mood == "glad"){
                    // Top 10 from http://www.couplescompany.com/features/ct/Movies/Mom1.htm
                    $searchVariable = [ "Steel Magnolias", "Beaches", "The Joy Luck Club", "Casablanca", "The Color Purple", "Thelma & Louise", "Mildred Pierce", "Terms of Endearment", "All About Eve", "Erin Brockovich" ];

                    $this->liquors 	= $this->search("Likör");
                    
                    // Message
                    $this->adj 	= [ "glatt", "försiktigt" ];
                    $this->meth = [ "klunka", "dricka", "smutta", "smaka" ];

                    // Andel sprit
                    $this->consumption = 0.2;
                    
                    $this->processResult($this->liquors);
                }elseif($mood == "ledsen"){
                     // Top 10 from http://www.couplescompany.com/features/ct/Movies/Mom1.htm
                    $searchVariable = [ "Sabrina", "Mary Poppins", "Sound of Music", "Roman Holiday", "Under the Tuscan Sun", "Must Love Dogs", "Midnight in Paris", "Martian Child", "Paperback Hero", "Carnage" ];

                    $this->liquors 	= $this->search("Likör");
                    
                    // Message
                    $this->adj 	    = [ "hoppfullt", "försiktigt", "uppfriskande", "ledsamt" ];
                    $this->meth 	= [ "klunka", "dricka", "smutta", "smaka", "svepa", "halsa" ];
                   
                    // Andel sprit
                    $this->consumption = 0.5;
                    
                    $this->processResult($this->liquors);

                }elseif($mood == "kåt"){
                    $searchVariable = [ "50 shades of grey" ];
                    $this->liquors 		 = $this->search("Likör");

                    // Message
                    $this->adj 	= [ "sensuellt", "vildsint", "upphetsat", "frenetiskt" ];
                    $this->meth 	= [ "klunka", "svepa", "halsa" ];

                    // Andel sprit
                    $this->consumption = 0.4;
                } 
            }elseif($gender == "man"){
                 if($mood == "glad"){
                    // Top 10 from http://www.couplescompany.com/features/ct/Movies/Mom1.htm
                    $searchVariable = [ "The Terminator", "Terminator 2: Judgment Day", "Terminator 3: Rise of the Machines", "Terminator Salvation", "Terminator Genisys", "First Blood", "First Blood Part II", "Rambo III", "Rambo", "Rambo: Last Blood" ];

                    $this->liquors 	= $this->search("Absolut");
                    
                    // Message
                    $this->adj 	    =  [ "glatt", "vildsint" ];
                    $this->meth 	=  [ "klunka", "svepa", "halsa" ];
                   
                    // Andel sprit
                    $this->consumption = 0.5;
                    
                    $this->processResult($this->liquors);
                }elseif($mood == "ledsen"){
                     // Top 10 from http://www.couplescompany.com/features/ct/Movies/Mom1.htm
                    $searchVariable = [ "Rocky", "Rocky II", "Rocky III", "Rocky IV", "Rocky V", "Rocky Balboa" ];
                     
                    $this->liquors 	= $this->search("Absint");
                    
                    // Message
                    $this->adj 	    = [ "glatt", "vildsint" ];
                    $this->meth 	= [ "klunka", "svepa", "halsa" ];
                   
                    // Andel sprit
                    $this->consumption = 1;
                    
                    $this->processResult($this->liquors);

                }elseif($mood == "kåt"){
                    $searchVariable =  [ "Jada Fire Is SquirtWoman 3", "A Wolf's Tail", "Semen Demons 2", "Semen Demons", "The Load Warrior", "Jada Fire Is SquirtWoman 1", "Jada Fire Is SquirtWoman 2", "Space Nuts", "Pirates", "Pirates II: Stagnetti's Revenge" ];
                    $this->liquors 		 = $this->search("Absolut");

                    // Message
                    $this->adj 	= [ "sensuellt", "vildsint", "upphetsat", "frenetiskt" ];
                    $this->meth 	= [ "klunka", "svepa", "halsa" ];

                    // Andel sprit
                    $this->consumption = 0.7;
                } 
            }elseif($gender == "annat"){
                if($mood == "glad"){
                    // Top 10 from http://www.couplescompany.com/features/ct/Movies/Mom1.htm
                    $searchVariable = [ "The Adventures of Sebastian Cole", "Boys Don't Cry", "Breakfast on Pluto", "The Crying Game", "Different for Girls", "Farväl min konkubin", "I Want What I Want", "M. Butterfly", "Mitt liv i rosa", "Transamerica"];
                    
                    $this->liquors 	= $this->search("Absolut");
                    
                    // Message
                    $this->adj 	    =  [ "upphetsat", "djävulskt", "sensuellt" ];
                    $this->meth 	=  [ "smaka", "smutta", "dricka" ];
                   
                    // Andel sprit
                    $this->consumption = 0.5;
                    
                    $this->processResult($this->liquors);
                }elseif($mood == "ledsen"){
                     // Top 10 from http://www.couplescompany.com/features/ct/Movies/Mom1.htm
                    $searchVariable = [ "Team America: World Police", "The Interview"];
                     
                    $this->liquors 	= $this->search("Absint");
                    
                    // Message
                    $this->adj 	    = [ "upphetsat", "djävulskt", "sensuellt" ];
                    $this->meth 	= [ "smaka", "smutta", "dricka" ];
                   
                    // Andel sprit
                    $this->consumption = 0.7;
                    
                    $this->processResult($this->liquors);

                }elseif($mood == "kåt"){
                    $searchVariable =  [ "Bamse - världens starkaste björn!", "Teletubbies", "Gummi Bears" ];
                    $this->liquors 		 = $this->search("Absolut");

                    // Message
                    $this->adj 	    = [ "upphetsat", "djävulskt", "sensuellt" ];
                    $this->meth 	= [ "smaka", "smutta", "dricka" ];

                    // Andel sprit
                    $this->consumption = 1;
                } 
            }elseif($gender == "båda"){
                if($mood == "glad"){
                    return "Ta fan reda på vad fan du har mellan benen, har du inget bättre att komma med är du fan dansk!"; 
                }elseif($mood == "ledsen"){
                    return "Ryck upp dig och ta fan reda på vad du har mellan benen, annars är du fan dansk!";
                }elseif($mood == "kåt"){
                   return "Ohoj, ta reda på om du har ett tält eller nått annat och återkomm med rätt danskjävel!";
                } 
            }
            
            
            $affordableSpirits = array();
            foreach($this->liquors as $liquor){
                if($liquor->priceVAT < $price){
                    $affordableSpirits[] = $liquor;   
                }
            }
            
            if(!sizeOf($affordableSpirits) > 0){
                return "Din snåla jävel"; //Json format. 
            }
            
            $random = array_rand($affordableSpirits);
            $pickedBeverage = $affordableSpirits[$random];

            $random = array_rand($searchVariable);
            $pickedMovie = $this->getMovieInfo($searchVariable[$random]);
            
            if($pickedMovie->Response == "False"){
                return "Ingen film hittades. Var vänlig och försök igen";    //Json format.
            }
            
            $data['beverage'] = $pickedBeverage;
            $data['movie']    = $pickedMovie;
            
            $runtime = $pickedMovie;
            
            if(isset($runtime->Runtime)){
                $runtime = explode(" ",  $runtime->Runtime)[0];
            }
            
            if(is_numeric($runtime)){
                $liqr_ammount = (($runtime/60)*$this->consumption);   
                $liqr_ammount = number_format((float)$liqr_ammount, 2, '.', '');
                $data['amount_to_drink']    = $liqr_ammount;
                $priceToDrink = $data['amount_to_drink']*$this->price;
            
                $data['price_for_drink'] = $priceToDrink;     
            }else{
                $liqr_ammount = ((90/60)*$this->consumption);   
                $liqr_ammount = number_format((float)$liqr_ammount, 2, '.', '');
                $data['amount_to_drink']    = $liqr_ammount;
                $priceToDrink = $data['amount_to_drink']*$this->price;
            
                $data['price_for_drink'] = $priceToDrink;     
            }

            
            $data['preparation'][1] = "Du behöver införskaffa ".($data['amount_to_drink']*100)."cl ".$data['beverage']->name." som kostar ".$data['price_for_drink']."kr"; 
            $data['preparation'][2] = "Du behöver hyra, köpa gå på bio, eller 'låna' , alternativt är den en riktig h*n och illegalt laddar ner filmen. Som en boss.";
           
            $randomAdj = array_rand($this->adj);
            $randomMeth = array_rand($this->meth);
            
            $data['suggestion'] = "Du ska titta på ".json_encode($pickedMovie->Title)." och ".$this->adj[$randomAdj]." ".$this->meth[$randomMeth]." ".$data['beverage']->name;
                
            return var_dump($data);
            return $data; //Json format.
        }else{
            return "Missing parameter";   
        }
    }
    
    public function processResult($test){
       
    }
    
    // IMDB API
    function getMovieInfo($title){
        $json = file_get_contents("http://omdbapi.com/?t=" . urlencode($title));
        $movieObj = json_decode($json);
        return $movieObj;
    }
}
