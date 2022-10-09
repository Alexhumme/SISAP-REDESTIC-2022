<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>administrar niveles</title>
</head>
<body>
    <header>
        <nav class="cabezote bgC">
            <a href="index.html"><img class="logo" src="img/logo-sisap02.png" alt="logo"></a>

            <input type="checkbox" name="" class="desp-menu">
            <ul class="menu">
                <li><a href="admin-admProfesores.php">profesores</a></li>
                <li><a href="admin-admMensajes.php">mensajes</a></li>
                <li><a href="admin-admNiveles.php">diseñar nivel</a></li>
            </ul>
        </nav>
        <nav class="cabezote bgC"><h1 class="subT">CREADOR DE NIVELES</h1></nav>
    </header>
    <main class="m-home cn-adm">
        <section class="">
            <ul class="mensajes">
                <li class="item-mensaje"  onclick="cargarPreview('id x')">
                    <div>id</div><div>nombre</div><div>fecha</div>
                </li>
            </ul>
        </section>
        <section class="preview-nivel">
            <div class="interfaz-edicion">
                <div class="preview">

                </div>
                <div class="paneles">
                    <h3 class="subT">PANELES</h3>
                    <ul >
                        <li><h4>piso</h4> <img src="img/piso.png" alt="panel de piso" srcset=""></li>
                        <li><h4>pared</h4> <img src="img/pared.png" alt="panel de pared" srcset=""></li>
                        <li><h4>puerta</h4> <img src="img/puerta4-c(2).png" alt="panel de puerta" srcset=""></li>
                        <li><h4>cofre</h4> <img src="img/cofre-cerrado(8).png" alt="panel de cofre" srcset=""></li>
                        <li><h4>llave</h4> <img src="img/llave.png" alt="panel de llave" srcset=""></li>
                    </ul>
                </div>
                
            </div>
           <div class="opciones">
                <button class="eliminar">editar</button>
                <button class="eliminar">eliminar</button>
                <button class="guardar">guardar</button>
                <button class="cancelar">cancelar</button>
           </div>
        </section>
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