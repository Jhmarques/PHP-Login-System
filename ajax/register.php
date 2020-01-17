<?php

    // Allow the config
    define('__CONFIG__', true);
    require_once "../inc/config.php";

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        // Return json format
        header("Content-Type: application/json");

        $return = [];

        $return["redirect"] = "/PHP%20login/dashboard.php";
        $return["name"] = "João Marques";

        echo json_encode($return, JSON_PRETTY_PRINT);
        exit();
    }
    else {
        exit("test");
    }
    ?>