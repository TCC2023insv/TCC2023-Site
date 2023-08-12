<?php
    require('conexao/conexaoBD.php');

    $conexao = ConectarBanco();
    session_start();

    $monitor = $_SESSION['login'];

    function RegistrarProblema($problemaSelecionado)
    {
        if ($problemaSelecionado == "sel")
        {
            return "";
        }
        return $problemaSelecionado;
    }

    if (isset($_POST['btnRegistrar']))
    {
        $laboratorio = $_POST['sele-lab'];
        $data = $_POST['data'];
        $problemaApps = RegistrarProblema($_POST['prob-apps']);
        $quantApps = $_POST['quantApps'];
        $problemaFonte = RegistrarProblema($_POST['prob-fonte']);
        $quantFonte = $_POST['quantFonte'];
        $problemaHD = RegistrarProblema($_POST['prob-hd']);
        $quantHD = $_POST['quantHD'];
        $problemaMonitor = RegistrarProblema($_POST['prob-monitor']);
        $quantMonitor = $_POST['quantMonitor'];
        $problemaMouse = RegistrarProblema($_POST['prob-mouse']);
        $quantMouse = $_POST['quantMouse'];
        $problemaTeclado = RegistrarProblema($_POST['prob-teclado']);
        $quantTeclado = $_POST['quantTeclado'];
        $problemaWindows = RegistrarProblema($_POST['prob-windows']);
        $quantWindows = $_POST['quantWindows'];

        $atividadeExercida = $_POST['atv-exer'];
        $problemasSolucionados = $_POST['prob-solu'];
        $responsavel = $_POST['responsavel'];
        
        $sql = "INSERT INTO reparo (data, acao, problemas_solucionados, 
        responsavel, login_monitor, laboratorio) VALUES ('$data', '$atividadeExercida', 
        '$problemasSolucionados', '$responsavel','$monitor', '$laboratorio')";

        if ($conexao->query($sql) === true)
        {
            $id_reparo = $conexao->insert_id;
        }

        $conexao->query("INSERT INTO dispositivo (nome, problema, quantidade) VALUES ('Apps', '$problemaApps', '$quantApps'),  
        ('Fonte', '$problemaFonte', '$quantFonte'), ('HD', '$problemaHD', '$quantHD'), 
        ('Monitor', '$problemaMonitor', '$quantMonitor'), ('Mouse', '$problemaMouse', '$quantMouse'), 
        ('Teclado', '$problemaTeclado', '$quantTeclado'), ('Windows', '$problemaWindows', '$quantWindows')");

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
            $conexao->query("INSERT INTO dispositivo_reparo (id_dispositivo, id_reparo) 
            VALUES ($ID_dispositivos[$i], '$id_reparo')");
        }

         $pasta = "../arquivos/";


        if (isset($_FILES['foto']))
        {
            $fotos = $_FILES['foto'];

            foreach ($fotos['tmp_name'] as $index => $imagemTmp) 
            {
                $nomeDoArquivo = $fotos['name'][$index];
                $novoNomeDoArquivo = uniqid();
                $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));
    
                $path = $pasta . $novoNomeDoArquivo . "." . $extensao;
                $armazenou = move_uploaded_file($imagemTmp, $path);
    
                if ($armazenou)
                {
                    $conexao->query("INSERT INTO arquivos (id_reparo, path) VALUES ('$id_reparo', '$path')");
                }
            }
        }
        $conexao->close();
        return header("Location: ../../../tcc2023-site/tema_claro/p_Monitor/p_reg-repa-M_TC.html");
    }
    elseif (isset($_POST['btnVoltar']))
    {
        return header("Location: ../../../tcc2023-site/tema_claro/p_Monitor/p_inicial-M_TC.php");
    }
?>
