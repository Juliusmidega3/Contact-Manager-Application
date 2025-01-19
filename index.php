<?php
require 'db.php';
$stmt = $pdo->query("SELECT * FROM contacts");
$contacts = $stmt->fetchAll();
?>

<a href="add_contact.php">Add Contact</a>
<h1>Contact List</h1>
<table border="1">
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($contacts as $contact): ?>
    <tr>
        <td><?= htmlspecialchars($contact['name']) ?></td>
        <td><?= htmlspecialchars($contact['email']) ?></td>
        <td><?= htmlspecialchars($contact['phone']) ?></td>
        <td><?= htmlspecialchars($contact['address']) ?></td>
        <td>
            <a href="edit_contact.php?id=<?= $contact['id'] ?>">Edit</a>
            <a href="delete_contact.php?id=<?= $contact['id'] ?>">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
