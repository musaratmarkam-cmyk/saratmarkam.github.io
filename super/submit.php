<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student_db";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$fullname = $_POST['fullname'];
$fathername = $_POST['fathername'];
$village = $_POST['village'];
$phone = $_POST['phone'];
$class = $_POST['class'];

// Upload photo
$photo = $_FILES['photo']['name'];
move_uploaded_file($_FILES['photo']['tmp_name'], "uploads/".$photo);

// Upload signature
$signature = $_FILES['signature']['name'];
move_uploaded_file($_FILES['signature']['tmp_name'], "uploads/".$signature);

$sql = "INSERT INTO students (fullname, fathername, village, phone, class, photo, signature)
VALUES ('$fullname', '$fathername', '$village', '$phone', '$class', '$photo', '$signature')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
