<?php
    require('conexao/conexaoBD.php');

    $conexao = ConectarBanco();
    session_start();

    $monitor = $_SESSION['login'];

    // function RegistrarImagem($nomeDaFoto, $pasta, $data, $conexao)
    // {
    //     if ($_FILES[$nomeDaFoto]['name'] != null)
    //     {
            // $nomeDoArquivo = $_FILES[$nomeDaFoto]['name'];
            // $novoNomeDoArquivo = uniqid();
            // $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));

            // $path = $pasta . $novoNomeDoArquivo . "." . $extensao;
            // $armazenou = move_uploaded_file($_FILES[$nomeDaFoto]['tmp_name'], $path);

            // if ($armazenou)
            // {
            //     $conexao->query("INSERT INTO arquivos (data_reparo, path) VALUES ('$data', '$path')");
            // }
    //     }
    // }

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
        
        $conexao->query("INSERT INTO reparo (data, acao, problemas_solucionados, 
        responsavel, login_monitor, laboratorio) VALUES ('$data', '$atividadeExercida', 
        '$problemasSolucionados', '$responsavel','$monitor', '$laboratorio')");

        $conexao->query("INSERT INTO dispositivo (nome, problema) VALUES ('Apps', '$problemaApps'), 
        ('Fonte', '$problemaFonte'), ('HD', '$problemaHD'), ('Monitor', '$problemaMonitor'), 
        ('Mouse', '$problemaMouse'), ('Teclado', '$problemaTeclado'), ('Windows', '$problemaWindows')");

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

            // para colocar no html
            // if ($arquivo1['error'])
            // {
            //     echo "Falha ao enviar o arquivo";
            // }
            // if ($extensao != "png" && $extensao != "jpg" && $extensao != "jpeg")
            // {
            //     echo "Tipo de arquivo não aceito.";
            // }


         $pasta = "../arquivos/";

        // if (isset($_FILES['foto1']))
        // {
        //     $nomeDoArquivo = $_FILES['foto1']['name'];
        //     $novoNomeDoArquivo = uniqid();
        //     $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));

        //     $path = $pasta . $novoNomeDoArquivo . "." . $extensao;
        //     $armazenou = move_uploaded_file($_FILES['foto1']['tmp_name'], $path);
    
        //     if ($armazenou)
        //     {
        //         $conexao->query("INSERT INTO arquivos (data_reparo, path) VALUES ('$data', '$path')");
        //     }
        // }

        // if (isset($_FILES['foto2']))
        // {
        //     $nomeDoArquivo = $_FILES['foto2']['name'];
        //     $novoNomeDoArquivo = uniqid();
        //     $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));

        //     $path = $pasta . $novoNomeDoArquivo . "." . $extensao;
        //     $armazenou = move_uploaded_file($_FILES['foto2']['tmp_name'], $path);
    
        //     if ($armazenou)
        //     {
        //         $conexao->query("INSERT INTO arquivos (data_reparo, path) VALUES ('$data', '$path')");
        //     }
        // }

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
                    $conexao->query("INSERT INTO arquivos (data_reparo, path) VALUES ('$data', '$path')");
                }
            }
        }
        $conexao->close();
        return header("Location: ../../tcc2023-site/p_reg-repa-M_TC.html");
    }
    elseif (isset($_POST['btnVoltar']))
    {
        return header("Location: ../../tcc2023-site/p_inicial-M_TC.php");
    }
?>
