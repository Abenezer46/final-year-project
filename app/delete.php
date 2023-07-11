<?php
 include 'dbconn.php';

 if (isset($_GET['deleteId'])) {
    $id = $_GET['deleteId'];

    $sql = "delete from `users` where uid=$id";
    $result = mysqli_query($con,$sql);
    
    if ($result && mysqli_affected_rows($con) > 0) {
        header("Location: ../pages/deleteUsers.php?success=User successfully deleted from the database");
        //echo 'successfully';
    }else{
        header("Location: ../pages/deleteUsers.php?error=User not deleted from the database");
        //echo die(mysqli_error($con));
    }
 }else if(isset($_GET['itemId'])){
    $id = $_GET['itemId'];

    $sql = "delete from `store` where id=$id";

    $result = mysqli_query($con,$sql);

    if ($result && mysqli_affected_rows($con) > 0) {
        header("Location: ../pages/deleteItem.php?success=User successfully deleted from the database");
        //echo 'successfully';
    }else{
        header("Location: ../pages/deleteItem.php?error=User not deleted from the database");
        //echo die(mysqli_error($con));
    }
}
?>