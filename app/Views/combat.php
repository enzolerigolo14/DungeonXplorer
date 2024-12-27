<?php

$heros = $classHeroName;
$attaque_heros = $heroToUse->getStrength();
$pv_heros = $heroToUse->getPv();
$mana_heros = $heroToUse->getMana();
$initiative_heros = $heroToUse->getInitiative();

$monstre = $monsterToFight->getName();
$attaque_monstre = $monsterToFight->getStrength();
$pv_monstre = $monsterToFight->getPv();
$mana_monstre = $monsterToFight->getMana();
$initiative_monstre = $monsterToFight->getInitiative();
// recuperer dynamiquement le sprite
$sprite = $monsterToFight->getImage();
$nbPotion = 2;
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Combat</title>
    <style>
        /* Remise à zéro des marges et des paddings */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Corps de la page */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #2c3e50;
            color: #fff;
            display: flex;
            justify-content: center;  /* Centrer horizontalement */
            align-items: center;      /* Centrer verticalement */
            height: 100vh;            /* Hauteur de la fenêtre */
            text-align: center;
            flex-direction: column;
            overflow: hidden; /* Correction de "none" à "hidden" */
        }

        /* Conteneur principal avec fond noir */
        .container {
            display: flex;
            flex-direction: column;
            width: 90%;
            max-width: 1000px;
            padding-top: 40px;
            background-color: #000;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
            margin: 30px;
        }

        /* Titre centré en haut du conteneur */
        h1 {
            margin-top: 20px;
            font-size: 3rem;
            color: #e74c3c;
            margin-bottom: 30px;
            text-align: center;
            padding-top: 15px;
            animation: fadeInTitle 1.5s ease-in-out forwards;
        }

        /* Animation fade-in pour le titre */
        @keyframes fadeInTitle {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }

        /* Conteneur pour la partie combat et sprite */
        .combat-and-sprite {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            gap: 10px;
            margin-top: 30px;
            flex-wrap: wrap; /* Pour permettre une mise en ligne sur plusieurs lignes si nécessaire */
        }

        /* Bloc combat (gauche) */
        .combat-container {
            flex: 1;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
            animation: fadeInBlock 2s ease-in-out forwards;
            max-width: 55%;
            margin-right: 5px;
            background-color: #222; /* Ajout d'un fond pour une meilleure visibilité */
        }

        /* Sprite du monstre (droite) */
        .sprite-container {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            border-radius: 25px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
            animation: fadeInBlock 2s ease-in-out forwards;
            max-width: 45%;
            margin-left: 5px;
            background-color: #333; /* Ajout d'un fond pour une meilleure visibilité */
        }

        /* Animation fade-in pour les blocs */
        @keyframes fadeInBlock {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }

        /* Statistiques */
        #stats {
            font-size: 1.2rem;
            margin-bottom: 20px;
            font-family: 'Courier New', monospace;
        }

        /* Conteneur des boutons (centré à gauche) */
        .button-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            gap: 15px;
            align-items: center;
        }

        /* Style des boutons */
        button {
            background-color: #e74c3c;
            color: #fff;
            border: none;
            padding: 15px 25px;
            font-size: 1.2rem;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
            width: 100%;
            max-width: 250px;
        }

        /* Effet de survol des boutons */
        button:hover {
            background-color: #c0392b;
            transform: scale(1.05);
        }

        button:disabled {
            background-color: #7f8c8d;
            cursor: not-allowed;
        }

        #monster-sprite {
            border-radius: 20px;
        }

        .log {
            height: 200px;
            overflow-y: auto;
            font-size: 0.9em;
            text-align: left;
            margin: 0 30px 20px 30px;
            background-color: grey;
            border-radius: 2px;
            padding: 5px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            h1 {
                font-size: 2rem;
            }

            .combat-and-sprite {
                flex-direction: column; /* Passe en colonne */
                align-items: center;
                gap: 20px;
            }

            .combat-container, .sprite-container {
                max-width: 100%;
                margin: 0;
            }

            .log {
                margin: 20px;
                font-size: 0.8em;
            }

            button {
                padding: 10px 20px;
                font-size: 1rem;
                max-width: 200px;
            }
        }

        @media (max-width: 480px) {
            h1 {
                font-size: 1.5rem;
            }

            .combat-container, .sprite-container {
                padding: 10px;
                border-radius: 10px;
            }

            .log {
                height: 150px;
            }

            button {
                font-size: 0.9rem;
            }
        }

    </style>
