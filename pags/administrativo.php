<?php 
    session_start();
    if(!empty($_SESSION['id'])){
        
    }else{
        $_SESSION['msg'] = "Área Restrita";
        header("Location: ../index.php");
    }

    if($_SESSION['usuarioNiveisAcessoId'] == "1"){
        
    }
    else{
        $_SESSION['msg'] = "Área Restrita";
        header("Location: ../cadastro/restrito.php");
    } 

?>
<html>
    <head>
        <title><?php echo "ADMINISTRATIVO :: ".$_SESSION['nome']." "?></title>
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

        <script type="text/javascript">
            function logout() {
            window.open("../cadastro/sair.php", '_parent');
            }
            
            function forum() {
                window.open("../pags/cliente.php", '_parent');
            }

            function painel() {
                window.open("../pags/painel.php", '_parent');
            }

        </script>
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
                            <img id="image" src="../img/logo-oslog.png" class="img-fluid img-pointer img-mobile"/>
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
                            <a onclick="logout()" class="logout">[Sair]</a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
            <br>
            <br>
        <div class="container">
            <div class="row">

                <div class="col-md-12 text-center">
                    <h2 class="title-pg color-white"><span class="text-light">Para onde </span>deseja ir:</h2>
                </div>
                <div class="w-100"></div>
                <div class="col">
                    <div class="botton-mid" onclick="forum()">
                        <div class="style-cont-mid">
                            <a><i class="fa fa-strikethrough" style="font-size: 100px"></i></a>
                            <br>
                            <span style="font-size: 50px">Cliente</span>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="botton-mid" onclick="painel()">
                        <div class="style-cont-mid">
                            <a><i class="fa fa-puzzle-piece style-cont-mid" style="font-size: 100px"></i></a>
                            <br>
                            <span class="style-cont-mid" style="font-size: 50px">PAINEL</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <br>
            <br>
            <br>
        <footer id="foot">
            <span style="color: #fff"> &copy; 2021 <a href="#" class="namefooter"><b>TEIA Formulário</b></a>. Todos os direitos reservados.</span>
         </footer>
         
        <script src="../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../js/plugins/jquery.magnific-popup.min.js" type="text/javascript"></script>
        <script src="../js/clock.js" type="text/javascript"></script>

    </body>
</html>