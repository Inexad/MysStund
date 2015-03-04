<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#"></a>
		</div>
		<ul class="nav navbar-nav">
			<li @if(Route::getCurrentRoute()->getPath() == 'home') class="active" @endif ><a href="home">Mys till de</a></li>
            <li @if(Route::getCurrentRoute()->getPath() == 'systembolaget') class="active" @endif ><a href="systembolaget">Systembolaget API</a></li>
            <li @if(Route::getCurrentRoute()->getPath() == 'combo') class="active" @endif ><a href="combo">Combo API</a></li>
        </ul>
	</div>
</nav>