<?php
include '../app/dbconn.php';
session_start();


if (!isset($_SESSION['auth'])) {
    header('Location: login.php');
    exit;
}

// Check if the auth session variable does not have the value "manager", "seller", or "accountant"
if ($_SESSION['auth'] !== 'seller') {
    header('Location: login.php');
    exit;
}

if (isset($_POST['update'])) {
    # code...
    $cartid = $_POST['id'];
    $quant = $_POST['quantity'];
    $itemId = $_POST['i'];

    $sql = "select * from `store` where id = '$itemId' ";

    $checkStore = $result = mysqli_query($con, $sql);

    if ($checkStore && mysqli_affected_rows($con) > 0) {
        $row = mysqli_fetch_assoc($checkStore);
        $itemQuant = $row['quantity'];

        echo $itemQuant;
        if ($itemQuant - $quant <= 0) {
            header('Location: cart.php?error= the current stock is less than the one you requested.');
        } else {
            $sql = "update `cart` SET `quantity`='$quant' where `id` = '$cartid'";
            $result = mysqli_query($con, $sql);

            if ($result && mysqli_affected_rows($con) > 0) {
                header('Location: cart.php?success= quantity updated.');
            } else {
                header('Location: cart.php?error= quantity not updated.');
            }
        }
    } else {
        header('Location: cart.php?error= quantity not updated.');
    }
}

if (isset($_GET['removeFromCart'])) {
    $cartid = $_GET['removeFromCart'];

    $sql = "delete from `cart` where id=$cartid";

    $result = mysqli_query($con, $sql);
    if ($result) {
        header('Location: cart.php?success= item removed from cart.');
    } else {
        header('Location: cart.php?error= item not removed from cart.');
    }
}

if (isset($_GET['sell'])) {
    $sql = "select * from `cart`";

    $result = mysqli_query($con, $sql);

    // Create a multidimensional array to store the item information
    $items = array();
    $price = 0;
    $q = 0;
    if ($result && mysqli_affected_rows($con) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {

            $itemId = $row['item_id'];
            $updateQuant = $row['quantity'];

            $item = array(
                'item_id' => $row['item_id'],
                'item_price' => $row['item_price'],
                'item_quantity' => $row['quantity']
            );

            $price = $price + $row['item_price'];
            $q = $q + $row['quantity'];
            $price = $q * $price;
            
            $store = "select quantity from `store` where id = '$itemId'";

            $getStore = mysqli_query($con, $store);

            if ($getStore && mysqli_affected_rows($con) > 0) {
                $row = mysqli_fetch_assoc($getStore);

                $storeQuant = $row['quantity'];

                $newQuant = $storeQuant - $updateQuant;

                $updateStoreQuant = " update `store` set quantity = '$newQuant' where id = '$itemId'";

                $updateStore = mysqli_query($con, $updateStoreQuant);
                if ($getStore && mysqli_affected_rows($con) > 0) {

                    $items[] = $item;
                }

            }

        }

        $date = date('m/d/Y h:i:s a');
        // Insert the items and date/time into the database table
        if (empty($items)) {
            # code...
            header("Location:../pages/products.php?error=cart is empty");
            exit();
        } else {
            $user = $_SESSION["user"];

            $sql = "insert INTO `sells` (items, date_time, amount, total_price, user) 
                    VALUES ('" . json_encode($items) . "', '" . $date . "','" . $q . "', '" . $price . "', '" . $user . "')";

            $result = mysqli_query($con, $sql);
            if ($result && mysqli_affected_rows($con) > 0) {
                # code...
                $items = array();
                $sql = "delete from `cart`";
                $result = mysqli_query($con, $sql);
                if ($result && mysqli_affected_rows($con) > 0) {
                    header("Location:../pages/products.php?success=sells complete");
                } else {
                    header("Location:../app/cart.php?error=sells not complete");
                }

            } else {
                header("Location:../app/cart.php?error=sells not complete");
            }
        }

    } else {
        header("Location:../app/cart.php?error=sells not complete");
    }
}

