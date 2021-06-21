@extends('frontend.includes.main')

@section('content')

<!------------------ New products ----------------------------- -->
		
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">New Products</h3>
							<div class="section-nav">
								<ul class="section-tab-nav">
									<li>
										<a href="{{ route('productList','latest') }}">View All Latest Products</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab1" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-1"  style="width=300px;">
										<!-- product -->
										@foreach( $latestproducts as $latestproduct)
										<div class="product">
											<a href="{{ route('productShow', $latestproduct->product_slug) }}">
												<div class="product-img">
													<img src="{{ asset('/Products/uploads/'. $latestproduct->product_image) }}" alt="" style="height: 300px;">
													<div class="product-label">
														<span class="sale">-30%</span>
														<span class="new">NEW</span>
													</div>
												</div>
											</a>
											<div class="product-body">
												<p class="product-category">{{  $latestproduct->category->title}}</p>
												<h3 class="product-name"><a href="{{ route('productShow',   $latestproduct->product_slug) }}">{{  $latestproduct->product_name}}</a></h3>
												<h4 class="product-price">Rs.{{ $latestproduct->product_price}}
													<del class="product-old-price">
														Rs.{{ $latestproduct->product_price}}
													</del>
												</h4>
												@if ($latestproduct->reviews->count() == 0)
												 	<strong>No Review(s) Yet.</strong>
												@else
													<div class="product-rating">
													@php
														$avg_rating = $latestproduct->reviews->avg('rating');
													  	$t_rating = number_format($avg_rating);
													@endphp
														@for($i = 0; $i < $t_rating; $i++)
															<i class="fa fa-star"></i>
													    @endfor
														@for($i = 0; $i < 5 - $t_rating; $i++)
												           	<i class="fa fa-star-o"></i>
													    @endfor 
													</div>
												@endif	
												<div class="product-btns">
													<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
												
													<a href="{{ route('productShow',   $latestproduct->product_slug) }}"><button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">Quick View</span></a></button>
												</div>
											</div>
											
										</div>
										@endforeach
										<!-- /product -->

										
									</div>
									<div id="slick-nav-1" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
<!------------------ New products nds ----------------------------- -->

<!------------------ New products ----------------------------- -->
		
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">View Products</h3>
							<div class="section-nav">
								<ul class="section-tab-nav tab-nav">
									<li>
										<a href="{{ route('productList','allproduct') }}">
											View All Products
										</a>
									</li>
									</ul>
							</div>
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab1" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-1"  style="width=300px;">
										<!-- product -->
										@foreach( $products as $allProduct)

										<div class="product">
											<a href="{{ route('productShow',   $allProduct->product_slug) }}">
												<div class="product-img">
													<img src="{{ asset('/Products/uploads/'. $allProduct->product_image) }}" alt="" style="height: 300px;">
													<div class="product-label">
														<span class="sale">-30%</span>
														<span class="new">NEW</span>
													</div>
												</div>
											</a>
											<div class="product-body">
												<p class="product-category">{{  $allProduct->category->title}}</p>
												<h3 class="product-name"><a href="{{ route('productShow',   $allProduct->product_slug) }}">{{  $allProduct->product_name}}</a></h3>
												<h4 class="product-price">Rs.{{  $allProduct->product_price}}
													<del class="product-old-price">
														Rs. {{ $allProduct->product_price}}
													</del>
												</h4>
												@if ($allProduct->reviews->count() == 0)
												 	<strong>No Review(s) Yet.</strong>
												@else
													<div class="product-rating">
														@php
															$avg_rating = $allProduct->reviews->avg('rating');
														 	$t_rating = number_format($avg_rating);
														@endphp
														@for($i = 0; $i < $t_rating; $i++)
															<i class="fa fa-star"></i>
													    @endfor
														@for($i = 0; $i < 5 - $t_rating; $i++)
												           	<i class="fa fa-star-o"></i>
													    @endfor  
													</div>
												@endif
													
												
												<div class="product-btns">
													<button class="add-to-wishlist">
														<i class="fa fa-heart-o"></i>
														<span class="tooltipp">add to wishlist</span>
													</button>
													
													<a href="{{ route('productShow',   $allProduct->product_slug) }}">
														<button class="quick-view">
															<i class="fa fa-eye"></i>
															<span class="tooltipp">Quick View</span>
														</a>
													</button>
												</div>
											</div>
										
										</div>
										@endforeach
										<!-- /product -->

										
									</div>
									<div id="slick-nav-1" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">Featured Products</h3>
							<div class="section-nav">
								<ul class="section-tab-nav tab-nav">
									<li>
										<a href="{{ route('productList','featured') }}">
										View All Featured Products
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab2" class="tab-pane fade in active">
									<div class="products-slick" data-nav="#slick-nav-2">
										<!-- product -->
										  @foreach( $featuredProducts as $featuredProduct )
										<div class="product" style="width: 300px;" >
											<a href="{{ route('productShow',   $featuredProduct->product_slug) }}">
												<div class="product-img">
													<img src="{{ asset('/Products/uploads/'. $featuredProduct->product_image) }}" alt="" style="height: 300px;">
													<div class="product-label">
														<span class="sale">-30%</span>
														<span class="new">Latest</span>
													</div>
												</div>
											</a>
											<div class="product-body">
												<p class="product-category">Category</p>
												<h3 class="product-name"><a href="#">{{ $featuredProduct->product_name}}</a></h3>
												<h4 class="product-price">Rs. {{ $featuredProduct->product_price}}
													<del class="product-old-price">
														Rs. {{ $featuredProduct->product_price}}
													</del>
												</h4>
												@if ($featuredProduct->reviews->count() == 0)
													<strong>No Review(s) Yet.</strong>
												@else
													<div class="product-rating">
												 	@php
												  		$avg_rating = $featuredProduct->reviews->avg('rating');
												  		$t_rating = number_format($avg_rating);
												 	@endphp
													@for($i = 0; $i < $t_rating; $i++)
														<i class="fa fa-star"></i>
										        	@endfor
													@for($i = 0; $i < 5 - $t_rating; $i++)
									            		<i class="fa fa-star-o"></i>
										        	@endfor  
											 		</div>
											 	@endif
												
												<div class="product-btns">
													<button class="add-to-wishlist">
														<i class="fa fa-heart-o"></i>
														<span class="tooltipp">add to wishlist</span>
													</button>
													
													<button class="quick-view">
														<a href="{{ route('productShow',   $featuredProduct->product_slug) }}">
														<i class="fa fa-eye"></i>
														<span class="tooltipp">Quick View</span>
														</a>
													</button>
												</div>
											</div>
											
										</div>
										  @endforeach
										<!-- /product -->

									</div>
									<div id="slick-nav-2" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- /Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
 @endsection
 {{-- @section('javas')
 --}}
<!-- Error Msg With Sweet Alert -->
	{{-- @if(Session::has('error'))
	{
  		<script type="text/javascript">
  			Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: '{{ Session::get ('error')}}'
				})
 		</script>
	}
 	@endif --}}
 	<!-- Success Msg With Sweet Alert -->
	{{-- @if  (Session::has('success'))
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

  @endsection --}}