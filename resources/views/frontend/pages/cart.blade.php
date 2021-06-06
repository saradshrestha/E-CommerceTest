@extends('frontend.includes.main')

@section('content')


<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<h3 class="breadcrumb-header">Checkout</h3><br>
						<ul class="breadcrumb-tree">
							<li><a href="#">Home</a></li>
							<li class="active">Checkout</li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<form action="{{ route('addOrder')}}" method="Post">
							 @csrf
					<div class="col-md-7">

						<!-- Billing Details -->
						<div class="billing-details">
							<div class="section-title">
								<h3 class="title">Billing address</h3>
							</div>
							<div class="form-group">
								<input class="input" type="text" name="name" placeholder="Full Name" value="{{old('name')}}" >
								@error('name')
                                    <span class="text-danger" role="alert">
                          	        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>
							<div class="form-group">
								<input class="input" type="email" name="email" placeholder="Email" value="{{old('name')}}" >
								@error('email')
                                    <span class="text-danger" role="alert">
                          	        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>
							<div class="form-group">
								<input class="input" type="tel" name="phone" placeholder="Telephone" value="{{old('name')}}">
								@error('phone')
                                    <span class="text-danger" role="alert">
                          	        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>
							<div class="form-group">
								<input class="input" type="text" name="address" placeholder="Street Name" value="{{old('name')}}">
								@error('address')
                                    <span class="text-danger" role="alert">
                          	        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>
							<div class="form-group">
								<input class="input" type="text" name="city" placeholder="City" value="{{old('city')}}">
								@error('city')
                                    <span class="text-danger" role="alert">
                          	        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>
							<div class="form-group">
								<input class="input" type="text" name="district" placeholder="District" value="{{old('district')}}">
								@error('district')
                                    <span class="text-danger" role="alert">
                          	        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>
							<div class="form-group">
								<input class="input" type="text" name="province" placeholder="Province/State" value="{{old('province')}}">
								@error('province')
                                    <span class="text-danger" role="alert">
                          	        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>
							<div class="form-group">
								<input class="input" type="text" name="country" placeholder="Country" value="{{old('country')}}">
								@error('country')
                                    <span class="text-danger" role="alert">
                          	        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>							
						</div>
					<!-- /Billing Details -->
	
					</div>

					<!-- Order Details -->
					<div class="col-md-5 order-details">
						<div class="section-title text-center">
							<h3 class="title">Your Order</h3>
						</div>
						<div class="order-summary">
							<div class="order-col">
								<div><strong>PRODUCT</strong></div>
								<div><strong>TOTAL</strong></div>
							</div>
							<div class="order-products">
								  @foreach ($carts as  $cart) 
    	 							
								<div class="order-col">
									<div>{{ $cart->product_quantity}} x {{ $cart->product->product_name}}</div>
									<div> {{ $cart->product->product_price}}</div>
								</div>
								 @endforeach
								
							</div>
							<div class="order-col">
								<div>Shiping</div>
								<div><strong>FREE</strong></div>
							</div>
							<div class="order-col">
								<div><strong>TOTAL</strong></div>
								<div><strong class="order-total" >{{ $total_amount}}</strong></div>
							</div>
						</div>
						<div class="payment-method">
							
							
							<div class="input-radio">
								<strong>Payment Method</strong><br>
								<input type="radio" name="payment" value="0" checked>
								<label>
									<span style="margin-top: 19px;"></span>
									Cash On Delivery
								</label>
								
							</div>
						</div>
						<div class="input-checkbox">
							<input type="checkbox" id="terms" name="terms" required checked>
							<label for="terms">
								<span></span>
								I've read and accept the <a href="#">terms & conditions</a>
							</label>
						</div>
						
						<button class="primary-btn order-submit">Place order</button>
					</form>
					</div>
					<!-- /Order Details -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

  @endsection
  @section('javas')

<!-- Error Msg With Sweet Alert -->
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

  @endsection