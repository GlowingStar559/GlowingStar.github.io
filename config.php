<?php
 session_start();
 $dbHost='localhost';
 $dbName='budgetplanner';
 $dbUsername='root';
 $dbPassword="";

$dbc = mysqli_connect("localhost", "root", "", "budgetplanner");
if (!$dbc) {

   die("Connection failed: " . mysqli_connect_error());

}
//return $dbc;

//$dbc = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);


//if (!$dbc) {
//
//    die("Connection failed: " . mysqli_connect_error());
//
//}

//mysqli_close($dbc);

?>