<?php require("db.php");

//edit
$editMode = false;
$editData = ["product_id"=>"", "product_name"=>"", "description"=>"", "quantity"=>""];

if (isset($_GET['edit_id'])) {
    $editMode = true;
    $id = intval($_GET['edit_id']);
    $sql="SELECT * FROM products WHERE product_id=$id";
    $resultEdit = $conn->query($sql);
    $editData = $resultEdit->fetch_assoc();
}

if (isset($_POST['update'])) {

    $id = intval($_POST['product_id']);
    $name = $_POST['product_name'];
    $desc = $_POST['description'];
    $qty = $_POST['quantity'];

    $sql = "UPDATE products 
            SET product_name='$name', description='$desc', quantity='$qty'
            WHERE product_id=$id";

    if ($conn->query($sql)) {
        header("Location: inventory.php?msg=updated");
        exit;
    } else {
        header("Location: inventory.php?msg=error");
        exit;
    }

}
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
                <?php if ($editMode): ?>
                        <p>Edit Product</p>
                    <?php else: ?>
                        <p>Add Product</p>
                    <?php endif; ?>

                    <form method="POST" action="inventory.php">

                        <input type="hidden" name="product_id"
                            value="<?php echo $editData['product_id']; ?>">

                        Product name:
                        <input type="text" name="product_name"
                            value="<?php echo $editData['product_name']; ?>" required><br>

                        Product description:
                        <input type="text" name="description"
                            value="<?php echo $editData['description']; ?>" required><br>

                        Quantity:
                        <input type="number" name="quantity"
                            value="<?php echo $editData['quantity']; ?>" min="1" required><br>

                        <hr>

                        <?php if ($editMode): ?>
                            <button type="submit" name="update">Update</button>
                            <a href="inventory.php"><button type="button">Cancel</button></a>
                        <?php else: ?>
                            <button type="submit" name="save">Save</button>
                        <?php endif; ?>

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