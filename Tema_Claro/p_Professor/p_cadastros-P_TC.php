<?php
   require("../../php/conexao/conexaoBD.php");

   $conexao = ConectarBanco();

   $sql_query = $conexao->query("SELECT `Login`, `Nome` FROM `monitor`") or die ($conexao->error);
?>

<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../../css/navbar_TC.css">
        <link rel="stylesheet" type="text/css" href="../../css/cadastros.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastros</title>
    </head>
    <body>
        <nav>
            <input type="checkbox" id="check">
            <label for="check" class="btncheck">
                <img src="img/icon.png">
            </label>

            <label class="logo">MonitoraLab</label>
            <ul>
                <li><a href="P_P_Inicial_TC.php">Diagnósticos</a></li>
                <li><a href="">Ocorrências</a></li>
                <li><a  class="active">Cadastros</a></li>
                <li><a href="../../php/classes/professor.php?resp=sair">Sair</a></li>
            </ul>
        </nav>

        <br><br><br>
        <a href="p_cad-mon-P_TC.html" class="Cad" id="Cadastrar">Cadastrar Monitor</a>
        <br><br>  

        <?php
            while ($monitor = $sql_query->fetch_assoc())
            {
        ?>

        <div id="Cadastros">
            <h1>Nome:</h1><div class="Itens"><?php echo $monitor['Nome']; ?></div>
            <h1>Login:</h1><div class="Itens"><?php echo $monitor['Login']; ?></div>
        </div>

        <?php
            } 
        ?>
    </body>
</html>