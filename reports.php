<?php 
require("db.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports</title>

    <style>
        .reports { padding: 20px; }
        .receipts { margin-bottom: 20px; }
        .receipt {
            display: flex;
            gap: 15px;
            padding: 5px 0;
            border-bottom: 1px solid #ccc;
        }
        .receipt span { min-width: 100px; }
        fieldset{
            background-color: lightgrey;
        }
    </style>
</head>
<body>

<?php include("header.php"); ?>

<div class="reports">

<?php
$sql = "SELECT order_id, item_name, quantity, price, discount, total, date 
        FROM sales 
        ORDER BY date DESC";

$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Query Failed: " . mysqli_error($conn));
}

$current_date = "";

while ($row = mysqli_fetch_assoc($result)) {

    // Format date (optional: remove time if exists)
    $row_date = date("d/m/Y", strtotime($row['date']));

    // Start new date group
    if ($current_date != $row_date) {

        // Close previous group
        if ($current_date != "") {
            echo "</fieldset></div>";
        }

        $current_date = $row_date;

        echo '<div class="receipts">
                <fieldset>
                    <legend><span id="date">'.$current_date.'</span></legend>';
    }
?>

    <div class="receipt">
        <span class="order">Orderid: <?php echo $row['order_id']; ?></span>
        <span class="item-name"><?php echo htmlspecialchars($row['item_name']); ?></span>
        <span class="Description">-</span>
        <span class="price">MWK<?php echo number_format($row['price']); ?></span>
        <span class="Quantity"><?php echo $row['quantity']; ?></span>
        <span class="Discount"><?php echo $row['discount']; ?>%</span>
    </div>

<?php
}

// Close last group
if ($current_date != "") {
    echo "</fieldset></div>";
}

// If no records
if (mysqli_num_rows($result) == 0) {
    echo "<p>No sales records found.</p>";
}
?>

</div>

</body>
</html>