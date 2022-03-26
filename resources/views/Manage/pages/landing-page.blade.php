@extends('Manage.layouts.public-app')

@section('content')

<head>
    <meta charset="uft-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('Manage/css/landing.css')}}" type="text/css">
</head>
<body>
    <section id="navbar bg-danger">
        <nav class="navbar navbar-expand-lg bg-gradient-default  py-3">
            <div class="container ">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <span>Attendance System</span>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
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

    <div class="container">
        <div class="row custom-section align-items-center">
            <div class="col-lg-4">
                <h2>School Attendance <br> System</h2>
                <p> Absents leads to bad academic performance and well being. School attendance system monitors each student's arrival in school.
                It allows teachers and administrators having a clear overview of classroom and individuals’ attendance rates anytime, anywhere.</p>
                <button type="button" class="btn btn-outline-primary">Get Started</button>
            </div>
            <div class="col-lg-8">
                <img src="Manage/img/time.png" class="img-fluid" alt="School Attendance Banner">
            </div>
            
        </div>
    </div>
</body>

@endsection

@push('scripts')

@endpush
