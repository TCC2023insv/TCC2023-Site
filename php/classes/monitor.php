<?php
    require('conexao/conexaoBD.php');
    class monitor
    {
        public $monitor;
        public $senha;

        public function EntrarComoMonitor($monitor, $senha)
        {
            $conexao = ConectarBanco();
            $query = "SELECT * FROM monitor WHERE login = '$monitor' AND senha = '$senha'";
            $resultado = mysqli_query($conexao, $query);

            if (mysqli_num_rows($resultado) > 0) 
            {
                mysqli_close($conexao);

                session_start();

                $_SESSION['login'] = $monitor;

                return header("Location: ../p_inicial-M_TC.php");
            }
            mysqli_close($conexao);
            return header("Location: ../p_login_TC.html");
        }

    }
?>