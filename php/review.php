<?php
// add_review.php
session_start();

if (!isset($_SESSION['userid'])) {
    echo "Please login to submit a review.";
    exit;
}

$restaurantId = isset($_GET['restaurantId']) ? $_GET['restaurantId'] : '';
$foodItemId = isset($_GET['foodItemId']) ? $_GET['foodItemId'] : '';

$host = 'localhost';
$dbname = 'FoodReviewDB';
$user = 'cgtuser';
$password = 'CGT141!cgt';

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT FoodItems.Name FROM FoodItems WHERE FoodItemID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $foodItemId);
$stmt->execute();
$result = $stmt->get_result();
if ($row = $result->fetch_assoc()) {
    $foodItemName = $row['Name'];
} else {
    echo "Food item not found.";
    exit;
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Review for <?php echo htmlspecialchars($foodItemName); ?></title>
</head>
<body>
    <h2>Add Review for <?php echo htmlspecialchars($foodItemName); ?></h2>
    <form action="process_review.php" method="post">
        <input type="hidden" name="restaurantId" value="<?php echo htmlspecialchars($restaurantId); ?>">
        <input type="hidden" name="foodItemId" value="<?php echo htmlspecialchars($foodItemId); ?>">
        <label for="reviewText">Your Review:</label><br>
        <textarea id="reviewText" name="reviewText" required></textarea><br><br>
        <input type="submit" value="Submit Review">
    </form>
</body>
</html>
