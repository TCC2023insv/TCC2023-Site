function Sair()
{
    swal({
        title: "Tem certeza de que deseja sair?",
        text: "Ao encerrar, somente poderá retornar mediante login.",
        icon: "warning",
        customClass: {
          content: "custom-sweetalert-font" // Aplica a classe CSS personalizada ao conteúdo do SweetAlert
      },
        buttons: ["Cancel", true],
      }).then(value =>{
        if (value)
        {
            window.location.href = "../../php/classes/usuarios.php?resp=true";              
        }
      })
    return false;
}

function ExcluirUsuario()
{
  
}