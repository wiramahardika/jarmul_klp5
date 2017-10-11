<?php
    error_reporting(E_ALL | E_STRICT);
    ini_set('display_errors', 'On');

    $target_dir = "uploads/";
    $target_dir_res = "videores/";

    $target_file = $target_dir . str_replace(' ','_',basename($_FILES["video"]["name"]));
    $target_file_res = $target_dir_res . str_replace(' ','_',basename($_FILES["video"]["name"]));
    // Jangan lupa diganti
    $site_url = "http://10.151.36.63/";


    $uploadOk = 1;

    function convertvideo($input_file, $target_dir_res, $sample, $bitrate, $channel, $type, $w, $h, $aspect_ratio, $frame_rate)
    {
        $output_file = getcwd() . "/" . $target_dir_res . pathinfo($input_file, PATHINFO_FILENAME) . "." . $type;
        $input_file = getcwd() . "/" . $input_file;

        if($aspect_ratio == '1')
        {
            $a = "ffmpeg -i $input_file -ar $sample -b:v $bitrate -b:a $bitrate -ac $channel -r $frame_rate -vf scale=$w:-1 $output_file -y 2>&1";
        }
        else
        {
            $a = "ffmpeg -i $input_file -ar $sample -b:v $bitrate -b:a $bitrate -ac $channel -r $frame_rate -vf scale=$w:$h $output_file -y 2>&1";
        }

//        echo $a;

        $res = shell_exec($a);

        return $target_dir_res . pathinfo($output_file, PATHINFO_FILENAME) . "." . $type;
    }

    if(isset($_POST["submit"])) {

        $file_tmp = $_FILES["video"]["tmp_name"];
        if(true) {
            move_uploaded_file($file_tmp, $target_file);

            $uploadOk = 1;
            $res = convertvideo($target_file, $target_dir_res, $_POST["sample"], $_POST["bitrate"], $_POST["channel"], $_POST["convert_type"], $_POST["w"], $_POST["h"], $_POST["aspect_ratio"], $_POST["frame_rate"]);
            echo $site_url.$res;
        } else {
            echo "Error";
            $uploadOk = 0;
        }
    }
