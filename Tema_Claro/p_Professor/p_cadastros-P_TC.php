<!-- //<?php
//    require("php/conexao/conexaoBD.php");

//    $conexao = ConectarBanco();

//    $sql_query = $conexao->query("SELECT `Login`, `Nome` FROM `monitor`") or die ($conexao->error);
//?> -->

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
                <li><a  class="active">Cadastros</a></li>
                <li><a href="p_inicial-P_TC.php">Laboratótios</a></li>
                <li><a href="../p_login_TC.html">Sair</a></li>
            </ul>
        </nav>

        <div id="Cadastrar"><a href="p_cad-mon-P_TC.html" class="Cad">Cadastrar Monitor</a></div> 
                  
        <?php
            $i = 0;
            while ($i < 10)
            // while ($reparo = $sql_query->fetch_assoc())
            {
        ?>

        <div id="Cadastros">
            <div class="Itens">exemploNome</div>
            <div class="Itens">exemploLogin</div>
        </div>

        <!-- aqui é a tabela com os nomes escritos (não excluam os dois ultimos echo) para estilizar -->
        <!-- <td><?php echo "Nome: " . $professor['Nome']; ?></td>
        <td><?php echo "Login: " . $professor['Login']; ?></td> -->

        <?php
            } 
        ?>
    </body>
</html>