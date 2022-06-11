var weekday = new Array(7);
weekday[0] = "SUNDAY";
weekday[1] = "MONDAY";
weekday[2] = "TUESDAY";
weekday[3] = "WEDNESDAY";
weekday[4] = "THURSDAY";
weekday[5] = "FRIDAY";
weekday[6] = "SATURDAY";

var month = new Array();
month[0] = "JAN";
month[1] = "FEB";
month[2] = "MAR";
month[3] = "APR";
month[4] = "May";
month[5] = "JUN";
month[6] = "JUL";
month[7] = "AUG";
month[8] = "SEP";
month[9] = "OCT";
month[10] = "NOV";
month[11] = "DEC";

let GLOBAL_TIMEIN_TIMEDATE = "";
let GLOBAL_TIMEOUT_TIMEDATE = "";
let GLOBAL_IS_TIMEIN = false;

// timein
let GLOBAL_TIMEIN = "";
let GLOBAL_TIMEIN_TIME = "";
let GLOBAL_TIMEIN_DAY = "";
let GLOBAL_TIMEIN_FULLDATE = "";

const TIME_IN_DIFFERENCE = 30;

const SUBJECT_TIME_IN_HOURS = $("#timeIn_data").val().split(':')[0];
const SUBJECT_TIME_IN_MIN = $("#timeIn_data").val().split(':')[1];

const SUBJECT_TIME_IN_DATE = new Date();


SUBJECT_TIME_IN_DATE.setHours(SUBJECT_TIME_IN_HOURS);
SUBJECT_TIME_IN_DATE.setMinutes(SUBJECT_TIME_IN_MIN);


const SUBJECT_TIME_OUT_HOURS = $("#timeOut_data").val().split(':')[0];
const SUBJECT_TIME_OUT_MIN = $("#timeOut_data").val().split(':')[1];

const SUBJECT_TIME_OUT_DATE = new Date();


SUBJECT_TIME_OUT_DATE.setHours(SUBJECT_TIME_OUT_HOURS);
SUBJECT_TIME_OUT_DATE.setMinutes(SUBJECT_TIME_OUT_MIN);


function getCurrentTimeIn() {
    let currentTimeDate = new Date();

 
    var hours   =  currentTimeDate.getHours();

    var minutes =  currentTimeDate.getMinutes();

    var date_minutes = moment(SUBJECT_TIME_IN_DATE).subtract(TIME_IN_DIFFERENCE, 'minutes').toDate();

    // time range of time in
    if(currentTimeDate >= date_minutes && currentTimeDate <= SUBJECT_TIME_IN_DATE){
        $("#time-in-button").show();
        $("#time-in-message").html("The Time In button appears 30 minutes after the specified time.");
        // $("#time-out-button").show();
    }
    else{
        $("#time-in-button").hide();
        $("#time-in-message").html(`The time in button will open 30 minutes before the scheduled time in.`);
        // $("#time-out-button").show();
    }


    minutes = minutes < 10 ? '0'+minutes : minutes;

    var AMPM = hours >= 12 ? 'PM' : 'AM';

    if(hours === 12){
        hours=12;

    }else{

        hours = hours%12;

    }

    var currentTime = `${hours}:${minutes}${AMPM}`;


    var currentDay = weekday[currentTimeDate.getDay()];

    var currentDate  = currentTimeDate.getDate();
    var currentMonth = month[currentTimeDate.getMonth()];
    var CurrentYear = currentTimeDate.getFullYear();

    var fullDate = `${CurrentYear}-${currentMonth}-${currentDate}`;

    var currentDateTmp = `${currentTimeDate.getFullYear()}-${currentTimeDate.getMonth()+1}-${currentDate}`;
    if(!GLOBAL_IS_TIMEIN){
        document.querySelector("#timeIn_time").innerHTML = currentTime;
        document.querySelector("#timeIn_day").innerHTML = currentDay;
        document.querySelector("#timeIn_date").innerHTML = fullDate;
        GLOBAL_TIMEIN_TIMEDATE =currentTimeDate;
    }
    else{
        document.querySelector("#timeIn_time").innerHTML = GLOBAL_TIMEIN_TIME;
        document.querySelector("#timeIn_day").innerHTML = GLOBAL_TIMEIN_DAY;
        document.querySelector("#timeIn_date").innerHTML = GLOBAL_TIMEIN_FULLDATE;
    }


    
    setTimeout(getCurrentTimeIn, 500);
}



