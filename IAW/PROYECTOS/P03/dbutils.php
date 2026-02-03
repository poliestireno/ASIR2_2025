<?php
function conectarDB()
{
    $db = new PDO("mysql:host=localhost;dbname=BD_POLIZIA","root","");
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    return $db;
}
function realizarQuery($conexion, $texto,$argumentos=null, $isfetch=false)
{
    $comando = $conexion->prepare($texto);
    $comando->execute($argumentos);
    if ($isfetch) return $comando->fetchAll();
}
?>