@extends('Manage.layouts.public-app')

<head>
<link rel="stylesheet" href="{{asset('Manage/css/attendance.css')}}" type="text/css">
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
<div class="container-fluid">
<div class="row">
    <input type="hidden" name="user_id" id="user_id" value="322"/>
    <div class="col-6 d-flex justify-content-center my-5">
        <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
            <div class="card-header bg-dark text-light">TIME IN</div>
            <div class="card-body">
                <h2 class="card-title" id="timeIn_time"></h2>
                <h5 class="card-title" id="timeIn_day"></h5>
                <p class="card-text">
                    <small>
                        You have successfully timein to your session, you may now proceed. Have a Good Day!   
                    </small>
                </p>
                <button class="btn btn-success w-100" id="time-in-button">Time In </button>
                <hr>
                <h5 class="card-title text-end" id="timeIn_date"></h5>
            </div>
        </div>
    </div>
    <div class="col-6 d-flex justify-content-center  my-5">
        <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
            <div class="card-header bg-dark text-light">TIME OUT</div>
            <div class="card-body">
                <h2 class="card-title" id="timeOut_time"></h2>
                <h5 class="card-title" id="timeOut_day"></h5>
                <p class="card-text">
                    <small>
                        You have been timeout from your session successfully, Goodbye! 
                    </small>
                </p>
                <button class="btn btn-secondary w-100" id="time-out-button">Timeout</button>
                <hr>
                <h5 class="card-title text-end" id="timeOut_date"></h5>
            </div>
        </div>
    </div>
</div>
</div>
</body>

@push('scripts')
<script type="text/javascript" src="{{ asset('js/dtr.js')}}"></script>
<script type="application/javascript">
$(document).ready(function(){
    window.initialized_dtr_script();
});
//     var weekday = new Array(7);
//     weekday[0] = "SUNDAY";
//     weekday[1] = "MONDAY";
//     weekday[2] = "TUESDAY";
//     weekday[3] = "WEDNESDAY";
//     weekday[4] = "THURSDAY";
//     weekday[5] = "FRIDAY";
//     weekday[6] = "SATURDAY";
    
//     var month = new Array();
//     month[0] = "JAN";
//     month[1] = "FEB";
//     month[2] = "MAR";
//     month[3] = "APR";
//     month[4] = "May";
//     month[5] = "JUN";
//     month[6] = "JUL";
//     month[7] = "AUG";
//     month[8] = "SEP";
//     month[9] = "OCT";
//     month[10] = "NOV";
//     month[11] = "DEC";
    
//     let GLOBAL_TIMEIN_TIMEDATE = "";
//     let GLOBAL_TIMEOUT_TIMEDATE = "";
//     let GLOBAL_IS_TIMEIN = false;

//     // timein
//     let GLOBAL_TIMEIN = "";
//     let GLOBAL_TIMEIN_TIME = "";
//     let GLOBAL_TIMEIN_DAY = "";
//     let GLOBAL_TIMEIN_FULLDATE = "";
//     function getCurrentTimeIn() {
//         let currentTimeDate = new Date();

     
//         var hours   =  currentTimeDate.getHours();

//         var minutes =  currentTimeDate.getMinutes();
//         minutes = minutes < 10 ? '0'+minutes : minutes;

//          var AMPM = hours >= 12 ? 'PM' : 'AM';

//         if(hours === 12){
//             hours=12;

//         }else{

//             hours = hours%12;

//         }

//         var currentTime = `${hours}:${minutes}${AMPM}`;
//         var currentDay = weekday[currentTimeDate.getDay()];

//         var currentDate  = currentTimeDate.getDate();
//         var currentMonth = month[currentTimeDate.getMonth()];
//         var CurrentYear = currentTimeDate.getFullYear();

//         var fullDate = `${currentDate} ${currentMonth} ${CurrentYear}`;

