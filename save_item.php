<?php
// start session
session_start();

$item = $_POST["item"];
$quantity = $_POST["quantity"];
$price = $_POST["price"];
$discount = $_POST["discount"];

// open two files: 1 for items sold and 1 for total cost
$sales_data_file_handle = fopen("sales_data_1.txt", "a");
$sales_total_file_handle = fopen("sales_total_1.txt", "a");

// prepare the data
$total_price = $price*$quantity;

$sales_data = "$item @$price x $quantity \t $total_price\n";
$sales_total = $total_price."\n";

// add the data to the files
if($sales_data_file_handle){
    // save item details and set the session values for feedback
    if(fwrite($sales_data_file_handle, $sales_data)){
        // save item total price
        if(fwrite($sales_total_file_handle, $sales_total)){
            $_SESSION["save_sales_feedback_success"] = "Successfully saved item details.";
        }else{
            $_SESSION["save_sales_feedback_error"] = "Failed to save item details.";
        }
    }else{
        $_SESSION["save_sales_feedback_error"] = "Failed to save item details. ";
    }    
}

// close the 2 files
fclose($sales_data_file_handle);
fclose($sales_total_file_handle);

// redirect to form
header("Location: sales.php");
?>