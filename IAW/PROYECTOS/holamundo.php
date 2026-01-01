<?php

// echo 'Hola Mundo';
// echo " y tambien a vosotros";


$miNumero = rand(0,1);

if ($miNumero==0)
{
    echo "CARA";
}
else 
{
    echo "CRUZ";
}

// DADO DE 5 CARAS Y 1 CRUZ

$miNumero = rand(0,5);

if ($miNumero==0)
{
    echo "CRUZ";
}
else 
{
    echo "CARA";
}


?>

<?php
// 1️⃣ Iniciar la sesión
session_start();

// 2️⃣ Guardar un dato en la variable de sesión
$_SESSION["usuario"] = "Alberto";

// 3️⃣ Mostrar la información de sesión
echo "<h2>Ejemplo de sesión PHP normal</h2>";
echo "<p>ID de sesión: <strong>" . session_id() . "</strong></p>";
echo "<p>Usuario en la sesión: <strong>" . $_SESSION["usuario"] . "</strong></p>";
echo "<p>Recarga la página y observa que el ID no cambia.</p>";
?>
