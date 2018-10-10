<?php
/**
 * Created by PhpStorm.
 * User: tony
 * Date: 16/07/18
 * Time: 17:28
 */

include "connect.php";

$query = "UPDATE entries SET ";
$query .= "user = \"" . $_POST ['user'] . "\", ";
$query .= "comment = \"" . $_POST ['comment'] . "\" ";
$query .= "WHERE id=" . $_POST ['id'];

try {
    $connection -> exec ($query);
}
catch (PDOException $e) {
    echo $query . "<br/>"  . $e -> getMessage ();
}

$connection = null;

header ('Location: index.php');