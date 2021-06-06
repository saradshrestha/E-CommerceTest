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
                        @auth
                            <li><a href="{{ route('showProfile',auth()->user()->username) }}"><i class="fa fa-user-o"></i>Your Profile</a></li>
                            <li><a href="{{ route('logout') }}"><i class="fa fa-power-off"></i>
                             Logout</a></li>
                        @else
                            <li><a href="{{ route('login') }}"><i class="fa fa-sign-in"></i>Log In</a></li>
                        @endauth
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

         @yield ('breadcrumb')

        <!-- Section -->
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
                                <h5><a href="{{ route('viewOrders') }}">View Orders</a></h5>
                            </div>
                            <div class="sub-title" style="padding-bottom: 10px;">
                                <h5><a href="">Update Orders</a></h5>
                            </div>
                            <div class="sub-title" style="padding-bottom: 10px;">
                                <h5><a href="{{ route('changePassword') }}">Change Password</a></h5>                     
                            </div>
                        </div>
                        
                    </div>
        @yield('content')
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