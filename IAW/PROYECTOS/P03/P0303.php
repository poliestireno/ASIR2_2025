<?php

require_once("dbutils.php");

$argumentos = array(
    ":NOMBRE"=> $_POST["NOMBRE"],
    ":MARCA"=> $_POST["MARCA"],
    ":CV"=> $_POST["CV"],
);
$argumentosUpdate = array(
":NOMBRE"=> $_POST["NOMBRE"],
":CV"=> $_POST["CV"],
);
$argumentosUpdateDelete = array(
":NOMBRE"=> $_POST["NOMBRE"],
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
    $query ="UPDATE COCHES SET CV=:CV WHERE NOMBRE=:NOMBRE";
    realizarQuery($miConexion,$query,$argumentosUpdate,false);
}
//borrar en función de nombre y CV
else if ($_POST["BOTON"]=="DELETE POR NOMBRE Y CV")
{
    $query ="DELETE FROM COCHES WHERE CV=:CV AND NOMBRE=:NOMBRE";
    realizarQuery($miConexion,$query,$argumentosUpdateDelete,false);
}

echo "PROCESO TERMINADO";
?>
