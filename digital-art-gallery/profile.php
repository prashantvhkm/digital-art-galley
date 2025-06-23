<?php
include "db.php";

if (!isset($_SESSION["id"])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION["id"];

// Process the update form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = trim($_POST["fullname"]);
    $email = trim($_POST["email"]);
    $username = trim($_POST["username"]);

    // Update query
    $update = $con->prepare("call profileUser(?,?,?,?)");
    $update->bind_param("sssi", $fullname, $email, $username, $user_id);
    $update->execute();

    // Update session username if changed
    $_SESSION["username"] = $username;

    header("Location: profile.php");
    exit();
}

// Fetch profile data
$sql = $con->prepare("SELECT fullname, email, username, created_at FROM users WHERE id = ?");
$sql->bind_param("i", $user_id);
$sql->execute();
$result = $sql->get_result();
$user = $result->fetch_assoc();

$isEdit = isset($_GET["edit"]) && $_GET["edit"] == "true";
?>
<!doctype html>
<html lang="en">
<head>
    <title>My Profile | Digital Art Gallery</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="dashboard.php">Digital Art Gallery</a>
        <div class="d-flex">
            <a href="logout.php" class="btn btn-outline-light">Logout</a>
        </div>
    </div>
</nav>

<main class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">My Profile</h4>
            <?php if (!$isEdit): ?>
                <a href="profile.php?edit=true" class="btn btn-light btn-sm">Edit Profile</a>
            <?php endif; ?>
        </div>
        <div class="card-body">
            <?php if ($isEdit): ?>
                <form method="POST" action="">
                    <div class="mb-3">
                        <label for="fullname" class="form-label">Full Name</label>
                        <input type="text" name="fullname" id="fullname" class="form-control" value="<?= htmlspecialchars($user['fullname']) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" id="username" class="form-control" value="<?= htmlspecialchars($user['username']) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" name="email" id="email" class="form-control" value="<?= htmlspecialchars($user['email']) ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                    <a href="profile.php" class="btn btn-secondary">Cancel</a>
                </form>
            <?php else: ?>
                <p><strong>Full Name:</strong> <?= htmlspecialchars($user['fullname']) ?></p>
                <p><strong>Username:</strong> <?= htmlspecialchars($user['username']) ?></p>
                <p><strong>Email:</strong> <?= htmlspecialchars($user['email']) ?></p>
                <p><strong>Member Since:</strong> <?= date("d M Y", strtotime($user['created_at'])) ?></p>
            <?php endif; ?>
        </div>
    </div>
</main>

<footer class="bg-dark text-white pt-4 mt-5">
      <div class="container text-center text-md-start">
        <div class="row">
          <!-- Brand Info -->
          <div class="col-md-4 mb-4">
            <h5 class="fw-bold text-uppercase">Digital Art Gallery</h5>
            <p class="text-write">
              Discover, share, and contribute to a world of digital creativity.
            </p>
          </div>

          <!-- Quick Links -->
          <div class="col-md-4 mb-4">
            <h6 class="text-uppercase fw-bold mb-3">Quick Links</h6>
            <ul class="list-unstyled">
              <li>
                <a href="dashboard.php" class="text-white text-decoration-none"
                  >Dashboard</a
                >
              </li>
              <li>
                <a href="gallery.php" class="text-white text-decoration-none"
                  >Gallery</a
                >
              </li>
              <li>
                <a href="profile.php" class="text-white text-decoration-none"
                  >Profile</a
                >
              </li>
              <li>
                <a href="addUpload.php" class="text-white text-decoration-none"
                  >Upload</a
                >
              </li>
            </ul>
          </div>

          <!-- Contact Info -->
          <div class="col-md-4 mb-4">
            <h6 class="text-uppercase fw-bold mb-3">Contact Us</h6>
            <p class="text-write mb-1">Email: support@digitalart.com</p>
            <p class="text-write mb-0">Phone: +91 98765 43210</p>
          </div>
        </div>

        <hr class="mb-3 text-white" />

        <!-- Copyright -->
        <div class="text-center  pb-3">
          <small
            >&copy;
            <?php echo date("Y"); ?>
            Digital Art Gallery. All rights reserved.</small
          >
        </div>
      </div>
    </footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
