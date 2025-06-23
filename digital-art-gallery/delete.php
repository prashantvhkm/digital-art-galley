<?php
include "db.php";

if (! isset($_SESSION["id"])) {
    header("location:login.php");
}

$user_id=$_SESSION["id"];
$id=$_GET["id"];

$result=$con->prepare("select img from addupload where id=? and user_id=?;");
$result->bind_param("ii",$id,$user_id);
$result->execute();
$data=$result->get_result()->fetch_assoc();

$sql=$con->prepare("delete from addupload where id=? and user_id=?");
$sql->bind_param("ii", $id,$user_id);
$sql->execute();
header("location:dashboard.php");
unlink("img/" . $data['img']);


?>