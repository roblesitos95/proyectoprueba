<?php
/**
 * Created by PhpStorm.
 * User: RBTEXCTUTA43
 * Date: 09/05/2018
 * Time: 08:14 AM
 */

if(!empty($_GET['accion'])){
    comunicacion::main($_GET['accion']);
}else{
    echo "No se encontro ninguna accion...";
}

class comunicacion
{

    static function main($action){
        if ($action == "login"){
            comunicacion::inicio();
        }elseif ($action=="logout"){
            comunicacion::fin();
        }elseif ($action=="registrar"){
            comunicacion::registrar();
        }
    }

    private static function inicio()
    {

        session_start();
        $name=$_POST["usuario"];
        $_SESSION["usuario"]=$name;
     if (!empty($_SESSION["usuario"])){
            header("Location:index.php");
        }else{
        echo "hola";
        }
    }

    private static function fin()
    {
        session_start();
        session_unset();
        session_destroy();

        header('Location:login.php');
    }
}