<?php
$servername="localhost";
$username="root";
$password="";
$dbname="crud";

$conn=new mysqli($servername,$username,$password,$dbname);

if($conn->connect_error){
 die("connnection error");
}
//echo"conection successfully";

?>