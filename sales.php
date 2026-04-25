

<?php  
 require("db.php");
session_start();
 if($_SERVER["REQUEST_METHOD"]=="POST"){

 if (isset($_POST['save'])) {

    $item = $_POST["item"];
    $quantity = $_POST["quantity"];
    $price = $_POST["price"];
    $discount = $_POST["discount"];

    if ($discount) {
        $price = $price - $price*($discount/100);
    }

    $total_price = $price * $quantity;

    // Insert into database
   $sql="INSERT INTO sales (item_name, quantity, price, discount, total, date)
            VALUES ('$item', $quantity, $price, $discount, $total_price, CURRENT_DATE())";

    if (mysqli_query($conn, $sql)) {
    $_SESSION["save_sales_feedback_success"] = "Successfully saved item.";
}

    header("Location: sales.php");
    exit();
}
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
                                    $productQuery = "SELECT product_name, quantity FROM products";
                                    $result = mysqli_query($conn, $productQuery);

                                    if ($result && mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {

                                            $name = htmlspecialchars($row['product_name']);
                                            $qty  = (float)$row['quantity'];

                                            if ($qty < 1) {
                                                echo "<option value='$name' disabled>
                                                        $name (Not available)
                                                    </option>";
                                            } else {
                                                echo "<option value='$name'>
                                                        $name
                                                    </option>";
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
                    <?php include("receipt_details.php");?> 
                </p>

                <hr color="white">
                <form action="sales.php" method="post">
                    <button type="submit" name="complete">Complete Sale</button>
                </form>
            </div>
        </div>
        
    </body>
	
    
</html>