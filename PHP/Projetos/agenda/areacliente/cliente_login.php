<?php
// CONEXÃO COM O BANCO DE DADOS
include("../utils/conectadb.php");

// ATIVA A VARIAVEL E USO DA SESSÃO
session_start();

if($_SERVER['REQUEST_METHOD']=='POST'){
    // COLETA OS DADOS DO CAMPO DE TEXTO DO HTML
    $cpf = $_POST['txtcpf'];
    $senha = md5($_POST['txtsenha']);

    // VERIFICA SE CLIENTE EXISTE
    $sqlcli = "SELECT COUNT(CLI_ID) from clientes 
    WHERE CLI_CPF = '$cpf' AND CLI_SENHA = '$senha'";

    $enviaquery = mysqli_query($link, $sqlcli);
    $retorno = mysqli_fetch_array($enviaquery) [0];

    // TODO PARA AMANHÃ
    // SANITIZAR O ERRO FLICK NO ERRO DE USU E SENHA (SUPONHO VARIAVEL VAZIA DE ID)

    // FIM COLETA NOME FUNCIONARIO
    // VALIDAÇÃO DO RETORNO

    if($retorno == 1){
        $sqlcli = "SELECT CLI_ID, CLI_NOME from clientes 
        WHERE CLI_CPF = '$cpf' AND CLI_SENHA = '$senha'";

        $enviaquery = mysqli_query($link, $sqlcli);
        
        while($cli = mysqli_fetch_array($enviaquery)){
                $_SESSION['nomecliente'] = $cli[1];
                $_SESSION['idcliente'] = $cli[0];
        }

        Header("Location: welcome.php");
    }
    else{
        echo("<script>window.alert('LOGIN OU SENHA INCORRETOS');</script>");
        echo("<script>window.location.href='index.php';</script>");
    }



}