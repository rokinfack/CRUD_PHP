<?php session_start();

require_once("database/connexion.php");
if(!empty($_POST['name']) && !empty($_POST['price']) && !empty($_POST['stock'])){
    $name=strip_tags($_POST['name']);
    $price=strip_tags($_POST['price']);
    $stock=strip_tags($_POST['stock']);

    $sql='INSERT INTO articles(name,prices,stock)values(:name ,:price ,:stock)';

    $request=$db->prepare($sql);
    $request->bindValue(':name',$name,PDO::PARAM_STR);

    $request->bindValue(':price',$price,PDO::PARAM_INT);

    $request->bindValue(':stock',$stock,PDO::PARAM_INT);

    $request->execute();

    $_SESSION['message']="vous venez d'ajouter un article,merci pour";
    header('location:index.php');

}else{
    $_SESSION["message"]='veillez renseiller tous les champs!';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>creation</title>
</head>
<body>
    <main class="contenaire m-5">
        <div class="col-md-12 mt-3">
            <h1>creation d'un article</h1>
            <div class="col-md-5">
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="price">Prices</label>
                        <input type="number" id="price" name="price" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="stock">Stock</label>
                        <input type="number" id="stock" name="stock" class="form-control"/>
                    </div>
                    <div class="form-group mt-3">

                        <button class="btn btn-primary ">Create</button>
                
                        <a href="index.php" class="btn btn-danger">Back</a>
                        

                    </div>
                </form>
            </div>
            
        </div>
    </main>
    
</body>
</html>