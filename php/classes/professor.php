<?php
    require('../conexao/conexaoBD.php');
    class professor
    {
        public $login;
        public $senha;

        public function EntrarComoProfessor($login, $senha)
        {
            $conexao = ConectarBanco();
            $query = "SELECT * FROM professor WHERE login = '$login' AND senha = '$senha'";
            $resultado = mysqli_query($conexao, $query);

            if (mysqli_num_rows($resultado) > 0) 
            {
                mysqli_close($conexao);
                return header("Location: ../../index.html");
            }
            return header("Location: ../../p_login_TC.html");
        }

        public function CadastrarMonitor($loginMonitor, $senhaMonitor)
        {
            
        }
    }
?>