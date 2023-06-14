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
</head>

<body class="loginPage">
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
            <input type="text" class="form-control" id="userNameInput" name="userNameInput">
         </div>
         <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="inputPassword" name="inputPassword" />
         </div>
         <button type="submit" class="btn btn-primary">login</button>
      </form>
   </div>

</body>

</html>