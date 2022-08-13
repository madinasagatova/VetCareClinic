<?php
@include 'config.php'; //conecting to DB
if(isset($_POST['submit'])){ //if statment, when user presses btn 'submit' - it posts information to the DB 
    //var first_name, last_name, email, phone, pass needs to confirm the password and choose the user type
    $first_name = mysqli_real_escape_string($conn,htmlspecialchars ($_POST['first_name']));
    $last_name = mysqli_real_escape_string($conn,htmlspecialchars($_POST['last_name']));
    $email = mysqli_real_escape_string($conn,htmlspecialchars ($_POST['email']));
    $phone = mysqli_real_escape_string($conn,htmlspecialchars ($_POST['phone']));
    $pass = md5($_POST['password']);
    $cpass = md5($_POST['confpassword']);
    $user_type = $_POST['user_type'];
    //checks email and pass if user exist or not 
    //if(empty($first_name)|| empty($last_name) || empty($email) || empty($phone) || empty($pass) || empty($cpass) || empty($user_type)){
       // $message[] = 'please complete this field';}
    $select = "SELECT * FROM user_form WHERE email = '$email' && password = '$pass'";
    $result = mysqli_query($conn, $select);
    if(mysqli_num_rows($result)>0){
        $error[] = 'user already has an account! Please log-in'; // error message if user already exist 

    }else{
        if($pass != $cpass){
            $error[] = 'password not matched!'; // error message if password not matched
        }else{
            //insert data if passing
            $insert = "INSERT INTO user_form(first_name, last_name, email, phone_number, password, user_type) VALUES('$first_name','$last_name', '$email','$phone','$pass','$user_type')";
        
            mysqli_query($conn, $insert);
            
            header('location:login_form.php');
        }
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
  <title>register form</title>
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
        <h3>register now</h3>

        <?php //PHP code to show the error messages
        if(isset($error)){
            foreach($error as $error){
                echo'<span class ="error-msg">'.$error.'</span>';
            };
        };
        ?>
        <!--Registration form-->
        <input type="text" name="first_name" required placeholder="enter your first name">
        <input type="text" name="last_name" required placeholder="enter your last name">
        <input type="email" name="email" required placeholder="enter your email">
        <input type="phone" name="phone" required placeholder="enter your phone number">
        <input type="password" name="password" required placeholder="enter your password">
        <input type="password" name="confpassword" required placeholder="confirm your password">
        <select name="user_type">
            <!--choose the type of user-->
            <option value="user">user</option>
            <option value="admin">admin</option>
        </select>
        <input type="submit" name="submit" value="register now" class="form-btn"> <!--submit btn-->
        <h4>Already have an account? <a href="login_form.php">login now</a></h4> <!--the ling to log in if user already has account -->
        <h4><a href="/index.html">Go back</a></h4>
    </form>
</div>
</body>
</html>