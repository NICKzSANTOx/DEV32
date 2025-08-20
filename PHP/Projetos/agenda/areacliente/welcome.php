<?php
include("../utils/conectadb.php");
session_start();

$idcliente = $_SESSION['idcliente'];
$nomecliente = $_SESSION['nomecliente'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../css/global.css">

</head>
<body>
    <div class="global">
        <div class="topo">

            <!-- AQUI VAI TRAZER O NOME DO USUARIO LOGADO -->
            <h1>BEM VINDO <?php echo strtoupper($nomecliente)?> </h1>

            <!-- BOTÃO DE ENCERRAMENTO DE SESSÃO -->
            <div class="logout" method='post'>
                <a href='logout.php'><img src='../icons/backspace.png'width=50 height=50></a>
            </div>
        </div>

            <div class='menus'>
                OS CARDS DE MENU
                <div class="menu1">
                    <a href="cliente_perfil.php"><img src ='../icons/th2.png' width="200" height="200"></a>
                    <label>MEU PERFIL</label>
                </div>

                <div class="menu2">
                    <a href="cliente_agenda.php"><img src ='../icons/calendar.png' width="200" height="200"></a>
                    <label>AGENDA</label>
                </div>
    </div>
    
</body>
</html>