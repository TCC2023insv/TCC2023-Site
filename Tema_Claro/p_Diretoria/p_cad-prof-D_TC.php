<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../../css/cadastrar.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- JavaScript -->
	<script type="text/javascript" src="../js/mudar-tema.js" defer=""></script>
    <script src="../../js/jquery.js"></script>
    <script src="../../js/sweetalert.js"></script>

    <title>Cadastrar Professor</title>
</head>

<body>
    <fieldset class="caixa">
        <h1>Cadastrar <br> Professor</h1>
        <form id="CadProfessor" method="post" action="../../php/classes/usuario.php" class="Forms">

            <label class="Titulo">Nome:</label>
            <input class="Txt" type="text" id="nomeProf" name="nome" placeholder="Digite aqui" required>
            <br>
            <label class="Titulo">Login:</label>
            <input class="Txt" type="text" id="loginProf" name="login" placeholder="Digite aqui" required>
            <br>
            <label class="Titulo">Senha:</label>
            <input class="Txt" type="password" id="senhaProf" name="senha" placeholder="Digite aqui" required>
            <br>
            <div class="Botao">
                <a href="javascript: history.go(-1)" id="Btn-Voltar">Voltar</a>
                <button type="submit" id="Btn" name="cadastrarProfessor">Cadastrar</button>
            </div>
        </form>
    </fieldset>
    <script>
    $(document).ready(function() {
        $("#CadProfessor").submit(function(e) {
            e.preventDefault();

            var nome = $("#nomeProf").val();
            var login = $("#loginProf").val();
            var senha = $("#senhaProf").val();
            var CadastrarProfessor = "CadastrarProfessor";

            $.ajax({
                type: "post",
                url: $(this).attr("action"),
                data: {
                    nome: nome,
                    login: login,
                    senha: senha,
                    CadastrarProfessor: CadastrarProfessor
                },
                success: function(response) {
                    swal({
                    title: "Professor cadastrado com sucesso!",
                    text: "O professor foi cadastrado com sucesso! Novo login já está disponível.",
                    icon: "success",
                    button: {confirm: true},
                    }).then(value =>{
                        if (value)
                        {
                        window.location.href = "javascript: history.go(-1)";
                        }
                    });
                },
                error: function() {
                    swal({
                    title: "Falha no Cadastro!",
                    text: "Ocorreu um problema ao cadastrar o novo professor.Tente novamente.",
                    icon: "error",
                    button: {confirm: true},
                    });
                }
            });
        });
    });
    </script>
</body>

</html>
