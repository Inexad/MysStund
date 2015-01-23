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
		
		<p id="results"></p>
	</div>

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
		
			//search(searchVariable[random]);
			getBeverageInfo();
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
					
					
					getBeverageInfo();
					//alert("Det finns inget att göra just nu :(");
					
				},
				success: function (result) {
					console.log("got data back (search)");
					console.log(result);
					
					
					if(result != null || result["Search"] != null) {
						var search = result["Search"];
						var returnHTML = "";
						for(var i = 0; i < search.length; i++) {
							returnHTML += '<div class="result">\n';
							returnHTML += '<p class="title">\n';
							returnHTML += search["name"] + " (" + search["type"] + ")";
							returnHTML += '</p>\n';
							returnHTML += '<p>\n';
		
							returnHTML += '</p>\n';
							returnHTML += '</div>\n';
						}
						console.log(returnHTML);

						console.log($("#results"));
						$("#results").html(returnHTML);
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

							console.log($("#results"));
							$("#results").html(returnHTML);
						}
					}
				}
			});
			return false;
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