<?php
    require_once('php/ConectarBD.php');
    session_start();
    if (!isset($_SESSION['usuario'])){
        header('location:/');
    };

    $nombre=$_GET["user"];

    $datos = $mysqli->query("SELECT * FROM usuarios WHERE nombre = '$nombre'");
    $resultado = $mysqli->query("SELECT * FROM publicaciones WHERE usuario = '$nombre' ORDER BY created_at DESC");

?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Inicio</title>
        <link href="https://file.myfontastic.com/WHLVNBkBpkf89yyuivCyNm/icons.css" rel="stylesheet">
        <link rel="stylesheet" href="/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/estilos.css">
    </head>

    <body style="background-color: #ededed;">
        <!-- Barra de Navegación-->
        <nav class="navbar navbar-light shadow-sm" style="background-color: white; z-index: 100;">
            <div class="container h-100 justify-content-center">
                <div class="row w-100 h-100 d-flex" id="navegacion">
                    <div class="col-4 col-md-4 h-100 d-flex align-item-center justify-content-start">
                        <a class="navbar-brand" href="/">
                            <img class="d-inline-block align-top rounded align-middle" src="/images/LOGO.png" height="38" alt="">
                            <p class="d-none d-md-inline-block ml-2 mb-0 align-middle">Red Social</p>
                        </a>
                    </div>
                    <div class="col-8 col-md-4 h-100 d-flex align-item-center justify-content-end justify-content-md-center p-0">
                        <form class="d-flex w-100" action="search" method="post">
                            <input class="form-control w-100" type="search" placeholder="Busqueda" aria-label="Busqueda">
                            <button class="d-inline-block btn btn-primario" type="submit">
                                <span class="icon-search"></span>
                            </button>
                        </form>
                    </div>
                    <div class="col-12 col-md-4 h-100 d-flex align-item-center justify-content-between justify-content-md-end p-0 mt-4 mt-md-0">
                        <button class="btn icon-notif mr-md-2" type="button"></button>
                        <button class="btn icon-message mr-md-2" type="button"></button>
                        <button class="btn icon-users mr-md-2" type="button"></button>
                        <div class="btn-group">
                            <button type="button" class="btn btn-primario dropdown-toggle rounded" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="http://lorempixel.com/40/40" alt="Foto Perfil" class="rounded-circle">
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="/">Inicio</a>
                                <a class="dropdown-item" href="/perfil.php?user=<?php echo $_SESSION['usuario']['nombre']; ?>">Perfil</a>
                                <a class="dropdown-item" href="/php/logout.php">Salir</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <div class="container d-flex flex-column align-items-center justify-content-start" id="app">
            <div class="row w-100 d-flex justify-content-center align-items-center" style="height: 400px;">
                <div class="portadaPerfil d-flex align-items-center justify-content-center w-100 overflow-hidden" style="height: 340px;"><img class="h-100" src="http://lorempixel.com/1000/300" /></div>
                <?php while ($info = $datos->fetch_assoc()){ ?>
                <div class="infoPerfil w-100 d-flex justify-content-center align-items-center" style="background-color: white; height: 60px;">
                    <p class="nacimiento mx-3 mb-0"><?php echo $info['nacimiento']; ?></p>
                    <p class="usuario mx-3 mb-0 font-weight-bolder" style="color: var(--colorPrincipal);"><?php echo $info['nombre']; ?></p>
                    <div class="fotoPerfil mx-3 rounded-circle overflow-hidden d-flex justify-content-center align-item-center border shadow" style="width: 200px; height: 200px;"><img class="w-100" src="http://lorempixel.com/400/400" alt="Foto de perfil" /></div>
                    <p class="localidad mx-3 mb-0"><?php
                        
                        $residencia = $info['residencia'];
                        $recorte = explode(", ", $residencia);
                        $ciudad = $recorte[0];

                        echo $ciudad;

                        ?></p>
                    <p class="Relacion mx-3 mb-0"><?php echo $info['relacion']; ?></p>
                </div>
                <?php }; ?>
                <div class="row w-100 d-flex align-items-center justify-content-between my-2" style="height: 60px;">
                    <a class="col-md-2 p-0 d-flex w-100 h-100 text-decoration-none" href="#versiculoId">
                        <div class="d-flex p-2 align-items-center justify-content-center rounded w-100" style="background-color: white;">
                            <p class="text-center mb-0">Versiculo que lo identifica</p>
                        </div>
                    </a>
                    <a class="col-md-2 p-0 d-flex w-100 h-100 text-decoration-none" href="#testimonio">
                        <div class="d-flex p-2 align-items-center justify-content-center rounded w-100" style="background-color: white;">
                            <p class="text-center mb-0">Testimonio</p>
                        </div>
                    </a>
                    <div class="col-md-3 h-100"></div>
                    <a class="col-md-2 p-0 d-flex w-100 h-100 text-decoration-none" href="#pasion">
                        <div class="d-flex p-2 align-items-center justify-content-center rounded w-100" style="background-color: white;">
                            <p class="text-center mb-0">Pasión</p>
                        </div>
                    </a>
                    <a class="col-md-2 p-0 d-flex w-100 h-100 text-decoration-none" href="#fraseFavorita">
                        <div class="d-flex p-2 align-items-center justify-content-center rounded w-100" style="background-color: white;">
                            <p class="text-center mb-0">Frase favorita</p>
                        </div>
                    </a>
                </div>
                <div class="row w-100 mt-4">
                    <div class="col-md-3 p-0">
                        <a class="text-decoration-none" href="perfil/fotos">
                            <div class="botonFotos w-100 rounded d-flex align-items-center justify-content-center my-4" style="height: 60px; background-color: white;">
                                <p class="text-center mb-0 font-weight-bold">Fotos</p>
                            </div>
                        </a>
                        <a class="text-decoration-none" href="perfil/videos">
                            <div class="botonFotos w-100 rounded d-flex align-items-center justify-content-center my-4" style="height: 60px; background-color: white;">
                                <p class="text-center mb-0 font-weight-bold">Videos</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <!--ItemPost-->
                        <?php while ($post = $resultado->fetch_assoc()){ ?>
                        <div class="card postItem w-100 my-4">
                        <?php if(!empty($post['media'])){ ?>
                        <img class="w-100" src="<?php echo 'post/'.$post['media']; ?>" alt="Foto publicada" />
                        <?php }; ?>
                            <div class="card-body shadow-sm border-bottom">
                                <div class="container-fluid d-flex">
                                    <p class="mb-4"><?php echo $post['texto'] ?></p>
                                </div>
                                <div class="container-fluid d-flex">
                                    <div class="col-md-5 infoPost p-0">
                                        <a class="rounded-circle d-inline-block mr-md-3" href="/perfil.php?user=<?php echo $post['usuario']; ?>">
                                            <div class="bg-primario rounded-circle d-flex" style="width: 40px; height: 40px; overflow: hidden; align-items: center; justify-content: center;"><img src="http://lorempixel.com/50/50" alt="" /></div>
                                        </a>
                                        <div class="textPost">
                                            <a href="/perfil.php?user=<?php echo $post['usuario']; ?>" class="text-decoration-none" style="color: var(--colorPrincipal);"><h6 class="card-title text-left m-0"><?php echo $post['usuario']; ?></h6></a>
                                            <p class="card-text m-0"><small class="text-muted"><?php echo $post['created_at']; ?></small></p>
                                        </div>
                                    </div>
                                    <div class="col-md-7 p-0 controlPost"><a class="text-decoration-none" href="#collapseComment" role="button"><span class="icon-heart iconosPost mx-4"></span></a><a class="text-decoration-none" data-toggle="collapse" href="#" data-target="#collapseComment" role="button"
                                            aria-expanded="false" aria-controls="collapseComment"><span class="icon-comment iconosPost mx-4"></span></a><a class="text-decoration-none" href="#collapseComment" role="button"><span class="icon-share iconosPost mx-4"></span></a></div>
                                </div>
                            </div>
                            <div class="collapse w-100" id="collapseComment">
                                <div class="container-fluid">
                                    <div class="row newComment border py-4">
                                        <div class="col-md-2 d-flex align-items-center justify-content-center">
                                            <a class="rounded-circle" href="perfil">
                                                <div class="bg-primario rounded-circle d-flex" style="width: 40px; height: 40px; overflow: hidden; align-items: center; justify-content: center;"><img src="http://lorempixel.com/50/50" alt="" /></div>
                                            </a>
                                        </div>
                                        <div class="col-md-10">
                                            <form class="d-flex flex-column align-items-end justify-content-center w-100 h-100 px-4" action="newComment" method="get"><textarea class="mb-2" name="comentario" rows="2" placeholder="Escribe un comentario" style="width: 100%; resize: none; border: none; border-bottom: 1px solid #ced4da;"></textarea><button class="btn btn-primario" type="submit"
                                                    role="button">Comentar</button></form>
                                        </div>
                                    </div>
                                    <div class="row comentarioItem">
                                        <div class="col-md-2 d-flex flex-column align-items-center justify-content-center py-3">
                                            <a class="rounded-circle mb-2" href="perfil">
                                                <div class="bg-primario rounded-circle d-flex" style="width: 40px; height: 40px; overflow: hidden; align-items: center; justify-content: center;"><img src="http://lorempixel.com/50/50" alt="" /></div>
                                            </a>
                                            <h6 class="text-center mb-2">Usuario</h6><small class="text-center text-muted">22/01/2019</small><small class="text-center text-muted">00:28 hs</small></div>
                                        <div class="col-md-10 d-flex flex-column justify-content-center align-items-center">
                                            <p>Esto es un comentario</p>
                                            <div class="controlComentarios w-100 d-flex justify-content-end align-items-center px-4"><a class="text-decoration-none" href="#collapseComment" role="button"><span class="icon-heart iconosPost mx-2"></span></a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php }; ?>
                    </div>
                </div>
            </div>
        </div>
        
        <script src="/js/jquery-3.3.1.min.js"></script>
        <script src="/js/popper.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>
        <script src="/js/main.js"></script>
    </body>
</html>