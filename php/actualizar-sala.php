<?php

    include 'conexion.php';

    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $programa = $_POST['programa'];
    $estado = $_POST['estado'];

    $consulta = "UPDATE sala SET id='$id', nombre='$nombre', programa='$programa', estado='$estado' WHERE id = '$id'";

    $resultado = mysqli_query($conexion,$consulta);
    if($resultado){
        echo '
        <!DOCTYPE html>
        <html lang="en">
        <body>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script type="text/javascript">
            try{
                swal.fire("registro exitoso");
            }catch(e){
                alert("registro exitoso");
            }

            setTimeout(()=>{window.location.href = "../prof-sala.php?id='.$id.'"},1000)
        </script>
        </body>
        </html>
        ';
    }else{
        echo '
        <!DOCTYPE html>
        <html lang="en">
        <body>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script  type="text/javascript">
            try{
                swal.fire("registro fallido");
            }catch(e){
                alert("registro fallido");
            }
            setTimeout(()=>{window.location.href = "../prof-sala.php?id='.$id.'"},1000)
        </script>
        </body>
        </html>   
        ';
    }

    mysqli_close($conexion);

?>