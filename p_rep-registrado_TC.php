<!--<?php
//    require("php/conexao/conexaoBD.php");

//    $conexao = ConectarBanco();
//    $dataReparo = $_GET['data'];

//    $sql_query = $conexao->query(SELECT `Data`, `Acao`, `Problemas_Solucionados`, `Responsavel`, 
//    `Login_Monitor`, `Laboratorio` FROM `reparo` WHERE Data = '$dataReparo') or die ($conexao->error);
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
        <!-- aqui começa o loop para mostrar os logins e nomes -->
    <?php
        $i = 0;
        while ($i < 10)
        //while ($reparo = $sql_query->fetch_assoc())
        {
    ?>

    <!-- aqui é a tabela com os nomes escritos (não excluam os ultimos echo) para estilizar -->
            <tr>
                <td><?php echo "Data : exemploData"; ?></td>
                <td><?php echo "Acao: exemploAcao"; $i++; ?></td>
                <td><?php echo "Problemas_Sol : exemploSolucoes"; ?></td>
                <td><?php echo "Responsavel: exemploResponsavel"; $i++; ?></td>
                <td><?php echo "Laboratorio: exemploLaboratorio"; $i++; ?></td>
                <!-- <td><?php echo "Data: " . $reparo['Data']; ?></td>
                <td><?php echo "Ação: " . $reparo['Acao']; ?></td>
                <td><?php echo "Problemas Solucionados: " . $reparo['Problemas_Solucionados']; ?></td>
                <td><?php echo "Responsável: " . $reparo['Responsavel']; ?></td>
                <td><?php echo "Laboratório: " . $reparo['Laboratorio']; ?></td> -->
            </tr>
    <?php
        } 
    ?> 
    </table>
</body>
</html>