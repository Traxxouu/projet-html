const hearts = document.querySelectorAll('.restaurant-info i');
hearts.forEach(heart => {
    heart.addEventListener('click', function() {
        if (this.classList.contains('clicked')) {
            this.classList.remove('clicked');
        } else {
            this.classList.add('clicked');
        }
    });
});


window.addEventListener('load', function() {
    // Délai de 3 secondes avant de masquer le loader
    setTimeout(function() {
        document.getElementById('loader').style.display = 'none';
        document.getElementById('site-content').style.display = 'block';

        // Appliquer une animation pour chaque section qui apparaît après le loader
        const elements = document.querySelectorAll('#site-content > *');
        elements.forEach((element, index) => {
            setTimeout(() => {
                element.classList.add('fade-in-element');
            }, index * 300); // Délai progressif pour chaque élément
        });

    }, 2000); // 3 secondes
});

