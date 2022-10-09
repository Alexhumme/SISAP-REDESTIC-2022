<?php
    include 'php/conexion.php';

    $sql = "SELECT * FROM mensaje";
    $consulta = mysqli_query($conexion,$sql);
    $fila = mysqli_fetch_array($consulta);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>mensajes</title>
</head>
<body>
    <header>
        <nav class="cabezote bgC">
            <a href="index.html"><img class="logo" src="img/logo-sisap02.png" alt="logo"></a>

            <input type="checkbox" name="" class="desp-menu">
            <ul class="menu">
                <li><a href="admin-admProfesores.php">profesores</a></li>
                <li><a href="admin-admMensajes.php">mensajes</a></li>
                <li><a href="admin-admNiveles.php">diseñar nivel</a></li>
            </ul>
        </nav>

        <nav class="cabezote bgC"><h1 class="subT">MENSAJES</h1></nav>
    </header>
    <main class="m-adm-mensajes">
        <section class="">
            <ul class="mensajes">
                <?php
                    do{
                ?>
                <li class="item-mensaje"  onclick="despMensaje(<?php echo $fila['id']?>)">
                    <div><?php echo $fila['id']?></div><div><?php echo $fila['nombre_em']?></div><div><?php echo $fila['fecha']?></div>
                </li>
                <?php
                    }while($fila=mysqli_fetch_array($consulta));
                ?>
            </ul>
        </section>
        <section class="show-msj">
            <table class="tmensaje">
                <thead>
                    <tr>
                        <th colspan="4" id="id">id : id del mensaje</th>
                    </tr>
                    
                </thead>
                <tbody>
                    <tr>
                        <th>nombre :</th><td id="Mnombre">nombre</td>
                        <th>fecha :</th><td id="Mfecha" >fecha</td>
                    </tr>
                    <tr>
                        <th>correo :</th><td id="Mcorreo">correo</td>
                        <th>cel. num. :</th><td id="McelNum">numero</td>
                    </tr>
                    <tr>
                        <td id="Mcontenido" colspan="4">
                            <p>
                                Lorem ipsum, dolor sit amet consectetur 
                                adipisicing elit. Deserunt sed vel itaque ducimus 
                                minima nobis blanditiis esse hic laborum quidem dolorem 
                                rem sapiente est, perspiciatis vero magnam, quisquam quibusdam 
                                voluptatum!
                            </p>
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr  class="del-msj" onclick="document.getElementsByClassName('mensajec')[0].style.display = 'none';">
                        <td>Eliminar</td>
                    </tr>
                </tfoot>
            </table>
        </section>
    </main>
    <footer class="bgC">
        <span>
            todos los derechos reservados.
            Alex Valdelamar - SENA CIEA - ficha programacion de software 
            REDESTIC - Riohacha 2022 ©
        </span>
    </footer>
    
</body>
</html>