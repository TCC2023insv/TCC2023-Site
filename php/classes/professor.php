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
                $conexao->close();

                session_start();

                $_SESSION['login'] = $professor;

                return header("Location: ../tema_claro/p_Professor/P_D-P_Inicial_TC.php");
            }
            $conexao->close();
            return header("Location: ../tema_claro/p_login_TC.html");
        }
    }
?>