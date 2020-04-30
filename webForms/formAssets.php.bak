<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>


<!-- Chosen CSS -->
<link rel="stylesheet" href="../webForms/vendor/chosen/chosen.css?v=<?php echo time();?>">
<!-- BS DateTimePicker css -->
<link rel="stylesheet" href="../webForms/vendor/datetimepicker/bootstrap-datetimepicker.min.css?v=<?php echo time();?>">
<!-- Font Awesome Pro -->
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-j8y0ITrvFafF4EkV1mPW0BKm6dp3c+J9Fky22Man50Ofxo2wNe5pT1oZejDH9/Dt" crossorigin="anonymous">
<!-- Form Styles -->
<link rel="stylesheet" href="../webForms/css/form.css?v=<?php echo time();?>">



<!-- if back btn was pressed, location.reload(true) to then reload the page so
 that form fields are filled from the cookies set on thank you pages -->
<script type="text/javascript">
  if(performance.navigation.type == 2){
   location.reload(true);
  }
</script>

<!-- FORM MODAL !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
<!-- NOTE: data-keyboard="false" data-backdrop="static" to prevent the modal from closing onclick off the modal -->
<!-- data-keyboard="false" data-backdrop="static" -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog">
<div class="modal-dialog modal-content2 modal-lg" role="document">
  <div class="bluePatternBackForm p-5" id="respFormBlueBackground">
 <div class="modal-content" style="padding:2rem !important;background-color: #F2F2F2 !important;">
  <div class="modal-header mb-3">
   <button type="button" class="close mt-n5 mr-n5" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true" style="font-size: 45px; color:orange;opacity:1;">&times;</span>
   </button>
  </div>
  <div class="contact-modal-body" style="min-height: 600px;">
    <div class="formOutline pt-5">
    <!-- THE FORM !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
    <?php include 'form.php'; ?>
  </div>
  </div>
 </div>
</div>
</div>
</div>

<!-- Moment js -->
<script src="../webForms/vendor/moment/moment.min.js" charset="utf-8"></script>

<!-- DateTimePicker js -->
<script src="../webForms/vendor/datetimepicker/bootstrap-datetimepicker.min.js" charset="utf-8"></script>

<!-- Script for the datetimerpicker -->
<script type="text/javascript">
  if (/Mobi/.test(navigator.userAgent)) {
    // if mobile device, use native pickers
    $(".date input").attr("type", "date");
    $(".time input").attr("type", "time");
  } else {
    // if desktop device, use DateTimePicker
    $(".dateInput").datetimepicker({
      useCurrent: false,
      format: "LL",
      icons: {
        // next: "fa fa-chevron-right",
        // previous: "fa fa-chevron-left"
        next: "local-fa-chevron-right",
        previous: "local-fa-chevron-left"
      }
    });

    $(".timeInput").datetimepicker({
    format: "LT",
    icons: {
      up: "fa fa-chevron-up",
      down: "fa fa-chevron-down"
      // up: "local-fa-chevron-up",
      // down: "local-fa-chevron-down"
      }
    });
  }
</script>

<!-- Chosen js -->
<script src="../webForms/vendor/chosen/chosen.jquery.js?v=<?php echo time();?>" charset="utf-8"></script>

<!-- init chosen -->
<script type="text/javascript">
  var config = {
    '.chosen-select' : { width: '100%', disable_search_threshold: 10 }
  }
  for (var selector in config) {
    $(selector).chosen(config[selector]);
  }
</script>


<!-- FORM BEHAVIOR js -->
<!-- SHOW/HIDE FORM ELEMENTS BASED ON BTN CLICK !!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
<!-- && also cookie code -->
<script type="text/javascript">
 $(function(){

  // Show the correct heading in the form modal based on what btn clicked
  // Show or hide form fields && set the form action

   // CLICK ON TOUR BTN
   $("#scheduleATourBtn, #scheduleATourBtn2, #scheduleATourBtn3, #scheduleATourBtn4, #scheduleATourBtn5, #scheduleATourBtn6, #scheduleATourBtn7, #scheduleATourBtn8, #scheduleATourBtn9, #scheduleATourBtn10, #scheduleATourBtn11, #scheduleATourBtn12, #scheduleATourBtn13, #scheduleATourBtn14").click(function(){
     console.log('click on #scheduleATourBtn');
    // Show correct heading in modal
    $('.contactModalTitle').css('display', 'none');
    $('.tourModalTitle').css('display', 'block');
    // Show date and time inputs
    $(".dateCol").show();
    $(".timeCol").show();
    // hide reason dropdown
    $(".reason").hide();
    // show reschedule your tour heading on form
    $('#rescheduleHeading').css('display', 'block');

   // SET THE REASON FIELD TO .. 'REQUEST INFORMATION' so that
   // it validates and the tour form can be submitted (reason select
   // is not shown on the tour form)
   $("#reason").val('Request information');

    // show tour submit btn / hide contact submit btn
    $('#tourSubmitBtn').css('display', 'block');
    $('#contactSubmitBtn').css('display', 'none');
    // pass hidden form id to php to differentiate between tour/contact
    $('#formID').val('tour');

    // !important: Change form method to submit to correct thank you page
    $('#form').attr('action', '../thankyou-tour/index.php');
   });

   // CLICK ON CONTACT BTN
   $("#contactBtn, #contactBtn2, #contactBtn3, #contactBtn4, #contactBtn5, #contactBtn6, #contactBtn7, #contactBtn8, #contactBtn9").click(function(){
     console.log('click on #contactBtn or #contactBtn2');
    // Show correct heading in modal
    $('.contactModalTitle').css('display', 'block');
    $('.tourModalTitle').css('display', 'none');

    // make date/time inputs not required for contact form
    // vanilla js worked vs .removeAttr did not
    document.querySelector('.dateInput').required = false;
    document.querySelector('.timeInput').required = false;

    // Hide date and time inputs
    $('.dateCol').css('display', 'none');
    $('.timeCol').css('display', 'none');
    // show reason dropdown
    $('.reason').css('display', 'block');
    // hide reschedule your tour heading on form
    $('#rescheduleHeading').css('display', 'none');

    // make the date and time inputs validated, since form wont submit otherwise
    // $('.dateTimeRow').addClass('was-validated'); // NOT WORKING

    // show contact submit btn / hide contact tour btn
    $('#tourSubmitBtn').css('display', 'none');
    $('#contactSubmitBtn').css('display', 'block');
    // pass hidden form id to php to differentiate between tour/contact
    $('#formID').val('contact');

    // !important: Change form method to submit to correct thank you page
    $('#form').attr('action', '../thankyou-contact/index.php');
   });


   // USER TOUR COOKIE !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
   // if there's a cookie set called 'user_tour', getCookie
   // do the opposite of implode the array get the info and say
   // 'Welcome back $name'
   function getCookie(user_tour) {
    var name = user_tour + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
     var c = ca[i];
     while (c.charAt(0) == ' ') {
      c = c.substring(1);
     }
     if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
     }
    }
    return "";
   }

   function checkForCookies() {
     var user_tour = getCookie("user_tour");

     if (user_tour != "") {
      // console.log(user_tour);
      var data = JSON.parse(decodeURIComponent(user_tour));
      // console.log(data.name);
      $('#tourScheduledDiv').css('display', 'block');
      // $('.userName').html(data.name);
      $('.userName').html(data.firstName);
      $('.tourDate').html(data.date);
      $('.tourTime').html(data.time);
     } // close if category not blank
   }
   checkForCookies();
 });
</script>
