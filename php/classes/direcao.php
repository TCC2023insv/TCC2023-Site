<?php
    require('../conexao/conexaoBD.php');
    class direcao
    {
        public $direcao;
        public $senha;

        public function Entrar($direcao, $senha)
        {
            $conexao = ConectarBanco();
            $query = "SELECT * FROM direcao WHERE login = '$direcao' AND senha = '$senha'";
            $resultado = mysqli_query($conexao, $query);

            if (mysqli_num_rows($resultado) > 0) 
            {
                $conexao->close();

                session_start();

                $_SESSION['login'] = $direcao;

                echo header("Location: ../tema_claro/p_Diretoria/p_D_Inicial_TC.php");
            }
            $conexao->close();
            echo header("Location: ../tema_claro/p_login_TC.html");
        }
        
        public function CadastrarProfessor($nomeProfessor, $loginProfessor, $senhaProfessor)
        {
            $conexao = ConectarBanco();
            session_start();
        
            $direcao = $_SESSION['login'];
        
            $conexao->query("INSERT INTO professor (login, nome, senha, login_direcao) VALUES 
            ( '" . $loginProfessor . "', '" . $nomeProfessor . "', '" . $senhaProfessor . "', '" .$direcao."')");
        
            $conexao->close();
            return header("Location: ../../../tcc2023-site/tema_claro/p_diretoria/p_d_Inicial_tc.php");
        }
    }

    if (isset($_POST['cadastrarProfessor']))
    {
        $direcao = new direcao();
        $direcao->CadastrarProfessor($_POST['nome'], $_POST['login'], $_POST['senha']);
    }
?>