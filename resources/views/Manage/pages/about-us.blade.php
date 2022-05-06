@extends('Manage.layouts.public-app')

@section('content')
    <link rel="stylesheet" href="{{asset('/Manage/css/about-us1.css')}}" type="text/css">

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

    <div class="card">
      <img src="Manage/img/jheno.jpg" alt="Jheno" style="width:100%">
      <div class="container">
        <h2>Jheno Cerbito</h2>
        <p class="title">Web Developer</p>
        <p class="jheno">Hi, I develop this website to help teachers!</p>
        <!-- <p>jheno@gmail.com</p> -->
        <label for="jequest" class="ja-btn">Contact</label>
      </div>
    </div>


    <div class="card">
      <img src="Manage/img/dana.jpg" alt="Dana" style="width:100%">
      <div class="container">
        <h2>Dana Miranda</h2>
        <p class="title">Web Designer</p>
        <p class ="dana">Hi, I designed this website to help organize the interface!</p>
		<!-- <p>dana@gmail.com</p> -->
        <button class="ja-btn">Contact</label>
      </div>
    </div>
 
    <div class="card">
      <img src="Manage/img/janine.jpg" alt="Janine" style="width:100%">
      <div class="container">
        <h2>Janine Salazar</h2>
        <p class="title"> Web Designer</p>
        <p class="janine">Hi, I helped to design this website for additional enhancement for the interface!</p>
        <!-- <p>janine@gmail.com</p> -->
		<!--button for contact us "janine"-->
        <button class="ja-btn">Contact</button>
		<!-- end -->
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
<!--questions-->
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
</div>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>

<footer>
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
