function Sair()
{
    swal({
        title: "Tem certeza de que deseja sair?",
        text: "Ao encerrar, somente poderá retornar mediante login.",
        icon: "info",
        buttons: ["Cancel", true],
      }).then(value =>{
        if (value)
        {
            window.location.href = "../../php/classes/usuarios.php?resp=true";              
        }
        //da p colocar uma janela dps da outra (usar p confirmar exclusão)
      })
    return false;
}