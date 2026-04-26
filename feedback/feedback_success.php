<?php 
    // success 
    if(isset($_SESSION["save_sales_feedback_success"])){
        echo $_SESSION["save_sales_feedback_success"];
         unset($_SESSION["save_sales_feedback_success"]); // IMPORTANT
    }    
?>