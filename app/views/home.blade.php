@extends('_layouts.home')
@section('content')

	<div class="jumbotron">
		<div class="container">
		<form class="form-inline">

			<div class="row">
				<div class="col-md-4 col-sm-4">
					<legend>Hur mycket får det kosta?</legend>
					<div class="form-group">
						<div class="input-group">
							<div class="input-group-addon">:-</div>
								<input type="text" class="form-control" id="maxPrice" placeholder="Pris">
							<div class="input-group-addon">.00</div>
						</div>
					</div>
				</div>

				<div class="col-md-4 col-sm-4">
					<legend>Kön</legend>
					<label class="radio-inline">
						<input type="radio" name="inlineRadioOptions" class="gender" id="Kvinna" value="Kvinna"> Kvinna
					</label>
					<label class="radio-inline">
						<input type="radio" name="inlineRadioOptions" class="gender" id="Man" value="Man"> Man
					</label>
					<label class="radio-inline">
						<input type="radio" name="inlineRadioOptions" class="gender" id="Annat" value="Annat"> Annat
					</label>
					<label class="radio-inline">
						<input type="radio" name="inlineRadioOptions" class="gender" id="Båda" value="Båda"> Båda
					</label>
				</div>

				<div class="col-md-4 col-sm-4">
					<legend>Humör</legend>
					<div class="dropdown">
						<button class="btn btn-default dropdown-toggle" type="button" id="mood" data-toggle="dropdown" aria-expanded="true">
							<span id="moodTitle">Välj</span>
							<span class="caret"></span>
						</button>
						<ul class="dropdown-menu fancylist" role="menu" id="moodDropdown" aria-labelledby="dropdownMenu1">
							<li role="presentation"><a role="menuitem" class="moodValue" tabindex="-1" href="#">Glad</a></li>
							<li role="presentation"><a role="menuitem" class="moodValue" tabindex="-1" href="#">Ledsen</a></li>
							<li role="presentation"><a role="menuitem" class="moodValue" tabindex="-1" href="#">Kåt</a></li>
						</ul>
					</div>
				</div>
			</div>

			<p><a class="btn btn-primary btn-lg btn-block" id="searchSomething" href="#" role="button">Hitta på något!</a></p>
		</form>
		</div>

			<div class="container" id="results">
					<div class="row">
				<div class="col-md-12 col-sm-12">
					<div class="alert alert-danger" role="alert">
						<small>Tänk på!
						Våra resultat är väldigt pålitliga. Den har vid upprepande tillfällen testats hårt av dvärg och häst.
						Men vi tar inget ansvar för eventuella olyckor så som baksmälla, medicinska symptom, sexuella sjukdomar, sexuell ohälsa eller rasistiska kommentarer. Vi tar vidare inte heller av några som helst negativa konsekvenser av användadet av denna app, dock uppskattar vi positiv feedback för att utveckla och förbättre verktyget (trots att den är felfri).<b> Är du dansk? <a href="https://www.youtube.com/watch?v=4YFmCAdhdNQ&x-yt-cl=84503534&x-yt-ts=1421914688&feature=player_detailpage">Lämna sidan här.</a></b>
						</small>
					</div>
				</div>
			</div>


			<div id="info" class="panel panel-default">
			<div class="panel-heading"><h1 id="titlePrice"></h1></div>
			<div class="panel-body">

				<div class="row">

					<div class="col-md-3 col-sm-3">
						<div class="col-md-12 col-sm-12 glossy-reflection image-wrap">
							<img src="/img/loading.gif" alt="..." id="suggest_image" class="img-thumbnail glossy-reflection image-wrap">
						</div>
					</div>
					<div class="col-md-3 col-sm-3">
						<ul class="list-group">
							<li class="list-group-item"><span id=movie_title>&nbsp</span></li>
							<li class="list-group-item"><span id=movie_lenght>&nbsp</li>
							<li class="list-group-item"><span id=movie_genre>&nbsp</li>
							<li class="list-group-item"><span id=movie_plot>&nbsp</li>
						</ul>
					</div>

					<div class="col-md-3 col-sm-3">
						<ul class="list-group">
							<li class="list-group-item"><span id=liquor_title>&nbsp</span></li>
							<li class="list-group-item"><span id=liquor_desc>&nbsp</span></li>
							<li class="list-group-item"><span id=liquor_alc>&nbsp</span></li>
							<li class="list-group-item"><span id=liquor_price>&nbsp</span></li>
						</ul>
					</div>

					<div class="col-md-3 col-sm-3">
						<div class="col-md-12 col-sm-12 glossy-reflection image-wrap">
							<img src="/img/loading.gif" alt="..." id="suggest_image" class="img-thumbnail glossy-reflection image-wrap">
						</div>
					</div>

				</div>

				<div class="row">
					<div class="col-md-12 col-sm-12">
						<div id="alert" class="alert alert-info" role="alert">
						<h4>Förberedelser</h4>
						<ul>
							<li class="list-group-item">Du behöver införskaffa <span id="liqr_ammount"></span> L <span id="liqr"></span> som kostar <span id="liqr_cost"></span></li>
							<li class="list-group-item">Du behöver hyra, köpa gå på bio, eller "låna" <span id="movie"></span>, alternativt är den en riktig h*n och illegalt laddar ner filmen. Som en boss.</li>
						</ul>
						<h4>Förslag</h4>
						<ul>
							<li class="list-group-item">Du ska titta på <span id="fmovie"></span> och <span id="fadj"></span> <span id="fmeth"></span> <span id="fliqr"><span></li>
						</ul>
						</div>
					</div>
				</div>

			</div>
			</div>
		</div>
	</div>

	<style>

		.alert-danger {
			box-shadow: 2px 2px 5px 0px rgba(50, 50, 50, 0.75);
		}

		body {
			background: #eee;
		}

		#results {
			display: none;
		}

		#titlePrice {
			color: white;

			text-shadow: 0 1px 0 #ccc,
               0 2px 0 #c9c9c9,
               0 3px 0 #bbb,
               0 4px 0 #b9b9b9,
               0 5px 0 #aaa,
               0 6px 1px rgba(0,0,0,.1),
               0 0 5px rgba(0,0,0,.1),
               0 1px 3px rgba(0,0,0,.3),
               0 3px 5px rgba(0,0,0,.2),
               0 5px 10px rgba(0,0,0,.25),
               0 10px 10px rgba(0,0,0,.2),
               0 20px 20px rgba(0,0,0,.15);

			background: rgba(41, 157, 126, 1);
			box-shadow: inset 2px 2px 5px 0px rgba(50, 50, 50, 0.75);
			-webkit-box-reflect: below 0px -webkit-gradient(linear, left top, left bottom, from(transparent), color-stop(50%, transparent), to(rgba(255,255,255,0.4)));
		}

		.panel-heading {
			text-align: center;
			padding-left:		0px;
			padding-right:	0px;
			padding-top:		10px;
			padding-bottom: 15px;
			box-shadow: 2px 2px 5px 0px rgba(50, 50, 50, 0.75);
		}

		.list-group {
			height: 		200px;
			overflow: 	auto;
		}

		.list-group-item {
			min-height: 30px;
		}

		.panel-body {
			box-shadow: inset 2px 2px 5px 0px rgba(50, 50, 50, 0.75), 2px 2px 5px 0px rgba(50, 50, 50, 0.75);
			background: linear-gradient(to bottom, #a90329 0%,#8f0222 44%,#6d0019 100%);
		}

		.img-thumbnail {
			background: rgba(60, 2, 2, 0.97);
			width:			196px;
			height:			196px;
		}

		#info {
			display:none;
			overflow:auto;
			background: rgba(130, 130, 130, 1);

		}

		#alert {
			margin: 15px;
			box-shadow: 2px 2px 5px 0px rgba(50, 50, 50, 0.75);
		}

		#fmovie, #fadj, #fmeth, #fliqr {
			font-weight: bold;
			color: rgba(110, 0, 25, 1);
		}

		#mood{
			width:100%;
		}

		#moodDropdown{
			width:100%;
		}

		#searchSomething{
			margin-top:			50px;
			margin-bottom:	50px;
		}

		.glossy-reflection .image-wrap {
			-webkit-box-shadow: inset 0 -1px 0 rgba(0,0,0,.5), inset 0 1px 0 rgba(255,255,255,.6);
			-moz-box-shadow: inset 0 -1px 0 rgba(0,0,0,.5), inset 0 1px 0 rgba(255,255,255,.6);
			box-shadow: inset 0 -1px 0 rgba(0,0,0,.5), inset 0 1px 0 rgba(255,255,255,.6);

			-webkit-transition: 1s;
			-moz-transition: 1s;
			transition: 1s;

			-webkit-border-radius: 20px;
			-moz-border-radius: 20px;
			border-radius: 20px;
		}

		.glossy-reflection .image-wrap:before {
			position: absolute;
			content: ' ';
			width: 100%;
			height: 50%;
			top: 0;
			left: 0;

			-webkit-border-radius: 20px;
			-moz-border-radius: 20px;
			border-radius: 20px;

			background: -moz-linear-gradient(top, rgba(255,255,255,0.7) 0%, rgba(255,255,255,.1) 100%);
			background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(255,255,255,0.7)), color-stop(100%,rgba(255,255,255,.1)));
			background: linear-gradient(top, rgba(255,255,255,0.7) 0%,rgba(255,255,255,.1) 100%);
		}

		.glossy-reflection .image-wrap:after {
			position: absolute;
			content: ' ';
			width: 100%;
			height: 30px;
			bottom: -31px;
			left: 0;

			-webkit-border-top-left-radius: 20px;
			-webkit-border-top-right-radius: 20px;
			-moz-border-radius-topleft: 20px;
			-moz-border-radius-topright: 20px;
			border-top-left-radius: 20px;
			border-top-right-radius: 20px;

			background: -moz-linear-gradient(top, rgba(230,230,230,.3) 0%, rgba(230,230,230,0) 100%);
			background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(230,230,230,.3)), color-stop(100%,rgba(230,230,230,0)));
			background: linear-gradient(top, rgba(230,230,230,.3) 0%,rgba(230,230,230,0) 100%);
		}

		body:nth-of-type(1) ul li {
			list-style-type:none;
			padding: 0 0 0 45px;
			position:relative;
			transition: all 1s linear;
		}

		body:nth-of-type(1) ul li:before {
			/*fill it with a check mark*/
			content:"✔";
			color: snow;
			background-color: rgba(41, 157, 126, 0.97);
			box-shadow: 2px 2px 5px 0px rgba(50, 50, 50, 0.75);
			padding-top: 		2px;
			padding-right: 	6px;
			padding-left: 	6px;

			/*make it a block element*/
			display: block;
			border-radius: 100%;
			-moz-border-radius: 25px;
			-webkit-bo rder-radius: 25px;

			/*Now position it on the left of the list item, and center it vertically
			(so that it will work with multiple line list-items)*/
			position: absolute;
			left: 7px;
			top: 40%;
			margin-top: -8px;
			transition: all 1s linear;
		}

		body:nth-of-type(1) ul li:hover:before {
			background-color: rgba(110, 0, 25, 1);
		}
	</style>

	<script>
		$(document).on("ready", start);

		var searchVariable = [];

		var beverages	   = "";
		var userMood	   = "";
		var userGender	 = "";
		var userCost	   = "";

		// Message
		var adj 	= [];
		var meth 	= [];

		// Consumption
		var consumption = 0;
		var liqr_ammount = 0;


		function start() {
			registerListeners();
			initInterface();
			//getBeverage();
			executeDanish();
		}

		/*
		|
		*/
		function registerListeners(){
			$("#searchSomething").on("click", doSomething);
			$(".moodValue").on("click", setMood);
			$(".gender").on("click", setGender);
			$("#maxPrice").on("change", setCost);
		}
		function initInterface(){
			$("#results").slideDown("slow");

		}

		function executeDanish(){
			setTimeout("showDanishMessage()", Math.floor(Math.random()*15099));

		}

		function showDanishMessage(){
			alert("Danskjävel! Försvinn!");
		}

		/*
		|
		*/
		function setMood(){
			userMood = $(this).text();
			$("#moodTitle").text(userMood);
		}

		/*
		|
		*/
		function setGender(){
			userGender = $(this).val();
		}

		/*
		|
		*/
		function setCost(){
			userCost = parseInt($(this).val());
			$(this).val(userCost);
		}

		/*
		| Reads all beverages.
		*/
		function getBeverage(){
			$.get('/data/beverage.txt', function(data) {
				beverages = data.split(/\n/);
			}, 'text');
		}

		/*
		|
		*/
		function doSomething(){
			// Fancy stuff
			$(".alert:first").slideUp("slow");


			switch (userGender) {
				case "Kvinna":
					switch (userMood){
						case "Glad":
							// Top 10 from http://www.couplescompany.com/features/ct/Movies/Mom1.htm
							searchVariable = [ "Steel Magnolias", "Beaches", "The Joy Luck Club", "Casablanca", "The Color Purple", "Thelma & Louise", "Mildred Pierce", "Terms of Endearment", "All About Eve", "Erin Brockovich" ];
							var liquor 		 = searchBev("Likör");

							// Message
							adj 	= [ "glatt", "försiktigt" ];
							meth 	= [ "klunka", "dricka", "smutta", "smaka" ];

							// Andel sprit
							consumption = 0.2;
							break;

						case "Ledsen":
							// Top 10 from http://www.imdb.com/list/ls053965442/
							searchVariable = [ "Sabrina", "Mary Poppins", "Sound of Music", "Roman Holiday", "Under the Tuscan Sun", "Must Love Dogs", "Midnight in Paris", "Martian Child", "Paperback Hero", "Carnage" ];
							var liquor 		 = searchBev("Likör");

							// Message
							adj 	= [ "hoppfullt", "försiktigt", "uppfriskande", "ledsamt" ];
							meth 	= [ "klunka", "dricka", "smutta", "smaka", "svepa", "halsa" ];

							// Andel sprit
							consumption = 0.5;
							break;

						case "Kåt":
							// Seriöst?
							searchVariable = [ "50 shades of grey" ];
							var liquor 		 = searchBev("Likör");

							// Message
							adj 	= [ "sensuellt", "vildsint", "upphetsat", "frenetiskt" ];
							meth 	= [ "klunka", "svepa", "halsa" ];

							// Andel sprit
							consumption = 0.4;
							break;

						default:
							alert("Kunde ej beräkna kåthet");
					}
					break;

				case "Man":
					switch (userMood){
						case "Glad":
							// Ezmode
							searchVariable = [ "The Terminator", "Terminator 2: Judgment Day", "Terminator 3: Rise of the Machines", "Terminator Salvation", "Terminator Genisys", "First Blood", "First Blood Part II", "Rambo III", "Rambo", "Rambo: Last Blood" ];
							var liquor 		 = searchBev("Absolut");

							// Message
							adj 	= [ "glatt", "vildsint" ];
							meth 	= [ "klunka", "svepa", "halsa" ];

							// Andel sprit
							consumption = 0.5;
							break;

						case "Ledsen":
							// Ezmode
							searchVariable = [ "Rocky", "Rocky II", "Rocky III", "Rocky IV", "Rocky V", "Rocky Balboa" ];
							var liquor 		 = searchBev("Absint");

							// Message
							adj 	= [ "glatt", "vildsint" ];
							meth 	= [ "klunka", "svepa", "halsa" ];

							// Andel sprit
							consumption = 1;
							break;

						case "Kåt":
							// Gigidy
							searchVariable = [ "Jada Fire Is SquirtWoman 3", "A Wolf's Tail", "Semen Demons 2", "Semen Demons", "The Load Warrior", "Jada Fire Is SquirtWoman 1", "Jada Fire Is SquirtWoman 2", "Space Nuts", "Pirates", "Pirates II: Stagnetti's Revenge" ];
							var liquor 		 = searchBev("Absolut");

							// Message
							adj 	= [ "upphetsat", "djävulskt", "sensuellt", "frenetiskt" ];
							meth 	= [ "klunka", "svepa", "halsa" ];

							// Andel sprit
							consumption = 0.7;
							break;

						default:
							alert("Kunde ej beräkna kåthet");
					}
					break;

				case "Annat":
					switch (userMood){
						case "Glad":
							searchVariable = [ "The Adventures of Sebastian Cole", "Boys Don't Cry", "Breakfast on Pluto", "The Crying Game", "Different for Girls", "Farväl min konkubin", "I Want What I Want", "M. Butterfly", "Mitt liv i rosa", "Transamerica"];
							var liquor 		 = searchBev("Absolut");

							// Message
							adj 	= [ "upphetsat", "djävulskt", "sensuellt" ];
							meth 	= [ "smaka", "smutta", "dricka" ];

							// Andel sprit
							consumption = 0.5;
							break;

						case "Ledsen":
							searchVariable = [ "Team America: World Police", "The Interview"];
							var liquor 		 = searchBev("Absolut");

							// Message
							adj 	= [ "upphetsat", "djävulskt", "sensuellt" ];
							meth 	= [ "smaka", "smutta", "dricka" ];

							// Andel sprit
							consumption = 0.7;
							break;

						case "Kåt":
							searchVariable = [ "Bamse - världens starkaste björn!", "Teletubbies", "Gummi Bears" ];
							var liquor 		 = searchBev("Absolut");

							// Message
							adj 	= [ "upphetsat", "djävulskt", "sensuellt" ];
							meth 	= [ "smaka", "smutta", "dricka" ];

							// Andel sprit
							consumption = 1;
							break;

						default:
							alert("Kunde ej beräkna kåthet");
					}
					break;

				case "Båda":
					switch (userMood){
						case "Glad":
							alert("Ta fan reda på vad fan du har mellan benen, har du inget bättre att komma med är du fan dansk!");
							return;

						case "Ledsen":
							alert("Ryck upp dig och ta fan reda på vad du har mellan benen, annars är du fan dansk!");
							return;

						case "Kåt":
							alert("Ohoj, ta reda på om du har ett tält eller nått annat och återkomm med rätt danskjävel!")
							return;

						default:
							alert("Kunde ej beräkna kåthet på danskjäveln!");
							return;
					}
					break;

				default:
					alert("Kunde ej beräkna kön, var vänlig försök igen!");
					break;
			}

			// Randomize selections
			var randomMovie = Math.floor(Math.random()*searchVariable.length)
			var randomAdj 	= Math.floor(Math.random()*adj.length)
			var randomMeth  = Math.floor(Math.random()*meth.length)

			// Get Movie
			var movie 	 		= search(searchVariable[randomMovie]);

			// Populate "förslag"
			// * Du ska titta på [FILMNAMN] och <span id="adj"></span> [Array:Adjektiv] <span id="meth"></span> [Array:Sätt att dricka] <span id="liqr"><span> [SPRITNAMN].
			$("#fadj").html(adj[randomAdj]);
			$("#fmeth").html(meth[randomMeth]);

			console.log("Selected Variables:\n");
			console.log("SearchVariable: " + searchVariable);
			console.log("SelectedMovie: " + searchVariable[randomMovie]);
			console.log("Mood: " + userMood);
			console.log("Gender: " + userGender);
			console.log("Cost: " + userCost);

		}

		/*
		|Search for a movie in omdbapi.
		*/
		function search(title) {
			var url = "http://www.omdbapi.com/?t=" + title;

			$.ajax({
				async: "false",
				dataType: "json",
				type: "GET",
				url: url,
				error: function () {
					alert("Det finns inget att göra just nu :(");
				},
				success: function (result) {
					console.log("got data back (search)");
					console.log(result);

					if(result["Response"] == "False") {
						alert("Inga träffar, stavade du rätt?");
					} else {
						if(result != null || result["Search"] != null) {

							// Beräkna filmlängd
							var lenght = result["Runtime"].split(" ")[0];
							liqr_ammount = ((lenght/60)*consumption).toFixed(2);

							// Förberedelser
							$("#liqr_ammount").html(liqr_ammount);

							// Förslag
							$("#fmovie").html(result["Title"]);

							// Sammanfattning av film
							$("#movie_title").html(result["Title"]);
							$("#movie_lenght").html(result["Runtime"]);
							$("#movie_genre").html(result["Genre"]);
							$("#movie_plot").html(result["Plot"]);

							// Fancy stuff
							$("#info").slideDown("slow", function (){
									$("html, body").animate({ scrollTop: "300px" });
							});

							return result;

						}
					}
				}
			});
			return false;
		}

		/*
		|Search for a spirits in our own systembolaget API.
		*/
		function searchBev(title) {
			var url = "systembolaget/search?s=" + title;

			$.ajax({
				async: "false",
				dataType: "json",
				type: "GET",
				url: url,
				error: function () {
					alert("Det finns inget att göra just nu :(");
				},
				success: function (result) {
					console.log("got data back (search)");
					console.log(result);

					if(result["Response"] == "False") {
						alert("Inga träffar, stavade du rätt?");
					} else {
						if(result != null || result["Search"] != null) {
							var afordableSpirits = [];
							$.each(result, function ( i, val ) {
								var price 	= result[i]["priceVAT"];

								if (price < userCost){
									console.log("Hittade " + result[i]["name"] + " " + result[i]["alcoholic"]);
									afordableSpirits.push(result[i]);
								} else {
									console.log("above userCost: " + price + ">" + userCost);
								}
							});

							// Dump afordable spirits for user.
							console.log(afordableSpirits);

							if (afordableSpirits.length > 0){
								var randomLiqr = Math.floor(Math.random()*afordableSpirits.length)
								// Required ammounts of spirits;
								var liqrName 		= afordableSpirits[randomLiqr]["name"];
								var liqrReq 		= afordableSpirits[randomLiqr]["priceperlitre"];
								var liqrVal			= afordableSpirits[randomLiqr]["alcoholic"];
								var priceTotal 	= liqrReq;

								// Poppulate
								$("#liquor_title").html(liqrName);
								$("#liquor_alc").html(liqrVal);
								$("#liquor_price").html("Pris: " + liqrReq + " (L)");
								$("#liquor_desc").html(afordableSpirits[randomLiqr]["productcategory"]);

								$("#titlePrice").html(priceTotal);
								$("#liqr").html(liqrName);

								// Förslag
								$("#fliqr").html(liqrName);
							} else {
								alert("Snåla jävel!");
							}
						return result;

						}
					}
				}
			});
			return false;
		}
	</script>
@stop
