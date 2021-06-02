<!DOCTYPE html>
<html lang="en">
	@include('backend.includes.head')
	 
	<body>
<!-- Main Wrapper -->
        <div class="main-wrapper">
		@include('backend.includes.header')
		@include('backend.includes.sidebar')
		
		@yield('content')

		@include('backend.includes.javascript')
		@yield('js')
	</body>
</html>

