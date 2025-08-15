<?php

include("conectadb.php");

// VERIFICA SE TEM HORÁRIO DISPONÍVEL COM O FUNCIONÁRIO
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

     $idfuncionario = $_POST['idfuncionario'];
    // VERIFICANDO SE ESSE FUNCIONÁRIO TEM HORÁRIO
    $sqlnomefun = "SELECT * FROM funcionario WHERE FUN_ID = $idfuncionario";
    $enviaquery = mysqli_query($link, $sqlnomefun);

    $sqlhorario = "SELECT * FROM agenda WHERE FK_FUN_ID = $idfuncionario";
    $enviaquery = mysqli_query($link, $sqlhorario);
    

}


?>