<?php
include '../database/database.php';


$uname = $_REQUEST['uname'];
$password =$_REQUEST['password'];

// echo $uname;

$sql = "Insert into login_info values(8,'$uname','$password')";
$result = $conn->query($sql);

echo $result;

if($result)
{
    header("Location: ../html/dashboard.php");
}


// echo $result[0];



$conn->close();

// Check connection
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }
// echo "Connected successfully";
?>