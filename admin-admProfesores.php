<?php
    include 'php/conexion.php';

    $sql = "SELECT * FROM profesor";
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
    <title>administrar profesores</title>
</head>
<body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
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
        <nav class="cabezote bgC"><h1 class="subT">ADMINISTRADOR DE PROFESORES</h1></nav>
    </header>
    <main class="m-home m-adm">
        <section class="admin-prof">
            <article>
                <form action="php/añadir-prof.php" method="post" class="container-form-regProf">
                    <fieldset>
                        <legend class="subT">Añadir Profesor</legend>
                            <div class="campo-form top">
                                <label for="">CEDULA</label>
                                <input type="number" name="cedula" placeholder="cedula del profesor" required>
                            </div>
                            <div class="campo-form">
                                <label for="">NOMBRE</label>
                                <input type="text" name="nombres" placeholder="nombres del profesor" required>
                            </div>
                            <div class="campo-form">
                                <label for="">APELLIDOS</label>
                                <input type="text" name="apellidos" placeholder="apellidos del profesor" required>
                            </div>
                            <div class="campo-form">
                                <label for="">CORREO</label>
                                <input type="email" name="correo" placeholder="correo electronico" required>
                            </div>
                            <div class="campo-form">
                                <label for="">TELEFONO</label>
                                <input type="number" name="telefono" placeholder="numero del profesor" required>
                            </div>
                            <div class="campo-form">
                                <label for="">CURSOS</label>
                                <input type="text" name="cursos" placeholder="cursos que imparte separados por coma (opcional)">
                            </div>
                            <div class="campo-form">
                                <label for="">PERFIL</label>
                                <input type="text" name="perfil" placeholder="descripcion del profesor (opcional)">
                            </div>
                            <div class="campo-form bottom">
                                <label for="">CONTRASEÑA</label>
                                <input type="password" name="contraseña" id="" placeholder="contraseña del profesor" required>
                            </div>
                        <button type="submit" name="registrar" class="btn-form">registrar</button>
                    </fieldset>
                </form>
            </article>
            <article class="tabl-p-cont">
                <table id="tabla-profesores" class="tabla">
                

                    <thead >
                        <tr>
                            <td class="campo-form" colspan="7"><input type="search" placeholder="consultar por documento, nombre, apellido o telefono">
                            <button type="submit" class="btn-form">consultar</button></td> 
                        </tr>
                        <tr class="">
                            <th>DOCUMENTO</th>
                            <th>NOMBRES</th>
                            <th>APELLIDOS</th>
                            <th>CORREO</th>
                            <th>NUMERO</th>
                            <th>CURSOS</th>
                            <th>CONTRASEÑA</th>
                        </tr>
                    </thead>
                    
                    <tbody id="registros-profesores">
                            <?php
                                do{
                            ?>
                            <tr>
                                <td><?php echo $fila['documento']?> </td>
                                <td><?php echo $fila['nombres']?></td>
                                <td><?php echo $fila['apellidos']?></td>
                                <td><?php echo $fila['correo']?></td>
                                <td><?php echo $fila['telefono']?></td>
                                <td><?php echo $fila['imparte']?></td>
                                <td><?php echo $fila['contrasenia']?></td>
                                
                                <td class="edit-prof"><a href="php/actualizar-prof.php" id=<?php echo $fila['documento']?> class="botona"><img class="icon-config" src="img/icon-config.svg" alt="editar" srcset=""></a></td>
                                <td class="del-prof"><a onclick="confirmarDelete('<?php echo $fila['documento']?>','profesores',1)" class="botona"><img class="icon-config" src="img/trash-bin.png" alt="eliminar" srcset=""></a></td>
                            </tr>
                            
                            <?php
                                }while($fila=mysqli_fetch_array($consulta));
                            ?>

                    </tbody>
                    <tfoot>
                        <tr class="">
                            <th colspan="7"><?php echo '#'?>  profesores encontrados <div id="estado-cnx"></div></th>
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
</body>
</html>