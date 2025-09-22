<?php
$id = $_GET['id'];
$conn = new mysqli("localhost","root","","studentdb");
$res = $conn->query("SELECT * FROM students WHERE id=$id");
$data = $res->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
<title>Download Form</title>
<style>
    body { font-family: Arial; padding: 30px; }
    .form-print { max-width: 600px; margin: auto; border: 2px solid #333; padding: 20px; }
    h2 { text-align: center; }
    img { max-width: 100px; display: block; margin-top: 10px; }
</style>
</head>
<body>
<div class="form-print">
    <h2>Student Registration Form</h2>
    <p><strong>Full Name:</strong> <?= $data['fullname'] ?></p>
    <p><strong>Father's Name:</strong> <?= $data['fathername'] ?></p>
    <p><strong>Village:</strong> <?= $data['village'] ?></p>
    <p><strong>Phone:</strong> <?= $data['phone'] ?></p>
    <p><strong>Class:</strong> <?= $data['class'] ?></p>
    <p><strong>Photo:</strong><br><img src="uploads/<?= $data['photo'] ?>"></p>
    <p><strong>Signature:</strong><br><img src="uploads/<?= $data['signature'] ?>"></p>
</div>
<script>
    window.print(); // automatically opens print dialog
</script>
</body>
</html>
