<?php
session_start();

if (!$_SESSION["auth"]) {
    # code...
    header('Location: index.php');
    exit;
}elseif($_SESSION['auth'] != 'accountant'){
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Accountant Page</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src='./js/main.js'></script>
</head>

<body class="accountantPage p-3 m-0 border-0 bd-example m-0 border-0" >
    <nav class="navbar navbar-expand-lg" style="background-color:#fff; color:black; border-radius: 5px;">
        <div class="container-fluid">
            <a class="navbar-brand" style="color: #023C40;" href="./index.php">FMS</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02"
                aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="color:#ffffff;">

                <li class="nav-item">
                        <a class="nav-link active" href="#" style="color:black;">
                            <?php
                            echo ucfirst($_SESSION['auth']);
                                ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disable" aria-current="page" href="#" style="color:black;">
                            
                            <?php
                            echo ucfirst($_SESSION['user']);
                                ?>
                        </a>
                    </li>

                </ul>
                <form class="d-flex" role="search" method="post">
                    <button class="btn" type="submit" name="submit">logout</button>
                </form>
            </div>
        </div>
    </nav>
    <header class="text-center p-5">
        <p class="display-4">Accountant Page</p>
    </header>
    <div class="p-3 m-0 border-0 bd-example" 
         style="width:100%; display:flex; flex-wrap:wrap; gap:25px; align-items:center; justify-content:center;">

         <div class="card mb-3 text-center shadow" style="display:flex; align-items:center; width: 18rem;">
            <i class="far fa-money-bill-alt" style='margin-top:15px; font-size:48px;'></i>
            <div class="card-body">
                <h5 class="card-title mb-3">view sells</h5>
                <a href="./pages/sells.php?accountant" class="btn btn-primary">Go to Page</a>
            </div>
        </div>

        <div class="card mb-3 text-center shadow" style="display:flex; align-items:center; width: 18rem;">
            <i class="fas fa-warehouse" style='margin-top:15px; font-size:48px;'></i>
            <div class="card-body">
                <h5 class="card-title mb-3">view store</h5>
                <a href="./pages/viewItem.php?accountant" class="btn btn-primary">Go to Page</a>
            </div>
        </div>

        <div class="card mb-3 text-center shadow" style="display:flex; align-items:center; width: 18rem;">
            <i class="fas fa-file-alt" style='margin-top:15px; font-size:48px;'></i>
            <div class="card-body">
                <h5 class="card-title mb-3">Manage report</h5>
                <a href="./pages/reportPage.php" class="btn btn-primary">Go to Page</a>
            </div>
        </div>
        </div>
    </div>



</body>

</html>