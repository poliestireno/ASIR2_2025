<?php
    var_export($_POST);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="P0202.php" method="post">
    <div>
        Nombre:<input type="text" name="nombre1">
    </div>
    <div>
    Password:<input type="password" name="pass1">
    </div>
    <div>
    Ruta:<input type="text" name="mi_ruta">
    </div>
    <input type="submit" value="Dame!">
</form>
    <input type="number" value="<?php echo $_POST['numero'] + 1 ?>">
</body>
</html>