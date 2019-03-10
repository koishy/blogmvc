<?php 

function f_autoload()
{
    foreach (require("autoload_paths.php") as $key) {
        require $_SERVER['DOCUMENT_ROOT'].$key;
    }
}