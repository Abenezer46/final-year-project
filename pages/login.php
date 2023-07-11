<?php
include "../app/dbconn.php";

session_start();

if (isset($_POST['logout'])) {
   # code...
   $_SESSION['auth'] = "";
   $_SESSION['uid'] = 0;
   header("Location: ../index.php");
}

?>
<!DOCTYPE html>
<html>

<head>
   <meta charset='utf-8'>
   <meta http-equiv='X-UA-Compatible' content='IE=edge'>
   <title>Financial management system</title>
   <meta name='viewport' content='width=device-width, initial-scale=1'>
   <link rel='stylesheet' type='text/css' media='screen' href='../css/style.css'>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="loginPage p-3 m-0 border-0 bd-example m-0 border-0" style="background-color:#5BA877;">
    <nav class="navbar navbar-expand-lg" style="background-color:#fff; color:black; border-radius: 5px;">
        <div class="container-fluid">
            <a class="navbar-brand" style="color: #5BA877;" href="../index.php">FMS</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02"
                aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="color:#ffffff;">

                </ul>
                <form class="d-flex" role="search" method="post">
                    <button class="btn btn-danger" type="submit" name="logout">Go Home</button>
                </form>
            </div>
        </div>
    </nav>
   <div class="container d-flex justify-content-center align-items-center" style='min-height: 100vh;'>
      <form class="p-5 shadow" action='../app/auth.php' method="post" style="width: 30rem;">
         <h1 class="text-center pb-4 display-4">Login</h1>

         <?php if (isset($_GET['error'])) { ?>
            <div class="alert alert-danger" role="alert">
               <?php echo $_GET['error']; ?>
            </div>
         <?php } ?>

         <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">User Name</label>
            <input type="text" class="form-control" id="userNameInput" name="userNameInput" autocomplete="off">
         </div>

         <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="inputPassword" name="inputPassword" autocomplete="off" />
         </div>

         <button type="submit" class="btn btn-primary">login</button>
      </form>
   </div>

</body>

</html>