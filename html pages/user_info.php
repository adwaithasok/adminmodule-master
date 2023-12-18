<?php
// Replace with your database connection code
$servername = "your_server_name";
$username = "your_username";
$password = "your_password";
$dbname = "your_database_name";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Replace with your actual query to fetch user details
$sql = "SELECT id, name, birth_date, image FROM users WHERE id = 1"; // Adjust the WHERE clause as needed
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $userId = $row["id"];
    $userName = $row["name"];
    $userBirthDate = $row["birth_date"];
    $userImage = $row["image"];
} else {
    echo "User not found";
    exit;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About User</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>About <?php echo $userName; ?></h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div>
            <img src="<?php echo $userImage; ?>" alt="User Image">
        </div>
        <div>
            <p><strong>Student ID:</strong> <?php echo $userId; ?></p>
            <p><strong>Name:</strong> <?php echo $userName; ?></p>
            <p><strong>Birth Date:</strong> <?php echo $userBirthDate; ?></p>
        </div>
    </main>
    <footer>
        <p>&copy; 2023 Your Company</p>
    </footer>
</body>
</html>
