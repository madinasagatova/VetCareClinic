<?php
@include 'config.php'; //connecting to DB
session_start(); //starting the last session 
if(!isset( $_SESSION['user_name'])){ //to get the user name for 
    header('location:login_form.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<!--header starts-->
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>User page</title>
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
  <link rel="stylesheet" href="../style.css">
</head>
<!--body begins here-->
<body>
  <!--section header - horizontal navigation bar with logo-->
  <section id="header">
      <a href="#"><img src="../img/LogoMakr-889xka.png"  class="logo" alt=""></a>
      <div>
          <ul id="navbar">
              <li><a class="active" href="user_page.php">Home</a></li>
              <li><a href="../clinic/clinic_user.php">Clinic</a></li>
              <li><a href="../hotel/hotel_user.php">Hotel</a></li>
              <li><a href="../shop/shop_user.php">Shop</a></li>
              <li><a href="logout_page.php">Logout</a></li>
              <li><a href="cart.php"><i class="fa-solid fa-bag-shopping"></i></a></li>
          </ul>
      </div>
  </section>
  <!--section 'hero' - a picture with welcoming text -->
  <section id="hero">
    <h1>Welcome to the VetCare Clinic <span><?php echo $_SESSION['user_name']?></span></h1>
  </section>
  <!--section 'about' - just some text information aboit the organisation-->
  <section id="about" >
    <h1>Welcome to VetCare Clinic</h1>
    <p>Providing veterinary care since 2017</p>
    <h4>VetCare Clinic is a small animal clinic with their own pet Hotel located in Dublin city.
       It is a modern facility with fully equipment laboratory.</h4> 
      <h4>At VetCare clinic, we have facilities for surgery, dentistry, dermatology, blood testing and much more.</h4>
      <h4>At VetCare Hotel, we have separate rooms for dogs and cats to make the Hotel  environment as stress-free as possible for our clients. </h4>
    <h4>VetCare Clinic has a small shop where you can buy some food or other products for your pets.</h4>
  </section>
  <!--service boxes with links -->
  <section id="services" class="section-p1">
    <h1>Profeccional Veterinary Care</h1>
    <p>To make an appointment or book a hotel click on the services below:</p>

    <div class="boxes">
      <h6>VetCare Clinic</h6><a href="../clinic/clinic_user.php">
      <img src="../img/home.jpeg" alt="">
    </div>
  
    <div class="boxes">
      <h6>VetCare Hotel</h6><a href="../hotel/hotel_user.php">
      <img src="../img/hotel-2.jpg" alt=""> 
    </div>

    <div class="boxes">
      <h6>VetCare Shop</h6><a href="../shop/shop_user.php">
      <img src="../img/pet-shop.jpeg" alt=""> 
    </div>
  </section>
  <!--custom jscript file-->
  <script src="script.js"></script>
</body>
<!--footer starts here-->
<footer>
  <p>Our contacts:<br>
    <a href="vet_care_clinic@gmail.com">Email us: vet_care_clinic@gmail.com</a></br>
    <a href="tel:123-456-7890">Phone number: 123-456-7890</a></br>
    <a href="https://goo.gl/maps/z1iXcpnXNupE5nFL8">Address: St Andrew's St, Dublin, D02 C890</a></br>
  </p>
  <!--Google map (shows the address on the map)-->
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d148.8753562533817!2d-6.261973374039822!3d53.34315415991863!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48670e9c8f0f3f0f%3A0xf8047e06e6cf1446!2sSt%20Andrew&#39;s%20St%2C%20Dublin%2C%20D02%20C890!5e0!3m2!1sen!2sie!4v1660210792884!5m2!1sen!2sie" width="300" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    
</footer>
</html>