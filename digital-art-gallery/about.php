<?php include "db.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>About Us | Digital Art Gallery</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"
    />
  <style>
    .hero-about {
      background: url('wallpaper/img2.jpg') center/cover no-repeat;
      min-height: 300px;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .hero-about h1 {
      background-color: rgba(0, 0, 0, 0.5);
      color: white;
      padding: 1rem 2rem;
      border-radius: 10px;
      font-weight: bold;
    }
  </style>
</head>
<body>

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

<!-- Hero Banner -->
<section class="hero-about">
  <h1>About Digital Art Gallery</h1>
</section>

<!-- About Content -->
<div class="container my-5">
  <div class="row g-4">
    <div class="col-md-6">
      <img src="wallpaper/img3.jpg" class="img-fluid rounded shadow" alt="Digital Art Example">
    </div>
    <div class="col-md-6">
      <h2 class="fw-bold text-primary">Our Mission</h2>
      <p class="text-muted">
        At Digital Art Gallery, we aim to empower digital artists by providing a creative space to showcase, share, and be inspired by digital artwork from around the world.
      </p>
      <h4 class="fw-semibold mt-4">What We Offer</h4>
      <ul class="text-muted">
        <li>🎨 Upload and display your digital creations</li>
        <li>🖼️ Explore artwork from talented creators</li>
        <li>📤 Simple upload system and user-friendly interface</li>
        <li>👥 Community support and artist visibility</li>
      </ul>
    </div>
  </div>
</div>


    <!-- Footer -->
    <footer class="bg-dark text-white mt-5 pt-4 pb-3">
      <div class="container">
        <div class="row">
          <!-- About section -->
          <div class="col-md-4 mb-3">
            <h5 class="text-uppercase">Digital Art Gallery</h5>
            <p>
              A place to discover, share, and showcase creative digital art from around the world.
            </p>
          </div>

          <!-- Quick Links -->
          <div class="col-md-4 mb-3">
            <h6 class="text-uppercase fw-bold">Quick Links</h6>
            <ul class="list-unstyled">
              <li><a href="index.php" class="text-white text-decoration-none">Home</a></li>
              <li><a href="about.php" class="text-white text-decoration-none">About</a></li>
              <li><a href="contact.php" class="text-white text-decoration-none">Contact</a></li>
              <li><a href="login.php" class="text-white text-decoration-none">Login</a></li>
            </ul>
          </div>

          <!-- Contact Info -->
          <div class="col-md-4 mb-3">
            <h6 class="text-uppercase fw-bold">Contact</h6>
            <p class="mb-1"><i class="bi bi-envelope-fill me-2"></i> support@digitalart.com</p>
            <p><i class="bi bi-telephone-fill me-2"></i> +91 98765 43210</p>
          </div>
        </div>
        <hr class="text-white" />
        <div class="text-center">
          <small>&copy; <?= date("Y") ?> Digital Art Gallery. All rights reserved.</small>
        </div>
      </div>
    </footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
