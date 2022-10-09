<?php
function imprimir($data) {
    $console = $data;
    if (is_array($console))
    $console = implode(',', $console);
   
    echo "<script>console.log('Console: " . $console . "' );</script>";
   }
$conexion = mysqli_connect("localhost:3307","root","","sisap");
if($conexion)
{imprimir('la conexion fue exitosa');}
else
{imprimir('no se pudo realizar la conexion');}

?>