<?php require("db.php");


?>
<!DOCTYPE html>
<html>
    <head>
        <title>POS_V1.1</title>

        <link rel="stylesheet" href="css/styles.css">
    </head>

    <body>

    <div class="mainBody">
        
        <div class="menu">
            <div>
                <p class="app_title">KABOTOLO POS SYSTEM</p>
            </div>

            <div class="two">               
            <a href="index.php" class="menu_items">Home</a> &nbsp;
            <a href="sales.php" class="menu_items">Sales</a> &nbsp;
            <a href="inventory.php" class="menu_items">Inventory</a> &nbsp;
            <a href="reports.php" class="menu_items">Reports</a>
            </div>
                

        </div>
        
        <br>
        <div class="container">
            <div class="left">
                <p>System Details</p>
                <hr color="white">
                <p><?php include("settings/system_details.php");?></p>
            </div>
        </div>
        


    </div>
      
    </body>
</html>