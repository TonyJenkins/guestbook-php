<?php
/**
 * Created by PhpStorm.
 * User: tony
 * Date: 16/07/18
 * Time: 12:07
 */

    $server = "mysql";
    $username = "guestbook_user";
    $password = "guestbook_password";
    $database = "guestbook";

    try {

        $connection = new PDO ("mysql:host=$server;dbname=$database", $username, $password);

        $connection -> setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }
    catch (PDOException $e) {
        echo "Connection failed: " . $e -> getMessage ();
    }

    ?>