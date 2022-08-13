<?php
@include '../register_form/config.php'; //link to the file of the connection to DB
session_start(); //starting the session
if(!isset($_SESSION['admin_name'])){ //getting the admin name from the last session 
    header('location:../register_form/login_form.php');
}

//sql stqtment to get data connected with foreign keys of the clinic appointments
$select = 'SELECT booking_clinic.booking_id, booking_clinic.date, booking_clinic.time, user_form.first_name,user_form.phone_number, services.service_type, services.cost, booking_clinic.pet_name, booking_clinic.comment, species.specie_type FROM booking_clinic INNER JOIN services ON booking_clinic.service_id = services.service_id INNER JOIN user_form ON booking_clinic.user_id=user_form.user_id INNER JOIN species ON booking_clinic.specie_id=species.specie_id';
$result = mysqli_query($conn, $select);

if(isset ( $_GET['delete'])){//if statment,  when user presses btn 'delete' -
  // the appointment will be deleted from db
  $booking_id = htmlspecialchars( $_GET['delete']);
  mysqli_query($conn,"DELETE FROM booking_clinic WHERE booking_id = $booking_id");
  header('location:manage_vet_appointment.php');

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
  <title>Manage clinic appoinment page</title>
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
    <h1>All Clinic Appointments</h1>
    <table width="90%"  >
        <thead>
  <tr>
    <th width="13%" height="42" scope="col" >S no.</th>
    <th width="13%" height="42" scope="col">Service</th>
    <th width="13%" height="42" scope="col">Date</th>
    <th width="13%" height="42" scope="col">Time</th> 
    <th width="13%" height="42" scope="col">Client name</th>
    <th width="13%" height="42" scope="col">Contact phone number</th>
    <th width="13%" height="42" scope="col">Price</th>
    <th width="13%" height="42" scope="col">Specie Type</th>
    <th width="13%" height="42" scope="col">Pet's name</th>
    <th width="13%" height="42" scope="col">Comment</th>
    
  </tr>
        </thead>
        <tbody>
  <tr>
      <?php while ($row = mysqli_fetch_array($result)) { //fetching the data 
      ?>
    <td ><?php echo htmlspecialchars($row['booking_id']);?></td>
    <td><?php echo htmlspecialchars($row['service_type']);?></td>
    <td><?php echo htmlspecialchars($row['date']);?></td>
    <td><?php echo htmlspecialchars($row['time']);?></td>
    <td><?php echo htmlspecialchars($row['first_name']);?></td>
    <td><?php echo htmlspecialchars($row['phone_number']);?></td> 
    <td><?php echo htmlspecialchars($row['cost']);?></td>
    <td><?php echo htmlspecialchars($row['specie_type']);?></td>
    <td><?php echo htmlspecialchars( $row['pet_name']);?></td>
    <td><?php echo htmlspecialchars( $row['comment']);?></td>
    <td >
        <a href="manage_vet_appointment.php?delete=<?php echo htmlspecialchars($row['booking_id']);?>" class="btn"><i class="fas fa-trash"></i>Cancel</a>
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