<?php
    if (!isset($_SESSION)) session_start();

    if (!isset($_SESSION['login']) or $_SESSION['tipoDeUsuario'] != 'Prof')
    {
        session_destroy();
        header("Location: ../p_login_tc.php");
    }
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../../css/cores.css">
    <link rel="stylesheet" type="text/css" href="../../css/navbar_TC.css">
    <link rel="stylesheet" type="text/css" href="../../css/ocorrencias.css">
    <script src="../../js/jquery.js"></script>
    <script src="../../js/confirmar-saida.js"></script>
    <script src="../../js/sweetalert.js" type="module"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de ocorrências</title>
</head>
<body>
    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="btncheck">
            <img src="img/icon.png">
        </label>

        <label class="logo">LOGO</label>
        <ul>
            <li><a href="P_P_Inicial_TC.php">Diagnósticos</a></li>
            <li><a class="active">Ocorrências</a></li>
            <li><a  href="p_cadastros-P_TC.php">Cadastros</a></li>
            <li><a id="BtnSair" onclick="Sair()" style="cursor: pointer;">Sair</a></li>
        </ul>
    </nav>

  <form id="Ocorrencia" action="../../php/classes/usuarios.php" method="post" class="caixa">
    <div class="lbl-input">
        <label class="Titulo">Registrar Ocorrência</label>
        <input class="data" id="dataOcorrencia" name="data" type="date" required> 
    </div>
    <input class="txt-titulo" id="tituloOcorrencia" type="text" placeholder="Digite o titulo da ocorrência" required>
    <textarea class="txtOcorrencia" id="descricaoOcorrencia" name="txtDescricao" placeholder="Digite a ocorrência aqui" required></textarea>
    <button class="Btn" type="submit" name="btnRegistrarOcorrencia">Registrar</button>
  </form>

  <script>
    $(document).ready(function() {
        $("#Ocorrencia").submit(function(e) {
            e.preventDefault();

            var data = $("#dataOcorrencia").val();
            var titulo = $("#tituloOcorrencia").val();
            var txtDescricao = $("#descricaoOcorrencia").val();
            var RegistrarOcorrencia = "RegistrarOcorrencia";

            $.ajax({
                type: "POST",
                url: $(this).attr("action"),
                data: {
                    data: data,
                    titulo: titulo,
                    txtDescricao:txtDescricao,
                    RegistrarOcorrencia:RegistrarOcorrencia
                },
                success: function(response) {
                    swal({
                    title: "Registro Concluído!",
                    text: "O ocorrido foi registrado com sucesso. Agradecemos a colaboração!",
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
                    title: "Falha no Registro!",
                    text: "Ocorreu um problema ao registrar a ocorrência.Tente novamente.",
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