<?php
include '../database/database.php';


$uname = $_REQUEST['uname'];
$password =$_REQUEST['password'];

// echo $uname;

$sql = "SELECT * FROM login_info where uname='$uname'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    $row = $result->fetch_assoc();

    if($password == $row["password"])
    {
        session_start();
        $_SESSION["login_info"] = "yes";
        $_SESSION["login_id"] = $row["id"];
        header("Location: ../html/dashboard.php");
        // echo "Login Successfully";
    }
    else{
        echo "Password Incorrect";
    }




  } else {
    echo "User Not Found";
  }

// echo $result[0];



$conn->close();

// Check connection
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }
// echo "Connected successfully";
?>