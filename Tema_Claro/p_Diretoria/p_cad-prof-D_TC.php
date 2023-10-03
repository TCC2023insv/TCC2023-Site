<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../../css/cadastrar.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- JavaScript -->
	<script type="text/javascript" src="../js/mudar-tema.js" defer=""></script>

    <title>Cadastrar Professor</title>
</head>

<body>
    <fieldset class="caixa">
        <h1>Cadastrar <br> Professor</h1>
        <form method="post" action="../../php/classes/usuario.php" class="Forms">
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
                <a href="javascript: history.go(-1)" id="Btn-Voltar">Voltar</a>
                <button type="submit" id="Btn" name="cadastrarProfessor">Cadastrar</button>
            </div>
        </form>
    </fieldset>
</body>

</html>
