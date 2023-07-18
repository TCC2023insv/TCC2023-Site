<?php
    require('conexao/conexaoBD.php');
    class professor
    {
        public $professor;
        public $senha;

        public function EntrarComoProfessor($professor, $senha)
        {
            $conexao = ConectarBanco();
            $query = "SELECT * FROM professor WHERE login = '$professor' AND senha = '$senha'";
            $resultado = mysqli_query($conexao, $query);

            if (mysqli_num_rows($resultado) > 0) 
            {
                mysqli_close($conexao);

                session_start();

                $_SESSION['login'] = $professor;

                return header("Location: ../../p_inicial-P_TC.html");
            }
            mysqli_close($conexao);
            return header("Location: ../p_login_TC.html");
        }

        // public function CadastrarMonitor($nome, $login, $senha, $professor)
        // {
        //     $conexao = ConectarBanco();

        //     $nomeMonitor = $nome;
        //     $loginMonitor = $login;
        //     $senhaMonitor = $senha;
        //     $loginProfessor = $professor;

        //     $query = "INSERT INTO monitor (login, nome, senha, login_professor) VALUES 
        //     ( '" . $loginMonitor . "', '" . $nomeMonitor . "', '" . $senhaMonitor . "', '" .$loginProfessor ."')";
        //     $resultado = mysqli_query($conexao, $query);

        //     mysqli_close($conexao);
        // }
    }
?>