// Timeout
function getCurrentTimeOut(){
    let currentTimeDate = new Date();

 
    var hours   =  currentTimeDate.getHours();

    var minutes =  currentTimeDate.getMinutes();
    minutes = minutes < 10 ? '0'+minutes : minutes;

     var AMPM = hours >= 12 ? 'PM' : 'AM';

    if(hours === 12){
        hours=12;

    }else{

        hours = hours%12;

    }

    var currentTime = `${hours}:${minutes}${AMPM}`;
    var currentDay = weekday[currentTimeDate.getDay()];

    var currentDate  = currentTimeDate.getDate();
    var currentMonth = month[currentTimeDate.getMonth()];
    var CurrentYear = currentTimeDate.getFullYear();

    var fullDate = `${CurrentYear}-${currentMonth}-${currentDate}`;

    var currentDateTmp = `${currentTimeDate.getFullYear()}-${currentTimeDate.getMonth()+1}-${currentDate}`;
    document.querySelector("#timeOut_time").innerHTML = currentTime;
    document.querySelector("#timeOut_day").innerHTML = currentDay;
    document.querySelector("#timeOut_date").innerHTML = fullDate;
    GLOBAL_TIMEOUT_TIMEDATE =currentTimeDate;

    
    setTimeout(getCurrentTimeOut, 500);
}


function populateData(){
    let formData = new FormData();
    formData.append('user_id',$("#user_id").val());
    console.log(...formData);
    $.ajax({
        url: '/fetchData',   
        data: formData,
        contentType:false,
        cache: false,
        processData:false,
        type: 'POST',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        success:function(data)
        {
            if(data.result == "success" && data.status == "timeIn"){
                GLOBAL_IS_TIMEIN = true;
                GLOBAL_TIMEIN = data.timeIn;
                GLOBAL_TIMEIN_TIME = data.timeIn_time;
                GLOBAL_TIMEIN_DAY = data.timeIn_day;
                GLOBAL_TIMEIN_FULLDATE = data.timeIn_fulldate;

                $("#time-in-button").removeClass('btn-success').addClass('btn-danger');
                $("#time-out-button").removeClass('btn-secondary').addClass('btn-success');
                $("#time-in-button").html('Running');
                $("#time-in-button").attr("disabled",true);
                $(".timein-card-header").html('Last Time In');
                $("#timeOut-div").fadeIn(200);
                $("#timeIn-div").fadeOut(200);
                document.querySelector("#timeIn_time").innerHTML = GLOBAL_TIMEIN_TIME;
                document.querySelector("#timeIn_day").innerHTML = GLOBAL_TIMEIN_DAY;
                document.querySelector("#timeIn_date").innerHTML = GLOBAL_TIMEIN_FULLDATE;
            }
            else if(data.result == "empty"){
                GLOBAL_IS_TIMEIN = false;
            }
            else{
                GLOBAL_IS_TIMEIN = false;
            }

        },
        error: function(e) {  
            console.log("ERROR ");
            console.log(e)      
        }
    });
}

