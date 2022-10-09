<?php

    include 'conexion.php';
    $cedula = $_POST['cedula'];
    $nombres  = $_POST['nombres'];
    $apellidos  = $_POST['apellidos'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $cursos = $_POST['cursos'];
    $perfil = $_POST['perfil'];
    $contrasenia = $_POST['contraseña'];


    $consulta = "INSERT INTO profesor(documento,nombres,apellidos,correo,telefono,imparte,perfil,contrasenia) 
                    VALUES ('$cedula','$nombres','$apellidos','$correo','$telefono','$cursos','$perfil','$contrasenia')";

                    $ejecutar = mysqli_query($conexion,$consulta);
                    if($ejecutar){
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

                            setTimeout(()=>{window.location.href = "../admin-admProfesores.php"},1000)
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
                            setTimeout(()=>{window.location.href = "../admin-admProfesores.php"},1000)
                        </script>
                        </body>
                        </html>   
                        ';
                    }
    
    mysqli_close($conexion);

?>