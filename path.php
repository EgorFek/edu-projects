<?php
function path_to_interface($path)
{
    //Получение расширения файла 
    $exp = explode('.', $path);
    $exp = $exp[count($exp) - 1];
    switch ($exp) {
        case "mp4":
            echo "<video src='$path' controls>$path</video>";
            break;
        case "mp3":
            echo "<audio src='$path' controls>$path</audio>";
            break;
        default:
            echo "<a href='$path' download>$path</a>";
            break;
    }
}
