<?php
session_start();
include "./app/dbconn.php";

// Check if the auth session variable is not set
if (!isset($_SESSION['auth'])) {
    header('Location: login.php');
    exit;
}

// Check if the auth session variable does not have the value "manager", "seller", or "accountant"
if ($_SESSION['auth'] !== 'manager' && $_SESSION['auth'] !== 'admin') {
    header('Location: login.php');
    exit;
}

if (isset($_POST['submit'])) {
    # code...
    echo 'logout';
    $id = $_SESSION['uid'];

    $mydate = getdate(date("U"));

    $outtime = "$mydate[hours]:$mydate[minutes] , $mydate[weekday], $mydate[month] $mydate[mday], $mydate[year]";

    $sql = "update `users` SET `outtime`='$outtime' where `uid` = '$id'";
    $result = mysqli_query($con, $sql);
    if ($result) {
        echo "hello";
        $_SESSION['auth'] = "";
        $_SESSION['uid'] = 0;
        header("Location: ./index.php");
    }

}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Manage Users</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='./css/style.css'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src='./js/main.js'></script>
</head>

<body class="adminPage p-3 m-0 border-0 bd-example m-0 border-0">
    <?php
    if (isset($_GET['mana'])) {
        # code...
        echo '<body class="managerPage p-3 m-0 border-0 bd-example m-0 border-0" style="background-color:#5BA877;">';
    } else {
        echo '<body class="adminPage p-3 m-0 border-0 bd-example m-0 border-0">';
    }
    ?>
    <nav class="navbar navbar-expand-lg" style="background-color:#fff; color:black; border-radius: 5px;">
        <div class="container-fluid">

            <?php
            if (isset($_GET['mana'])) {
                # code...
                echo '<a class="navbar-brand" style="color: #5BA877;" href="./index.php">FMS</a>';
            } else {
                echo '<a class="navbar-brand" style="color: #023C40;" href="./index.php">FMS</a>';
            }
            ?>
            

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
        <p class="display-4">Admin Page</p>
    </header>
    <div class="p-3 m-0 border-0 bd-example"
        style="width:100%; display:flex; flex-wrap:wrap; gap:25px; align-items:center; justify-content:center;">

        <div class="card mb-3 text-center shadow" style="display:flex; align-items:center; width: 18rem;">
            <i class='fas fa-id-badge' style='margin-top:15px; font-size:48px;'></i>
            <div class="card-body">
                <h5 class="card-title mb-3">Create New Users</h5>
                <a href="./pages/createUsers.php" class="btn">Go to Page</a>
            </div>
        </div>

        <div class="card mb-3 text-center shadow" style="display:flex; align-items:center; width: 18rem;">
            <i class="fas fa-eye-dropper" style='margin-top:15px; font-size:48px;'></i>
            <div class="card-body">
                <h5 class="card-title mb-3">Edit Users</h5>
                <a href="./pages/updateUsers.php" class="btn">Go to Page</a>
            </div>
        </div>

        <div class="card mb-3 text-center shadow" style="display:flex; align-items:center; width: 18rem;">
            <i class="far fa-trash-alt" style='margin-top:15px; font-size:48px;'></i>
            <div class="card-body">
                <h5 class="card-title mb-3">Delete Users</h5>
                <a href="./pages/deleteUsers.php" class="btn">Go to Page</a>
            </div>
        </div>

        <div class="card mb-3 text-center shadow" style="display:flex; align-items:center; width: 18rem;">
            <i class="far fa-eye" style='margin-top:15px; font-size:48px;'></i>
            <div class="card-body">
                <h5 class="card-title mb-3">View Users</h5>
                <a href="./pages/viewUsers.php" class="btn">Go to Page</a>
            </div>
        </div>
    </div>

    <?php
    if ($_SESSION['auth'] == 'manager') {
        # code...
        echo '
        <div style="width:100%; display:flex; flex-wrap:wrap; align-items:center; justify-content:center;">

        <a href="./managerPage.php" class="btn btn-danger btn-lg">
            Go back
        </a>

    </div>';
    }
    ?>
    <script>

    </script>
</body>

</html>