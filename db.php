<?php
$config = require __DIR__ . '/config.php';


$dsn = "mysql:host={$config['db']['host']};dbname={$config['db']['name']};charset=utf8mb4";
$db = new PDO($dsn, $config['db']['user'], $config['db']['pass']);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);