<?php
include('db.php');

// Handle insert
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $service = $_POST['service'];
    $message = $_POST['message'];

    $stmt = $conn->prepare("INSERT INTO users (full_name, email, service, message) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $full_name, $email, $service, $message);

    if ($stmt->execute()) {
        echo "<div class='alert alert-success'>Booking submitted successfully!</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . $stmt->error . "</div>";
    }

    $stmt->close();
}

// Fetch users to display
$result = $conn->query("SELECT * FROM users ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Booking Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Book a Service</h2>
    <form method="POST" action="booking-form.php">
        <div class="mb-3">
            <input type="text" name="full_name" class="form-control" placeholder="Full Name" required>
        </div>
        <div class="mb-3">
            <input type="email" name="email" class="form-control" placeholder="Email" required>
        </div>
        <div class="mb-3">
            <select name="service" class="form-control" required>
                <option value="">Select Service</option>
                <option value="Growth Marketing">Growth Marketing</option>
                <option value="Online Branding">Online Branding</option>
                <option value="Animated Ads">Animated Ads</option>
                <option value="SEO Optimization">SEO Optimization</option>
                <option value="Content Creation">Content Creation</option>
                <option value="Web Development">Web Development</option>
            </select>
        </div>
        <div class="mb-3">
            <textarea name="message" class="form-control" placeholder="Message" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit Booking</button>
    </form>

    <hr>

    <h3 class="mt-5">All Bookings</h3>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Service</th>
            <th>Message</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?= $row['id']; ?></td>
                <td><?= $row['full_name']; ?></td>
                <td><?= $row['email']; ?></td>
                <td><?= $row['service']; ?></td>
                <td><?= $row['message']; ?></td>
                <td>
                    <a href="update.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm">Update</a>
                    <a href="delete.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm"
                       onclick="return confirm('Are you sure you want to delete this booking?');">Delete</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
</body>
</html>
