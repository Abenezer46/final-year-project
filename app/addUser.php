<?php
include 'dbconn.php';
session_start();

if (isset($_POST['update'])) {
    $userId = $_SESSION['userId'];
    echo $userId;
} elseif (isset($_POST['updateItem'])) {

    $itemId = $_SESSION['itemId'];
    echo $itemId;
}




if (isset($_POST['submit'])) {
    echo 'button clicked';

    $username = $_POST['userNameInput'];
    $email = $_POST['emailInput'];
    $address = $_POST['addressInput'];
    $role = $_POST['roleInput'];
    $password = $_POST['passwordInput'];


    if (empty($username)) {
        header("Location: ../pages/createUsers.php?error=User name is required");
    } else if (empty($email)) {
        header("Location: ../pages/createUsers.php?error=Email is required");
    } else if (empty($address)) {
        header("Location: ../pages/createUsers.php?error=Address is required");
    } else if (empty($role)) {
        header("Location: ../pages/createUsers.php?error=role is required");
    } else if (empty($password)) {
        header("Location: ../pages/createUsers.php?error=Password is required");
    } else {
        $sql = "insert into `users` (username,email,address,password,urole)
        value('$username','$email','$address','$password','$role')";

        $result = mysqli_query($con, $sql);
        if ($result && mysqli_affected_rows($con) > 0) {
            if ($result) {
                header("Location: ../pages/createUsers.php?success=User successfully registered to the database");
            } else {
                header("Location: ../pages/createUsers.php?error=User not registered to the database");
                //die(mysqli_error($con));
            }
        } else {
            header("Location: ../pages/createUsers.php?error=User not registered to the database");
        }
    }
} else if (isset($_POST['back'])) {
    header("Location:../adminPage.php");
} else if (isset($_POST['update'])) {
    # code...
    echo 'update';

    $username = $_POST['userNameInput'];
    $email = $_POST['emailInput'];
    $address = $_POST['addressInput'];
    $role = $_POST['roleInput'];
    $password = $_POST['passwordInput'];

    $sql = "update `users` set username='$username', email='$email', address='$address', password='$password', urole='$role' where uid ='$userId'";


    $result = mysqli_query($con, $sql);
    if ($result && mysqli_affected_rows($con) > 0) {
        if ($result) {
            header('Location:../pages/updateUsers.php?success= User successfully updated to the database');
        } else {
            header('Location: ../pages/updateUsers.php?error= User not updated to the database');
            die(mysqli_error($con));
        }
    } else {
        header('Location: ../pages/updateUsers.php?error= User not updated to the database');
    }
} else if (isset($_POST['backToUpdate'])) {
    header("Location:../pages/updateUsers.php");
} else if (isset($_POST['updateItem'])) {
    # code...
    $name = $_POST['itemNameInput'];
    $type = $_POST['typeInput'];
    $quantity = $_POST['quantityInput'];
    $price = $_POST['priceInput'];

    $sql = "update `store` set item_name='$name', item_type='$type', Quantity='$quantity', price='$price' where id ='$itemId'";


    $result = mysqli_query($con, $sql);
    if ($result && mysqli_affected_rows($con) > 0) {
        if ($result) {
            header('Location:../pages/updateItem.php?success= Item successfully updated to the database');
        } else {
            header('Location: ../pages/updateItem.php?error= Item not updated to the database');
            //die(mysqli_error($con));
        }
    } else {
        header('Location: ../pages/updateItem.php?error= Item not updated to the database');
    }
} else if (isset($_POST['backToUpdateItem'])) {
    header("Location:../pages/updateItem.php");
}
?>