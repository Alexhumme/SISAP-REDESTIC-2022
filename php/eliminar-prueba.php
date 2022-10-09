<?php
    
    include 'conexion.php';

    $id = $_GET['id'];
    $sala = $_GET['s'];

    $sql = "DELETE FROM prueba WHERE id_aspirante=\"$id\"";

    $consulta = mysqli_query($conexion,$sql);

    if ($consulta){
        echo 
        "
        <!DOCTYPE html>
        <html lang='en'>
        <head><link rel='stylesheet' href='/prototipo/style.css'></head>
        <body>
        <script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
        Swal.fire(
            {
                title: 'Eliminado!',
                text : 'Registro eliminado exitosamente.',
                icon : 'success',
                showConfirmButton: false
            }
        )

        setTimeout(()=>{window.location.href = '../prof-sala.php?id=".$sala."'},3000)
        </script>
        </body>
        </html>
        ";
    }else{
        echo
        "
        <!DOCTYPE html>
        <html lang='en'>
        <head><link rel='stylesheet' href='style.css'></head>
        <body>
        <script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
        console.log('".$sql."');
        Swal.fire(
            {
                title : 'Registro no eliminado',
                text : 'No se pudo encontrar un registro.',
                icon : 'error',
                showConfirmButton: false
            }
        )

        setTimeout(()=>{window.location.href = '../prof-sala.php?id=".$sala."'},3000)
        </script>
        </body>
        </html>
        ";
    }

?>