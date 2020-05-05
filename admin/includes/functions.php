<?php
    function classAutoLoader($class) {
        $class = strtolower($class);
        $path = "includes/{$class}.php";
        if (is_file($path)) {
            if (file_exists($path) && !class_exists($class)) {
                include($path);
            } else {
                die("This file name {$class}.php was not found.");
            }
        }
    }
    spl_autoload_register('classAutoLoader');

    function redirect($location) {
        header("Location:{$location}");
    }
?>
