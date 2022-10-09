<?php

    include 'conexion.php';
    $cedula = $_POST['documento'];
    $nombres  = $_POST['nombres'];
    $apellidos  = $_POST['apellidos'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];


    $consulta = "INSERT INTO aspirante(documento,nombres,apellidos,correo,telefono) 
                    VALUES ('$cedula','$nombres','$apellidos','$correo','$telefono')";

    $verificacion = "SELECT * FROM aspirante WHERE documento = $cedula";
    $verificacion = mysqli_query($conexion,$verificacion);

    if(mysqli_num_rows($verificacion)>0){
        echo '
            <script>
                alert("esta documento ya esta registrado")
            </script>
        ';
    }else{

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

                setTimeout(()=>{window.location.href = "../index.html"},1000)
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
                setTimeout(()=>{window.location.href = "../index.html"},1000)
            </script>
            </body>
            </html>   
            ';
        }
    }
    mysqli_close($conexion);

?>