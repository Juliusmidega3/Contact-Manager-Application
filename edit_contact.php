<?php
require 'db.php';
$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM contacts WHERE id = ?");
$stmt->execute([$id]);
$contact = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $stmt = $pdo->prepare("UPDATE contacts SET name = ?, email = ?, phone = ?, address = ? WHERE id = ?");
    $stmt->execute([$name, $email, $phone, $address, $id]);
    header('Location: index.php');
}
?>

<form method="post">
    <input type="text" name="name" value="<?= htmlspecialchars($contact['name']) ?>" required>
    <input type="email" name="email" value="<?= htmlspecialchars($contact['email']) ?>" required>
    <input type="text" name="phone" value="<?= htmlspecialchars($contact['phone']) ?>">
    <textarea name="address"><?= htmlspecialchars($contact['address']) ?></textarea>
    <button type="submit">Update Contact</button>
</form>
