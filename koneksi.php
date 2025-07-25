<?php
//error_reporting(0);

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'rkneeivc_msp');
define('DB_PASSWORD', 'Mo_1D-5w!l4E');
define('DB_NAME', 'mydb01');

//* Attempt to connect to MySQL database *//
$conn1 = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($conn1 === false) {
  die("ERROR: Could not connect. " . mysqli_connect_error());
}
