
// Fonction pour recommencer le jeu
function restartGame() {
    // Redirige vers la page d'accueil, remplacez 'index.html' par le lien vers votre page d'accueil si nécessaire
    window.location.href = 'index.html';  // Vous pouvez aussi utiliser `window.location.reload()` pour recharger la page actuelle
}

// Fonction pour quitter le jeu
function quitGame() {
    // Ferme la fenêtre du navigateur (cela fonctionne si la page a été ouverte par un script)
    window.close();
}

// Attendre que le DOM soit entièrement chargé avant d'appliquer les animations
document.addEventListener('DOMContentLoaded', function() {
    // Animation pour les boutons
    const btnRestart = document.querySelector('.btn-restart');
    const btnQuit = document.querySelector('.btn-quit');
    
    // Ajouter les événements onclick
    btnRestart.addEventListener('click', restartGame);
    btnQuit.addEventListener('click', quitGame);
});