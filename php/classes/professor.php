<?php
    class professor
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

            $professor = new professor();
            $professor->GetLogin($login);
            $professor->GetSenha($senha);

            $conexao = ConectarBanco();
            $query = "SELECT * FROM professor WHERE login = '$professor->login' AND senha = 
            '$professor->senha'";
            $resultado = mysqli_query($conexao, $query);

            if (mysqli_num_rows($resultado) > 0) 
            {
                $conexao->close();

                session_start();

                $_SESSION['login'] = $professor->login;

                return header("Location: ../tema_claro/p_professor/p_p_inicial_tc.php");
            }
            $conexao->close();
            return header("Location: ../tema_claro/p_login_tc.html");
        }

        public function CadastrarMonitor($nomeMonitor, $loginMonitor, $senhaMonitor)
        {
            require('../conexao/conexaoBD.php');
            require('monitor.php');

            $monitor = new monitor();
            $monitor->GetNome($nomeMonitor);
            $monitor->GetLogin($loginMonitor);
            $monitor->GetSenha($senhaMonitor);
            session_start();
            $conexao = ConectarBanco();
            $professor = $_SESSION['login'];
        
            $conexao->query("INSERT INTO monitor (login, nome, senha, login_professor) VALUES 
            ( '" . $monitor->login . "', '" . $monitor->nome . "', '" . $monitor->senha . "', '" 
            .$professor ."')");
        
            $conexao->close();
            return header("Location: ../../../tcc2023-site/tema_claro/p_professor/p_p_inicial_tc.php");
        }

        public function RegistrarOcorrencia($data, $descricao)
        {
            require('../conexao/conexaoBD.php');
            require('ocorrencias.php');

            session_start();
            $professor = $_SESSION['login'];
            $Ocorrencia = new Ocorrencias($professor, $data, $descricao);

            $conexao = ConectarBanco();
            $resultado = mysqli_query($conexao, "SELECT nome FROM professor WHERE login = '" . 
                $professor . "'");
            if($resultado)
            {
                $row = mysqli_fetch_assoc($resultado);
                $responsavel = $row['nome'];
            }
            $conexao->query("INSERT INTO ocorrencias (data, descricao, responsavel, login_prof) 
            VALUES ('" . $Ocorrencia->data . "', '" . $Ocorrencia->descricao . "', '" . 
            $responsavel . "', '" . $professor . "')");
            $conexao->close();

            return header("Location: ../../tema_claro/p_professor/p_p_inicial_tc.php");
        }
    }

    if (isset($_POST['cadastrarMonitor']))
    {
        $professor = new professor();
        $professor->CadastrarMonitor($_POST['nome'], $_POST['login'], $_POST['senha']);
    }

    if (isset($_POST['btnRegistrarOcorrencia']))
    {
        $professor = new professor();
        $professor->RegistrarOcorrencia($_POST['data'], $_POST['txtDescricao']);
    }
?>