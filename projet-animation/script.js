
const toggleButton = document.getElementById('theme-toggle-btn');
const body = document.body;

toggleButton.addEventListener('click', () => {
    body.classList.toggle('dark-mode'); // Basculer le mode sombre
    body.classList.toggle('light-mode'); // Basculer le mode clair

    // Mettre à jour le texte du bouton en fonction du mode actif
    if (body.classList.contains('light-mode')) {
        toggleButton.textContent = 'Mode clair';
    } else {
        toggleButton.textContent = 'Mode sombre';
    }
});
