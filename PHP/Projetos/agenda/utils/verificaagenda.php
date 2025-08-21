<?php

include("conectadb.php");

// VERIFICA SE TEM HORÁRIO DISPONÍVEL COM O FUNCIONÁRIO
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

     $idfuncionario = $_POST['idfuncionario'];
     $data = ($_POST['data'] . ' ' . $_POST['horario']);
     $horario = $_POST['horario'];
    // VERIFICANDO SE ESSE FUNCIONÁRIO TEM HORÁRIO
    $sqlhorario = "SELECT * , SEC_TO_TIME(CAT_TEMPO * 60) FROM agenda INNER JOIN catalogo ON FK_CAT_ID = CAT_ID WHERE FK_FUN_ID = $idfuncionario";

    $enviaquery = mysqli_query($link, $sqlhorario);

    while($tbl = mysqli_fetch_array($enviaquery)){
        $dthora = $tbl[1];
        $horario = date("H:i:s", strtotime($horario));
        $temposervico = date("H:i:s",);
        echo $temposervico;
        
        $resultadoagoravai = $horario + $temposervico;
        echo($temposervico . '<br>' . $horario . '<br>' . date("H:i:s", $resultadoagoravai));



        $horarioFormatada = date("H:i:s", $horario);
        $tempoFormatado = date("H:i:s", $temposervico);
        $horarioFormatada = strtotime($horarioFormatada);
        // $tempoFormatado = strtotime($tempoFormatado);
        // $tudo = ($tempoFormatado / 3600) + ($horarioFormatada / 3600);
        $resultadoagoravai = date("H:i:s", $tudo);
        echo($resultadoagoravai);
        

    }

}


?>