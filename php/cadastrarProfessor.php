<?php
    require('conexao/conexaoBD.php');

    $conexao = ConectarBanco();
    session_start();

    $direcao = $_SESSION['login'];
    $nomeProfessor = $_POST['nome'];
    $loginProfessor = $POST['login'];
    $senhaProfessor = $_POST['senha'];

    $conexao->query("INSERT INTO professor (login, nome, senha, login_direcao) VALUES 
    ( '" . $loginProfessor . "', '" . $nomeProfessor . "', '" . $senhaProfessor . "', '" .$direcao."')");

    $conexao->close();
    return header("Location: ../../tcc2023-site/p_inicial-D_TC.html");
?>