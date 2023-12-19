<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
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
    width: 90%; 
    max-width: 500px; 
    margin: 0 auto; 
    }
        .shadow-lg {
    width: 100%;
    padding: 20px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    border-radius: 10px; 
    overflow: hidden;
    }
    </style> 
</head>
<body>
<p></p><br>
<div class="container mt-5">
  <div class="shadow-lg p-4 mb-4 bg-white">
    <center><p class="h3">Log In</p></center>
    <div class="container mt-3">
      <?php
      if(isset($_POST["login"])){
        $Email=$_POST["email"];
        $Password=$_POST["password"];
        require_once "connect.php";
        $sql = "SELECT * FROM `signup` WHERE Email='$Email' and Password='$Password'";
        $result = mysqli_query($conn, $sql);
        $user = mysqli_num_rows($result);
        if($user==1){
          session_start();
          $_SESSION["user"]="yes";
          header("Location: dashboard.php");
          die();
          }else{
            echo "<div class='alert alert-danger'>Email or Password is incorrect!</div>"; 
          }
    }
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
        <p>Don't have an account?&nbsp;<a href="Signup.php" style="text-decoration:none">Sign Up</a></p>
    </form>
    </div>
  </div>
</div> 
    
</body>
</html>