if (isset($_GET['removeCart'])) {
    # code...
    $items = array();
    $sql = "delete from `cart`";
    $result = mysqli_query($con, $sql);
    if ($result && mysqli_affected_rows($con) > 0) {
        header("Location:../pages/products.php?success=cart cleared successfully");
    } else {
        header("Location:../app/cart.php?error=cart not cleared");
    }
}

if (isset($_POST['logout'])) {
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
        header("Location: ../index.php");
    }

}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>cart Page</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../css/style.css'>
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
            <p class="display-4">Cart</p>
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

        <div class="search" id="search">
            <p>Type in the input field to search the list for specific items:</p>
            <input class="form-control" id="myInput" type="text" placeholder="Search.." style="width:30%;">
        </div>

        <table class="table my-4" id="myTable">
            <thead>
                <tr style="border-top: 1px solid;">
                    <th scope="col">cart id</th>
                    <th scope="col">Item id</th>
                    <th scope="col">Item name</th>
                    <th scope="col">Item Type</th>
                    <th scope="col">Item price</th>
                    <th scope="col">quantity</th>
                    <th scope="col">operations</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = 'select * from `cart`';
                $result = mysqli_query($con, $sql);
                $c = 0;
                if ($result && mysqli_affected_rows($con) > 0) {
                    $c = 1;
                    $price = 0;
                    $quantity = 0;
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                        $i = $row['item_id'];
                        $n = $row['item_name'];
                        $t = $row['item_type'];
                        $p = $row['item_price'];
                        $quant = $row['quantity'];

                        $quantity = $quantity + $quant;
                        $price = $price + $p;

                        $price = $quantity * $price;
                        echo '
                        <tr>
                          <th scope="row">' . $id . '</th>
                          <td>' . $i . '</td>
                          <td>' . $n . '</td>
                          <td>' . $t . '</td>
                          <td>' . $p . '</td>
                          
                          <td>
                            <form method="POST">
                                <input name="id" value=' . $id . ' style="display:none;"/>
                                <input name="i" value=' . $i . ' style="display:none;"/>
                                <input type="number" name="quantity" min="1" value= ' . $quant . ' class="narrow-input" style="width:50px;"/>
                                <input type="submit" name="update" value="update">
                            </form>
                          </td>
                          <td>
                            <div>

                              <a href="cart.php?removeFromCart=' . $id . '&quantity=' . $quantity . '"
                                 class="btn btn-outline-danger">
                                 remove from cart
                              </a>
                            </div>
                           </td>
                        </tr>
                        ';
                    }
                    echo '
                        <tr style="border-top: 1px solid;">
                            <th></th>
                            <th></th>
                            <th></th>
                            <th>Total Price</th>
                            <th>' . $price . '</th>
                            <th>Total Quantity</th>
                            <th> ' . $quantity . '</th>
                        </tr>';
                } else {
                    echo '
                    <div class="alert alert-danger d-flex align-items-center" role="alert">
                        <svg class="bi flex-shrink-0 me-1" role="img" aria-label="Danger:" style="width:25px; height:25px;">
                        <use xlink:href="#exclamation-triangle-fill" />
                         </svg>
                         <div>
                               Please add item to Cart
                         </div>
                    </div>
                    ';
                }
                ?>
            </tbody>
        </table>
        <div>

            <a href="cart.php?sell" class="btn btn-outline-success">
                done
            </a>
            <a href="../pages/products.php" class="btn btn-outline-danger">
                back
            </a>
            <a href="cart.php?removeCart" class="btn btn-outline-danger">
                clear cart
            </a>
        </div>
    </div>

    <script>
        // JavaScript code to filter the table based on user input
        const searchInput = document.getElementById("myInput");
        const tableRows = document.getElementById("myTable").getElementsByTagName("tr");

        searchInput.addEventListener("input", function () {
            const filter = searchInput.value.toLowerCase();
            for (let i = 1; i < tableRows.length; i++) {
                const cells = tableRows[i].getElementsByTagName("td");
                let match = false;
                for (let j = 0; j < cells.length; j++) {
                    const cellText = cells[j].textContent.toLowerCase();
                    if (cellText.includes(filter)) {
                        match = true;
                        break;
                    }
                }
                tableRows[i].style.display = match ? "" : "none";
            }
        });
    </script>
</body>

</html>