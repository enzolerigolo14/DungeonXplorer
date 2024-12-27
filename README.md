# Projet DungeonXplorer ⚔️

DungeonXplorer est une application web de type "livre dont vous êtes le héros", plongeant les joueurs dans un univers de dark fantasy interactif. Conçu pour offrir une expérience immersive, le projet combine la gestion de personnage, des scénarios captivants et des mécaniques de combat.

---

## Fonctionnalités

### Pour les joueurs :
1. **Création et gestion de compte :**
   - Inscription avec nom d'utilisateur et mot de passe.
   - Connexion sécurisée avec gestion de sessions.
   - Possibilité de consulter, modifier ou supprimer son compte.

2. **Création de personnage :**
   - Choisissez parmi **trois classes emblématiques** :
     - **Guerrier** : Puissance brute et résistance.
     - **Voleur** : Discrétion et agilité.
     - **Magicien** : Maîtrise des arcanes.
   - Les caractéristiques du personnage sont sauvegardées dans la base de données :
     - Points de vie, points d'expérience, équipement, etc.

3. **Suivi de l'aventure :**
   - Commencez une nouvelle aventure ou reprenez votre progression.
   - Exploration interactive d'un scénario de dark fantasy.

4. **Statistiques et progression :**
   - Consultez les caractéristiques de votre personnage en temps réel.
   - Suivez vos progrès et objets collectés.

5. **Système de combat :**
   - Affrontez des monstres avec des mécaniques de combat simples et dynamiques.
   - Gestion des dégâts magique/physique selon classe.
   - 

### Pour les administrateurs :
1. **Gestion des joueurs :**
   - Liste des comptes utilisateurs.
   - Suppression des comptes indésirables.
     
---

## Structure du projet

Voici une vue simplifiée de la structure du projet :

# Structure du projet DungeonXplorer

DungeonXplorer/
├── app/
│   ├── controllers/   # Contient les contrôleurs de l'application
│   ├── models/        # Contient les modèles de l'application
│   └── views/         # Contient les vues (templates HTML, etc.)
├── config/            # Fichiers de configuration (base de données, etc.)
├── public/            # Contient les fichiers accessibles publiquement
│   ├── css/           # Feuilles de style CSS
│   ├── fonts/         # Polices utilisées dans le projet
│   ├── images/        # Images utilisées dans le projet
│   └── js/            # Scripts JavaScript
├── .env               # Fichier d'environnement (configuration sensible)
├── .gitignore         # Fichier pour exclure des fichiers/dossiers du contrôle de version
├── .htaccess          # Fichier de configuration pour le serveur Apache
├── autoload.php       # Script pour l'autoloading des classes
├── index.php          # Point d'entrée principal de l'application
└── README.md          # Documentation du projet

---

## Technologies utilisées

- **Back-end** : PHP 8 avec PDO pour la gestion des interactions avec MySQL.
- **Base de données** : MySQL (gestion des utilisateurs, personnages, et progression).
- **Front-end** : HTML5, CSS3, JavaScript.
- **Frameworks** :
  - Bootstrap pour la mise en page.
  - FontAwesome pour les icônes.
- **Gestion de version** : Git et GitHub.

---

## Installation

### Pré-requis :
- Serveur PHP (par exemple : XAMPP, WAMP ou LAMP).
- MySQL installé et configuré.
- Accès au terminal pour exécuter des commandes Git.

### Étapes :
1. Clonez ce dépôt :
   ```bash
   git clone https://github.com/votre-utilisateur/DungeonXplorer.git
   cd DungeonXplorer

## Configuration de la base de données

1. **Importez le fichier SQL** :  
   - Localisez le fichier SQL situé dans `config/databaseConnexion.sql`.  
   - Importez ce fichier dans votre base de données MySQL à l'aide d'un outil comme phpMyAdmin ou via le terminal MySQL :  
     ```bash
     mysql -u [utilisateur] -p [nom_de_la_base] < config/dx12_bd.sql
     ```

2. **Modifiez les paramètres de connexion** :  
   - Accédez au fichier `config/database.php` et configurez les identifiants de connexion à votre base de données.

---

## Lancement du serveur

1. Ouvrez un terminal et lancez le serveur PHP avec la commande suivante :  
   ```bash
   php -S localhost:8000 -t public/


