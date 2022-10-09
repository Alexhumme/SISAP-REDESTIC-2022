<?php
    include 'php/conexion.php';

    $id = $_GET["id"];

    $sql = 'SELECT DISTINCT * FROM sala JOIN profesor WHERE id_prof = '.$id.' && id_prof = documento; ';

    imprimir($sql);
    $consulta = mysqli_query($conexion,$sql);

    if($consulta){$fila = mysqli_fetch_array($consulta);}
    else{echo '<script>alert("no tienes salas abiertas")</script>'; $fila=false;}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>salas</title>
</head>
<body>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <header>
        <nav class="cabezote bgC">
            <a href="index.html"><img class="logo" src="img/logo-sisap02.png" alt="logo"></a>
            <ul>
                <li><a href="prof-cuenta.php"> Cuenta</a></li>
                <li><a href="index.html"> Salir</a></li>
            </ul>
        </nav>
        <nav class="cabezote bgC"><h1 class="subT">ADMINISTRAR SALAS</h1></nav>
    </header>
    <main class="m-home">
        <section class="container-adminSalas center">
            <article class="container-titulo-adminSalas">
                <div class="titulo-adminSalas">
                    <h3>Hola <?php echo $fila['nombres']." ".$fila['apellidos']?>, estas son tus salas abiertas</h3>
                    <div class="cantidad-salas">#</div>
                </div>
            </article>
            <article class="container-salas">
                
                <div class="crear sala">
                    <button class="btn-sala center" onclick="formCont(0)"><img src="img/anadir.png" alt=""></button>
                    <div class="descripcion-sala"></div>
                </div>

                <?php if($fila){do{ ?>
                <div class="sala estado<?php echo $fila['estado']?>">
                    <button class="btn-sala center" onclick=""><a href="prof-sala.php?id=<?php echo $fila['id']?>"><img src="img/entrar.png" alt="entrar"></a></button>
                    <div class="descripcion-sala">
                        <div><?php echo $fila['id']?></div>
                        <div><?php echo $fila['nombre']?></div>
                        <div><?php echo $fila['programa']?></div>
                    </div>
                </div>
                <?php 
                    }while($fila=mysqli_fetch_array($consulta));};
                ?>
                
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
    <div class="mensajec form-sala">
        <div>
            <form method="POST" action='php/añadir-sala.php' class="container-form">

                <h3 class="subT">DISEÑAR SALA</h3>
                <div><input type='text' name='codigo' placeholder='digite un codigo creativo' required></div>
                <div><input type='text' name='nombre' placeholder='nombre de la sala (opcional)'></div>
                <div><input type='hidden' name='id_prof'placeholder='digite su documento para confirmar' <?php echo 'value='.$id?> readonly></div>
                <div>
                    <select name="programa" id="">
                        <option value="programacion de Software">programacion de Software</option>
                    </select>
                </div>
                
                
                <button class="btn-form" > enviar </button> <span class="btn-form" onclick="formCont(1)"> cancelar </span> 
            </form>
        </div>
    </div>
    <script src="js/form_cont.js"></script>
</body>
</html>