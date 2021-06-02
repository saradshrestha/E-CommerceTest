@extends('frontend.includes.main')

@section('content')

<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row" style="margin-left: -20px;">
					<div class="col-md-12">
						<ul class="breadcrumb-tree">
							<li><a href="{{ route('productIndex') }}">Home</a></li>
							<li><a>Categories</a></li>
							<li>{{ $category->title}}</li>
							
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

						<!-- aside Widget -->
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

						<!-- aside Widget -->
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
					<!-- /ASIDE -->

					<!-- STORE -->
					<div id="store" class="col-md-9" style="width:80%;">
						
						

						<!-- store products -->
						<div class="row">
							<!-- product -->
							@forelse($products as $product)
							<div class="col-md-4 col-xs-6">
								<div class="product">
									<div class="product-img">
										<a href="{{ route('productShow', $product->product_slug) }}">
										<img src="{{ asset('Products/uploads/'. $product->product_image) }}" alt="" style="height:300px; width: 310px;">
										<div class="product-label" >
											<span class="sale">-30%</span>
											
										</div>
										</a>
									</div>
									<div class="product-body">
										<p class="product-category">{{ $product->category->title}}</p>
										<h3 class="product-name">
											<a href="{{ route('productShow',  $product->product_slug) }}"></a>
											{{ $product->product_name}}
										</h3>
										<h4 class="product-price">{{ $product->product_price}} 
											<del class="product-old-price">
												{{ $product->product_price}}
											</del>
										</h4>
										<div class="product-rating">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
										</div>
										<div class="product-btns">
											<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
											<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
											<button class="quick-view">
												<a href={{ route('productShow', $product->product_slug) }}>
													<i class="fa fa-eye"></i><span class="tooltipp">quick view</span>
												</a>
											</button>
										</div>
									</div>
									
								</div>
							</div>
							 @empty
							 <h4><center>No Products Found.</center></h4>
							 @endforelse
							<!-- /product -->

							
							
						</div>
						<!-- /store products -->

						<!-- store bottom filter -->
						<div class="store-filter clearfix" style="align-items: center;">
							
								<center>{{$products->links()}}</center>
						
						</div>
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

  @endsection