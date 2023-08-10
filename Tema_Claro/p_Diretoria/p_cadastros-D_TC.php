<?php
   require("../../php/conexao/conexaoBD.php");

   $conexao = ConectarBanco();

   $sql_query = $conexao->query("SELECT `Login`, `Nome` FROM `professor`") or die ($conexao->error);
?>

<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../../css/navbar_TC.css">
        <link rel="stylesheet" type="text/css" href="../../css/p_cadastros_TC.css">
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
                <li><a class="active">Cadastros</a></li>
                <li><a href="p_inicial-D_TC.html">Laboratórios</a></li>
                <li><a href="../p_login_TC.html">Sair</a></li>
            </ul>
        </nav>
        
       <a href="p_cad-prof-D_TC.html" class="Cad" id="Cadastrar">Cadastrar Professor</a>
        
        <?php
            while ($professor = $sql_query->fetch_assoc())
            {
        ?>

        <div id="Cadastros">
            <div class="Itens"><?php echo $professor['Nome']; ?></div>
            <div class="Itens"><?php echo $professor['Login']; ?></div>
        </div>

        <?php
            } 
        ?>
   
    </body>
</html>