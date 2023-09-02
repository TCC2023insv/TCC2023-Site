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
        <link rel="stylesheet" type="text/css" href="../../css/p_cadastros_TC.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastros</title>
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
                <li><a href="">Ocorrências</a></li>
                <li><a  class="active">Cadastros</a></li>
                <li><a href="../p_login_TC.html">Sair</a></li>
            </ul>
        </nav>

        <div id="Cadastrar"><a href="p_cad-mon-P_TC.html" class="Cad">Cadastrar Monitor</a></div> 
                  
        <?php
            while ($monitor = $sql_query->fetch_assoc())
            {
        ?>

        <div id="Cadastros">
            <div class="Itens"><?php echo $monitor['Nome']; ?></div>
            <div class="Itens"><?php echo $monitor['Login']; ?></div>
        </div>

        <?php
            } 
        ?>
    </body>
</html>