<?php

/*If you don't want to make the variables constants
$dbuser_name = "root";
$dbpassword = ""; 
username: nelle
pw: XAMproj2020!
*/

define("dbuser_name","nelle");
define("dbpassword","");

$dsn = 'mysql:dbhost=localhost;dbname=test';
$connection = new PDO($dsn,dbuser_name,dbpassword);

?>