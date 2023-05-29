<?php
include 'dbconn.php';

session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Update Users</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src='main.js'></script>
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

    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <form class="px-5 py-3 shadow" action="../app/addUser.php" method="post" style="width: 50rem;">

            <h1 class="text-center pb-4 display-4">Edit</h1>

            <?php if (isset($_GET["error"])) { ?>
                <div class="alert alert-danger d-flex align-items-center" role="alert">
                    <svg class="bi flex-shrink-0 me-1" role="img" aria-label="Danger:" style="width:25px; height:25px;">
                        <use xlink:href="#exclamation-triangle-fill" />
                    </svg>
                    <div>
                        <?php echo $_GET["error"]; ?>
                    </div>
                </div>
            <?php } ?>


            <?php if (isset($_GET["success"])) { ?>
                <div class="alert alert-success d-flex align-items-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Success:" style="width:25px; height:25px;">
                        <use xlink:href="#check-circle-fill" />
                    </svg>
                    <div>
                        <?php echo $_GET["success"]; ?>
                    </div>
                </div>
            <?php } ?>


            <?php if (isset($_GET['editId'])) {
                $id = $_GET['editId'];

                $sql = "select * from `users` where uid='$id' ";
                $result = mysqli_query($con, $sql);
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['uid'];
                        $_SESSION['userId'] = $id;
                        $userName = $row['username'];
                        $email = $row['email'];
                        $address = $row['address'];
                        $password = $row['password'];
                        $role = $row['urole'];

                        echo '
                              <div class="mb-3">
                                  <label class="form-label">User Name</label>
                                  <input type="text" class="form-control" id="userNameInput" name="userNameInput" autocomplete="off" value=' . $userName . '>
                              </div>
                  
                              <div class="mb-3">
                                  <label class="form-label">Email</label>
                                  <input type="email" class="form-control" name="emailInput" autocomplete="off" value=' . $email . '>
                              </div>
                  
                              <div class="mb-3">
                                  <label class="form-label">Address</label>
                                  <input type="text" class="form-control" name="addressInput" autocomplete="off" value=' . $address . '>
                              </div>
                              ';
                        if ($role == '1') {
                            echo '
                            <div class="mb-3">
                                <label class="form-label">Role</label>
                                <select class="form-select" aria-label="Default select example" name="roleInput">
                                    <option selected value="1">manager</option>
                                    <option value="2">seller</option>
                                    <option value="3">accountant</option>
                                    <option value="4">admin</option>
                                </select>
                            </div>';
                        } elseif ($role == '2') {
                            echo '                            
                            <div class="mb-3">
                                <label class="form-label">Role</label>
                                <select class="form-select" aria-label="Default select example" name="roleInput">
                                    <option value="1">manager</option>
                                    <option selected value="2">seller</option>
                                    <option value="3">accountant</option>
                                    <option value="4">admin</option>
                                </select>
                            </div>';
                        } elseif ($role == '3') {
                            echo '
                            <div class="mb-3">
                                <label class="form-label">Role</label>
                                <select class="form-select" aria-label="Default select example" name="roleInput">
                                    <option value="1">manager</option>
                                    <option value="2">seller</option>
                                    <option selected value="3">accountant</option>
                                    <option value="4">admin</option>
                                </select>
                            </div>';
                        } elseif ($role == '4') {
                            echo '
                            <div class="mb-3">
                                <label class="form-label">Role</label>
                                <select class="form-select" aria-label="Default select example" name="roleInput">
                                    <option value="1">manager</option>
                                    <option value="2">seller</option>
                                    <option value="3">accountant</option>
                                    <option selected value="4">admin</option>
                                </select>
                            </div>';
                        }
                        echo '
                              <div class="mb-3">
                                  <label class="form-label">Password</label>
                                  <input type="password" class="form-control" name="passwordInput" autocomplete="off" value=' . $password . '>
                              </div>
                  
                              <button type="submit" name="update" class="btn btn-primary">Save</button>
                              <button type="submit" name="backToUpdate" class="btn btn-danger" style="margin-left:10px;">Back</button>
                         
                          </form>

                      </div>
                ';
                    }
                }
            } else if (isset($_GET['itemId'])) {
                $id = $_GET['itemId'];

                $sql = "select * from `store` where id='$id' ";
                $result = mysqli_query($con, $sql);
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                        $_SESSION['itemId'] = $id;
                        $name = $row['item_name'];
                        $type = $row['item_type'];
                        $quantity = $row['quantity'];
                        $price = $row['price'];

                        echo '
                              <div class="mb-3">
                                  <label class="form-label">Item name</label>
                                  <input type="text" class="form-control" id="itemNameInput" name="itemNameInput" autocomplete="off" value=' . $name . '>
                              </div>
                  
                              <div class="mb-3">
                                  <label class="form-label">Item type</label>
                                  <input type="text" class="form-control" name="typeInput" autocomplete="off" value=' . $type . '>
                              </div>
                  
                              <div class="mb-3">
                                  <label class="form-label">Quantity</label>
                                  <input type="number" class="form-control" name="quantityInput" autocomplete="off" value=' . $quantity . '>
                              </div>
                  
                              <div class="mb-3">
                                  <label class="form-label">price</label>
                                  <input type="number" class="form-control" name="priceInput" autocomplete="off" value=' . $price . '>
                              </div>
                  
                              <button type="submit" name="updateItem" class="btn btn-primary">Save</button>
                              <button type="submit" name="backToUpdateItem" class="btn btn-danger" style="margin-left:10px;">Cancel</button>
                         
                          </form>

                      </div>
                ';
                    }
                }
            }



            ?>
</body>

</html>