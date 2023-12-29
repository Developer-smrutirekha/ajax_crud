<?php
$servername = "localhost";
$username = "root";
$pass = "";
$dbname = "srsmannu";

$conn = mysqli_connect($servername, $username, $pass, $dbname);

extract($_POST);

// if (isset($_POST['sname']) && isset($_POST['sname']) && isset($_POST['sage']) && 
// isset($_POST['semail']) && isset($_POST['spassword']) )
// {
    
    $query = "INSERT INTO `smruti`( `name`,`age`, `email`, `password`)
     VALUES ('$sname','$sage','$semail','$spassword')";
//  mysqli_query($conn,$query);

 if(mysqli_query($conn,$query)){

     echo json_encode(['status'=>1]);
 }else{
    echo json_encode(['status'=>0]);
 }
 
// }




 ?>