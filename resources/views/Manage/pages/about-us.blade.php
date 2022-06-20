@extends('Manage.layouts.public-app')

@section('content')

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{asset('/Manage/css/about-us1.css')}}" type="text/css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>

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
			<div class="col-lg-8">
				<img src="Manage/img/about.png" alt="image">
			</div>
			<div class="col-lg-4">
        <h1>Our Attendance <br>System</h1>
				<p>There is an increasing trend for higher education institutions to be expected to monitor student attendance on the assumption that better
			  attendance leads to higher retention rates, higher marks, and more satisfying educational experience.
        </p>			
			</div>
			</div>
		</div>
	</div>

<section class="features" id="features">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 wow fadeIn">
				<h2>WHO WE ARE</h2>
			</div>
			<div class="col-md-3 col-sm-6 wow fadeInLeft">
				<div class="single-service">
					<p><img src="Manage\img\jheno.jpg"></p>
						<h3>Jheno Cerbito</h3>
					<p>Main Programmer/Developer</p>
				</div>
			</div>
      <div class="col-md-3 col-sm-6 wow fadeInLeft">
				<div class="single-service">
					<p><img src="Manage\img\dana.jpg"></p>
					  <h3>Dana Miranda</h3>
					<p>Documentation and UI Developer</p>
				</div>
			</div>
			<div class="col-md-3 col-sm-6 wow fadeInRight">
				<div class="single-service">
					<p><img src="Manage\img\janine.jpg"></p>
				  <h3>Janine Erika Salazar</h3>
				  <p>UI Developer</p>			
				</div>
			</div>
			<div class="col-md-3 col-sm-6 wow fadeInRight">
				<div class="single-service">
					<p><img src="Manage\img\tricia.jpg"></p>
					<h3>Tricia Blanca</h3>
					<p>UI Developer</p>		
				</div>
			</div>
      <div class="col-md-3 col-sm-6 wow fadeInRight">
				<div class="single-service">
					<p><img src="Manage\img\jaz.jpg"></p>
					<h3>Jazmin Tan</h3>
					<p>Documentation and UI Developer</p>		
				</div>
			</div>
      <div class="col-md-3 col-sm-6 wow fadeInRight">
			  <div class="single-service">
					<p><img src="Manage\img\kier.jpg"></p>
					<h3>Kier Miguel Deloria</h3>
					<p>UI Developer</p>	
				</div>				
      </div>
      <div class="col-md-3 col-sm-6 wow fadeInRight">
        <div class="single-service">
          <p><img src="Manage\img\hadi.jpg"></p>
          <h3>Sophia Miguela Hadi</h3>
          <p>UI Developer</p>    
        </div>				
      </div>
      <div class="col-md-3 col-sm-6 wow fadeInRight">
        <div class="single-service">
          <p><img src="Manage\img\kyle.jpg"></p>
          <h3>Kyle Go</h3>
          <p>UI Developer</p>    
        </div>				
      </div>
		</div>
	</div>
</section>

<section id="faqs">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 offset-lg-2">
        <h1> FAQ's </h1>
        <div class="accordion mt-5" id="accordionExample">
          <div class="card">
            <div class="card-header" id="headingOne">
              <h2 class="clearfix mb-0">
                <a class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Can I assign an administrator account?
                </a>
              </h2>
            </div>

            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
              <div class="card-body">
              No, Administrator account can only change, edit, delete and view users status in the attendance system.
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" id="headingTwo">
              <h2 class="clearfix mb-0">
                <a class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                Can I set a student account as an administrator?
                </a>
              </h2>
            </div>

            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
              <div class="card-body">
                Currently, our system does not inlcude that function. But you can create another administrator account.
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" id="headingThree">
              <h2 class="clearfix mb-0">
                <a class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                Is your system responsive?
                </a>
              </h2>
            </div>

            <div id="collapseThree" class="collapse" aria-labelledby="headingThree " data-parent="#accordionExample">
              <div class="card-body">
                Of course! Perhaps there are some minimal flaws in the error that can be encountered in the UI but, we are working on it.    
              </div>          
            </div>
          </div>
          <div class="card">
            <div class="card-header" id="headingFour">
              <h2 class="clearfix mb-0">
                <a class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                Is it possible to see all the login, register, time in and time out of a user?
                </a>
              </h2>
            </div>

            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
              <div class="card-body">
                Fortunately, yes! You can see it in dashboard of an administrator account.              
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" id="headingFive">
              <h2 class="clearfix mb-0">
                <a class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                Can I search data easily in this web system?
                </a>
              </h2>
            </div>

            <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
              <div class="card-body">
              Of course! Each user dashboard has a 'search' bar to fetch data you need.            
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


	

@endsection

@push('scripts')

@endpush
