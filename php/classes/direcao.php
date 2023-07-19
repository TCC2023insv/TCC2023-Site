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
                mysqli_close($conexao);

                session_start();

                $_SESSION['login'] = $direcao;

                echo header("Location: ../p_inicial-D_TC.html");
            }
            mysqli_close($conexao);
            echo header("Location: ../p_login_TC.html");
        }
    }
?>