<!-- <?php
    // require("php/conexao/conexaoBD.php");

    // $conexao = ConectarBanco();

    // $sql_query = $conexao->query("SELECT `Data`, `Responsavel`, `Laboratorio` FROM `reparo` WHERE
    //  Laboratorio = 'Lab 2'") or die ($conexao->error);
    ?> -->

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
                    <li><a class="active" href="">Laboratórios</a></li>
                    <li><a href="../p_login_TC.html">Sair</a></li>
                </ul>
            </nav>
            
            <div id="Prim-Bloco">
                <h1>Lab 2</h1>
                <a href="p_reg-repa-M_TC.html" class="Adi-Rep">Registrar</a>
            </div>


            <?php
                $i = 0;
                while ($i < 10)
                // while ($reparo = $sql_query->fetch_assoc())
                {
            ?>
    
            <div id="Bloco">
                <div class="Itens"><?php echo "<a href='p_rep-registrado_TC.php'>00/00/0000</a>"; ?></div>
                <div class="Itens"><?php echo "Responsável"; $i++; ?></div>
            </div>

            <!-- <?php echo "<td>Data: <a href='p_rep-registrado_TC.php?data=" . $reparo['data']. "'>exemploData</a></td>"; ?>
            <td><?php echo "Responsável: " . $reparo['Responsavel']; ?></td>
            <td><?php echo "Laboratório: " . $reparo['Laboratorio']; ?></td> -->
    
            <?php
                } 
            ?> 
        </body>
    </html>