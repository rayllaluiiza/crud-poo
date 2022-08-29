<?php

$dbname = 'poo';
$host = 'localhost';
$user = 'root';
$senha = '';

$pdo = new PDO("mysql:dbname=$dbname;host=$host", $user, $senha);
