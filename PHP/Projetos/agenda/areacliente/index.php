<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="stylesheet" href="../css/global.css">
    <link href="https://fonts.cdnfonts.com/css/master-lemon" rel="stylesheet">
    <title>LOGIN</title>
</head>
<body>
    <div class="global">
        <h1>BEM VINDO À SALLONCCINA</h1>
        <div class="formulario">
            <form class='login' action="cliente_login.php" method="post">
               
                <label>CPF</label>
                <input type='text' id='cpf' name='txtcpf' placeholder="000.000.000-00" maxlength='14' required>
                <br>
                <label>SENHA</label>
                <input type='password' id='password' name='txtsenha' placeholder='Senha aqui'>
                
                <!-- FAZ PARTE DO OLINHO -->
                <span class='togglePassword' id='togglePassword' style="margin: -35px 0px 0px 90%;">🔒</span>
                
                <br>
                <br>
                <input type='submit' value='ACESSAR'>
                <a href="cliente_cadastra.php" style="color: #0077ffff; margin-top:20px">NÃO TEM CONTA?</a>

                <!-- JS DO OLHINHO -->
                <script>
                    const passwordInput = document.getElementById('password');
                    const togglePassword = document.getElementById('togglePassword');
                    togglePassword.addEventListener('click', 
                        function(){
                            const type = passwordInput.getAttribute('type') === 'password'?'text':'password';
                            passwordInput.setAttribute('type',type);;

                        this.textContent = type === 'password'?'🔒':'🔓';
                        
                    });
                </script>
                <!-- FIM JS DO OLHINHO -->


            </form>
            
            <br>

        </div>
    </div>
    <script src='../scripts/script.js'></script>

</body>
</html>
