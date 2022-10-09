<?php
    include 'php/conexion.php';


    $id = $_GET['id'];

    $sql = "SELECT * FROM vista_aspirante_prueba WHERE id_sala = '$id' ORDER BY puntaje DESC";
    $sql2 = "SELECT * FROM sala WHERE id = '$id'";
    
    $consulta = mysqli_query($conexion,$sql);
    $consulta2 = mysqli_query($conexion,$sql2);

    $fila2 = mysqli_fetch_array($consulta2);

    if($consulta){$fila = mysqli_fetch_array($consulta);}
    else{echo '<script>alert("no hay pruebas registradas")</script>'; $fila=false;}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>administra sala <?php echo $fila2['id']?></title>
</head>
<body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <header>
        <nav class="cabezote bgC">
            <a href="index.html"><img class="logo" src="img/logo-sisap02.png" alt="logo"></a>

            <input type="checkbox" name="" class="desp-menu">
            <ul class="menu">
                <li><a href=<?php echo "prof-admSalas.php?id=".$fila2['id_prof'];?>> salas</a></li>
                <li><a href="prof-cuenta.php"> Cuenta</a></li>
                <li><a href="index.html"> Salir</a></li>
            </ul>
        </nav>
        <nav class="cabezote bgC"><h1 class="subT">SALA <?php echo $fila2['id']?></h1></nav>
    </header>
    <main class="m-home m-adm">
        <section class="admin-prof">
            
            <article class="tabl-p-cont">
                <table id="tabla-profesores" class="tabla">

                    <thead >
                        <tr>
                            <th>codigo : <?php echo $fila2['id']?></th>
                            <th colspan=4>nombre : <?php echo $fila2['nombre']?></th>
                        </tr>
                        <tr>
                            <th colspan=3>programa : <?php echo $fila2['programa']?></th>
                            <th class="estado<?php echo $fila2['estado']?>"><?php if ($fila2['estado'] == 0){echo "cerrada";}else{echo "abierta";}?></th>
                            <th><button onclick="formCont(0)" class="btn-form">modificar</button></th>
                        </tr>
                        <tr>
                            <td class="campo-form" colspan="7">
                                <input type="search" placeholder="consultar por documento, nombre, apellido o telefono">
                                <button type="submit" class="btn-form">consultar</button>
                            </td> 
                            
                        </tr>
                        <tr class="">
                            <th>DOCUMENTO</th>
                            <th>NOMBRE</th>
                            <th>CORREO</th>
                            <th>PUNTAJE</th>
                            <th>ESTADO</th>
                        </tr>
                    </thead>
                    
                    <tbody id="registros-profesores">
                        <?php
                            if($fila)do{
                        ?>
                        <tr>
                            <td><?php echo $fila['documento']?></td>
                            <td><?php echo $fila['nombres']?></td>
                            <td><?php echo $fila['correo']?></td>
                            <td><?php echo $fila['puntaje']?></td>
                            <td><?php echo $fila['estado']?></td>
                            
                            <td class="edit-prof"><a href="php/actualizar-prof.php" id=<?php echo $fila['documento']?> class="botona"><img class="icon-config" src="img/icon-config.svg" alt="editar" srcset=""></a></td>
                            <td class="del-prof"><a onclick="confirmarDelete(<?php echo $fila['documento']?>,'pruebas','<?php echo $fila2['id']?>')" id=<?php echo $fila['documento']?> class="botona"><img class="icon-config" src="img/trash-bin.png" alt="eliminar" srcset=""></a></td>
                        </tr>
                        
                        <?php
                            }while($fila=mysqli_fetch_array($consulta));
                        ?>
                    </tbody>
                    <tfoot>
                        <tr class="">
                            <th colspan="7"><?php echo '#'?>  pruebas encontradas <div id="estado-cnx"></div></th>
                        </tr>
                    </tfoot>
                
                </table>
            </article>
        </section>
    </main>
    <footer class="bgC">
        <span>
            todos los derechos reservados.
            Alex Valdelamar - SENA CIEA - ficha programacion de software 
            REDESTIC - Riohacha 2022 ©
        </span>
    </footer>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="js/eliminar.js"></script>
    <script src="js/form_cont.js"></script>
    <div class="mensajec form-sala">
        <div>
            <form method="POST" action='php/actualizar-sala.php' class="container-form">

                <h3 class="subT">Actualizar SALA</h3>
                <div><input type='text' name='id' placeholder='digite un codigo creativo' value=<?php echo $fila2['id']?> required></div>
                <div><input type='text' name='nombre' placeholder='nombre de la sala (opcional)' value=<?php echo $fila2['nombre']?>></div>
                <div>
                    <input type="radio" name="estado" value=0 id="cerrado" required><label for="cerrado">cerrado</label>
                    <input type="radio" name="estado" value=1 id="abierto" required><label for="abierto">abierto</label>
                </div>
                <div><input type='hidden' name='id_ante' value=<?php echo $fila2['id']?>readonly></div>
                <div><input type='hidden' name='id_prof' value=<?php echo $fila2['id_prof']?>readonly></div>
                <div>
                    <select name="programa" id="">
                        <option value="programacion de Software">programacion de Software</option>
                    </select>
                </div>
                
                
                <button class="btn-form" > enviar </button> <span class="btn-form" onclick="formCont(1)"> cancelar </span> 
            </form>
        </div>
    </div>
</body>
</html>