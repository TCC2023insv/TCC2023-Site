<?php
    class Usuarios
    {
        public $id;
        public $login;
        public $nome;
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
        
        public function Entrar()
        {
            $tipoDeLogin = $_POST['identificacao'];
            $login = $_POST['login'];
            $senha = $_POST['senha'];

            if (isset($_POST['entrar']))
            {
                switch ($tipoDeLogin) {
                    case 'Dir':
                        require('../conexao/conexaoBD.php');

                        $conexao = ConectarBanco();
                        $query = "SELECT * FROM direcao WHERE login = '$login' AND senha = '$senha'";
                        $resultado = mysqli_query($conexao, $query);
            
                        if (mysqli_num_rows($resultado) > 0) 
                        {
                            $conexao->close();
                            
                            if (!isset($_SESSION)) session_start();
            
                            $_SESSION['login'] = $login;
                            $_SESSION['login_incorreto'] = false;
                            $_SESSION['tipoDeUsuario'] = $tipoDeLogin;

                            header("Location: ../../tema_claro/p_diretoria/p_d_inicial_tc.php");
                            
                        }
                        $conexao->close();
                        $_SESSION['login_incorreto'] = true;
                        header("Location: ../../tema_claro/p_login_tc.php");
                        break;
                        
                    case 'Prof':
                        require('../conexao/conexaoBD.php');

                        $conexao = ConectarBanco();
                        $query = "SELECT * FROM professor WHERE login = '$login' AND senha = '$senha'";
                        $resultado = mysqli_query($conexao, $query);

                        if (mysqli_num_rows($resultado) > 0) 
                        {
                            $conexao->close();

                            if (!isset($_SESSION)) session_start();

                            $_SESSION['login'] = $login;
                            $_SESSION['login_incorreto'] = false;
                            $_SESSION['tipoDeUsuario'] = $tipoDeLogin;

                            header("Location: ../../tema_claro/p_professor/p_p_inicial_tc.php");
                        }
                        $conexao->close();
                        $_SESSION['login_incorreto'] = true;
                        header("Location: ../../tema_claro/p_login_tc.php");
                        break;

                    case 'Mon':
                        require('../conexao/conexaoBD.php');

                        $conexao = ConectarBanco();
                        $query = "SELECT * FROM monitor WHERE login = '$login' AND senha = '$senha'";
                        $resultado = mysqli_query($conexao, $query);

                        if (mysqli_num_rows($resultado) > 0) 
                        {
                            $conexao->close();

                            if (!isset($_SESSION)) session_start();

                            $_SESSION['login'] = $login;
                            $_SESSION['login_incorreto'] = false;
                            $_SESSION['tipoDeUsuario'] = $tipoDeLogin;

                            header("Location: ../../tema_claro/p_monitor/p_m_inicial_tc.php");
                        }
                        $conexao->close();
                            $_SESSION['login_incorreto'] = true;

                            header("Location: ../../tema_claro/p_login_tc.php");
                        break;
                    default:
                    header("Location: ../tema_claro/p_login_tc.php");
                        break;
                }
            }
        }

        public function Sair()
        {
            if ($_GET['resp'])
            {
                session_start();
                session_destroy();
                header("Location: ../../tema_claro/p_login_tc.php");
            }
        }
    }

    class Direcao extends Usuarios
    {
        public function CadastrarProfessor($nomeProfessor, $loginProfessor, $senhaProfessor)
        {
            require('../conexao/conexaoBD.php');

            $Professor = new Professor();
            $Professor->GetNome($nomeProfessor);
            $Professor->GetLogin($loginProfessor);
            $Professor->GetSenha($senhaProfessor);

            $conexao = ConectarBanco();
            session_start();
        
            $direcao = $_SESSION['login'];
        
            $conexao->query("INSERT INTO professor (login, nome, senha, login_direcao) VALUES 
            ( '" . $Professor->login . "', '" . $Professor->nome . "', '" . $Professor->senha . "', '" 
            .$direcao."')");
        
            $conexao->close();
            return header("Location: ../../../tcc2023-site/tema_claro/p_diretoria/p_d_Inicial_tc.php");
        }
    }

    class Professor extends Usuarios
    {
        public function CadastrarMonitor($nomeMonitor, $loginMonitor, $senhaMonitor)
        {
            require('../conexao/conexaoBD.php');

            $Monitor = new Monitor();
            $Monitor->GetNome($nomeMonitor);
            $Monitor->GetLogin($loginMonitor);
            $Monitor->GetSenha($senhaMonitor);
            session_start();
            $conexao = ConectarBanco();
            $professor = $_SESSION['login'];
        
            if(
                $conexao->query("INSERT INTO monitor (login, nome, senha, login_professor) VALUES 
            ( '" . $Monitor->login . "', '" . $Monitor->nome . "', '" . $Monitor->senha . "', '" 
            .$professor ."')"))
            {
                $conexao->close();
                return true;
            }
            $conexao->close();
            return false;
        }

        public function RegistrarOcorrencia($data, $titulo, $descricao)
        {
            require('../conexao/conexaoBD.php');
            require('ocorrencias.php');

            session_start();
            $professor = $_SESSION['login'];
            $Ocorrencia = new Ocorrencia($professor, $data, $titulo, $descricao);

            $conexao = ConectarBanco();
            $resultado = mysqli_query($conexao, "SELECT nome FROM professor WHERE login = '" . 
                $professor . "'");
            if($resultado)
            {
                $row = mysqli_fetch_assoc($resultado);
                $responsavel = $row['nome'];
            }
            if (
            $conexao->query("INSERT INTO ocorrencia (data, titulo, descricao, responsavel, login_prof) 
            VALUES ('" . $Ocorrencia->data . "', '" . $Ocorrencia->titulo . "', '" . 
            $Ocorrencia->descricao . "', '" . $responsavel . "', '" . $professor . "')"))
            {
                $conexao->close();
                return true;
            }
            $conexao->close();
            return false;
        }
    }

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

            $Diagnostico = new Diagnostico($_POST['Lab'], $_POST['data'], RegistrarProblema($_POST['probApps']),
            $_POST['quantApps'],  RegistrarProblema($_POST['probFonte']), $_POST['quantFonte'],
            RegistrarProblema($_POST['probHD']), $_POST['quantHD'], RegistrarProblema($_POST['probMonitor']),
            $_POST['quantMonitor'], RegistrarProblema($_POST['probMouse']), $_POST['quantMouse'],
            RegistrarProblema($_POST['probTeclado']), $_POST['quantTeclado'], RegistrarProblema($_POST['probWindows']),
            $_POST['quantWindows'], $_POST['atvExercida'], $_POST['probSolucionados'], $_POST['responsavel']);
                
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
                return header("Location: ../../../tcc2023-site/tema_claro/p_Monitor/p_reg-repa-M_TC.php");
        }
    }

    if (isset($_POST['RegistrarReparo']))
    {
        $Monitor = new Monitor();
        $Monitor->RegistrarReparo();
    }

    if (isset($_POST['CadastrarMonitor']))
    {
        $Professor = new Professor();
        $Professor->CadastrarMonitor($_POST['nome'], $_POST['login'], $_POST['senha']);
    }

    if (isset($_POST['RegistrarOcorrencia']))
    {
        $Professor = new Professor();
        $Professor->RegistrarOcorrencia($_POST['data'], $_POST['titulo'], $_POST['txtDescricao']);
    }

    if (isset($_POST['CadastrarProfessor']))
    {
        $Direcao = new Direcao();
        $Direcao->CadastrarProfessor($_POST['nome'], $_POST['login'], $_POST['senha']);
    }

    if (isset($_POST['entrar']))
    {
        $Usuario = new Usuarios();
        $Usuario->Entrar();
    }

    if (isset($_GET['resp']))
    {
        $Usuario = new Usuarios();
        $Usuario->Sair();
    }
?>