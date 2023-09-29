<?php
    require('usuarios.php');
    class Direcao extends Usuarios
    {
        public function CadastrarProfessor($nomeProfessor, $loginProfessor, $senhaProfessor)
        {
            require('../conexao/conexaoBD.php');
            require('professor.php');

            $Professor = new Professor();
            $Professor->GetNome($nomeProfessor);
            $Professor->GetLogin($loginProfessor);
            $Professor->GetSenha($senhaProfessor);

            $conexao = ConectarBanco();
            session_start();
        
            $direcao = $_SESSION['login'];
        
            $conexao->query("INSERT INTO professor (login, nome, senha, login_direcao) VALUES 
            ( '" . $Professor->login . "', '" . $Professor->login . "', '" . $Professor->senha . "', '" 
            .$direcao."')");
        
            $conexao->close();
            return header("Location: ../../../tcc2023-site/tema_claro/p_diretoria/p_d_Inicial_tc.php");
        }
    }

    if (isset($_POST['cadastrarProfessor']))
    {
        $Direcao = new Direcao();
        $Direcao->CadastrarProfessor($_POST['nome'], $_POST['login'], $_POST['senha']);
    }

    if (isset($_GET['resp']))
    {
        $Direcao = new Direcao();
        $Direcao->Sair();
    }
?>