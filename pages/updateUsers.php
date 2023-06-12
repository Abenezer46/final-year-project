<?php
include '../app/dbconn.php';
session_start();
if (!isset($_SESSION['auth'])) {
    header('Location: login.php');
    exit;
  }
  
  // Check if the auth session variable does not have the value "manager", "seller", or "accountant"
  if ($_SESSION['auth'] !== 'manager' && $_SESSION['auth'] !== 'admin') {
    header('Location: login.php');
    exit;
  }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Manage Users</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src='./js/main.js'></script>
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

<body>
    <div class="container py-5">
        <header class="text-center p-5">
            <p class="display-4">Update Users Page</p>
        </header>
        <?php if (isset($_GET['error'])) { ?>
            <div class="alert alert-danger d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-1" role="img" aria-label="Danger:" style="width:25px; height:25px;">
                    <use xlink:href="#exclamation-triangle-fill" />
                </svg>
                <div>
                    <?php echo $_GET['error']; ?>
                </div>
            </div>
        <?php } ?>

        <?php if (isset($_GET['success'])) { ?>
            <div class="alert alert-success d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Success:" style="width:25px; height:25px;">
                    <use xlink:href="#check-circle-fill" />
                </svg>
                <div>
                    <?php echo $_GET['success']; ?>
                </div>
            </div>
        <?php } ?>

        <table class="table my-4">
            <thead>
                <tr style="border-top: 1px solid;">
                    <th scope="col">user id</th>
                    <th scope="col">user name</th>
                    <th scope="col">user email</th>
                    <th scope="col">user address</th>
                    <th scope="col">password</th>
                    <th scope="col">user role</th>
                    <th scope="col">operations</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = 'select * from `users`';
                $result = mysqli_query($con, $sql);
                if ($result) {

                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['uid'];
                        $userName = $row['username'];
                        $email = $row['email'];
                        $address = $row['address'];
                        $password = $row['password'];
                        $role = $row['urole'];

                        echo '
                        <>
                          <th scope="row">' . $id . '</th>
                          <td>' . $userName . '</td>
                          <td>' . $email . '</td>
                          <td>' . $address . '</td>
                          <td>' . $password . '</td>
                          ';
                          if($role == '1'){
                            echo '<td>manager</td>';
                          }elseif($role == '2'){
                            echo '<td>seller</td>';
                          }elseif($role == '3'){
                            echo '<td>accountant</td>';
                          }elseif($role == '4'){
                            echo '<td>admin</td>';
                          }
                          echo '
                          <td>

                            <div>

                              <a href="../app/update.php?editId=' . $id . '" 
                                 class="btn btn-danger">
                                 Edit
                              </a>

                           </div>

                          </td>
                        </tr>
                        ';
                    }
                }
                ?>
            </tbody>
        </table>
        <div>

            <a href="../adminPage.php" class="btn btn-primary">
                Go back
            </a>

        </div>
    </div>
</body>

</html>