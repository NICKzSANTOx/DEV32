<?php

include("../utils/conectadb.php");
include("../utils/validacliente.php");
<<<<<<< Updated upstream
include("../utils/verificaagenda.php");
=======

date_default_timezone_set('America/Sao_Paulo');

>>>>>>> Stashed changes

// COLETANDO O SERVIÇO SELECIONADO DO CATALOGO
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

// COLETA CABELEIREIRO
$sqlfuncionario = "SELECT FUN_ID, FUN_NOME FROM funcionarios 
    WHERE FUN_NOME != 'Administrador'";
$enviaqueryfun = mysqli_query($link, $sqlfuncionario);

// VERIFICA AGENDA


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
<<<<<<< Updated upstream
                <input type='submit' value='AGENDAR'>    
            </form>
                <!-- SELECIONA O CABELEIREIRO -->
                <!-- CRIAR UM FORM DE VERIFICA HORARIO -->
                <form class='login' action='../utils/verificaagenda.php' method="post" onchange="this.form.submit()">
                    <select class='opt' name='idfuncionario' >
                        <option value='sem funcionario'>SELECIONE UM CABELEIREIRO</option>
                        
                        <!-- PREENCHENDO LISTA -->
                        <?php while($funcionario = mysqli_fetch_array($enviaqueryfun)){ ?>
                            <option value='<?= $funcionario[0]?>'>
                                <?= $funcionario[1]?>
                            </option>
                        <?php } ?> 
                    </select>
                    
                    <br>
                    <!-- COLETA DATA -->
                    <input type='date' name='data'>
                    
                    <br>
                    <!-- COLETA HORA -->
                    <!-- SELECT OPTION LISTA DE OPÇÕES  -->
                    <!-- RESPEITA O FORMATO DE HORA 00:00:00 -->
                    <select class='opt' name="horario">
                        <option value="08:00:00">08:00</option>
                        <option value="08:30:00">08:30</option>
                        <option value="09:00:00">09:00</option>
                        <option value="09:30:00">09:30</option>
                        <option value="10:00:00">10:00</option>
                        <option value="10:30:00">10:30</option>
                        <option value="11:00:00">11:00</option>
                        <option value="11:30:00">11:30</option>
                        <option value="12:00:00">12:00</option>
                        <option value="12:30:00">12:30</option>
                        <option value="13:00:00">13:00</option>
                        <option value="13:30:00">13:30</option>
                        <option value="7">14:00</option>
                        <option value="14:30:00">14:30</option>
                        <option value="15:00:00">15:00</option>
                        <option value="15:30:00">15:30</option>
                        <option value="16:00:00">16:00</option>
                        <option value="16:30:00">16:30</option>
                        <option value="17:00:00">17:00</option>
                        <option value="17:30:00">17:30</option>
                        <option value="18:00:00">18:00</option>
                        <option value="18:30:00">18:30</option>
                        <option value="19:00:00">19:00</option>
                        <option value="19:30:00">19:30</option>
                        <option value="20:00:00">20:00</option>
                        <option value="20:30:00">20:30</option>
                        <option value="21:00:00">21:00</option>
                    </select>
                            <input type='submit' value='VERIFICAR '>
                </form>
                
                <br>
           
=======

                <!-- TODO TELA DE VERSERVIÇO PARA AGENDAMENTO -->
                <!-- SELECT PARA VER DATA DISPONÍVEL PARA CABELEIREIRO  -->
                <!-- SELECT PARA VER QUAL CABELEIREIRO DISPONÍVEL NESSA DATA -->
                <!-- SELECT OPTION LISTA DE OPÇÕES -->

                <label><b>AGENDAR DATA</b></label>
                <input type="date" id="data" name="data" min="<?= $dataAtual ?>">
                <br>
                 <select class='opt' name="horario" id="horario" required>
                    <?php
                    // CONVERTER PARA PODER SOMAR E LISTAR DE MEIA E MEIA
                    $inicio = strtotime("08:00:00");
                    $fim = strtotime("21:00:00");

                    for ($hora = $inicio; $hora <= $fim; $hora += 30 * 60) {
                        $horario = date("H:i", $hora);
                        // VAMOS USAR ISSO NO VALIDAÇÃO DO AGENDAMENTO
                        if($horario > $horaAtual){
                            echo "<option value='$horario'>$horario</option>";
                        }
                        else{
                            echo "<option value='$horario'>$horario</option>";
                        }
                    }
                    ?>
                </select>
                <br>
                
                <!-- AGENDAR COM QUEM  -->
                <label><b>AGENDAR COM QUEM?</b></label>
                <form action='../utils/verificafuncionariocat.php' method="post" onchange="this.form.submit()">
                    <select name='idfuncionario' class="opt">
                        <option value="0">SELECIONE O CABELEIREIRO</option>
                        <?php 
                            while($retorno = mysqli_fetch_array($enviaquery2)){
                                 $idfuncionario = $retorno[0];
                                 $nomefun = $retorno[1];
                        ?>
                                <option value="<?= $idfuncionario?>"><?= $nomefun?></option>
                        <?php
                            }
                        ?>
                    </select>
                </form>
                <br>

                <input type='submit' value='VERIFICAR AGENDA'>
            </form>
>>>>>>> Stashed changes
            <br>
        </div>
        

    </div>

</body>
</html>