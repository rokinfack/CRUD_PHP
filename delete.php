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

        $id=strip_tags($_GET['id']);

        $sql="DELETE FROM articles WHERE id=:id";

        $data=$db->prepare($sql);

        $data->bindValue(':id',$id,PDO::PARAM_INT);

        $data->execute();

        header('location:index.php');

        $_SESSION['message']="votre article a bien été supprimé";
    }else{

        header('location:index.php');

        $_SESSION['message']="artcicle not found!";
    }


}else{
    header('location:index.php');

    $_SESSION['message']="désolé vous n'avez pas d'autorisation d'y acceder!";
}
?>