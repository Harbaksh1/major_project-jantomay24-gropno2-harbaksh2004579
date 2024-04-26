<?php 
$serverName="localhost";
$userName = "root";
$password= "";
$dbName = "donate";
// Create connection
$conn =  mysqli_connect($serverName,$userName,$password,$dbName);
if(!$conn){
    die("Connection failed: ".mysqli_connect_error());
}
else{
    // echo "<script>alert('connected successfully')</script>";
}


?>