import './bootstrap';
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const userItems = document.querySelectorAll('.user-item');

    // Escuchar cuando el usuario escribe en el campo de búsqueda
    searchInput.addEventListener('keyup', function() {
        const searchTerm = searchInput.value.toLowerCase();

        // Iterar sobre cada usuario en la lista
        userItems.forEach(function(userItem) {
            const userName = userItem.querySelector('.user-name').textContent.toLowerCase();
            const userEmail = userItem.querySelector('.user-email').textContent.toLowerCase();

            // Verificar si el nombre o el email del usuario coinciden con la búsqueda
            if (userName.includes(searchTerm) || userEmail.includes(searchTerm)) {
                userItem.style.display = ''; // Mostrar usuario si coincide
            } else {
                userItem.style.display = 'none'; // Ocultar usuario si no coincide
            }
        });
    });
});
