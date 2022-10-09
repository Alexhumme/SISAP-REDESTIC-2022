<?php

    include 'conexion.php';

    $codigo = $_POST['codigo'];
    $nombre  = $_POST['nombre'];
    $programa = $_POST['programa'];
    $id_prof = $_POST['id_prof'];


    $consulta = "INSERT INTO sala(id,nombre,programa,id_prof,estado) 
                    VALUES ('$codigo','$nombre','$programa','$id_prof',0)";

                    $ejecutar = mysqli_query($conexion,$consulta);

                    if($ejecutar){
                        echo '
                        <!DOCTYPE html>
                        <html lang="en">
                        <body>
                        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                        <script  type="text/javascript">
                            alert("registro almacenado exitosamente")
                            window.location.href = "../prof-admSalas.php?id='.$id_prof.'"
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
                            alert("no se pudo hacer el registro")
                            window.location.href = "../prof-admSalas.php?id='.$id_prof.'"
                        </script>
                        </body>
                        </html>   
                        ';
                    }
    
    mysqli_close($conexion);

?>