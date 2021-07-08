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
                        <li><a href="{{ route('index') }}">{{ $siteName}}</a></li>
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
        @yield('content')

        @include('frontend.includes.footer')
        @include('frontend.includes.js')
            
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
        @if(session('status'))
        {
            <script type="text/javascript">
                Swal.fire({
                    icon: 'success',
                    title: 'Great',
                    text: '{{ session('status') }}'
                } )
            </script>
        }
        @endif
        </script>                 
    </body>
</html>
