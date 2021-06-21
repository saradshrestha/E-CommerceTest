	<!-- HEADER -->
		<header>
			<!-- TOP HEADER -->
			<div id="top-header">
				<div class="container">
					<ul class="header-links pull-left">
						<li><a href="#"><i class="fa fa-phone"></i> {{ $sitePhone}}</a></li>
						<li><a href="#"><i class="fa fa-envelope-o"></i> {{ $siteEmail}}</a></li>
						
					</ul>
					<ul class="header-links pull-right">
						
						@auth
							<li>
								<a href="{{ route('showProfile',auth()->user()->username) }}">
								<i class="fa fa-shopping-bag"></i>Your Orders
							</a>
							</li>
						 	<li>
						 		<a href="{{ route('showProfile',auth()->user()->username) }}"><i class="fa fa-user-o"></i>Your Profile
						 		</a>
						 	</li>
							<li>
								<a href="{{ route('logout') }}"><i class="fa fa-power-off"></i>
							 	Logout
								</a>
							</li>

						@else
							<li>
								<a href="{{ route('login') }}"><i class="fa fa-sign-in"></i>Log In</a>
							</li>
							<li>
								<a href="{{ route('register') }}"><i class="fa fa-user"></i>Sign Up</a>
							</li>
						@endauth
					</ul>
				</div>
			</div>
			<!-- /TOP HEADER -->

			<!-- MAIN HEADER -->
			<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-3">
							<div class="header-logo">
								<a href="#" class="logo">
									<img src="./img/logo.png" alt="">
								</a>
							</div>
						</div>
						<!-- /LOGO -->

						<!-- SEARCH BAR -->
						<div class="col-md-6">
							<div class="header-search">									
								<form action="{{route ('findSearch')}}" method ="post">
									 @csrf
									<input class="input" placeholder="Search here" name="search">
									<button class="search-btn" type="submit">Search</button>
								</form>
							</div>
						</div>
						<!-- /SEARCH BAR -->

						<!-- ACCOUNT -->
						<div class="col-md-3 clearfix">
							<div class="header-ctn">
								<!-- Wishlist -->
								<!-- <div>
									<a href="#">
										<i class="fa fa-heart-o"></i>
										<span>Your Wishlist</span>
										<div class="qty">2</div>
									</a>
								</div> -->
								<!-- /Wishlist -->

								<!-- Cart -->
								<div class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
										<i class="fa fa-shopping-cart"></i>
										<span>Your Cart</span>
										<div class="qty">{{ $carts->count()}}</div>
									</a>
									<div class="cart-dropdown">
										<div class="cart-list">
											@forelse( $carts as  $cart)
											<div class="product-widget">
												<div class="product-img">
													<img src="{{ asset('Products/uploads/'.$cart->product->product_image) }}" alt="">
												</div>
												<div class="product-body">
													<h3 class="product-name"><a href="{{ route('productShow', $cart->product->product_slug) }}">{{ $cart->product->product_name}}</a></h3>
													<h4 class="product-price"><span class="qty">{{ $cart->product_quantity}}x</span>{{ $cart->product->product_price }}</h4>
												</div>
												<form action="{{ route('removeCart', $cart->id  )}}" method="post">
													 @csrf
													<button class="delete"><i class="fa fa-close"></i></button>
												</form>
											</div>
											 @empty
											 <p><center>No Carts Found.</center></p>
											@endforelse
											
										</div>
										@if ( $carts->count() > 0)
										<div class="cart-summary">
											<small>{{ $carts->count()}} Products Selected</small>
											<h5></h5>
										</div>
										<div class="cart-btns">
											<a href="{{ route('showToCart') }}">View Cart</a>
											<a href="{{ route('showToCart') }}">Checkout  <i class="fa fa-arrow-circle-right"></i></a>
										</div>
										@endif
									</div>
								</div>
								<!-- /Cart -->

								<!-- Menu Toogle -->
								<div class="menu-toggle">
									<a href="#">
										<i class="fa fa-bars"></i>
										<span>Menu</span>
									</a>
								</div>
								<!-- /Menu Toogle -->
							</div>
						</div>
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->