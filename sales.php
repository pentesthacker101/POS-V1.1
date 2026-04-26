

<?php  
 require("db.php");
session_start();

//clear session cart(on complete order)
if (isset($_POST['clear_cart'])) {
    $_SESSION['cart'] = [];
    $_SESSION["save_sales_feedback_success"] = "Cart cleared.";
    header("Location: sales.php");
    exit();
}

//to keep track of the cart
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

 if($_SERVER["REQUEST_METHOD"]=="POST"){

 if (isset($_POST['save'])) {

    $product_id = $_POST["item"];
    $quantity = $_POST["quantity"];
    $price = $_POST["price"];
    $discount = $_POST["discount"];

    if ($discount) {
        $price = $price - $price * ($discount / 100);
    }

    $total_price = $price * $quantity;

    // get product name from DB
    $res = mysqli_query($conn, "SELECT product_name FROM products WHERE product_id=$product_id");
    $row = mysqli_fetch_assoc($res);
    $item_name = $row['product_name'];

    $_SESSION['cart'][] = [
        "product_id" => $product_id,
        "item" => $item_name,
        "quantity" => $quantity,
        "price" => $price,
        "discount" => $discount,
        "total" => $total_price
    ];
    header("Location: sales.php");
    exit();
}
}

//add to database
if (isset($_POST['complete'])) {

    if (!empty($_SESSION['cart'])) {

        // create ONE order id for grouping
        $order_id = time();

        foreach ($_SESSION['cart'] as $cartItem) {

            $product_id = $cartItem["product_id"];
            $item = $cartItem["item"];
            $quantity = $cartItem["quantity"];
            $price = $cartItem["price"];
            $discount = $cartItem["discount"];
            $total = $cartItem["total"];

            $sql = "INSERT INTO sales 
            (order_id, product_id, item_name, quantity, price, discount, total, date)
            VALUES 
            ('$order_id', '$product_id', '$item', '$quantity', '$price', '$discount', '$total', CURRENT_DATE())";
            mysqli_query($conn, $sql);
        }

        $_SESSION['cart'] = [];

        $_SESSION["save_sales_feedback_success"] = "Sale completed successfully.";
    }

    header("Location: sales.php");
    exit();
}

?>




<!DOCTYPE html>
<html>
    <head>
        <title>NILA POS v1.0</title>

        <link rel="stylesheet" href="css/styles.css">
    </head>

    

    <body>
       <?php include("header.php"); ?>
        <p class="feedback-success">
            <?php include("feedback/feedback_success.php");?>
        </p>
        <p class="feedback-error">
            <?php include("feedback/feedback_error.php");?>
        </p>

        <div class="container">
            <div class="left">
                <p>MAKE SALE</p>
                <form method="POST" action="sales.php">
                    Item : <select name="item" required>
                                <?php
                                    $productQuery = "SELECT product_id, product_name, quantity FROM products WHERE is_active=1";
                                    $result = mysqli_query($conn, $productQuery);

                                    if ($result && mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {

                                                $id = $row['product_id'];
                                                $name = htmlspecialchars($row['product_name']);
                                                $qty  = (float)$row['quantity'];

                                                if ($qty < 1) {
                                                    echo "<option value='$id' disabled>$name (Not available)</option>";
                                                } else {
                                                    echo "<option value='$id'>$name</option>";
                                                }
                                            }
                                    } else {
                                        echo "<option disabled>No products found</option>";
                                    }
                                ?>
                            </select><br>
                    Quantity : <input type="number" name="quantity" min="1" max="100" step="0.01" required><br>
                    Price : <input type="number" name="price" min="1" step="0.01" required><br>
                    Discount (%): <input type="number" name="discount" min="0" max="100" step="0.01" value=0 required><br>

                    <hr color="white">

                    <button type="reset" name="clear">Clear</button> &nbsp;
                    <button type="submit" name="save">Save</button>
                </form>
            </div>

            <div class="right">
                Currently billed items...

                <p class="receipt">
                    <?php
                        if (!empty($_SESSION['cart'])) {
                            echo "<ul>";
                            $grandTotal = 0;

                            foreach ($_SESSION['cart'] as $item) {
                                echo "<li>
                                        {$item['item']} | Qty: {$item['quantity']} | Total: {$item['total']}
                                    </li>";

                                $grandTotal += $item['total'];
                            }

                            echo "</ul>";
                            echo "<hr>";
                            echo "<strong>Total: $grandTotal</strong>";
                        } else {
                            echo "No items in cart.";
                        }
                    ?>
                </p>

                <hr color="white">
                <form action="sales.php" method="post">
                    <button type="submit" name="complete">Complete Sale</button>
                    <button type="submit" name="clear_cart">Clear Cart</button>
                </form><br>
                
            </div>
        </div>
        
    </body>
	
    
</html>