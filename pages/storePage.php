<?php
session_start();
if (!$_SESSION["auth"]) {
    # code...
    header('Location: index.php');
    exit;
} elseif ($_SESSION['auth'] != 'manager') {
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Store Page</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src='./js/main.js'></script>
</head>

<body>
    <header class="text-center p-5">
        <p class="display-4">Store Page</p>
    </header>
    <div class="p-3 m-0 border-0 bd-example"
        style="width:100%; display:flex; flex-wrap:wrap; gap:25px; align-items:center; justify-content:center;">

        <div class="card mb-3 text-center shadow" style="display:flex; align-items:center; width: 18rem;">
            <i class='fas fa-plus' style='margin-top:15px; font-size:48px;'></i>
            <div class="card-body">
                <h5 class="card-title mb-3">Add New Item</h5>
                <a href="./createItem.php" class="btn btn-primary">Go to Page</a>
            </div>
        </div>

        <div class="card mb-3 text-center shadow" style="display:flex; align-items:center; width: 18rem;">
            <i class="fas fa-eye-dropper" style='margin-top:15px; font-size:48px;'></i>
            <div class="card-body">
                <h5 class="card-title mb-3">Update Item</h5>
                <a href="./updateItem.php" class="btn btn-primary">Go to Page</a>
            </div>
        </div>

        <div class="card mb-3 text-center shadow" style="display:flex; align-items:center; width: 18rem;">
            <i class="far fa-trash-alt" style='margin-top:15px; font-size:48px;'></i>
            <div class="card-body">
                <h5 class="card-title mb-3">Delete Item</h5>
                <a href="./deleteItem.php" class="btn btn-primary">Go to Page</a>
            </div>
        </div>

        <div class="card mb-3 text-center shadow" style="display:flex; align-items:center; width: 18rem;">
            <i class="far fa-eye" style='margin-top:15px; font-size:48px;'></i>
            <div class="card-body">
                <h5 class="card-title mb-3">View Item</h5>
                <a href="./viewItem.php" class="btn btn-primary">Go to Page</a>
            </div>
        </div>
    </div>

    <div style="width:100%; display:flex; flex-wrap:wrap; align-items:center; justify-content:center;">

        <a href="../managerPage.php" class="btn btn-danger btn-lg">
            Go back
        </a>

    </div>

</body>

</html>