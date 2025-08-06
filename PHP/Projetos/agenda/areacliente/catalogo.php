<?php
include("../utils/conectadb.php");
// FAZER O INCLUDE DO VALIDACLIENTE

$sql = "SELECT * FROM catalogo WHERE CAT_ATIVO = 1";
$enviaquery = mysqli_query($link, $sql);

?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- APONTA OS CSS ENVOLVIDOS -->
    <link rel="stylesheet" href="../css/globalcliente.css">
    <title>CATÁLOGO SALLONCCINA</title>
</head>
<body>
    <div class="global">

        <!-- FAZER O ESQUEMA DE ANÁLISE DE LOGIN -->

        <!-- <div class="topo"> -->

            <!-- AQUI VAI TRAZER O NOME DO USUARIO LOGADO -->
            <!-- <h1>BEM VINDO <?php // echo strtoupper($nomeusuario)?> </h1> -->

            <!-- BOTÃO DE ENCERRAMENTO DE SESSÃO -->
            <!-- <div class="logout" method='post'> -->
                <!-- <a href='logout.php'><img src='icons/backspace.png'width=50 height=50></a> -->
            <!-- </div> -->
        <!-- </div> -->
    
            <div class='menus'>
                <!-- OS CARDS DE MENU -->
            
                <!-- AQUI O PORTAL COMEÇA -->
            <?php   
            while($retorno = mysqli_fetch_array($enviaquery)){
            ?>
                <div class="menu1">
                    <label><?= $retorno[1]?></label> <!--COLETA O NOME DO SERVIÇO POS 1 -->
                    <img src ='data:image/jpeg;base64,<?= $retorno[6]?>' width="200" height="200">
                    <div class='texto-card'>
                        <label>DESCRIÇÃO</label>
                        <br>
                        <text><?= $retorno[2]?></text> <!--COLETA A DESCRICAO DO SERVIÇO POS 2 -->
                        <br>
                        <br>
                        <label>TEMPO DO CORTE</label>
                        <br>
                        <text><?= $retorno[4] <= 59? $retorno[4]." Minutos": ($retorno[4] / 60)." Hora(s)"?> </text> <!--COLETA TEMPO DO CAT [4]-->
                       
                    </div>
                    <label>PREÇO DO SERVIÇO</label>
                    <text>R$ <?= $retorno[3]?></text> <!--COLETA A PREÇO DO SERVIÇO POS 3 -->
                    <!-- USANDO GET BRABO -->
                    <a href='verservico.php?id=<?= $retorno[0]?>'><button><img src='../icons/zoom1.png' width=50 height=50></button></a>
                    
                </div>
            <?php
            }
            ?>
                <!-- FIM PORTAL -->
            </div>
    </div>
    
</body>
</html>