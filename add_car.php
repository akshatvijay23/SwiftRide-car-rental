<form action="insert_car.php" method="POST" enctype="multipart/form-data">
    Car Name: <input type="text" name="car_name" required><br>
    Price/Day: <input type="text" name="price_per_day" required><br>
    Year: <input type="text" name="year" required><br>
    Image: <input type="file" name="image" required><br>
    <input type="submit" value="Add Car">
</form>