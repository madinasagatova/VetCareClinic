<!DOCTYPE html>
<html lang="en">
  <!--header starts-->
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Hotel page</title>
   <!--bootstrap cdn link-->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.0-beta1/css/bootstrap.min.css"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script> 
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css" />
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
              <li><a href="../clinic/clinic.php">Clinic</a></li>
              <li><a href="hotel.php">Hotel</a></li>
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
<!--section 'services' - just some text information about Hotel and services they have-->
  <section id="services" class="section-p1">
    <h1>About VetCare Hotel</h1>
    <p>Our dog and cat hotels are extremely popular and we recommend booking as far in advance. Every cat and dog are housed individually unless you have several pets 
        and you want them to share the same suite throughout their stay.</p>
    <div class="boxes">
      <h6>Dog's Hotel</h6>
      <img src="../img/boxes/dog.jpg" alt="">
    </div>
    <div class="boxes">
      <h6>Cat's Hotel</h6> 
      <img src="../img/boxes/cat.jpg" alt="">
    </div>
   <!--two link : registration or log in to book an appoinment-->
    <h4>To make a room reservation in VetCare Hotel you need to <a href="/register_form/register_form.php">register</a> or <a href="/register_form/login_form.php">sign in</a></h4>
  </section>
  <!--custom jscript file-->
  <script src="script.js"></script>
</body>

</html>