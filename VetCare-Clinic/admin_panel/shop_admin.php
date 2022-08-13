<?php
@include '../register_form/config.php'; //link to the file of the connection to DB

if(isset($_POST['add_product'])){ //if statment,  when user presses btn 'add product' -
    // it adds a new product in the DB 
    $product_name = mysqli_real_escape_string($conn, htmlspecialchars( $_POST['product_name']));
    $description = mysqli_real_escape_string($conn, htmlspecialchars ($_POST['description']));
    $price = mysqli_real_escape_string($conn, htmlspecialchars ($_POST['price']));
    $product_image = $_FILES['product_image']['name'];
    $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
    $product_image_folder = '../img/products/'.$product_image;
    //cheching if the rows are empty or not 
if(empty($product_name)|| empty($description) || empty($price) || empty($product_image)){
$message[] = 'please complete this field';
} else{
    //posting the data 
    $insert = "INSERT INTO products(product_name, description, price, image) VALUES ('$product_name','$description', '$price', '$product_image')";
    $upload = mysqli_query($conn,$insert);
    if($upload){
    move_uploaded_file($product_image_tmp_name, $product_image_folder);
    $message[] = 'new product added successfully'; //message if the product was added succesfully 
    }else{
    $message[] = 'could not add the product'; //error message if could not post the product 
    }
  } 
};

if(isset($_GET['delete'])){ //if statment,  when user presses btn 'delete' -
    // the product will be deleted from db
    $product_id = htmlspecialchars ($_GET['delete']);
    mysqli_query($conn,"DELETE FROM products WHERE product_id = $product_id");
    header('location:shop_admin.php');

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
  <title>Shop management page</title>
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
  <link rel="stylesheet" href="/register_form/style.css">
</head>
<!--body begins here-->
<body>
    <!--section header - horizontal navigation bar with logo-->
  <section id="header">
      <a href="#"><img src="../img/LogoMakr-889xka.png"  class="logo" alt=""></a>
      <div>
      <ul id="navbar">
      <li><a class="active" href="admin_page.php">Admin Panel</a></li>
      <li><a href="/register_form/logout_page.php">Logout</a></li>     
      </ul>
      </div>
  </section>
  <!--form container to add new products -->
  <div class="form-container"> 
  <?php
  if(isset($message)){
foreach($message as $message){ //PHP code to show the error messages
    echo'<span class="message">'.$message.'</span>';
}
  }
  ?>
  <form action="" method="post" enctype="multipart/form-data">
        <h3>Add a new products</h3>
        
        <input type="text" name="product_name" required placeholder="enter product name" class="box">
        <textarea type="text" name="description" required placeholder="description"class="box"></textarea>
        <input type="number" name="price" required placeholder="enter product price"class="box">
        <input type="file" name="product_image" required accept="image/png, image/jpeg, image/jpg" class="box">
        <input type="submit" name="add_product" value="add a product" class="form-btn">
        
    </form>
</div>
<!--PHP code to show added products in a table-->
 <?php
 $select = mysqli_query($conn,"SELECT * FROM products");
 ?>
 <section id="hero">
 <div class="product-display">
     <table class="product-display-table">
     <thead>
         <tr>
             <td scope="col">product image</td>
             <td scope="col">product name</td>
             <td scope="col">product description</td>
             <td scope="col">product price</td>
             <td scope="col" colspan="2">action</td>
         </tr>
     </thead>
     <?php
     while($row = mysqli_fetch_assoc($select)){ //fetching the data and posting in the table 
     ?>
      <tr>
             <td scope="col"><img src="../img/products/<?php echo $row['image'];?>" height="100" alt=""></td>
             <td scope="col"><?php echo $row['product_name'];?></td>
             <td scope="col"><?php echo $row['description'];?></td>
             <td scope="col"><?php echo $row['price'];?>€</td>
             <td >
                 <!--two btn delete and edit products-->
                 <a href="shop_edit_admin.php?edit=<?php echo $row['product_id'];?>" class="btn"><i class="fas fa-edit"></i>edit</a>
                 <a href="shop_admin.php?delete=<?php echo $row['product_id'];?>" class="btn"><i class="fas fa-trash"></i>delete</a>
             </td>
         </tr>
     <?php };?>
     </table>
 </div>
  </section>
</body>
</html>