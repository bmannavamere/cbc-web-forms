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

         <h2 class="modal-title contactModalTitle darkGray">Let's get in touch!</h2>
         <p class="mt-2 contactModalTitle">
           We're happy to answer your questions and share how our residents enjoy life at Avamere!
         </p>
         <p class="mb-4 contactModalTitle">
           Leave us your contact info, and we'll be in touch.
         </p>

         <h2 class="modal-title tourModalTitle darkGray">Schedule a Virtual Tour of Our Community</h2>
         <p class="mb-4 mt-2 tourModalTitle">
           Thank you for your interest in <?php echo $facilityName; ?>. We can't wait to meet you!
         </p>

         <!-- The form's action is set with jQuery, based upon if contact or tour btn clicked -->
         <form id="form" class="needs-validation" novalidate method="post" action="">
           <div class="form-row">


             <!-- FIRST NAME !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
             <div class="col-md-2 mb-2">
               <label class="inputLabel" style="width:120%" for="firstName">First Name</label>
             </div>
             <div class="col-md-4 mb-2 pl-3">
               <input type="text" class="form-control" id="" name="firstName" placeholder="" maxlength="50" required value="">
             </div>


             <!-- LAST NAME !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
             <div class="col-md-2 mb-2">
               <label class="inputLabel" style="width:120%" for="lastName">Last Name</label>
             </div>
             <div class="col-md-4 mb-2 pl-3">
               <input type="text" class="form-control" id="" name="lastName" placeholder="" maxlength="50" required value="">
             </div>


             <!-- EMAIL !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
             <div class="col-md-1 mb-2">
               <label class="inputLabel" for="email">Email</label>
             </div>
             <div class="col-md-5 mb-2 pl-3">
               <input type="text" class="form-control" id="" name="email" placeholder="" maxlength="70" required value="">
             </div>


             <!-- PHONE !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
             <div class="col-md-1 mb-2">
               <label class="inputLabel" for="phone">Phone</label>
             </div>
             <div class="col-md-5 mb-2 pl-4">
               <input type="tel" class="form-control phoneInput" id="" name="phone" placeholder="" maxlength="12" autocomplete="off" required value="">
             </div>


             <!-- REASON FOR CONTACT !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
             <!-- * not shown on the tour form -->
             <div class="col-md-6 mb-2 reason">
               <label class="inputLabel" for="reason">Reason for contact</label>
             </div>
             <div class="col-md-6 mb-2 reason">
               <select id="contactReason" class="form-control chosen-select" name="reason" required>
                 <!-- <option value="" selected disabled hidden></option> -->
                 <option value="Schedule a tour">Schedule a tour</option>
                 <option value="Request information" selected>Request information</option>
                 <option value="Seeking employment">Seeking employment</option>
                 <option value="Other">Other</option>
               </select>
             </div>


             <!-- PREFERRED CONTACT METHOD !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
             <div class="col-md-6 mb-2">
               <label class="inputLabel methodInputLabel" for="reason"></label>
             </div>
             <div class="col-md-6 mb-2">

               <!-- This select is for the tour form -->
               <span class="virtTourSelect">
                 <select id="" class="form-control chosen-select" name="" required>
                   <option value="Facetime">Facetime</option>
                   <option value="Zoom">Zoom</option>
                   <option value="Skype">Skype</option>
                   <option value="Microsoft Team">Google Duo</option>
                   <option value="Microsoft Team">Microsoft Team</option>
                 </select>
               </span>

               <!-- This select is for the contact form -->
               <span class="contactSelect">
                 <select id="" class="form-control chosen-select" name="" required>
                   <!-- <option value="" selected disabled hidden></option> -->
                   <option value="Phone" selected>Phone</option>
                   <option value="Email">Email</option>
                   <option value="In person">In person</option>
                 </select>
               </span>

             </div>


             <!-- hidden input for formID && user ID !!!!!!!!!!!!!!!!!!!!!!! -->
             <div>
               <!-- IF USER CLICKED tour set this val as 'tour' ELSE set as 'contact' -->
               <input id="formID" type="hidden" name="formID" value="">
               <!-- $userID no longer used in this value -->
               <input type="hidden" name="hiddenID" value="">
             </div>
           </div>


          <!-- DATE && TIME PICKER !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
          <!-- * only shown on tour form -->
          <div class="form-row dateCol">
            <!-- DATE -->
            <div class="col-md-3 mb-2">
              <label class="inputLabel" for="dateOfTour">Date of Visit</label>
            </div>
            <div class="col-md-3 mb-2 dateCol">
              <div id="datepicker" class="input-group date">
                <input type="text" class="form-control dateInput" name="date" placeholder="" autocomplete="off" required>
              </div>
            </div>
            <!-- TIME -->
            <div class="col-md-3 mb-2 timeCol">
              <label class="inputLabel" for="timeOfTour">Time of Visit</label>
            </div>
            <div class="col-md-3 mb-2 timeCol">
              <div id="timepicker" class="input-group time">
                <input type="text" class="form-control timeInput" name="time" placeholder="" autocomplete="off" required>
              </div>
            </div>
          </div>


          <!-- COMMENTS !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
          <div class="form-row">
            <div class="col-md-12 mb-2">
              <label class="inputLabel" for="message">Comments</label>
              <textarea id="" rows="4" cols="80" type="text" class="form-control" name="message" maxlength="1000" placeholder="Any questions or special requests" ></textarea>
            </div>
          </div>


          <!-- Hidden input to post current url !!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
          <input id="currentUrl2" name="currentUrl2" type="hidden" value="">

          <!-- Script to get current url and put in hidden field -->
          <script defer type="text/javascript">
            document.getElementById('currentUrl2').value = window.location.pathname;
          </script>


          <!-- SUBMIT BUTTONS && reCAPTCHA !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
          <div class="form-group form-row">
            <div class="col-md-6">

              <!-- Submit Tour Btn -->
              <button id="tourSubmitBtn" class="btn btn-light mb-3 tourSubmitBtnClass" type="submit" name="submit" style="font-weight: 400">Submit</button>
              <!-- Submit Contact Btn -->
              <button id="contactSubmitBtn" class="btn btn-light mb-3 contactSubmitBtnClass" type="submit" name="submit" style="font-weight: 400">Submit</button>
              <!-- hidden input -->
              <input id="hiddenInput" type="hidden" name="formSubmit" value="formSubmit">

            </div>



          <!-- TEST STUFF DELETE  !!!!!!!!!!!!!!!!!!!! -->
          <style media="screen">
            .testGreenBorder {border: 1px solid green;}
          </style>

