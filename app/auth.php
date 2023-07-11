<?php
include 'dbconn.php';
session_start();

if (isset($_POST['userNameInput']) && isset($_POST['inputPassword'])) {

  $user = $_POST['userNameInput'];
  $pass = md5($_POST['inputPassword']);

  if (empty($user) || empty($_POST['inputPassword'])) {
    header("Location: ../pages/login.php?error=Please fill all the required Field's");
  } else {
    $sql = "select * from users where username = '$user' ";
    $result = mysqli_query($con, $sql);
    if ($result && mysqli_affected_rows($con) > 0) {

      while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['uid'];
        $userName = $row['username'];
        $email = $row['email'];
        $address = $row['address'];
        $password = $row['password'];
        $role = $row['urole'];

        if ($pass == md5($password)) {
          $_SESSION["uid"] = $id;
          $_SESSION["user"] = $row['username'];

          $mydate = getdate(date("U"));

          $intime = "$mydate[hours]:$mydate[minutes] , $mydate[weekday], $mydate[month] $mydate[mday], $mydate[year]";

          $sql = "update `users` SET `intime`='$intime' where `uid` = '$id'";
          $result = mysqli_query($con, $sql);
          if ($result && mysqli_affected_rows($con) > 0) {
            if ($role == '1') {
              $_SESSION["auth"] = "manager";
              header('Location: ../managerPage.php');
            } elseif ($role == '2') {
              $_SESSION["auth"] = "seller";
              header('Location: ../sellerPage.php');
            } elseif ($role == '3') {
              $_SESSION["auth"] = "accountant";
              header('Location: ../accountantPage.php');
            } elseif ($role == '4') {
              $_SESSION["auth"] = "admin";
              header('Location: ../adminPage.php');
            }
          } else {
            header('Location: ../pages/login.php?error=Connection Failed');
          }
        }
      }
    } else {
      header('Location: ../pages/login.php?error=Incorrect password or username');
    }
  }
}
?>