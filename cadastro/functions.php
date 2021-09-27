<?php
    function verifica_dados($conn){
        if(isset($_POST['env']) && $_POST['env'] == "form"){
            $email = addslashes($_POST['email']);
            $sql = $conn->prepare("SELECT * FROM usuarios WHERE email = ?");
            $sql->bind_param("s", $email);
            $sql->execute();
            $get = $sql->get_result();
            $total = $get->num_rows;

            if($total > 0){
                $dados = $get->fetch_assoc();
                add_dados_recover($conn, $email);
            }else{

            }
        }
    }

    function add_dados_recover($conn, $email){
        $rash = md5(rand());
        $sql = $conn->prepare("INSERT INTO recover_solicitation (email, rash) VALUES (?, ?)");
        $sql->bind_param("ss", $email, $rash);
        $sql->execute();

        if($sql->affected_rows > 0 ){
            enviar_email($conn, $email, $rash);
        }
    }

    function enviar_email($conn, $email, $rash){
        $destinatario = $email;

        $subject = "RECUPERAR SENHA";
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
        $message = "<html><head>";
        $message .= "
            <h2>Você solicitou uma nova senha?<h2>
            <hr>
            <h3>Se sim, aqui está o link para você alterar a sua senha:<h3>
            <a href='".sitedir."?pagina=alterar&rash={$rash}'>".sitedir."?pagina=alterar&rash={$rash}</a>
            <hr>
            <h5>Não foi você quem solicitou? Ignore este e-mail, porém alguém tentou alterar seus dados.</h5>
            <hr>
            Atenciosamente, Oslog Segurança. 
        ";
        $message .= "</head></html>";

        if(mail($destinatario, $subject, $message, $headers)){
            echo "<div class='alert alert-success'>Os dados foram enviados para o seu e-mail.</div>";
        }else{
            echo "<div class='alert alert-danger'>Erro ao enviar.</div>";
        }
    }
?>