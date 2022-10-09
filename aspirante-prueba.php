<?php

include 'php/conexion.php';

$aspirante = $_GET["a"];
$sala = $_GET["s"];

$consulta = "SELECT * FROM prueba WHERE id_aspirante = \"$aspirante\" AND id_sala = \"$sala\"";

$resultado = mysqli_query($conexion,$consulta);
$resultado = mysqli_fetch_array($resultado);

?>


<!DOCTYPE html>
<html lang="en">
    <input type="hidden" name="" id="aspiId" value=<?php echo '"'.$aspirante.'"'?>>
    <input type="hidden" name="" id="salaId" value=<?php echo '"'.$sala.'"'?>>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="styleLab.css">
		<title>sala test</title>
	</head>
	<body class="hlp">
        <header>
            <nav class="cabezote bgC">
                <a href="#" onclick="document.getElementsByClassName('mensaje g')[0].style.display = 'inline'"><img class="logo" src="img/logo-sisap02.png" alt="logo"></a>
            </nav>
        </header>
        <main id="main">
            
            <section id="juego">
                <div id="txts">
                    <div class="tiempoC-c">
                        <div id="tiempoC">00.00</div>
                    </div>
                    <div>
                        <div id="posc"></div>
                    </div>
                    <div>aspirante : <?php echo $resultado['id_aspirante'];?></div>
                    <div>prueba : <?php echo $resultado['id_sala'];?></div>
                    <div class="llaves">
                        <div id="puntaje"><img src="img/llave.png" alt="llaves: "> 0</div>
                    </div>
                </div>
                <div class="flex">
                    <div class="container-escenario" id="principal">
                        <div id="escenario"> </div>
                        <div id="cuadradoRojo"> </div>
                        <div id="robotSign"></div>
                        
                    </div>
                    <div class="tCont">
                        <div id="tiempoR"></div>
                    </div>
                </div>
                <button id="btx" class="btn-Ext" onclick="btnExt.salir()"></button>
                
            </section>
            <article class="mando">
                <table >
                    <tr>
                        <td><button class="B_arriba" onclick="mover('ArrowUp'); activarEventos('ArrowUp')"></button></td>
                        <td><button class="B_derecha" onclick="mover('ArrowRight'); activarEventos('ArrowRight')"></button></td>
                        
                    </tr>
                    <tr>
                        <td><button class="B_izquierda" onclick="mover('ArrowLeft'); activarEventos('ArrowLeft')"></button></td>
                        <td><button class="B_abajo" onclick="mover('ArrowDown'); activarEventos('ArrowDown')"></button></td>
                    </tr>
                </table>
            </article>
            <section>
                
            </section>
            
        </main>
		
        <footer class="bgC">
            <span>
                todos los derechos reservados.
                Alex Valdelamar - SENA CIEA - ficha programacion de software 
                REDESTIC - Riohacha 2022 ©
            </span>
        </footer>

        <div class="mensaje g">
            <div class="container g">
                <h3 class="subT">Bienvenido a SISAP</h3>
                <div class="sec-g">
                    <div class="guia-img"><img src="img/robot.png" alt="barras de ejemplo"></div>
                    
                    <p class="sec-g-cont">
                        
                        para completar este test, deberas llevar al robot 
                        a traves de este laberinto hacia la salida.
                        Para desplazarte por la pantalla, utilliza las teclas 
                        <span class='dir'>
                              <img src="img/arrow-left.png" alt="flecha izquierda">
                              <img src="img/arrow-up.png" alt="flecha arriba">
                              <img src="img/arrow-down.png" alt="flecha B_abajo">
                              <img src="img/arrow-right.png" alt="flecha derecha">
                        </span>
                    
                    </p>
                </div>
                <div class="sec-g">
                    <p>
                        
                        Recuerda que tienes un tiempo limite para acabar el test, cada vez que 
                        resuelvas una prueba se te dara un tiempo extra, el tiempo que te sobre
                        tambien afecara tu resultado final.
                        
                    </p>
                    <div class="guia-img"><img src="img/tiempo_ej.png" alt="barras de ejemplo"></div>
                    
                </div>
                <div class="sec-g" >
                    <div class="guia-img"><img src="img/cofre-cerrado(1)(1).png" alt="cofre de ejemplo" ></div>
                    
                    <p>
                        
                        Para pasar a traves de las puertas, utiliza las llaves que se
                        encuentran dentro de los cofres. Al interactuar con un cofre, se
                        te mostrara un desafio que deberas superar para obtener la llave 
                        (recuerda que tu cantidad de intentos tendran un efecto en tu resultado
                        final).
                    </p>
                    
                </div>
                <button class="" onclick="
                document.getElementsByClassName('mensaje g')[0].style.position = 'fixed' ;
                document.getElementsByClassName('mensaje g')[0].style.top = '110%';  
                startall(<?php echo $resultado['tiempo'].',\''.$resultado['id_sala'].'\',\''.$resultado['id_aspirante'].'\','.$resultado['array_escenario']?>); ">
                INICIAR!
                </button>
            </div>
        </div>
        <div class="mensajea loc-mando">
            <button class="btn-asjustar" onclick="mando()">
                <img src="img/palanca-de-mando.png" alt="icono de mando">
            </button>
        </div>

        <div class="mensajea">
            <button class="btn-ajustar" onclick='document.documentElement.requestFullscreen(); 
                $(document).ready(function () {
                }); Screen.prototype.orientation = "landscape-primary";'> 
                <img src="img/pantalla-completa.png" alt="icono de pantalla completa">
            </button>
        </div>

        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="js/mando.js"></script>
        <script src="js/cambNivel.js"></script>
        <script src="js/textos.js"></script>
        <script src="js/niveles.js"></script>
        <script src="js/escenario.js"> </script>
        <script src="js/deteccion.js"> </script>
        <script src="js/eventos.js"> </script>
        <script src="js/generarPruebas.js"></script>
        <script src="js/iniciar.js"> </script>
        <script src="js/IniciarPrueba.js"></script>
        <script src="js/mover.js"> </script>

        <div class="loader"></div>

        <script type="text/javascript">
            $(window).load(function() {
                $(".loader").fadeOut("slow");
            });
        </script>
        
	</body>
</html>