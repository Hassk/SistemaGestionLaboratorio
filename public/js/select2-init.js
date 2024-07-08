$(document).ready(function() {
    $('#producto_id').select2({
        placeholder: "Seleccione un producto",
        allowClear: true,
        ajax: {
            url: '/inventario/search_productos', // Usa la nueva ruta
            dataType: 'json',
            delay: 250,
            data: function(params) {
                console.log('Buscando:', params.term); // Depuración
                return {
                    query: params.term // Término de búsqueda
                };
            },
            processResults: function(data) {
                console.log('Resultados:', data); // Depuración
                return {
                    results: data.map(function(producto) {
                        return {
                            id: producto.id,
                            text: producto.nombre
                        };
                    })
                };
            },
            cache: true
        },
        minimumInputLength: 1,
    });
});
