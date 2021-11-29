<?php
    session_start();
    ob_start();
    include_once("cadastro/includes.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="br" lang="br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="ronindesign">
    
        <title>Login :: Oslog</title>

        <!-- FAVICON -->
        <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png"/>
        <link rel="icon" type="image/png" href="img/favicon.png"/>
        <link rel="apple-touch-icon" href="img/favicon.png"/>

        <!-- CSS -->
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="css/signin.css" rel="stylesheet">

        <!-- JS -->
        <script src="js/jquery-1.11.2.min.js" type="text/javascript"></script>
  
    </head>
    
    <body onload="initClock()">
        <nav id="head"></nav>
        <div class="container">
        
            <div class="centralizar">
                <div class="col-md">    
                    <?php
                        $url = (isset($_GET['pagina'])) ? $_GET['pagina'] : 'login';
                        $dir = "pags/";
                        $ext = ".php";

                        if(file_exists($dir.$url.$ext)){
                            include($dir.$url.$ext);
                        }else{
                            echo "<div class='alert alert-danger'>Página não encontrada</div>";
                        }
                    ?>
                </div>
            </div>
        </div>
        
        <footer id="foot">
            <span style="color: #fff"> &copy; 2021 <a href="#" class="namefooter"><b>Oslog Segurança</b></a>. Todos os direitos reservados.</span>
        </footer>
        <script src="js/clock.js" type="text/javascript"></script>
  </body>
</html>