<?php
   require("../../php/conexao/conexaoBD.php");
   
   if (!isset($_SESSION)) session_start();

   if (!isset($_SESSION['login']) or $_SESSION['tipoDeUsuario'] != 'Prof')
   {
       session_destroy();
       header("Location: ../p_login_tc.php");
   }

   $conexao = ConectarBanco();

   $sql_query = $conexao->query("SELECT `ID`, `Data`, `Titulo`, `Descricao`, `Responsavel` FROM ocorrencia
   ORDER BY `Data`DESC") or die ($conexao->error);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../../css/cores.css">
    <link rel="stylesheet" type="text/css" href="../../css/navbar_TC.css">
    <link rel="stylesheet" type="text/css" href="../../css/ocorrencias.css">
    <link rel="stylesheet" href="../../css/fonte-alert.css">
    <script src="../../js/sweetalert.js" type="module"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de ocorrências</title>
</head>
<body>
<nav>
        <input type="checkbox" id="check">
        <label for="check" class="btncheck">
            <img src="../../img/icon.png">
        </label>

        <label class="logo">MonitoraLab</label>
        <ul>
            <li><a href="P_P_Inicial_TC.php">Diagnósticos</a></li>
            <li><a class="active">Ocorrências</a></li>
            <li><a href="p_cadastros-P_TC.php">Cadastros</a></li>
            <li><a class="Btn-Sair" onclick="Sair()" style="cursor: pointer;">Sair</a> </li>
        </ul>
    </nav>

    <div class="registrar-ocorrencia">
    <a class="Btn-Ocorrencia" href="p_reg-ocorrencia.php">Registrar Ocorrência</a>
    </div>  

    <?php
        while ($ocorrencia = $sql_query->fetch_assoc())
        {

            echo "<div class='caixa'>";
                echo "<div class='lbl-input'>";
                    echo "<div class='info-ocorrencia'>";
                        echo "<label class='Titulo'>" . $ocorrencia['Titulo'] . "</label> ";                    
                        echo "<label id='profResp'>" . $ocorrencia['Responsavel'] . "</label>";
                    echo "</div>"; 
       
                echo "</div>";
                echo "<label class='txtOcorrencia-2'>" . $ocorrencia['Descricao'] . "</label>";
                    echo "<div class='data-botao'>";
                        echo "<label class='data-2'>" . date('d/m/Y', strtotime($ocorrencia['Data'])) . "</label>   ";       
                        echo "<a href='#' class='Btn-Excluir' onclick='Excluir(this)' id-ocorrencia='" . $ocorrencia['ID'] . "' style='cursor: pointer;'>Excluir</a>";
                    echo "</div>"; 
            echo "</div>";

        }
        // $conexao->close();
    ?>

    <script>
        function Excluir(element)
        {
            var id = element.getAttribute('id-ocorrencia')

            swal({
                title: "Tem certeza?",
                text: "A ocorrência registrada será perdida.",
                icon: "warning",
                buttons: ["Cancel", true],
                dangerMode: true,
                })
                .then((value) => {
                if (value) {
                    swal("Ocorrência excluída com sucesso!", {
                    icon: "success"
                    });
                    window.location.href = "../../php/classes/usuarios.php?id-ocorrencia="+id;
                } else {
                    swal("Não foi possível deletar a ocorrência.", {
                    icon: "error",
                    });
                }
                });
        }

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