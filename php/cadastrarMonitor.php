<?php
    require('conexao/conexaoBD.php');

    $conexao = ConectarBanco();
    session_start();

    $professor = $_SESSION['login'];
    $nomeMonitor = $_POST['nome'];
    $loginMonitor = $_POST['login'];
    $senhaMonitor = $_POST['senha'];

    $conexao->query("INSERT INTO monitor (login, nome, senha, login_professor) VALUES 
    ( '" . $loginMonitor . "', '" . $nomeMonitor . "', '" . $senhaMonitor . "', '" .$professor ."')");

    $conexao->close();
    return header("Location: ../../tcc2023-site/p_inicial-P_TC.php");
?>