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
        <title><?php echo "PERFIL :: ".$_SESSION['nome']." "?></title>
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

        <!-- CSS / JS -->
        <link href="../cadastro/css/login.css" rel="stylesheet" type="text/css" />
        <link href="../css/style.css" rel="stylesheet" type="text/css" />
        <link href="../bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="../css/animate.min.css" rel="stylesheet" type="text/css" />
        <link href="../css/perfil.css" rel="stylesheet" type="text/css" />
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
                        <li><a onclick="solicitar()">Solicitar</a></li>
                        <li><a class="sublinha-nav" onclick="perfil()">Perfil</a></li>
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

            
            <div class="container emp-profile">
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/4/43/Foto_Perfil.jpg" alt=""/>
                            <div class="file btn btn-lg btn-primary">
                                Trocar Foto
                                <input type="file" name="file"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                        <?php
                                            echo $_SESSION['nome'];
                                        ?>
                                    </h5>
                                    <h6>
                                        NÍVEL ACESSO: <?php echo $_SESSION['nivelNome']; ?>
                                    </h6>
                                    <p class="proile-rating">RANKINGS : <span>8/10</span></p>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Sobre</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Editar Perfil"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-work">
                            <p>SOCIAIS</p>
                            <a href="">Facebook</a><br/>
                            <a href="">Instagram</a><br/>
                            <a href="">LinkedIn</a>
                            <p>HABILIDADES</p>
                            <a href="">Web Designer</a><br/>
                            <a href="">Web Developer</a><br/>
                            <a href="">WordPress</a><br/>
                            <a href="">WooCommerce</a><br/>
                            <a href="">PHP, .Net</a><br/>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Nome</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>
                                                <?php
                                                        echo $_SESSION['nome'];
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>E-mail</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>
                                                <?php
                                                        echo $_SESSION['email'];
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Telefone</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>
                                                <?php
                                                        echo $_SESSION['telefone'];
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Biografia</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>
                                                    <?php
                                                        echo $_SESSION['bio'];
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                            </div>
                    </div>
                </div>
            </form>           
                        </div>
                        

        <footer id="foot">
            <span style="color: #fff"> &copy; 2021 <a href="#" class="namefooter"><b>Oslog Segurança</b></a>. Todos os direitos reservados.</span>
        </footer>
        <script src="../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../js/plugins/jquery.magnific-popup.min.js" type="text/javascript"></script>
        <script src="../js/clock.js" type="text/javascript"></script>

    </body>
</html>