function confirmarDelete(id,tabla,s){
    let tblLink;
    switch (tabla) {
        case "profesores":
                tblLink = "php/eliminar-prof.php";
            break;
        case "aspirantes":
                tblLink = "php/eliminar-aspirante.php";
            break;
        case "salas":
                tblLink = "php/eliminar-sala.php";
            break;
        case "mensajes":
                tblLink = "php/eliminar-mensaje.php";
            break;
        case "pruebas":
                tblLink = "php/eliminar-prueba.php"
            break;
        default:
            break;
    }
    Swal.fire({
        title: 'Eliminar el registro?',
        text: 'El registro ('+id+') de ('+tabla+') no lo podras recuperar!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        
        confirmButtonText: '<a href="'+tblLink+'?id='+id+'&s='+s+'" method="get" name="id" id='+id+' class="confirm-del">Eliminar</a>',
        cancelButtonText:'Cancelar'
        })
}