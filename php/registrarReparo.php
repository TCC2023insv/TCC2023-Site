<?php
    require('conexao/conexaoBD.php');

    $conexao = ConectarBanco();
    session_start();

    $monitor = $_SESSION['login'];

    if (isset($_POST['btnRegistrar']))
    {
        $laboratorio = $_POST['sele-lab'];
        $data = $_POST['data'];
        $problemaApps = $_POST['prob-apps'];
        $problemaFonte = $_POST['prob-fonte'];
        $problemaHD = $_POST['prob-hd'];
        $problemaMonitor = $_POST['prob-monitor'];
        $problemaMouse = $_POST['prob-mouse'];
        $problemaTeclado = $_POST['prob-teclado'];
        $problemaWindows = $_POST['prob-windows'];

        $atividadeExercida = $_POST['atv-exer'];
        $problemasSolucionados = $_POST['prob-solu'];
        $responsavel = $_POST['responsavel'];

        $query1 = "INSERT INTO reparo (data, acao, problemas_solucionados, 
        responsavel, login_monitor, laboratorio) VALUES ('$data', '$atividadeExercida', 
        '$problemasSolucionados', '$responsavel','$monitor', '$laboratorio')";
        
        $query2 = "INSERT INTO dispositivo (nome, problema) VALUES ('Apps', '$problemaApps'), 
        ('Fonte', '$problemaFonte'), ('HD', '$problemaHD'), ('Monitor', '$problemaMonitor'), 
        ('Mouse', '$problemaMouse'), ('Teclado', '$problemaTeclado'), ('Windows', '$problemaWindows')";
        
        $resultado = mysqli_query($conexao, $query1); 
        $resultado = mysqli_query($conexao, $query2);

        $consultaIDS = "SELECT id FROM dispositivo ORDER BY id DESC LIMIT 7";
        $resultado = mysqli_query($conexao, $consultaIDS);

        if (mysqli_num_rows($resultado) > 0) {
            $ID_dispositivos = array();
        
            while ($coluna = mysqli_fetch_assoc($resultado)) {
                $ID_dispositivos[] = $coluna['id'];
            }
        }

        for ($i = 0; $i < 7; $i++)
        {
            $query3 = "INSERT INTO dispositivo_reparo (id_dispositivo, data_reparo) 
            VALUES ($ID_dispositivos[$i], '$data')";
            $resultado = mysqli_query($conexao, $query3);
        }

        return header("Location: ../../tcc2023-site/p_reg-repa-M_TC.html");
    }
    elseif (isset($_POST['btnVoltar']))
    {
        return header("Location: ../../tcc2023-site/p_inicial-M_TC.php");
    }
?>
