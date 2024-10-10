import './bootstrap';
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const userItems = document.querySelectorAll('.user-item');

    searchInput.addEventListener('keyup', function() {
        const searchTerm = searchInput.value.toLowerCase();

        userItems.forEach(function(userItem) {
            const userName = userItem.querySelector('.user-name').textContent.toLowerCase();
            const userEmail = userItem.querySelector('.user-email').textContent.toLowerCase();

            // Mostrar u ocultar según el término de búsqueda
            if (userName.includes(searchTerm) || userEmail.includes(searchTerm)) {
                userItem.style.display = ''; // Mostrar usuario
            } else {
                userItem.style.display = 'none'; // Ocultar usuario
            }
        });
    });
});

