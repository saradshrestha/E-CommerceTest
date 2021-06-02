<!-- NAVIGATION -->
<nav id="navigation">
	<!-- container -->
	<div class="container">
		<!-- responsive-nav -->
		<div id="responsive-nav">
			<!-- NAV -->
			<ul class="main-nav nav navbar-nav">
				<li class="active"><a href="{{ route('index') }}">Home</a></li>
				@foreach ($categories as  $category)
				<li><a href="{{ route('productCategory',$category->slug) }}">{{ $category->title}}</a></li>
				@endforeach
			</ul>
			<!-- /NAV -->
		</div>
		<!-- /responsive-nav -->
	</div>
	<!-- /container -->
</nav>
<!-- /NAVIGATION -->