function Excluir(ID)
{
    swal({
    title: "Tem certeza?",
    text: "Uma vez deletado, o diagnóstico será perdido.",
    icon: "warning",
    buttons: true,
    dangerMode: true,
    })
    .then((willDelete) => {
    if (willDelete) {
        swal("Diagnóstico excluído com sucesso!", {
        icon: "success",
        });
        window.location.href = "../../php/classes/usuarios.php?excluir=true&id="+ID;
    } else {
        swal("Não foi possível deletar o diagnóstico", {
        icon: "error",
        });
    }
    });
}  