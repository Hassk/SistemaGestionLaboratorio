function confirmReject(id) {
    Swal.fire({
        title: '¿Estás seguro?',
        text: "¡No podrás revertir esto!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, rechazarlo!',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('rechazar-form-' + id).submit();
        }
    });
}

document.addEventListener('DOMContentLoaded', function() {
    const rejectButtons = document.querySelectorAll('.rechazar-button');
    rejectButtons.forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault();
            const id = this.getAttribute('data-id');
            confirmReject(id);
        });
    });
});
