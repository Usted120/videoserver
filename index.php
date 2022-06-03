<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="style.css" />
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<title>Le Chat Noir | Home</title>
	
</head>
<body>
	<div class="contenedor"></div>
	<header>
		<nav class="flex nav">
			<a class="logo" href="">Le Chat Noir</a>
			<ul class="menu flex">
				<li><a href="#"><img src="./resources/home.svg" alt="home"></a	></li>
				<li><a href="#">peliculas</a></li>
				<li><a href="#">series</a></li>
			</ul>
			<img id="dotMenu" src="./resources/dotMenu.svg" height="50px" width="auto" alt="menu">
		</nav>
	</header>
	<main class="main">
		<div class="container gridMovies">
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
			$consulta = "select r.title, r.synopsis,r.url,g.name as genre, y.year from resource r left join genre g on r.genre = g.id left join year y on r.year = y.id";
			#resultado de la consulta se almacena
			$resultados = mysqli_query($conexion, $consulta);
			#mientras que fila se define como una consulta que devuelve un array
			while ($fila = mysqli_fetch_array($resultados)) {
				#se asigna nombre a la parte de la consulta que contiene'nombre'
				$nombre = $fila['title'];
				$sinopsis = $fila['synopsis'];
				$url = $fila['url'];
				$genre = $fila['genre'];
				$year = $fila['year'];

				echo "
						<div class=\"flex gridMoviesCard\">
							<h2> <a target=\"_blank\" href=\"./new.php?url=$url&title=$nombre\">$nombre</a> </h2>
							<p>$sinopsis</p>
							<p>genero $genre</p>
							<p>año $year</p>
						</div>
					";
			}


			mysqli_close($conexion);

			?>
		</div>
	</main>
	<footer class="footer">
		<ul class="contact flex">
			<li>
				<a href="http://" target="_blank" rel="noopener noreferrer"><img src="./resources/gh.svg" alt="github"></a>
			</li>
			<li>
				<a href="http://" target="_blank" rel="noopener noreferrer"><img src="./resources/wssvg.svg" alt="whatsapp"></a>
			</li>
			<li>
				<a href="http://" target="_blank" rel="noopener noreferrer"><img src="./resources/fb.svg" alt="facebook"></a>
			</li>
			<li>
				<a href="http://" target="_blank" rel="noopener noreferrer"><img src="./resources/mail.svg" alt="contact"></a>
			</li>
		</ul>
	</footer>
	</div>
	<script src="scripts.js"></script>
</body>


</html>