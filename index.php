<?php
session_start();
require_once("database/connexion.php");

$sql='SELECT * FROM articles';

$data=$db->prepare($sql);

$data->execute();

$articles=$data->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Document</title>
</head>
<body>
    <div class="contenaire m-5">
        <div class="row">
            <section class="col-md mt-5">
                <?php
                    if($_SESSION['message']){
                        ?>
                        <div class="alert">
                            <p class="alert alert-success">
                                <?php 
                                echo $_SESSION['message'] ;
                                 $_SESSION['message']=""; 
                                 ?>
                            </p>
                        </div>
                        
                   <?php 
                         }
                    ?>
                <h1>liste des articles</h1>
            <a href="create.php" class="btn btn-primary mt-3 ">Ajouter un article</a>
            <table class="table mt-3">
                <thead>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                    <?php foreach($articles as $article){?>
                    <tr>
                        <td><?= $article['id'] ?></td>
                        <td><?= $article['name'] ?></td>
                        <td><?= $article['prices'] ?></td>
                        <td><?= $article['stock'] ?></td>
                        <td>
                            <a href="show.php?id=<?= $article['id'] ?>" class='text-blue' >Voir</a>
                            <a href="edit.php?id=<?= $article['id'] ?>" class="text-success">Edite</a>
                            <a href="delete.php?id=<?= $article['id'] ?>" class="text-danger" >Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
             </section>
        </div>
    </div>
    
</body>
</html>