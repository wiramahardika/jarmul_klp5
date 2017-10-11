<?php
    error_reporting(E_ALL | E_STRICT);
    ini_set('display_errors', 'On');

    $target_dir = "uploads/";
    $target_dir_res = "audiores/";
    $allowtype = array('wav', 'mp3');
    $max_size = 30000;

    $target_file = $target_dir . basename($_FILES["audio"]["name"]);
    $target_file_res = $target_dir_res . basename($_FILES["audio"]["name"]);
    // Jangan lupa diganti
    $site_url = "http://10.151.36.63/";


    $uploadOk = 1;

    function convertaudio($input_file, $target_dir_res, $sample, $bitrate, $channel, $type)
    {
        $output_file = getcwd() . "/" . $target_dir_res . pathinfo($input_file, PATHINFO_FILENAME) . "." . $type;
        $input_file = getcwd() . "/" . $input_file;
        $a = "ffmpeg -i $input_file -ar $sample -b:v $bitrate -b:a $bitrate -ac $channel $output_file -y 2>&1";

//        echo $a.'\n';

        $res = shell_exec($a);

        return $target_dir_res . pathinfo($output_file, PATHINFO_FILENAME) . "." . $type;
    }

    if(isset($_POST["submit"])) {

        $file_tmp = $_FILES["audio"]["tmp_name"];
        if(true) {
            move_uploaded_file($file_tmp, $target_file);

            $uploadOk = 1;
            $res = convertaudio($target_file, $target_dir_res, $_POST["sample"], $_POST["bitrate"], $_POST["channel"], $_POST["convert_type"]);
            echo $site_url.$res;
        } else {
            echo "Error";
            $uploadOk = 0;
        }
    }
