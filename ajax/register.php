<?php

    // Allow the config
    define('__CONFIG__', true);
    require_once "../inc/config.php";

    if($_SERVER["REQUEST_METHOD"] == "POST" or 1==1) {
        // Return json format
        //header("Content-Type: application/json");

        $return = [];

        $email = Filter::String($_POST["email"]);

        // Make sure the user does NOT exist
        $findUser = $con->prepare("SELECT user_id FROM users WHERE email = LOWER(:email) LIMIT 1");
        $findUser->bindParam(":email", $email, PDO::PARAM_STR);
        $findUser->execute();

        if($findUser->rowCount() == 1) {
            // User exists
            $return["error"] = "You already have an account";
            $return["is_logged_in"] = false;
        }
        else {
            // User does not exist. Add
            $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

            $addUser = $con->prepare("INSERT INTO users(email, password) VALUES(LOWER(:email), :password)");
            $addUser->bindParam(":email", $email, PDO::PARAM_STR);
            $addUser->bindParam(":password", $password, PDO::PARAM_STR);
            $addUser->execute();

            $user_id = $con->lastInsertId();
            $_SESSION["user_id"] = (int) $user_id;

            $return["redirect"] = "/PHP%20login/dashboard.php?message=welcome";
            $return["is_logged_in"] = true;
        }

        echo json_encode($return, JSON_PRETTY_PRINT);
        exit();
    }
    else {
        exit("Invalid URL");
    }
    ?>