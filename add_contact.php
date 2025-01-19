<?php
require 'db.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $stmt = $pdo->prepare("INSERT INTO contacts (name, email, phone, address) VALUES (?, ?, ?, ?)");
    $stmt->execute([$name, $email, $phone, $address]);
    header('Location: index.php');
}
?>

<form method="post">
    <input type="text" name="name" placeholder="Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="text" name="phone" placeholder="Phone">
    <textarea name="address" placeholder="Address"></textarea>
    <button type="submit">Add Contact</button>
</form>
