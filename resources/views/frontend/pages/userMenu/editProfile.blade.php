
@extends('frontend.pages.userMenu.layouts')

@section('content')
<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row" style="margin-left: -20px;">
					<div class="col-md-12">
						<ul class="breadcrumb-tree">
							<li><a href="{{ route('index') }}">Home</a></li>
							<li><a>{{auth()->user()->name}}</a></li>
							<li><a>Profile Update</a></li>
							
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
<!-- /BREADCRUMB -->

<!-- SECTION -->
		<div class="section" style="height: 350px; border-left: solid 1px gainsboro; padding-top: 0px;">
			<!-- container -->
			<div class="container" style="height: 100%;">
				<!-- row -->
				<div class="row" style="margin-left: -20px; height: 100%;">
					<!-- ASIDE -->
					<div id="aside" class="col-md-3" style="width:20%;">
						<!-- aside Widget -->
						<div class="aside">
							<h3 class="title" style="padding-bottom: 30px;">Menu</h3>

							<div class="sub-title" style=" padding-bottom: 10px;">
								<h5><a href = "" >Update Profile</a></h5>
							</div>
							<div class="sub-title" style="padding-bottom: 10px;">
								<h5><a href="">View Orders</a></h5>
							</div>
							<div class="sub-title" style="padding-bottom: 10px;">
								<h5><a href="">Update Orders</a></h5>
							</div>
							<div class="sub-title" style="padding-bottom: 10px;">
								<h5><a href="">Change Password</a></h5>						
							</div>
						</div>
						
					</div>
					<!-- /ASIDE -->

					<!-- User -->
					<div class="col-md-9" style="width:80%; height: 100%;border-left: solid 1px gainsboro;">
						
						

						
						<div class="row">
							<!-- user details -->
							
							<div class="col-md-9">
								<div class="user">
									<div class="title" style="padding-bottom: 30px;">
									<h3><center>User Details</center></h3>
									</div>
									<div class="table" style="margin-left: 100px">
									<table>
										<tr >
											<th style="padding-right:50px;padding-bottom:10px; ">Name :</th>
											<td style="padding-right:50px;padding-bottom:10px">{{Auth::user()->name}}</td>
										</tr>
										<tr >
											<th style="padding-right:50px;padding-bottom:10px">Email :</th>
											<td style="padding-right:50px;padding-bottom:10px">{{Auth::user()->email}}</td>
										</tr>
										<tr >
											<th style="padding-right:50px;padding-bottom:10px">Phone :</th>
											<td style="padding-right:50px;padding-bottom:10px">{{Auth::user()->name}}</td>
										</tr>
										<tr >
											<th style="padding-right:50px;padding-bottom:10px ">Gender :</th>
											<td style="padding-right:50px;padding-bottom:10px">{{Auth::user()->name}}</td>
										</tr>
										<tr >
											<th style="padding-right:50px;padding-bottom:10px">Address :</th>
											<td style="padding-right:50px;padding-bottom:10px">{{Auth::user()->name}}</td>
										</tr>
										
									</table>
								</div>
									
								</div>
							</div>
							
							<!-- /user details -->

							
							
						</div>
						

						
					</div>
					<!-- /User -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

        @endsection     


       


