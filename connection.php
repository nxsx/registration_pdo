<?php

$db_host = "localhost";
$db_user = "root";
$db_password = "nopassword";
$db_name = "registration_pdo";

try {
    $db = new PDO("mysql:host={$db_host};dbname={$db_name}", $db_user, $db_password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo $e->getMessage();
}

?>