<?php
    require('../p_login_TC.html');
    require('Conexao/ConexaoBD.php');
    require('Usuarios/Direcao.php');
    // require('Usuarios/Monitor.php');
    // require('Usuarios/Professor.php');

    if ($_SERVER['REQUEST_METHOD'] == 'post') {
        if (isset($_POST['entrar']))
        {
            if (isset($_POST['identificacao']) && isset($_POST['login']) && isset($_POST['senha'])) 
            {
                $tipoDeUsuario = $_POST['identificacao'];
                $login = $_POST['login'];
                $senha = $_POST['senha'];

                if ($tipoDeUsuario == 'Diretoria') 
                {
                    EntrarComoDirecao($login, $senha);
                }
            }
        }
        
    } 
?>