@extends('Manage.layouts.public-app')
@section('content')
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('Manage/css/style.css')}}" type="text/css">

  </head>
  
  <body>
  
    <section id="navbar bg-danger">
        <nav class="navbar navbar-expand-lg bg-gradient-default  py-3">
            <div class="container ">
                <a class="navbar-brand text-white" href="{{ route('home') }}">
                    <span> <b> Attendance System </b></span>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars text-light"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item  ">
                            <a class="nav-link text-white" href="{{ route('home') }}">HOME</a>
                        </li>
                        <li class="nav-item  ">
                            <a class="nav-link text-white" href="{{ route('about-us') }}">ABOUT US</a>
                        </li>
                        <li class="nav-item  ">
                            <a class="nav-link text-white" href="{{ route('login') }}">LOG IN</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </section>
  
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-12 col-xs-12 col-md-12 col-lg-6 col-xl-6 ">
          <img src="{{ asset('Manage/img/login.png') }}" alt="Image" class="img-fluid ">
        </div>
        <div class="col-12 col-sm-12 col-xs-12 col-md-12 col-lg-6 col-xl-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              
              <div class="mb-4">
                <div class="text-center py-3"><h1 class="display-5">{{ __('SIGN IN') }}</h1></div>
               
                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <strong>STOP!</strong>{{ session('error') }}
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                @endif
              </div>
            <form method="POST" action="{{ route('login') }}">
              @csrf
              <div class="form-group first">
                <input id="email" type="email" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email" autofocus>
                @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
               
              </div>
              <div class="form-group last mb-4">
                

                            <div class="col-7 p-0 m-0">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                
              </div>
              
              <div class="d-flex mb-5 align-items-center" style="margin-left: 20px;">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
              </div>

              <div class="form-group row mb-0">
                            <div class="col-12 d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary btn-block mx-3 border-0">
                                    {{ __('LOG IN') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
              </div>
              
              
            </div>
          </div>
          
        </div>
        
      </div>
    </div>
  </div>

  
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
@endsection