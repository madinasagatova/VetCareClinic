<?php
@include '../register_form/config.php'; //link to the file of the connection to DB
session_start(); //starting the session
if(!isset($_SESSION['admin_name'])){ //getting the admin name from the last session
    header('location:../register_form/login_form.php');
}
//sql stqtment to get data connected with foreign keys of the hotel appointments
$select = 'SELECT booking_hotel.booking_hotel_id,booking_hotel.check_in_date, booking_hotel.check_out_date, booking_hotel.total_days, booking_hotel.total_cost, booking_hotel.comment, hotels.hotel_type, user_form.first_name, user_form.last_name, user_form.phone_number, user_form.email FROM booking_hotel INNER JOIN hotels ON booking_hotel.hotel_id = hotels.hotel_id INNER JOIN user_form ON booking_hotel.user_id = user_form.user_id';
$result = mysqli_query($conn, $select);
if(isset ( $_GET['delete'])){
  $booking_id = htmlspecialchars( $_GET['delete']);
  mysqli_query($conn,"DELETE FROM booking_hotel WHERE booking_hotel_id = $booking_id");
  header('location:manage_hotel_appointment.php');

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
  <title>Manage hotel appoinment page</title>
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
  <!--section header - horizontal navigation bar -->
  <section id="header">
      <a href="#"><img src="../img/LogoMakr-889xka.png"  class="logo" alt=""></a>
      <div>
      <ul id="navbar">
      <li><a class="active" href="admin_page.php">Admin Panel</a></li>
      <li><a href="/register_form/logout_page.php">Logout</a></li>     
      </ul>
      </div>
  </section>
  <!--section hero a table with appointments and cancel btn-->
  <section id="hero">
  
    <h1>All Hotel Appointments</h1>
    <table width="90%"  >
        <thead>
  <tr>
    <th width="13%" height="42" scope="col" >S no.</th>
    <th width="13%" height="42" scope="col">Check In</th>
    <th width="13%" height="42" scope="col">Check Out</th>
    <th width="13%" height="42" scope="col">Hotel Type</th>
    <th width="13%" height="42" scope="col">First Name</th>
    <!--<th width="13%" height="42" scope="col">Last Name</th>-->
    <th width="13%" height="42" scope="col">Phone number</th>
    <th width="13%" height="42" scope="col">Email</th>
    <th width="13%" height="42" scope="col">Comment</th>
    <th width="13%" height="42" scope="col">Total Days</th>
    <th width="13%" height="42" scope="col">Total Cost</th>
  </tr>
        </thead>
        <tbody>
  <tr>
      <?php while ($row = mysqli_fetch_array($result)) { //fetching the data  ?>
    <td ><?php echo htmlspecialchars ($row['booking_hotel_id']);?></td>
    <td><?php echo htmlspecialchars ($row['check_in_date']);?></td>
    <td><?php echo htmlspecialchars($row['check_out_date']);?></td>
    <td><?php echo htmlspecialchars($row['hotel_type']);?></td>
    <td><?php echo htmlspecialchars($row['first_name']);?></td>
    <td><?php echo htmlspecialchars($row['phone_number']);?></td>
    <td><?php echo htmlspecialchars( $row['email']);?></td>
    <td><?php echo htmlspecialchars( $row['comment']);?></td>
    <td><?php echo htmlspecialchars($row['total_days']);?></td>
    <td><?php echo htmlspecialchars($row['total_cost']);?></td>
    <td >
        <a href="manage_hotel_appointment.php?delete=<?php echo $row['booking_hotel_id'];?>" class="btn"><i class="fas fa-trash"></i>Cancel</a>
    </td>
  </tr>
  <?php
} ?>
        </tbody>
</table>
  </section>
  <script src="script.js">
    
  </script>
</body>
</html>