//         if(!GLOBAL_IS_TIMEIN){
//             document.querySelector("#timeIn_time").innerHTML = currentTime;
//             document.querySelector("#timeIn_day").innerHTML = currentDay;
//             document.querySelector("#timeIn_date").innerHTML = fullDate;
//             GLOBAL_TIMEIN_TIMEDATE = currentTimeDate;
//         }
//         else{
//             document.querySelector("#timeIn_time").innerHTML = GLOBAL_TIMEIN_TIME;
//             document.querySelector("#timeIn_day").innerHTML = GLOBAL_TIMEIN_DAY;
//             document.querySelector("#timeIn_date").innerHTML = GLOBAL_TIMEIN_FULLDATE;
//         }


        
//         setTimeout(getCurrentTimeIn, 500);
//     }
    


//     // Timeout
//    function getCurrentTimeOut(){
//         let currentTimeDate = new Date();

     
//         var hours   =  currentTimeDate.getHours();

//         var minutes =  currentTimeDate.getMinutes();
//         minutes = minutes < 10 ? '0'+minutes : minutes;

//          var AMPM = hours >= 12 ? 'PM' : 'AM';

//         if(hours === 12){
//             hours=12;

//         }else{

//             hours = hours%12;

//         }

//         var currentTime = `${hours}:${minutes}${AMPM}`;
//         var currentDay = weekday[currentTimeDate.getDay()];

//         var currentDate  = currentTimeDate.getDate();
//         var currentMonth = month[currentTimeDate.getMonth()];
//         var CurrentYear = currentTimeDate.getFullYear();

//         var fullDate = `${currentDate} ${currentMonth} ${CurrentYear}`;


//         document.querySelector("#timeOut_time").innerHTML = currentTime;
//         document.querySelector("#timeOut_day").innerHTML = currentDay;
//         document.querySelector("#timeOut_date").innerHTML = fullDate;
//         GLOBAL_TIMEOUT_TIMEDATE = currentTimeDate;

        
//         setTimeout(getCurrentTimeOut, 500);
//     }
    

//     function populateData(){
//         let formData = new FormData();
//         formData.append('user_id',$("#user_id").val());
//         console.log(...formData);
//         $.ajax({
//             url: '/fetchData',   
//             data: formData,
//             contentType:false,
//             cache: false,
//             processData:false,
//             type: 'POST',
//             headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
//             success:function(data)
//             {
//                 if(data.result == "success" && data.status == "timeIn"){
//                     GLOBAL_IS_TIMEIN = true;
//                     GLOBAL_TIMEIN = data.timeIn;
//                     GLOBAL_TIMEIN_TIME = data.timeIn_time;
//                     GLOBAL_TIMEIN_DAY = data.timeIn_day;
//                     GLOBAL_TIMEIN_FULLDATE = data.timeIn_fulldate;

//                     $("#time-in-button").removeClass('btn-success').addClass('btn-danger');
//                     $("#time-out-button").removeClass('btn-secondary').addClass('btn-success');
//                     $("#time-in-button").html('Running');
//                     $("#time-in-button").attr("disabled",true);
//                     $(".timein-card-header").html('Last Time In');
//                     document.querySelector("#timeIn_time").innerHTML = GLOBAL_TIMEIN_TIME;
//                     document.querySelector("#timeIn_day").innerHTML = GLOBAL_TIMEIN_DAY;
//                     document.querySelector("#timeIn_date").innerHTML = GLOBAL_TIMEIN_FULLDATE;
//                 }
//                 else if(data.result == "empty"){
//                     GLOBAL_IS_TIMEIN = false;
//                 }
//                 else{
//                     GLOBAL_IS_TIMEIN = false;
//                 }

//             },
//             error: function(e) {  
//                 console.log("ERROR ");
//                 console.log(e)      
//             }
//         });
//     }
//     $(document).ready(function() {
//         getCurrentTimeIn();
//         getCurrentTimeOut();
//         populateData();




