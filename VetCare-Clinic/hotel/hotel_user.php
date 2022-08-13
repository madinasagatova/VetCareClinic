<?php
@include '../register_form/config.php'; //link to the file of the connection to DB
session_start(); //starting the session

if(!isset($_SESSION['user_name'])){ //getting the user name from the last session
    echo $_SESSION['user_id'];
    header('location:../register_form/login_form.php');
}

if(isset($_POST['submit'])){ //if statment,  when user presses btn 'submit' - post information to the DB 
  //var date1 - check-in date, date2 - check-out date, total days, total cost, comment 
  //hotel id is taken from hidden inpu, user id from the last session
  // pass needs to confirm the password and choose the user type
 
  $date1 = date('Y-m-d',strtotime(htmlspecialchars($_POST['check_in_date'])));
  $date2 = date('Y-m-d',strtotime(htmlspecialchars($_POST['check_out_date'])));
  $tot_cost =  mysqli_real_escape_string($conn, htmlspecialchars($_POST['total_cost']));
  $tot_days =  mysqli_real_escape_string($conn, htmlspecialchars($_POST['total_days']));
  $comment =  mysqli_real_escape_string($conn, htmlspecialchars ($_POST['comment']));
  $hotel_id =  mysqli_real_escape_string($conn, htmlspecialchars ($_POST['hotel_id']));
  $user_id = $_SESSION['user_id'];
  //need to fill in all the fields
  if(empty($date1)|| empty($date2)){
    $message[] = 'please fill in all the fields'; //error message
  }else {
    //if everything is correct submiting the data
  $insert = "INSERT INTO booking_hotel(check_in_date, check_out_date, total_days, total_cost, comment,hotel_id, user_id) VALUES('$date1','$date2', '$tot_days','$tot_cost','$comment','$hotel_id', '$user_id')";
    
        if (mysqli_query($conn, $insert)) {
            //echo "New record created successfully";
         $message[] = 'Your appointment was created successfully. We will come back to you soon'; //some message to show that an appointment was created
        } else{
          $message[] = 'could not add the aappointment'; // message if some problems with posting appointment 
        } 
  
  //mysqli_close($conn);
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
  <title>hotel user page</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
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
              <li><a class="active" href="/register_form/user_page.php">Home</a></li>
              <li><a href="../clinic/clinic_user.php">Clinic</a></li>
              <li><a href="hotel_user.php">Hotel</a></li>
              <li><a href="../shop/shop_user.php">Shop</a></li>
              <li><a href="/register_form/logout_page.php">Logout</a></li>
              <li><a href="cart.html"><i class="fa-solid fa-bag-shopping"></i></a></li>
          </ul>
      </div>
  </section>
  
  <!--section 'hero' - a picture with welcoming text -->
  <section id="hero">
    <h1>Welcome to the VetCare Hotel <span><?php echo $_SESSION['user_name']?></span></h1>
  </section>
  <!--form container Appointment Hotel form-->
    <div class="form-container"> 
    <form action="" method="post" enctype="multipart/form-data">
      <h3>Booking Form</h3>
      <?php //PHP code to show the error messages
       if(isset($message)){
       foreach($message as $message){
       echo'<span id = "message" class="message">'.$message.'</span>';
       }
       }
  ?>
      <!--PHP code to get hotel id, type and price from table hotels-->
      <?php
        $query = $conn->query("SELECT * FROM hotels");
        echo '<select class="hotel" >
        <option>Select Hotel Type</option>';
        while($obj = $query->fetch_object()){ //returns row of a result as an object
        echo '<option hotel_id="'.$obj->hotel_id.'" data-price="'.$obj->price_per_day.'" value="'.$obj->hotel_type.'">'.$obj->hotel_type.'</option>';
        }
        echo '</select>';
      ?></br>
 <!--the id of the hotel is hidden-->
   <input type="hidden" name="hotel_id" id="hotel_id"  class="box"> 
<!--posring price per day depending of the hotel id-->
    <span>  Price per day: </span></br>
    <input type="text" id="price" />
  <!--needs to choose the check-in date-->  
  </br><span>Check-in date: </span>
  <input type="text" name="check_in_date" id="check_in_date"  class="box"> 
  <!--needs to choose the check-out date--> 
 <span>Check-out date: </span>
  <input type="text" name="check_out_date" id="check_out_date"  class="box">
  <!--outputs the total days-->
  <p>Total days:
    <input name= "total_days" type="text" id="total_days" />
  </p>
<!--outputs the total price-->
  <p>Total price:</p>
 <input type="text" name ='total_cost' class="number" id="total_cost">
 <!--input some comment-->
  <textarea name="comment" id="message" class="form-control" rows="6" placeholder="Comment"></textarea>
  <!--submit btn-->
  <button type="submit" name="submit">Submit</button> 
  </form> 
  </div>
  
  <!--ajax and jquery links-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
  <script>
   // jQuery function that will change the var hotel type on price and hotel id regarding to user option 
   var price = 0; 
   var hotel_id = 0;
   $(function(){
   $('.hotel').change(function(){ 

   price = $(this).find('option:selected').attr('data-price'); //finds the seleted option and changes to the data - price 
   $('#price').val(price+'€'); // and place to the class price

   hotel_id = $(this).find('option:selected').attr('hotel_id');//finds the seleted option and changes to the hotel id 
    $('#hotel_id').val(hotel_id); // and place to the hidden class hotel_id
    });
   });   
</script>

  <script>
  //jquery datepicker - to pick check-in date 
                //$(document).ready(function(){
   // placing the first calendar 
    $("#check_in_date").datepicker({
    minDate: 0,
    maxDate: '+1Y+6M',
    onSelect: function (dateStr) {
      var min = $(this).datepicker('getDate'); // Get selected date
      $("#check_out_date").datepicker('option', 'minDate', min || '0'); // Set other min, default to today
    },
    beforeShowDay: function(date){
      var day = date.getDay();
       return[(day != 0), ''];
       }
    });
    // placing the second calendar 
    $("#check_out_date").datepicker({
    minDate: '0',
    maxDate: '+1Y+6M',
    onSelect: function (dateStr) {
      var max = $(this).datepicker('getDate'); // Get selected date
      $('#datepicker').datepicker('option', 'maxDate', max || '+1Y+6M'); // Set other max, default to +18 months
      //creating two variables to get chosen dates 
      var start = $("#check_in_date").datepicker("getDate");
      var end = $("#check_out_date").datepicker("getDate");
      //and calculating the total amount of days 
      var total_days = (end - start) / (1000 * 60 * 60 * 24);
      $("#total_days").val(total_days); //sending var into class total_days
      //creating var total price to get total cost 
      var total_price = price*total_days;
     $('#total_cost').val(total_price+'€'); //sending var into class total_price
    
    },
    beforeShowDay: function(date){
      var day = date.getDay();
      return[(day != 0), ''];
      }
});           
               
             // });
             //if hotel_type is selected, the price will be shown in the textbox
   
  </script>
  
  
 
  
</body>
</html>