<!-- WAY WONKY -->
          <!-- <script type="text/javascript">
            $(function(){
              function rescaleCaptcha(){
                var width = $('.g-recaptcha').parent().width();
                var scale;
                if (width < 550) {
                  scale = width / 550;
                } else{
                  scale = 1.5;
                }

                $('.g-recaptcha').css('transform', 'scale(' + scale + ')');
                $('.g-recaptcha').css('-webkit-transform', 'scale(' + scale + ')');
                $('.g-recaptcha').css('transform-origin', '0 0');
                $('.g-recaptcha').css('-webkit-transform-origin', '0 0');
              }

              rescaleCaptcha();
              $( window ).resize(function() { rescaleCaptcha(); });

            });
          </script> -->


            <!-- Google reCAPTCHA -->
            <div class="col-md-6">
              <div
                class="g-recaptcha"
                data-sitekey="6Lcx3QgTAAAAADIyaUObJBaAOJ3HLkCiRJY7T5cl"
                data-callback="verifyRecaptchaCallback"
                data-expired-callback="expiredRecaptchaCallback">
              </div>

              <!-- !!!!!!!!!!!! RECAPTCHA KEY FOR TESTING BELOW - UNCOMMENT ABOVE TO RE-ENABLE REAL KEY -->
              <!-- <div class="g-recaptcha" data-sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI" data-callback="verifyRecaptchaCallback" data-expired-callback="expiredRecaptchaCallback"></div> -->
              <input class="form-control d-none" data-recaptcha="true" required data-error="Please complete the Captcha">
              <p class="invalid-feedback">Please complete the captcha.</p>
            </div>

          </div>

         </form>
       </div>
     </div>

     <!-- Form images -->
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

  <!-- Script to add dashes to the phone number -->
  <script type="text/javascript">
    $(function(){

      $('.phoneInput').keydown(function (e) {
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
