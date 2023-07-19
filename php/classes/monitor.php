<?php
    require('conexao/conexaoBD.php');
    class monitor
    {
        public $login;
        public $senha;

        public function EntrarComoMonitor($login, $senha)
        {
            $conexao = ConectarBanco();
            $query = "SELECT * FROM monitor WHERE login = '$login' AND senha = '$senha'";
            $resultado = mysqli_query($conexao, $query);

            if (mysqli_num_rows($resultado) > 0) 
            {
                mysqli_close($conexao);
                return header("Location: ../p_inicial-M_TC.html");
            }
            mysqli_close($conexao);
            return header("Location: ../p_login_TC.html");
        }

        public function RegistrarReparo()
        {

        }

        public function ExcluirReparo()
        {
            
        }
    }
?>