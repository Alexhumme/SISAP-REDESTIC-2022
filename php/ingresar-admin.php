<?php

include 'conexion.php';

$documento = $_POST["documento"];
$contrasenia = $_POST["contraseña"];

$consulta = "SELECT * FROM administrador WHERE documento = $documento AND contrasenia = '$contrasenia'";

imprimir($consulta);

$sql = mysqli_query($conexion,$consulta);


if ($sql and mysqli_num_rows($sql)> 0) {

    $resultado = mysqli_fetch_array($sql);

    echo '
    
        <script>
            window.location.href = "../admin-admProfesores.php?id='.$documento.'"
        </script>
    
    ';

}else{

    echo '
    
        <script>
            alert("los datos no coinciden");
            window.location.href ="../index.html";
        </script>
    
    ';

}

?>