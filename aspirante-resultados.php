<?php

include 'php/conexion.php';

$aspirante = $_GET["a"];
$sala = $_GET["s"];
$tiempo = $_GET["t"];
$pr = $_GET["pr"];

$puntaje = $pr * ($tiempo+1);

$actulizacion = "UPDATE prueba SET estado = 1, tiempo = $tiempo, p_resueltas = $pr, puntaje = $puntaje WHERE id_aspirante = \"$aspirante\"";
$resultado = mysqli_query($conexion,$actulizacion);

$consulta = "SELECT * FROM prueba,aspirante WHERE id_aspirante = \"$aspirante\" AND id_sala = \"$sala\" AND documento = id_aspirante";

$resultado = mysqli_query($conexion,$consulta);
$resultado = mysqli_fetch_array($resultado);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="styleLab.css">
        <title>resultados</title>
	</head>
	<body class="">
        <header>
            <nav class="cabezote bgC">
                <a href="index.html"><img class="logo" src="img/logo-sisap02.png" alt="logo"></a>
            </nav>
            <nav class="cabezote bgC"><h1 class="subT">RESULTADOS</h3></nav>
            
        </header>
        
		<main class="main-r">
            <div class="r">
                <div class="container-resultados">
                    
                    <table class="tabla">
                        <thead>
                            <tr>
                                <th>documento</th>
                                <th>nombre</th>
                                <th>tiempo restante</th>
                                <th>pruebas resueltas</th>
                                <th>id sala</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th><?php echo $resultado['id_aspirante']?></th>
                                <td><?php echo $resultado['nombres']." ".$resultado['apellidos']?></td>
                                <td><?php echo $resultado['tiempo']?></td>
                                <td><?php echo $resultado['p_resueltas']?></td>
                                <td><?php echo $resultado['id_sala']?></td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan=6 class="imprimir nt">imprimir</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                
            </div>
        </main>

        <footer class="bgC">
            <span>
                todos los derechos reservados.
                Alex Valdelamar - SENA CIEA - ficha programacion de software 
                REDESTIC - Riohacha 2022 ©
            </span>
        </footer>

        

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

        <div class="loader"></div>

        <script type="text/javascript">
            $(window).load(function() {
                $(".loader").fadeOut("slow");
            });
        </script>
	</body>
</html>