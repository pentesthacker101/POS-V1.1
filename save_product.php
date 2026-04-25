<?php
require("db.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $product_name = $_POST["product_name"];
    $description = $_POST["description"];
    $quantity = $_POST["quantity"];

    $sql = "INSERT INTO products (product_name, description, quantity)
            VALUES ('$product', '$description', $quantity)";

    if (mysqli_query($conn, $sql)) {
        $_SESSION["save_sales_feedback_success"] = "Successfully saved item.";
    } else {
        die("Database error: " . mysqli_error($conn));
    }

    // Save to file
    // $file = fopen("products_data.txt", "a");
    // if ($file) {
    //     fwrite($file, "$product - $description\n");
    //     fclose($file);
    // }

    header("Location: inventory.php");
    exit;
}
?>