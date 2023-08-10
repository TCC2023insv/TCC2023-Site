<?php
   require("../../php/conexao/conexaoBD.php");

   $conexao = ConectarBanco();

   $sql_query = $conexao->query("SELECT `Data`, `Responsavel`, `Laboratorio` FROM `reparo` WHERE
    Laboratorio = 'Lab 3'") or die ($conexao->error);
?>

<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../../css/p_reparos-labs_TC.css">
        <link rel="stylesheet" type="text/css" href="../../css/navbar_TC.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Reparos</title>
    </head>
    <body>
        <nav>
            <input type="checkbox" id="check">
            <label for="check" class="btncheck">
                <img src="img/icon.png">
            </label>

            <label class="logo">LOGO</label>
            <ul>
                <li><a href="p_cadastros-P_TC.php">Cadastros</a></li>
                <li><a class="active" href="">Laboratórios</a></li>
                <li><a href="../p_login_TC.html">Sair</a></li>
            </ul>
        </nav>

        <h1>Lab 3</h1>
        <?php
            while ($reparo = $sql_query->fetch_assoc())
            {
        ?>

            <div id="Bloco">
                <div class="Itens"><?php echo "<a href='../p_rep-registrado_TC.php?data=" . date('d/m/Y', strtotime($reparo['Data'])) ."'>" . date('d/m/Y', strtotime($reparo['Data'])) . "</a>"; ?></div>
                <div class="Itens"><?php echo $reparo['Responsavel']; ?></div>
            </div>

        <?php
            } 
        ?> 
    </body>
</html>