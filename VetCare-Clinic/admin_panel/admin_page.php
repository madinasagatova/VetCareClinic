<?php
@include '../registration_form/config.php'; //link to the file of the connection to DB
session_start(); //starting the session
if(!isset($_SESSION['admin_name'])){ //getting the admin name from the last session
    header('location:login_form.php');
}
?>
<!--html begins-->
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
  <link rel="stylesheet" href="../register_form/style.css"> 
</head>
 <!--body begins here-->
<body>
    <!--section header - horizontal navigation bar with admin name -->
  <section id="header">
      <a href="#"><img src="../img/LogoMakr-889xka.png"  class="logo" alt=""></a>
      
      <ul id="navbar">
      <h4>Admin <span><?php echo $_SESSION['admin_name']?></span></h4>
      <li><a class="active" href="admin_page.php">Admin Panel</a></li>
      <li><a href="/register_form/logout_page.php">Logout</a></li>
              
      </ul>
  </section>
   <!--section hero -boxes with management links -->
  <section id="hero">
  <div>
          <ul id="manager">
          <h1>Choose one of the options </h1>
          <div class="boxes">
            
              <a href="manage_vet_appointment.php">Clinic Appointments </a>
          </div>
          <div class="boxes">
              <a href="manage_hotel_appointment.php">Hotel Bookings </a>
          </div>
          <div class="boxes">
              <a href="shop_admin.php">Shop</a>
          </div>  
          </ul>
      </div>
  
   
    
  </section>
  <script src="script.js">
    
  </script>
</body>
</html>