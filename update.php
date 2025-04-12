<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agency Booking Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <!-- Navbar -->
  

    <!-- Booking Form -->
    <div class="container mt-5">
      <h1 class="mb-4">Book a Service</h1>
      
      <form method="POST" action="">
        <div class="mb-3">
          <input type="text" class="form-control" name="full_name" placeholder="Full Name" required>
        </div>
        <div class="mb-3">
          <input type="email" class="form-control" name="email" placeholder="Email Address" required>
        </div>
        <div class="mb-3">
          <select class="form-control" name="service" required>
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
          <textarea class="form-control" name="message" placeholder="Message" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit Booking</button>
      </form>

      <hr class="my-5">

      <h3 class="mb-4">All Bookings</h3>
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Service</th>
            <th>Message</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
        <?php while($row = $result->fetch_assoc()) { ?>
          <tr>
            <td><?= $row['id'] ?></td>
            <td><?= htmlspecialchars($row['full_name']) ?></td>
            <td><?= htmlspecialchars($row['email']) ?></td>
            <td><?= htmlspecialchars($row['service']) ?></td>
            <td><?= htmlspecialchars($row['message']) ?></td>
            <td>
              <a href="update.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Update</a>
              <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
          </tr>
        <?php } ?>
        </tbody>
      </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
