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
						<input type="radio" name="inlineRadioOptions" class="gender" id="women" value="women"> Kvinna
					</label>
					<label class="radio-inline">
						<input type="radio" name="inlineRadioOptions" class="gender" id="man" value="man"> Man
					</label>
					<label class="radio-inline">
						<input type="radio" name="inlineRadioOptions" class="gender" id="other" value="other"> Annat
					</label>
					<label class="radio-inline">
						<input type="radio" name="inlineRadioOptions" class="gender" id="both" value="both"> Båda
					</label>
				</div>
	
				<div class="col-md-4 col-sm-4">
					<legend>Humör</legend>
					<div class="dropdown">
						<button class="btn btn-default dropdown-toggle" type="button" id="mood" data-toggle="dropdown" aria-expanded="true">
							<span id="moodTitle">Välj</span>
							<span class="caret"></span>
						</button>
						<ul class="dropdown-menu" role="menu" id="moodDropdown" aria-labelledby="dropdownMenu1">
							<li role="presentation"><a role="menuitem" class="moodValue" tabindex="-1" href="#">Glad</a></li>
							<li role="presentation"><a role="menuitem" class="moodValue" tabindex="-1" href="#">Ledsen</a></li>
							<li role="presentation"><a role="menuitem" class="moodValue" tabindex="-1" href="#">Kåt</a></li>
							<li role="presentation"><a role="menuitem" class="moodValue" tabindex="-1" href="#">Förbannad</a></li>
							<li role="presentation"><a role="menuitem" class="moodValue" tabindex="-1" href="#">Nödig</a></li>
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
						Men vi tar inget ansvar för eventuella olyckor så som baksmälla, medicinska symptom, sexuella sjukdomar och sexuell ohälsa. Vi tar vidare inte heller ansvar några som helst negativa konsekvenser av användadet av denna app, dock uppskattar vi positiv feedback för att utveckla och förbättre verktyget (trots att den nästan är felfri).<b> Är du dansk? <a href="https://www.youtube.com/watch?v=4YFmCAdhdNQ&x-yt-cl=84503534&x-yt-ts=1421914688&feature=player_detailpage">Lämna sidan här.</a></b>
						</small>
					</div>
				</div>					
			</div>
		
		
			<div class="panel panel-default">
			<div class="panel-heading"><h3>Title (Totalt pris)</h3></div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-3 col-sm-3">
						<div class="col-md-12 col-sm-12">
							<img src="/img/note.png" alt="..." width="250px" height="250px" id="suggest_image" class="img-thumbnail">
						</div>
					</div>
					<div class="col-md-3 col-sm-3">
						<ul class="list-group">
							<li class="list-group-item">Star Wars</li>
							<li class="list-group-item">145 min</li>
							<li class="list-group-item">Sci-fi</li>
						</ul>
					</div>
					
					<div class="col-md-3 col-sm-3">
						<ul class="list-group">
							<li class="list-group-item">Sprit</li>
							<li class="list-group-item">40%</li>
							<li class="list-group-item"></li>
						</ul>
					</div>
					<div class="col-md-3 col-sm-3">
						<div class="col-md-12 col-sm-12">
							<img src="/img/note.png" alt="..." width="250px" height="250px" id="suggest_image" class="img-thumbnail">
						</div>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-md-12 col-sm-12">
						<div class="alert alert-info" role="alert">
						<h4>Förberedelser</h4>
						 * Du behöver införskaffa [SPRITMÄNGD][SPRITNAMN] som kostar [SPRITKOSTNAD].
						 * Du behöver hyra, köpa gå på bio, eller "låna" [FILMNAMN], alternativt är den en riktig h*n och illegalt laddar ner filmen. Som en boss.
						
						
						<h4>Förslag</h4>
							Vi har räknat ut att du kommer behöva  dryck för att [Array:Adjektiv] kolla på denna filmen.
						
						</div>
					</div>					
				</div>

			</div>
			</div>
		</div>
	</div>
	
	Array:Namn
	Daniel, Artur
	
	Array:Verb
	åka skidor, handla glass, kasta åsnor
	
	Array:Adjektiv
	vildsint, upphetsat, mycket, långrdraget
	
	Array:Sätt att dricka
	halsa, svepa, lugnt dricka, klunka
	
	
	Vi har ett förslag till dig:
	Du ska titta på [FILMNAMN] och [Array:Adjektiv] [Array:Sätt att dricka] [SPRITNAMN]. 
	

	<script>
		$(document).on("ready", start);
		
		var searchVariable = [ "star", "xxx", "babe", "fight", "bad", "lord" ];
		
		var beverages	   = "";
		var userMood	   = "";
		var userGender	   = "";
		var userCost	   = "";
		
		function start() {
			registerListeners();
			getBeverage();
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
			//var gender = $("#
			var random = Math.floor(Math.random()*searchVariable.length)
		
			//
			var beverage = getBeverageInfo();
			var movie 	 = search(searchVariable[random]);
			$("#results").html(returnHTML);
			
	
			/*switch (userGender){
				case "man":
				
					break;
				case "women":
				   
					break;
				case "other":
				   
					break;
				case "both":
				   
					break;
				default:
					
					break;
			}*/
		}
		
		function getBeverageInfo(){
			var random = Math.floor(Math.random()*beverages.length);
			var url = "http://systembolagetapi.se/?id=" + beverages[random];

			$.ajax({
				dataType: "json",
				type: "GET",
				url: url,
				error: function () {
					//beverages.splice( $.inArray(beverages[random], beverages), 1 );
		
					getBeverageInfo();
					//alert("Det finns inget att göra just nu :(");
				},
				success: function (result) {
					console.log("got data back (search)");
					console.log(result);
					
					//updateFile();
					
					if(result != null) {
						var search = $.parseJSON(result);
						
						/*
						var returnHTML = "";
						
						alert(search["articleId"]);
						
						returnHTML += '<div class="result">\n';
						returnHTML += '<p class="title">\n';
						returnHTML += search["name"] + " (" + search["type"] + ")";
						returnHTML += '</p>\n';
						returnHTML += '<p>\n';
	
						returnHTML += '</p>\n';
						returnHTML += '</div>\n';
						
						console.log(returnHTML);

						console.log($("#results"));
						$("#results").html(returnHTML);
						*/
						return search;
					}
					
				}
			});
			return false;
		}
		
		
		/*
		|Search for a movie in omdbapi.
		*/
		function search(title) {
			var url = "http://www.omdbapi.com/?s=" + title;
			
			$.ajax({
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
							/*
							var search = result["Search"];
							var returnHTML = "";
							for(var i = 0; i < search.length; i++) {
								returnHTML += '<div class="result">\n';
								returnHTML += '<p class="title">\n';
								returnHTML += search[i]["Title"] + " (" + search[i]["Year"] + ")";
								returnHTML += '</p>\n';
								returnHTML += '<p>\n';
			
								returnHTML += '</p>\n';
								returnHTML += '</div>\n';
							}
							console.log(returnHTML);
							*/
							//console.log($("#results"));
							//$("#results").html(returnHTML);
							return result;
							
						}
					}
				}
			});
			return false;
		}


		function updateFile(){
			$.ajax({
				url : "{{URL::action('HomeController@postUpdateFile')}}",
				type : "POST",
				data : { data : beverages }
			}).done(function(json){
				getBeverage();
				getBeverageInfo();
			});
		}
	</script>
	
	<style>
		#mood{
			width:100%;
		}
		
		#moodDropdown{
			width:100%;
		}
		
		#searchSomething{
			margin-top:50px;
		}
	</style>
@stop