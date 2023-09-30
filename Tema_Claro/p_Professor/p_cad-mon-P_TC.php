<?php
    if (!isset($_SESSION)) session_start();

    if (!isset($_SESSION['login']))
    {
        session_destroy();
        header("Location: ../p_login_tc.php");
    }
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../../css/cadastrar.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Monitor</title>
</head>

<body>

    <fieldset class="caixa">
        <h1>Cadastrar Monitor</h1>
        <form method="post" action="../../php/classes/usuarios.php" class="Forms">
            <label class="Titulo">Nome:</label>
            <input class="Txt" type="text" name="nome" placeholder="Digite aqui" required>
            <br>
            <label class="Titulo">Login:</label>
            <input class="Txt" type="text" name="login" placeholder="Digite aqui" required>
            <br>
            <label class="Titulo">Senha:</label>
            <input class="Txt" type="password" name="senha" placeholder="Digite aqui" required>
            <br>
            <div class="Botao">
                <button type="submit" id="Btn" name="cadastrarMonitor">Cadastrar</button>
            </div>
        </form>
    </fieldset>
</body>

</html>