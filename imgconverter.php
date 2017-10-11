<?php
    error_reporting(E_ALL | E_STRICT);
    ini_set('display_errors', 'On');

    $target_dir = "uploads/";
    $target_dir_res = "imgres/";
    $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
    $target_file_res = $target_dir_res . basename($_FILES["gambar"]["name"]);

    // Jangan lupa diganti
    $site_url = "http://10.151.36.63/";


    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $tw = $_POST["w"];
        $th = $_POST["h"];
        $convert_type = $_POST["convert_type"];
        $check = getimagesize($_FILES["gambar"]["tmp_name"]);
        $color_depth = $_POST["color_depth"];

        $file_tmp = $_FILES["gambar"]["tmp_name"];
        if($check !== false) {
            move_uploaded_file($file_tmp, $target_file);

            $image = new Imagick($target_file);
            $image->resizeImage($tw,$th, imagick::STYLE_NORMAL, 0);
            $image->setImageFormat($convert_type);
            $image->setImageDepth($color_depth);
            $image->writeImage($target_file_res.".png");
            $uploadOk = 1;

            echo $site_url.$target_file_res.".png";
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
