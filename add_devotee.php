<?php
// Database connection setup
$servername = "localhost";
$username = "root";
$password = "YES";
$dbname = "devotee_db";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert new devotee into the database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    
    // Image upload
    $image = $_FILES["image"]["name"];
    $image_tmp = $_FILES["image"]["tmp_name"];
    $image_path = "images/" . $image;
    move_uploaded_file($image_tmp, $image_path);

    $sql = "INSERT INTO devotees (name, email, image_path) VALUES ('$name', '$email', '$image_path')";
    if ($conn->query($sql) === TRUE) {
        // Successfully added to database
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Fetch and display devotees list
$sql = "SELECT * FROM devotees";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<li>";
        echo "<img src='" . $row["image_path"] . "' alt='Devotee Image' width='100'>";
        echo $row["name"] . " - " . $row["email"];
        echo "</li>";
    }
} else {
    echo "No devotees found.";
}

$conn->close();
?>