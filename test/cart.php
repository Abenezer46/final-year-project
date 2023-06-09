<?php
include "../app/dbconn.php";
session_start();

if (!$_SESSION['cart']) {
    header('Location: test.php');
    exit;
}
?>

<h1>cart</h1>

<table class="table my-4">
    <thead>
        <tr style="border-top: 1px solid;">
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
        $cart = $_SESSION['cart'];
        foreach ($cart as $key => $value) {
            echo "<tr>";
                echo "<td>$value</td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>
<div>

    <a href="cart.php?sell" class="btn btn-success">
        done
    </a>
    <a href="../pages/products.php" class="btn btn-danger">
        back
    </a>
    <a href="cart.php?removeCart" class="btn btn-danger">
        clear cart
    </a>
</div>

<?php
$array = array(
    array("Name", "Age"),
    array("John Doe", 30),
    array("Jane Doe", 25)
);

// Create a table
echo "<table>";

// Loop through the multidimensional array and add each element to a table row
foreach ($array as $row) {
    echo "<tr>";
    foreach ($row as $column) {
        echo "<td>$column</td>";
    }
    echo "</tr>";
}

// Close the table tag
echo "</table>";


$cart = array(
    array("id" => 10, "name" => 'hi', "type" => 'hello', "price" => '3000'),
    array("id" => 20, "name" => 'bye', "type" => 'goodbye', "price" => '2000'),
    array("id" => 30, "name" => 'welcome', "type" => 'greeting', "price" => '1000')
);

echo "<table>";

foreach ($cart as $row) {
    echo "<tr>";
    foreach ($row as $key => $value) {
        echo "<td>$value</td>";
    }
    echo "</tr>";
}

echo "</table>";


?>