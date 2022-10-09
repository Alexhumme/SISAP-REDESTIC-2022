<?php

    include 'php/conexion.php';

    $codigo = $_POST['codigo'];
    $documento = $_POST['documento'];

    
    $consulta = "SELECT * FROM aspirante JOIN sala WHERE documento = $documento AND id='$codigo'";

    $ejecutar = mysqli_query($conexion,$consulta);

    imprimir($consulta); 

    if($ejecutar != false and mysqli_num_rows($ejecutar)> 0){
        $resultado = mysqli_fetch_array($ejecutar);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>sala <?php echo $resultado['nombre'] ." : ". $resultado['id']?></title>
</head>
<body>
    <header>
        <nav class="cabezote bgC">
            <a href="index.html"><img class="logo" src="img/logo-sisap02.png" alt="logo"></a>
        </nav>
        <nav class="cabezote bgC"><h1 class="subT">Bienvenido <?php echo $resultado['nombres']." ".$resultado['apellidos'];?>!</h1></nav>
    </header>
    <main class="m-home">

        <?php if($resultado['estado'] == 0){?>

        <section class="center cnt-sala" style="text-align: center;">
            <H2>ESPERANDO AL INSTRUCTOR</H2>
            <H3>podra acceder a la prueba cuando el instructor lo permita</H3>
        </section>

        <?php }else{ ?>

        <section class="center cnt-sala" style="text-align: center;">
            <H2>PRUEBA DISPONIBLE</H2>
            <H3>esta prueba sera disponible mientras el instructor lo permita</H3>
            <a href="php/ingresar-prueba.php?<?php echo "a=".$resultado['documento']."&s=".$resultado['id'];?>" ><button class="btn-iniciar-ap">EMPEZAR!</button> </a>
        </section>

        <?php }?>

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


<?php

}else{
    echo 
    '<!DOCTYPE html>
    <html lang="en">
    <body>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script  type="text/javascript">
        swal.fire("no se pudo entrar a la sala"," asegurate de estar registrado y tener el codigo correcto");
    </script>
    </body>
    </html>';
}

mysqli_close($conexion);

?>