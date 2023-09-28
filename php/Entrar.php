<?php
    $tipoDeLogin = $_POST['identificacao'];
    $login = $_POST['login'];
    $senha = $_POST['senha'];
    session_start();

        if (isset($_POST['entrar']))
        { 
                switch ($tipoDeLogin) {
                    case 'Dir':
                        include('classes/direcao.php');
                        $novaDirecao = new direcao();

                        if ($novaDirecao->Entrar($login, $senha))
                        {
                            $_SESSION['login_incorreto'] = false;
                            header("Location: ../tema_claro/p_diretoria/p_d_inicial_tc.php");
                        }
                        else
                        {
                            $_SESSION['login_incorreto'] = true;
                            header("Location: ../tema_claro/p_login_tc.php");
                        }
                        break;
                    
                    case 'Prof':
                        include('classes/professor.php');
                        $novoProfessor = new professor();

                        if($novoProfessor->Entrar($login, $senha))
                        {
                            $_SESSION['login_incorreto'] = false;
                            header("Location: ../tema_claro/p_professor/p_p_inicial_tc.php");
                        }
                        else
                        {
                            $_SESSION['login_incorreto'] = true;
                            header("Location: ../tema_claro/p_login_tc.php");
                        }
                        break;

                    case 'Mon':
                        include('classes/monitor.php');
                        $novoMonitor = new monitor();
                        
                        if($novoMonitor->Entrar($login, $senha))
                        {
                            $_SESSION['login_incorreto'] = false;
                            header("Location: ../tema_claro/p_monitor/p_m_inicial_tc.php");
                        }
                        else
                        {
                            $_SESSION['login_incorreto'] = true;
                            header("Location: ../tema_claro/p_login_tc.php");
                        }
                        break;
                    default:
                    header("Location: ../tema_claro/p_login_tc.php");
                        break;
                }
        }
?>