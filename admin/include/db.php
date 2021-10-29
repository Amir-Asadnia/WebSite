<?php
session_start();
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING];
const DBNAME = 'weblog';
const DBUSER = 'root';
const DBPASS = '';
$connect = new PDO('mysql:host=localhost;dbname=' . DBNAME, DBUSER, DBPASS, $options);

?>