<?php

    $tipoDeLogin = $_POST['identificacao'];
    $login = $_POST['login'];
    $senha = $_POST['senha'];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') 
        {
            
            if (isset($_POST['entrar'])) 
            {
                switch ($tipoDeLogin) {
                    case 'Dir':
                        include('classes/direcao.php');
                        $novaDirecao = new direcao();
                        $novaDirecao->EntrarComoDirecao($login, $senha);
                        break;
                    
                    case 'Prof':
                        include('classes/professor.php');
                        $novoProfessor = new professor();
                        $novoProfessor->EntrarComoProfessor($login, $senha);
                        break;

                    case 'Mon':
                        include('classes/monitor.php');
                        $novoMonitor = new monitor();
                        $novoMonitor->EntrarComoMonitor($login, $senha);
                        break;
                    default:
                        break;
                }
            }
        }
?>