<?php
$servername = "localhost";
$username = "root";
$pass = "";
$dbname = "srsmannu";

$conn = mysqli_connect($servername, $username, $pass, $dbname);

$id=$_POST['id'];

$sql="DELETE  FROM `smruti` WHERE id=$id" ;
$result =mysqli_query($conn,$sql);

?>