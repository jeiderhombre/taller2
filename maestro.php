<?php
    class maestro{
        //conecion usuario
        public $usuario="root";
        public $clave="";

        //constructor
        public function __construct(){}

        public function conecTa(){
            try {
                //conecion 
                $info="mysql:host=localhost;dbname=mitiendaweb";
                $coneBD=new PDO($info, $this->usuario, $this->clave);
                return $coneBD;
            } catch (PDOException $error){
                echo($error->getMessage());
            }
        } 
        public function guardar($SQL){
            //guardamos los datos
            $coneBD= $this->conecTa();
            $guarda= $coneBD->prepare($SQL);
            $resultado=$guarda->execute();
            if($resultado){
                echo("exito agregando datos");
            }else{
                echo("error");
            }
        }
        public function consultar($SQL){
            //consultar base de datos
            $coneBD= $this->conecTa();
            $coneTa= $coneBD->prepare($SQL);
            $coneTa->setFetchMode(PDO::FETCH_ASSOC);
            $coneTa->execute();
            return($coneTa->fetchAll());
        }
        public function ediTa($SQL){
            //editar 
            $coneBD= $this->conecTa();
            $edita= $coneBD->prepare($SQL);
            $resultado =$edita->execute();
            if($resultado){
                echo("exito editando datos");
            }else{
                echo("error");
            }
        }
        public function borrar($SQL){
             //editar 
             $coneBD=$this->conecTa();
             $borrando= $coneBD->prepare($SQL);
             $resultado =$borrando->execute();
             if($resultado){
                 echo("exito editando datos");
             }else{
                 echo("error");
             }
        }
    }
?>