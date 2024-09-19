// Sélectionne tous les éléments <i> (icônes) dans la classe 'restaurant-info'
const hearts = document.querySelectorAll('.restaurant-info i');

// Pour chaque icône sélectionnée, on ajoute un écouteur d'événements au clic
hearts.forEach(heart => {
    heart.addEventListener('click', function() {
        // Si l'icône a déjà la classe 'clicked', on la retire (pour désactiver l'état cliqué)
        if (this.classList.contains('clicked')) {
            this.classList.remove('clicked');
        } else {
            // Sinon, on ajoute la classe 'clicked' (pour activer l'état cliqué)
            this.classList.add('clicked');
        }
    });
});

// Lors du chargement de la fenêtre (événement 'load')
window.addEventListener('load', function() {
    // On attend 3 secondes avant de masquer le loader (élément d'attente)
    setTimeout(function() {
        // Cache l'élément avec l'ID 'loader' (fin du chargement)
        document.getElementById('loader').style.display = 'none';
        // Affiche le contenu principal du site
        document.getElementById('site-content').style.display = 'block';

        // Sélectionne tous les éléments enfants de 'site-content' pour leur appliquer une animation progressive
        const elements = document.querySelectorAll('#site-content > *');
        elements.forEach((element, index) => {
            // Applique une classe 'fade-in-element' avec un délai progressif entre chaque élément
            setTimeout(() => {
                element.classList.add('fade-in-element');
            }, index * 300); // Délai de 300ms entre chaque élément
        });

    }, 2000); // Délai initial de 2 secondes avant de masquer le loader
});
