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
$Doctor_ID = 123456781;
$H_Number = 200200200;
$MR_Number = 101010108;
$Test_ID = 123456;

  
// query products
$stmt = $doctor->deleteTest($Doctor_ID, $H_Number, $MR_Number, $Test_ID);

?>