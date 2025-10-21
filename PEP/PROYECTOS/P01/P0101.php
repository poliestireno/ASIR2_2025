<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>ENHORABUENA</h1>
    <h2> de la </h2>
    <h3><?php

        $n = rand(1,2);
        if ($n==1)
        {
            echo 'mala';
        }
        else
        {
            echo 'buena';
        }
     ?></h3>
     <h4>pero</h4>
     <h5>
        <?php
            if ($n==1)
            {
                echo 'nada';
            }
            else
            {
                echo 'todo';
            }
        ?>
        </h5>

       <img>
       <?php
       $foto = rand(0,2);
       if ($foto == 0){
        $sinson = 'amarilloFondo.jpg';
       }
       else if ($foto == 1){
        $sinson = 'naranjaFondo.jpg';
       }
       else {
        $sinson = 'verdeFondo.jpg';
       }
       ?>
       <img src = <?php echo $sinson;?>
       >
</body>
</html>