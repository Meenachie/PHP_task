<?php $title="Login"; include_once "templates/header.php"; ?>
<button class="btn btn-outline-light text-dark btn-md ms-3" style="float:left; width: 90px;"><a href="index.php" style="text-decoration: none; color:black;">Back</a></button>
<p></p><br><br>
<div class="container mt-5">
  <div class="shadow-lg p-4 mb-4 bg-white">
    <center><p class="h3">Log In</p></center>
    <div class="container mt-3">
    <?php
    include_once 'includes/functions.php'; 
    login();
    ?>  
    <form action="login.php" method="post">
    <div class="form-floating mb-3 mt-3">
      <input type="text" class="form-control" id="email" placeholder="Enter email" name="email" required>
      <label for="email">Email</label>
    </div>
    <div class="form-floating mt-3 mb-3">
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password" required>
      <label for="password">Password</label>
    </div>
    <center><button type="submit" name="login" class="btn btn-warning" style="width: 150px;">Log In</button><center>
        <hr>
        <p>Don't have an account?&nbsp;<a href="signup.php" style="text-decoration:none">Sign Up</a></p>
    </form>
    </div>
  </div>
</div> 
<?php include_once "templates/footer.php"; ?>