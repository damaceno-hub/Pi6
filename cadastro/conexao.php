<?php
    header('Content-Type: text/html; charset=utf-8');
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $dbname = "oslog";
    
    //Criar a conexao
    ini_set('default_charset', 'UTF-8');
    $conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
    $conn->query("SET NAMES utf8");

    if(!$conn){
		  die("Falha na conexao: " . mysqli_connect_error());
	  }else{
		//echo "Conexao realizada com sucesso";
	  }	
?>