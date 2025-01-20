function openEditForm() {
    document.getElementById('editModal').style.display = 'flex';
}

function closeEditForm() {
    document.getElementById('editModal').style.display = 'none';
}

document.getElementById('editNameForm').addEventListener('submit', async function (event) {
    event.preventDefault();
    const newName = document.getElementById('newNameInput').value;

    const csrfToken = document.querySelector('input[name="_token"]').value;

    try {
        const response = await fetch('/update-name', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
            },
            body: JSON.stringify({ name: newName }),
        });

        if (response.ok) {
            const data = await response.json();
            // Actualiza el nombre en el elemento HTML
            document.getElementById('nombreDisplay').textContent = data.name;
            closeEditForm();
            alert('Nombre actualizado exitosamente');
        } else {
            const error = await response.json();
            alert(`Error: ${error.message || 'Hubo un error al actualizar el nombre'}`);
        }
    } catch (error) {
        console.error('Error al realizar la solicitud:', error);
        alert('Hubo un error al intentar conectar con el servidor.');
    }
});
