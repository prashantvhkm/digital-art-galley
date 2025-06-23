<?php
include "db.php";

$sql=$con->query("SELECT addupload.*, users.username FROM 
addupload JOIN users ON addupload.user_id = users.id");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"
    />

    <style>
        .hover-card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.hover-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 1rem 2rem rgba(0, 0, 0, 0.1);
}

    </style>
    <!-- Bootstrap CSS v5.2.1 -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
  </head>

  <body class="container-fluid">
    <header>
      <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
        <div class="container">
          <a class="navbar-brand fw-bold text-uppercase" href="index.php"
            >Digital Art Gallery</a
          >
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#mainNav"
            aria-controls="mainNav"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="mainNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.php">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact.php">Contact</a>
              </li>
            </ul>

            <!-- Right-side buttons -->
            <div class="d-flex">
              <a href="sign.php" class="btn btn-outline-primary me-2"
                >Sign Up</a
              >
              <a href="login.php" class="btn btn-primary">Login</a>
            </div>
          </div>
        </div>
      </nav>
    </header>

    <main>
      <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
          <li
            data-bs-target="#carouselId"
            data-bs-slide-to="0"
            class="active"
            aria-current="true"
            aria-label="First slide"
          ></li>
          <li
            data-bs-target="#carouselId"
            data-bs-slide-to="1"
            aria-label="Second slide"
          ></li>
          <li
            data-bs-target="#carouselId"
            data-bs-slide-to="2"
            aria-label="Third slide"
          ></li>
          <li
            data-bs-target="#carouselId"
            data-bs-slide-to="3"
            aria-label="Fourd slide"
          ></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <div class="carousel-item active">
            <img
              src="wallpaper/img1.jpg"
              class="w-100 d-block"
              alt="First slide"
            />
          </div>
          <div class="carousel-item">
            <img
              src="wallpaper/img2.jpg"
              class="w-100 d-block"
              alt="Second slide"
            />
          </div>
          <div class="carousel-item">
            <img
              src="wallpaper/img3.jpg"
              class="w-100 d-block"
              alt="Third slide"
            />
          </div>
          <div class="carousel-item">
            <img
              src="wallpaper/img4.jpg"
              class="w-100 d-block"
              alt="Third slide"
            />
          </div>
        </div>
        <button
          class="carousel-control-prev"
          type="button"
          data-bs-target="#carouselId"
          data-bs-slide="prev"
        >
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button
          class="carousel-control-next"
          type="button"
          data-bs-target="#carouselId"
          data-bs-slide="next"
        >
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>

      <div class="container mt-5">
    <div class="row g-4">
        <?php while($row = $sql->fetch_assoc()) { ?>
        <div class="col-12 col-sm-6 col-md-4">
            <div class="card h-100 border-0 shadow-sm rounded-4 hover-card">
                <img src="img/<?= htmlspecialchars($row['img']) ?>"
                     class="card-img-top rounded-top-4"
                     alt="<?= htmlspecialchars($row['title']) ?>"
                     style="height: 180px; object-fit: cover;">
                <div class="card-body">
                    <h6 class="card-title fw-bold text-primary mb-1">
                        <?= htmlspecialchars($row['title']) ?>
                    </h6>
                    <p class="card-text small text-muted mb-2" style="height: 48px; overflow: hidden;">
                        <?= htmlspecialchars($row['description']) ?>
                    </p>
                    <small class="text-muted d-block mb-2">
                        Uploaded by <strong><?= htmlspecialchars($row['username']) ?></strong><br>
                        <span><?= date("d M Y, h:i A", strtotime($row['created_at'])) ?></span>
                    </small>
                </div>
                <div class="card-footer bg-white border-0 d-flex justify-content-between">
                    <a href="login.php" class="btn btn-sm btn-outline-primary">More</a>
                    
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>

    </main>
    <footer class="bg-dark text-white mt-5 pt-4 pb-3">
      <div class="container">
        <div class="row">
          <!-- About section -->
          <div class="col-md-4 mb-3">
            <h5 class="text-uppercase">Digital Art Gallery</h5>
            <p class="text-white">
              A place to discover, share, and showcase creative digital art from
              around the world.
            </p>
          </div>

          <!-- Quick Links -->
          <div class="col-md-4 mb-3">
            <h6 class="text-uppercase fw-bold">Quick Links</h6>
            <ul class="list-unstyled">
              <li>
                <a href="#" class="text-white text-decoration-none">Home</a>
              </li>
              <li>
                <a href="#" class="text-white text-decoration-none">About</a>
              </li>
              <li>
                <a href="#" class="text-white text-decoration-none">Contact</a>
              </li>
              <li>
                <a href="login.php" class="text-white text-decoration-none"
                  >Login</a
                >
              </li>
            </ul>
          </div>

          <!-- Contact Info -->
          <div class="col-md-4 mb-3">
            <h6 class="text-uppercase fw-bold">Contact</h6>
            <p class="mb-1">
              <i class="bi bi-envelope-fill me-2"></i> support@digitalart.com
            </p>
            <p><i class="bi bi-telephone-fill me-2"></i> +91 98765 43210</p>
          </div>
        </div>
        <hr class="text-white" />
        <div class="text-center">
          <small
            >&copy;
            <?= date("Y") ?>
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
