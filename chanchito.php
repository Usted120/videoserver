<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    require("connection.php");
    $conexion = mysqli_connect($db_host, $db_usuario, $db_contrasena, $db_nombre);

    if (mysqli_connect_errno()) {
        echo "fallo al conectar con la base de datos";
        exit();
    }


    $path = "./videos/";
    $open = opendir($path);
    $content = readdir($open);

    while (false !== ($entrada = readdir($gestor))) {
        if ($entrada != '.') {
            echo "<a href=\"$path/$entrada\">$entrada</a>\n";

            $query = mysqli_query($conexion, "SELECT * FROM `pruebas` WHERE url = '$path$entrada'");
            $rows = mysqli_num_rows($query);
            if ($rows == 0) {

                $consulta = "INSERT INTO `pruebas` (`url`) VALUES ('$path$entrada')";

                mysqli_query($conexion, $consulta) or die("fuckted bro");
            };
        }
    }
    closedir($path);


    ?>
</body>

</html>