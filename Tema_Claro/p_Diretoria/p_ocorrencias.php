<?php
   require("../../php/conexao/conexaoBD.php");
   
   if (!isset($_SESSION)) session_start();

   if (!isset($_SESSION['login']) or $_SESSION['tipoDeUsuario'] != 'Dir')
   {
       session_destroy();
       header("Location: ../p_login_tc.php");
   }

   $conexao = ConectarBanco();

   $sql_query = $conexao->query("SELECT `Data`, `Descricao`, `Responsavel` FROM ocorrencia
   ORDER BY `Data`DESC") or die ($conexao->error);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../../css/cores.css">
    <link rel="stylesheet" type="text/css" href="../../css/navbar_TC.css">
    <link rel="stylesheet" type="text/css" href="../../css/ocorrencias.css">
    <script src="../../js/sweetalert.js" type="module"></script>
    <script src="../../js/confirmar-saida.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de ocorrências</title>
</head>
<body>
<nav>
            <input type="checkbox" id="check">
            <label for="check" class="btncheck">
                <img src="img/icon.png">
            </label>

            <label class="logo">MonitoraLab</label>
            <ul>
                <li><a href="p_d_inicial_tc.php">Diagnósticos</a></li>
                <li><a class="active" href="p_ocorrencias.php">Ocorrências</a></li>
                <li><a href="p_cadastros-D_TC.php">Cadastros</a></li>
                <li><a class="Btn-Sair" onclick="Sair()" style="cursor: pointer;">Sair</a> </li>
            </ul>
        </nav>
    <!-- <div class='caixa'> -->
    <?php
        while ($ocorrencia = $sql_query->fetch_assoc())
        {
            echo "<div class='caixa'>
            <div class='lbl-input'>
                <label class='Titulo'>Ocorrência</label>
                <label class='data-2'>" . date('d/m/Y', strtotime($ocorrencia['Data'])) . "</label>
                <label id='profResp'>" . $ocorrencia['Responsavel'] . "</label>
            </div>
            <label class='txtOcorrencia-2'>" . $ocorrencia['Descricao'] . "</label>

            <div id='Btn'>
            <a href='javascript: history.go(-1)' class='BtnVoltar'>Voltar</a>
        </div>
    </div>";
        }
    ?>
    <!-- <div class="caixa">
        <div class="lbl-input">
            <label class="Titulo">Ocorrência</label>
            <label class="data-2">00/00/0000</label>
            <label id="profResp">Alberto Marques</label>
        </div>
        ____________________________________________________________________
       | <label class="txt-titulo">O titulo da ocorrencia fica aqui</label> |
       |____________________________________________________________________|
       
        <label class="txtOcorrencia-2">abluebluevlue</label> -->

        <!-- <div id="Btn">
            <a href="javascript: history.go(-1)" class="BtnVoltar">Voltar</a>
        </div>
    </div> -->
</body>
</html>