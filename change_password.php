<?php $title="Change Password"; include_once "templates/header.php"; ?>
<div class="container-fluid mt-3">
    <button class="btn btn-outline-light text-dark btn-md ms-3" style="float:left; width: 90px;"><a href="welcome.php" style="text-decoration: none; color:black;">Back</a></button>
    <p></p><br><br>
    <div class="container mt-5">
    <div class="shadow-lg p-4 mb-4 bg-white">
    <center><p class="h3">Change Password</p></center>
    <div class="container mt-3">
    <?php
    session_start();
    if(!isset($_SESSION["user"])){
      header("Location: index.php");
    }
    include_once 'includes/functions.php';
    change_password();
    ?>
    <form action="change_password.php" method="post">
    <div class="form-floating mb-3 mt-3">
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
      <label for="email">Email</label>
    </div>
    <div class="form-floating mt-3 mb-3">
      <input type="password" class="form-control" id="oldpwd" placeholder="Old password" name="old_password" required>
      <label for="old_password">Old Password</label>
    </div>
    <div class="form-floating mt-3 mb-3">
      <input type="password" class="form-control" id="newpwd" placeholder="New password" name="new_password" required>
      <label for="new_password">New Password</label>
    </div>
    <center><button type="submit" name="submit" class="btn btn-warning" style="width: 150px;">Submit</button><center>
    </form>
    </div>
  </div>
</div>    
<?php include_once "templates/footer.php"; ?>