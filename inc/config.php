<?php
    if(!defined('__CONFIG__')) {
        exit('You do not have a config file');
    }

    // Sessions are always turned on
    if(!isset($_SESSION)) {
        session_start();
    }

    // Allow errors
    error_reporting(-1);
    ini_set("display_errors", "On");

    // Include files
    include_once "classes/DB.php";
    include_once "classes/Filter.php";
    include_once "functions.php";

    $con = DB::getConnection();
    ?>
