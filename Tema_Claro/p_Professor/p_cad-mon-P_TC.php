<?php
    if (!isset($_SESSION)) session_start();

    if (!isset($_SESSION['login']) or $_SESSION['tipoDeUsuario'] != 'Prof')
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
    <script src="../../js/jquery.js"></script>
    <script src="../../js/sweetalert.js"></script>
    <title>Cadastrar Monitor</title>
</head>

<body>

    <fieldset class="caixa">
        <h1>Cadastrar Monitor</h1>
        <form id="CadMonitor" method="post" action="../../php/classes/usuarios.php" class="Forms">
            <label class="Titulo">Nome:</label>
            <input class="Txt" type="text" id="nomeMon" name="nome" placeholder="Digite aqui" required>
            <br>
            <label class="Titulo">Login:</label>
            <input class="Txt" type="text" id="loginMon" name="login" placeholder="Digite aqui" required>
            <br>
            <label class="Titulo">Senha:</label>
            <input class="Txt" type="password" id="senhaMon" name="senha" placeholder="Digite aqui" required>
            <br>
            <div class="Botao">
                <a href="javascript: history.go(-1)" id="Btn-Voltar">Voltar</a>
                <button type="submit" id="Btn" name="cadastrarMonitor">Cadastrar</button>
            </div>
        </form>
    </fieldset>

    <script>
    $(document).ready(function() {
        $("#CadMonitor").submit(function(e) {
            e.preventDefault();

            var nome = $("#nomeMon").val();
            var login = $("#loginMon").val();
            var senha = $("#senhaMon").val();
            var CadastrarMonitor = "CadastrarMonitor";

            $.ajax({
                type: "post",
                url: $(this).attr("action"),
                data: {
                    nome: nome,
                    login: login,
                    senha: senha,
                    CadastrarMonitor: CadastrarMonitor
                },
                success: function(response) {
                    swal({
                    title: "Monitor cadastrado com sucesso!",
                    text: "O novo login já está disponível.",
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
                    text: "Ocorreu um problema ao cadastrar o novo monitor.Tente novamente.",
                    icon: "error",
                    button: {confirm: true},
                    });
                }
            });
        });
    });

    function Sair()
    {
        swal({
            title: "Tem certeza?",
            icon: "warning",
            buttons: ["Cancel", true],
        }).then(value =>{
            if (value)
            {
                window.location.href = "../../php/classes/usuarios.php?resp=true";              
            }
        })
        return false;
    }
    </script>
</body>

</html>