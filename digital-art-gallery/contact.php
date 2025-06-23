<!doctype html>
<html lang="en">
  <head>
    <title>Contact | Digital Art Gallery</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.3.2 -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />

    <!-- Bootstrap Icons -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"
    />

    <style>
      .contact-header {
        background: url('wallpaper/img4.jpg') center/cover no-repeat;
        min-height: 280px;
        display: flex;
        align-items: center;
        justify-content: center;
      }
      .contact-header h1 {
        background-color: rgba(0, 0, 0, 0.6);
        color: #fff;
        padding: 1rem 2rem;
        border-radius: 10px;
        font-weight: bold;
      }
    </style>
  </head>

  <body>
    <!-- Navbar -->
    <header>
      <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
        <div class="container">
          <a class="navbar-brand fw-bold text-uppercase" href="index.php">Digital Art Gallery</a>
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
                <a class="nav-link active" href="index.php">Home</a>
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
              <a href="sign.php" class="btn btn-outline-primary me-2">Sign Up</a>
              <a href="login.php" class="btn btn-primary">Login</a>
            </div>
          </div>
        </div>
      </nav>
    </header>

    <!-- Header Banner -->
    <section class="contact-header">
      <h1>Get in Touch</h1>
    </section>

    <!-- Contact Section -->
    <div class="container my-5">
      <!-- Google Map -->
      <div class="ratio ratio-16x9 mb-4">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d37043.009679879535!2d72.78530921664162!3d19.408110916543134!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7a93891055565%3A0xf39283d30d9ad8cc!2sNala%20Sopara%2C%20Maharashtra!5e1!3m2!1sen!2sin!4v1750646565228!5m2!1sen!2sin"
          allowfullscreen
          loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"
        ></iframe>
      </div>

      <!-- Contact Info + Image -->
      <div class="row g-5">
        <div class="col-md-6">
          <h3 class="fw-bold text-primary">Contact Information</h3>
          <ul class="list-unstyled text-muted">
            <li><i class="bi bi-envelope-fill me-2"></i> support@digitalart.com</li>
            <li><i class="bi bi-telephone-fill me-2"></i> +91 98765 43210</li>
            <li><i class="bi bi-geo-alt-fill me-2"></i> Mumbai, India</li>
          </ul>
        </div>
        <div class="col-md-6">
          <img
            src="wallpaper/img1.jpg"
            class="img-fluid rounded shadow-sm"
            alt="Contact Art"
          />
        </div>
      </div>

      <!-- Contact Form -->
      <div class="mt-5">
        <h4>Send Us a Message</h4>
        <form>
          <div class="mb-3">
            <label for="name" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="name" required />
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" required />
          </div>
          <div class="mb-3">
            <label for="message" class="form-label">Message</label>
            <textarea class="form-control" id="message" rows="3" required></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Send</button>
        </form>
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

    <!-- Bootstrap JS -->
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
