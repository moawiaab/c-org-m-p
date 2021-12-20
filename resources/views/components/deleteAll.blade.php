<script>
    window.addEventListener('swal:comfirmAll', event => {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger',
            },
            buttonsStyling: false,
        });
        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                // window.Livewire.emit('deleteSelected',event.detail.id );
                event.detail.id.map((e) => window.Livewire.emit('delete', e));
                // swalWithBootstrapButtons.fire(
                //     'Deleted!',
                //     'Your file has been deleted.',
                //     'success',

                // )

                Swal.fire({
                    // title: 'Error!',
                    text: 'Selector has been deleted',
                    icon: 'success',
                    timerProgressBar: true,
                    showCancelButton: false,
                    showConfirmButton: false,
                    position: 'center',
                    timer: 1500,
                    toast: true,
                })
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                // swalWithBootstrapButtons.fire(
                //     'Cancelled',
                //     'Your imaginary file is safe :)',
                //     'error'
                // )

                Swal.fire({
                    // title: 'Error!',
                    text: 'Delete has been cancelled',
                    icon: 'error',
                    timerProgressBar: true,
                    showCancelButton: false,
                    showConfirmButton: false,
                    position: 'center',
                    timer: 1500,
                    toast: true,
                })
            }
        })
    });
</script>
