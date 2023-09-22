<?php
    require('../conexao/conexaoBD.php');
    class professor
    {
        public $professor;
        public $senha;

        public function Entrar($professor, $senha)
        {
            $conexao = ConectarBanco();
            $query = "SELECT * FROM professor WHERE login = '$professor' AND senha = '$senha'";
            $resultado = mysqli_query($conexao, $query);

            if (mysqli_num_rows($resultado) > 0) 
            {
                $conexao->close();

                session_start();

                $_SESSION['login'] = $professor;

                return header("Location: ../tema_claro/p_professor/p_p_inicial_tc.php");
            }
            $conexao->close();
            return header("Location: ../tema_claro/p_login_tc.html");
        }

        public function CadastrarMonitor($nomeMonitor, $loginMonitor, $senhaMonitor)
        {
            $conexao = ConectarBanco();
            session_start();
        
            $professor = $_SESSION['login'];
        
            $conexao->query("INSERT INTO monitor (login, nome, senha, login_professor) VALUES 
            ( '" . $loginMonitor . "', '" . $nomeMonitor . "', '" . $senhaMonitor . "', '" .$professor ."')");
        
            $conexao->close();
            return header("Location: ../../../tcc2023-site/tema_claro/p_professor/p_inicial-P_TC.php");
        }
    }

    if (isset($_POST['cadastrarMonitor']))
    {
        $professor = new professor();
        $professor->CadastrarMonitor($_POST['nome'], $_POST['login'], $_POST['senha']);
    }
?>