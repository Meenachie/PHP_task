<?php $title="Signup"; include_once "templates/header.php"; ?>
<button class="btn btn-outline-light text-dark btn-md ms-3" style="float:left; width: 90px;"><a href="index.php" style="text-decoration: none; color:black;">Back</a></button>
<p></p><br>
<div class="container mt-5">
  <div class="shadow-lg p-4 mb-4 bg-white">
    <center><p class="h3">Sign Up</p></center>
    <div class="container mt-3">
    <?php 
    include_once 'includes/functions.php';
    signup();
    ?>  
    <form action="signup.php" method="post">
    <div class="form-floating mb-3 mt-3">
      <input type="text" class="form-control" id="name" placeholder="Enter Your Name" name="name" >
      <label for="name">Name</label>
    </div>
    <div class="form-floating mb-3 mt-3">
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" >
      <label for="email">Email</label>
    </div>
    <div class="form-floating mt-3 mb-3">
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password" >
      <label for="password">Password</label>
    </div>
    <div class="form-floating mt-3 mb-3">
      <input type="password" class="form-control" id="pwdd" placeholder="Re-enter password" name="confirm_password" >
      <label for="confirm_password">Confirm Password</label>
    </div>
    <center><button type="submit" name="submit" class="btn btn-warning" style="width: 150px;">Sign Up</button><center>
        <hr>
        <p>Already have an account?&nbsp;<a href=login.php style="text-decoration:none">Login</a></p>
    </form>
    </div>
  </div>
</div> 
<?php include_once "templates/footer.php"; ?>