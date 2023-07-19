<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <!-- Navbar responsiva-->
        <link rel="stylesheet" type="text/css" href="css/p_inicial_TC.css">
        <link rel="stylesheet" type="text/css" href="css/navbar_TC.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Página Inicial</title>
    </head>
    <body>
        <?php
            session_start();
            if (isset($_SESSION['prof']))
            {
                $professor = $_SESSION['prof'];
            }
        ?>
        <nav>
            <input type="checkbox" id="check">
            <label for="check" class="btncheck">
                <img src="img/icon.png">
            </label>

            <label class="logo">LOGO</label>
            <ul>
                <li><a href="p_cad-mon-P_TC.php">Cadastrar Monitor</a></li>
                <li><a class="active" href="">Laboratórios</a></li>
                <li><a href="p_login_TC.html">Sair</a></li>
            </ul>
        </nav>

        <div class="Labs1-2">
            <a class="Links" href="">Lab 1</a>
            <a class="Links" href="">Lab 2</a>
        </div>
        <div class="Labs3-4">
            <a class="Links" href="">Lab 3</a>
            <a class="Links" href="">Lab 4</a>
        </div>
</html>