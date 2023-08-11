<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <!-- Navbar responsiva-->
    <link rel="stylesheet" type="text/css" href="../../css/p_inicial_TC.css">
    <link rel="stylesheet" type="text/css" href="../../css/navbar_TC.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial</title>
</head>

<body>
    <?php
        session_start();

        if (isset($_SESSION['login']))
        {
            $monitor = $_SESSION['login'];
        }
    ?>
    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="btncheck">
                <img src="../../img/icon.png">
            </label>

        <label class="logo">LOGO</label>
        <ul>
            <li><a class="active" href="">Laboratórios</a></li>
            <li><a href="../p_login_TC.html">Sair</a></li>
        </ul>
    </nav>

    <div class="Labs1-2">
        <a class="Links" href="p_reparos-lab1-M_TC.php">Lab 1</a>
        <a class="Links" href="p_reparos-lab2-M_TC.php">Lab 2</a>
    </div>
    <div class="Labs3-4">
        <a class="Links" href="p_reparos-lab3-M_TC.php">Lab 3</a>
        <a class="Links" href="p_reparos-lab4-M_TC.php">Lab 4</a>
    </div>

</html>