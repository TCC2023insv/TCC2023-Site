<?php
    require('usuarios.php');
    class Monitor extends Usuarios
    {
        public function RegistrarReparo()
        {
            require('../conexao/conexaoBD.php');
            require('diagnosticos.php');

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

            $Diagnostico = new Diagnostico($_POST['sele-lab'], $_POST['data'], RegistrarProblema($_POST['prob-apps']),
            $_POST['quantApps'],  RegistrarProblema($_POST['prob-fonte']), $_POST['quantFonte'],
            RegistrarProblema($_POST['prob-hd']), $_POST['quantHD'], RegistrarProblema($_POST['prob-monitor']),
            $_POST['quantMonitor'], RegistrarProblema($_POST['prob-mouse']), $_POST['quantMouse'],
            RegistrarProblema($_POST['prob-teclado']), $_POST['quantTeclado'], RegistrarProblema($_POST['prob-windows']),
            $_POST['quantWindows'], $_POST['atv-exer'], $_POST['prob-solu'], $_POST['responsavel']);
                
                $sql = "INSERT INTO reparo (data, acao, problemas_solucionados, 
                responsavel, login_monitor, laboratorio) VALUES ('$Diagnostico->data', '$Diagnostico->atividadeExercida', 
                '$Diagnostico->problemasSolucionados', '$Diagnostico->responsavel','$monitor', '$Diagnostico->laboratorio')";
        
                if ($conexao->query($sql) === true)
                {
                    $id_reparo = $conexao->insert_id;
                }
        
                $conexao->query("INSERT INTO dispositivo (nome, problema, quantidade) VALUES ('Apps', '$Diagnostico->problemaApps', 
                '$Diagnostico->quantApps'), ('Fonte', '$Diagnostico->problemaFonte', '$Diagnostico->quantFonte'), 
                ('HD', '$Diagnostico->problemaHD', '$Diagnostico->quantHD'), ('Monitor', '$Diagnostico->problemaMonitor', 
                '$Diagnostico->quantMonitor'), ('Mouse', '$Diagnostico->problemaMouse', '$Diagnostico->quantMouse'), ('Teclado', 
                '$Diagnostico->problemaTeclado', '$Diagnostico->quantTeclado'), ('Windows', '$Diagnostico->problemaWindows', 
                '$Diagnostico->quantWindows')");
        
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
        
                 $pasta = "../../arquivos/";
        
        
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
    }

    if (isset($_POST['btnRegistrar']))
    {
        $Monitor = new Monitor();
        $Monitor->RegistrarReparo();
    }

    if (isset($_GET['resp']))
    {
        $Monitor = new Monitor();
        $Monitor->Sair();
    }
?>