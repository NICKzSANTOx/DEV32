<?php
date_default_timezone_set('America/Sao_Paulo'); // Ajuste para seu fuso horário

// Variáveis
$mensagem = "";
$horarioAtual = new DateTime();
$dataAtual = $horarioAtual->format('Y-m-d');
$horaAtual = $horarioAtual->format('H:i');

// Processamento do formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dataSelecionada = $_POST['data'];
    $horaSelecionada = $_POST['hora'];

    $agendamento = DateTime::createFromFormat('Y-m-d H:i', "$dataSelecionada $horaSelecionada");

    if ($agendamento <= $horarioAtual) {
        $mensagem = "<span style='color:red;'>Não é possível agendar para o passado!</span>";
    } else {
        $mensagem = "<span style='color:green;'>Agendamento realizado para $dataSelecionada às $horaSelecionada.</span>";
    }
}

// Função para gerar opções de horário
function gerarHorarios($inicio = "08:00", $fim = "21:00", $intervalo = 30) {
    $horaInicio = new DateTime($inicio);
    $horaFim = new DateTime($fim);
    $horarios = [];

    while ($horaInicio <= $horaFim) {
        $horarios[] = $horaInicio->format('H:i');
        $horaInicio->modify("+{$intervalo} minutes");
    }

    return $horarios;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Agendamento</title>
</head>
<body>
    <h2>Agendamento</h2>
    <form method="POST">
        <label for="data">Data:</label>
        <input type="date" name="data" id="data" value="<?= $dataAtual ?>" min="<?= $dataAtual ?>" required>
        <br><br>

        <label for="hora">Horário:</label>
        <select name="hora" id="hora" required>
            <option value="">Selecione o horário</option>
            <?php
            foreach (gerarHorarios() as $hora) {
                echo "<option value='$hora'>$hora</option>";
            }
            ?>
        </select>
        <br><br>

        <input type="submit" value="Agendar">
    </form>

    <br>
    <?= $mensagem ?>
</body>
</html>
