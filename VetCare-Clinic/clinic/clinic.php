<!DOCTYPE html>
<html lang="en">
    <!--header starts-->
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Clinic page</title>
  <!--bootstrap cdn link-->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.0-beta1/css/bootstrap.min.css"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script> 
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
  <link rel="stylesheet" href="style.css">
</head>
<!--body begins here-->
<body>
  <!--section header - horizontal navigation bar with logo-->
  <section id="header">
      <a href="#"><img src="../img/LogoMakr-889xka.png"  class="logo" alt=""></a>
      <div>
          <ul id="navbar">
              <li><a class="active" href="/index.html">Home</a></li>
              <li><a href="clinic.php">Clinic</a></li>
              <li><a href="../hotel/hotel.php">Hotel</a></li>
              <li><a href="../shop/shop.php">Shop</a></li>
              <li><a href="/register_form/login_form.php">Login</a></li>
              <li><a href="/register_form/register_form.php">Register</a></li>
              <li><a href="cart.html"><i class="fa-solid fa-bag-shopping"></i></a></li>
          </ul>
      </div>
  </section>
  <!--section 'hero' - a picture with some text -->
  <section id="hero">
    <h4>VetCare Clinic</h4> 
  </section>
  <!--section 'services' - services in the Clinic shown in boxes-->
  <section id="services" class="section-p1">
    
    <h1>Our services</h1>
    
    <div class="boxes">
      <h6>Vaccinations</h6>
    </div>
    <div class="boxes">
      <h6>Microchipping</h6> 
    </div>
    <div class="boxes">
      <h6>Surgery (Spaying and Castration)</h6>
    </div>
    <div class="boxes">
      <h6>Consultation(Illness/checkups)</h6>
    </div>
    <div class="boxes">
      <h6>Dermatology</h6>
    </div>
    <div class="boxes">
      <h6>Dental procedures (Dental Prophylaxis, Extractions)</h6>
    </div>
    <div class="boxes">
      <h6>Diagnostic procedures(Blood testing, Analysis)</h6>
    </div>
    <div class="boxes">
      <h6>Passport</h6>
    </div>
     <!--two link : registration or log in to book an appoinment-->
    <h4>To book an appointment you need to <a href="/register_form/register_form.php">register</a> or <a href="/register_form/login_form.php">sign in</a></h4>
  </section>
  <!--custom jscript file-->
  <script src="script.js"></script>
</body>
      </body>
</html>