<?php
    require("../../php/conexao/conexaoBD.php");

    if (!isset($_SESSION)) session_start();

    if (!isset($_SESSION['login']) or $_SESSION['tipoDeUsuario'] != 'Dir')
    {
        session_destroy();
        header("Location: ../login.php");
    }
    
    $conexao = ConectarBanco();

    $sql_query = $conexao->query("SELECT `ID`, `Data`, `Responsavel`, `Laboratorio` FROM `reparo` 
    ORDER BY `Data` DESC") or die ($conexao->error);
    ?>

    <!DOCTYPE html>
    <html lang="pt-BR">
        <head>
            <meta charset="UTF-8">
            <link rel="stylesheet" type="text/css" href="../../css/p_inicial.css">
            <link rel="stylesheet" type="text/css" href="../../css/navbar_tc.css">
            <link rel="stylesheet" href="../../css/fonte-alert.css">
            <script src="../../js/sweetalert.js" type="module"></script>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Diagnósticos</title>
        </head>
        <body>
            <nav>
                <input type="checkbox" id="check">
                <label for="check" class="btncheck">
                    <img src="../../img/icon.png">
                </label>
                <label class="logo">MonitoraLab</label>
                <ul>
                    <li><a class="active" href="">Diagnósticos</a></li>
                    <li><a href="ocorrencias.php">Ocorrências</a></li>
                    <li><a href="professores-cadastrados.php">Cadastros</a></li>
                    <li><a class="Btn-Sair" onclick="Sair()" style="cursor: pointer;">Sair</a> </li>
                </ul>
            </nav>
        
            <?php
                while ($reparo = $sql_query->fetch_assoc())
                {
                    echo "<a href='diagnostico.php?id=" . $reparo['ID'] ."'>" . "<div class='a' id='Bloco'>";
                    echo "<div class='data-responsavel'>";
                        echo "<div class='Itens'>" . date('d/m/Y', strtotime($reparo['Data'])) . "</div>";
                        echo "<div id='Lab'>". $reparo['Laboratorio'] . "</div>";
                    echo "</div>";
                    echo "<div class='Itens'>" . $reparo['Responsavel'] . "</div>";
                    echo "</div></a>";
                } 
                $conexao->close();
            ?> 

        <script>
            function Sair()
            {
                swal({
                    title: "Deseja realmente sair?",
                    icon: "warning",
                    buttons: ["Cancel", true],
                }).then(value =>{
                    if (value)
                    {
                        window.location.href = "../../php/classes/usuarios.php?resp=true";              
                    }
                })
                return false;
            }
        </script>
        </body>
    </html>