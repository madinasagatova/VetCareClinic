<?php
require_once('../register_form/config.php'); //link to the file of the connection to DB
//function to get time using the foreign key service id 
$service_id = mysqli_real_escape_string($conn, $_POST['service_id']);
	if($service_id!='')
	{
		$time_result = $conn->query('SELECT * FROM time_slots WHERE service_id='.$service_id.'');
		$options = "<option value=''>Select Time</option>";
		while($row = $time_result->fetch_assoc()) {
		$options .= "<option value='".$row['time']."'>".$row['time']."</option>";
	}
echo $options;
}?>