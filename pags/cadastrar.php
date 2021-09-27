<?php
	session_start();
    ob_start();
    include_once("../cadastro/conexao.php");
    $btnCadUsuario = filter_input(INPUT_POST, 'btnCadUsuario', FILTER_SANITIZE_STRING);
    if($btnCadUsuario){
        
        $dados_rc = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        $erro = false;

        $dados_st = array_map('strip_tags', $dados_rc);
        $dados = array_map('trim', $dados_rc);

        if(in_array('',$dados)){
            $erro = true;
            $_SESSION['msg'] = "Necessário Preencher todos os campos.";
        }else{
            $result_usuario = "SELECT id FROM usuarios WHERE email = '". $dados['email'] ."'";
            $resultado_usuario = mysqli_query($conn, $result_usuario);
            if(($resultado_usuario) AND ($resultado_usuario->num_rows != 0)){
                $erro = true;
                $_SESSION['msg'] = "Este usuário ja existe.";

            }

            $result_usuario = "SELECT id FROM usuarios WHERE email = '". $dados['email'] ."'";
            $resultado_usuario = mysqli_query($conn, $result_usuario);
            if(($resultado_usuario) AND ($resultado_usuario->num_rows != 0)){
                $erro = true;
                $_SESSION['msg'] = "Este e-mail ja existe.";

            }
        }
        
        if(!$erro){
            //var_dump($dados);
            $dados['password'] = password_hash($dados['password'], PASSWORD_DEFAULT);

            $result_usuario = "INSERT INTO usuarios (nome, email, senha, telefone, genero_id, created) VALUES (
                '" .$dados['nome']. "',
                '" .$dados['email']. "',
                '" .$dados['password']. "',
                '" .$dados['telefone']. "',
                '" .$dados['select_genero']. "',
                NOW()
            )";

            $resultado_usuario = mysqli_query($conn, $result_usuario);
            if(mysqli_insert_id($conn)){
                $_SESSION['msgcad'] = "Usuário cadastrado com Sucesso";
                header("Location: ../index.php");
            }else{
                $_SESSION['msg'] = "Erro ao cadastrar o usuário";
            }
        }
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="br" lang="br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="ronindesign">
    
        <title>Cadastro :: Formulário</title>

        <!-- FAVICON -->
        <link rel="shortcut icon" type="image/x-icon" href="../img/favicon.png"/>
        <link rel="icon" type="image/png" href="../img/favicon.png"/>
        <link rel="apple-touch-icon" href="../img/favicon.png"/>

        <!-- CSS -->
        <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="../css/signin.css" rel="stylesheet">

        <!-- JS -->
        <script src="../js/mtel.js" type="text/javascript"></script>
        <script src="../js/jquery-1.11.2.min.js" type="text/javascript"></script>

    </head>
    
    <body onload="initClock()">
        <nav id="head"></nav>
        <div class="container">
            <div class="centralizar">
                <div class="col-md">                       

                    <form class="form-signin auth_form" name="login" id="loginform" method="post" action="">

                        <div class="text-center">
                            <div class="logo">
                                <img src="../img/logo-oslog.png" class="img-fluid img-pointer"/>
                                <ul>
                                    <li><a class="baixologo" href="../index.php">Home</a></li>
                                    <li><a class="baixologo" href="../index.php">Login</a></li>
                                </ul>
                            </div>
                        </div>
                        <br><br>
                        
                        <label for="inputEmail" class="sr-only">Nome</label>
                        <input type="text" name="nome" id="nome" class="form-control" required="required" maxlength="20" pattern="[A-Za-z0-9_ ]{1,20}" placeholder="Nome" autofocus="autofocus" />
                        <label for="inputEmail" class="sr-only">Email</label>
                        <input type="text" name="email" id="email" class="form-control" required="required" maxlength="50" placeholder="E-mail" autofocus="autofocus" />
                        <label for="inputPassword" class="sr-only">Senha</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password" required="required" maxlength="100" pattern=".{6,100}" />
                        <label for="inputTel" class="sr-only">Telefone</label>
                        <input type="text" name="telefone" id="telefone" class="form-control" required="required" maxlength="16" onkeyup="mascara( this, mtel );" onkeypress="return somenteNumeros(event)" placeholder="Telefone"  autofocus="autofocus" />

                        <div id="select_genero" class="custom-select-genero">
                            <select name="select_genero">
                                <option value="0">Gênero</option>
                                <?php
                                    $result_genero = "SELECT * FROM genero";
                                    $resultado_genero = mysqli_query($conn, $result_genero);
                                    while($row_genero = mysqli_fetch_assoc($resultado_genero)){ ?>
                                        <option value="<?php echo $row_genero['id']; ?>"><?php echo $row_genero['nome']; ?></option> <?php
                                    }
                                ?>
                            </select>
                        </div>

                        <div id="select_genero" class="custom-select-genero">
                            
                        </div>
                        <button class="btn btn-lg btn-danger btn-block btn-color submit" type="submit" name="btnCadUsuario" value="Cadastrar" class="cadastro">Cadastrar</button>
                        
                    </form>
                   
                    <div class="col-md">
                        <div class="text-center">
                            <div>
                                <!--inicio clock-->
                                <div class="datetime">
                                    <div class="date">
                                        <span id="dayname">Dia</span>,
                                        <span id="daynum">00</span> de
                                        <span id="month">Mes</span>,
                                        <span id="year">Ano</span>
                                    </div>
                                    <div class="time">
                                        <span id="hour">00</span>:
                                        <span id="minutes">00</span>:
                                        <span id="seconds">00</span>
                                        <span id="period">AM</span>
                                    </div>
                                </div>
                                <!--fim clock-->
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <br>
                </div>
            </div>
        </div>

        <footer id="foot">
            <span style="color: #fff"> &copy; 2021 <a href="#" class="namefooter"><b>TEIA Formulário</b></a>. Todos os direitos reservados.</span>
        </footer>
        <script src="../js/clock.js" type="text/javascript"></script>
        <script src="../js/selectitem.js" type="text/javascript"></script>
  </body>
</html>
