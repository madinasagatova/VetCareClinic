
<?php
// connection to the DB by using mysqli 
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
set_exception_handler(function($e){
    error_log($e->getMessage());
    exec('Error connecting to database'); //errror message 
});
//connecting to DB, name = vet_clinic using mysqli connection 
$conn = new mysqli('127.0.0.1','root','','vet_clinic');
$conn->set_charset("utf8mb4");


?>