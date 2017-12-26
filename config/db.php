<?php 

$dsn = 'mysql:host='. DB_HOST.';dbname='.DB_NAME;


$pdo = new PDO($dsn, DB_USER, DB_PASS);

$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);