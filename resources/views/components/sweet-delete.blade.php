<div
    x-data="{open: false}"
    x-show="open"
    @sweet-delete.window="

        const $ID = event.detail.ID

        Swal.fire({
            title: '¿Estás seguro?',
            text: 'No podrás revertirlo.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '¡Sí, elimínalo!'
            }).then((result) => {
                if (result.isConfirmed) {
                
                $wire.deleteUser($ID).then(result=>{
                    Swal.fire({
                        title: '¡Borrado!',
                        text: 'Tu archivo ha sido eliminado',
                        icon: 'success'
                    });

                })

                } else if (result.dismiss === Swal.DismissReason.cancel){
                    Swal.fire({
                    title: 'Cancelar',
                    text: 'Su archivo imaginario está a salvo',
                    icon: 'error'
                    });
                 }
        });
    "
>

</div>
