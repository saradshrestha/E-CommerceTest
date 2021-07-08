<!-- FOOTER -->
	<footer id="footer">
		<!-- top footer -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-3 col-xs-6">
						<div class="footer">
							<h3 class="footer-title">About Us</h3>
							<p>This is a test ecommeerce website. This section is used to brief about the site.</p>
							<ul class="footer-links">
								<li><a href="#"><i class="fa fa-map-marker"></i>{{ 'Naxal, Kathmandu' ?? $siteAddress}}</a></li>
								<li><a href="#"><i class="fa fa-phone"></i>{{ $sitePhone}}</a></li>
								<li><a href="#"><i class="fa fa-envelope-o"></i>{{ $siteEmail}}</a></li>
							</ul>
						</div>
					</div>

					<div class="col-md-3 col-xs-6">
						<div class="footer">
							<h3 class="footer-title">Categories</h3>
							<ul class="footer-links">

									@forelse ( $categories as  $category)
										<li><a href="{{ route('productCategory',$category->slug) }}">{{ $category->title }}</a></li>
								    @empty
								    <li>No Categories Listed</li>
								    @endforelse
							</ul>
						</div>
					</div>

					<div class="clearfix visible-xs"></div>

					<div class="col-md-3 col-xs-6">
						<div class="footer">
							<h3 class="footer-title">Information</h3>
							<ul class="footer-links">
								<li><a href="#">About Us</a></li>
								<li><a href="#">Contact Us</a></li>
								<li><a href="#">Privacy Policy</a></li>
								<li><a href="#">Orders and Returns</a></li>
								<li><a href="#">Terms & Conditions</a></li>
							</ul>
						</div>
					</div>

					<div class="col-md-3 col-xs-6">
						<div class="footer">
							<h3 class="footer-title">Service</h3>
							<ul class="footer-links">
								<li><a href="#">My Account</a></li>
								<li><a href="#">View Cart</a></li>
								<li><a href="#">Wishlist</a></li>
								<li><a href="#">Track My Order</a></li>
								<li><a href="#">Help</a></li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /top footer -->

		
	</footer>
<!-- /FOOTER -->
