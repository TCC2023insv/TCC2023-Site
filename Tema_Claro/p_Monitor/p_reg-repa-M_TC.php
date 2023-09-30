<?php
    if (!isset($_SESSION)) session_start();

    if (!isset($_SESSION['login']))
    {
        session_destroy();
        header("Location: ../p_login_tc.php");
    }
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../css/p_reg-repa-M_TC.css">
    <link rel="stylesheet" type="text/css" href="../../css/navbar_TC.css">
    <script src="../../js/confirmar-saida.js"></script>
    <title>Registrar Reparo</title>
</head>

<body>
    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="btncheck">
                <img src="img/icon.png">
            </label>

        <label class="logo">LOGO</label>
        <ul>
            <li><a class="active" href="p_reg-repa-M_TC.php">Registrar</a></li>
            <li><a href="p_M_Inicial_TC.php">Diagnósticos</a></li>
            <li><a id="BtnSair" onclick="Sair()" style="cursor: pointer;">Sair</a></li>
        </ul>
    </nav>

    <fieldset id="Caixa">
        <form method="post" enctype="multipart/form-data" action="../../php/classes/usuarios.php" id="Forms">

            <div id="Caixa-esquerda">
                <div id="Sel-Labs">
                    <label id="Titulo-E">Laboratório</label><br>
                    <select name="sele-lab" id="Lab" required>
                            <option value="Lab 1">Selecione</option>
                            <option value="Lab 1">Lab 1</option>
                            <option value="Lab 2">Lab 2</option>
                            <option value="Lab 3">Lab 3</option> 
                            <option value="Lab 4">Lab 4</option>
                        </select>
                </div>
                <div id="Data-Resp">
                    <input id="Data" type="date" name="data" required>
                    <input id="Responsavel" type="text" name="responsavel" placeholder="Responsável" required>
                </div>
            </div>

            <div id="Caixa-direita">
                <div id="Problemas">
                    <label class="Titulo">Problemas</label><br>

                    <!-- Problems 1 -->
                    <div>
                        <label name="apps" class="txtProb" for="apps">APPs</label>

                        <input class="Quant" type="text" placeholder="Quant" name="quantApps">

                        <select class="Select" name="prob-apps">
                            <option value="sel">Selecione</option>
                            <option value="quebrado">Quebrado</option>
                            <option value="desatualizado">Desatualizado</option>
                            <option value="em falta">Em falta</option>
                            <option value="corrompido">Corrompido</option>
                            <option value="em excesso">Em excesso</option>
                            <option value="outros">Outros</option>
                        </select>
                    </div>

                    <!-- Problema 2 -->
                    <div>
                        <label name="fonte" class="txtProb">Fonte</label>

                        <input class="Quant" type="text" placeholder="Quant" name="quantFonte">

                        <select class="Select" name="prob-fonte">
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

                        <input class="Quant" type="text" placeholder="Quant" name="quantHD">

                        <select class="Select" name="prob-hd">
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

                        <input class="Quant" type="text" placeholder="Quant" name="quantMonitor">

                        <select class="Select" name="prob-monitor">
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

                        <input class="Quant" type="text" placeholder="Quant" name="quantMouse">

                        <select class="Select" name="prob-mouse">
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

                        <input class="Quant" type="text" placeholder="Quant" name="quantTeclado">

                        <select class="Select" name="prob-teclado">
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

                        <input class="Quant" type="text" placeholder="Quant" name="quantWindows">

                        <select class="Select" name="prob-windows">
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

            <div id="Caixa-Texto-1">
                <label class="Titulo">Atividade Exercida</label><br>
                <textarea class="Atv-Exer" name="atv-exer" placeholder="Digite Aqui" required></textarea>
            </div>


            <div id="Caixa-Texto-2">
                <label class="Titulo">Problemas Solucionados</label>
                <textarea class="Prob-Solu" name="prob-solu" placeholder="Digite Aqui" required></textarea>
            </div>

            <div id="Fotos">
                <label class="Titulo">Fotos</label>
                <label for="foto" class="Solte-Aqui">
                        <span class="Solte-Titulo">Clique aqui</span>
                        ou
                        <input type="file" name="foto[]" id="foto" accept="image/*" multiple> 
                    </label>
            </div>

            <div id="Btn">
                <div id="Btn">
                    <a href="javascript: history.go(-1)" class="Btn">Voltar</a>
                </div>
                <button type="submit" id="Btn" name="btnRegistrar">Registrar</button>
            </div>

        </form>
    </fieldset>
</body>

</html>