<?php 
    // success 
    if(isset($_SESSION["save_sales_feedback_success"])){
        echo $_SESSION["save_sales_feedback_success"];
    }

    if(isset($_SESSION["save_product_feedback_success"])){
        echo $_SESSION["save_product_feedback_success"];
    }
?>