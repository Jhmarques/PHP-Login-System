<?php
    if(!defined('__CONFIG__')) {
        exit('You do not have a config file');
    }

    // Include DB.php file
    include_once "classes/DB.php";
    include_once "classes/Filter.php";

    $con = DB::getConnection();
    ?>
