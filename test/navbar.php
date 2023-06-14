<?php
session_start();

if (isset($_POST['submit'])) {
    # code...
    echo 'logout';
    $_SESSION['auth'] = "";
    header("Location: ./index.php");
}
?>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Home Page</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src='main.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class= "p-3 m-0 border-0 bd-example m-0 border-0">
<nav class="navbar navbar-expand-lg" style="background-color:hsl(220 10% 14%); color: #ffffff; border-radius: 5px;">
        <div class="container-fluid">
            <a class="navbar-brand" style="color: #ffffff;" href="../index.php">Financial Managment System</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02"
                aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="color:#ffffff;">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#" style="color:#ffffff;">
                        <?php
                        echo $_SESSION['user'] 
                        ?>
                    </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#" style="color:#ffffff;">
                        <?php
                        echo $_SESSION['auth'] 
                        ?>
                        </a>
                    </li>
                </ul>
                <form class="d-flex" role="search" method="post">
                    <button class="btn btn-success" type="submit" name="submit">logout</button>
                </form>
            </div>
        </div>
    </nav>
</body>
