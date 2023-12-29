<?php
$servername = "localhost";
$username = "root";
$pass = "";
$dbname = "srsmannu";

$conn = mysqli_connect($servername, $username, $pass, $dbname);
$id = $_POST['id'];
$name = $_POST['s_name'];
$age = $_POST['s_age'];
$email = $_POST['s_email'];
$password = $_POST['s_password'];

$sql="UPDATE `smruti` SET  `name`='$name',`age`='$age',`email`='$email',`password`='$password' WHERE `id`='$id'" ;
$result =mysqli_query($conn,$sql);

if($result){
    echo json_encode(['status'=>1]);
}else{
   echo json_encode(['status'=>0]);
}