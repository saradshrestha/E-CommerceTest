<!DOCTYPE html>
<html lang="en">
	 @include('frontend.includes.head')
	<body>
		<!-- HEADER -->
		@include('frontend.includes.header')
		<!-- /HEADER -->

		<!-- NAVIGATION -->
		@include('frontend.includes.navbar')
		<!-- /NAVIGATION -->

		<!-- SECTION -->
		 @yield ('content')
		<!-- /SECTION -->

	

		<!-- NEWSLETTER -->
			@include ('frontend.includes.newsletter' )
			
	

			@include ('frontend.includes.footer')
		 @include ('frontend.includes.js')
		  @yield ('javas')
	</body>
</html>