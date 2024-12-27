document.addEventListener('DOMContentLoaded', () => {
    const titleElement = document.getElementById('chapter-title');
    const textElement = document.getElementById('chapter-text');
    const choiceContainer = document.getElementById('buttonLinks-container');
    const eventContainer = document.getElementById('event-container');
    const fightContainer = document.getElementById('combatContainer');
    const imageContainer = document.getElementById('image-container'); // Référence à l'élément image
    
    // faut les recup dans la bdd normalement celles ci
    const titleText = titleElement.textContent;
    const chapterText = document.getElementById('textTemp').textContent;
    //

    const typingDelay = 5;
    const pauseAfterTitle = 3000;


    // Affiche le titre avec un effet de fade-in
    titleElement.textContent = titleText; // Assigne le texte
    titleElement.style.animation = 'fade-in 1s ease-in-out forwards'; // Animation pour faire apparaître

    setTimeout(() => {
        titleElement.style.display = 'none'; // Cache le titre après l'affichage
        textElement.style.display = 'block'; // Montre le texte principal
        let i = 0;
        imageContainer.style.opacity = 1; // Rends l'image visible
        imageContainer.style.transition = 'opacity 2s ease-in-out';
        // Effet d'écriture lettre par lettre
        const interval = setInterval(() => {
            textElement.textContent += chapterText[i];
            i++;
            if (i >= chapterText.length) {
                clearInterval(interval); // Stop l'animation

                if(fightContainer){
                    fightContainer.style.display = 'block';
                }
                setTimeout(() => {
                    choiceContainer.style.display = 'flex';
                }, 600)
                if (eventContainer) eventContainer.style.display = 'block'; // Montre l'événement
            }
        }, typingDelay);
    }, pauseAfterTitle);

});
