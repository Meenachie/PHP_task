<?php $title="Welcome"; include_once "templates/header.php"; ?>
  <?php 
  session_start();
  if(!isset($_SESSION["user"])){
    header("Location: index.php");
    exit;
  }
  include_once 'includes/functions.php'; 
  logout();
  ?>  
  <div class="container-fluid mt-3">
    <form action="welcome.php" method="post">
      <button type="submit" name="logout" class="btn btn-outline-light text-dark btn-md me-2" style="float:right;">Log Out</button>
    </form>
      <button class="btn btn-outline-light text-dark btn-md me-3" style="float:right;"><a href="change_password.php" style="text-decoration: none; color:black;">Change Password</a></button>
    <p></p><br><br><br>
    <p class="h1 text-center" style="font-size:50px; font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif; color: white;" ><b>Hello!</b></p>
    <img src="css/image/welcome.gif" class=" img-fluid mx-auto d-block " style="height: 300px;" alt="welcome img"><br>
    <p class="h4 text-center">View the User Dashboard <button type="submit" name="clickhere" class="btn btn-light btn-md ms-2"><a href="user_dashboard.php" style="text-decoration: none; color:black;">Click Here</a></button></p>
  </div>
  <?php include_once "templates/footer.php"; ?>