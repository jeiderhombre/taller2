<?php
    include("maestro.php");
   
    if(isset($_POST['but'])){
        
        $nombre=$_POST['pro'];
        $marca=$_POST['mar'];
        $precio=$_POST['pre'];
        $imag=$_POST['ima'];
        $descrip=$_POST['texAr'];
        $muñeco=new maestro();
        $SQL="INSERT INTO productos( nomPro, marPro, precio, foto, descripción) VALUES ('$nombre','$marca','$precio','$imag','$descrip')";

        
        $muñeco->guardar($SQL);
        print_r($_POST);
        header("location:ingresar.html");
    }
?>