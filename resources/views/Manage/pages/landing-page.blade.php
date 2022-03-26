@extends('Manage.layouts.public-app')

@section('content')

<link rel="stylesheet" href="{{asset('/Manage/css/landing.css')}}" type="text/css">


<nav class="navbar navbar-expand-lg py-3 navbar-light fixed-top">
    <div class="container">
        <a class="navbar-brand">Attendance System</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About Us</a>
                </li>
            </ul>
            <button class="btn btn-primary ml-lg-3"><a href="{{ route('login') }}" class="text-light">Log in</a></button>
        </div>
    </div>
</nav>

<div class="container-fluid banner">
    <div class="row">
        <div class="col-md-6">
            <h2>School Attendance System</h2>
            <p>Absents leads to bad academic performance and well being. School attendance system monitors each student's arrival in school.
            It allows teachers and administrators having a clear overview of classroom and individuals’ attendance rates anytime, anywhere. </p>
            <a class="btn">Get Started</a>
        </div>
        <div class="col-md-6">
            <img src="Manage/img/tm.png">
        </div>
    </div>
</div>

@endsection

@push('scripts')

@endpush
