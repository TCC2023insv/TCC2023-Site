<?php
   require("../../php/conexao/conexaoBD.php");
   
   if (!isset($_SESSION)) session_start();

   if (!isset($_SESSION['login']) or $_SESSION['tipoDeUsuario'] != 'Dir')
   {
       session_destroy();
       header("Location: ../login.php");
   }

   $conexao = ConectarBanco();

   $sql_query = $conexao->query("SELECT `Login`, `Nome` FROM `professor`") or die ($conexao->error);
?>

<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../../css/navbar_TC.css">
        <link rel="stylesheet" type="text/css" href="../../css/cadastros.css">
        <link rel="stylesheet" href="../../css/fonte-alert.css">
        <script src="../../js/sweetalert.js" type="module"></script>
        <title>Cadastros</title>
    </head>
    <body>
        <nav>
            <input type="checkbox" id="check">
            <label for="check" class="btncheck">
                <img src="../../img/icon.png">
            </label>

            <label class="logo">MonitoraLab</label>
            <ul>
                <li><a href="inicio.php">Diagnósticos</a></li>
                <li><a href="ocorrencias.php">Ocorrências</a></li>
                <li><a class="active">Cadastros</a></li>
                <li><a class="Btn-Sair" onclick="Sair()" style="cursor: pointer;">Sair</a> </li>
            </ul>
        </nav>
        
        <br><br><br>
        <a href="cadastrar-professor.php" id="Cadastrar">Cadastrar Professor</a>
        <br><br>
        

        <?php
            while ($professor = $sql_query->fetch_assoc())
            {
        ?>

        <div id="Cadastros">
            <div class="nome-login">
                <h1>Nome:</h1> <div class="Itens"><?php echo $professor['Nome']; ?></div>
                <h1>Login:</h1> <div class="Itens"><?php echo $professor['Login']; ?></div>                
            </div>
            <a href="#" class="Btn-Excluir" onclick="ExcluirUsuario(this)" var-login="<?php echo 
                $professor['Login']; ?>" style="cursor: pointer;">Excluir</a>
        </div>

        <?php
            } 
            $conexao->close();
        ?>
   
    <script>
        function Sair()
        {
            swal({
                title: "Deseja realmente sair?",
                icon: "warning",
                buttons: ["Cancel", true],
            }).then(value =>{
                if (value)
                {
                    window.location.href = "../../php/classes/usuarios.php?resp=true";              
                }
            })
            return false;
        }

        function ExcluirUsuario(element)
        {
            var login = element.getAttribute('var-login')
            swal({
                title: "Tem certeza?",
                text: "Uma vez deletado, o usuário perderá o login.",
                icon: "warning",
                buttons: ["Cancel", true],
                dangerMode: true,
                })
                .then((value) => {
                if (value) {
                    swal("Professor excluído com sucesso!", {
                    icon: "success",
                    });
                    window.location.href = "../../php/classes/usuarios.php?login-prof="+login;
                } else {
                    swal("Não foi possível deletar o professor", {
                    icon: "error",
                    });
                }
                });
        }
    </script>
    </body>
</html>