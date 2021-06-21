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
							<li><a href="{{ route('productIndex') }}">Home</a></li>
							<li><a href="#">Product</a></li>
							<li class="active">{{ $product->product_name}}</li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
<!-- /BREADCRUMB -->

<!-- SECTION PRODUCT DETAILS-->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- Product main img -->
					<div class="col-md-5 col-md-push-2">
						<div id="product-main-img">
							<div class="product-preview">
								<img src="{{ asset('Products/uploads/'. $product->product_image) }}" alt="Product Image">
							</div>
						</div>
					</div>
					<!-- /Product main img -->

					<!-- Product thumb imgs -->
					<div class="col-md-2  col-md-pull-5">
						<div id="product-imgs">
							<div class="product-preview">
								<img src="{{ asset('Products/uploads/'. $product->product_image) }}" alt="">
							</div>
						</div>
					</div>
					<!-- /Product thumb imgs -->

					<!-- Product details -->
					<div class="col-md-5">
						<div class="product-details">
							<h2 class="product-name">{{ $product->product_name}}</h2>
							<div>
								 @if  ($product->reviews->count() == 0 )
								 	<strong>No Review(s) Found.</strong>
								 @else
								<div class="product-rating">
								
									@for($i = 0; $i < $t_rating; $i++)
										<i class="fa fa-star"></i>
							        @endfor
									@for($i = 0; $i < 5 - $t_rating; $i++)
						            	<i class="fa fa-star-o"></i>
							        @endfor  
												
								</div>
									<strong>{{ $product->reviews->count ()}} Review(s)</strong>
								 @endif
							</div>
							<div>
								<h3 class="product-price">{{$product->product_price}} <del class="product-old-price">{{$product->product_price}}</del></h3>
								<span class="product-available">In Stock</span>
							</div>
							<p>{{$product->product_details}}</p>
							<form method='Post' action="{{ route('addToCart', $product->id) }}" >
							@csrf
								<div class="add-to-cart">
									<div class="qty-label">
										Qty
										<div class="input-number">
											<input type="number" name= "product_quantity" value="{{ 1 ?? old ('product_quantity')}}" required>
											<span class="qty-up">+</span>
											<span class="qty-down">-</span>
										</div>
									</div>
									<button class="add-to-cart-btn" type="submit">
										<i class="fa fa-shopping-cart"></i> Add To Cart
									</button>
								</div>
							</form>

							<ul class="product-btns">
								<li><a href="#"><i class="fa fa-heart-o"></i> add to wishlist</a></li>
								
							</ul>

							<ul class="product-links">
								<li>Category:</li>
								<li><a href="{{ route('productCategory', $product->category->slug) }}">{{$product->category->title}}</a></li>
								
							</ul>

							<ul class="product-links">
								<li>Share:</li>
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="#"><i class="fa fa-envelope"></i></a></li>
							</ul>

						</div>
					</div>
					<!-- /Product details -->

					<!-- Product tab -->
					<div class="col-md-12">
						<div id="product-tab">
							<!-- product tab nav -->
							<ul class="tab-nav">
								<li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>
								<li><a data-toggle="tab" href="#tab2">Details</a></li>
								<li><a data-toggle="tab" href="#review">Reviews (3)</a></li>
							</ul>
							<!-- /product tab nav -->

							<!-- product tab content -->
							<div class="tab-content">
								<!-- tab1  -->
								<div id="tab1" class="tab-pane fade in active">
									<div class="row">
										<div class="col-md-12">
											<p>{{ $product->product_details}}</p>
										</div>
									</div>
								</div>
								<!-- /tab1  -->

								<!-- tab2  -->
								<div id="tab2" class="tab-pane fade in">
									<div class="row">
										<div class="col-md-12">
											<p>{{ $product->product_details}}</p>
										</div>
									</div>
								</div>
								<!-- /tab2  -->

