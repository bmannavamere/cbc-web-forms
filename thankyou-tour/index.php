<?php

  error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED ^ E_STRICT);
  ini_set('display_errors', 1);

  // for Pear's mail package to work
  ini_set("include_path", '/home/avameremarketing/php:' . ini_get("include_path") );
  require_once 'Mail.php';

  if(isset($_POST['formSubmit'])){
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $reason = $_POST['reason'];
    $method = $_POST['method'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $page = trim($_POST['currentUrl2'], "/") ; // remove slashes from page path
    $captcha = $_POST['g-recaptcha-response'];
    $text = $_POST['message'];

    $userID = uniqid();


    // set a COOKIE w/ requestors info !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    $cookie_name = "user_tour";
    $cookieArr = array('userID' => $userID, 'firstName' => $firstName, 'lastName' => $lastName, 'email' => $email, 'phone' => $phone, 'method' => $method, 'date' => $date, 'time' => $time);
    $cookie_value = rawurlencode(json_encode($cookieArr));

    // create timestamp from tour time for when the cookie expires
    $tour_time = $date . " " . $time;
    $tour_timestamp = strtotime($tour_time);

    // note: system times are off I think, because if the tour is scheduled
    // too near to the current time it wont setcookie because it's already exp.
    setcookie($cookie_name, $cookie_value, $tour_timestamp, "/");

    // create seperate cookie for the user TOUR message
    $cookie_message_name = "user_tour_message";
    $cookie_message_value = $text;
    setcookie($cookie_message_name, $cookie_message_value, $tour_timestamp, "/");


    // Get the users ip
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
       $user_ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
       $user_ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
       $user_ip = $_SERVER['REMOTE_ADDR'];
    }


    // NOTE: AFTER the cookies are set then send the page to the browser.
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- LP Global site tag (gtag.js) - Google Analytics -->
    <!-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-3128079-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-3128079-1');
    </script> -->


    <!-- AVA Global site tag (gtag.js) - Google Analytics -->
    <!-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-136327877-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-136327877-1');
    </script> -->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />
    <title>Thank You - Avamere Family of Companies</title>
    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="./img/icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./img/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./img/icons/favicon-16x16.png">
    <link rel="manifest" href="./img/icons/site.webmanifest">
    <link rel="mask-icon" href="./img/icons/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="shortcut icon" href="./img/icons/favicon.ico">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-config" content="./img/icons/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    <!-- Google Montserrat -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,500,700" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="./css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Pro Font Awesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-j8y0ITrvFafF4EkV1mPW0BKm6dp3c+J9Fky22Man50Ofxo2wNe5pT1oZejDH9/Dt" crossorigin="anonymous">
    <!-- Primary Stylesheet -->
    <link rel="stylesheet" type="text/css" href="./css/style.css" media="screen">

  </head>
  <body>







  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <!-- NAV -->
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #fff;">
          <div class="row">

            <div class="col-sm-6 headerImgDiv">
              <a class="navbar-brand" href="https://www.avamere.com/" target="_blank">
                <img class="navimg img-fluid" src="./img/Avamere-web-logo2x.png" alt="Avamere" style="margin-bottom: 15px; margin-left: 10px;">
              </a>
            </div>

            <div class="col-sm-6 mb-5">
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"
              style="position: absolute; right: 15px;">
                <span class="navbar-toggler-icon"></span>
              </button>
            </div>

          </div> <!-- close row -->

          <div class="collapse navbar-collapse justify-content-end ml-auto" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
              <!-- If IE show this li -->
              <li class="nav-item ieAvaLogo">
                <a class="nav-link" href="https://www.avamere.com">
                  <img class=" img-fluid" src="./img/AvamereLogo.png" width="80px" alt="Avamere">
                </a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="https://www.avamere.com">HOME</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="https://www.avamere.com/our-story/">ABOUT</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="https://www.avamere.com/locations/">CHOICES</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="https://www.avamere.com/blog/">MEDIA</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="https://careers-avamere.icims.com/">CAREERS</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="https://www.avamere.com/contact/">CONTACT</a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </div> <!-- close row -->
  </div>



    <div class="container-fluid bottomBuffer">

      <div class="row mt-auto top">
        <div class="col-lg-12 headerImg text-center">
          <!-- extra row to always keeps the 'thank you your sub...' text vert. centered -->
          <div class="row h-100">
            <div class="col-lg-12 my-auto">
              <p class="thankYouText addTextShadow">THANK YOU</p>
              <p class="yourSubText addTextShadow">YOUR SUBMISSION WAS RECEIVED</p>
            </div>
          </div>
        </div>
      </div>

    <div class="row">
      <div class="pageText col-lg-12 text-center topBuffer">
        <p>Thank you for contacting us. We will respond as quickly as possible.</p>
        <p>Join the conversation: like or follow us on one of our social channels.</p>
      </div>
    </div>

    <div class="row">
      <div class="col amazing text-center">
        <p><b>Have an amazing day!</b></p>
      </div>
    </div>

    <div class="row justify-content-center">
      <div class="col text-center socialMediaLinks">
        <a href="https://www.facebook.com/avamere/" class="fab fa-facebook-f" target="_blank"></a>
        <a href="https://twitter.com/avamerehealth" class="fab fa-twitter" target="_blank"></a>
        <a href="https://www.youtube.com/user/AvamereFamily" class="fab fa-youtube" target="_blank"></a>
        <a href="https://www.linkedin.com/company/avamere-health-services" class="fab fa-linkedin-in" target="_blank"></a>
        <a href="https://itunes.apple.com/us/app/avamere/id897864147?ls=1&mt=8" class="fab fa-apple" target="_blank"></a>
        <a href="https://play.google.com/store/apps/details?id=com.conduit.app_9fe1486f66044a42a09aca412607f6a0.app" class="fab fa-android" target="_blank"></a>
      </div>
    </div>

    <div class="row">
      <div class="col amazing text-center mt-4">
        <button class="btn footer-button whiteText" onclick="goBack()" style="background: #009cdc; width: 210px;">Go Back</button>
        <script>
        function goBack() {
          window.history.go(-1);
          // use $page to load a non cached page so that form fields are filled from cookies
          // window.location.replace("https://www.avameremarketing.com<?php echo $page ?>");
        }
        </script>
      </div>
    </div>

  </div> <!-- close container -->







    <!-- FOOTER section -->
    <footer class="avamereFooter topBuffer">
      <div class="container">
        <div class="row justify-content-center">

          <!-- Logo and Address -->
          <div class="col-lg-4 col-md-6 col-sm-12 footerLogoAddress">

            <div class="footerLogoBox col-12 mx-auto topBuffer">
              <img src="./img/Avamere_Footer_Logo_Horiz.png" alt="Avamere Logo" class="img-fluid">
              <div class="footerContactBtn">
                <!-- Button to open contact us modal -->
                <!-- <button type="button" class="btn btn-primary btn-md header-button" data-toggle="modal" data-target="#contactUsModal" role="button" style="color: #fff;">
                  Contact Us
                </button> -->
              </div>
            </div>

            <div class="footerAddressText col-12 topBuffer">
              <p>25115 SW Parkway Ave, Suite B</p>
              <p>Wilsonville, OR 97070</p>
              <p>1-877-282-6373</p>
            </div>

          </div>

          <!-- Links -->
          <div class="col-lg-4 col-md-6 footerLinks text-left topBuffer">
            <p><a href="https://www.avamere.com/legal-terms/" target="_blank">LEGAL TERMS</a></p>
            <p><a href="https://www.avamere.com/privacy-policy/" target="_blank">PRIVACY POLICY</a></p>
            <p><a href="https://www.hud.gov/topics/housing_discrimination" target="_blank">FAIR HOUSING ACT</a></p>
            <p><a href="https://www.avamere.com/non-discrimination-translation-services/" target="_blank">NON-DISCRIMINATION & TRANSLATION SERVICES</a></p>
          </div>

          <!-- Buttons -->
          <div class="col-lg-4 col-md-12 text-center topBuffer">

            <!-- NA Portal Link -->
            <a class="btn footer-button whiteText" href="https://www.avamere.com/na-classes/" role="button" target="
            " style="background: #009cdc">NA CLASSES</a>
            <div class="miniSpacer"></div>

            <a class="btn footer-button whiteText" href="https://careers-avamere.icims.com" role="button" target="
            " style="background: #009cdc">FIND A CAREER</a>
            <div class="miniSpacer"></div>
            <a class="btn footer-button whiteText" href="https://www.avamere.com/speak-up-hotline/" role="button" target="_blank" style="background: #DD3333">SPEAK-UP HOTLINE</a>
          </div>

        </div> <!-- Close 1st Footer row -->

        <!-- Copyright & Social Linls -->
        <div class="row justify-content-center topBuffer">

          <div class="col-lg-12 text-center">
            <p class="whiteText">&copy; Copyright <script defer type="text/javascript">
              document.write(new Date().getFullYear());
              </script> Avamere Family of Companies. All rights reserved.</p>
          </div>

        </div>

      </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  </body>
</html>

<?php

      $subject = 'Schedule a tour form submission';

      $from = strip_tags($_POST['email']);
      $replyToEmail = strip_tags($_POST['email']);


      // send tour form info to DB !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
      function sendTourToDb($userID, $page, $recipients, $firstName, $lastName, $email, $phone, $method, $date, $time, $text, $user_ip) {

        // // THE PROD DB
        // $servername = "132.148.17.227";
        // $username = "avamerem_cbc";
        // $password = "Pj7hVYQA22YS";
        // $dbname = "avamerem_CBC";

        // THE DEV DB
        $servername = "132.148.17.227";
        $username = "avamerem_cbcDevTeam";
        $password = "[g3iXlPr1@=J";
        $dbname = "avamerem_CBC_DEV";

        $timestamp = date('Y-m-d G:i:s'); // prints 2011-08-06 14:54:17

        try {
          $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

          $stmt = $conn->prepare("INSERT INTO tour_form (user_id, time_stamp, page, recipients, firstName, lastName, email, phone, method, date_of_tour, time_of_tour, comments, user_ip)
                                  VALUES (:user_id, :time_stamp, :page, :recipients, :firstName, :lastName, :email, :phone, :method, :date_of_tour, :time_of_tour, :comments, :user_ip)");

          $stmt->bindParam(':user_id', $userID);
          $stmt->bindParam(':time_stamp', $timestamp);
          $stmt->bindParam(':page', $page);
          $stmt->bindParam(':recipients', $recipients);
          $stmt->bindParam(':firstName', $firstName);
          $stmt->bindParam(':lastName', $lastName);
          $stmt->bindParam(':email', $email);
          $stmt->bindParam(':phone', $phone);
          $stmt->bindParam(':method', $method);
          $stmt->bindParam(':date_of_tour', $date);
          $stmt->bindParam(':time_of_tour', $time);
          $stmt->bindParam(':comments', $text);
          $stmt->bindParam(':user_ip', $user_ip);
          $stmt->execute();

        }
        catch(PDOException $e) {
          // echo "Error: " . $e->getMessage();
        }
        // close connection
        $conn = null;
      }

      // Send notification email !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
      function sendEmail($recipients, $subject, $commname, $from, $replyToEmail, $page, $firstName, $lastName, $email, $phone, $method, $date, $time, $text) {

        // Add community name to the email subject line
        $subject2 = $commname.' - '.$subject;

        // Create Notification Email !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        $message = '<html><body>';
          $message .= '<table align="center" width="600">';
            $message .= '<h2 style="color: #009cdc;">SCHEDULE A TOUR FORM SUBMISSION</h2>';
            $message .= '<img src="https://www.avamere.com/webForms/email-logos/' . $page . '.png" alt="Community Logo" style="width: 300px;"/>';
            $message .= '<h3>You have received a request for tour.<br> Please respond to the requestor as soon as possible.</h3>';

            $message .= '<table rules="all" style="border-color: #777;" cellpadding="10" align="center" width="600">';
              $message .= "<tr style='background: #eee;'><td><strong>Requestor Details:</strong> </td><td></td></tr>";
              $message .= "<tr><td><strong>First Name:</strong> </td><td>" . $firstName . "</td></tr>";
              $message .= "<tr><td><strong>Last Name:</strong> </td><td>" . $lastName . "</td></tr>";
              $message .= "<tr><td><strong>Email:</strong> </td><td>" . $email . "</td></tr>";
              $message .= "<tr><td><strong>Phone:</strong> </td><td>" . $phone . "</td></tr>";
              // $message .= "<tr><td><strong>Preferred contact<br> method:</strong> </td><td>" . $method . "</td></tr>";
              // Preferred contact method changed to the new 'virtual tour' dropdown
              $message .= "<tr><td><strong>Virtual tour<br> method:</strong> </td><td>" . $method . "</td></tr>";
              $message .= "<tr><td><strong>Date of Tour:</strong> </td><td>" . $date . "</td></tr>";
              $message .= "<tr><td><strong>Time of Tour:</strong> </td><td>" . $time . "</td></tr>";
              $message .= "<tr><td>  <strong>Comments:</strong> </td><td>" . $text . "</td></tr>";
              $message .= "<tr><td colspan='2'><p style='font-size: 12px; margin-top: 15px;'><i>URL of submitting page: </i><a href='https://www.avamere.com/".$page."' target='_blank'>https://www.avamere.com/".$page."</a></p></td></tr>";
            $message .= "</table>";
          $message .= '</table>';
        $message .= "</body></html>";



        $host = "ssl://smtp.gmail.com";
        $username = "avamereforms@gmail.com";
        // $password = "SN8ce9i961Hy"; // normal pw for the gmail account
        $password = "rrhssmpguubdxpsg"; // special app password
        $port = "465";

        $mimeVersion = "1.0";
        $contentType = "text/html; charset=utf-8";

        $headersArr = array ('From' => $from, 'To' => $recipients, 'Subject' => $subject2, 'Reply-To' => $replyToEmail, 'MIME-Version' => $mimeVersion, 'Content-Type' => $contentType);
        $smtp = Mail::factory('smtp', array ('host' => $host, 'port' => $port, 'auth' => true, 'username' => $username, 'password' => $password));
        $mail = $smtp->send($recipients, $headersArr, $message);

        if (PEAR::isError($mail)) {
          // error code here
          // echo("<p>" . $mail->getMessage() . "</p>");
        } else {
          // echo("<p>Message successfully sent!</p>");
        }
      }

      // send tour confirmation email to end user !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
      function sendTourConfEmail($from, $replyToEmail, $firstName, $lastName, $email, $phone, $method, $date, $time, $text, $page, $commname, $address, $commphone) {

        $host = "ssl://smtp.gmail.com";
        $username = "avamereforms@gmail.com";
        $password = "rrhssmpguubdxpsg"; // special app password
        $port = "465";

        $mimeVersion = "1.0";
        $contentType = "text/html; charset=utf-8";

        $confSubject = $commname ." - Thank you for scheduling a tour with us!";

          $confMessage = '<html><body>';
          $confMessage .= '<table align="center" width="600">';
            $confMessage .= '<h2 style="color: #009cdc;">Thank You! Your request for a tour has been received!</h2>';
            $confMessage .= '<p>Hi '.$firstName.', we will be responding to you shortly.</p>';

            $confMessage .= '<table rules="all" style="border-color: #777;" cellpadding="10" width="600">';
              $confMessage .= "<tr style='background: #eee;'><td><strong>Details: </strong> </td><td></td></tr>";
              $confMessage .= "<tr><td><strong>First Name:</strong> </td><td>" . $firstName . "</td></tr>";
              $confMessage .= "<tr><td><strong>Last Name:</strong> </td><td>" . $lastName . "</td></tr>";
              // New row for the virutal tour method
              $confMessage .= "<tr><td><strong>Virtual Tour method:</strong> </td><td>" . $method . "</td></tr>";
              $confMessage .= "<tr><td><strong>Date of Tour:</strong> </td><td>" . $date . "</td></tr>";
              $confMessage .= "<tr><td><strong>Time of Tour:</strong> </td><td>" . $time . "</td></tr>";
              $confMessage .= "<tr><td><strong>Comments:</strong> </td><td>" . $text . "</td></tr>";
            $confMessage .= "</table>";

            $confMessage .= "<p>Need to make changes to your tour time? <b><a href='https://www.avamere.com/".$page."' style='color: #009cdc;'>Reschedule here</a></b></p><br>";
            $confMessage .= "<p>". $commname ."</p>";
            $confMessage .= "<p>". $address ."</p>";
            $confMessage .= "<p>". $commphone ."</p>";

          $confMessage .= '</table>';
        $confMessage .= "</body></html>";

        $headersArr = array ('From' => $username, 'To' => $from, 'Subject' => $confSubject, 'Reply-To' => $username, 'MIME-Version' => $mimeVersion, 'Content-Type' => $contentType);
        $smtp = Mail::factory('smtp', array ('host' => $host, 'port' => $port, 'auth' => true, 'username' => $username, 'password' => $password));
        $mail = $smtp->send($from, $headersArr, $confMessage);

        if (PEAR::isError($mail)) {
          // error code here
        } else {
          // echo("<p>Tour Conf email successfully sent!</p><br><hr>");
        }
      }

      // Query db w/ $page (path) to get form recipients (only cbc now) !!!!!!!!
      function getRecipientsFromDb($page) {

        // // THE PROD DB
        // $servername = "132.148.17.227";
        // $username = "avamerem_cbc";
        // $password = "Pj7hVYQA22YS";
        // $dbname = "avamerem_CBC";

        // THE DEV DB
        $servername = "132.148.17.227";
        $username = "avamerem_cbcDevTeam";
        $password = "[g3iXlPr1@=J";
        $dbname = "avamerem_CBC_DEV";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM cbc WHERE page_path=:page_path");
            $stmt->execute(['page_path' => $page]);
            $data = $stmt->fetch();

            $recipients = $data[3];
            $commname   = $data[4];

            $state      = $data[5];
            $city       = $data[6];
            $address1   = $data[7];
            $zip        = $data[8];

            // Concatenate address together
            $address    = $address1.' '.$city.', '.$state.' '.$zip;

            $commphone  = $data[9];

            return array($recipients, $commname, $address, $commphone);
        }
        catch(PDOException $e) {
          // echo "Error: " . $e->getMessage();
        }
        $conn = null;
      }

      list($recipients, $commname, $address, $commphone) = getRecipientsFromDb($page);

      // Call the functions
      sendTourConfEmail($from, $replyToEmail, $firstName, $lastName, $email, $phone, $method, $date, $time, $text, $page, $commname, $address, $commphone);
      sendTourToDb($userID, $page, $recipients, $firstName, $lastName, $email, $phone, $method, $date, $time, $text, $user_ip);
      sendEmail($recipients, $subject, $commname, $from, $replyToEmail, $page, $firstName, $lastName, $email, $phone, $method, $date, $time, $text);

      // Run code to send 'lead' to Sherpa's API
      // require_once '../includes/sendLeadToSherpa/sendTourFormLead.php';

  }

?>
