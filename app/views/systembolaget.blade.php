@extends('_layouts.home')
@section('content')

	<div class="jumbotron">
		<div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="input-group">
                        <input type="text" class="form-control" id="searchString" placeholder="Search for...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" id="search" type="button">Go!</button>Drinks in database: <span class="badge" id="count"></span>
                        </span>
                    </div>
                </div>
            </div>
            <hr>
            <div class="alert alert-info" role="alert">
                <h4>Commands:</h4>
               
            </div>
		</div>

        <ul class="list-group" id="results">
        
         
        </ul>


	   </div>

	<script>
		$(document).on("ready", start);

		function start() {
          //  getDrinkCount();
			registerListener();
		}
        
        function getDrinkCount(){
            var url = "systembolaget/count-drinks";
          
            $.ajax({
                async: "true",
                dataType: "json",
                type: "GET",
                url: url,
                success: function (result) {
                     $("#count").html(result);
                }         
            });
        }
        
        function registerListener(){
            $("#search").on("click", function(){
                var url = "systembolaget/search?s="+$("#searchString").val();
                $.ajax({
                    dataType: "json",
                    type: "GET",
                    url: url,
                    error: function () {
                        alert("Det finns inget att göra just nu :(");
                    },
                    success: function (result) {
                      if(results.length == 0){
                         $("#results").html('<li class="list-group-item">No results</li>');  
                      }else{
                        for(var i=0; i<result.length; i++){
                            $("#results").append('<li class="list-group-item">'+result[i]["name"]+'<span class="badge" id="count">'+result[i]["priceVAT"]+' :-</span></li>');
                        }
                      }
                    }
                });    
            });
        }       
	</script>

	<style>

	</style>
@stop
