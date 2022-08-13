<?php
@include '../register_form/config.php'; //connection to the DB 
?>
<!DOCTYPE html>
<html lang="en">
<!--header starts-->
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Shop user page</title>
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
<!--Body starts-->
<body>
<!--section header - horizontal navigation bar with logo-->
<section id="header">
      <a href="#"><img src="../img/LogoMakr-889xka.png"  class="logo" alt=""></a>
      <div>
      <ul id="navbar">
              <li><a class="active" href="../register_form/user_page.php">Home</a></li>
              <li><a href="../clinic/clinic_user.php">Clinic</a></li>
              <li><a href="../hotel/hotel_user.php">Hotel</a></li>
              <li><a href="../shop/shop_user.php">Shop</a></li>
              <li><a href="../register_form/logout_page.php">Logout</a></li>
              <li><a href="cart.php"><i class="fa-solid fa-bag-shopping"></i></a></li>
          </ul>
      </div>
  </section>
  <!--section 'hero' - welcoming text -->
  <section id="hero">
    <h1>Welcome to the VetCare Shop </h1>
  </section>
  <!--PHP code starts - to fetch products -->
      <?php
      $select_product = mysqli_query($conn, "SELECT * FROM products"); //query here
      while ($row = mysqli_fetch_array($select_product)) { //fetches a result row as an associative array?>
      <div class="box-container">
      <form action="" method="post" class="box">
              <!--posting results -->
              <input type="hidden" name="product_id" value="<?php echo htmlspecialchars ($row['product_id']);?>">
              <button type="submit" class="fas fa-shopping-cart" name="add_to_cart"></button>
              <img src="../img/products/<?php echo $row['image'];?>" height="300" alt="" class="image">
              <input  name="product_name" value="<?php echo htmlspecialchars ($row['product_name']);?>" >
              <input  name="description" value="<?php echo htmlspecialchars($row['description']);?>" >
              <input  class="price" value="<?php echo htmlspecialchars( $row['price' ]);?>€">
              <div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="2" /><input type="submit" value="Add to Cart" class="btnAddAction" /></div>
              
      </form> 
      </div>   
          <?php };?>
        
        
  </section>
</body>
</html>