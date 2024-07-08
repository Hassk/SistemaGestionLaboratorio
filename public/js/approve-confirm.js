function confirmApprove(id) {
    Swal.fire({
        title: '¿Estás seguro?',
        text: "¡No podrás revertir esto!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, aprobarlo!',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('aprobar-form-' + id).submit();
        }
    });
}

document.addEventListener('DOMContentLoaded', function() {
    const approveButtons = document.querySelectorAll('.aprobar-button');
    approveButtons.forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault();
            const id = this.getAttribute('data-id');
            confirmApprove(id);
        });
    });
});
