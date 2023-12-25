<?php $title="Dashboard"; include_once "templates/header.php"; ?>
<div class="container-fluid mt-3">
    <button class="btn btn-outline-light text-dark btn-md ms-3" style="float:left; width: 90px;"><a href="welcome.php" style="text-decoration: none; color:black;">Back</a></button>
    <p></p><br><br>
    <div class="container mt-5">
    <div class="shadow-lg p-4 mb-4 bg-white">
        <?php  
        session_start();
        if(!isset($_SESSION["user"])){
          header("Location: index.php");
        }
        include_once 'includes/functions.php'; 
        dashboard();
        ?>
    </div>
    </div>
</div>
<?php include_once "templates/footer.php"; ?>