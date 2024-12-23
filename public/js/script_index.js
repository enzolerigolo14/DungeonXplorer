// Ouvre la popup de connexion
function openLoginPopup() {
    console.log("La fonction openLoginPopup a été appelée");
    document.getElementById('loginPopup').style.display = 'flex';
    document.getElementById('signupPopup').style.display = 'none';
}

// Ferme la popup de connexion
function closeLoginPopup() {
    console.log("La fonction closeLoginPopup a été appelée");
    document.getElementById('loginPopup').style.display = 'none';
}


function openSignupPopup() {
    document.getElementById('signupPopup').style.display = 'flex';
    document.getElementById('loginPopup').style.display = 'none'; // Optionnel : ferme le popup de connexion
}

function closeSignupPopup() {
    document.getElementById('signupPopup').style.display = 'none';
}