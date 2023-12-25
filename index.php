<?php $title="Welcome"; include_once "templates/header.php"; ?>
    <div class="container-fluid mt-5 p-5">
        <p></p><br><br>
        <p class="h1 text-center" style="font-size:50px; font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif; color: white;" ><b>Welcome</b></p><br><br>
        <div class="container-fluid">
            <div class="row justify-content-center align-items-center ">
              <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="d-grid gap-3">
                  <button class="btn btn-outline-light text-dark btn-md"><a href="login.php" style="text-decoration: none; color:black;">LOG IN</a></button>
                  <button class="btn btn-outline-light text-dark btn-md"><a href="signup.php" style="text-decoration: none; color:black">SIGN UP</a></button>
                </div>
              </div>
            </div>
          </div>
    </div>
<?php include_once "templates/footer.php"; ?>