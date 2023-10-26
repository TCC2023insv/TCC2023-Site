<?php
    if (!isset($_SESSION)) session_start();

    if (!isset($_SESSION['login']) or $_SESSION['tipoDeUsuario'] != 'Prof')
    {
        session_destroy();
        header("Location: ../login.php");
    }
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../../css/cores.css">
    <link rel="stylesheet" type="text/css" href="../../css/navbar_TC.css">
    <link rel="stylesheet" type="text/css" href="../../css/ocorrencias.css">
    <link rel="stylesheet" href="../../css/fonte-alert.css">
    <script src="../../js/jquery.js"></script>
    <script src="../../js/sweetalert.js" type="module"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de ocorrências</title>
</head>
<body>
    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="btncheck">
            <img src="../../img/icon.png">
        </label>

        <label class="logo">MonitoraLab</label>
        <ul>
            <li><a href="inicio.php">Diagnósticos</a></li>
            <li><a class="active">Ocorrências</a></li>
            <li><a  href="monitores-cadastrados.php">Cadastros</a></li>
            <li><a class="Btn-Sair" onclick="Sair()" style="cursor: pointer;">Sair</a> </li>   
        </ul>
    </nav>

  <form id="Ocorrencia" action="../../php/classes/usuarios.php" method="post" class="caixa">
    <div class="lbl-input">            
        <label class="label-data">Data:</label>
            <input class="data" id="dataOcorrencia" name="data" type="date" required>    
            <label class="label-lab">Laboratório:</label>
            <select name="laboratorio" id="Sele-lab" required>
                <option class="Select-Lab" value="">Selecione</option>
                <option class="Select-Lab" value="Lab 1">Lab 1</option>
                <option class="Select-Lab" value="Lab 2">Lab 2</option>
                <option class="Select-Lab" value="Lab 3">Lab 3</option> 
                <option class="Select-Lab" value="Lab 4">Lab 4</option>
            </select>
    </div>
       
    <input class="txt-titulo" id="tituloOcorrencia" type="text" placeholder="Digite o titulo da ocorrência" required>
    <textarea class="txtOcorrencia" id="descricaoOcorrencia" name="txtDescricao" placeholder="Digite a ocorrência aqui" required></textarea>
    <div class="Botoes">
        <a href="javascript: history.go(-1)" class="Btn">Voltar</a>
        <button class="Btn" type="submit" name="btnRegistrarOcorrencia">Registrar</button>
    </div>
  </form>

  <script>
    $(document).ready(function() {
        $("#Ocorrencia").submit(function(e) {
            e.preventDefault();

            var data = $("#dataOcorrencia").val();
            var titulo = $("#tituloOcorrencia").val();
            var laboratorio = $("#Sele-lab").val();
            var problema = $("#Sele-problema").val();
            var txtDescricao = $("#descricaoOcorrencia").val();
            var RegistrarOcorrencia = "RegistrarOcorrencia";

            $.ajax({
                type: "POST",
                url: $(this).attr("action"),
                data: {
                    data: data,
                    titulo: titulo,
                    laboratorio: laboratorio,
                    problema: problema,
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

    function Sair()
    {
        swal({
            title: "Deseja realmente sair?",
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