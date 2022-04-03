@extends('Manage.layouts.public-app')

@section('content')
    <link rel="stylesheet" href="{{asset('/Manage/css/about-us.css')}}" type="text/css">

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
<div class="about-section">
  <p>Here's our Respective Team</p>
  <p>Developer and Designers for our Website!</p>
</div>

<div class="row">
  <div class="column">
    <div class="card">
      <img src="Manage/img/jheno.jpg" alt="Jheno" style="width:50%">
      <div class="container">
        <h2>Jheno Cerbito</h2>
        <p class="title">Web Developer</p>
        <p>Hi, I develop this website to help teachers!</p>
        <!-- <p>jheno@gmail.com</p> -->
        <p><button class="button">Contact</button></p>
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <img src="Manage/img/dana.jpg" alt="Dana" style="width:50%">
      <div class="container">
        <h2>Dana Miranda</h2>
        <p class="title">Web Designer</p>
        <p>Hi, I designed this website to help organize the interface!</p>
		<!-- <p>dana@gmail.com</p> -->
        <p><button class="button">Contact</button></p>
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <img src="Manage/img/janine.jpg" alt="Janine" style="width:50%">
      <div class="container">
        <h2>Janine Salazar</h2>
        <p class="title"> Web Designer</p>
        <p>Hi, I helped to design this website for additional enhancement for the interface!</p>
        <!-- <p>janine@gmail.com</p> -->
        <p><button class="button">Contact</button></p>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid about">
    <div class="row">
	     <div class="abt-us-logo">
            <img src="Manage/img/abt-img.png">
        </div>
        <div class="col-md-7">
            <h2>OUR ATTENDANCE SYSTEM</h2>
            <p class="col-md-6" class="p-5 border bg-transparent">There is an increasing trend for higher education institutions to be expected to monitor student attendance on the assumption that better
			attendance leads to higher retention rates, higher marks, and more satisfying educational experience.</p>
		</div>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>


@endsection

@push('scripts')

@endpush
