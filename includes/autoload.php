<?php 

spl_autoload_register("autoload");

function autoload($className)
{
    $path     = "classes/";
    $ext      = ".php";
    $fileName = $path . $className . $ext;
    // print_r($fileName);
    // die();

    if (!file_exists($fileName)) {
        return false;
    }

    include_once $fileName;

}

?>