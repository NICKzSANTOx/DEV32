<?php
include("conectadb.php");

// PESQUISA NO BANCO
$sql = "SELECT * FROM jogos";
$enviaquery = mysqli_query($link, $sql);

if($_SERVER['REQUEST_METHOD']=='POST'){
    // COLETA OS DADOS DO CAMPO DE TEXTO DO HTML
    $ano = $_POST['ano'];

    $sql = "SELECT * FROM jogos WHERE ANO = '$ano' ";
    
    // ENVIANDO A QUERY PARA O BANQUINHO
    $enviaquery = mysqli_query($link, $sql);
    
    // // RETORNO DO QUE VEM DO BANCO
    // $retorno = mysqli_fetch_array($enviaquery) [0];

}



?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LISTA</title>
</head>
<body>
    <form action='pesquisa.php' method='post'>
        <label>DIGITE O ANO: </label>
        <input name='ano' type='year'>
        <input type='submit' value='PESQUISAR'>
    </form>
    <table class='lista'>
        <tr>
            <th>ID</th>
            <th>ANO</th>
            <th>PLATAFORMA</th>
            <th>ATIVO</th>
            <th>DEV</th>
        </tr>

        <!-- AQUI O CHORO É LIVRE -->
         <!-- AQUI LISTA OS USUARIOS -->
          <?php
            while($tbl = mysqli_fetch_array($enviaquery)){
              
            ?>
            <tr>
                <!-- COLETA O ID NA POSIÇÃO 0 DO BANCO -->
                <td><?= $tbl[0]?></td>
                <!-- COLETA LOGIN NA POSIÇÃO 1 DO BANCO -->
                <td><?= $tbl[1]?></td>
                <td><?= $tbl[2]?></td>
                <td><?= $tbl[3]?></td>
                <td><?= $tbl[4]?></td>
                <td><?= $tbl[5]?></td>
                <td><a href='alterar.php?=id<?=$tbl[0]?>'><button>ALTERAR</button></a></td>
            </tr>
            <!-- ABRIR PHP PARA FECHAR O WHILE ACIMA -->
            <?php
            }
            ?>
    </table>
    
</body>
</html>