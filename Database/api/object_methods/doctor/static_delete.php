<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
  
// include database and object files
include_once '../../config/database.php';
include_once '../../objects/doctor.php';
  
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
  
// initialize object
$doctor = new Doctor($db);

// Object properties
$Doctor_ID = 123456896;
  
// query products
$stmt = $doctor->delete_doctor($Doctor_ID);

?>