<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="style.css" />
	<title>Pelis | Home</title>
</head>

<body>
	<div class="contenedor"></div>
	<header>
		<nav class="flex nav">
			<a class="logo" href="">Rolando</a>
			<ul class="menu flex">
				<li><a href="#">home</a></li>
				<li><a href="#">peliculas</a></li>
				<li><a href="#">series</a></li>
			</ul>
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
			$consulta = "SELECT * FROM videos";
			#resultado de la consulta se almacena
			$resultados = mysqli_query($conexion, $consulta);

			#mientras que fila se define como una consulta que devuelve un array
			while ($fila = mysqli_fetch_array($resultados)) {
				#se asigna nombre a la parte de la consulta que contiene'nombre'
				$nombre = $fila['nombre'];
				$sinopsis = $fila['sinopsis'];
				$url = $fila['url'];

				echo "
						<div class=\"flex gridMoviesCard\">
							<h2> <a target=\"_blank\" href=\"/new.php?url=$url\">$nombre</a> </h2>
							<p>$sinopsis</p>
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
				<a href="http://" target="_blank" rel="noopener noreferrer">contact</a>
			</li>
			<li>
				<a href="http://" target="_blank" rel="noopener noreferrer">github</a>
			</li>
			<li>
				<a href="http://" target="_blank" rel="noopener noreferrer">linkedin</a>
			</li>
			<li>
				<a href="http://" target="_blank" rel="noopener noreferrer">facebook</a>
			</li>
		</ul>
	</footer>
	</div>
</body>
<script src="scripts.js"></script>

</html>