<!------------------------------------------- tab3 Product Reviews Content ---------------------------------->
								<div id="review" class="tab-pane fade in">
									<div class="row">
										<!-- Rating -->
										
										<div class="col-md-3">
											@if( $product->reviews->count() != 0)
											<div id="rating">
												<div class="rating-avg">
													<span> {{$t_rating}}</span>
													<div class="rating-stars">
														@for($i = 0; $i < $t_rating; $i++)
															<i class="fa fa-star"></i>
												        @endfor
														@for($i = 0; $i < 5 - $t_rating; $i++)
											            	<i class="fa fa-star-o"></i>
												        @endfor  
													</div>
												</div>
 												
												<ul class="rating">
													<li>
														
														<div class="rating-stars">

															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
														</div>
														{{-- <div class="rating-progress">
															<div style="width: 80%;"></div>
														</div> --}}
														<span class="sum">{{ $rating5 }}</span>
													</li>
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o"></i>
														</div>
														{{-- <div class="rating-progress">
															<div style="width: 60%;"></div>
														</div> --}}
														<span class="sum">{{ $rating4 }}</span>
													</li>
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
														</div>
														{{-- <div class="rating-progress">
															<div></div>
														</div> --}}
														<span class="sum"><strong>{{ $rating3 }}</strong></span>
													</li>
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
														</div>
														{{-- <div class="rating-progress">
															<div></div>
														</div> --}}
														<span class="sum"><strong>{{ $rating2 }}</strong></span>
													</li>
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
														</div>
														{{-- <div class="rating-progress">
															<div></div>
														</div> --}}
														<span class="sum"><strong>{{ $rating1 }}</strong></span>
													</li>
												
												</ul>
												 

											</div>
											 @else 
											 <span>No Reviews Yet.</span>
											 @endif
										</div>

										<!-- /Rating -->

										<!-- Reviews -->
										<div class="col-md-6">
											<div id="reviews">
												<ul class="reviews">
													 @forelse( $product->reviews as $review)
													<li>
														<div class="review-heading">
															<h5 class="name">{{ $review->name}}</h5>
															<p class="date">{{ $review->created_at}}</p>
															  

															<div class="review-rating">
																 @php $rating = $review->rating; @endphp
																 
															         @for($i = 0; $i < $rating; $i++)
															            <i class="fa fa-star"></i>
															         @endfor
															         @for($i = 0; $i < 5 -  $rating; $i++)
															            <i class="fa fa-star-o"></i>
															         @endfor  
															</div>
														</div>
														<div class="review-body">
															<p>{{ $review->review_details}}</p>
														</div>
													</li>
													 @empty
													 <li>No Review(s) Found.</li>
													 @endforelse
												</ul>
												 @if( $product->reviews->count() != 0)
												<ul class="reviews-pagination">
													<li class="active">1</li>
													<li><a href="#">2</a></li>
													<li><a href="#">3</a></li>
													<li><a href="#">4</a></li>
													<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
												</ul>
												 @endif
											</div>
										</div>
										<!-- /Reviews -->

										<!-- Review Form -->
										<div class="col-md-3">
											<div id="review-form">
												<form class="review-form" method="post" action="{{ route('addReview',  $product->product_slug) }}">
													 @csrf
													<input class="input" type="text" placeholder="Your Name" name="name" value="{{old('name')}}" required>
													@error('name')
													    <div class="has-error" style="padding-left: 10px; background-color: red; border-radius: 5px;">{{ $message }}</div>
													@enderror
													<input class="input" type="email" placeholder="Your Email" name="email" value="{{old('email')}}">
													@error('email')
													    <div class="text-danger" style="padding-left: 10px; background-color: red; border-radius: 5px;">{{ $message }}</div>
													@enderror
													<textarea class="input" placeholder="Your Review" name='description' required=></textarea>
													@error('description')
													    <div class="has-error" style="padding-left: 10px; background-color: red; border-radius: 5px;">{{ $message }}</div>
													@enderror
													<div class="input-rating">
														<span>Your Rating: </span>
														<div class="stars">
															<input id="star5" name="rating" value="5" type="radio" required><label for="star5"></label>
															<input id="star4" name="rating" value="4" type="radio"><label for="star4"></label>
															<input id="star3" name="rating" value="3" type="radio"><label for="star3"></label>
															<input id="star2" name="rating" value="2" type="radio"><label for="star2"></label>
															<input id="star1" name="rating" value="1" type="radio"><label for="star1"></label>
															@error('rating')
															    <div class="has-error" style="padding-left: 10px; background-color: red; border-radius: 5px;">{{ $message }}</div>
															@enderror
														</div>
													</div>
													<button class="primary-btn">Submit</button>
												</form>
											</div>
										</div>
										<!-- /Review Form -->
									</div>
								</div>
								<!-- /tab3 Reviews Ends -->
							</div>
							<!-- /product tab content  -->
						</div>
					</div>
					<!-- /product tab -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- Section  Related Products-->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<div class="col-md-12">
						<div class="section-title text-center">
							<h3 class="title">Related Products</h3>
						</div>
					</div>


					<!-- product -->
					  @forelse ( $relatedProducts as $relproduct)
					<div class="col-md-3 col-xs-6">
						<div class="product">
							<div class="product-img">
								<img src="{{ asset('Products/uploads/'. $relproduct->product_image) }}" alt="">
							</div>
							<div class="product-body">
								<p class="product-category"> <a href ="{{ route('productCategory', $relproduct->category->slug ) }}" >{{ $relproduct->category->title}}</p>
								<h3 class="product-name">
									<a href={{ route('productShow', $relproduct->product_slug) }}>{{$relproduct->product_name}}
									</a>
								</h3>
								<h4 class="product-price">Rs. {{$relproduct->product_price}}
									<del class="product-old-price">Rs. {{$relproduct->product_price}}</del>
								</h4>
								<div class="product-rating">
								</div>
								<div class="product-btns">
									<button class="add-to-wishlist">
										<i class="fa fa-heart-o"></i>
										<span class="tooltipp">add to wishlist</span>
									</button>
									
									<button class="quick-view">
										<i class="fa fa-eye"></i>
										<a href="{{ route('productShow', $relproduct->product_slug) }}">
											<span class="tooltipp">quick view</span>
										</a>
									</button>
								</div>
							</div>
							<div class="add-to-cart">
								<button class="add-to-cart-btn">
									<i class="fa fa-shopping-cart"></i> add to cart
								</button>
							</div>
						</div>
					</div>
					 @empty
					 <p><STRONG>No Related Product(s) Found</STRONG></p>
					 @endforelse
					<!-- /product -->

				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /Section -->


@endsection

{{--  @section('javas')
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