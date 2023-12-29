<?php
$servername = "localhost";
$username = "root";
$pass = "";
$dbname = "srsmannu";

$conn = mysqli_connect($servername, $username, $pass, $dbname);

// extract($_GET);


$sql="SELECT * FROM `smruti`" ;
$result =mysqli_query($conn,$sql);
if($result){
    $output=mysqli_fetch_all($result,MYSQLI_ASSOC);
    echo json_encode(['status'=>1, 'data'=>$output]);
}else{
    echo "data not found";
}

?>