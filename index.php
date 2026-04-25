<?php require("db.php");


?>
<!DOCTYPE html>
<html>
    <head>
        <title>NILA POS v1.0</title>

        <link rel="stylesheet" href="css/styles.css">
    </head>

    <body>
        <p class="app_title">KABOTOLO TUCK SHOP</p1>
        
        <div class="menu">
            <a href="index.php" class="menu_items">Home</a> &nbsp;&nbsp; 
            <a href="sales.php" class="menu_items">Sales</a> &nbsp;&nbsp; 
            <a href="inventory.php" class="menu_items">Inventory</a> &nbsp;&nbsp; 
            <a href="reports.php" class="menu_items">Reports</a>
        </div>
        
        <br>
        <div class="container">
            <div class="left">
                <p>System Details</p>
                <hr color="white">
                <p><?php include("settings/system_details.php");?></p>
            </div>

            <div>
                <img src="images/pos2.jpeg" class="app-image">
            </div>
        </div>
        
    </body>    
</html>