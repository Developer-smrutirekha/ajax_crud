<?php
$servername = "localhost";
$username = "root";
$pass = "";
$dbname = "srsmannu";

$conn = mysqli_connect($servername, $username, $pass, $dbname);

$id=$_POST['id'];

// echo $id;
// exit;

$sql="SELECT * FROM `smruti` WHERE `id`=$id";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);
    echo json_encode($data);