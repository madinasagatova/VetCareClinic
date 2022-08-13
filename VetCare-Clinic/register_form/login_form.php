<?php
@include 'config.php'; //connecting to DB

session_start(); //starting  session

if(isset($_POST['submit'])){
  //$first_name = mysqli_real_escape_string($conn,htmlspecialchars( $_POST['first_name']));
  //$last_name = mysqli_real_escape_string($conn, htmlspecialchars ($_POST['last_name']));
  $email = mysqli_real_escape_string($conn,$_POST['email']);
  //$phone = mysqli_real_escape_string($conn, htmlspecialchars ($_POST['phone']));
  $pass = md5($_POST['password']);
  //$cpass = md5($_POST['confpassword']);
  //$user_type = $_POST['user_type'];
//checks email and pass if user exist or not 
    $select = "SELECT * FROM user_form WHERE email = '$email' && password = '$pass'";
    $result = mysqli_query($conn, $select);
    if(mysqli_num_rows($result)>0){
       $row = mysqli_fetch_array($result);
       
       if($row['user_type'] == 'admin'){ //checks if admin
          $_SESSION['admin_name'] = $row['first_name'];
          $_SESSION['user_id'] = $row['user_id'];
          header('location:../admin_panel/admin_page.php');
       }elseif ($row['user_type'] == 'user'){ //checks if user
        $_SESSION['user_name'] = $row['first_name'];
        $_SESSION['user_id'] = $row['user_id'];
        header('location:user_page.php');
      }}else{
       $error[] = 'incorrect email or password!'; //error message if password and email are incorrect 
     }
    
};

?>
<!--html code-->
<!DOCTYPE html>
<html lang="en">
  <!--header starts-->
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>login form</title>
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
<div class="form-container">
    <form action="" method="post">
        <h3>login now</h3>
        <?php //PHP code to show the error messages
        if(isset($error)){
            foreach($error as $error){
                echo'<span id ="error-msg" class ="error-msg">'.$error.'</span>';
            };
        };
        ?>
        <!--login form-->
        <input type="email" name="email" required placeholder="enter your email">
        <input type="password" name="password" required placeholder="enter your password">
        <input type="submit" name="submit" value="login now" class="form-btn">
        <h4>don't have an account? <a href="register_form.php">register now</a></h4><!--the ling to register if user does not have an account -->
        <h4><a href="/index.html">Go back</a></h4> 
    </form>
</div>
</body>
</html>