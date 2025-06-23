<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

   
    if (empty($username) || empty($password) ) {
        echo "<script>alert('Please fill all the fields.'); window.history.back();</script>";
    }else {

        $sql=$con->prepare("Select id,password from users where username=?");
        $sql->bind_param("s", $username);
        $sql->execute();
        $sql->store_result();
        $sql->bind_result($id,$pass);

        if($sql->fetch() || password_verify($password,$pass)){
                $_SESSION["id"]= $id;
                $_SESSION["username"]=$username;
                header("Location: dashboard.php");

        }else{
                echo "<script>alert('Error during login.'); window.history.back();</script>";
            }
        }
    }
?>

<!doctype html>
<html lang="en">
    <head>
    <title>Login | Digital Art Gallery</title>
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
    </head>

    <body class="bg-light">
        <header>
            <!-- place navbar here -->
        </header>
        <main>
        <div class="container"><div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-md-5">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white text-center">
                        <h4>Login to Your Account</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST">
    <div class="mb-3">
        <label for="username" class="form-label">Username or Email</label>
        <input type="text" name="username" class="form-control" id="username">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="password">
        <div class="text-end mt-1">
            <a href="forgot_password.php" class="small text-decoration-none">Forgot Password?</a>
        </div>
    </div>
    <div class="d-grid">
        <button type="submit" class="btn btn-primary">Login</button>
    </div>
</form>

                    </div>
                    <div class="card-footer text-center">
                        Don’t have an account? <a href="sign.php">Sign up here</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

        </main>
        <footer>
            <!-- place footer here -->
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
