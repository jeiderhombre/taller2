<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/ext.css">
</head>

<body>

    <head class="justify-content-center">
        <div class="container-fluid row justify-content-center">
            <nav class="navbar navbar-expand-md navbar-light col13" style="background-color:  rgba(236, 252, 6, 0.342);">
                <a class="navbar-brand text-white" href="#"><img width="40" height="40" class="rounded-5 d-inline-block align-top disabled" alt="" loading="lazy" src="img/tienWed.png"></img> TiendaWed</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item" style="text-shadow:1px 1px 2px rgb(180, 35, 35);">
                            <a class="nav-link text-warning" href="index.html" style="text-shadow:1px 1.5px 3px rgb(0, 0, 0); "><i class="fa fa-home text-white" aria-hidden="true"></i>  Pricipal</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-warning" href="ingresar.html" style="text-shadow:1px 1.5px 3px rgb(0, 0, 0); "><i class="fa fa-pencil-square-o text-white" aria-hidden="true"></i>  Ingresar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white active disabled" href="productos.html" style="text-shadow:1px 1.5px 3px rgb(0, 0, 0);; "><i class="fa fa-gavel text-white" aria-hidden="true"></i> Productos</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div>
            <marquee style="color:rgb(128, 0, 0); text-shadow:5px 5px 5px rgb(255, 174, 0) ;" BEHAVIOR=alternate><img src="img/tienWed.png" width="20"> esta es mi tienda web<img src="img/tienWed.png" width="20"></marquee>
        </div>
    </head>
    <?php include("maestro.php");
    $muñeco=new maestro();
    $SQL="SELECT * FROM productos WHERE 1";
    //CREAR EL AREGLO CONTENEDOR
    $PRODUCTOS=$muñeco->consultar($SQL);
?>
    <main class="align-content-center">
        
        <div class="container-fluid align-content-center">
            <h5 class="text-center">productos</h5>
            <div class="row">
                <?php foreach($PRODUCTOS as $PRODUCTOS):?>
                    <div class="col-12 col-md-3 col-xl-2 card align-content-center col11" style="width: 18rem; background-color: rgba(255, 254, 254, 0.322);">
                        <div class="align-content-center">
                            <img src="<?php echo($PRODUCTOS["foto"])?>" style="width: 11rem;" class="card-img-top" alt="producto">
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title"><?php echo($PRODUCTOS['nomPro']);?></h5>
                            <p class="card-text justify-content-center">DESCRIPCION<br><?php echo($PRODUCTOS['descripción']);?></p>
                        </div>
                            <div>
                                <pre>Marca: <?php echo($PRODUCTOS['marPro']);?> </pre>
                            </div>
                            <div>
                                <pre>Precio: <?php echo($PRODUCTOS['precio']);?></pre>
                            </div>
                        
                        <div class="card-body">
                            <a href="borrar.php?id=<?php echo($PRODUCTOS['IDpro']);?>" name="borra" class="card-link" style="color:rgb(0, 0, 0); text-shadow:5px 5px 5px rgb(255, 255, 255);">Borrar</a>
                            <a href="#" name="edit" class="card-link" data-toggle="modal" data-target="#editar<?php echo($PRODUCTOS['IDpro'])?>" style="color:rgb(0, 0, 0); text-shadow:5px 5px 5px rgb(255, 255, 255);">Editar</a>
                            <!-- modal-->
                            <div class="modal fade" id="editar<?php echo($PRODUCTOS['IDpro'])?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Editar Producto</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="editar.php?id=<?php echo($PRODUCTOS['IDpro'])?>" method="POST">
                                            <div class="modal-body">
                                            
                                                <div class="row card-group justify-content-center">
                                                    <div class=" col-md-6 text-center form-group">
                                                        <label>Editar Nombre Producto</label></br>
                                                        <div class="input-group has-feedback has-feedback">
                                                            <i class="fa fa-cubes input-group-prepend input-group-text bg-white"></i>
                                                            <input name="pro" class="form-control " type="text " placeholder="nombre aqui " required value="<?php echo($PRODUCTOS['nomPro']);?>">
                                                        </div>
                                                    </div>
                                                    <div class=" col-md-6 text-center form-group has-feedback ">
                                                        <label>Editar Marca Producto</label></br>
                                                        <div class="input-group ">
                                                            <i class="fa fa-pencil input-group-prepend input-group-text bg-white"></i>
                                                            <input name="mar" type="text " class="form-control " placeholder="marca aqui " required value="<?php echo($PRODUCTOS['marPro']);?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row card-group justify-content-center">
                                                    <div class=" col-md-6 text-center form-group has-feedback">
                                                        <label>Editar Precio Producto</label></br>
                                                        <div class="input-group ">
                                                            <i class="fa fa-money input-group-prepend input-group-text bg-white" aria-hidden="true"></i>
                                                            <input name="pre" type="number" class="form-control " placeholder="precio aqui" required value="<?php echo($PRODUCTOS['precio']);?>">
                                                        </div>
                                                    </div>
                                                    <div class=" col-md-6 text-center form-group has-feedback">
                                                        <label>Editar URL Imagen</label>
                                                        <div class="input-group">
                                                            <i class="fa fa-file-image-o input-group-prepend input-group-text bg-white" aria-hidden="true"></i>
                                                            <input name="ima" type="text" class="form-control" placeholder="URL aqui" required value="<?php echo($PRODUCTOS["foto"])?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class=" row form-group justify-content-center">
                                                    <div class="col-12 text-center form-group has-feedback">
                                                        <label>Editar Descripsion Producto</label><br>
                                                        <textarea name="texAr" type="text " class="form-control " rows="3 " placeholder="descripcion aqui "><?php echo($PRODUCTOS['descripción']);?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" name="but" class="btn btn-warning">Editar</button>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                <?php endforeach?>
            </div>
        </div>
    </main>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

</html>