window.initialized_dtr_script = function(){

    getCurrentTimeIn();
    getCurrentTimeOut();
    populateData();
    // test time indf
    $("#time-in-button").on("click",function(){
        let formData = new FormData();
        formData.append('user_id',$("#user_id").val());
        formData.append('subject_id',$("#subject_id").val());
        formData.append('timeIn',GLOBAL_TIMEIN_TIMEDATE);
        formData.append('timeIn_time',$("#timeIn_time").text());
        formData.append('timeIn_day',$("#timeIn_day").text());
        formData.append('timeIn_fulldate',$("#timeIn_date").text());
        console.log(...formData);
        $.ajax({
            url: '/timeIn',   
            data: formData,
            contentType:false,
            cache: false,
            processData:false,
            type: 'POST',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success:function(data)
            {
                if(data.result == "success"){
                    GLOBAL_IS_TIMEIN = true;
                    GLOBAL_TIMEIN = data.timeIn;
                    GLOBAL_TIMEIN_TIME = data.timeIn_time;
                    GLOBAL_TIMEIN_DAY = data.timeIn_day;
                    GLOBAL_TIMEIN_FULLDATE = data.timeIn_fulldate;
                    console.log(data);
                    $("#time-in-button").removeClass('btn-success').addClass('btn-danger');
                    $("#time-out-button").removeClass('btn-secondary').addClass('btn-success');
                    $("#time-in-button").html('Running');
                    $("#time-in-button").attr("disabled",true);
                    $("#time-out-button").attr("disabled",false);
                    $(".timein-card-header").html('Last Time In');
                    $("#timeOut-div").fadeIn(200);
                    $("#timeIn-div").fadeOut(200);
                    document.querySelector("#timeIn_time").innerHTML = GLOBAL_TIMEIN_TIME;
                    document.querySelector("#timeIn_day").innerHTML = GLOBAL_TIMEIN_DAY;
                    document.querySelector("#timeIn_date").innerHTML = GLOBAL_TIMEIN_FULLDATE;
                }
                else{
                    GLOBAL_IS_TIMEIN = false;
                    window.alert("THERES SOMETHING WRONG");
                }

            },
            error: function(e) {  
                console.log(e)      
            }
        });
    }); 
    $(".dtr-toggle-btn").on('click',function(){
        if($("#timeIn-div").is(":visible")){
            $("#timeIn-div").fadeOut(50);
            $("#timeOut-div").fadeIn(50);
        }
        else if($("#timeOut-div").is(":visible")){
            $("#timeOut-div").fadeOut(50);
            $("#timeIn-div").fadeIn(50);
        }
    });
    $("#time-out-button").on("click",function(){
        let formData = new FormData();
        formData.append('user_id',$("#user_id").val());
        formData.append('subject_id',$("#subject_id").val());
        formData.append('timeIn',GLOBAL_TIMEIN);
        formData.append('timeOut',GLOBAL_TIMEOUT_TIMEDATE);
        formData.append('timeOut_time',$("#timeOut_time").text());
        formData.append('timeOut_day',$("#timeOut_day").text());
        formData.append('timeOut_fulldate',$("#timeOut_date").text());

        let d1 = new Date(GLOBAL_TIMEOUT_TIMEDATE);
        let d2 = new Date(GLOBAL_TIMEIN);
        console.log("DATE: ", GLOBAL_TIMEIN);
        let hours = parseFloat(Math.abs(d1 - d2) / 36e5).toFixed(2) ;

        formData.append('number_hours',hours);
        console.log(...formData);
        $.ajax({
            url: '/timeOut',   
            data: formData,
            contentType:false,
            cache: false,
            processData:false,
            type: 'POST',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success:function(data)
            {
                if(data.result == "success"){
                    GLOBAL_IS_TIMEIN = false;
                    $("#time-in-button").removeClass('btn-danger').addClass('btn-success');
                    $("#time-out-button").removeClass('btn-success').addClass('btn-secondary');
                    $("#time-in-button").html('TIME IN');
                    $("#time-in-button").attr("disabled",false);
                    $("#time-out-button").attr("disabled",true);
                    $(".timein-card-header").html('TIME IN');
                    $("#timeOut-div").fadeOut(200);
                    $("#timeIn-div").fadeIn(200);
                }
                else if(data.result == 'failed'){
                    window.alert("Please do time in first!");
                }

            },
            error: function(e) {  
                console.log(e)      
            }
        });
    });    
}


 