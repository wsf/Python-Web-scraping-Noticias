<!DOCTYPE html>
<html>
<head>
	<title>Noticias</title>
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0", charset="UTF8">
</head>
<body>
	<div id="top">
	<h1 id="encabezado">NOTICIAS</h1>
	</div>
	<?php	
		# Llamo al archivo .json y lo convierto en un array con la funcion decode
		$data = file_get_contents ("../noticias.json");
		$json = json_decode($data);

		foreach ($json as $llave => $primerNivel) { # Primer Nivel (Empieza el array)
			foreach ($primerNivel as $paginas => $pagina) { # Segundo Nivel (Paginas)
				echo "<div id='barra'><h2 id='pagina'>$pagina->pagina</h2></div>";
				foreach ($pagina as $tercerNivel => $valor) { # Tercer Nivel (Empieza el array Articulos)
					if(is_array($valor)||is_object($valor)){ # Valido que imprima solo lo que tenga valores
						foreach ($valor as $articulos => $valores) { # Cuarto Nivel (Articulos de las paginas)
							echo "<div id='campo'><h4 id='titulo'>$valores->titulo</h4>";
							echo "<p id='texto'>$valores->texto</p>";
							echo "<a id='link'>$valores->link</a>";
							echo "<br>";
							echo "<hr>";
							echo "</div>";				
						}
					}
				}
			}
		}
	?>
</body>
</html>