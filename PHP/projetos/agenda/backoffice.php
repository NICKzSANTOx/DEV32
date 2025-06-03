<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- APONTA OS CSS ENVOLVIDOS -->
    <link rel="stylesheet" href="css/global.css">
    <title>BACKOFFICE</title>
</head>
<body>
    <div class="global">
        <div class="topo">

            <!-- AQUI VAI TRAZER O NOME DO USUARIO LOGADO -->
            <h1>BEM VINDO </h1>

            <!-- BOTÃO DE ENCERRAMENTO DE SESSÃO -->
            <div class="logout" method='post'>
                <form action='logout.php'>
                    <input type="submit" value='SAIR'>
                </form>
            </div>
        </div>

            <div class='menus'>
                <!-- OS CARDS DE MENU -->
                <div class="menu1">
                    <a href="usuario_cadastra.php">CADASTRA USUARIO</a>
                </div>

                <div class="menu2">
                    <a href="usuario_lista.php">LISTA USUARIO</a>
                </div>

                <div class="menu3">
                    <a href="funcionario_cadastra.php">CADASTRA FUNCIONARIO</a>
                </div>

                <div class="menu4">
                    <a href="funcionario_lista.php">LISTA FUNCIONARIO</a>
                </div>
            </div>
    </div>
    
</body>
</html>