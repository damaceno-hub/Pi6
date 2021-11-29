<?php 
    session_start();
    if(!empty($_SESSION['id'])){

    }else{
        $_SESSION['msg'] = "Área Restrita";
        header("Location: ../index.php");
    }

    if($_SESSION['usuarioNiveisAcessoId'] == "1"){

    }elseif($_SESSION['usuarioNiveisAcessoId'] == "2"){

    }elseif($_SESSION['usuarioNiveisAcessoId'] == "0"){
    
    }else{
        $_SESSION['msg'] = "Área Restrita";
        header("Location: ../cadastro/restrito.php"); 
    }
?>

<html>
    <head>
        <title><?php echo "CLIENTE :: ".$_SESSION['nome']." "?></title>
        <meta http-equiv="X-UA-Compatible" content="chrome=1;IE=edge" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="description" content=""/>
        <meta name="keywords" content="ronindesign"/>
        <meta name="author" content="ronindesign"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        
        <!-- FAVICON -->
        <link rel="shortcut icon" type="image/x-icon" href="../img/favicon.png"/>
        <link rel="icon" type="image/png" href="../img/favicon.png"/>
        <link rel="apple-touch-icon" href="../img/favicon.png"/>

        <link href="../cadastro/css/login.css" rel="stylesheet" type="text/css" />
        <link href="../css/style.css" rel="stylesheet" type="text/css" />
        <link href="../bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="../css/animate.min.css" rel="stylesheet" type="text/css" />
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

        <script src="../js/jquery-1.11.2.min.js" type="text/javascript"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/controller.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.min.js"></script>
        <script src="../js/onclicks.js" type="text/javascript"></script>
    </head>
    <body>
        <!-- Site preloader -->
        <section id="preloader">
            <div class="site-spinner"></div>
        </section>
        <!-- End Site preloader -->

        <div id="top-head">
            <div id="rownav">
                <div class="row">

                    <div class="col">
                        <div class="img-fluid">
                            <img id="image" src="../img/logo-white.png" class="img-fluid img-pointer img-mobile"/>
                        </div>
                    </div>
                    
                    <div class="col ola-php">
                        <span>
                            <?php
                                echo "Olá <span style='color:#5c0eb4; font-weight: 600;'>".$_SESSION['nome']."</span>, Bem-Vindo! - <span style='color:#5c0eb4; font-weight: 600;'>".$_SESSION['nivelNome']."</span> ";
                            ?>
                        </span>
                    </div>
                        
                    <div id="logout" class="col">
                        <span>
                            <a href="../cadastro/sair.php" class="logout">[Sair]</a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div id="top-head">
            <div class="col-md-12 text-center">
               
                <div class="nav-menu-icon">
                    <a><i id="bar-mobile" class="fa fa-bars"></i></a>
                </div>

                <div class="nav-menu">
                    <ul class="nav-menu-inner">
                        <li><a onclick="cliente()">Home</a></li>
                        <li><a class="sublinha-nav" onclick="solicitar()">Solicitar</a></li>
                        <li><a onclick="perfil()">perfil</a></li>
                        <?php 
                            if($_SESSION['usuarioNiveisAcessoId'] == "1"){
                                echo "<li><a onclick='painelfunc()'>Painel</a></li>";
                            }elseif($_SESSION['usuarioNiveisAcessoId'] == "2"){
                                echo "<li><a onclick='painelfunc()'>Painel</a></li>";
                            }
                        ?>
                        <?php 
                            if($_SESSION['usuarioNiveisAcessoId'] == "1"){
                                echo "<li><a onclick='administrativo()'>Administrativo</a></li>";
                            }
                        ?>
                    </ul>
                </div>

            </div>
        </div>
                     
                    
                
            </div>
        </div>
    <br>
            <br>
            <br>
        <div class="container">
            <div class="row">
                
                <div class="col-12 text-center">
                    <h2 class="page-title color-white"><span class="text-light">O que deseja </span>Solicitar?</h2>
                </div>
                <br>
                <br>
            </div>
        </div>

        <div class="container">
            <div class="row infos-section" onclick="consertos()">
                <div class="col">
                    <img src="../img/services/img1.jpg" alt="img1" class="img-fluid" style="height: 400px; width: auto;
                    margin-top: 7px; border-radius: 7px">
                </div>
                <div class="col">
                    <h2 style="font-weight: 800; color: white"><span class="text-light">SOLICITAR </span>CONSERTOS</h2>
                    <p class="max-width-700 lead limite-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                    </p>
                </div>
            </div>
            <div class="row infos-section" onclick="seguros()">
                <div class="col">
                    <img src="../img/services/seguros1.jpg" alt="img2" class="img-fluid" style="height: 400px; width: auto;
                    margin-top: 7px; border-radius: 7px">
                </div>
                <div class="col">
                    <h2 style="font-weight: 800; color: white"><span class="text-light">SOLICITAR </span>SEGUROS</h2>
                    <p class="max-width-700 lead limite-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                    </p>
                </div>
            </div>
        </div>

              <br><br><br>      
                

        <footer id="foot">
            <span style="color: #fff"> &copy; 2021 <a href="#" class="namefooter"><b>Oslog Segurança</b></a>. Todos os direitos reservados.</span>
        </footer>
        <script src="../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../js/plugins/jquery.magnific-popup.min.js" type="text/javascript"></script>
        <script src="../js/clock.js" type="text/javascript"></script>

    </body>
</html>