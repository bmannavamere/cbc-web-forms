<?php

  // if cookie user_tour set, fill in some form fields
  if(isset($_COOKIE['user_tour'])) {
    // echo $_COOKIE['user_tour'];
    $cookieDecoded = urldecode(($_COOKIE['user_tour']));
    $data = json_decode($cookieDecoded);

    $firstName = $data->firstName;
    $lastName = $data->lastName;
    $email = $data->email;
    $phone = $data->phone;
    $method = $data->method;
    $date = $data->date;
    $time = $data->time;
    // populate hidden user ID field below with user ID, else it's blank and
    // send-email.php will create one
    $userID = $data->userID;
    // show heading signifying this tour is being 'rescheduled'
    $reschedule = true;
    // echo "<p>The user_tour cookie is set!</p><br><hr>";
  }
  // if cookie user_tour_message set, fill in message input
  if(isset($_COOKIE['user_tour_message'])) {
    // echo $_COOKIE['user_tour_message'];
    $message = $_COOKIE['user_tour_message'];
    // echo "<p>The user_tour_message cookie is set!</p><br><hr>";
  }

  if(isset($_COOKIE['user_contact'])) {
    $cookieDecoded = urldecode(($_COOKIE['user_contact']));
    $data = json_decode($cookieDecoded);

    // fill in contact form from these previously set values
    $userID = $data->userID;
    $firstName = $data->firstName;
    $lastName = $data->lastName;
    $email = $data->email;
    $phone = $data->phone;
    $reason = $data->reason;
    $method = $data->method;
    // echo "<p>The user_contact cookie is set!</p><br><hr>";
  }

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>

    <!-- Google Tag Manager for account - Forms - Community Pages -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-T8M9NFW');</script>
    <!-- End Google Tag Manager -->

    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T8M9NFW"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

  <div class="container mb-5">
    <div class="row mt-n4 pl-3">
      <div class="col-xl-6">
       <div class="col-xl-12 mt-2 mx-auto">

         <!-- SHOW RESCHEDULE HEADING if user has already scheduled a tour -->
         <!--?php if ($reschedule) {
           echo "<h5 id='rescheduleHeading' style='color: #3C3C3C;'>Reschedule your tour below:</h5>";
         }
         ?-->
         <h2 class="modal-title contactModalTitle darkGray">Let’s get in touch!</h2>
         <p class="mt-2 contactModalTitle">
           We’re happy to answer your questions and share how our residents enjoy life at Avamere!
         </p>
         <p class="mb-4 contactModalTitle">
           Leave us your contact info, and we’ll be in touch.
         </p>

         <h2 class="modal-title tourModalTitle darkGray">Schedule a Visit at Our Community</h2>
         <p class="mb-4 mt-2 tourModalTitle">
           Thank you for your interest in visiting us. Whether you’re ready for a full tour or an introductory appointment, we can’t wait to meet you!
         </p>
         <!-- <form id="form" class="needs-validation" novalidate method="post" action="../web-forms/form/send_form.php"> -->
         <!-- instead of above - send user right to thank you page and run php code there to avoid lag -->
         <!-- w/ jquery, set the action based on btn click (contact or tour) -->
         <form id="form" class="needs-validation" novalidate method="post" action="">
           <div class="form-row">
             <div class="col-md-2 mb-2">
               <label class="inputLabel" style="width:120%" for="firstName">First Name</label>
             </div>
             <div class="col-md-4 mb-2 pl-3">
               <input type="text" class="form-control" id="firstNameInput" name="firstName" placeholder="" maxlength="50" required
               value="<?=($firstName != "") ? $firstName : "";?>">
               <div class="valid-feedback">
                 Looks good!
               </div>
               <div class="invalid-feedback">
                 Please provide your first name.
               </div>
             </div>
             <div class="col-md-2 mb-2">
               <label class="inputLabel" style="width:120%" for="lastName">Last Name</label>
             </div>
             <div class="col-md-4 mb-2 pl-3">
               <input type="text" class="form-control" id="lastNameInput" name="lastName" placeholder="" maxlength="50" required
               value="<?=($lastName != "") ? $lastName : "";?>">
               <div class="valid-feedback">
                 Looks good!
               </div>
               <div class="invalid-feedback">
                 Please provide your last name.
               </div>
             </div>

             <div class="col-md-1 mb-2">
               <label class="inputLabel" for="email">Email</label>
             </div>
             <div class="col-md-5 mb-2 pl-3">
               <input type="text" class="form-control" id="emailInput" name="email" placeholder="" maxlength="70" required
               value="<?=($email != "") ? $email : "";?>">
               <div class="valid-feedback">
                 Looks good!
               </div>
               <div class="invalid-feedback">
                 Please provide an email.
               </div>
             </div>
             <div class="col-md-1 mb-2">
               <label class="inputLabel" for="phone">Phone</label>
             </div>
             <div class="col-md-5 mb-2 pl-4">
               <input type="tel" class="form-control" id="phoneInput" name="phone" placeholder="" maxlength="12" autocomplete="off" required
               value="<?=($phone != "") ? $phone : "";?>">
               <div class="valid-feedback">
                 Looks good!
               </div>
               <div class="invalid-feedback">
                 Please provide a phone number.
               </div>
             </div>
             <div class="col-md-6 mb-2 reason">
               <label class="inputLabel" for="reason">Reason for contact</label>
             </div>
             <div class="col-md-6 mb-2 reason">
               <!-- <select id="reason" class="form-control" name="reason" required> -->
               <select id="reason" class="form-control chosen-select" name="reason" required>
                 <!-- <option value=""></option> -->
                 <!-- <option value="Reason for contact:" selected disabled hidden>Reason for contact:</option> -->
                 <option value="" selected disabled hidden></option>

                 <option value="<?=($reason == "Schedule a tour" ) ? $reason : "Schedule a tour";?>" <?=($reason == "Schedule a tour" ) ? "selected" : "";?>>Schedule a tour</option>
                 <option value="<?=($reason == "Request information" ) ? $reason : "Request information";?>" <?=($reason == "Request information" ) ? "selected" : "";?>>Request information</option>
                 <option value="<?=($reason == "Seeking employment" ) ? $reason : "Seeking employment";?>" <?=($reason == "Seeking employment" ) ? "selected" : "";?>>Seeking employment</option>
                 <option value="<?=($reason == "Other" ) ? $reason : "Other";?>" <?=($reason == "Other" ) ? "selected" : "";?>>Other</option>

               </select>
               <style media="screen">

               </style>
               <div class="valid-feedback">
                 Looks good!
               </div>
               <div class="invalid-feedback">
                 Please provide a reason for contact.
               </div>
             </div>
             <div class="col-md-6 mb-2">
               <label class="inputLabel" for="reason">Preferred contact method:</label>
             </div>
             <div class="col-md-6 mb-2">
               <!-- <select class="form-control " name="method" required> -->
               <select class="form-control chosen-select" name="method" required>
                 <!-- <option value=""></option> -->
                 <!-- <option value="" selected disabled hidden>Preferred contact method:</option> -->
                 <option value="" selected disabled hidden></option>

                 <!-- IF method set in cookie, set value -->
                 <option value="<?=($method == "Phone" ) ? $method : "Phone";?>" <?=($method == "Phone" ) ? "selected" : "";?>>Phone</option>
                 <option value="<?=($method == "Email" ) ? $method : "Email";?>" <?=($method == "Email" ) ? "selected" : "";?>>Email</option>
                 <option value="<?=($method == "In person" ) ? $method : "In person";?>" <?=($method == "In person" ) ? "selected" : "";?>>In person</option>
                 <!-- <option value="Phone">Phone</option>
                 <option value="Email">Email</option>
                 <option value="In person">In person</option> -->
               </select>
               <div class="valid-feedback">
                 Looks good!
               </div>
               <div class="invalid-feedback">
                 Please provide your preferred contact method.
               </div>
             </div>
             <!-- hidden input for formID && user ID -->
             <div class="">
               <!-- IF USER CLICKED tour set this val as 'tour' ELSE set as 'contact' -->
               <input id="formID" type="hidden" name="formID" value="">
               <input type="hidden" name="hiddenID" value="<?=($userID != "") ? $userID : "";?>">
             </div>
           </div>

           <div class="form-row dateCol">
             <div class="col-md-3 mb-2">
               <label class="inputLabel" for="dateOfTour">Date of Visit</label>
             </div>
             <div class="col-md-3 mb-2 dateCol">
               <div id="datepicker" class="input-group date">
                 <input type="text" class="form-control dateInput" name="date" placeholder="" autocomplete="off" required>
                 <div class="invalid-feedback">
                   Please choose a date
                 </div>
               </div>

             </div>

            <div class="col-md-3 mb-2 timeCol">
              <label class="inputLabel" for="timeOfTour">Time of Visit</label>
            </div>
            <div class="col-md-3 mb-2 timeCol">
              <div id="timepicker" class="input-group time">
                <input type="text" class="form-control timeInput" name="time" placeholder="" autocomplete="off" required>
                <div class="invalid-feedback">
                  Please choose a time
                </div>
              </div>

            </div>
           </div>

           <div class="form-row">
             <div class="col-md-12 mb-2">
               <label class="inputLabel" for="message">Comments</label>
               <textarea rows="4" cols="80" type="text" class="form-control" id="messageInput" name="message" maxlength="1000" placeholder="Any questions or special requests" ></textarea>
               <div class="valid-feedback">
                 Thanks!
               </div>
               <div class="invalid-feedback">
                 Please provide a message.
               </div>
             </div>
           </div>
           <!-- Hidden input to post current url -->
           <input id="currentUrl2" name="currentUrl2" type="hidden" value="">
           <!-- get current url and put in hidden field -->
           <script defer type="text/javascript">
             // set hidden input val to current page url
             // document.getElementsByTagName('input')[4].value = window.location.href;
             document.getElementById('currentUrl2').value = window.location.pathname;
             console.log(window.location.pathname);
           </script>
           <div class="form-group form-row">
             <div class="col-md-6">
             <!-- Submit Tour Btn -->
             <button id="tourSubmitBtn" class="btn btn-light mb-3 tourSubmitBtnClass" type="submit" name="submit" style="font-weight: 400">Submit</button>
             <!-- Submit Contact Btn -->
             <button id="contactSubmitBtn" class="btn btn-light mb-3 contactSubmitBtnClass" type="submit" name="submit" style="font-weight: 400">Submit</button>

             <!-- NEW 12/12/19 hidden input !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
             <input id="hiddenInput" type="hidden" name="formSubmit" value="formSubmit">
           </div>
           <div class="col-md-6 pl-4 d-flex flex-row">
             <div style="transform:scale(0.70);-webkit-transform:scale(0.70);transform-origin:0 0;-webkit-transform-origin:0 0;" class="g-recaptcha pl-4" data-sitekey="6Lcx3QgTAAAAADIyaUObJBaAOJ3HLkCiRJY7T5cl" data-callback="verifyRecaptchaCallback" data-expired-callback="expiredRecaptchaCallback"></div>
             <!-- !!!!!!!!!!!! RECAPTCHA KEY FOR TESTING BELOW - UNCOMMENT ABOVE TO RE-ENABLE REAL KEY -->
             <!-- <div class="g-recaptcha" data-sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI" data-callback="verifyRecaptchaCallback" data-expired-callback="expiredRecaptchaCallback"></div> -->
             <input class="form-control d-none" data-recaptcha="true" required data-error="Please complete the Captcha">
             <div class="valid-feedback">
               Looks good!
             </div>
             <div class="invalid-feedback">
               Please complete the captcha.
             </div>
           </div>

         </div>
         </form>
       </div> <!-- ./12 -->
     </div>
     <div class="col-xl-6 contactModalTitle respFormImage">
       <img src="https://www.avamere.com/cbc_/images/people/CBC_AVA_Contact Us Form.jpg">
     </div>
     <div class="col-xl-6 tourModalTitle respFormImage">
       <img src="https://www.avamere.com/cbc_/images/people/CBC_AVA_Web_Schedule-Tour-Modal.jpg">
     </div>
     </div> <!-- close row -->
   </div> <!-- close container -->

  <!-- // JavaScript for disabling form submissions if there are invalid fields -->
  <script defer>
    (function() {
      'use strict';

      window.addEventListener('load', function() {

        /// !!!!!!!!!!!! note i removed require from timeInput and dateInput,
        // otherwise the contact form cannot be submitted because of date/time
        // not validating on the same form (date time not shown on contact)

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
              console.log('default prevented...');
            } else {
              // NEW 12/12/19 - check validity passed, disable multiple clicks on
              // the submit btns hidden input field added above so that POST
              // 'formSubmit' still runs php on thank you pages !!!!!!!!!!!!!!!!!!
              document.querySelector('#contactSubmitBtn').disabled = true;
              document.querySelector('#tourSubmitBtn').disabled = true;
            }


            form.classList.add('was-validated');
            // submit form
            return true;
          }, false);
        });

      }, false);
    })();
  </script>

  <!-- Script to initialize google reCAPTCHA -->
  <script src='https://www.google.com/recaptcha/api.js' async defer></script>

  <!-- Validate Captcha -->
  <script defer type="text/javascript">
      $(function () {
          window.verifyRecaptchaCallback = function (response) {
              $('input[data-recaptcha]').val(response).trigger('change')
          }
          window.expiredRecaptchaCallback = function () {
              $('input[data-recaptcha]').val("").trigger('change')
          }
      });
  </script>

  <!-- Check for date and time in user_tour cookie, and if found set them
       in the form inputs -->
  <!-- Also get the message from user_tour_message cookie
        and add dashes to phone num -->
  <script type="text/javascript">
     $(function () {
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
       function checkForDateAndTime() {
           var user_tour = getCookie("user_tour");
           if (user_tour != "") {
            $('.dateInput').val('<?php echo $date; ?>');
            $('.timeInput').val('<?php echo $time; ?>');
           } // close if category not blank
       }
       checkForDateAndTime();

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
       function checkForUserMessage() {
           var user_tour_message = getCookie("user_tour_message");
           if (user_tour_message != "") {
            $('#messageInput').val('<?php echo $message; ?>');

           } // close if category not blank
       }
       checkForUserMessage();

       // ADD DASHES TO PHONE NUM !!!!!!!!!!!!!
       $('#phoneInput').keydown(function (e) {
        var key = e.charCode || e.keyCode || 0;
        $text = $(this);
        if (key !== 8 && key !== 9) {
          if ($text.val().length === 3) {
              $text.val($text.val() + '-');
          }
          if ($text.val().length === 7) {
              $text.val($text.val() + '-');
          }
        }
          return (key == 8 || key == 9 || key == 46 || (key >= 48 && key <= 57) || (key >= 96 && key <= 105));
      })
    });
  </script>

</body>
</html>
