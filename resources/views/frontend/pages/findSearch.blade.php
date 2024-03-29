@extends('frontend.includes.main')

@section('content')

<!-- BREADCRUMB -->
	<div id="breadcrumb" class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-12">
					<ul class="breadcrumb-tree">
						<li><a href="{{ route('index') }}">Home</a></li>
						<li>Products</li>
						
					</ul>
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
<!----------------- /BREADCRUMB --------------------->

<!-------- SECTION  Category Search-------------------------->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row" style="margin-left: -20px;">
				<!-- ASIDE -->
				<div id="aside" class="col-md-3" style="width:20%;">
					<!-- aside Widget -->
					<div class="aside">
						<h3 class="aside-title">Categories</h3>
						<div class="checkbox-filter">
							@forelse ( $categories as  $category)
								<div class="input-checkbox">
									<input type="checkbox" id="category-1">
									<label for="category-1">
										<span></span>
										 {{$category->title}}
										<small> (  {{ $category->products->count() }} )</small>
									</label>
								</div>
							  @empty
							  <label>No Category Found.</label>
							 @endforelse
						</div>
					</div>
					<!-- /aside Widget -->

					<!-- aside Widget Price Search-->
					<div class="aside">
						<h3 class="aside-title">Price</h3>
						<div class="price-filter">
							<div id="price-slider"></div>
							<div class="input-number price-min">
								<input id="price-min" type="number">
								<span class="qty-up">+</span>
								<span class="qty-down">-</span>
							</div>
							<span>-</span>
							<div class="input-number price-max">
								<input id="price-max" type="number">
								<span class="qty-up">+</span>
								<span class="qty-down">-</span>
							</div>
						</div>
					</div>
					<!-- /aside Widget -->

					<!-- aside Widget Brands Search -->
					<div class="aside">
						<h3 class="aside-title">Brand</h3>
						<div class="checkbox-filter">
							<div class="input-checkbox">
								<input type="checkbox" id="brand-1">
								<label for="brand-1">
									<span></span>
									SAMSUNG
									<small>(578)</small>
								</label>
							</div>					
						</div>
					</div>
					<!-- /aside Widget -->				
				</div>
				<!-- ASIDE -->
	<!---------------- STORE ------------------------->
				<div id="store" class="col-md-9" style="width:80%;">
					<!-- store top filter -->
					<!-- <div class="store-filter clearfix">
						<div class="store-sort">
							<label>
								Sort By:
								<select class="input-select">
									<option value="0">Popular</option>
									<option value="1">Position</option>
								</select>
							</label>

							<label>
								Show:
								<select class="input-select">
									<option value="0">20</option>
									<option value="1">50</option>
								</select>
							</label>
						</div>
						<ul class="store-grid">
							<li class="active"><i class="fa fa-th"></i></li>
							<li><a href="#"><i class="fa fa-th-list"></i></a></li>
						</ul>
					</div> -->
					<!-- /store top filter -->

					<!-- store products -->
					<div class="row">
					@if(count($products) > 0 or count($datas) > 0 )
						@foreach ( $products as  $product)
						<!-- product -->
						<div class="col-md-4 col-6">
							<div class="product">
								<div class="product-img">
									<a href="{{ route('productShow',$product->product_slug) }}"> <img src="{{ asset('Products/uploads/'. $product->product_image) }}" alt="" style="height:300px; width: 310px;"></a>
									<div class="product-label">
										<span class="sale">-30%</span>
										
									</div>
								</div>
								<div class="product-body">
									<p class="product-category">{{ $product->category->title}}</p>
									<h3 class="product-name">
										<a href="{{ route('productShow',$product->product_slug) }}"> 
											{{$product->product_name}}
										</a>
									</h3>
									<h4 class="product-price">Rs.{{ $product->product_price}}<del class="product-old-price">Rs.{{ $product->product_price}}</del></h4>
									@if ($product->reviews->count() == 0)
										<strong>No Review(s) Yet.</strong>
									@else
										<div class="product-rating">
											@php
												$avg_rating = $product->reviews->avg('rating');
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
										
										<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
									</div>
								</div>
								<div class="add-to-cart">
									<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
								</div>
							</div>
						</div>
						 
						<!-- /product -->
						@endforeach


						@foreach ( $datas as $category)
							<h3> {{$category->title}}<span style="font-size: 18px;font-wight: 10px;font-weight: normal;"> ({{$category->products->count()}})</span></h3>
							 @forelse ( $category->products as  $product)
						<!-- product -->
						<div class="col-md-4 col-6">
							<div class="product">
								<div class="product-img">
									<a href="{{ route('productShow',$product->product_slug) }}"> <img src="{{ asset('Products/uploads/'. $product->product_image) }}" alt="" style="height:300px; width: 310px;"></a>
									<div class="product-label">
										<span class="sale">-30%</span>
										
									</div>
								</div>
								<div class="product-body">
									<p class="product-category">{{ $product->category->title}}</p>
									<h3 class="product-name">
										<a href="{{ route('productShow',$product->product_slug) }}"> 
											{{$product->product_name}}
										</a>
									</h3>
									<h4 class="product-price">Rs.{{ $product->product_price}}<del class="product-old-price">Rs.{{ $product->product_price}}</del></h4>
									@if ($product->reviews->count() == 0)
										<strong>No Review(s) Yet.</strong>
									@else
										<div class="product-rating">
											@php
												$avg_rating = $product->reviews->avg('rating');
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
										
										<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
									</div>
								</div>
								<div class="add-to-cart">
									<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
								</div>
							</div>
						</div>
							@empty
							<span>No Products Found.</span>
						  	@endforelse
						<!-- /product -->
						@endforeach
					@else
						<span>No Search Found.</span>
					@endif
					</div>
					<!-- /store products -->

					<!-- store bottom filter -->
					{{$products->links()}}
					<!-- /store bottom filter -->
				</div>
				<!-- /STORE -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
		<!-- /SECTION -->


 @endsection
 @section('javas')

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
 	@endif
 	Success Msg With Sweet Alert
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

  @endsection --}}