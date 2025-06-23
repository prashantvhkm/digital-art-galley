<?php
include "db.php";

if (! isset($_SESSION["id"])) {
    header("location:login.php");
}

$user_id=$_SESSION["id"];
$id=$_GET["id"];

$result=$con->prepare("select * from addupload where id=? and user_id=?;");
$result->bind_param("ii",$id,$user_id);
$result->execute();
$data=$result->get_result()->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"]==="POST") {
    $title=$_POST["title"];
    $description=$_POST["description"];
     if(!empty($_FILES["img"]["name"])){
        $img=$_FILES["img"]["name"];
        move_uploaded_file($_FILES["img"]["tmp_name"], "img/$img");
     }
     $sql=$con->prepare("call editupload(?,?,?,?,?)");
     $sql->bind_param("sssii", $title, $description,$img, $id,$user_id);
     $sql->execute();
     header("location:dashboard.php");
     unlink("img/" . $data['img']);

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
                        <h4>Edit Artwork</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="title" class="form-label">Art Title</label>
                                <input type="text" name="title" class="form-control" value="<?=$data["title"]?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" class="form-control" rows="3" required><?=$data["description"]?></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="artwork" class="form-label">Upload Image</label>
                                <img src="img/<?=$data["img"]?>"  width="300px" alt="">
                                <input type="file" name="img" class="form-control" accept="image/*" required>
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