</head>
<body>
<!-- Conteneur principal avec fond noir -->
<div class="container">
    <!-- Titre centré en haut -->
    <h1>Combattez !</h1>

    <!-- Conteneur pour la partie combat et sprite -->
    <div class="combat-and-sprite">
        <!-- Bloc combat (gauche) -->
        <div class="combat-container">
            <p id="stats">
                Héros : PV = <?php echo $pv_heros; ?>, Mana = <?php echo $mana_heros; ?>
                <br>
                <?php echo $monstre ?> : PV = <?php echo $pv_monstre; ?>
            </p>
            <div class="button-container">
                <button id="btn-physique" onclick="choisirAction('physique')">Attaque Physique</button>
                <button id="btn-magique" onclick="choisirAction('magique')">Attaque Magique</button>
                <button id="btn-potion" onclick="choisirAction('potion')">Utiliser Potion</button>
            </div>
        </div>

        <!-- Sprite du monstre (droite) -->
        <div class="sprite-container">
            <img src="<?php echo $sprite ?>" <alt="Sprite du monstre" id="monster-sprite">
        </div>
        <br>
    </div>
    <div id="log"  class = "log">Début du combat...</div>
</div>

<!-- Journal des événements -->



<script>
    let heros = "<?php echo $heros; ?>";
    let attaqueHeros = <?php echo $attaque_heros; ?>;
    let pvHeros = <?php echo $pv_heros; ?>;
    let manaHeros = <?php echo $mana_heros; ?>;
    const pvMaxHeros = <?php echo $pv_heros; ?>;
    const manaMaxHeros = <?php echo $mana_heros; ?>;
    let initiativeHeros = Math.floor(Math.random() * 6) + 1 + <?php echo $initiative_heros; ?>;
    let defenseHeros;
    if(heros==='Voleur'){
        defenseHeros = Math.floor(<?php echo $initiative_heros; ?>/2);
    }
    else{
        defenseHeros = Math.floor(<?php echo $attaque_heros; ?>/2);

    }

    let monstre = "<?php echo $monstre; ?>";
    let attaqueMonstre = <?php echo $attaque_monstre; ?>;
    let pvMonstre = <?php echo $pv_monstre; ?>;
    let manaMonstre = <?php echo $mana_monstre; ?>;
    const pvMaxMonstre = <?php echo $pv_monstre; ?>;
    const manaMaxMonstre = <?php echo $mana_monstre; ?>;
    let initiativeMonstre = Math.floor(Math.random() * 6) + 1 + <?php echo $initiative_monstre; ?>;
    let defenseMonstre;
    if(monstre==='Voleur'){
        defenseMonstre = Math.floor(<?php echo $initiative_monstre; ?> / 2);
    }
    else{
        defenseMonstre = Math.floor(<?php echo $attaque_monstre; ?> / 2);
    }


    let nbPotion = <?php echo $nbPotion; ?>;
    let nbPotionRestantes = <?php echo $nbPotion; ?>;

    let AuTourDe = -1;

    function logAction(message) {
        const log = document.getElementById("log");
        log.innerHTML += `<p>${message}</p>`;
        log.scrollTop = log.scrollHeight;
    }

    function initialiserCombat() {
        if (initiativeHeros > initiativeMonstre) {
            AuTourDe = 1;
            logAction(`Héros commence avec une initiative de ${initiativeHeros} contre ${initiativeMonstre}.`);
        } else if (initiativeMonstre > initiativeHeros) {
            AuTourDe = 0;
            logAction(`Monstre commence avec une initiative de ${initiativeMonstre} contre ${initiativeHeros}.`);
        } else {
            AuTourDe = heros === "Voleur" ? 1 : 0;
            logAction(AuTourDe === 1
                ? "Égalité d'initiative, mais le héros voleur prend la priorité."
                : "Égalité d'initiative, le monstre prend la priorité."
            );
        }
        combat();
    }

    function choisirAction(action) {
        if (AuTourDe === 1) {
            switch (action) {
                case 'physique':
                    effectuerAttaquePhysique('heros');
                    AuTourDe = 0;
                    break;
                case 'magique':
                    if(effectuerAttaqueMagique('heros')){
                        AuTourDe = 0;
                    }
                    break; // Ne pas passer le tour immédiatement, car l'utilisateur peut annuler
                case 'potion':
                    if (!utiliserPotion('heros')) {
                        return; // Ne pas passer le tour si l'action est annulée
                    }
                    AuTourDe = 0;
                    break;
                default:
                    logAction("Action non reconnue !");
                    return;
            }
            combat();
        }
    }

    function effectuerAttaquePhysique(attaquant) {
        let attaque, defense, degats;
        if (attaquant === 'heros') {
            attaque = Math.floor(Math.random() * 6) + 1 + attaqueHeros;
            defense = Math.floor(Math.random() * 6) + 1 + defenseMonstre;
            degats = Math.max(0, attaque - defense);
            pvMonstre = Math.max(0, pvMonstre - degats);
            logAction(`Héros attaque physiquement ! Attaque: ${attaque}, Défense: ${defense}, Dégâts: ${degats}.`);
        } else {
            attaque = Math.floor(Math.random() * 6) + 1 + attaqueMonstre;
            defense = Math.floor(Math.random() * 6) + 1 + defenseHeros;
            degats = Math.max(0, attaque - defense);
            pvHeros = Math.max(0, pvHeros - degats);
            logAction(`Monstre attaque physiquement ! Attaque: ${attaque}, Défense: ${defense}, Dégâts: ${degats}.`);
        }
        updateStats();
    }

    function effectuerAttaqueMagique(attaquant) {
        let coutMana, attaqueMagique, defense, degats;

        if (attaquant === 'heros') {
            while (true) {
                const saisie = prompt(`Combien de mana voulez-vous utiliser ? (max: ${manaHeros})`);
                if (saisie === null) {
                    logAction("Action annulée. Réessayez.");
                    return; // Annulation, donc pas de changement de tour
                }

                coutMana = parseInt(saisie, 10);

                if (isNaN(coutMana) || coutMana <= 0) {
                    logAction("Saisie invalide. Entrez un chiffre supérieur à 0.");
                    continue;
                }

                if (coutMana > manaHeros) {
                    logAction("Mana insuffisant. Réessayez.");
                    continue;
                }

                break; // Sortie de la boucle si la saisie est valide
            }

            manaHeros -= coutMana;
            attaqueMagique = Math.floor(Math.random() * 6) + 1 + Math.floor(Math.random() * 6) + 1 + coutMana;
            defense = Math.floor(Math.random() * 6) + 1 + defenseMonstre;
            degats = Math.max(0, attaqueMagique - defense);
            pvMonstre = Math.max(0, pvMonstre - degats);
            logAction(`Héros utilise une attaque magique ! Mana utilisé: ${coutMana}, Attaque: ${attaqueMagique}, Défense: ${defense}, Dégâts: ${degats}.`);
        } else if (monstre === 'magicien') {
            if (manaMonstre <= 0) {
                logAction("Monstre n'a plus de mana pour une attaque magique.");
                return; // Pas d'attaque magique possible
            }
            coutMana = Math.min(Math.floor(Math.random() * (manaMonstre - 20 + 1)) + 20, manaMonstre); // Mana entre 20 et mana disponible
            manaMonstre -= coutMana;
            attaqueMagique = Math.floor(Math.random() * 6) + 1 + Math.floor(Math.random() * 6) + 1 + coutMana;
            defense = Math.floor(Math.random() * 6) + 1 + defenseHeros;
            degats = Math.max(0, attaqueMagique - defense);
            pvHeros = Math.max(0, pvHeros - degats);
            logAction(`Monstre utilise une attaque magique ! Mana utilisé: ${coutMana}, Attaque: ${attaqueMagique}, Défense: ${defense}, Dégâts: ${degats}.`);
        }

        updateStats();
        return true;
    }

    function utiliserPotion(attaquant) {
        if (attaquant === 'heros') {
            let choix;
            while (true) {
                choix = prompt("Quelle potion voulez-vous utiliser ? (pv/mana)");
                if (choix === null) {
                    logAction("Action annulée. Réessayez.");
                    return false;
                }
                if (choix === 'pv') {
                    if (pvHeros === pvMaxHeros) {
                        logAction("PV déjà au maximum, potion inutilisable !");
                        continue;
                    } else {
                        pvHeros = Math.min(pvHeros + 20, pvMaxHeros);
                        nbPotionRestantes--;
                        logAction("Héros utilise une potion de PV.");
                        if (nbPotionRestantes>1){
                            logAction(`Il reste ${nbPotionRestantes} potion à l'héros`);
                        }else if (nbPotionRestantes<1){
                            logAction(`Attention plus de potion disponible pour l'héros`);
                        }else{
                            logAction(`Attention, il reste une seule potion !`)
                        }

                        break;
                    }
                } else if (choix === 'mana') {
                    if (manaHeros === manaMaxHeros) {
                        logAction("Mana déjà au maximum, potion inutilisable !");
                        continue;
                    } else {
                        manaHeros = Math.min(manaHeros + 20, manaMaxHeros);
                        nbPotionRestantes--;
                        logAction("Héros utilise une potion de Mana.");
                        break;
                    }
                } else {
                    logAction("Saisie invalide. Réessayez.");
                    continue;
                }
            }
            updateStats();
            return true;
        } else {
            if (pvMonstre < pvMaxMonstre) {
                pvMonstre = Math.min(pvMonstre + 20, pvMaxMonstre);
                logAction("Monstre utilise une potion de PV.");
            }
            else if (manaMonstre < manaMaxMonstre){
                manaMonstre = Math.min(manaMonstre + 20 , manaMaxMonstre);
                logAction("Monstre utilise une potion de mana.");
            }
            updateStats();
        }
        return true;
    }

    function tourMonstre() {
        disableButtons();
        let actions = ['physique', 'magique', 'potion'];
        let action;

        // Trouver une action valide pour le monstre
        do {
            action = actions[Math.floor(Math.random() * actions.length)];
            if (action === 'magique' && monstre !== 'magicien') continue; // Monstre non-magicien ne peut pas utiliser magique
            if (action === 'magique' && manaMonstre <= 0) continue; // Pas assez de mana pour magique
            if (action === 'potion' && pvMonstre === pvMaxMonstre && manaMonstre === manaMaxMonstre) continue; // Pas de besoin de potion
            break;
        } while (true);

        // Effectuer l'action choisie
        switch (action) {
            case 'physique':
                effectuerAttaquePhysique('monstre');
                break;
            case 'magique':
                effectuerAttaqueMagique('monstre');
                break;
            case 'potion':
                utiliserPotion('monstre');
                break;
        }

        // Passer au héros
        AuTourDe = 1;
        combat(); // Appel immédiat de combat après chaque action du monstre
    }


    function updateStats() {
        document.getElementById('stats').innerHTML = `
                Héros : PV = ${pvHeros} , Mana = ${manaHeros}  <br>
                Monstre : PV = ${pvMonstre}, Mana = ${manaMonstre} 
            `;
        document.getElementById('btn-magique').disabled = !(heros === "Mage" && manaHeros >= 10);
        document.getElementById('btn-potion').disabled = !(nbPotionRestantes > 0 && (pvHeros < pvMaxHeros || manaHeros < manaMaxHeros));
    }

    function disableButtons() {
        document.querySelectorAll('button').forEach(btn => btn.disabled = true);
    }

    function enableButtons() {
        document.querySelectorAll('button').forEach(btn => btn.disabled = false);
        document.getElementById('btn-magique').disabled = !(heros === "Mage" && manaHeros >= 10);
        document.getElementById('btn-potion').disabled = !(nbPotionRestantes > 0 && (pvHeros < pvMaxHeros || manaHeros < manaMaxHeros));
    }

    function combat() {
        if (pvHeros <= 0 || pvMonstre <= 0) {
            //const gagnant = pvHeros > 0 ? "Héros" : "Monstre";
            let gagnant;
            if(pvHeros > 0){
                gagnant = "Héros";
                setTimeout( () => {
                    window.location.href = "<?php echo $idChapitreWin ?>";
                }, 2000)
            } else {
                gagnant = "Monstre";
                setTimeout( () => {
                    window.location.href = "<?php echo $idChapitreDefeat ?>";
                }, 2000 )
            }
            logAction(`${gagnant} a gagné le combat !`);
            disableButtons();
            return;
        }

        if (AuTourDe === 1) {
            enableButtons();
            logAction("Au tour du héros !");
        } else {
            disableButtons();
            logAction("Au tour du monstre !");
            setTimeout(tourMonstre, 2000);
        }
    }

    initialiserCombat();
</script>
</body>
</html>