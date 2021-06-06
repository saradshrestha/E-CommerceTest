<!DOCTYPE html>
<html lang="en">
     @include('frontend.includes.head')
    <body>
        <header>
            <!-- TOP HEADER -->
            <div id="top-header">
                <div class="container">
                    <ul class="header-links pull-left">
                        <li><a href="#"><i class="fa fa-phone"></i> {{ $sitePhone}}</a></li>
                        <li><a href="#"><i class="fa fa-envelope-o"></i> {{ $siteEmail}}</a></li>
                        
                    </ul>
                    <ul class="header-links pull-right">
                        <li><a href="#">{{ $siteName}}</a></li>
                        <li><a href="{{ route('register') }}"><i class="fa fa-user-o"></i> Register New Account</a></li>
                    </ul>
                </div>
            </div>
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
                                <form>
                                    <input class="input" placeholder="Search here">
                                    <button class="search-btn">Search</button>
                                </form>
                            </div>
                        </div>
                        <!-- /SEARCH BAR -->

                        <!-- ACCOUNT -->
                        <div class="col-md-3 clearfix">
                            <div class="header-ctn">
                              

                             

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
        </header>
            <!-- /TOP HEADER -->
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

            


        @include ('frontend.includes.footer')
        @include ('frontend.includes.js')
            
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
        </script>                 
    </body>
</html>