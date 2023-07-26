<!-- <?php
    // require("php/conexao/conexaoBD.php");

    // $conexao = ConectarBanco();

    // $sql_query = $conexao->query("SELECT `Data`, `Responsavel`, `Laboratorio` FROM `reparo` WHERE
    //  Laboratorio = 'Lab 1'") or die ($conexao->error);
?> -->

<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/p_reparos-lab1-D_TC.css">
        <link rel="stylesheet" type="text/css" href="css/navbar_TC.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Página Inicial</title>
    </head>
    <body>
        <nav>
            <input type="checkbox" id="check">
            <label for="check" class="btncheck">
                <img src="img/icon.png">
            </label>

            <label class="logo">LOGO</label>
            <ul>
                <li><a href="">Cadastros</a></li>
                <li><a class="active" href="">Laboratórios</a></li>
                <li><a href="p_login_TC.html">Sair</a></li>
            </ul>
        </nav>

        <h1>Lab 1</h1>
        <?php
            $i = 0;
            while ($i < 10)
            // while ($reparo = $sql_query->fetch_assoc())
            {
        ?>

        <div id="Bloco">
            <div class="Itens"><?php echo "<a href='p_rep-registrado_TC.php'>exemploData</a>"; ?></div>
            <div class="Itens"><?php echo "exemploResponsavel"; $i++; ?></div>
        </div>

        <?php
            } 
        ?> 
    </body>
</html>