document.addEventListener('DOMContentLoaded', function() {
    if (document.querySelector('meta[name="alert-success"]')) {
        setTimeout(function() {
            Swal.fire({
                title: '¡Éxito!',
                text: document.querySelector('meta[name="alert-success"]').content,
                icon: 'success',
                confirmButtonText: 'Aceptar'
            });
        }, );
    }
});
