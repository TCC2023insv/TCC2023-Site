<?php
    require('conexao/conexaoBD.php');
    class direcao
    {
        public $direcao;
        public $senha;

        public function EntrarComoDirecao($direcao, $senha)
        {
            $conexao = ConectarBanco();
            $query = "SELECT * FROM direcao WHERE login = '$direcao' AND senha = '$senha'";
            $resultado = mysqli_query($conexao, $query);

            if (mysqli_num_rows($resultado) > 0) 
            {
                $conexao->close();

                session_start();

                $_SESSION['login'] = $direcao;

                echo header("Location: ../tema_claro/p_Diretoria/p_D-P_Inicial_TC.php");
            }
            $conexao->close();
            echo header("Location: ../tema_claro/p_login_TC.html");
        }
    }
?>