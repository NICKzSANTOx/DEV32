<?php

include("conectadb.php");

// VERIFICA SE TEM HORÁRIO DISPONÍVEL COM O FUNCIONÁRIO
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

     $idfuncionario = $_POST['idfuncionario'];
     $data = ($_POST['data'] . ' ' . $_POST['horario']);
     $horario = $_POST['horario'];
    // VERIFICANDO SE ESSE FUNCIONÁRIO TEM HORÁRIO
    $sqlhorario = "SELECT *, SEC_TO_TIME(CAT_TEMPO * 60),    FROM agenda INNER JOIN catalogo ON FK_CAT_ID = CAT_ID WHERE FK_FUN_ID = $idfuncionario AND AG_HORA ='$data'";
    $enviaquery = mysqli_query($link, $sqlhorario);

    while($tbl = mysqli_fetch_array($enviaquery)){
        $dthora = $tbl[1];
        $horario = $horario;
        $temposervico = $tbl[13];
        echo($dthora. '<br>' . $horario. "<br>". $temposervico);
        $horafim = $horafim 
    }

}


?>