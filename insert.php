<?php
/**
 * Created by PhpStorm.
 * User: tony
 * Date: 16/07/18
 * Time: 17:28
 */

include "connect.php";

$query = "INSERT INTO entries (user, comment, date_posted) VALUES (";
$query .= '"' . $_POST ['user'] . '",' . '"' . $_POST ['comment'] . '",';
$query .= "now())";

try {
    $connection -> exec ($query);
}
catch (PDOException $e) {
    echo $query . "<br/>"  . $e -> getMessage ();
}

$connection = null;

header ('Location: ' . $_SERVER ['HTTP_REFERER']);