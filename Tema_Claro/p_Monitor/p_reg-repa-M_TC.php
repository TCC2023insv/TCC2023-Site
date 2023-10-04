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
    <link rel="stylesheet" type="text/css" href="../../css/p_reg-repa-M_TC.css">
    <link rel="stylesheet" type="text/css" href="../../css/navbar_TC.css">
    <script src="../../js/sweetalert.js" type="module"></script>
    <script src="../../js/jquery.js"></script>
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
        <form id="Diagnostico" method="post" enctype="multipart/form-data" action="../../php/classes/usuarios.php" id="Forms">

            <div id="Caixa-esquerda">
                <div id="Sel-Labs">
                    <label id="Titulo-E">Laboratório</label><br>
                    <select name="sele-lab" id="Lab" required>
                            <option value="">Selecione</option>
                            <option value="Lab 1">Lab 1</option>
                            <option value="Lab 2">Lab 2</option>
                            <option value="Lab 3">Lab 3</option> 
                            <option value="Lab 4">Lab 4</option>
                        </select>
                </div>
                <div id="Data-Resp">
                    <input id="Data" type="date" name="data" required>
                    <input id="Responsavel" type="text" name="responsavel" value="<?= $nomeMonitor ?>" placeholder="Responsável" readonly>
                </div>
            </div>

            <div id="Caixa-direita">
                <div id="Problemas">
                    <label class="Titulo">Problemas</label><br>

                    <!-- Problems 1 -->
                    <div>
                        <label name="apps" class="txtProb" for="apps">APPs</label>

                        <input class="Quant" id="quantApps" type="text" placeholder="Quant" name="quantApps">

                        <select class="Select" id="probApps" name="prob-apps">
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

                        <input class="Quant" id="quantFonte" type="text" placeholder="Quant" name="quantFonte">

                        <select class="Select" id="probFonte" name="prob-fonte">
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

                        <input class="Quant" id="quantHD" type="text" placeholder="Quant" name="quantHD">

                        <select class="Select" id="probHD" name="prob-hd">
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

                        <input class="Quant" id="quantMonitor" type="text" placeholder="Quant" name="quantMonitor">

                        <select class="Select" id="probMonitor" name="prob-monitor">
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

                        <input class="Quant" id="quantMouse" type="text" placeholder="Quant" name="quantMouse">

                        <select class="Select" id="probMouse" name="prob-mouse">
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

                        <input class="Quant" id="quantTeclado" type="text" placeholder="Quant" name="quantTeclado">

                        <select class="Select" id="probTeclado" name="prob-teclado">
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

                        <input class="Quant" id="quantWindows" type="text" placeholder="Quant" name="quantWindows">

                        <select class="Select" id="probWindows" name="prob-windows">
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
                <textarea class="Atv-Exer" id="atvExercida" name="atv-exer" placeholder="Digite Aqui" required></textarea>
            </div>


            <div id="Caixa-Texto-2">
                <label class="Titulo">Problemas Solucionados</label>
                <textarea class="Prob-Solu" id="probSolucionados" name="prob-solu" placeholder="Digite Aqui" required></textarea>
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
    <script>
    $(document).ready(function() {
        $("#Diagnostico").submit(function(e) {
            e.preventDefault();

            var Lab = $("#Lab").val();
            var data = $("#Data").val();
            var responsavel = $("#Responsavel").val();
            var quantApps = $("#quantApps").val();
            var probApps = $("#probApps").val();
            var quantFonte = $("#quantFonte").val();
            var probFonte = $("#probFonte").val();
            var quantHD = $("#quantHD").val();
            var probHD = $("#probHD").val();
            var quantMonitor = $("#quantMonitor").val();
            var probMonitor = $("#probMonitor").val();
            var quantMouse = $("#quantMouse").val();
            var probMouse = $("#probMouse").val();
            var quantTeclado = $("#quantTeclado").val();
            var probTeclado = $("#probTeclado").val();
            var quantWindows = $("#quantWindows").val();
            var probWindows = $("#probWindows").val();
            var atvExercida = $("#atvExercida").val();
            var probSolucionados = $("#probSolucionados").val();
            var fotos = document.getElementById("foto");
            var RegistrarReparo = "RegistrarReparo";

            var formData = new FormData();

            for (var i = 0; i < fotos.files.length; i++)
            {
                formData.append("foto[]", fotos.files[i]);
            }
                formData.append("Lab", Lab);
                formData.append("data", data);
                formData.append("responsavel", responsavel);
                formData.append("quantApps", quantApps);
                formData.append("probApps", probApps);
                formData.append("quantFonte", quantFonte);
                formData.append("probFonte", probFonte);
                formData.append("quantHD", quantHD);
                formData.append("probHD", probHD);
                formData.append("quantMonitor", quantMonitor);
                formData.append("probMonitor", probMonitor);
                formData.append("quantMous", quantMouse);
                formData.append("probMouse", probMouse);
                formData.append("quantTeclado",quantTeclado);
                formData.append("probTeclado", probTeclado);
                formData.append("quantWindows", quantWindows);
                formData.append("probWindows", probWindows);
                formData.append("atvExercida", atvExercida);
                formData.append("probSolucionados", probSolucionados);
                formData.append("RegistrarReparo", RegistrarReparo);

            $.ajax({
                type: "POST",
                url: $(this).attr("action"),
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    swal({
                    title: "Diagnóstico Registrado!",
                    text: "O diagnóstico foi registrado com sucesso. Agradecemos a colaboração!",
                    icon: "success",
                    button: {confirm: true},
                    }).then(value =>{
                        if (value)
                        {
                        window.location.href = "javascript: history.go(-1)";
                        }
                    });
                },
                error: function() {
                    swal({
                    title: "Falha no Registro!",
                    text: "Ocorreu um problema ao registrar o diagnóstico.Tente novamente.",
                    icon: "error",
                    button: {confirm: true},
                    });
                }
            });
        });
    });
    </script>
</body>

</html>