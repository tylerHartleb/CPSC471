<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// include database and object files
include_once '../../config/database.php';
include_once '../../objects/test.php';

// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

// initialize object
$test = new Test($db);

// Object properties\
$Test_ID = 153453543;
$TName = "MRI scan";
$Date = "2021-01-16";
$Result = "No problem";

// query products
$stmt = $test->post($TName, $Test_ID, $Date, $Result);

?>