

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title> Contact App</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">

        <!-- App css -->
        <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />

    </head>

    <body class="authentication-bg bg-gradient">

            <div class="account-pages mt-5 pt-5 mb-5">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8 col-lg-6 col-xl-5">
                            <div class="card bg-pattern">
    
                                <div class="card-body p-4">
                                    
                                    <div class="text-center w-75 m-auto">
                                        <h2> Contact App</h2>
                                        <h5 class="text-uppercase text-center font-bold mt-4">Sign In</h5>

                                    </div>

                                    @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                     @endif
    
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
            
                                        <div class="mb-3">
                                            <label for="email" class="form-label">{{ __('Email') }}</label>
                                            <input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />

                                            @error('email')

                                           <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                                 
                                            @enderror
                                            
                                        </div>
            
                                        <div class="mb-3">
                                            <label for="password" class="form-label">{{ __('Password') }}</label>
                                            <input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" />
                                        

                                            @error('password')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        
                                        </div>
            
                                        <div class="mb-3 form-check">
                                            <input id="remember_me" class="form-check-input" type="checkbox" name="remember" />
                                            <label class="form-check-label" for="remember_me">{{ __('Remember me') }}</label>
                                        </div>
            
                                        <div class="d-flex justify-content-end">
                                            @if (Route::has('password.request'))
                                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                                    {{ __('Forgot your password?') }}
                                                </a>
                                            @endif
            
                                            <button type="submit" class="btn btn-primary ms-4">{{ __('Log in') }}</button>
                                        </div>
                                    </form>
    
                                    <div class="row mt-4">
                                        <div class="col-sm-12 text-center">
                                            <p class="text-muted mb-0">Don't have an account? <a href="{{route('register')}}" class="text-dark ml-1"><b>Sign Up</b></a></p>
                                        </div>
                                    </div>

    
                                </div> <!-- end card-body -->
                            </div>
                            <!-- end card -->
    
                       
    
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- end container -->
            </div>
            <!-- end page -->


        <!-- Vendor js -->
        <script src="{{asset('assets/js/vendor.min.js')}}"></script>

        <!-- App js -->
        <script src="{{asset('assets/js/app.min.js')}}"></script>
        
    </body>
</html>
