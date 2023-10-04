<?php
   require("../../php/conexao/conexaoBD.php");
   
   if (!isset($_SESSION)) session_start();

   if (!isset($_SESSION['login']) or $_SESSION['tipoDeUsuario'] != 'Dir')
   {
       session_destroy();
       header("Location: ../p_login_tc.php");
   }

   $conexao = ConectarBanco();

   $sql_query = $conexao->query("SELECT `Login`, `Nome` FROM `professor`") or die ($conexao->error);
?>

<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../../css/navbar_TC.css">
        <link rel="stylesheet" type="text/css" href="../../css/cadastros.css">
        <script src="../../js/sweetalert.js" type="module"></script>
        <script src="../../js/confirmar-saida.js"></script>
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
                <li><a href="p_d_inicial_tc.php">Diagnósticos</a></li>
                <li><a href="p_ocorrencias.php">Ocorrências</a></li>
                <li><a class="active">Cadastros</a></li>
                <li><a class="Btn-Sair" onclick="Sair()" style="cursor: pointer;">Sair</a> </li>
            </ul>
        </nav>
        
        <br><br><br>
        <a href="p_cad-prof-D_TC.php" class="Cad" id="Cadastrar">Cadastrar Professor</a>
        <br><br>
        

        <?php
            while ($professor = $sql_query->fetch_assoc())
            {
        ?>

        <div id="Cadastros">
            <h1>Nome:</h1> <div class="Itens"><?php echo $professor['Nome']; ?></div>
            <h1>Login:</h1> <div class="Itens"><?php echo $professor['Login']; ?></div>
        </div>

        <?php
            } 
        ?>
   
    </body>
</html>