<?php

//funtion to login
 function login(){
    if(isset($_POST["login"])) {
        $Email=$_POST["email"];
        $Password=$_POST["password"];
        if(empty($Email) || empty($Password)){
            echo "<div class='alert alert-danger'>All fields are required</div>";
        }
        else if(!preg_match ("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/", $Password)){ //regular expression
            echo "<div class='alert alert-danger'>Password must contain at least one number, one uppercase and lowercase letter, and at least 8 characters</div>";
        }else{
            require_once "connect.php";
            $sql = "SELECT Password FROM `signup` WHERE Email='$Email'";
            $result = mysqli_query($conn, $sql);
            $user = $result->fetch_assoc();
            $hash = $user["Password"];
              if(password_verify($Password, $hash)) { 
                session_start();
                $_SESSION["email"]="$Email";
                $_SESSION["password"]="$Password";
                $_SESSION["user"]="yes";
                header("Location: welcome.php");
              }else {
               echo "<div class='alert alert-danger'>Password is incorrect!</div>"; 
              }   

            }
    }
 }

//funtion to create user account (ie) to signup
function signup(){
    if(isset($_POST["submit"])){
      $Name=$_POST["name"];
      $Email=$_POST["email"];
      $Password=$_POST["password"];
      $Confirm_password=$_POST["confirm_password"];
      $hashed_password = password_hash($Password, PASSWORD_DEFAULT);

      if(empty($Name) || empty($Email) || empty($Password) || empty($Confirm_password)){
        echo "<div class='alert alert-danger'>All fields are required</div>";
      }else if(!preg_match ("/^[a-zA-z]*$/", $Name)){ 
        echo "<div class='alert alert-danger'>Name should only contain alphabets</div>";
      }else if(!filter_var($Email, FILTER_VALIDATE_EMAIL)){
        echo "<div class='alert alert-danger'>Email is not valid</div>";
      }else if(!preg_match ("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/", $Password)){
        echo "<div class='alert alert-danger'>Password must contain at least one number, one uppercase and lowercase letter, and at least 8 characters</div>";
      }else if($Password!==$Confirm_password){
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
            mysqli_stmt_bind_param($stmt,"sss",$Name,$Email,$hashed_password);
            mysqli_stmt_execute($stmt);
            echo "<div class='alert alert-success'>You are registered successfully</div>";
          }else{
            die("something went wrong");
          }
        }
      }
    }
}

//funtion to view user dashboard
function dashboard(){
    
    require_once "connect.php";
    $sql2= "SELECT Name,Email FROM `signup` WHERE Email ='$_SESSION[email]'";
    $result2 = mysqli_query($conn, $sql2);
    $row2 = $result2->fetch_assoc();
    if($result2){
    echo "<h3>User Dashboard</h3><br>";
    echo "<p><b>Name: </b>". $row2['Name']. "<br><b>Email: &nbsp</b>". $row2['Email']."</p>";
}
}

//funtion to change password
function change_password(){
  if(isset($_POST["submit"])) {
    $email=$_POST["email"];
    $old_password=$_POST["old_password"];
    $new_password=$_POST["new_password"];
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
    if(empty($email) || empty($old_password) || empty($new_password)){
      echo "<div class='alert alert-danger'>All fields are required</div>";
    }else if($email != $_SESSION["email"]){
      echo "<div class='alert alert-danger'>Email is not valid</div>";
    }else{
        require_once "connect.php";
        $sql= "SELECT Password FROM `signup` WHERE Email ='$email'";  //get current password from the db, password verify
        $result = mysqli_query($conn, $sql);
        $row = $result->fetch_assoc();
        $Password= $row["Password"];
        if(!password_verify($old_password,$Password)){
          echo "<div class='alert alert-danger'>Old Password is wrong</div>";
        }else if(!preg_match ("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/", $new_password)){
            echo "<div class='alert alert-danger'>Password must contain at least one number, one uppercase and lowercase letter, and at least 8 characters</div>";
        }else{
          require_once "connect.php";
          $sql = "UPDATE signup SET Password='$hashed_password' WHERE Email='$email'";
          $result = mysqli_query($conn, $sql);
          if($result){
            echo "<div class='alert alert-success'>Congratulations! You have successfully changed your password</div>";
          }
          else{
            echo "Something went wrong!";
          }
        }
    }
  }
}

//function to logout session
function logout(){
    if(isset($_POST["logout"])) {
      unset($_SESSION['email']);
      unset($_SESSION['password']);
      session_destroy();
      header("Location: index.php");
    }
}

?>