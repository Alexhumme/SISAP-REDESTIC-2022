<?php

    include 'conexion.php';
    $tipo = 1;
    $nombre  = $_POST['nombre'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $mensaje = $_POST['mensaje'];
    $id_contacto = '1118805275';


    $consulta = "INSERT INTO mensaje(tipo,nombre_em,correo_em,telefono_em,contenido) 
                    VALUES ('$tipo','$nombre','$correo','$telefono','$mensaje')";

                    $ejecutar = mysqli_query($conexion,$consulta);
                    if($ejecutar){
                        echo '
                        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                        <span>ndsaun</span>
                        <script type="text/javascript">
                            try{
                                swal.fire("mensaje exitosa");
                            }catch(e){
                                alert("mensaje exitosa");
                            }
                            window.location.href = "../contacto.php"
                        </script>
                        ';
                    }else{
                        echo '
                        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                        <script  type="text/javascript">
                            try{
                                swal.fire("mensaje fallida");
                            }catch(e){
                                alert("mensaje fallida");
                            }
                            window.location.href = "../contacto.php"
                        </script>   
                        ';
                    }
    
    mysqli_close($conexion);

?>