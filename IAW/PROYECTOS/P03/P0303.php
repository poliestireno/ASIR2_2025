<?php

require_once("dbutils.php");

$argumentos = array(
    ":NOMBRE"=> $_POST["NOMBRE"],
    ":MARCA"=> $_POST["MARCA"],
    ":CV"=> $_POST["CV"],
);
$miConexion = conectarDB();
if ($_POST["BOTON"]=="INSERTAR")
{
    $query ="INSERT INTO COCHES (NOMBRE,MARCA,CV) VALUES (:NOMBRE,:MARCA,:CV)";
    realizarQuery($miConexion,$query,$argumentos,false);
}
else if ($_POST["BOTON"]=="UPDATE POR NOMBRE")
{
    $argumentos se mete esto= array(
    ":NOMBRE"=> $_POST["NOMBRE"],
    ":CV"=> $_POST["CV"],
);
    $query ="UPDATE COCHES SET CV=:CV WHERE NOMBRE=:NOMBRE";
    realizarQuery($miConexion,$query,$argumentos,false);
}


echo "PROCESO TERMINADO";
?>
