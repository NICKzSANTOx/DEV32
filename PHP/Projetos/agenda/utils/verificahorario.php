<?php

include("conectadb.php");

// VERIFICA SE TEM HORÁRIO DISPONÍVEL COM O FUNCIONÁRIO
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

     $idfuncionario = $_POST['idfuncionario'];
     $data = ($_POST['data']);
     $horario = $_POST['horario'];
    // VERIFICANDO SE ESSE FUNCIONÁRIO TEM HORÁRIO
    $sqlhorario = "SELECT * FROM agenda INNER JOIN catalogo ON FK_CAT_ID = CAT_ID WHERE FK_FUN_ID = $idfuncionario AND AG_HORA ='$horario' AND AG_DATA = '$data'";

    $enviaquery = mysqli_query($link, $sqlhorario);

    while($tbl = mysqli_fetch_array($enviaquery)){
       $dataagenda = $tbl[1];
       $horaagenda = $tbl[2];
       $duracao = $tbl['CAT_TEMPO'];
       $idcat = $tbl['CAT_ID'];


            // monta a data + hora inicial
            $datahora = $dataagenda . ' ' . $horaagenda;

            // cria timestamp do início
            $horainicio = strtotime($datahora);

            // converte duração em segundos (explode hh:mm:ss)
            list($h, $m, $s) = explode(":", $duracao);
            $duracaosegundos = ($h * 3600) + ($m * 60) + $s;

            // soma a duração
            $horafim = $horainicio + $duracaosegundos;

            // exibe
            // echo "Início: " . date("d/m/Y H:i", $horainicio) . "<br>";
            // echo "Fim: " . date("d/m/Y H:i", $horafim) . "<br><br>";
         
    }

}


?>