<?php
    require_once('php/ConectarBD.php');
    session_start();
    if (!isset($_SESSION['usuario'])){
        header('location:/');
    }
    $resultado = $mysqli->query("SELECT * FROM publicaciones ORDER BY created_at DESC");
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
        <nav class="navbar navbar-light shadow-sm fixed-top" style="background-color: white; z-index: 100;">
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
                        <button class="btn mr-md-2 d-flex flex-column align-items-center justify-content-center p-0" type="button">
                            <span class="numNotif">5</span>
                            <i class="icon-notif" style="color: var(--colorPrincipal);font-size: 1.5rem;"></i>
                        </button>
                        <div class="btn-group">
                            <button class="btn mr-md-2 d-flex flex-column align-items-center justify-content-center p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="numNotif">5</span>
                                <i class="icon-message" style="color: var(--colorPrincipal);font-size: 1.5rem;"></i>
                            </button>
                            <div class="dropdown-menu" style="left:-250%;">
                                <div class="dropdown-item d-flex align-items-center justify-content-start">
                                    <div class="fotoPerfilMessage rounded-circle overflow-hidden d-flex align-items-center justify-content-center mr-3" style="width: 40px; height: 40px;">
                                        <img src="http://lorempixel.com/40/40" alt="Foto de Perfil" class="w-100">
                                    </div>
                                    <div class="textoMensaje">
                                        <p class="m-0">Hola! :D</p>
                                        <small>2019-02-04 21:24:58</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="btn-group ml-md-4">
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
        <div class="container d-flex flex-column align-items-center justify-content-start mt-5 pt-5 pt-md-0" id="app">
            <div class="row flex-nowrap mb-4 mt-5 mt-md-4" id="mainHistorias">
                <div class="col-1 col-md-1 h-100 flechasHistorias"><span class="icon-left"></span></div>
                <div class="col-10 col-md-10 h-100 overflow-auto" id="historias">
                    <div class="historiasItem rounded mx-1 flex-shrink-0"></div>
                    <div class="historiasItem rounded mx-1 flex-shrink-0"></div>
                    <div class="historiasItem rounded mx-1 flex-shrink-0"></div>
                    <div class="historiasItem rounded mx-1 flex-shrink-0"></div>
                    <div class="historiasItem rounded mx-1 flex-shrink-0"></div>
                    <div class="historiasItem rounded mx-1 flex-shrink-0"></div>
                </div>
                <div class="col-1 col-md-1 h-100 flechasHistorias"><span class="icon-right"></span></div>
            </div>
            <div class="row" id="mainGeneral">
                <aside class="d-none d-md-block col-md-3" id="aside-perfil">
                    <a href="/perfil.php?user=<?php echo $_SESSION['usuario']['nombre']; ?>" class="text-decoration-none">
                        <div class="card rounded w-100"><img class="w-100" src="http://lorempixel.com/400/200" alt="Foto de Perfil">
                            <div class="card-body">
                                <h5 class="card-title text-center" style="color: var(--colorPrincipal);" id="usuarioActual"><?php echo $_SESSION['usuario']['nombre']; ?></h5>
                            </div>
                        </div>
                    </a>
                </aside>
                <article class="col-md-6" id="mainPost">
                    <div class="card card-body mb-4 d-flex d-md-none">
                        <h6 class="card-title text-center" style="color: var(--colorPrincipal);">Versiculo del día</h6>
                        <p class="versiculoDiario text-center">Y considerémonos unos a otros para estimularnos al amor y a las buenas obras;</p><small class="citaDiaria text-right text-muted">Hebreos 10:24 (RVR1960)</small>
                        <div class="controlVersiculosDiarios mt-4 d-flex justify-content-end"><button class="btn btn-primario mx-2" type="button"><span class="icon-heart"></span></button><button class="btn btn-primario mx-2" type="button"><span class="icon-share"></span></button></div>
                    </div>
                    <div class="newPost rounded w-100 shadow-sm">
                        <form class="form-inline h-100 w-100" action="/php/newPost.php" method="POST" id="newPost" enctype="multipart/form-data">
                            <label class="d-flex justify-content-center align-item-center h-100 border m-0" id="labelArchivo" for="archivo">
                                <span class="icon-plus d-flex align-items-center" style="font-size: 2rem;"></span>
                            </label>
                            <input id="archivo" name="archivo" type="file" hidden="true">
                            <div class="h-100 d-flex flex-column justify-content-center py-md-3" id="mainTextareaPost">
                                <textarea name="texto" class="form-control mb-3" id="textareaPost" rows="2" style="resize: none;" placeholder="¿Quieres compartir algo?"></textarea>
                                <div class="newPostControl d-flex justify-content-between">
                                    <small style="color: red;" id="infoNewPost"></small>
                                    <button class="btn btn-primario" type="button" id="newPostBtn">Publicar</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- ItemPost -->
                    <?php while ($post = $resultado->fetch_assoc()){ ?>
                        <div class="card postItem w-100 mt-4">
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
                                    <div class="col-md-7 p-0 controlPost">
                                        <div class="megusta d-flex flex-column align-items-center">
                                            <?php
                                            $like = $mysqli->query("SELECT * FROM likes WHERE post = ".$post['id']." AND usuario = ".$_SESSION['usuario']['id'].""); 
                                            if(mysqli_num_rows($like) == 1){
                                            ?>
                                            <span class="icon-heart iconosPost mx-4" id="<?php echo $post['id']; ?>" style="color: red;"></span>
                                            <?php }else{ ?>
                                            <span class="icon-heart iconosPost mx-4" id="<?php echo $post['id']; ?>"></span>
                                            <?php }; ?>
                                            <small style="margin-top: -5px;" class="countLikes" id="likes_<?php echo $post['id']; ?>"><?php echo $post['likes']; ?></small>
                                        </div>
                                        <div class="megusta d-flex flex-column align-items-center">
                                            <a class="text-decoration-none" data-toggle="collapse" href="#" data-target="#collapseComment" role="button" aria-expanded="false" aria-controls="collapseComment">
                                                <span class="icon-comment iconosPost mx-4"></span>
                                            </a>
                                            <small style="margin-top: -5px;" class="countComment">0</small>
                                        </div>
                                        <div class="megusta d-flex flex-column align-items-center">
                                            <a class="text-decoration-none" href="#collapseComment" role="button">
                                                <span class="icon-share iconosPost mx-4"></span>
                                            </a>
                                            <small style="margin-top: -5px;" class="countShare">0</small>
                                        </div>
                                    </div>
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
                    <!-- ItemPost -->

                </article>
                <aside class="col-md-3 d-none d-md-flex align-items-start" id="asideInformacion">
                    <div class="card card-body">
                        <h6 class="card-title text-center" style="color: var(--colorPrincipal); font-size: .9rem;">Versiculo del día</h6>
                        <p class="versiculoDiario card-text text-center" style="font-size: .8rem;">Y considerémonos unos a otros para estimularnos al amor y a las buenas obras;</p><small class="citaDiaria card-text text-right text-muted" style="font-size: .7rem;">Hebreos 10:24 (RVR1960)</small>
                        <div class="controlVersiculosDiarios mt-4 d-flex justify-content-center justify-content-lg-end"><button class="btn btn-primario mx-1 mx-lg-2" type="button"><span class="icon-heart"></span></button><button class="btn btn-primario mx-1 mx-lg-2" type="button"><span class="icon-share"></span></button></div>
                    </div>
                </aside>
            </div>
        </div>
                                                    
        <script src="/js/jquery-3.3.1.min.js"></script>
        <script src="/js/popper.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>
        <script src="/js/main.js"></script>
    </body>
</html>