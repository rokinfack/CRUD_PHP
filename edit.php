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

    if($result){
        if(!empty($_POST['name']) && !empty($_POST['price']) && !empty($_POST['stock'])){

    
            $name=strip_tags($_POST['name']);
            $price=strip_tags($_POST['price']);
            $stock=strip_tags($_POST['stock']);
        
            $sql='UPDATE articles SET name=:name,prices=:price,stock=:stock WHERE id=:id';
            
            $request=$db->prepare($sql);

            $request->bindValue(':id',$id,PDO::PARAM_INT);

            $request->bindValue(':name',$name,PDO::PARAM_STR);
        
            $request->bindValue(':price',$price,PDO::PARAM_INT);
        
            $request->bindValue(':stock',$stock,PDO::PARAM_INT);
        
            $request->execute();

            
            header('location:index.php');

            $_SESSION['message']="Bravo!! votre article est bien modifié";


        }
   
    }else{

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
    <title>Edition</title>
</head>
<body>
    <main class="contenaire m-5">
        <div class="col-md-12 mt-3">
            <h1>Edition de l'article <?= $result['name'] ?></h1>
            <div class="col-md-5">
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" value="<?= $result['name'] ?>" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="price">Prices</label>
                        <input type="number" id="price" name="price" value="<?= $result['prices'] ?>"class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="stock">Stock</label>
                        <input type="number" id="stock" name="stock" value="<?= $result['stock'] ?>" class="form-control"/>
                    </div>
                    <div class="form-group mt-3">

                        <button class="btn btn-primary ">Edit</button>
                
                        <a href="index.php" class="btn btn-danger">Back</a>
                        

                    </div>
                </form>
            </div>
            
        </div>
    </main>
    
</body>
</html>