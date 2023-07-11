<?php
include 'dbconn.php';

if (isset($_POST['submit'])) {
    echo 'button clicked';

    $name = $_POST['nameInput'];
    $type = $_POST['typeInput'];
    $quantity = $_POST['quantityInput'];
    $price = $_POST['priceInput'];



    if (empty($name)) {
        header("Location: ../pages/createItem.php?error=Item name is required");
    } else if (empty($type)) {
        header("Location: ../pages/createItem.php?error=Item type is required");
    } else if (empty($quantity)) {
        header("Location: ../pages/createItem.php?error=Quantity is required");
    } else if (empty($price)) {
        header("Location: ../pages/createItem.php?error=role is required");
    } else {
        $sql = "insert into `store` (item_name,item_type,Quantity,price)
        value('$name','$type','$quantity','$price')";

        $result = mysqli_query($con, $sql);
        if ($result && mysqli_affected_rows($con) > 0) {
            if ($result) {
                header("Location: ../pages/createItem.php?success=Item successfully registered to the database");
            } else {
                header("Location: ../pages/createItem.php?error=Item not registered to the database");
                //die(mysqli_error($con));
            }
        } else {
            header("Location: ../pages/createItem.php?error=Item not registered to the database");
        }
    }
} else if (isset($_POST['back'])) {
    header("Location:../pages/storePage.php");
} else if (isset($_POST['update'])) {
    # code...
    echo 'update';

    $username = $_POST['userNameInput'];
    $email = $_POST['emailInput'];
    $address = $_POST['addressInput'];
    $role = $_POST['roleInput'];
    $password = $_POST['passwordInput'];

    $sql = "update `users` set username='$username', email='$email', address='$address', password='$password', urole='$role' where uid ='$id'";


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
}
?>