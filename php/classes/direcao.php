<?php
    class direcao
    {
        public $direcao;
        public $senha;

        public function Entrar($direcao, $senha)
        {
            require('conexao/conexaoBD.php');

            $conexao = ConectarBanco();
            $query = "SELECT * FROM direcao WHERE login = '$direcao' AND senha = '$senha'";
            $resultado = mysqli_query($conexao, $query);

            if (mysqli_num_rows($resultado) > 0) 
            {
                $conexao->close();

                session_start();

                $_SESSION['login'] = $direcao;

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
                window.location.href = '../../tema_claro/p_diretoria/p_d_inicial_tc.php';
                }
                </script>";
        }
        
        public function CadastrarProfessor($nomeProfessor, $loginProfessor, $senhaProfessor)
        {
            require('../conexao/conexaoBD.php');
            require('professor.php');

            $professor = new professor();
            $professor->GetNome($nomeProfessor);
            $professor->GetLogin($loginProfessor);
            $professor->GetSenha($senhaProfessor);

            $conexao = ConectarBanco();
            session_start();
        
            $direcao = $_SESSION['login'];
        
            $conexao->query("INSERT INTO professor (login, nome, senha, login_direcao) VALUES 
            ( '" . $professor->login . "', '" . $professor->login . "', '" . $professor->senha . "', '" 
            .$direcao."')");
        
            $conexao->close();
            return header("Location: ../../../tcc2023-site/tema_claro/p_diretoria/p_d_Inicial_tc.php");
        }
    }

    if (isset($_POST['cadastrarProfessor']))
    {
        $direcao = new direcao();
        $direcao->CadastrarProfessor($_POST['nome'], $_POST['login'], $_POST['senha']);
    }

    if (isset($_GET['resp']))
    {
        $direcao = new direcao();
        $direcao->Sair();
    }
?>