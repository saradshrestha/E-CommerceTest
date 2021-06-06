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
            <div class="col-12" style="margin:50px 300px 180px 300px;">
                <div width=100%>
                    <div class="row justify-content-center">
                        <div class="col-md-8" style="width: 100%;">
                            <div class="card">
                                <div class="card-header" style="padding-bottom: 50px;text-align: center;font-weight: bold;font-size: xx-large;">
                                    <center>User Login</center>
                                </div>

                                <div class="card-body" style="padding: 50px 50px 50px 50px;border: solid 2px beige;">
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf

                                        <div class="form-group row">
                                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                            <div class="col-md-6">
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                            <div class="col-md-6">
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-6 offset-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                    <label class="form-check-label" for="remember">
                                                        {{ __('Remember Me') }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row ">
                                            <div class="col-md-6" style="padding: 10px 20px 30px 280px;">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Login') }}
                                                </button>
                                            </div>
                                            <div class="col-md-6" style="padding-left: 150px;padding-top: 10px;">

                                                @if (Route::has('password.request'))
                                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                                        {{ __('Forgot Your Password?') }}
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row ">
                                            New User ? <a href="{{ route('register') }}"> Click Here To Create New Account.</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
