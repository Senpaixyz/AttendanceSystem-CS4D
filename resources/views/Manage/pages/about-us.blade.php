@extends('Manage.layouts.public-app')

@section('content')
    <link rel="stylesheet" href="{{asset('/Manage/css/about-us1.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('/Manage/css/aboutus/animate.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('/Manage/css/aboutus/normalize.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('/Manage/css/aboutus/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('/Manage/css/aboutus/owl.carousel.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('/Manage/css/aboutus/owl.theme.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('/Manage/css/aboutus/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('/Manage/css/aboutus/responsive.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('/Manage/css/aboutus/main.css')}}" type="text/css">

    <!-- <section id="navbar bg-danger">
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

<div class="container-fluid about">
    <div class="row">
	    <div class="abt-us-logo">
            <img src="Manage/img/abt-img.png">
      </div>
      
</div>

<div class="" style="padding: 10px;text-align: center;width: 100%; background-color: black; margin:10px auto 10px auto;  ">
            <h1>ABOUT US</h1>
            <h2>OUR ATTENDANCE SYSTEM</h2>
            <p style="text-align: justify; margin: auto;width: 50%">There is an increasing trend for higher education institutions to be expected to monitor student attendance on the assumption that better
			attendance leads to higher retention rates, higher marks, and more satisfying educational experience.</p>
</div>
questions
<div class="ques1">
    <h1 class="t1">FAQs</h1>
  <div id="text">Can I assign an administrator account?</div>
  <div id="close">Yes! Simply go to Teachers List on the left side panel then 
        choose 'ACTION' then click the green icon 'edit'</div>
</div> 
<div class="ques1">
  <div id="text">Can I edit users account without administrators access?</div>
  <div id="close">No, Administrator account can only 
        change, edit, delete and view users status in the attendance system.</div>
</div> 
<div class="ques1">
  <div id="text">Can I set a student account as an administrator?</div>
  <div id="close">Currently, our system does not inlcude that function!
        but you can create another administrator account.</div>
</div> 
<div class="ques1">
  <div id="text">Is your system responsive?</div>
  <div id="close">Of course! perhaps there are some minimal flaws in the error that can be encountered in the UI 
        but, we are working on it.</div>
</div> 
<div class="ques1">
  <div id="text">Is it possible to see all the login, register, time in and time out of a user?</div>
  <div id="close">Fortunately, yes! You can see it in dashboard of an administrator account.</div>
</div> 
<div class="ques1">
  <div id="text">Can I search data easily in this web system?</div>
  <div id="close">Of course! Each user dashboard has a 'search' bar to fetch databases you need!</div>
</div> 
</div> -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
<!-- <footer>
<div class="box">
	<a class="button" href="#popup1">Any questions? Contact us to get your answer!</a>
</div>

<div id="popup1" class="overlay">
	<div class="popup">
    <h1 class="Emailtxt">Email Us:</h1>
        <input class="emailadd" type="user" name="emailadd" placeholder="Email Address" >
        <textarea class="writesome" id="subject" name="subject" placeholder="Write something.." ></textarea>
        <button class="submit" type="done" name="done">Submit</button>
        <a class="close" href="#">&times;</a>
		</div>
	</div>
</div>
</footer> -->

<section class="intro"  id="home">
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
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('home') }}">HOME</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('about-us') }}">ABOUT US</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('login') }}">LOG IN</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
			<!-- <div class="menu-bar menu">
				<div class="container">
					<div class="row">
						<div class="col-md-4">
							<div id="logo">		
								<a href=""><img src="Manage/img/aboutus-images/logo.png" alt="" title=""  height="23px" style="float: left;"/></a>
							</div>
						</div>
						<div class="col-md-8">
							<ul class="list-unstyled" id="main-menu">
								<li><a class="active" href="#home">Home</a></li>
								<li><a href="#features">Features</a></li>
								<li><a href="#testimonial">Testimonial</a></li>
								<li><a href="#screenshots">Screenshot</a></li>
								<li><a href="#clients">Clients</a></li>
								<li><a href="#subscribe">Subscribe</a></li>
								<li><a href="#contact">Contact</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div> -->
			<!-- Menu Ends here -->
			<div class="intro-content">
				<div class="container">
					<div class="row">
						<div class="col-md-4 col-sm-6 col-xs-12 intro-image">
							<img src="Manage/img/aboutus-images/abt-img.png" alt="" />
						</div>
						<div class="col-md-8 col-sm-6 col-xs-12 intro-texts">
            <h1>Our Attendance System</h1>
						<p sty>There is an increasing trend for higher education institutions to be expected to monitor student attendance on the assumption that better
			            attendance leads to higher retention rates, higher marks, and more satisfying educational experience.</p>
							
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Intro Section Ends -->
		
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
							<p>Main Developer/Programmer</p>
							
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
						<p><img src="Manage\img\ako.jpg"></p>
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
		<!-- Features Section Ends Here -->

    <div class="ques1">
    <h1 class="t1">FAQs</h1>
  <div id="text">Can I assign an administrator account?</div>
  <div id="close">Yes! Simply go to Teachers List on the left side panel then 
        choose 'ACTION' then click the green icon 'edit'</div>
</div> 
<div class="ques1">
  <div id="text">Can I edit users account without administrators access?</div>
  <div id="close">No, Administrator account can only 
        change, edit, delete and view users status in the attendance system.</div>
</div> 
<div class="ques1">
  <div id="text">Can I set a student account as an administrator?</div>
  <div id="close">Currently, our system does not inlcude that function!
        but you can create another administrator account.</div>
</div> 
<div class="ques1">
  <div id="text">Is your system responsive?</div>
  <div id="close">Of course! perhaps there are some minimal flaws in the error that can be encountered in the UI 
        but, we are working on it.</div>
</div> 
<div class="ques1">
  <div id="text">Is it possible to see all the login, register, time in and time out of a user?</div>
  <div id="close">Fortunately, yes! You can see it in dashboard of an administrator account.</div>
</div> 
<div class="ques1">
  <div id="text">Can I search data easily in this web system?</div>
  <div id="close">Of course! Each user dashboard has a 'search' bar to fetch databases you need!</div>
</div> 
</div> -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>

<div class="box">
	<a class="button" href="#popup1">Any questions? Contact us to get your answer!</a>
</div>

<div id="popup1" class="overlay">
	<div class="popup">
    <h1 class="Emailtxt">Email Us:</h1>
        <input class="emailadd" type="user" name="emailadd" placeholder="Email Address" >
        <textarea class="writesome" id="subject" name="subject" placeholder="Write something.." ></textarea>
        <button class="submit" type="done" name="done">Submit</button>
        <a class="close" href="#">&times;</a>
		</div>
	</div>
</div>
</footer>
		
	

@endsection

@push('scripts')

@endpush
