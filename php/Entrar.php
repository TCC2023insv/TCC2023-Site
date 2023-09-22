<?php
    $tipoDeLogin = $_POST['identificacao'];
    $login = $_POST['login'];
    $senha = $_POST['senha'];

        // if ($_SERVER['REQUEST_METHOD'] == 'POST')
        if (isset($_POST['entrar']))
        { 
                switch ($tipoDeLogin) {
                    case 'Dir':
                        echo "direcao";
                        include('classes/direcao.php');
                        $novaDirecao = new direcao();
                        $novaDirecao->EntrarComoDirecao($login, $senha);
                        break;
                    
                    case 'Prof':
                        echo "professor";
                        include('classes/professor.php');
                        $novoProfessor = new professor();
                        $novoProfessor->EntrarComoProfessor($login, $senha);
                        break;

                    case 'Mon':
                        echo "monitor";
                        include('classes/monitor.php');
                        $novoMonitor = new monitor();
                        $novoMonitor->EntrarComoMonitor($login, $senha);
                        break;
                    default:
                    header("Location: ../tema_claro/p_login_TC.html");
                        break;
                }
        }
?>