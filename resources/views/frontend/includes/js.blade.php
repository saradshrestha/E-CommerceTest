<!-- jQuery Plugins -->
	<script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
	<script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('frontend/js/slick.min.js') }}"></script>
	<script src="{{ asset('frontend/js/nouislider.min.js') }}"></script>
	<script src="{{ asset('frontend/js/jquery.zoom.min.js') }}"></script>
	<script src="{{ asset('frontend/js/main.js') }}"></script>
	<script src="{{ asset('frontend/js/custom.js') }}"></script>
	<!-- SweetAlert2 JS -->
	<script src="{{ asset('backend/assets/js/sweetalert2.min.js' )}}"></script>
	<script src="{{ asset('backend/assets/js/sweetalert2.all.min.js' )}}"></script>

	@if(Session::has('error'))
	{
  		<script type="text/javascript">
  			Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: '{{ Session::get ('error')}}'
				})
 		</script>
	}
 	@endif
 	<!-- Success Msg With Sweet Alert -->
	@if  (Session::has('success'))
	{
  		<script type="text/javascript">
  			Swal.fire({
				  icon: 'success',
				  title: 'Great',
				  text: '{{ Session::get('success')}}'
				} )
 		</script>
	}
  	@endif
  	@if  (Session::has('danger'))
	{
  		<script type="text/javascript">
  			Swal.fire({
				  icon: 'danger',
				  title: 'LOL',
				  text: '{{ Session::get('danger')}}'
				} )
 		</script>
	}
  	@endif
