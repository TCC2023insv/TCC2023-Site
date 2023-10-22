<?php
    require("../../php/conexao/conexaoBD.php");

    if (!isset($_SESSION)) session_start();

    if (!isset($_SESSION['login']) or $_SESSION['tipoDeUsuario'] != 'Dir')
    {
        session_destroy();
        header("Location: ../p_login_tc.php");
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
                    <li><a href="p_ocorrencias.php">Ocorrências</a></li>
                    <li><a href="p_cadastros-D_TC.php">Cadastros</a></li>
                    <li><a class="Btn-Sair" onclick="Sair()" style="cursor: pointer;">Sair</a> </li>
                </ul>
            </nav>
    
            <h1>Lab 1</h1>
        
            <!-- <select class="Selecionar-LAB">
				<option value="Lab1"> Lab 1</option>
				<option value="lab2"> Lab 2</option>
				<option value="lab3"> Lab 3</option> 
				<option value="lab4"> Lab 4</option>
			</select>
             -->
            <?php
                while ($reparo = $sql_query->fetch_assoc())
                {
                echo "<a href='p_rep-registrado-D_TC.php?id=" . $reparo['ID'] ."'>" . "<div class='a' id='Bloco'>";
                    echo "<div class='Itens'>" . date('d/m/Y', strtotime($reparo['Data'])) . "</div>";
                    echo "<div class='Itens'>" . $reparo['Responsavel'] . "</div>";
                echo "</div></a>";
                } 
                $conexao->close();
            ?> 

        <script>
            function Sair()
            {
                swal({
                    title: "Tem certeza?",
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