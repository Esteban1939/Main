document.getElementById('changeColorBtn').addEventListener('click', function() {
    document.body.style.backgroundColor = getRandomColor();
});

function getRandomColor() {
    const letters = '0123456789ABCDEF';
    let color = '#';
    for (let i = 0; i < 6; i++) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
}

// Ajout d'un effet de défilement doux pour les liens de navigation
document.querySelectorAll('nav a').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        e.preventDefault();
        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});

// Ajout d'une animation au chargement de la page
window.addEventListener('load', function() {
    document.querySelector('header').classList.add('animate__animated', 'animate__fadeInDown');
    document.querySelectorAll('section').forEach(section => {
        section.classList.add('animate__animated', 'animate__fadeInUp');
    });
});