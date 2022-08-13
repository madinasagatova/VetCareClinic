<?php
@include '../register_form/config.php'; //link to the file of the connection to DB
$product_id = $_GET['edit'];

if(isset($_POST['update_product'])){ //if statment,  when user presses btn 'update product' -
  // change the information of the product in the DB 

    $product_name = mysqli_real_escape_string($conn,htmlspecialchars ($_POST['product_name']));
    $description = mysqli_real_escape_string($conn, htmlspecialchars ($_POST['description']));
    $price = mysqli_real_escape_string($conn, htmlspecialchars($_POST['price']));
    $product_image = $_FILES['product_image']['name'];
    $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
    $product_image_folder = '../img/products'.$product_image;
//checks if the rows are empty or not 
if(empty($product_name)|| empty($description) || empty($price) || empty($product_image)){
$message[] = 'please fill in all'; //error message
} else{
  //updating the data 
    $update = "UPDATE products SET product_name = '$product_name', description = '$description', price = '$price', image = '$product_image'
    WHERE product_id = $product_id";
    $upload = mysqli_query($conn,$update);
if($upload){
    move_uploaded_file($product_image_tmp_name, $product_image_folder);
    header('location:shop_admin.php');
}else{
    $message[] = 'could not update the product'; //error message if could not upgrade the product 
}
}
};
?>
<!--html begins-->
<!DOCTYPE html>
<html lang="en">
<!--header starts-->
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Shop update admin page</title>
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
  <!--section header - horizontal navigation bar with logo-->
  <section id="header">
      <a href="#"><img src="../img/LogoMakr-889xka.png"  class="logo" alt=""></a>
      <ul id="navbar">
      <li><a class="active" href="admin_page.php">Admin Panel</a></li>
      <li><a href="/register_form/logout_page.php">Logout</a></li>     
      </ul>
  </section>
  <?php
  if(isset($message)){ //PHP code to show the error messages
foreach($message as $message){
    echo'<span class="message">'.$message.'</span>';
}
  }
  ?>
  <!--form container to upgrade the products -->
  <div class="form-container"> 
    <!--PHP code to upgrade products based on product id-->
  <?php
$select = mysqli_query($conn, "SELECT * FROM products WHERE product_id = $product_id");
while($row = mysqli_fetch_assoc($select)){
?>
  <form action="" method="post" enctype="multipart/form-data">

        <h3>Update the product</h3>
        
        <input type="text" name="product_name"  placeholder="enter product name" value="<?php $row['product_name'];?>" class="box">
        <textarea type="text" name="description"  placeholder="description" value="<?php $row['description'];?>" class="box"></textarea>
        <input type="number" name="price"  placeholder="enter product price"value="<?php $row['price'];?>" class="box">
        <input type="file" name="product_image"  accept="image/png, image/jpeg, image/jpg" value="<?php $row['image'];?>" class="box">
        <input type="submit" name="update_product" value="update product" class="form-btn">
        <a href="shop_admin.php" class="btn">go back</a>
    </form>
    <?php };?>
</div>
</body>
</html>