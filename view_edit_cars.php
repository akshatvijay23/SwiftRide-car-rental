<?php
include('db.php');

$query = "SELECT * FROM cars";
$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_assoc($result)) {
    echo "<div style='margin: 10px; padding: 10px; border: 1px solid #ccc;'>";
    if (!empty($row['image'])) {
        echo "<img src='uploads/" . $row['image'] . "' style='width: 150px;'><br>";
    }
    echo "<strong>" . $row['car_name'] . "</strong><br>";
    echo "₹" . $row['price_per_day'] . " / day<br>";
    echo "Year: " . $row['year'] . "<br>";
    echo "<a href='edit_car.php?id=" . $row['id'] . "'>Edit</a>";
    echo "</div>";
}
?>