<?php
session_start();
if(!isset($_SESSION["user"])){
  header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
		body{
    margin-top: 5px;
    background-image: url('background.jpg');
    background-repeat: no-repeat;
    background-attachment: fixed; 
    background-size: 100% 100%;
            } 
    </style>  
</head>
<body>
  <div class="container-fluid mt-3">
    <button class="btn btn-outline-light text-dark btn-md" style="float:right;"><a href="index.php" style="text-decoration: none; color:black;">LOG OUT</a></button>
    <p></p><br><br><br>
    <p class="h1 text-center" style="font-size:50px; font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif; color: white;" ><b>Hello!</b></p>
    <img src="welcome.gif" class=" img-fluid mx-auto d-block " style="height: 300px;" alt="welcome img">
  </div>
</body>
</html>