<?php

$servername = "127.0.0.1";
$username = "root";
$password = "***REMOVED***";
$dbname = "ximpled";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT 
    c.fullname AS Customer,
    p1.name AS 'Delivery Salesman',
    p2.name AS 'Encoded By',
    i.item_description AS Item,
    pt.item_cost as Cost,
    pt.item_price as Price,
    pt.qty as Qty,
    pt.amount as Amount,
    pt.discount as Discount,
    pm.payment_mode_description as Payment,
    date(pt.transaction_date) as `Date`,
    pt.incentivevalue as Incentive
    
    
FROM
    ximpled.pos_transactions pt
        LEFT JOIN
    customer c ON c.id = pt.customer_id
    LEFT JOIN
    `profile` p1 ON p1.user_id = pt.salesman_id
    LEFT JOIN
    `profile` p2 ON p2.user_id = pt.encoded_by
    LEFT JOIN
    `items` i ON i.id = pt.item_id
    LEFT JOIN
    `payment_mode` pm ON pm.id = pt.payment_mode_id
    ;";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>";
    // output data of each row
    //$row = $result->fetch_assoc();
    $i = 0;
    while ($row = $result->fetch_assoc()) {
        if ($i == 0) {
            echo "<tr>";
            echo "<th>" . implode("</th><th>", array_keys($row)) . '</th>';

            echo "</tr>";
            $i++;
        }
        echo "<tr>";
        echo "<td>" . implode("</td><td>", $row) . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
