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
    </style>
</head>
<body class="reportBody">

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

$orders = [];

while ($row = mysqli_fetch_assoc($result)) {

    $date = date("d/m/Y", strtotime($row['date']));
    $orderId = $row['order_id'];

    // Group by date → order_id
    $orders[$date][$orderId][] = $row;
}
?>

    <?php foreach ($orders as $date => $orderGroup): ?>

    <div class="receipts">
        <fieldset class="fieldset">
            <legend><?php echo $date; ?></legend>

            <?php foreach ($orderGroup as $orderId => $items): ?>

                <div class="sale-card" style="display:flex; gap:10px; margin-bottom:10px; border:1px solid #ccc; padding:10px;">

                    <strong>Order ID: <?php echo $orderId; ?></strong>

                    <div style="display:flex; gap:15px; flex-wrap:wrap;">

                        <?php foreach ($items as $item): ?>
                            <div class="receipt" style="display:flex; gap:10px;font-weight:bold;">
                                <span><?php echo htmlspecialchars($item['item_name']); ?></span>
                                <span>MWK <?php echo number_format($item['price']); ?></span>
                                <span>Qty: <?php echo $item['quantity']; ?></span>
                                <span><?php echo $item['discount']; ?>%</span>
                            </div>
                        <?php endforeach; ?>

                    </div>

                </div>

            <?php endforeach; ?>

        </fieldset>
    </div>

<?php endforeach; ?>

<?php 
// If no records
if (mysqli_num_rows($result) == 0) {
    echo "<p>No sales records found.</p>";
}
?>

</div>
</body>
</html>