<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>CRUD - Add, Edit & Delete Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">

    <?php
    // Insert
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $stmt = $conn->prepare("INSERT INTO users (name, email) VALUES (?, ?)");
        $stmt->bind_param("ss", $name, $email);
        $stmt->execute();
        header("Location: index.php?success=1");
        exit;
    }

    // Update
    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $stmt = $conn->prepare("UPDATE users SET name=?, email=? WHERE id=?");
        $stmt->bind_param("ssi", $name, $email, $id);
        $stmt->execute();
        header("Location: index.php?updated=1");
        exit;
    }

    // Delete
    if (isset($_GET['delete'])) {
        $deleteId = $_GET['delete'];
        $stmt = $conn->prepare("DELETE FROM users WHERE id=?");
        $stmt->bind_param("i", $deleteId);
        $stmt->execute();
        header("Location: index.php?deleted=1");
        exit;
    }

    // Edit Mode
    $editMode = false;
    if (isset($_GET['edit'])) {
        $editMode = true;
        $editId = $_GET['edit'];
        $result = $conn->query("SELECT * FROM users WHERE id=$editId");
        $editUser = $result->fetch_assoc();
    }
    ?>

    <h2><?= $editMode ? "Edit User" : "Add New User" ?></h2>

    <form method="POST" class="bg-white p-4 shadow rounded mb-4">
        <?php if ($editMode): ?>
            <input type="hidden" name="id" value="<?= $editUser['id'] ?>">
        <?php endif; ?>

        <div class="mb-3">
            <label class="form-label">Name:</label>
            <input type="text" name="name" value="<?= $editMode ? htmlspecialchars($editUser['name']) : '' ?>" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Email:</label>
            <input type="email" name="email" value="<?= $editMode ? htmlspecialchars($editUser['email']) : '' ?>" class="form-control" required>
        </div>

        <button type="submit" name="<?= $editMode ? 'update' : 'submit' ?>" class="btn btn-<?= $editMode ? 'success' : 'primary' ?>">
            <?= $editMode ? 'Update' : 'Add User' ?>
        </button>

        <?php if ($editMode): ?>
            <a href="index.php" class="btn btn-secondary ms-2">Cancel</a>
        <?php endif; ?>
    </form>

    <?php
    if (isset($_GET['success'])) echo "<div class='alert alert-success'>User added successfully!</div>";
    if (isset($_GET['updated'])) echo "<div class='alert alert-info'>User updated successfully!</div>";
    if (isset($_GET['deleted'])) echo "<div class='alert alert-danger'>User deleted successfully!</div>";
    ?>

    <h2>All Users</h2>
    <table class="table table-bordered table-striped bg-white shadow-sm">
        <thead class="table-dark">
        <tr>
            <th>ID</th><th>Name</th><th>Email</th><th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $result = $conn->query("SELECT * FROM users ORDER BY id DESC");
        while ($row = $result->fetch_assoc()):
        ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= htmlspecialchars($row['name']) ?></td>
                <td><?= htmlspecialchars($row['email']) ?></td>
                <td>
                    <a href="index.php?edit=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="index.php?delete=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete this user?')">Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</div>
</body>
</html>
