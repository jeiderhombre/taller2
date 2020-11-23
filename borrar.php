<?php
    include("maestro.php");
    $muñeco= new maestro();

    $id=$_GET['id'];
    $SQL="DELETE FROM productos WHERE IDpro='$id'";
    
    $muñeco->borrar($SQL);
    header("location:productos.php");
?>