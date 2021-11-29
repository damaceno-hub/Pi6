<?php 
    session_start();
    include_once("conexao.php");
    $btnLogin = filter_input(INPUT_POST, 'btnLogin', FILTER_SANITIZE_STRING);
    if($btnLogin) {
        $username = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        // echo "$username - $password";
        if((!empty($username)) AND (!empty($password))){
            //Gerar a senha criptografada
            //echo password_hash($password, PASSWORD_DEFAULT);
            //Pesquisar o usuario no Banco de Dados
            

            $result_usuario = "SELECT * FROM usuarios WHERE email = '$username' LIMIT 1";
            $resultado_usuario = mysqli_query($conn, $result_usuario);

            if($resultado_usuario){
                $row_usuario = mysqli_fetch_assoc($resultado_usuario);
                if(password_verify($password, $row_usuario['senha'])){
                    $_SESSION['id'] = $row_usuario['id'];
                    $_SESSION['nome'] = $row_usuario['nome'];
                    $_SESSION['email'] = $row_usuario['email'];
                    $_SESSION['telefone'] = $row_usuario['telefone'];
                    $_SESSION['bio'] = $row_usuario['bio'];
                    $_SESSION['genero'] = $row_usuario['genero_id'];
                    $_SESSION['grau_esc'] = $row_usuario['grau_esc_id'];
                    $_SESSION['usuarioNiveisAcessoId'] = $row_usuario['niveis_acesso_id'];
                    if($_SESSION['usuarioNiveisAcessoId'] == "1"){
                        header("Location: ../pags/administrativo.php"); 
                    }elseif($_SESSION['usuarioNiveisAcessoId'] == "2"){
                        header("Location: ../pags/painelfunc.php");
                    }
                    else{
                        header("Location: ../pags/cliente.php");
                    } 
                }else{
                    $_SESSION['msg'] = "Login ou Senha incorreto!";
                    header("Location: ../inicio.php");
                }
            }
            

            $nivelacesso = $_SESSION['usuarioNiveisAcessoId'];
            $result_nivel = "SELECT * FROM niveis_acessos WHERE id = '$nivelacesso'";
            $resultado_nivel = mysqli_query($conn, $result_nivel);
            while($row_nivel = mysqli_fetch_array($resultado_nivel)){
                $_SESSION['nivelId'] = $row_nivel['id'];
                $_SESSION['nivelNome'] = $row_nivel['nome'];
            }

        }else{
            $_SESSION['msg'] = "Login ou Senha incorreto!";
            header("Location: ../inicio.php");
        }
    }else{
        $_SESSION['msg'] = "Página não encontrada!";
        header("Location: ../inicio.php");
    }
?>