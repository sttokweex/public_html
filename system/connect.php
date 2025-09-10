<?php

$server = getenv('DB_HOST');
$login = getenv('DB_USER');
$pass = getenv('DB_PASSWORD');
$name = getenv('DB_NAME');

$connection = mysqli_connect($server, $login, $pass)
  or die();

mysqli_select_db($connection, $name)
  or die();

mysqli_query($connection, "SET NAMES utf8");
