<?php
    require('usuarios.php');
    class Professor extends Usuarios
    {
        public function CadastrarMonitor($nomeMonitor, $loginMonitor, $senhaMonitor)
        {
            require('../conexao/conexaoBD.php');
            require('monitor.php');

            $Monitor = new Monitor();
            $Monitor->GetNome($nomeMonitor);
            $Monitor->GetLogin($loginMonitor);
            $Monitor->GetSenha($senhaMonitor);
            session_start();
            $conexao = ConectarBanco();
            $professor = $_SESSION['login'];
        
            $conexao->query("INSERT INTO monitor (login, nome, senha, login_professor) VALUES 
            ( '" . $Monitor->login . "', '" . $Monitor->nome . "', '" . $Monitor->senha . "', '" 
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
            $Ocorrencia = new Ocorrencia($professor, $data, $descricao);

            $conexao = ConectarBanco();
            $resultado = mysqli_query($conexao, "SELECT nome FROM professor WHERE login = '" . 
                $professor . "'");
            if($resultado)
            {
                $row = mysqli_fetch_assoc($resultado);
                $responsavel = $row['nome'];
            }
            $conexao->query("INSERT INTO ocorrencia (data, descricao, responsavel, login_prof) 
            VALUES ('" . $Ocorrencia->data . "', '" . $Ocorrencia->descricao . "', '" . 
            $responsavel . "', '" . $professor . "')");
            $conexao->close();

            return header("Location: ../../tema_claro/p_professor/p_p_inicial_tc.php");
        }
    }

    if (isset($_POST['cadastrarMonitor']))
    {
        $Professor = new Professor();
        $Professor->CadastrarMonitor($_POST['nome'], $_POST['login'], $_POST['senha']);
    }

    if (isset($_POST['btnRegistrarOcorrencia']))
    {
        $Professor = new Professor();
        $Professor->RegistrarOcorrencia($_POST['data'], $_POST['txtDescricao']);
    }

    if (isset($_GET['resp']))
    {
        $Professor = new Professor();
        $Professor->Sair();
    }
?>