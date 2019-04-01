<?php
$host       = "localhost";
$username   = "my_app";
$password   = "secret";
$dbname     = "my_app";
$dsn        = "mysql:host=$host;dbname=$dbname";
$options    = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
              );