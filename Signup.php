<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
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
        .container {
    width: 90%; /* You can adjust this value to set the width of the container */
    max-width: 500px; /* You can set a maximum width if needed */
    margin: 0 auto; /* Center the container */
    }
        .shadow-lg {
    width: 100%;
    padding: 20px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    border-radius: 10px; /* Set the border radius for the shadowed div */
    overflow: hidden; /* Ensure rounded corners are visible */
    }
    </style> 
</head>
<body>
<p></p><br>
<div class="container mt-5">
  <div class="shadow-lg p-4 mb-4 bg-white">
    <center><p class="h3">Sign Up</p></center>
    <div class="container mt-3">
    <?php
    if(isset($_POST["submit"])){
      $Name=$_POST["name"];
      $Email=$_POST["email"];
      $Password=$_POST["password"];
      $Confirm_password=$_POST["confirm_password"];
      //$passwordHash=password_hash($Password, PASSWORD_DEFAULT);
      if($Password!==$Confirm_password){
        echo "<div class='alert alert-danger'>Password does not match</div>";
      }else{
        require_once "connect.php";
      $sql = "SELECT * FROM `signup` WHERE Email='$Email'";
      $result = mysqli_query($conn, $sql);
      $rowcount = mysqli_num_rows($result);
      if($rowcount>0){
        echo "<div class='alert alert-danger'>Email already exists!</div>";
      }else{
        $sql = "INSERT INTO `signup`(Name, Email, Password) VALUES(?,?,?)";
      $stmt = mysqli_stmt_init($conn);
      $preparestmt= mysqli_stmt_prepare($stmt,$sql);
      if($preparestmt){
        mysqli_stmt_bind_param($stmt,"sss",$Name,$Email,$Password);
        mysqli_stmt_execute($stmt);
        echo "<div class='alert alert-success'>You are registered successfully.</div>";
      }else{
        die("something went wrong");
      }
      }
      }
    }
    ?>
    <form action="Signup.php" method="post">
    <div class="form-floating mb-3 mt-3">
      <input type="text" class="form-control" id="name" placeholder="Enter Your Name" name="name" required>
      <label for="name">Name</label>
    </div>
    <div class="form-floating mb-3 mt-3">
      <input type="text" class="form-control" id="email" placeholder="Enter email" name="email" required>
      <label for="email">Email</label>
    </div>
    <div class="form-floating mt-3 mb-3">
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password" required>
      <label for="password">Password</label>
    </div>
    <div class="form-floating mt-3 mb-3">
      <input type="password" class="form-control" id="pwdd" placeholder="Re-enter password" name="confirm_password" required>
      <label for="confirm_password">Confirm Password</label>
    </div>
    <center><button type="submit" name="submit" class="btn btn-warning" style="width: 150px;">Sign Up</button><center>
        <hr>
        <p>Already have an account?&nbsp;<a href=login.php style="text-decoration:none">Login</a></p>
    </form>
    </div>
  </div>
</div> 
</body>
</html>