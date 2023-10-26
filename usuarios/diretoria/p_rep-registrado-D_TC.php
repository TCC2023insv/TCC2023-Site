<?php
   require("../../php/conexao/conexaoBD.php");
   
   if (!isset($_SESSION)) session_start();

   if (!isset($_SESSION['login']) or $_SESSION['tipoDeUsuario'] != 'Dir')
   {
       session_destroy();
       header("Location: ../p_login_tc.php");
   }

   $conexao = ConectarBanco();
   $ID_Reparo = $_GET['id'];

   $sql_query = $conexao->query("SELECT `ID`, `Data`, `Acao`, `Problemas_Nao_Solucionados`, `Responsavel`, 
   `Login_Monitor`, `Laboratorio` FROM `reparo` WHERE ID = '$ID_Reparo'") or die ($conexao->error);

    $sql_query_prob = $conexao->query("SELECT dispositivo.Nome, dispositivo.Quantidade, dispositivo.Problema 
    FROM dispositivo JOIN dispositivo_reparo ON dispositivo.ID = dispositivo_reparo.ID_Dispositivo
    WHERE dispositivo_reparo.ID_Reparo = '$ID_Reparo'") or die ($conexao->error);

    if ($sql_query && mysqli_num_rows($sql_query) > 0) {
        $reparo = mysqli_fetch_assoc($sql_query);
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- <link rel="stylesheet" type="text/css" href="../../css/registrados-diag.css"> -->
        <link rel="stylesheet" type="text/css" href="../../css/diagnostico.css">
        <link rel="stylesheet" type="text/css" href="../../css/navbar_tc.css">
        <link rel="stylesheet" href="../../css/fonte-alert.css">
        <script src="../../js/sweetalert.js" type="module"></script>
        <title>Reparo</title>
    </head>
    <body>
        <nav>
            <input type="checkbox" id="check">
            <label for="check" class="btncheck">
                <img src="../../img/icon.png">
            </label>
    
            <label class="logo">MonitoraLab</label>
            <ul>
                <li><a class="active" href="p_D_Inicial_TC.php">Diagnósticos</a></li>
                <li><a href="p_ocorrencias.php">Ocorrências</a></li>
                <li><a href="p_cadastros-D_TC.php">Cadastros</a></li>
                <li><a class="Btn-Sair" onclick="Sair()" style="cursor: pointer;">Sair</a> </li>
                <!-- <li><a class="Btn-Sair" href="../../php/ -->
                <!-- <li><a class="Btn-Sair" href="../../php/classes/direcao.php?resp=sair">Sair</a></li> -->
            </ul>
        </nav>

        <div id="Caixa">
            <div id="Caixa1">
                <div id="Caixa-direita">
                    <div id="Sele-Lab">
                        <div id="Titulo-E">
                            <label>Laboratório</label>
                        </div>
                        
                        <div id="Lab">
                            <?php
                                if (isset($reparo))
                                {
                            ?>
                            <label><?php echo $reparo['Laboratorio']; ?></label>
                            <?php
                                }
                            ?>
                        </div>
                    </div>

                    <div id="Data-Resp">
                        <?php
                            if (isset($reparo))
                            {
                        ?>
                        <label id="Data"><?php echo date('d/m/Y', strtotime($reparo['Data'])); ?></label>
                        <label id="Responsavel"><?php echo $reparo['Responsavel']; ?></label>
                        <?php
                            }
                        ?>
                    </div>
                </div>

                <div id="Caixa-esquerda">
                    <div id="Problemas">
                        <label class="Titulo">Problemas</label>

                        <!-- TESTAR COM BANCO DE DADOS -->

                        <?php
                            while ($problema = $sql_query_prob->fetch_assoc())
                            {
                        ?> 
                            <div>
                                <label class="txtProb"><?php echo $problema['Nome']; ?></label>
                                <label class="Quant"><?php echo $problema['Quantidade']; ?></label>
                                <label class="Select"><?php echo $problema['Problema'];?></label>
                            </div>
                        <?php
                            }
                        ?>

                    </div>
                </div>
            </div>
            <div id="Caixa2">   
                <div id="Caixa-Texto">

                    <label class="Titulo-2">Atividade Exercida</label>

                    <?php
                        if (isset($reparo))
                            {
                    ?>
                    <label class="Caixa-Texto"><?php echo $reparo['Acao']; ?></label>
                    <?php
                            }
                    ?>
                </div>
    
                <div id="Caixa-Texto">
                    <label class="Titulo-2">Problemas Solucionados</label>

                    <?php
                        if (isset($reparo))
                            {
                    ?>      
                    <label class="Caixa-Texto"><?php echo $reparo['Problemas_Nao_Solucionados']; ?></label>
                    <?php
                        }
                ?>
                </div>

                <div id="Fotos">
                    <label class="Titulo-3">Fotos</label>
                    <?php
                        $conexao->close();
                    ?>
                </div>
    
            </div>

            <div id="Btn">
                <a href="javascript: history.go(-1)" class="Btn">Voltar</a>
            </div>

        </div>

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