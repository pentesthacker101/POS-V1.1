<?php 
    // error sessions
    if(isset($_SESSION["save_sales_feedback_error"])){
        echo $_SESSION["save_sales_feedback_error"];
    }

    if(isset($_SESSION["save_product_feedback_error"])){
        echo $_SESSION["save_product_feedback_error"];
    }
?>