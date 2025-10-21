<?php

var_export($_POST);

echo $_POST['nombre1'];
echo $_POST['pass1'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php if ($_POST['nombre1']=="alberto" && $_POST["pass1"]=="69") { ?>

    <script>alert("SOPLAGAITAS");</script>

    <?php } ?>

   <?php
   if ($_POST['nombre1']=="alberto" && $_POST["pass1"]=="69") 
    {
        echo '<script>alert("SOPLAGAITAS");</script>';
    }
    ?>
    <h1>Bienvenido <?php echo $_POST['nombre1']?></h1>
    <img src="<?php echo $_POST['mi_ruta']?>" alt="hola">
    <form action="P0201.php" method="post">
        Número:<input type="number" name="numero">
        <input type="submit" value="SumaUno!">
    </form>
</body>
</html>