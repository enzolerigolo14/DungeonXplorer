const popuoverlay = document.getElementById('popupOverlay');

function openPopup() {
    popuoverlay.style.display = 'block';
}

// Fonction pour fermer le popup
function closePopup() {
    popuoverlay.style.display = 'none';
}

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

    // Fonction pour rediriger vers une nouvelle page
    function goToPage(page) {
        window.location.href = page;
    }


    // Paramètres Popup
    const settingsBtn = document.getElementById('settings-btn');
    const settingsPopup = document.getElementById('settings-popup');
    const closeBtn = document.getElementById('close-btn');
    const logoutBtn = document.getElementById('logout-btn');
    const deleteAccountBtn = document.getElementById('delete-account-btn');
    const adminBtn = document.getElementById('admin-btn');

    // Ouvrir la popup lorsqu'on clique sur le bouton "Paramètres"
    settingsBtn.addEventListener('click', () => {
        settingsPopup.style.display = 'flex';
    });

    // Fermer la popup lorsqu'on clique sur le bouton "X"
    closeBtn.addEventListener('click', () => {
        settingsPopup.style.display = 'none';
    });

    // Fermer la popup si on clique en dehors de la fenêtre
    window.addEventListener('click', (event) => {
        if (event.target === settingsPopup) {
            settingsPopup.style.display = 'none';
        }
    });

    // Simuler l'action de se déconnecter
    logoutBtn.addEventListener('click', () => {
        alert("Au plaisir de vous revoir aventuriers !");
        //window.location.href = 'deconnexion';
    });

    // Simuler l'action de supprimer le compte
    deleteAccountBtn.addEventListener('click', () => {
        const confirmation = confirm("Êtes-vous sûr de vouloir supprimer votre compte ?");
        if (confirmation) {
            alert("Votre compte a été supprimé !");
            window.location.href = 'suppression';
        }
    });

    // Simuler l'accès aux paramètres Admin
    adminBtn.addEventListener('click', () => {
        window.location.href = "admin";
    });

});
