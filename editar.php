<?php
    include("maestro.php");
    $muñeco=new maestro();

    if(isset($_POST['but'])){
        $nombre=$_POST['pro'];
        $marca=$_POST['mar'];
        $precio=$_POST['pre'];
        $imag=$_POST['ima'];
        $descrip=$_POST['texAr'];

        $id=$_GET['id'];
        $SQL="UPDATE productos SET nomPro='$nombre' ,marPro='$marca' ,precio='$precio' ,foto='$imag' ,descripción='$descrip'  WHERE IDpro='$id'";
        $muñeco->ediTa($SQL);

        header("location:productos.php");
    }
?>