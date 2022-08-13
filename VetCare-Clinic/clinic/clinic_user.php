<?php
@include '../register_form/config.php'; //link to the file of the connection to DB
session_start(); //starting the session
if(!isset($_SESSION['user_name'])){ //getting the user name from the last session
    header('location:login_form.php');
    
}
if(isset($_POST['submit'])){ //if statment,  when user presses btn 'submit' - post information to the DB 
  //var date - the date of the appointment, time - choose time options, pet name, comment 
  //service id and specie id are taken from hidden inputs, user id from the last session
  
  $date = date('Y-m-d',strtotime(htmlspecialchars($_POST['date'])));
  $time =  mysqli_real_escape_string($conn,  $_POST['time']);
  $pet_name =  mysqli_real_escape_string($conn,htmlspecialchars( $_POST['pet_name']));
  $comment =  mysqli_real_escape_string($conn, htmlspecialchars( $_POST['message']));
  $service_id =  mysqli_real_escape_string($conn, $_POST['service_id']);
  $specie_id =  mysqli_real_escape_string($conn, $_POST['specie_id']);
  $user_id = $_SESSION['user_id'];
  if(empty($pet_name)|| empty($date ) || empty($time) ){
    $message[] = 'please fill in all the fields'; //error message
  } else{
  //checking the date and the time from db to see if it is already booked or not 
  $select = "SELECT * FROM booking_clinic WHERE date = '$date' && time = '$time'";
  $result = mysqli_query($conn, $select);
  if(mysqli_num_rows($result)>0){ //output an error message if it is already booked 
    $error[] = 'Unfortunately appointment is not available! choose another date and time ';
  
}else {
  //submiting the data
  $insert = "INSERT INTO booking_clinic(date, time, user_id, pet_name, comment,service_id,specie_id) VALUES('$date','$time', '$user_id','$pet_name','$comment','$service_id','$specie_id')";
    
  if (mysqli_query($conn, $insert)) {
    //echo "New record created successfully";
    $message[] = 'Thank you for booking an appointment in our Clinic. we will get in touch with you soon!';
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}
  //mysqli_close($conn);
}
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
  <title>booking clinic appointment page</title>
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
  <!--custome css file link-->
  <link rel="stylesheet" href="style.css">
</head>
<!--body begins here-->
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
              <li><a href="cart.html"><i class="fa-solid fa-bag-shopping"></i></a></li>
          </ul>
      </div>
  </section>
  <!--section 'hero' - a picture with welcoming text -->
  <section id="hero">
    <h1>Welcome to the VetCare Hotel <span><?php echo $_SESSION['user_name']?></span></h1>
  </section>
  <!--form container Appointment Clinic form-->
  <section>
  <div class="form-container"> 
    <form action="" method="post">
      <h3>Booking Form</h3>
      <img src="../img/veterinarian-with-many-kind-animals_1308-65733.jpeg" alt="">
      <?php
        if(isset($error)){ //PHP code to show the error messages
            foreach($error as $error){
                echo'<span class ="error msg">'.$error.'</span>';
            };
        };
        ?>
        <?php
  if(isset($message)){
foreach($message as $message){ //PHP code to show the  messages
    echo'<span class="message">'.$message.'</span>';
}
  }
  ?>
        <!--PHP code to get service id, type and price from table services-->
      <?php 
require_once('../register_form/config.php'); 
$services = $conn->query('SELECT * FROM services');
?><select name="service" id="service-list">
<option value="">Select Service</option>
	<?php
	if ($services->num_rows > 0) {
		// output data of each row
		while($row = $services->fetch_assoc()) {
		?>
			<option cost = "<?php echo htmlspecialchars ($row["cost"]); ?>"value="<?php echo  htmlspecialchars($row["service_id"]); ?>"><?php echo htmlspecialchars ($row["service_type"]); ?></option>
			<?php
		}
	}
	?>
  </select>
  <!--the id of the service is hidden-->
   <input type="hidden" name="service_id" id="service_id"  class="box"> 
  <!--needs to choose the appointment date-->
    <span>Appointment date: </span>
    <input type="text" name="date" id="date" placeholder="Y-m-d" class="box">
  <!--needs to choose the appointment time-->
    <select name="time" id="time-list">
    <option value=''>Select time</option>
    </select>

    <!--PHP code to get specie id and type from table species-->
      <?php
      
      $query = $conn->query("SELECT * FROM species");
      echo '<select class="species">
        <option>Select Specie Type</option>';
      while($specie = $query->fetch_object()){
        echo '<option specie_id="'.$specie->specie_id.'"  value="'.$specie->specie_type.'">'.$specie->specie_type.'</option>';
        
      }
        echo '</select>';
      ?></br>
      <!--the id of the specie is hidden-->
       <input type="hidden" name="specie_id" id="specie_id"  class="box"> 
      <!--the price outputs here-->
      <span>  Price : </span></br>
      <input type="text" name = "price" id="price" />
      <!--pet's details and comment -->
      <span>Your pet's details: </span>
      <input type="text" name="pet_name" placeholder="Pet Name" class="box">
      <textarea name="message" id="message" class="form-control" rows="6" placeholder="Reason for the appointment"></textarea>
      <!--submit btn-->
      <button type="submit" name="submit">Submit</button>
      
  </form> 
  </div>
  </section>
   <!--ajax and jquery links-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
      <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>-->
        <script>

                //jquery datepicker
                $("#date").datepicker({
                  minDate: 0,
                  maxDate: '+1Y+6M',
                  onSelect: function (dateStr) {
                  var min = $(this).datepicker('getDate'); // Get selected date
                  $("#date").datepicker('option', 'minDate', min || '0'); // Set other min, default to today
                  },
                  beforeShowDay: function(date){ //blocks the dates 
                  var day = date.getDay();
                  return[(day != 0), ''];
                  }
                  });
             </script>
             
             <script>
    // jQuery function that will change the var service type on price regarding to user option 
              $(function(){
              $('#service-list').change(function(){
              var price = $(this).find('option:selected').attr('cost'); //finds the seleted option and changes to the data - cost
              $('#price').val(price+'€'); //sending var into class price
   
               });
               // jQuery function that will change the var specie type on specie id regarding to user option 
              $('.species').change(function(){
              var specie_id = $(this).find('option:selected').attr('specie_id'); //finds the seleted option and changes to the data - specie-id
              $('#specie_id').val(specie_id); //sending var into class specie id
               });
              });      
     
// ajax function that will change the var specie id to the time using the foreing key regarding to user option 
$('#service-list').on('change', function(){
	var service_id = this.value;
  $('#service_id').val(service_id);
		$.ajax({
		type: "POST", //using post method into get_time.php
		url: "../admin_panel/get_time.php",
		data:'service_id='+service_id, 
		success: function(result){
			$("#time-list").html(result); //sending into class time-list
		}
		});
   
});
     

</script>

        
</body>
</html>