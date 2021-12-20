<script>
    window.addEventListener('swal:comfirm', event => {
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
                window.Livewire.emit('delete', event.detail.id);
                Swal.fire({
                    text: 'Deleted successfully.',
                    icon: 'success',
                    timerProgressBar: true,
                    showCancelButton: false,
                    showConfirmButton: false,
                    position: 'center',
                    timer: 3000,
                    toast: true,
                })
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                Swal.fire({
                    // title: 'Error!',
                    text: 'Delete has been cancelled',
                    icon: 'error',
                    timerProgressBar: true,
                    showCancelButton: false,
                    showConfirmButton: false,
                    position: 'center',
                    timer: 2000,
                    toast: true,
                })
            }
        })
    });

    // alert('ok');
    // Swal.fire({
    //     title: 'Error!',
    //     text: 'Do you want to continue',
    //     icon: 'error',
    //     confirmButtonText: 'Cool'
    // })
    // Swal.fire({
    //     title: 'هل تريد الاستمرار؟',
    //     icon: 'question',
    //     iconHtml: '؟',
    //     confirmButtonText: 'نعم',
    //     cancelButtonText: 'لا',
    //     showCancelButton: true,
    //     showCloseButton: true
    // }).then((result) => {
    //     if (result.isConfirmed) {
    //         window.Livewire.emit('delete', event.detail.id);
    //     }
    // });
</script>
