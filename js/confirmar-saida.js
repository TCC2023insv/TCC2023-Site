function Sair()
{
    var dialogo = confirm("Tem certeza de que deseja sair?");

    if (dialogo) {
        window.location.href = "../../php/classes/usuarios.php?resp=true";
    }
    return false;
}