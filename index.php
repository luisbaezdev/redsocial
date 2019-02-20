<?php
    session_start();
   
    if(isset($_SESSION['usuario']) && !empty($_SESSION['usuario'])){
        header('location:/inicio.php');
    }

?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Red Social | Catedral de Milagros Juventud</title>
        <link rel="icon" href="/images/favicon.ico" type="image/x-icon"/>
        <link href="https://file.myfontastic.com/WHLVNBkBpkf89yyuivCyNm/icons.css" rel="stylesheet">
        <link rel="stylesheet" href="/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/estilos.css">
    </head>

    <body style="background-color: white;">
        <!-- Barra de Navegación-->
        <nav class="navbar navbar-light shadow-sm" style="background-color: white; z-index: 100;">
            <div class="container d-md-flex justify-content-center justify-content-md-between">
                <a class="navbar-brand mb-3 mb-md-0" href="/">
                    <img class="d-inline-block align-top rounded align-middle" src="/images/LOGO.png" height="38" alt="">
                    <p class="d-none d-md-inline-block ml-2 mb-0 align-middle">Red Social</p>
                    <p class="d-inline-block d-md-none ml-4 mb-0 align-middle">Inicia Sesión en Red Social</p>
                </a>
                <!--Formulario Login-->
                <div class="formularioLogin">
                    <form class="form-inline mb-2 mb-md-0" name="login" id="login">
                        <div class="form-group mr-2">
                            <input class="form-control" type="text" name="email" placeholder="Ingresa tu email">
                        </div>
                        <div class="form-group mr-2">
                            <input class="form-control" type="password" name="password" placeholder="Ingresa tu contraseña">
                        </div>
                        <!-- Boton iniciar-->
                        <button class="btn btn-primario icon-sign-in d-block align-middle" type="submit"></button>
                    </form>
                    <small class="infoLogin mb-0 ml-3 text-muted">Ingresa tus datos</small>
                </div>
            </div>
        </nav>
        <!--Cuerpo de index-->
        <div class="container-fluid" id="cuerpo-index">
            <div class="row h-100">
                <div class="col-md-6 bg-primario h-100 d-flex flex-column justify-content-start align-item-center pb-5">
                    <p class="display-2 text-center titleCol">Red Social</p><img class="mx-auto my-5" src="/images/RED_SOCIAL.png" alt="Imagen red social" width="400" height="auto">
                    <p class="text-center mx-5" id="descripcionRedSocial"><span class="font-weight-bold">Catedral de Milagros Juventud</span> ahora tiene su propia red social, registrate y sé parte! Chatea, comparte versiculos, cuenta tu testimonio y mucho mas, te estamos esperando.</p>
                </div>
                
                <div class="col-md-6 bg-white h-100 d-flex flex-column justify-content-start align-item-center pb-5">
                    <p class="display-2 text-center titleCol mb-5">Registrate</p>
                    <form id="registro" autocomplete="off">
                        <div class="form-row mx-auto" id="form-registro">
                            <div class="form-group col-md-6">
                                <label for="nombre">Nombre</label>
                                <input class="form-control" id="nombre" type="text" placeholder="Ingresa tu nombre" name="nombre">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="apellido">Apellido</label>
                                <input class="form-control" id="apellido" type="text" placeholder="Ingresa tu apellido" name="apellido">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="nacimiento">Fecha de nacimiento</label>
                                <input class="form-control" id="nacimiento" type="date" name="nacimiento">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="residencia">¿Donde vives?</label>
                                <input class="form-control" id="residencia" type="text" placeholder="Localidad, Provincia, Pais" name="residencia">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email">Correo Electrónico</label>
                                <input class="form-control" id="email" type="email" placeholder="Ingresa tu email" name="email">
                            </div>
                            <div class="form-group col-md-6 d-flex align-items-end justify-content-center">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" id="generoHombre" type="radio" name="genero" value="Hombre" hidden>
                                    <label class="form-check-label" for="generoHombre">
                                        <button type="button" class="btn radioButonGenero Hombre" id="Hombre">Hombre</button>
                                    </label>
                                </div>
                                <div class="form-check form-check-inline m-0">
                                    <input class="form-check-input" id="generoMujer" type="radio" name="genero" value="Mujer" hidden>
                                    <label class="form-check-label" for="generoMujer">
                                        <button type="button" class="btn radioButonGenero Mujer" id="Mujer">Mujer</button>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="password">Contraseña</label>
                                <input class="form-control" id="password" type="password" placeholder="Ingresa tu contraseña" name="password">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="repassword">Repite la contraseña</label>
                                <input class="form-control" id="repassword" type="password" placeholder="Reingresa tu contraseña" name="repassword">
                            </div>
                            <div class="form-group col-md-6">
                                <p class="infoRegistro">Completa el formulario</p>
                            </div>
                            <div class="form-group col-md-6 d-flex justify-content-end">
                                <button class="btn btn-primario" type="submit" id="btn_signup">Registrarme</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="/js/jquery-3.3.1.min.js"></script>
        <script src="/js/popper.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>
        <script src="/js/main.js"></script>
    </body>
</html>