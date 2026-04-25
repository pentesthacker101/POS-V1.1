<?php

require("db.php");

$sql = "SELECT product_id, product_name, description, quantity FROM products";
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

        <form action="edit_product.php" method="GET" style="display:inline;">
            <input type="hidden" name="id" value="<?php echo $row["product_id"]; ?>">
            <button type="submit">Edit</button>
        </form>

        <form action="delete_product.php" method="GET" style="display:inline;"
              onsubmit="return confirm('Delete this product?')">
            <input type="hidden" name="id" value="<?php echo $row["product_id"]; ?>">
            <button type="submit">Delete</button>
        </form>
    </div>
<?php
}

} else {
    echo "No products found.";
}







// open the file for reading only
// $file_handle = fopen("products_data.txt", "r");


// // read the data from the file
// if($file_handle){
//     // read details
//     $content = fread($file_handle, filesize("products_data.txt"));
    
//     // prepare the data
//     $lines = explode("\n", trim($content));

//     // get unique values
//     $unique_lines = array_unique($lines);

//     // diplay the data
//     foreach ($unique_lines as $i => $unique_line) {
//         echo ++$i.". ".$unique_line."<br>";
//     }
// }
?>