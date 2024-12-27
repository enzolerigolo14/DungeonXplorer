<?php
// view/chapter.php

$chapterController = new ChapterController();
$chapter = $chapterController->getChapter($id);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $chapter->getTitle(); ?></title>
    <link rel="stylesheet" href="/DungeonXplorer/public/css/chapter_styles.css">
    <link rel="stylesheet" href="/DungeonXplorer/public/css/style_combat.css">
</head>
<body>
    <div class="buttonNavbar-container">
        <button class="deco-button"><a href="deconnexion">Se déconnecter</a></button>
    </div>
    <p id="textTemp" style="display: none"><?php echo $chapter->getContent(); ?></p>
    <div id="container">
        <h1 id="chapter-title">Chapitre <?php echo $chapter->getId(); ?> : <?php echo $chapter->getTitle(); ?></h1> <!-- Le titre s'affichera ici -->
        <div id="textContainer">
            <p id="chapter-text" style="display: none;"></p>
        </div>
        <?php if($nbEncounter != 0): ?>
            <div id="combatContainer" style="display: none">
                <h1>Le Combat commence !</h1>

                <!-- Affichage des statistiques -->
                <div id="stats">
                    Héros : PV = <?php echo $heroToUse->getPv(); ?> / <?php echo $heroToUse->getPv(); ?>, Mana = <?php echo $heroToUse->getMana(); ?> / <?php echo $heroToUse->getMana(); ?> <br>
                    Monstre : PV = <?php echo $monsterToFight->getPv(); ?> / <?php echo $monsterToFight->getPv(); ?>, Mana = <?php echo $monsterToFight->getMana(); ?> / <?php echo $monsterToFight->getMana(); ?>
                </div>

                <!-- Journal des événements -->
                <div id="log">Début du combat...</div>

                <!-- Choix des actions -->
                <button class="button-combat" id="btn-physique" onclick="choisirAction('physique')">Attaque Physique</button>
                <button class="button-combat" id="btn-magique" onclick="choisirAction('magique')" disabled>Attaque Magique</button>
                <button class="button-combat" id="btn-potion" onclick="choisirAction('potion')">Utiliser Potion</button>
            </div>
            <script>
                let heros = "<?php echo $classHeroName; ?>";
                let attaqueHeros = <?php echo $heroToUse->getStrength(); ?>;
                let pvHeros = <?php echo $heroToUse->getPv(); ?>;
                let manaHeros = <?php echo $heroToUse->getMana(); ?>;
                const pvMaxHeros = <?php echo $heroToUse->getPv(); ?>;
                const manaMaxHeros = <?php echo $heroToUse->getMana(); ?>;
                let initiativeHeros = Math.floor(Math.random() * 6) + 1 + <?php echo $heroToUse->getInitiative(); ?>;
                let defenseHeros;
                if(heros==='Voleur'){
                    defenseHeros = Math.floor(<?php echo $heroToUse->getInitiative(); ?>/2);
                }
                else{
                    defenseHeros = Math.floor(<?php echo $heroToUse->getStrength();; ?>/2);

                }

                let monstre = "<?php echo $monsterToFight->getName(); ?>";
                let attaqueMonstre = <?php echo $monsterToFight->getStrength(); ?>;
                let pvMonstre = <?php echo $monsterToFight->getPv(); ?>;
                let manaMonstre = <?php echo $monsterToFight->getMana(); ?>;
                const pvMaxMonstre = <?php echo $monsterToFight->getPv(); ?>;
                const manaMaxMonstre = <?php echo $monsterToFight->getMana(); ?>;
                let initiativeMonstre = Math.floor(Math.random() * 6) + 1 + <?php echo $monsterToFight->getInitiative(); ?>;
                let defenseMonstre;
                if(monstre==='Voleur'){
                    defenseMonstre = Math.floor(<?php echo $monsterToFight->getInitiative(); ?> / 2);
                }
                else{
                    defenseMonstre = Math.floor(<?php echo $monsterToFight->getInitiative(); ?> / 2);
                }


                let nbPotion = <?php $nbPotion = 2; echo $nbPotion; ?>;
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
                Héros : PV = ${pvHeros} / ${pvMaxHeros}, Mana = ${manaHeros} / ${manaMaxHeros} <br>
                Monstre : PV = ${pvMonstre} / ${pvMaxMonstre}, Mana = ${manaMonstre} / ${manaMaxMonstre}
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
                    const choiceContainer = document.getElementById('buttonLinksFight-container');
                    const win = document.getElementById('LinkToWinChapter');
                    const defeat = document.getElementById('LinkToDefeatChapter')
                    if (pvHeros <= 0 || pvMonstre <= 0) {
                        //const gagnant = pvHeros > 0 ? "Héros" : "Monstre";
                        let gagnant = "";
                        if(pvHeros > 0){
                            gagnant = "Héros";
                            choiceContainer.style.display = 'flex';
                            win.style.display = 'block'
                            console.log(gagnant);
                        } else {
                            gagnant = "Monstre";
                            choiceContainer.style.display = 'flex';
                            defeat.style.display = 'block'
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
        <?php endif; ?>
    </div>



    <?php
    echo '<div id="buttonLinksFight-container" style="display: none">';
        echo '<button id="LinkToWinChapter" class="event-button" style="display: none"><a href="'.$idChapitreWin.'">Continuer sur votre chemin</a></button>';
        echo '<button id="LinkToDefeatChapter" class="event-button" style="display: none"><a href="'.$idChapitreDefeat.'">Continuer sur votre chemin</a></button>';
    echo '</div>';

    if($nbEncounter == 0){
        echo '<div id="buttonLinks-container" style="display: none">';
        if($nbLinks != 0){
            foreach ($AllLinks as $choice) {
                echo '<button class="event-button"><a href="'.$choice->getNextchapterId().'">'.$choice->getDescription().'</a></button>';
            }
        } else {
            echo '<button class="event-button"><a href="1">Recommencer l\'aventure</a></button>';
        }
        echo '</div>';
    }
    ?>

    <script src="/DungeonXplorer/public/js/chapter_scripts.js"></script>
</body>
</html>
