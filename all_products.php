<?php
require("db.php");



//delete
if (isset($_GET['delete_id'])) {
    $id = intval($_GET['delete_id']);

    $sql = "UPDATE products SET is_active = 0 WHERE product_id = $id";
    $conn->query($sql);

    if ($conn->query($sql)) {
        header("Location: inventory.php?msg=deleted");
        exit;
    } else {
        header("Location: inventory.php?msg=error");
        exit;
    }
}

//message
if (isset($_GET['msg'])) {
    if ($_GET['msg'] == "deleted") {
        echo "<p style='color:green;'>Product deleted successfully</p>";
    } elseif ($_GET['msg'] == "updated") {
        echo "<p style='color:blue;'>Product updated successfully</p>";
    } elseif ($_GET['msg'] == "added") {
        echo "<p style='color:green;'>Product added successfully</p>";
    } else {
        echo "<p style='color:red;'>Error occurred</p>";
    }
}

/* FETCH PRODUCTS */
$sql = "SELECT product_id, product_name, description, quantity 
        FROM products 
        WHERE is_active = 1";

$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {

    $i = 1;

    while ($row = $result->fetch_assoc()) {
?>
        <div class="product-item">
            <?php echo $i++ . ". "; ?>
            <?php echo htmlspecialchars($row["product_name"]); ?> -
            <?php echo htmlspecialchars($row["description"]); ?> -
            Qty: <?php echo $row["quantity"]; ?> 

            <!-- EDIT -->
            <form action="inventory.php" method="GET" style="display:inline;">
                <input type="hidden" name="edit_id" value="<?php echo $row["product_id"]; ?>">
                <button type="submit">Edit</button>
            </form>
            <!-- deleting -->
            <form action="all_products.php" method="GET" style="display:inline;"
                  onsubmit="return confirm('Delete this product?')">

                <input type="hidden" name="delete_id" value="<?php echo $row["product_id"]; ?>">

                <button type="submit">Delete</button><br>
            </form>
        </div>
        <br>
<?php


    }

} else {
    echo "No products found.";
    
}




// open the file for reading only 
// $file_handle = fopen("products_data.txt", "r");
 // // read the data from the file 
 // if($file_handle){
  // // read details 
  // $content = fread($file_handle, filesize("products_data.txt")); 
  // // prepare the data 
  // $lines = explode("\n", trim($content)); 
  // // get unique values 
  // $unique_lines = array_unique($lines); 
  // // diplay the data 
  // foreach ($unique_lines as $i => $unique_line) { 
  // echo ++$i.". ".$unique_line."<br>";
   // } 
   // }



?>