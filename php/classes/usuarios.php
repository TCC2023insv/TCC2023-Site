<?php
    class Usuarios
    {
        public $id;
        public $login;
        public $nome;
        public $senha;

        public function GetNome($nome)
        {
            $this->nome = $nome;
        }
        public function SetNome()
        {
            return $this->nome;
        }

        public function GetLogin($login)
        {
            $this->login = $login;
        }
        public function SetLogin()
        {
            return $this->login;
        }

        public function GetSenha($senha)
        {
            $this->senha = $senha;
        }
        public function SetSenha()
        {
            return $this->senha;
        }
        
        public function Entrar()
        {
            $tipoDeLogin = $_POST['identificacao'];
            $login = $_POST['login'];
            $senha = $_POST['senha'];
            session_start();

            if (isset($_POST['entrar']))
            { 
                switch ($tipoDeLogin) {
                    case 'Dir':
                        require('../conexao/conexaoBD.php');

                        $conexao = ConectarBanco();
                        $query = "SELECT * FROM direcao WHERE login = '$login' AND senha = '$senha'";
                        $resultado = mysqli_query($conexao, $query);
            
                        if (mysqli_num_rows($resultado) > 0) 
                        {
                            $conexao->close();
            
                            session_start();
            
                            $_SESSION['login'] = $direcao;
                            $_SESSION['login_incorreto'] = false;

                            header("Location: ../../tema_claro/p_diretoria/p_d_inicial_tc.php");
                            
                        }
                        $conexao->close();
                        $_SESSION['login_incorreto'] = true;
                        header("Location: ../../tema_claro/p_login_tc.php");
                        break;
                        
                    case 'Prof':
                        require('../conexao/conexaoBD.php');

                        $conexao = ConectarBanco();
                        $query = "SELECT * FROM professor WHERE login = '$login' AND senha = '$senha'";
                        $resultado = mysqli_query($conexao, $query);

                        if (mysqli_num_rows($resultado) > 0) 
                        {
                            $conexao->close();

                            session_start();

                            $_SESSION['login'] = $login;
                            $_SESSION['login_incorreto'] = false;

                            header("Location: ../../tema_claro/p_professor/p_p_inicial_tc.php");
                        }
                        $conexao->close();
                        $_SESSION['login_incorreto'] = true;
                        header("Location: ../../tema_claro/p_login_tc.php");
                        break;

                    case 'Mon':
                        require('../conexao/conexaoBD.php');

                        $conexao = ConectarBanco();
                        $query = "SELECT * FROM monitor WHERE login = '$login' AND senha = '$senha'";
                        $resultado = mysqli_query($conexao, $query);

                        if (mysqli_num_rows($resultado) > 0) 
                        {
                            $conexao->close();

                            session_start();

                            $_SESSION['login'] = $login;
                            $_SESSION['login_incorreto'] = false;

                            header("Location: ../../tema_claro/p_monitor/p_m_inicial_tc.php");
                        }
                        $conexao->close();
                            $_SESSION['login_incorreto'] = true;

                            header("Location: ../../tema_claro/p_login_tc.php");
                        break;
                    default:
                    header("Location: ../tema_claro/p_login_tc.php");
                        break;
                }
            }
        }

        public function Sair()
        {
            echo "<script>var dialogo = confirm('Tem certeza de que deseja sair?')
            if (dialogo)
            {
                window.location.href = '../../tema_claro/p_login_tc.php';
            }
            else
            {
                window.location.href = 'javascript: history.go(-1)';
                }
                </script>";
        }
    }

    if (isset($_POST['entrar']))
    {
        $Usuario = new Usuarios();
        $Usuario->Entrar();
    }

    if (isset($_GET['resp']))
    {
        $Usuario = new Usuarios();
        $Usuario->Sair();
    }
?>