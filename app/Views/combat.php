<?php

$heros = $classHeroName;
$attaque_heros = $heroToUse->getStrength();
$defense_heros = $heroToUse->getArmor();
$pv_heros = $heroToUse->getPv();
$mana_heros = $heroToUse->getMana();
$initiative_heros = $heroToUse->getInitiative();

$monstre = $monsterToFight->getName();
$attaque_monstre = $monsterToFight->getStrength();
$defense_monstre = $monsterToFight->getArmor();
$pv_monstre = $monsterToFight->getPv();
$mana_monstre = $monsterToFight->getMana();
$initiative_monstre = $monsterToFight->getInitiative();
// recuperer dynamiquement le sprite
$sprite = $monsterToFight->getImage();

/*$heros = "magicien";
$attaque_heros = 50;
$defense_heros = 30;
$pv_heros = 120;
$mana_heros = 60;
$initiative_heros = 10;

$monstre = "Loup noir";
$attaque_monstre = 50;
$defense_monstre = 30;
$pv_monstre = 100;
$mana_monstre = 60;
$initiative_monstre = 10;
// recuperer dynamiquement le sprite
$sprite = "sprites/loup_noir_sprite.gif"*/

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Combat</title>
    <link rel="stylesheet" href="/DungeonXplorer/public/css/combat_styles.css"> <!-- Lien vers le fichier CSS -->
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
                <img src=<?php echo $sprite?> alt="Sprite du monstre" id="monster-sprite">
            </div>
        </div>
    </div>

    <script>
        let heros = "<?php echo $heros; ?>";
        let attaqueHeros = <?php echo $attaque_heros; ?>;
        let pvHeros = <?php echo $pv_heros; ?>;
        let manaHeros = <?php echo $mana_heros; ?>;
        const pvMaxHeros = <?php echo $pv_heros; ?>;
        const manaMaxHeros = <?php echo $mana_heros; ?>;
        let initiativeHeros = Math.floor(Math.random() * 6) + 1 + <?php echo $initiative_heros; ?>;
        let defenseHeros;
        if(heros==='voleur'){
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
        if(monstre==='voleur'){
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
                AuTourDe = heros === "voleur" ? 1 : 0;
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
            if (pvHeros <= 0 || pvMonstre <= 0) {
                const gagnant = pvHeros > 0 ? "Héros" : "Monstre";
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