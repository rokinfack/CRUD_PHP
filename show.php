<?php 
session_start();

require_once("database/connexion.php");

if($_GET['id'] && !empty($_GET['id'])){

    $id=strip_tags($_GET['id']);

    $sql="SELECT * FROM articles WHERE id=:id";

    $data=$db->prepare($sql);

    $data->bindValue(":id",$id,PDO::PARAM_INT);

    $data->execute();

    $result=$data->fetch();

    if(!$result){
    header('location:index.php');

        $_SESSION['message']="artcicle not found!";
    }


}else{
    header('location:index.php');

    $_SESSION['message']="désolé vous n'avez pas d'autorisation d'y acceder!";
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>show article<?= $result['name'] ?></title>
</head>
<body>
    <div class="contenaire m-3">
        <div class="col-md-12 mt-5">
            <h1>Article N°<?= $result['id'] ?> <?= $result['name'] ?> <h1>

            <h3>Name:<?= $result['name'] ?></h3>


            <h3>Price=<?= $result['prices'] ?> Euro</h3>

            <h3>stock=<?= $result['stock'] ?></h3>

            <a href=index.php class="btn btn-danger">Acceuil</a>

        </div>
    </div>
    
</body>
</html>