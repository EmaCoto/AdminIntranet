<div
    x-data="{open: false}"
    x-show="open"
    @sweet-delete.window="

        const $ID = event.detail.ID

        Swal.fire({
            title: 'Are you sure?',
            text: 'You wont be able to revert this!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                
                $wire.deleteUser($ID).then(result=>{
                    Swal.fire({
                        title: 'Deleted!',
                        text: 'Your file has been deleted.',
                        icon: 'success'
                    });

                })

                } else if (result.dismiss === Swal.DismissReason.cancel){
                    Swal.fire({
                    title: 'Cancelled',
                    text: 'Your imaginary file is safe :)',
                    icon: 'error'
                    });
                 }
        });
    "
>

</div>
