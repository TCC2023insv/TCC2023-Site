<?php
    class monitor
    {
        public $nome;
        public $login;
        public $senha;

        public function GetNome($nome)
        {
            $this->nome = $nome;
        }
        public function SetNome()
        {
            return $this->nome;
        }

        public function GetLogin($login)
        {
            $this->login = $login;
        }
        public function SetLogin()
        {
            return $this->login;
        }

        public function GetSenha($senha)
        {
            $this->senha = $senha;
        }
        public function SetSenha()
        {
            return $this->senha;
        }

        public function Entrar($login, $senha)
        {
            require('conexao/conexaoBD.php');

            $monitor = new monitor();
            $monitor->GetLogin($login);
            $monitor->GetSenha($senha);

            $conexao = ConectarBanco();
            $query = "SELECT * FROM monitor WHERE login = '$monitor->login' AND senha = '$monitor->senha'";
            $resultado = mysqli_query($conexao, $query);

            if (mysqli_num_rows($resultado) > 0) 
            {
                $conexao->close();

                session_start();

                $_SESSION['login'] = $monitor->login;

                return true;
            }
            $conexao->close();
            return false;
        }

        public function Sair()
        {
            echo "<script>var dialogo = confirm('Tem certeza de que deseja sair?')
            if (dialogo)
            {
                window.location.href = '../../tema_claro/p_login_tc.php';
            }
            else
            {
                window.location.href = '../../tema_claro/p_monitor/p_m_inicial_tc.php';
                }
                </script>";
        }

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

            $diagnostico = new diagnostico($_POST['sele-lab'], $_POST['data'], RegistrarProblema($_POST['prob-apps']),
            $_POST['quantApps'],  RegistrarProblema($_POST['prob-fonte']), $_POST['quantFonte'],
            RegistrarProblema($_POST['prob-hd']), $_POST['quantHD'], RegistrarProblema($_POST['prob-monitor']),
            $_POST['quantMonitor'], RegistrarProblema($_POST['prob-mouse']), $_POST['quantMouse'],
            RegistrarProblema($_POST['prob-teclado']), $_POST['quantTeclado'], RegistrarProblema($_POST['prob-windows']),
            $_POST['quantWindows'], $_POST['atv-exer'], $_POST['prob-solu'], $_POST['responsavel']);
                
                $sql = "INSERT INTO reparo (data, acao, problemas_solucionados, 
                responsavel, login_monitor, laboratorio) VALUES ('$diagnostico->data', '$diagnostico->atividadeExercida', 
                '$diagnostico->problemasSolucionados', '$diagnostico->responsavel','$monitor', '$diagnostico->laboratorio')";
        
                if ($conexao->query($sql) === true)
                {
                    $id_reparo = $conexao->insert_id;
                }
        
                $conexao->query("INSERT INTO dispositivo (nome, problema, quantidade) VALUES ('Apps', '$diagnostico->problemaApps', 
                '$diagnostico->quantApps'), ('Fonte', '$diagnostico->problemaFonte', '$diagnostico->quantFonte'), 
                ('HD', '$diagnostico->problemaHD', '$diagnostico->quantHD'), ('Monitor', '$diagnostico->problemaMonitor', 
                '$diagnostico->quantMonitor'), ('Mouse', '$diagnostico->problemaMouse', '$diagnostico->quantMouse'), ('Teclado', 
                '$diagnostico->problemaTeclado', '$diagnostico->quantTeclado'), ('Windows', '$diagnostico->problemaWindows', 
                '$diagnostico->quantWindows')");
        
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
        $monitor = new monitor();
        $monitor->RegistrarReparo();
    }

    if (isset($_GET['resp']))
    {
        $monitor = new monitor();
        $monitor->Sair();
    }
?>