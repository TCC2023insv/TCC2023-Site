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
    <link rel="stylesheet" href="../../css/fonte-alert.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="../../js/sweetalert.js" type="module"></script>
    <script src="../../js/jquery.js"></script>
    <script src="../../js/foto.js"></script>
    <title>Registrar Reparo</title>
</head>
<body>
    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="btncheck">
                <img src="../../img/icon.png">
            </label>

        <label class="logo">MonitoraLab</label>
        <ul>
            <li><a class="active Btn-Diag" href="p_reg-repa-M_TC.php">Registrar</a></li>
            <li><a href="p_M_Inicial_TC.php">Diagnósticos</a></li>
            <li><a class="Btn-Sair" onclick="Sair()" style="cursor: pointer;">Sair</a> </li>
        </ul>
    </nav>

    <fieldset id="Caixa">
        <form id="Diagnostico" method="post" enctype="multipart/form-data" action="../../php/classes/usuarios.php" id="Forms">

            <div id="Caixa-direita">
                <div id="Sele-Lab">
                    <div id="Titulo-E">
                        <label>Laboratório</label>
                    </div>
                    <select name="sele-lab" id="Lab-2" required>
                        <option class="Select-item" value="">Selecione</option>
                        <option class="Select-item" value="Lab 1">Lab 1</option>
                        <option class="Select-item" value="Lab 2">Lab 2</option>
                        <option class="Select-item" value="Lab 3">Lab 3</option> 
                        <option class="Select-item" value="Lab 4">Lab 4</option>
                    </select>
                </div>
                <div id="Data-Resp">
                    <input id="Data-2" type="date" name="data" required>
                    <!-- <label id="Responsavel-2" name="responsavel">Responsavel</label> -->
                    <input id="Responsavel" type="text" name="responsavel" value="<?= $nomeMonitor ?>" readonly required>
                </div>
            </div>

            <div id="Caixa-esquerda">
                <div id="Problemas">
                    <label class="Titulo">Problemas</label><br>

                    <!-- Problems 1 -->
                    <div>
                        <label name="apps" class="txtProb" for="apps">Apps</label>

                        <input class="Quant-2" id="quantApps" type="number" min="0" max="100" placeholder="Quant" name="quantApps">

                        <select class="Select-2" id="probApps" name="prob-apps">
                            <option class="Select-item" value="Sel">Selecione</option>
                            <option class="Select-item" value="Quebrado">Quebrado</option>
                            <option class="Select-item" value="Desatualizado">Desatualizado</option>
                            <option class="Select-item" value="Em falta">Em falta</option>
                            <option class="Select-item" value="Corrompido">Corrompido</option>
                            <option class="Select-item" value="Em excesso">Em excesso</option>
                            <option class="Select-item" value="Outros">Outros</option>

                        </select>
                    </div>

                    <!-- Problema 2 -->
                    <div>
                        <label name="fonte" class="txtProb">Fonte</label>

                        <input class="Quant-2" id="quantFonte" type="number" min="0" max="100" placeholder="Quant" name="quantFonte">

                        <select class="Select-2" id="probFonte" name="prob-fonte">
                            <option class="Select-item" value="sel">Selecione</option>
                            <option class="Select-item" value="quebrado">Quebrado</option>
                            <option class="Select-item" value="desatualizado">Desatualizado</option>
                            <option class="Select-item" value="em falta">Em falta</option>
                            <option class="Select-item" value="corrompido">Corrompido</option>
                            <option class="Select-item" value="em excesso">Em excesso</option>
                            <option class="Select-item" value="outros">Outros</option>
                        </select>
                    </div>

                    <!-- Problema 3 -->
                    <div>
                        <label name="hd" class="txtProb">HD</label>

                        <input class="Quant-2" id="quantHD" type="number" min="0" max="100" placeholder="Quant" name="quantHD">

                        <select class="Select-2" id="probHD" name="prob-hd">
                            <option class="Select-item" value="sel">Selecione</option>
                            <option class="Select-item" value="quebrado">Quebrado</option>
                            <option class="Select-item" value="desatualizado">Desatualizado</option>
                            <option class="Select-item" value="em falta">Em falta</option>
                            <option class="Select-item" value="corrompido">Corrompido</option>
                            <option class="Select-item" value="em excesso">Em excesso</option>
                            <option class="Select-item" value="outros">Outros</option>
                        </select>
                    </div>

                    <!-- Problema 4 -->
                    <div>
                        <label name="monitor" class="txtProb">Monitor</label>

                        <input class="Quant-2" id="quantMonitor" type="number" min="0" max="100" placeholder="Quant" name="quantMonitor">

                        <select class="Select-2" id="probMonitor" name="prob-monitor">
                            <option class="Select-item" value="sel">Selecione</option>
                            <option class="Select-item" value="quebrado">Quebrado</option>
                            <option class="Select-item" value="desatualizado">Desatualizado</option>
                            <option class="Select-item" value="em falta">Em falta</option>
                            <option class="Select-item" value="corrompido">Corrompido</option>
                            <option class="Select-item" value="em excesso">Em excesso</option>
                            <option class="Select-item" value="outros">Outros</option>
                        </select>
                    </div>


                    <!-- Problema 5 -->
                    <div>
                        <label name="mouse" class="txtProb">Mouse</label>

                        <input class="Quant-2" id="quantMouse" type="number" min="0" max="100" placeholder="Quant" name="quantMouse">

                        <select class="Select-2" id="probMouse" name="prob-mouse">
                            <option class="Select-item" value="sel">Selecione</option>
                            <option class="Select-item" value="quebrado">Quebrado</option>
                            <option class="Select-item" value="desatualizado">Desatualizado</option>
                            <option class="Select-item" value="em falta">Em falta</option>
                            <option class="Select-item" value="corrompido">Corrompido</option>
                            <option class="Select-item" value="em excesso">Em excesso</option>
                            <option class="Select-item" value="outros">Outros</option>
                        </select>
                    </div>


                    <!-- Problema 6  -->
                    <div>
                        <label name="outros" class="txtProb">Teclado</label>

                        <input class="Quant-2" id="quantTeclado" type="number" min="0" max="100" placeholder="Quant" name="quantTeclado">

                        <select class="Select-2" id="probTeclado" name="probTeclado">
                            <option class="Select-item" value="sel">Selecione</option>
                            <option class="Select-item" value="quebrado">Quebrado</option>
                            <option class="Select-item" value="desatualizado">Desatualizado</option>
                            <option class="Select-item" value="em falta">Em falta</option>
                            <option class="Select-item" value="corrompido">Corrompido</option>
                            <option class="Select-item" value="em excesso">Em excesso</option>
                            <option class="Select-item" value="outros">Outros</option>
                        </select>
                    </div>

                    <!-- Problema 7 -->
                    <div>
                        <label name="outros" class="txtProb">Windows</label>

                        <input class="Quant-2" id="quantWindows" type="number" min="0" max="100" placeholder="Quant" name="quantWindows">

                        <select class="Select-2" id="probWindows" name="prob-windows">
                            <option class="Select-item" value="sel">Selecione</option>
                            <option class="Select-item" value="quebrado">Quebrado</option>
                            <option class="Select-item" value="desatualizado">Desatualizado</option>
                            <option class="Select-item" value="em falta">Em falta</option>
                            <option class="Select-item" value="corrompido">Corrompido</option>
                            <option class="Select-item" value="em excesso">Em excesso</option>
                            <option class="Select-item" value="outros">Outros</option>
                        </select>
                    </div>
                </div>
            </div>

            <div id="Caixa-Texto">
                <label class="Titulo-2">Atividade Exercida</label>
               <textarea class="Caixa-Texto" id="atvExercida" name="atvExercida" placeholder="Digite Aqui" required></textarea>
            </div>


            <div id="Caixa-Texto">
                <label class="Titulo-2">Problemas Não Solucionados</label>
                <textarea class="Caixa-Texto" id="probSolucionados" name="probSolucionados" placeholder="Digite Aqui" required></textarea>

            </div>

            <div id="Fotos">
                <label class="Titulo-3">Fotos</label>
                <input type="file" name="foto[]" id="upload" accept="image/*" multiple="true" hidden>
       
                <label for="upload" class="uploadlabel">
                    <span><i class="fa fa-cloud-upload"></i></span>
                    <p>Escolher Arquivo</p>
                </label>

                <div id="filewrapper">
                    <h3 class="uploaded">Fotos Selecionadas:</h3>
                </div>
            </div>

            <div id="Btn">
                <button type="submit" class="Btn-Registrar" name="btnRegistrar">Registrar</button>

                <a href="p_m_inicial_tc.php" class="Btn">Voltar</a>
            </div>

        </form>
    </fieldset>
    <script>
    $(document).ready(function() {
        $("#Diagnostico").submit(function(e) {
            e.preventDefault();

            var Lab = $("#Lab-2").val();
            var data = $("#Data-2").val();
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
            var fotos = document.getElementById("upload");
            var RegistrarDiagnostico = "RegistrarDiagnostico";

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
                formData.append("RegistrarDiagnostico", RegistrarDiagnostico);

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