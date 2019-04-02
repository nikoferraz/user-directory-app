<?php
require "config/db_config.php";
try {
    $connection = new PDO("mysql:host=$host", $username, $password, $options);
    $sql = file_get_contents("config/init.sql");
    $connection->exec($sql);
    echo "The database and user table were created successfully.";
} catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
}
