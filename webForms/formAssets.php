  <!-- jQuery 3.4.1 -->
  <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
  <!-- Chosen CSS -->
  <link rel="stylesheet" href="../webForms/vendor/chosen/chosen.css?v=<?php echo time();?>">
  <!-- BS DateTimePicker css -->
  <link rel="stylesheet" href="../webForms/vendor/datetimepicker/bootstrap-datetimepicker.min.css?v=<?php echo time();?>">
  <!-- Font Awesome Pro -->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-j8y0ITrvFafF4EkV1mPW0BKm6dp3c+J9Fky22Man50Ofxo2wNe5pT1oZejDH9/Dt" crossorigin="anonymous">
  <!-- Form Styles -->
  <link rel="stylesheet" href="../webForms/css/form.css?v=<?php echo time();?>">

  <!-- FORM MODAL !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
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
              <!-- THE FORM !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
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

  <!-- Script for datetimerpicker -->
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

  <!-- Initialize chosen js -->
  <script type="text/javascript">
    var config = {
      '.chosen-select' : { width: '100%', disable_search_threshold: 10 }
    }
    for (var selector in config) {
      $(selector).chosen(config[selector]);
    }
  </script>


  <!-- Script for form behavior -->
  <script type="text/javascript">
   $(function(){

     // NOTE: the $userID from the cookies is no longer being put into the hidden
     // input in the form, from the cookie, since the 'reschedule' functionality
     // is no longer being used.

     // CLICK ON TOUR BTN !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
     $("#scheduleATourBtn, #scheduleATourBtn2, #scheduleATourBtn3, #scheduleATourBtn4, #scheduleATourBtn5, #scheduleATourBtn6, #scheduleATourBtn7, #scheduleATourBtn8, #scheduleATourBtn9, #scheduleATourBtn10, #scheduleATourBtn11, #scheduleATourBtn12, #scheduleATourBtn13, #scheduleATourBtn14").click(function(){

        console.log('click on #scheduleATourBtn');

        // Show correct heading in modal
        $('.contactModalTitle').css('display', 'none');
        $('.tourModalTitle').css('display', 'block');


        // Set the input field ID's to be unique for the tour form.
        $('input[name="firstName"]').attr('id','tourFirstName');
        $('input[name="lastName"]').attr('id','tourLastName');
        $('input[name="email"]').attr('id','tourEmail');
        $('input[name="phone"]').attr('id','tourPhone');
        $('select[name="method"]').attr('id','tourMethod');
        $('textarea[name="message"]').attr('id','tourMessage');


        // Function to clear the tour form field values.
        function clearFields() {
          $('#tourFirstName').val("");
          $('#tourLastName').val("");
          $('#tourEmail').val("");
          $('#tourPhone').val("");
        }
        clearFields();


        // SET THE REASON FIELD TO .. 'REQUEST INFORMATION' so that
        // it validates and the tour form can be submitted (the reason select
        // is not shown on the tour form)
        // $("#contactReason").val('Request information');


        // Change the contact method input label
        $('.methodInputLabel').html('Preferred tour method:');
        // Show the virtual tour select and hide the contact method select
        $('.contactSelect').css('display','none');
        $('.virtTourSelect').css('display','block');
        // Set the name of the select to 'method' so that only this one will
        // be posted to the thank you page.
        $('.virtTourSelect select').attr('name', 'method');
        // Set the contact select method to blank in case it was alread opened.
        $('.contactSelect select').attr('name', '');
        // Make the contact select not required
        document.querySelector('.contactSelect select').required = false;



        // Show date and time inputs
        $(".dateCol").show();
        $(".timeCol").show();

        // Make date and time required. Note, if the contact form was opened
        // first, date and time are made not required so thus it is necessary
        // to make them required again here.
        document.querySelector('.dateInput').required = true;
        document.querySelector('.timeInput').required = true;

        // hide reason dropdown
        $(".reason").hide();

        // show reschedule your tour heading on form
        $('#rescheduleHeading').css('display', 'block');

        // Show the tour submit btn and hide the contact submit btn.
        $('#tourSubmitBtn').css('display', 'block');
        $('#contactSubmitBtn').css('display', 'none');

        // pass hidden form id to php to differentiate between tour/contact
        $('#formID').val('tour');

        // !important: Change form method to submit to correct thank you page
        $('#form').attr('action', '../thankyou-tour/index.php');


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

        function getCookie(user_tour_message) {
          var name = user_tour_message + "=";
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

        // Function to fill in field values from the cookies.
        function checkForTourCookies() {

            // Fill in fields from the user_tour cookie.
            var user_tour = getCookie("user_tour");
            if (user_tour != "") {
             var data = JSON.parse(decodeURIComponent(user_tour));
             console.log(data);
             $('#tourFirstName').val(data.firstName);
             $('#tourLastName').val(data.lastName);
             $('#tourEmail').val(data.email);
             $('#tourPhone').val(data.phone);
             $('#tourMethod').val(data.method);
             // Can i set the date and time back in the datepicker?
             // https://stackoverflow.com/questions/9921944/set-initial-value-in-datepicker-with-jquery
            }

            // Fill in the message field from the user_tour_message cookie.
            var user_tour_message = getCookie("user_tour_message");
            // Remove the plus signs since I want to avoid changing the thank you pages code.
            // https://stackoverflow.com/questions/2469207/how-can-i-replace-a-plus-sign-in-javascript
            var message = user_tour_message.replace(/\+/g, " ");
            if (user_tour_message != "") {
              $('#tourMessage').val(message);
            }

        }
        checkForTourCookies();

     });

     // CLICK ON CONTACT BTN !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
     $("#contactBtn, #contactBtn2, #contactBtn3, #contactBtn4, #contactBtn5, #contactBtn6, #contactBtn7, #contactBtn8, #contactBtn9").click(function(){

        console.log('click on #contactBtn or #contactBtn2');

        // Show correct heading in modal
        $('.contactModalTitle').css('display', 'block');
        $('.tourModalTitle').css('display', 'none');


        // Set the input field ID's to be unique for the contact form.
        $('input[name="firstName"]').attr('id','contactFirstName');
        $('input[name="lastName"]').attr('id','contactLastName');
        $('input[name="email"]').attr('id','contactEmail');
        $('input[name="phone"]').attr('id','contactPhone');
        $('select[name="method"]').attr('id','contactMethod');
        $('textarea[name="message"]').attr('id','contactMessage');


        // Function to clear the contact form field values.
        function clearFields() {
          $('#contactFirstName').val("");
          $('#contactLastName').val("");
          $('#contactEmail').val("");
          $('#contactPhone').val("");
          // DONT DO THIS, bc although it is 'selected' it's value is gone
          // so it did not validate!
          // $('#contactMethod').val("");
          $('#contactMessage').val("");
        }
        clearFields();


        // Change the contact method input label
        $('.methodInputLabel').html('Preferred contact method:');
        // Hide the virtual tour select and show the contact method select
        $('.virtTourSelect').css('display','none');
        $('.contactSelect').css('display','block');
        // Set the name of the select to 'method'
        $('.contactSelect select').attr('name', 'method');
        // Set the tour select method to blank in case it was alread opened.
        $('.virtTourSelect select').attr('name', '');




        // Make date/time inputs not required for contact form.
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

        // show contact submit btn / hide contact tour btn
        $('#tourSubmitBtn').css('display', 'none');
        $('#contactSubmitBtn').css('display', 'block');
        // pass hidden form id to php to differentiate between tour/contact
        $('#formID').val('contact');

        // !important: Change form method to submit to correct thank you page
        $('#form').attr('action', '../thankyou-contact/index.php');


        // Function to get user_contact cookie.
        function getCookie(user_contact) {
          var name = user_contact + "=";
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

        // Function to fill in field values from the cookie.
        function checkForContactCookie() {
            // Fill in fields from the user_contact cookie.
            var user_contact = getCookie("user_contact");
            if (user_contact != "") {
             var data = JSON.parse(decodeURIComponent(user_contact));
             console.log(data);
             $('#contactFirstName').val(data.firstName);
             $('#contactLastName').val(data.lastName);
             $('#contactEmail').val(data.email);
             $('#contactPhone').val(data.phone);
             // Reason?
             // Method?
             $('#contactMessage').val("");
            }
        }
        checkForContactCookie();

     });
   });
  </script>
