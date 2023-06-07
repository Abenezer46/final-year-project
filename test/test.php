
<?php 
session_start(); 

$products = array( 
    array("name" => "Product 1", "price" => 10.00), 
    array("name" => "Product 2", "price" => 20.00), 
    array("name" => "Product 3", "price" => 30.00) 
); 

if(!isset($_SESSION["cart"])){ 
    $_SESSION["cart"] = array(); 
} 

if(isset($_POST["add_to_cart"])){ 
    $product_id = $_POST["product_id"]; 
    if(isset($_SESSION["cart"][$product_id])){ 
        $_SESSION["cart"][$product_id]["quantity"]++; 
    }else{ 
        $product = $products[$product_id]; 
        $_SESSION["cart"][$product_id] = array( 
            "quantity" => 1, 
            "price" => $product["price"] 
        ); 
    } 
} 

if(isset($_POST["update_cart"])){ 
    $quantities = $_POST["quantity"]; 
    foreach($quantities as $product_id => $quantity){ 
        $_SESSION["cart"][$product_id]["quantity"] = $quantity; 
    } 
} 

?>

<h1>Products</h1> 

<table> 
    <thead> 
        <tr> 
            <th>Name</th> 
            <th>Price</th> 
            <th>Action</th> 
        </tr> 
    </thead> 
    <tbody> 
        <?php foreach($products as $key => $product){ ?> 
            <tr> 
                <td><?php echo $product["name"]; ?></td> 
                <td><?php echo $product["price"]; ?></td> 
                <td> 
                    <form method="post"> 
                        <input type="hidden" name="product_id" value="<?php echo $key; ?>"> 
                        <input type="submit" name="add_to_cart" value="Add to Cart"> 
                    </form> 
                </td> 
            </tr> 
        <?php } ?> 
    </tbody> 
</table> 

<h1>Cart</h1> 

<form method="post"> 
    <table> 
        <thead> 
            <tr> 
                <th>Name</th> 
                <th>Price</th> 
                <th>Quantity</th> 
                <th>Total</th> 
            </tr> 
        </thead> 
        <tbody> 
            <?php foreach($_SESSION["cart"] as $product_id => $item){ ?> 
                <tr> 
                    <td><?php echo $products[$product_id]["name"]; ?></td> 
                    <td><?php echo $products[$product_id]["price"]; ?></td> 
                    <td><input type="number" name="quantity[<?php echo $product_id; ?>]" value="<?php echo $item["quantity"]; ?>"></td> 
                    <td><?php echo $item["quantity"]*$products[$product_id]["price"]; ?></td> 
                </tr> 
            <?php } ?> 
        </tbody> 
    </table> 
    <input type="submit" name="update_cart" value="Update Cart"> 
</form> 

