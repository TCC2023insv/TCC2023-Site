<?php

    require('conexao/conexaoBD.php');
    $conexao = ConectarBanco();
    session_start();
    $professor = $_SESSION['login'];
    $nomeMonitor = $_POST['nome'];
    $loginMonitor = $POST['login'];
    $senhaMonitor = $_POST['senha'];

    $query = "INSERT INTO monitor (login, nome, senha, login_professor) VALUES 
    ( '" . $loginMonitor . "', '" . $nomeMonitor . "', '" . $senhaMonitor . "', '" .$loginProfessor ."')";
    $resultado = mysqli_query($conexao, $query);


    mysqli_close($conexao);
?>