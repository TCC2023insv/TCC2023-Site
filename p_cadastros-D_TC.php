//<?php
//    require("php/conexao/conexaoBD.php");

//    $conexao = ConectarBanco();

//    $sql_query = $conexao->query("SELECT `Login`, `Nome` FROM `professor`") or die ($conexao->error);
//?>

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
            <th>Nome</th>
            <th>Login</th>
        </thead>

        <!-- aqui começa o loop para mostrar os logins e nomes -->
    <?php
        $i = 0;
        while ($i < 10)
        //while ($professor = $sql_query->fetch_assoc())
        {
    ?>

    <!-- aqui é a tabela com os nomes escritos (não excluam os dois ultimos echo) para estilizar -->
            <tr>
                <td><?php echo "Nome : exemploNome"; ?></td>
                <td><?php echo "Login: exemploLogin"; $i++; ?></td>
                <!-- <td><?php echo "Nome: " . $professor['Nome']; ?></td>
                <td><?php echo "Login: " . $professor['Login']; ?></td> -->
            </tr>
    <?php
        } 
    ?> 
    </table>
</body>
</html>