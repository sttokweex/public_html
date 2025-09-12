<?php

$server = "localhost";
$login = 'root';
$pass = 'MADBREAK1';
$name = 'asino777';

$connection = mysqli_connect($server, $login, $pass)
  or die();

mysqli_select_db($connection, $name)
  or die();

mysqli_query($connection, "SET NAMES utf8");
