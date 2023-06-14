<?php
include '../app/dbconn.php';
session_start();
if (!isset($_SESSION['auth'])) {
    header('Location: login.php');
    exit;
  }
  
  // Check if the auth session variable does not have the value "manager", "seller", or "accountant"
  if ($_SESSION['auth'] !== 'seller' && $_SESSION['auth'] !== 'accountant') {
    header('Location: login.php');
    exit;
  }

  if (isset($_POST['logout'])) {
    # code...
    echo 'logout';
    $id = $_SESSION['uid'];
    
    $mydate = getdate(date("U"));
          
    $outtime = "$mydate[hours]:$mydate[minutes] , $mydate[weekday], $mydate[month] $mydate[mday], $mydate[year]";

    $sql = "update `users` SET `outtime`='$outtime' where `uid` = '$id'";
    $result = mysqli_query($con, $sql);
    if($result){
        echo "hello";
        $_SESSION['auth'] = "";
        $_SESSION['uid'] = 0;
        header("Location: ../index.php");
    }

}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>View Sells</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../css/style.css'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src='./js/main.js'></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol id="check-circle-fill" viewBox="0 0 16 16">
        <path
            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
    </symbol>
    <symbol id="info-fill" viewBox="0 0 16 16">
        <path
            d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
    </symbol>
    <symbol id="exclamation-triangle-fill" viewBox="0 0 16 16">
        <path
            d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
    </symbol>
</svg>

<body class="sellerPage p-3 m-0 border-0 bd-example m-0 border-0" style="background-color: #585BB8;">

    <nav class="navbar navbar-expand-lg" style="background-color:#fff; color:black; border-radius: 5px;">
        <div class="container-fluid">
            <a class="navbar-brand" style="color: #585BB8;" href="./index.php">FMS</a>

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
                    <button class="btn" type="submit" name="logout">logout</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="container py-5">
        <header class="text-center p-5">
            <p class="display-4">View Sells</p>
        </header>

        <table class="table my-4">
            <thead>
                <tr style="border-top: 1px solid;">
                    <th scope="col">Sells id</th>
                    <th scope="col">Items</th>
                    <th scope="col">Date and Time of cells</th>
                    <th scope="col">Total price</th>
                    <th scope="col">users</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = 'select * from `sells`';
                $result = mysqli_query($con, $sql);
                if ($result) {

                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                        $items = $row['items'];
                        $date = $row['date_time'];
                        $price = $row['total_price'];
                        $user = $row['user'];

                        $items = json_decode($items);

                        $item_ids = array();

                        foreach ($items as $item) {
                            # code...
                            $item_ids[] = $item->item_id;
                        }
                        $ids = implode(",", $item_ids);
                        
                        echo '
                        <tr>
                          <th scope="row">' . $id . '</th>
                          ';
                        echo '
                          <td>' . $ids . '</td>
                          ';

                        echo '
                          <td>' . $date . '</td>
                          <td>' . $price . '</td>
                          <td>' . $user . '</td>
                        </tr>
                        ';
                    }
                }
                ?>
            </tbody>
        </table>
        <div>
            <?php
            if (isset($_GET['accountant'])) {
                # code...
                echo '
                    <a href="../accountantPage.php" class="btn btn-primary">
                      Go back
                    </a>
               ';
            } else {
                echo '
                    <a href="../sellerPage.php" class="btn btn-primary">
                        Go back
                    </a>
                ';
            }
            ?>


        </div>
    </div>
</body>

</html>