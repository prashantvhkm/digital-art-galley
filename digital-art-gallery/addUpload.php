<?php
include "db.php";


if (! isset($_SESSION["id"])) {
    header("location:login.php");
}

if($_SERVER["REQUEST_METHOD"]==="POST"){
    $id=$_SESSION["id"];
    $title=trim($_POST["title"]);
    $description=trim($_POST["description"]);
    $img=$_FILES["img"]["name"];
    move_uploaded_file($_FILES["img"]["tmp_name"],"img/$img");

    $sql=$con->prepare("call addUpload(?,?,?,?)");
    $sql->bind_param("isss", $id, $title, $description, $img);
    $sql->execute();
    header("location:dashboard.php");

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Art | Digital Art Gallery</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white text-center">
                        <h4>Upload Artwork</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="title" class="form-label">Art Title</label>
                                <input type="text" name="title" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" class="form-control" rows="3" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="artwork" class="form-label">Upload Image</label>
                                <input type="file" name="img" class="form-control" accept="image/*">
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Upload</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <a href="dashboard.php">Back to Dashboard</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
