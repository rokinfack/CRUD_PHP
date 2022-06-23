<?php
try {
$db=new PDO("mysql:host=localhost;dbname=formation_php;port=3307;charset=utf8","root","root");
} catch (PDOException $ex) {
    echo "erreur".$e->getMessage();
    die();
}