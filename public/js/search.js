document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('search-input');
    const tableBody = document.querySelector('table tbody');

    searchInput.addEventListener('input', function () {
        const query = searchInput.value;
        fetch(`/inventario?search=${query}`, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.json())
        .then(data => {
            tableBody.innerHTML = '';
            if (data.length > 0) {
                data.forEach((producto, index) => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td>${index + 1}</td>
                        <td>${producto.codigo_laboratorio}</td>
                        <td>${producto.codigo_fabrica}</td>
                        <td>${producto.nombre}</td>
                        <td>${producto.descripcion}</td>
                        <td>${producto.categorias ? producto.categorias.nombre : ''}</td>
                        <td>${producto.cantidad}</td>
                        <td class="${producto.estado === 'disponible' ? 'text-success' : 'text-danger'}">
                            ${producto.estado.charAt(0).toUpperCase() + producto.estado.slice(1)}
                        </td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Acciones">
                                <a href="/inventario/${producto.id}/edit" class="btn btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button class="btn btn-danger delete-button" data-id="${producto.id}">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                                <form id="delete-form-${producto.id}" action="/inventario/${producto.id}" method="POST" style="display:none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>
                        </td>
                    `;
                    tableBody.appendChild(row);
                });
            } else {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td colspan="9" class="text-center">No se encontraron productos</td>
                `;
                tableBody.appendChild(row);
            }
        });
    });
});
