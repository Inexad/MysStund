@extends('_layouts.home')
@section('content')

	<div class="jumbotron">
		<div class="container">
		<form class="form-inline">
			<div class="row">
				<div class="col-lg-12">
					<div class="input-group">
						<span class="input-group-btn">
							<button class="btn btn-default" type="button">Go!</button>
						</span>
						<input type="text" class="form-control" placeholder="Search for a movie...">
					</div>
				</div>
			</div>
		</form>
		</div>
	</div>

	<script>
		$(document).on("ready", start);
		
		function start() {
		
		}	
		
		/*
		|	Search for a movie in omdbapi.
		*/
		function search() {
			var title = $("#search-title").val();
			var url = "http://www.omdbapi.com/?s=" + title;
			
			$.ajax({
				dataType: "json",
				type: "GET",
				url: url,
				error: function () {
					alert("Inga träffar, stavade du rätt?");
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
								returnHTML += '<button type="button" class="favorite-button btn btn-warning" value="' + search[i]["Title"] + '">Favoritfilm</button>\n';
								returnHTML += '<button type="button" class="archive-button btn btn-info" value="' + search[i]["imdbID"] + '">Arkiv</button>\n';
								returnHTML += '</p>\n';
								returnHTML += '</div>\n';
							}
							console.log(returnHTML);

							localStorage.setItem("last-search-results", returnHTML);

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
	
	</style>
@stop