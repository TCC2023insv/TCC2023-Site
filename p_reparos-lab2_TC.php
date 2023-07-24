<!--<?php
//    require("php/conexao/conexaoBD.php");

//    $conexao = ConectarBanco();

//    $sql_query = $conexao->query("SELECT `Data`, `Responsavel`, `Laboratorio` FROM `reparo` WHERE
//     Laboratorio = 'Lab 2'") or die ($conexao->error);
?> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table>
        <thead>
            <th>Data</th>
            <th>Responsável</th>
            <th>Laboratório</th> 
        </thead>

        <!-- aqui começa o loop para mostrar os logins e nomes -->
    <?php
        $i = 0;
        while ($i < 10)
        //while ($reparo = $sql_query->fetch_assoc())
        {
    ?>

    <!-- aqui é a tabela com os nomes escritos (não excluam os tres ultimos echo) para estilizar -->
            <tr>
                <?php echo "<td>Data: <a href='p_rep-registrado_TC.php'>exemploData</a></td>"; ?>
                <td><?php echo "Responsavel: exemploResponsavel"; $i++; ?></td>
                <td><?php echo "Laboratorio: exemploLaboratorio"; $i++; ?></td>
                
                <!-- <?php echo "<td>Data: <a href='p_rep-registrado_TC.php?data=" . $reparo['data']
                . "'>exemploData</a></td>"; ?>
                <td><?php echo "Responsável: " . $reparo['Responsavel']; ?></td>
                <td><?php echo "Laboratório: " . $reparo['Laboratorio']; ?></td> -->
            </tr>
    <?php
        } 
    ?> 
    </table>
</body>
</html>