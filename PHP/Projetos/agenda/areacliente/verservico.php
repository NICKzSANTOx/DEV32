<?php

include("../utils/conectadb.php");
include("../utils/validacliente.php");


$id = $_GET['id'];

$sql = "SELECT * FROM catalogo WHERE CAT_ID = '$id'";
$enviaquery = mysqli_query($link, $sql);

while($tbl = mysqli_fetch_array($enviaquery)){
    $id = $tbl[0];
    $nomeservico = $tbl[1];
    $descricaoservico = $tbl[2];
    $precoservico = $tbl[3];
    $temposervico = $tbl[4];
    $ativo = $tbl[5];
    $imagem_atual = $tbl[6];
}

?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/catalogo.css">
    <link rel="stylesheet" href="../css/global.css">
    <link href="https://fonts.cdnfonts.com/css/master-lemon" rel="stylesheet">
    <title>CADASTRO DE SERVIÇOS</title>
</head>
<body>
    <div class="global">
        <!-- AJUSTE DA IMAGEM A PARTE -->
        <div class='imagem'>
            
            <img name='imagem_atual' src="data:image/jpeg;base64,<?= $imagem_atual?>">
        
        </div>
        
        <div class="formulario">
<!-- FIRULAS Y FIRULAS -->
 
            <a href="catalogo.php"><img src='../icons/arrow47.png' width=50 height=50 ></a>
            
            <form class='login' action="servico_altera.php" method="post" enctype="multipart/form-data">
                
                <!-- QUANDO GRAVAR, ELE COLETA O QUE VEIO DO BANCO PRA FAZER O UPDATE CORRETO -->
                <input type='hidden' name='id' value='<?= $id ?>'>

                <label><b>NOME DO SERVIÇO</b></label>
                <label name='txtnome'><?= $nomeservico ?></label>
                <br>
                <label><b>DESCRIÇÃO</b></label>
                <label name='txtdescricao'><?= $descricaoservico?></label>
                <br>
                <label><b>PREÇO</b></label>
                <label name='txtpreco'>R$ <?= $precoservico?></label>
                <br>
                <label><b>DURAÇÃO (Em Minutos)</b>  </label>
                <!-- <input type='number' name='txttempo' placeholder='Digite o tempo em Minutos' value='' required> -->
                <label><?= $temposervico <= 59? $temposervico." Minutos": ($temposervico / 60)." Hora(s)"?> </label> <!--COLETA TEMPO DO CAT [4]-->
                <br>

                <!-- TODO TELA DE VERSERVIÇO PARA AGENDAMENTO -->
                <!-- SELECT PARA VER DATA DISPONÍVEL PARA CABELEIREIRO  -->
                <!-- SELECT PARA VER QUAL CABELEIREIRO DISPONÍVEL NESSA DATA -->
                
                <input type='submit' value='AGENDAR'>
            </form>
            <br>
        </div>
        

    </div>

</body>
</html>