//         $("#time-in-button").on("click",function(){
//             let formData = new FormData();
//             formData.append('user_id',$("#user_id").val());
//             formData.append('timeIn',GLOBAL_TIMEIN_TIMEDATE);
//             formData.append('timeIn_time',$("#timeIn_time").text());
//             formData.append('timeIn_day',$("#timeIn_day").text());
//             formData.append('timeIn_fulldate',$("#timeIn_date").text());
//             console.log(...formData);
//             $.ajax({
//                 url: '/timeIn',   
//                 data: formData,
//                 contentType:false,
//                 cache: false,
//                 processData:false,
//                 type: 'POST',
//                 headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
//                 success:function(data)
//                 {
//                     if(data.result == "success"){
//                         GLOBAL_IS_TIMEIN = true;
//                         GLOBAL_TIMEIN = data.timeIn;
//                         GLOBAL_TIMEIN_TIME = data.timeIn_time;
//                         GLOBAL_TIMEIN_DAY = data.timeIn_day;
//                         GLOBAL_TIMEIN_FULLDATE = data.timeIn_fulldate;
//                         console.log(data);
//                         $("#time-in-button").removeClass('btn-success').addClass('btn-danger');
//                         $("#time-out-button").removeClass('btn-secondary').addClass('btn-success');
//                         $("#time-in-button").html('Running');
//                         $("#time-in-button").attr("disabled",true);
//                         $("#time-out-button").attr("disabled",false);
//                         $(".timein-card-header").html('Last Time In');
//                         document.querySelector("#timeIn_time").innerHTML = GLOBAL_TIMEIN_TIME;
//                         document.querySelector("#timeIn_day").innerHTML = GLOBAL_TIMEIN_DAY;
//                         document.querySelector("#timeIn_date").innerHTML = GLOBAL_TIMEIN_FULLDATE;
//                     }
//                     else{
//                         GLOBAL_IS_TIMEIN = false;
//                         window.alert("THERES SOMETHING WRONG");
//                     }

//                 },
//                 error: function(e) {  
//                     console.log(e)      
//                 }
//             });
//         }); 

//         $("#time-out-button").on("click",function(){
//             let formData = new FormData();
//             formData.append('user_id',$("#user_id").val());
//             formData.append('timeIn',GLOBAL_TIMEIN);
//             formData.append('timeOut',GLOBAL_TIMEOUT_TIMEDATE);
//             formData.append('timeOut_time',$("#timeOut_time").text());
//             formData.append('timeOut_day',$("#timeOut_day").text());
//             formData.append('timeOut_fulldate',$("#timeOut_date").text());

//             let d1 = new Date(GLOBAL_TIMEOUT_TIMEDATE);
//             let d2 = new Date(GLOBAL_TIMEIN);
//             console.log("DATE: ", GLOBAL_TIMEIN);
//             let hours = parseFloat(Math.abs(d1 - d2) / 36e5).toFixed(2) ;

//             formData.append('number_hours',hours);
//             console.log(...formData);
//             $.ajax({
//                 url: '/timeOut',   
//                 data: formData,
//                 contentType:false,
//                 cache: false,
//                 processData:false,
//                 type: 'POST',
//                 headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
//                 success:function(data)
//                 {
//                     if(data.result == "success"){
//                         GLOBAL_IS_TIMEIN = false;
//                         $("#time-in-button").removeClass('btn-danger').addClass('btn-success');
//                         $("#time-out-button").removeClass('btn-success').addClass('btn-secondary');
//                         $("#time-in-button").html('TIME IN');
//                         $("#time-in-button").attr("disabled",false);
//                         $("#time-out-button").attr("disabled",true);
//                         $(".timein-card-header").html('TIME IN');
//                     }
//                     else if(data.result == 'failed'){
//                         window.alert("Please do time in first!");
//                     }

//                 },
//                 error: function(e) {  
//                     console.log(e)      
//                 }
//             });
//         });    
//     });


     
</script>
@endpush