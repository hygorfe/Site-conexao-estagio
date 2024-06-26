<?php 
session_start();
require_once "config.php";
// 
if(($_FILES['img_profile']) && !empty($_FILES["img_profile"])){
    move_uploaded_file($_FILES["img_profile"]["tmp_name"], "./pic_img/". $_FILES["img_profile"]["name"]);
    echo "Foto enviada com sucesso";
}


if(isset($_FILES["img_profile"]) && $_FILES["img_profile"]["error"] == 0){

    move_uploaded_file($_FILES["img_profile"]["tmp_name"], "./pic_img/" . $_FILES["img_profile"]["name"]);

    $imgProfile = "pic_img/" . $_FILES["img_profile"]["name"];
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
    <input type="file" name="img_profile" id="img_profile" accept="image/*">
    <label for="img_profile"></label>
    <input type="submit" value="Enviar">
</body>
</html>