<?php
require_once("dbutils.php");

$miConex = conectarDB();

var_export($miConex);

$aCoches = realizarQuery($miConex,"SELECT * FROM COCHES",null,true);

var_export($aCoches);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Coches</title>
</head>
<body>
    <div class="container mt-3">
  <h2>COCHES</h2>
  <p>Todos los coches:</p>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Modelo</th>
        <th>Marca</th>
        <th>CVs</th>
      </tr>
    </thead>
    <tbody>
            <?php
                foreach ($aCoches as $filaI)
                {
                    echo '<tr>';
                    echo '<td>'.$filaI["NOMBRE"].'</td>';
                    echo '<td>'.$filaI["MARCA"].'</td>';
                    echo '<td>'.$filaI["CV"].'</td>';
                    echo '</tr>';
                }
            ?>
    </tbody>
  </table>
</div>
</body>
</html>