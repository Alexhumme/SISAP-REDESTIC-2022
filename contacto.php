<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>contacto</title>
</head>
<body>
    <header>
        <nav class="cabezote bgC">
            <a href="index.html"><img class="logo" src="img/logo-sisap02.png" alt="logo"></a>
            <input type="checkbox" name="" class="desp-menu">
            
            <ul id='menu'>
                <li><a href="index.html"> Roles</a></li>
                <li><a href="ayuda.html"> Ayuda</a></li>
                <li><a href="nosotros.html"> Nosotros</a></li>
                <li><a href="contacto.html"> Contacto</a></li>
            </ul>
        </nav>
        <nav class="cabezote bgC"><h1 class="subT">CONTACTOS</h1></nav>
    </header>
    <main>
        <section class="contactanos center">
            <div class="contacto-unid">
                <div class="contacto-id">
                    <div>
                        <img src="img/icon-contacto.png" alt="" srcset="">
                    </div>
                    <span class="contacto-nombre"> Administrador</span>
                </div>
                <div class="contactos">
                    <div class="contacto" onclick="formCont(0)">
                        <img class="logo-contacto" src="img/icon-gmail.png" alt="">
                        <h5 class="tecto-contacto"> Gmail </h5>
                    </div>
                    <div class="contacto" onclick="formCont(0)">
                        <img class="logo-contacto" src="img/icon-whatsapp.png" alt="">
                        <h5 class="tecto-contacto"> Whatsapp </h5>
                    </div>
                    <div class="contacto" onclick="formCont(0)"> 
                        <img class="logo-contacto" src="img/icon-telegram.png" alt="">
                        <h5 class="texto-contacto"> Telegram </h5>
                    </div>
                </div>
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
    <div class="mensajec">
        <div>
            <form method="POST" action='php/añadir-mensaje.php' class="container-form">

                <h3 class="subT">CONTACTENOS</h3>
                <div><input type='text' name='nombre' placeholder='' required><label for="" class="lblCont">Nombre</label></div>
                <div><input type='email' name='correo' placeholder='' required><label for="" class="lblCont">Correo</label></div>
                <div><input type='text' name='telefono'placeholder='' required><label for="" class="lblCont">Telefono</label></div>
                <div class="txt"><textarea type='' placeholder='digite su mensaje aquí' name='mensaje' required></textarea></div>
                
                <button class="btn-form"> enviar </button> <span class="btn-form" onclick="formCont(1)"> cancelar </span> 
            </form>
        </div>
    </div>
    <script src="js/form_cont.js"></script>
</body>
</html>