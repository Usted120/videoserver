<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Le chat dashboard</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
</head>
<body>
    <div class="contenedor">
        <button id="syncBtn">sync movies</button>
        <div class="container gridMovies" id="moviesAdm">
            <h2>Editar</h2>
        <?php
        
        #importa connection
        require("connection.php");
        $conexion = mysqli_connect($db_host, $db_usuario, $db_contrasena);
        if (mysqli_connect_errno()) {
            echo "fallo al conectar con la base de datos";
            exit();
        }
        mysqli_select_db($conexion, $db_nombre) or die("no se encuentra la base de datos");
        mysqli_set_charset($conexion, "utf8");
        #definir la consulta
        $consulta = "select r.id, r.title, r.synopsis,r.url, r.duration, g.name as genre, y.year from resource r left join genre g on r.genre = g.id left join year y on r.year = y.id";
        #resultado de la consulta se almacena
        $resultados = mysqli_query($conexion, $consulta);
        #mientras que fila se define como una consulta que devuelve un array
        while ($fila = mysqli_fetch_array($resultados)) {
            #se asigna nombre a la parte de la consulta que contiene'nombre'
            $id = $fila['id'];
            $nombre = $fila['title'];
            $sinopsis = $fila['synopsis'];
            $url = $fila['url'];
            $duration = $fila['duration'];
            $genre = $fila['genre'];
            $year = $fila['year'];
            $urlFile = substr(strrchr($url,"/"),1);
            echo "
                    <div class=\"flex gridMoviesCard\">
                    
                        <img class=\"showForm\" src=\"resources/arrow-down-solid.svg\" width=\"20px\" height=\"20px\">
                        <p>title: $nombre</p>
                        <p>location: $url</p>
                        
                        <form action=\"update.php\" method=\"post\">
                        
                        <input type=\"hidden\" name=\"id\" value=\"$id\">
                        
                        <label for=\"title\"> <p>title</p> <input type=\"text\" name=\"title\" id=\"title\" value=\"$nombre\" placeholder=\"$nombre\"></label>
                        
                        <label for=\"url\"> <p>url</p> <input type=\"text\" name=\"url\" id=\"url\" placeholder=\"$url\" value=\"$url\"></label>
                        
                        <label for=\"sinopsis\"> <p>sinopsis</p> <input type=\"text\" name=\"sinopsis\" id=\"sinopsis\" placeholder=\"$sinopsis\" value=\"$sinopsis\"></label>
                        
                        <label for=\"genre\"> <p>genre</p> <input type=\"text\" name=\"genre\" id=\"genre\" placeholder=\"$genre\" value=\"$genre\"></label>
                        
                        <label for=\"year\"> <p>year</p> <input type=\"text\" name=\"year\" id=\"year\" placeholder=\"$year\" value=\"$year\"></label>
                        
                        <label for=\"duration\"> <p>duration</p> <input type=\"time\" name=\"duration\" id=\"duration\" placeholder=\"$duration\" value=\"$duration\"></label>
                    
                        <button class=\"submit\" type=\"submit\"><p>actualizar</p></button>
                    
                        </form>
                    </div>
                ";
        }
        
        echo "<h2>Añadir</h2>";

        $movieDir = './resources/media/';
        if (is_dir($movieDir)){
            if ($dir = opendir($movieDir)){
                while (($file = readdir($dir)) !== false){
                    if ($file != "." && $file != ".."){
                        if($file != $urlFile){
                        echo "
                        <div class=\"flex gridMoviesCard\">
                        file name: $file
                        </div>
                        " ;
                     }
                    }
                }
                closedir();
            }
        }
        ?>
        
        </div>        
        <?php
        echo "
        <script type= \" text/javascript \">
            const testBtn = document.getElementById(\"updateMovies\");
            testBtn.onclick = () => {location.reload();};
            
            const moviesAdm = document.getElementById(\"moviesAdm\");
        </script>"
        ?>
</body>
</html>