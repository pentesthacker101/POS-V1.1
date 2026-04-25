<?php require("db.php");


?>
<!DOCTYPE html>
<html>
    <head>
        <title>NILA POS v1.0</title>

        <link rel="stylesheet" href="css/styles.css">
    </head>

    <?php session_start(); ?>

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
                <p>ADD PRODUCT</p>
                <form method="POST" action="save_product.php">
                    Product name : <input type="text" name="product" required><br>
                    Product description : <input type="text" name="description" required><br>
                    Quantity : <input type="number" name="quantity" min="1" required><br>

                    <hr color="white">

                    <button type="reset" name="clear">Clear</button> &nbsp;
                    <button type="submit" name="save">Save</button>
                </form>
            </div>

            <div class="right">
                Current products in stock...

                <p class="receipt">
                    <?php include("all_products.php");?> 
                </p>
            </div>
        </div>
        
    </body>
	<?php session_destroy(); ?>
    
</html>