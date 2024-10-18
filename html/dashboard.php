<?php
session_start();
if($_SESSION['login_info'] != "yes")
{
  header("Location: ../html/index.php");
}

$id = $_SESSION['login_id'];



include '../database/database.php';

$sql = "Select * from login_info where id= '$id'";
$result = $conn->query($sql);

$row = $result->fetch_assoc();



$sql1 = "Select * from student_data";
$result1 = $conn->query($sql1);

$row1 = $result1->fetch_assoc();



?>


<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>Bootstrap Theme Simply Me</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
  body {
    font: 20px Montserrat, sans-serif;
    line-height: 1.8;
    color: #f5f6f7;
  }
  p {font-size: 16px;}
  .margin {margin-bottom: 45px;}
  .bg-1 { 
    background-color: #1abc9c; /* Green */
    color: #ffffff;
  }
  .bg-2 { 
    background-color: #474e5d; /* Dark Blue */
    color: #ffffff;
  }
  .bg-3 { 
    background-color: #ffffff; /* White */
    color: #555555;
  }
  .bg-4 { 
    background-color: #2f2f2f; /* Black Gray */
    color: #fff;
  }
  .container-fluid {
    padding-top: 70px;
    padding-bottom: 70px;
  }
  .navbar {
    padding-top: 15px;
    padding-bottom: 15px;
    border: 0;
    border-radius: 0;
    margin-bottom: 0;
    font-size: 12px;
    letter-spacing: 5px;
  }
  .navbar-nav  li a:hover {
    color: #1abc9c !important;
  }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Me</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        
      <li><a href="#">  UserID : <?php  echo $row["id"];    ?>   </a></li>
        <li><a href="#">  UserName : <?php  echo $row["uname"];    ?>   </a></li>
        <li><a href="#">  Password : <?php  echo $row["password"]    ?>   </a></li>
        
      </ul>
    </div>
  </div>
</nav>


<table style="color:black;">
  <tr>
    <th>ID</th>
    <th>NAME</th>
    <th>Class</th>
    <th>Address</th>
  </tr>


  <?php     
  
  while($row1 = $result1->fetch_assoc()) {

    // echo $row1["id"];

    ?>


    <tr>
    <td><?php echo $row1["id"];  ?></td>
    <td><?php echo $row1["name"];  ?></td>
    <td><?php echo $row1["class"];  ?></td>
    <td><?php echo $row1["address"];  ?></td>
    </tr>
    

<?php

  }
  ?>
  

  


  
</table>


<!-- Second Container -->
<div class="container-fluid bg-2 text-center">
  <h3 class="margin">What Am I?</h3>
  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
  <a href="../php/logouthandler.php" class="btn btn-default btn-lg">
    <span class="glyphicon glyphicon-search"></span> Logout
  </a>
</div>



<!-- Footer -->


</body>
</html>
