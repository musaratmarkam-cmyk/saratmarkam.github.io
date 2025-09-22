<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "studentdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// File upload
$photo = $_FILES['photo']['name'];
$photo_tmp = $_FILES['photo']['tmp_name'];
move_uploaded_file($photo_tmp, "uploads/".$photo);

$signature = $_FILES['signature']['name'];
$signature_tmp = $_FILES['signature']['tmp_name'];
move_uploaded_file($signature_tmp, "uploads/".$signature);

// Insert data
$stmt = $conn->prepare("INSERT INTO students (fullname, fathername, village, phone, class, photo, signature) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssss", $_POST['fullname'], $_POST['fathername'], $_POST['village'], $_POST['phone'], $_POST['class'], $photo, $signature);

if($stmt->execute()){
    echo "<h3>Registration Successful! <a href='download.php?id=".$stmt->insert_id."'>Download Form</a></h3>";
}else{
    echo "Error: ".$stmt->error;
}

$stmt->close();
$conn->close();
?>
