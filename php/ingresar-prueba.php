<?php

include 'conexion.php';

$aspirante = $_GET["a"];
$sala = $_GET["s"];

$consulta = "SELECT * FROM prueba WHERE id_aspirante = \"$aspirante\" AND id_sala = \"$sala\"";

$sql = mysqli_query($conexion,$consulta);



if(mysqli_num_rows($sql)>0) {

    echo '
        <script>
            alert("ya tienes una prueba iniciada");
        </script>
    ';
    if(mysqli_fetch_array($sql)['estado'] == 0){
        echo '
        <script>
            window.location.href = "../aspirante-prueba.php?a='.$aspirante.'&s='.$sala.'";
        </script>
        ';
    }else{
        echo '
        <script>
            alert("ya acabaste esta prueba");
            window.location.href = "../aspirante-resultados.php?a='.$aspirante.'&s='.$sala.'";
        </script>
        ';
    }

}else{

    $escenario = "nivel".random_int(1,5);

    $consulta = "INSERT INTO prueba(id_sala,id_aspirante,tiempo,puntaje,avatar_pos,array_escenario,estado)
                VALUES ('$sala','$aspirante',500,0,'460,-500','$escenario',0)";
    
    imprimir($consulta);

    $resultado = mysqli_query($conexion,$consulta);


    echo '
    
        <script>
            alert("se ha creado una prueba nueva");
            window.location.href ="../aspirante-prueba.php?a='.$aspirante.'&s='.$sala.'";
        </script>
    
    ';   
}


mysqli_close($conexion);


?>