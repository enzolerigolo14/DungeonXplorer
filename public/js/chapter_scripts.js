document.addEventListener('DOMContentLoaded', () => {
    const titleElement = document.getElementById('chapter-title');
    const textElement = document.getElementById('chapter-text');
    const choiceContainer = document.getElementById('choice-container');
    const eventContainer = document.getElementById('event-container');
    
    // faut les recup dans la bdd normalement celles ci
    const titleText = titleElement.textContent;
    const chapterText = document.getElementById('textTemp').textContent;
    //

    const typingDelay = 50; 
    const pauseAfterTitle = 2000;


    // Affiche le titre avec un effet de fade-in
    titleElement.textContent = titleText; // Assigne le texte
    titleElement.style.animation = 'fade-in 1s ease-in-out forwards'; // Animation pour faire apparaître

    setTimeout(() => {
        titleElement.style.display = 'none'; // Cache le titre après l'affichage
        textElement.style.display = 'block'; // Montre le texte principal
        let i = 0;

        // Effet d'écriture lettre par lettre
        const interval = setInterval(() => {
            textElement.textContent += chapterText[i];
            i++;
            if (i >= chapterText.length) {
                clearInterval(interval); // Stop l'animation
                
                setTimeout(() => {
                    choiceContainer.style.display = 'block'; // Montre les choix
                }, 600);
                if (eventContainer) eventContainer.style.display = 'block'; // Montre l'événement
            }
        }, typingDelay);
    }, pauseAfterTitle);

    


    // jsp si c'est gérer comme ça avec le mvc vu que normalement une nouvelle page c'est juste changer le texte afficher
    // jpense que plutot que faire window location machin faudrait plutot changer les variable title element et text element tt en haut3
    // j'imagine que tu peux recup le chapitre, son texte, titre, si il a un event etc fin j'espere, bon courage
    function goToPage(page) {
        window.location.href = page;
    }

});