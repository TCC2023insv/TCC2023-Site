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
                $conexao->close();

                session_start();

                $_SESSION['login'] = $monitor;

                return header("Location: ../tema_claro/p_Monitor/p_inicial-M_TC.php");
            }
            $conexao->close();
            return header("Location: ../tema_claro/p_login_TC.html");
        }

    }
?>