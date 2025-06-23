<?php
include "db.php";

if (!isset($_SESSION["id"])) {
    header("Location: login.php");
    exit();
}
$sql=$con->prepare("SELECT addupload.*, users.username FROM 
addupload JOIN users ON addupload.user_id = users.id WHERE addupload.user_id = ?");
$sql->bind_param("i", $_SESSION["id"]);
$sql->execute();
$result=$sql->get_result();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>User Dashboard | Digital Art Gallery</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS v5.2.1 -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <style>
      .hover-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border-radius: 1rem;
      }

      .hover-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 0.75rem 1.5rem rgba(0, 0, 0, 0.1);
      }
    </style>
  </head>

  <body class="bg-light">
    <header>
      <!-- place navbar here -->

      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
          <a class="navbar-brand" href="dashboard.php">Digital Art Gallery</a>
          <div class="d-flex">
            <a href="logout.php" class="btn btn-outline-light">Logout</a>
          </div>
        </div>
      </nav>
    </header>
    <main>
      <div class="box1">
        <!-- Content -->
        <div class="container mt-5">
          <div class="text-center mb-5">
            <h1 class="display-5 fw-bold text-primary">
              Welcome,
              <?php echo htmlspecialchars($_SESSION["username"]); ?>!
            </h1>
            <p class="lead text-muted">
              You have successfully logged in to your dashboard.
            </p>
          </div>

          <div class="row g-4 justify-content-center">
            <!-- Card 1 -->
            <div class="col-md-4">
              <div class="card border-0 shadow-lg h-100 hover-card">
                <div class="card-body text-center">
                  <h5 class="card-title fw-semibold">🎨 Explore Gallery</h5>
                  <p class="card-text text-muted">
                    View digital artworks uploaded by creators.
                  </p>
                  <a
                    href="gallery.php"
                    class="btn btn-outline-primary rounded-pill px-4"
                    >Go to Gallery</a
                  >
                </div>
              </div>
            </div>

            <!-- Card 2 -->
            <div class="col-md-4">
              <div class="card border-0 shadow-lg h-100 hover-card">
                <div class="card-body text-center">
                  <h5 class="card-title fw-semibold">👤 Profile</h5>
                  <p class="card-text text-muted">
                    Manage your personal information and preferences.
                  </p>
                  <a
                    href="profile.php"
                    class="btn btn-outline-primary rounded-pill px-4"
                    >View Profile</a
                  >
                </div>
              </div>
            </div>

            <!-- Card 3 -->
            <div class="col-md-4">
              <div class="card border-0 shadow-lg h-100 hover-card">
                <div class="card-body text-center">
                  <h5 class="card-title fw-semibold">📤 Upload Artwork</h5>
                  <p class="card-text text-muted">
                    Contribute your own digital art to the gallery.
                  </p>
                  <a
                    href="addUpload.php"
                    class="btn btn-outline-primary rounded-pill px-4"
                    >Upload</a
                  >
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="box2">
        <div class="container mt-5">
          <div class="row g-4">
            <?php while($row = $result->fetch_assoc()) { ?>
            <div class="col-md-4">
              <div class="card shadow-sm border-0 h-100">
                <img
                  src="img/<?=$row['img']?>"
                  class="card-img-top"
                  alt="<?=htmlspecialchars($row['title'])?>"
                  style="height: 200px; object-fit: cover"
                />
                <div class="card-body">
                  <h5 class="card-title">
                    <?=htmlspecialchars($row['title'])?>
                  </h5>
                  <p class="card-text small text-muted">
                       <?= htmlspecialchars($row['description']) ?>
                  </p>

                </div>
                <div class="card-footer bg-white border-0">
                  <small class="text-muted d-block mb-2">
                    Uploaded by
                    <strong><?=htmlspecialchars($row['username'])?></strong
                    ><br />
                    <span
                      ><?=date("d M Y, h:i A", strtotime($row['created_at']))?></span
                    >
                  </small>
                  <div class="d-flex justify-content-between">
                    <a
                      href="edit.php?id=<?=$row['id']?>"
                      class="btn btn-outline-primary btn-sm"
                      >Edit</a
                    >
                    <a
                      href="delete.php?id=<?=$row['id']?>"
                      class="btn btn-outline-danger btn-sm"
                      onclick="return confirm('Are you sure you want to delete this record?');"
                      >Delete</a
                    >
                  </div>
                </div>
              </div>
            </div>
            <?php } ?>
          </div>
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
    <!-- Bootstrap JavaScript Libraries -->
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
      crossorigin="anonymous"
    ></script>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
      integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
