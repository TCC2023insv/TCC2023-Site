<?php
    if (!isset($_SESSION)) session_start();

    if (!isset($_SESSION['login']) or $_SESSION['tipoDeUsuario'] != 'Mon')
    {
        session_destroy();
        header("Location: ../p_login_tc.php");
    }

    require('../../php/conexao/conexaoBD.php');
    $conexao = ConectarBanco();
    $sql_query = $conexao->query("SELECT `Nome` FROM monitor WHERE login = '"  . $_SESSION['login'] . "'");
    while ($monitor = $sql_query->fetch_assoc())
    {
        $nomeMonitor = $monitor['Nome'];
    }

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../css/diagnostico.css">
    <link rel="stylesheet" type="text/css" href="../../css/navbar_TC.css">
    <script src="../../js/sweetalert.js" type="module"></script>
    <script src="../../js/confirmar-saida.js"></script>
    <script src="../../js/inserir-imagem.js"></script>
    <title>Registrar Reparo</title>
</head>
<body>
    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="btncheck">
                <img src="img/icon.png">
            </label>

        <label class="logo">MonitoraLab</label>
        <ul>
            <li><a class="active Btn-Diag" href="p_reg-repa-M_TC.php">Registrar</a></li>
            <li><a href="p_M_Inicial_TC.php">Diagnósticos</a></li>
            <li><a class="Btn-Sair" href="../../php/classes/monitor.php?resp=sair">Sair</a></li>
        </ul>
    </nav>

    <fieldset id="Caixa">
        <form method="post" enctype="multipart/form-data" action="../../php/classes/monitor.php" id="Forms">

            <div id="Caixa-direita">
                <div id="Sele-Lab">
                    <div id="Titulo-E">
                        <label>Laboratório</label>
                    </div>
                    <select name="sele-lab" id="Lab-2" required>
                            <option value="Lab 1">Selecione</option>
                            <option value="Lab 1">Lab 1</option>
                            <option value="Lab 2">Lab 2</option>
                            <option value="Lab 3">Lab 3</option> 
                            <option value="Lab 4">Lab 4</option>
                        </select>
                </div>
                <div id="Data-Resp">
                    <input id="Data-2" type="date" name="data" required>
                    <!-- <label id="Responsavel-2" name="responsavel">Responsavel</label> -->
                    <input id="Responsavel" type="text" name="responsavel" placeholder="Responsável" required>
                </div>
            </div>

            <div id="Caixa-esquerda">
                <div id="Problemas">
                    <label class="Titulo">Problemas</label><br>

                    <!-- Problems 1 -->
                    <div>
                        <label name="apps" class="txtProb" for="apps">Apps</label>

                        <input class="Quant-2" type="text" placeholder="Quant" name="quantApps">

                        <select class="Select-2" name="prob-apps">
                            <option value="Sel">Selecione</option>
                            <option value="Quebrado">Quebrado</option>
                            <option value="Desatualizado">Desatualizado</option>
                            <option value="Em falta">Em falta</option>
                            <option value="Corrompido">Corrompido</option>
                            <option value="Em excesso">Em excesso</option>
                            <option value="Outros">Outros</option>
                        </select>
                    </div>

                    <!-- Problema 2 -->
                    <div>
                        <label name="fonte" class="txtProb">Fonte</label>

                        <input class="Quant-2" type="text" placeholder="Quant" name="quantFonte">

                        <select class="Select-2" name="prob-fonte">
                            <option value="sel">Selecione</option>
                            <option value="quebrado">Quebrado</option>
                            <option value="desatualizado">Desatualizado</option>
                            <option value="em falta">Em falta</option>
                            <option value="corrompido">Corrompido</option>
                            <option value="em excesso">Em excesso</option>
                            <option value="outros">Outros</option>
                        </select>
                    </div>

                    <!-- Problema 3 -->
                    <div>
                        <label name="hd" class="txtProb">HD</label>

                        <input class="Quant-2" type="text" placeholder="Quant" name="quantHD">

                        <select class="Select-2" name="prob-hd">
                                <option value="sel">Selecione</option>
                                <option value="quebrado">Quebrado</option>
                                <option value="desatualizado">Desatualizado</option>
                                <option value="em falta">Em falta</option>
                                <option value="corrompido">Corrompido</option>
                                <option value="em excesso">Em excesso</option>
                                <option value="outros">Outros</option>
                        </select>
                    </div>

                    <!-- Problema 4 -->
                    <div>
                        <label name="monitor" class="txtProb">Monitor</label>

                        <input class="Quant-2" type="text" placeholder="Quant" name="quantMonitor">

                        <select class="Select-2" name="prob-monitor">
                            <option value="sel">Selecione</option>
                            <option value="quebrado">Quebrado</option>
                            <option value="desatualizado">Desatualizado</option>
                            <option value="em falta">Em falta</option>
                            <option value="corrompido">Corrompido</option>
                            <option value="em excesso">Em excesso</option>
                            <option value="outros">Outros</option>
                        </select>
                    </div>


                    <!-- Problema 5 -->
                    <div>
                        <label name="mouse" class="txtProb">Mouse</label>

                        <input class="Quant-2" type="text" placeholder="Quant" name="quantMouse">

                        <select class="Select-2" name="prob-mouse">
                            <option value="sel">Selecione</option>
                            <option value="quebrado">Quebrado</option>
                            <option value="desatualizado">Desatualizado</option>
                            <option value="em falta">Em falta</option>
                            <option value="corrompido">Corrompido</option>
                            <option value="em excesso">Em excesso</option>
                            <option value="outros">Outros</option>
                        </select>
                    </div>


                    <!-- Problema 6  -->
                    <div>
                        <label name="outros" class="txtProb">Teclado</label>

                        <input class="Quant-2" type="text" placeholder="Quant" name="quantTeclado">

                        <select class="Select-2" name="prob-teclado">
                            <option value="sel">Selecione</option>
                            <option value="quebrado">Quebrado</option>
                            <option value="desatualizado">Desatualizado</option>
                            <option value="em falta">Em falta</option>
                            <option value="corrompido">Corrompido</option>
                            <option value="em excesso">Em excesso</option>
                            <option value="outros">Outros</option>
                        </select>
                    </div>

                    <!-- Problema 7 -->
                    <div>
                        <label name="outros" class="txtProb">Windows</label>

                        <input class="Quant-2" type="text" placeholder="Quant" name="quantWindows">

                        <select class="Select-2" name="prob-windows">
                            <option value="sel">Selecione</option>
                            <option value="quebrado">Quebrado</option>
                            <option value="desatualizado">Desatualizado</option>
                            <option value="em falta">Em falta</option>
                            <option value="corrompido">Corrompido</option>
                            <option value="em excesso">Em excesso</option>
                            <option value="outros">Outros</option>
                        </select>
                    </div>
                </div>
            </div>

            <div id="Caixa-Texto">
                <label class="Titulo-2">Atividade Exercida</label>
               <textarea class="Caixa-Texto" name="atv-exer" placeholder="Digite Aqui" required></textarea>
            </div>


            <div id="Caixa-Texto">
                <label class="Titulo-2">Problemas Solucionados</label>
                <textarea class="Caixa-Texto" name="prob-solu" placeholder="Digite Aqui" required></textarea>
            </div>

            <div id="Fotos">
                <label class="Titulo-3">Fotos</label>
                <label for="foto" class="Solte-Aqui">
                        <!-- <span class="Solte-Titulo">Clique aqui</span>
                        ou -->
                        <input type="file" name="fotos[]" id="foto" accept="image/*" multiple="true"> 
                    </label>
            </div>

            <div id="Btn">
                <button type="submit" class="Btn-Registrar" name="btnRegistrar">Registrar</button>

                <a href="javascript: history.go(-1)" class="Btn">Voltar</a>
            </div>

        </form>
    </fieldset>
</body>

</html>