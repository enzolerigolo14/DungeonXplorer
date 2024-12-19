<?php

$heros = "magicien";
$attaque_heros = 50;
$defense_heros = 30;
$pv_heros = 120;
$mana_heros = 60;
$initiative_heros = 10;

$attaque_monstre = 50;
$defense_monstre = 30;
$pv_monstre = 100;
$mana_monstre = 60;
$initiative_monstre = 10;

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Combat</title>
</head>
<body>
    <h1>Le Combat de Chauve !</h1>

    <!-- Affichage des statistiques -->
    <p id="stats">Héros : PV = <?php echo $pv_heros; ?>, Mana = <?php echo $mana_heros; ?> <br> Monstre : PV = <?php echo $pv_monstre; ?></p>
    
    <!-- Choix des actions -->
    <button id="btn-physique" onclick="choisirAction('physique')">Attaque Physique</button>
    <button id="btn-magique" onclick="choisirAction('magique')">Attaque Magique</button>
    <button id="btn-potion" onclick="choisirAction('potion')">Utiliser Potion</button>

    <script>
        
        var AuTourDe = -1; //1 au tour de l'héros, 0 au tour du monstre, -1 stade d'initialisation 

        var heros = "<?php echo $heros; ?>";
        var attaqueHeros = <?php echo $attaque_heros; ?>;
        var defenseHeros = <?php echo $defense_heros; ?>;
        var pvHeros = <?php echo $pv_heros; ?>;
        var manaHeros = <?php echo $mana_heros; ?>;
        var initiativeHeros = Math.floor(Math.random() * 6) + 1  + <?php echo $initiative_heros; ?>;

        var attaqueMonstre = <?php echo $attaque_monstre; ?>;
        var defenseMonstre = <?php echo $defense_monstre; ?>;
        var pvMonstre = <?php echo $pv_monstre; ?>;
        var manaMonstre = <?php echo $mana_monstre; ?>;
        var initiativeMonstre =Math.floor(Math.random() * 6) + 1 + <?php echo $initiative_monstre; ?>;


        function initialiserCombat() {
            if (initiativeHeros > initiativeMonstre) {
                AuTourDe = 1;
                ableButtons();
            } else if (initiativeMonstre > initiativeHeros) {
                AuTourDe = 0;
                disableButtons();
            } else {
                if (heros === "voleur") {
                    AuTourDe = 1;
                    ableButtons();
                } else {
                    AuTourDe = 0;
                    disableButtons();
                }
            }
            combat();
        }

        
        function choisirAction(action) {
            if (AuTourDe == 1) { // Si c'est le tour du héros
                disableButtons();
                switch(action) {
                    case 'physique':
                        // Attaque physique
                        alert("attaque physique");
                        pvMonstre -= 10; // Exemple d'attaque physique, réduisez les PV du monstre
                        break;
                    case 'magique':
                        // Attaque magique
                        alert("attaque magique");
                        break;
                    case 'potion':
                        // Utilisation d'une potion
                        alert("boire potion");
                        pvHeros += 15; // Exemple de potion
                        break;
                    default:
                        alert("Action non reconnue !");
                        break;
                }

                // Mise à jour des statistiques après l'action du héros
                updateStats();

                // Passage au tour du monstre
                AuTourDe = 0;
                combat(); // Lancer la fonction combat pour vérifier si le combat continue
            }
        }

        // Fonction pour le tour du monstre
        function tourMonstre() {
            disableButtons(); // Désactive les boutons pendant le tour du monstre
            
            // Mise à jour des statistiques avant l'attaque du monstre
            updateStats();
            
            if (AuTourDe == 0) {
                // Le monstre attaque
                alert("Le monstre attaque !");
                pvHeros -= 10; // Le monstre enlève 10 PV au héros

                // Mise à jour des statistiques après l'attaque du monstre
                updateStats();

                // Retour au tour de l'héros
                AuTourDe = 1; 
                combat(); // Lancer la fonction combat pour vérifier si le combat continue
            }
        }


        function updateStats() {
            document.getElementById('stats').innerHTML = "Héros : PV = " + pvHeros + ", Mana = " + manaHeros + "<br>Monstre : PV = " + pvMonstre;
        }


        function disableButtons() {
            document.getElementById("btn-physique").disabled = true;
            document.getElementById("btn-magique").disabled = true;
            document.getElementById("btn-potion").disabled = true;
        }

        function ableButtons() {
            document.getElementById("btn-physique").disabled = false;
            document.getElementById("btn-potion").disabled = false;
            if(heros !== "magicien"){
                document.getElementById("btn-magique").disabled = false;               
            }
        }

        function combat() {
            // Mise à jour des stats après chaque tour
            updateStats();

            if (pvHeros <= 0) {
                alert("Le monstre a vaincu le héros !");
                console.log("Le monstre a battu le héros !");
                disableButtons();
            } else if (pvMonstre <= 0) {
                alert("Le héros a vaincu le monstre !");
                console.log("Le héros a battu le monstre !");
                disableButtons();
            } 

            if(AuTourDe==0 && pvMonstre>0 && pvHeros >0){
                tourMonstre(); // Le monstre attaque après le héros
            }
            else if (AuTourDe==1 && pvMonstre>0 && pvHeros >0){
                ableButtons();
            }
        }

        initialiserCombat();

    </script>

</body>
</html>  
