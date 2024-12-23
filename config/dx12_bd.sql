-- phpMyAdmin SQL Dump
-- version 5.2.1deb1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 23 déc. 2024 à 17:04
-- Version du serveur : 10.11.6-MariaDB-0+deb12u1
-- Version de PHP : 8.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `dx12_bd`
--

-- --------------------------------------------------------

--
-- Structure de la table `ChapterProf`
--

CREATE TABLE `Chapter` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `treasure_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `ChapterProf`
--

INSERT INTO `Chapter` (`id`, `content`, `image`, `treasure_id`) VALUES
(1, 'Le ciel est lourd ce soir sur le village du Val Perdu, dissimulé entre les montagnes. La petite taverne, dernier refuge avant l\'immense forêt, est étrangement calme quand le bourgmestre s’approche de vous. L’homme d’apparence usée par les années et les mésaventures, vous adresse un regard désespéré. « Voilà maintenant 2 ans que ma fille a disparu dans la forêt. Aujourd’hui, elle aurait dû fêter ses 20 ans… Elle doit avoir à peu près votre âge vous savez. On raconte que c’est le sorcier qui vit dans le château en ruines, caché au cœur des bois, qui l\'aurait enlevé .  Voilà des mois que des jeunes filles disparaissent…  On raconte qu’il est à la recherche d’une épouse pour rebâtir son empire de pouvoirs et de contrôle. J’ai entendu parler de vos prouesses en tant que héros par delà les contrées, vous êtes mon dernier espoir. Je vous en prie, sauvez le royaume, sauvez ma fille !  » Vous sentez le poids de la mission qui s’annonce, Bien que fût un temps vous étiez un valeureux guerrier, voilà bien longtemps que vous avez posé les armes… vous n’êtes plus vraiment le héros d’antan… Cependant vous ne pouvez ignorer les lamentations de ce pauvre homme.\r\nIl est temps de se décider, l’heure est il venu de reprendre les armes ?\r\n', NULL, NULL),
(2, 'Vous franchissez la lisière des arbres, la pénombre de la forêt avalant le sentier devant vous. Un vent froid glisse entre les troncs, et le bruissement des feuilles ressemble à un murmure menaçant. Après quelques minutes de marche, deux chemins s’offrent à vous : \r\nl’un est sinueux, bordé de vieux arbres noueux ; \r\nl’autre droit mais envahi par des ronces épaisses.\r\n', NULL, NULL),
(3, 'Votre choix vous mène devant un vieux chêne aux branches tordues, grouillant de corbeaux noirs qui vous observent en silence d’un œil attentif. À vos pieds, des traces de pas légers, probablement récents, mènent plus loin dans les bois. Soudain, un bruit de pas feutrés se fait entendre non loin. Vous sentez une présence menaçante que faire ?', NULL, NULL),
(4, 'Après avoir franchi tant bien que mal les ronces de la forêt, vous continuez votre chemin quand soudain le calme de la forêt est brisé par un grognement. Sorti des buissons, un énorme sanglier au pelage épais et aux yeux injectés de sang se dirige vers vous. Sa rage est palpable, et il semble prêt à en découdre. Le voici qui décide brutalement de vous charger !', NULL, NULL),
(5, 'Tandis que vous progressez, une voix humaine s’élève, interrompant le silence de la forêt. Vous tombez sur un vieux paysan, accroupi près de champignons aux couleurs vives. Il sursaute en vous voyant, puis se détend, vous souriant tristement. « Vous devriez faire attention, étranger, murmure-t-il. La nuit, des cris terrifiants retentissent depuis le cœur de la forêt… Des créatures rôdent. J’ai quelque chose pour toi approche» \r\nVous vous approchez du paysan prudemment pendant qu’il fouille dans ses poches.\r\n\r\nIl sort finalement un pendentif doré orné d’une pierre précieuse. Vous vous demandez alors comment ce pauvre paysan peut posséder un objet qui semble de si haute valeur. Lorsqu’il vous dit\r\n“Tiens jeune guerrier, voici le pendentif de ma fille. Il date de l’époque ou j\'étais un riche fermier qui exportait dans tout le royaumes. Une époque ou ma fille était encore à mes côtés… Après la mort de sa mère, elle était la seule chose qui me restait en ce monde, elle était mon monde. Malheureusement mon monde s\'est écroulé il y a maintenant 3 ans… Elle fait partie des premières victimes du sorcier qui vit dans ces bois. Depuis je ne cesse d’errer dans cette forêt à la recherche du moindre indice, mais malheureusement je n\'ai toujours rien trouvé. Je n’en ai plus pour très longtemps, alors je t’en prie héros, prends cette amulette, dernier souvenir de ma fille bien aimée. puisse t elle vivre à travers tes aventures… Avant que tu partes, voici un dernier conseil, prend garde à la pierre taillée au allure verdoyante, ne t\'en approche sous aucun prétexte.”  \r\nVous prenez l’amulette avant de saluer et de remercier les paysans. Cette histoire vous motive deux fois plus à accomplir votre quête, Vous repartez d\'un pas déterminé.\r\n', NULL, NULL),
(6, ' À mesure que vous avancez, un bruissement attire votre attention. Une silhouette sombre s’élance soudainement devant vous : un loup noir aux yeux perçants Apparraît. Son poil est hérissé et sa gueule laisse entrevoir des crocs acérés. Vous sentez son regard fixé sur vous, prêt à bondir. Le combat est inévitable.\r\n', NULL, NULL),
(7, 'Après votre rencontre mouvementée, vous atteignez une clairière étrange entourée de pierres dressées, comme un ancien autel oublié par le temps. Une légère brume rampe au sol, et les ombres des pierres semblent danser sous la lueur de la lune. Au centre de la salle se trouve un crystale lumineux qui semble emplit d\'énergie magique.\r\n', NULL, NULL),
(8, 'Essoufflé mais déterminé, vous arrivez près d’un petit ruisseau qui serpente au milieu des arbres. Le chant de l’eau vous apaise quelque peu et vous en profitez pour vous abreuver. Après un peu de repos, vous  commencez à entendre des murmures étranges qui semblent émaner de la rive. Vous apercevez des inscriptions anciennes gravées dans une pierre moussue. Il vous est impossible de décrypter ce langages mais cette stèle vous rappelle étrangement une légende très connue au sein du royaume. On raconte que très profondément dans la forêt, à l’endroit ou les arbres et les plantes semblent régner sur un royaumes verdoyant dépourvu d’humain, se trouve une stèles ancestrale qui aurait été gravée par des sorciers très puissants vivants à des temps immémoriaux. D’après la légende, celui qui trouvera la stèle et entrera en contact avec sera littéralement touché par la grâce. Un monde de néant s’ouvrira sous ses pieds, avant de se voir offert un monde de lumière.\r\nCette histoire me semble étrange, que devrais-je faire ?\r\n', NULL, NULL),
(9, 'Après vous être reposé un temps, vous reprenez votre route à travers les bois. C’est alors qu’au loin vous apercevez une silhouette humaine qui semble se reposer affaissée sur le sol contre un arbre. En vous approchant vous découvrez avec effroi un squelette humain, accompagné d’une épée détruite et d’un bouclier. Il s’agit là certainement d’un héros tout comme vous qui avez malheureusement subi un funeste destin. Vous rendez hommage à sa dépouille et l’enterré prêt de l\'arbre sur lequel vous l’avez trouvée. ', NULL, NULL),
(10, 'Après cette malheureuse rencontre, la forêt se disperse enfin. Devant vous, le château craquelant est surplombé d’une pleine lune étincelante, projetant une ombre inquiétante sur vous. Vous sentez le poids de la tâche qui vous incombe, c’est ici que votre aventure arrive à son paroxysme, il est temps d’en finir avec ce maudit sorcier !\r\n\r\nVous vous engouffrez dans la pénombre du château et avancez prudemment. Votre seule source de lumière sont les faisceaux lumineux projetés par la lune à travers les grandes voûtes du château. L’atmosphère est lourde et le silence vous glace le sang. Vous n’êtes désormais plus aussi sûr de vous et commencez à douter de votre victoire. Vous pensez alors à tout ce chemin parcouru, au bourgmestre qui vous à confié cette mission, aux innombrables disparitions qui ont eu lieu et à de pauvres paysans à la recherche de sa fille… Vous prenez alors l’amulette qu’il vous a confiée dans l’espoir qu’elle vous redonne du courage. C’est là que vous remarquez sur cette dernière que le pendentif à un système d’ouverture. Vous ouvrez alors ce dernier et constatez alors à l’intérieur, une photo de la jeune fille. Il ne vous semble pas avoir déjà vu plus belle femme en ce monde, bien que ce ne soit qu’une simple photos, cette dernière vous fait oublier votre peur et refait grandir l’espoir en votre coeur. Vous rassemblez votre courage et décidez de franchir la porte au fond du château.\r\n\r\nDès votre entrée, votre regard est attiré par le trône immense au milieu de la pièce. Cependant ce dernier est vide. Vous avez à peine le temps d’être surpris qu’une masse sombre se dessine derrière le siège avant de s’élever brusquement dans le ciel d’un air très menaçant. Une masse noir énorme aparaît devant vous et une bourasque de vent ce fait sentir rendant difficile de ternir sur place. Une fois la tempête passée vous distinguez enfin votre adversaire. Contre toute attente la masse noir devant vous arbore une allure feminine, bien loin de l’idée que vous vous faisiez du sorcier. Cependant vous n’avez pas le temps de vous en inquiéter, elle attaque !\r\nLe combat final commence !\r\n', NULL, NULL),
(11, 'Après ce rude batail, l’atmosphère de la salle se calme enfin. Vous essayez tant bien que mal de recouvrez vos esprit tandis qu’un silence d’après guerre accablant s\'empare de la pièce. La masse d’ombre semble s’évaporer devant vous quand soudain ! Vous distinguez le corps d’une femme laissé derrière par la masse d’ombre. Vous vous empressez de courir vers le corps avec le peu de force qu’il vous reste; puis arrivé à son chevet vous constaté effaré, le corps de la jeune femme tremblotant. En voyant son visage votre cœur se serra si fort que vous avez cru mourir sur le coup. Le souffle court, vous demandez à la jeune femme.\r\n\r\n“Vous êtes en vie ?”\r\n\r\nElle relève alors légèrement la tête dans votre direction et le doute n’est alors plus permis. il s’agit bien d’elle, la femme sur le pendentif, la fille du paysans, cette femme qui semblez si rayonante est allongée devant vous aux portes de la mort… et c’est de votre faute.\r\n\r\n', NULL, NULL),
(12, '“Merci héros, merci de m’avoir libéré de l’emprise du sorcier… Malheureusement celui que vous cherchez n’est pas en ces lieux… Partout dans le pays, il traque les jeunes femmes afin de les soumettre à son pouvoir et d’en faire des pantins pour son royaume ! Il est à la recherche d’un receptacle, une femme capable de supporter son pouvoirs afin d’en faire sa reine et de gouverner sur le monde… Pour ce faire, il insuffle une partie de ses pouvoirs à des femmes qu’il kidnappe et observe la réaction de leur corps face à la magie. Des centaine de femmes sont déjà morte, incapable de supporter son pouvoirs… J’ai eu la chance, ou plutôt le malheur de survivre, mais je n’étais pas assez puissante pour qu’il fasse de moi son épouse. Il m’a donc utilisé pour récolter encore plus de femme… Fait attention héros ! Je ne suis pas la seule à avoir survécu et je suis loin d’être la plus puissante. Ta quête n’est pas finie, je t’en prie retrouve le sorcier et tue le, il ne doit surtout pas trouver d’épouse, son pouvoir en sera décuplé et s’en sera fini de ce monde !  Je suis désolé de t’infliger ce lourd fardeau mais si tu trouve d’autre femme dans mon état n’hesite pas ! La mort est la seule rédemption que tu peux leur offrir… Malheureusement on ne peut plus rien faire pour elles, la mort du sorcier causerait de toute façon la leur, ils sont comme une partie de lui… Tu es notre dernier espoir, je vais t\'offrir les pouvoirs du sorcier qui subsistent en moi. Combattant le mal par le mal, récolte les pouvoirs des autres pantins; devient une plus grande calamité encore que le sorcier, et quoi qu’il arrive ne te fait pas submerger par les ténèbre, Continue à avancer sans jamais te détourner de ta mission, le sorcier doit périr !”', NULL, NULL),
(20, 'Alors que vous progressez sur le chemin mousseux, vous sentez soudain un vide sous vos pieds que la mousse cachait. Vous trébuchez et tombez violemment  sur le sol. Heureusement la mouche amorti un peu votre chute. Vous perdez 5 PV', NULL, NULL),
(21, 'Alors que vous progressez sur le chemin mousseux, vous sentez soudain un vide sous vos pieds que la mousse cachait. Heureusement grâce à votre initiative élevé vous parvenez à éviter une chute violente, Vous finissez le chemin sans accroc.', NULL, NULL),
(22, 'Le monde se dérobe sous vos pieds, et une obscurité profonde vous enveloppe, glaciale et insondable. Alors que vous perdez toute notion du temps, une lueur douce apparaît au loin, vacillante comme une flamme fragile dans l’obscurité. Au fur et à mesure que vous approchez la lumière s\'intensifie.\r\n', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `Class`
--

CREATE TABLE `Class` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  `base_pv` int(11) NOT NULL,
  `base_mana` int(11) NOT NULL,
  `base_armor` int(11) NOT NULL,
  `strength` int(11) NOT NULL,
  `initiative` int(11) NOT NULL,
  `max_items` int(11) NOT NULL,
  `primary_weapon_default_id` int(11) NOT NULL,
  `secondary_object_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Class`
--

INSERT INTO `Class` (`id`, `name`, `description`, `base_pv`, `base_mana`, `base_armor`, `strength`, `initiative`, `max_items`, `primary_weapon_default_id`, `secondary_object_id`) VALUES
(2, 'Voleur', 'Equilibré et Agile', 80, 10, 5, 20, 8, 6, 1, NULL),
(3, 'Mage', 'Maître des sorts', 70, 90, 5, 5, 6, 5, 2, NULL),
(4, 'Guerrier', 'Tank et combattant physique', 90, 0, 7, 25, 4, 4, 3, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `Encounter`
--

CREATE TABLE `Encounter` (
  `id` int(11) NOT NULL,
  `chapter_id` int(11) DEFAULT NULL,
  `monster_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Encounter`
--

INSERT INTO `Encounter` (`id`, `chapter_id`, `monster_id`) VALUES
(1, 4, 1),
(2, 6, 2);

-- --------------------------------------------------------

--
-- Structure de la table `Event`
--

CREATE TABLE `Event` (
  `id` int(11) NOT NULL,
  `chapter_id` int(11) NOT NULL,
  `event_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Event`
--

INSERT INTO `Event` (`id`, `chapter_id`, `event_type_id`) VALUES
(1, 20, 1),
(2, 21, 2),
(3, 22, 3);

-- --------------------------------------------------------

--
-- Structure de la table `Hero`
--

CREATE TABLE `Hero` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `class_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `biography` text DEFAULT NULL,
  `pv` int(11) NOT NULL,
  `mana` int(11) NOT NULL,
  `strength` int(11) NOT NULL,
  `initiative` int(11) NOT NULL,
  `armor` int(50) DEFAULT NULL,
  `primary_weapon` int(11) DEFAULT NULL,
  `secondary_item_id` int(11) NOT NULL,
  `spell_id` int(11) DEFAULT NULL,
  `xp` int(11) NOT NULL,
  `current_level` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Inventory`
--

CREATE TABLE `Inventory` (
  `id` int(11) NOT NULL,
  `hero_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Items`
--

CREATE TABLE `Items` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Items`
--

INSERT INTO `Items` (`id`, `name`, `description`) VALUES
(1, 'Amulette précieuse', 'Cette amulette est au paysan et appartenait autre fois a ça fille '),
(2, 'Bouclier', 'Que serait un guerrier sans sa défense ? Votre fidèle bouclier est là pour vous protéger'),
(3, 'Amulette larme de la déesse', 'La déesse des lamentations vous accorde sa bénédiction, Vos réserves magiques augmentent.\r\n'),
(4, 'Bottes de vitesse', 'Grâce à ces bottes imbibé de magie vous vous sentirez bien plus léger.\r\n'),
(5, 'Orbe de pouvoir', 'Cette orbe étincelante vous conférera un pouvoir magique impressionnant !\r\n');

-- --------------------------------------------------------

--
-- Structure de la table `Level`
--

CREATE TABLE `Level` (
  `id` int(11) NOT NULL,
  `hero_id` int(11) DEFAULT NULL,
  `level` int(11) NOT NULL,
  `required_xp` int(11) NOT NULL,
  `pv_bonus` int(11) NOT NULL,
  `mana_bonus` int(11) NOT NULL,
  `strength_bonus` int(11) NOT NULL,
  `initiative_bonus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Links`
--

CREATE TABLE `Links` (
  `id` int(11) NOT NULL,
  `chapter_id` int(11) DEFAULT NULL,
  `next_chapter_id` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Links`
--

INSERT INTO `Links` (`id`, `chapter_id`, `next_chapter_id`, `description`) VALUES
(1, 1, 22, 'lancer le chapitre 22'),
(2, 1, 2, 'lancer le chapitre 2'),
(3, 2, 3, 'lancer le chapitre 3'),
(4, 2, 4, 'lancer le chapitre 4\r\n\r\n'),
(5, 3, 5, 'lancer chapitre 5'),
(6, 3, 6, 'lancer chapitre 6'),
(7, 4, 8, 'lancer le chapitre 8'),
(8, 4, 10, 'lancer le chapitre 10'),
(9, 5, 7, 'lancer le chapitre 7'),
(10, 6, 5, 'lancer le chapitre 5'),
(11, 6, 10, 'lancer le chapitre 10'),
(12, 7, 20, 'lancer le chapitre 20'),
(13, 7, 9, 'lancer le chapitre 9'),
(14, 8, 22, 'lancer le chapitre 22'),
(15, 8, 9, 'lancer le chapitre 9'),
(16, 9, 10, 'lancer le chapitre 10');

-- --------------------------------------------------------

--
-- Structure de la table `Monster`
--

CREATE TABLE `Monster` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `pv` int(11) NOT NULL,
  `mana` int(11) DEFAULT NULL,
  `initiative` int(11) NOT NULL,
  `strength` int(11) NOT NULL,
  `attack` text DEFAULT NULL,
  `loot_id` int(11) DEFAULT NULL,
  `xp` int(11) NOT NULL,
  `armor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Monster`
--

INSERT INTO `Monster` (`id`, `name`, `pv`, `mana`, `initiative`, `strength`, `attack`, `loot_id`, `xp`, `armor`) VALUES
(1, 'Sanglier Enrage', 60, NULL, 3, 10, 'charge', NULL, 30, 3),
(2, 'Loup Noir', 100, NULL, 5, 15, 'Morsure Féroce', NULL, 30, 5),
(3, 'Sorcier Maléfique', 120, 90, 5, 10, 'Souffle des abysses', NULL, 60, 4);

-- --------------------------------------------------------

--
-- Structure de la table `Quest`
--

CREATE TABLE `Quest` (
  `id` int(11) NOT NULL,
  `hero_id` int(11) DEFAULT NULL,
  `chapter_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `SecondaryObject.php`
--

CREATE TABLE `SecondaryObject` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `bonus_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `SecondaryObject.php`
--

INSERT INTO `SecondaryObject` (`id`, `item_id`, `bonus_type`) VALUES
(1, 1, 2),
(2, 2, 5),
(3, 4, 6),
(4, 5, 3);

-- --------------------------------------------------------

--
-- Structure de la table `Spell`
--

CREATE TABLE `Spell` (
  `id` int(11) NOT NULL,
  `nom` text DEFAULT NULL,
  `mana` int(11) NOT NULL,
  `damage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Spell`
--

INSERT INTO `Spell` (`id`, `nom`, `mana`, `damage`) VALUES
(1, 'Coup double', 5, 30),
(2, 'sphère d\'énergie', 15, 20),
(3, 'Souffle des abysses', 30, 30);

-- --------------------------------------------------------

--
-- Structure de la table `TypeBonus`
--

CREATE TABLE `TypeBonus` (
  `id` int(11) NOT NULL,
  `libelle` varchar(50) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `TypeBonus`
--

INSERT INTO `TypeBonus` (`id`, `libelle`, `description`) VALUES
(1, 'soin', 'redonne de la vie\r\n'),
(2, 'mana', 'redonne du mana'),
(3, 'puissance', 'redonne de la puissance\r\n'),
(4, 'courage', 'redonne du courage'),
(5, 'armure', 'redonne de l\'armure'),
(6, 'initiative', 'redonne de l\'initiative');

-- --------------------------------------------------------

--
-- Structure de la table `TypeEvent`
--

CREATE TABLE `TypeEvent` (
  `id` int(11) NOT NULL,
  `description` varchar(50) NOT NULL,
  `bonus_type_id` int(11) DEFAULT NULL,
  `malus_type_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `stat_event` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `TypeEvent`
--

INSERT INTO `TypeEvent` (`id`, `description`, `bonus_type_id`, `malus_type_id`, `item_id`, `stat_event`) VALUES
(1, 'Chute violente ', NULL, 1, NULL, 5),
(2, 'éviter la chute violente ', NULL, NULL, NULL, 0),
(3, 'Mort du joueur', NULL, NULL, NULL, NULL),
(4, 'bouclier du valeureux guerrier', 5, NULL, 2, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `TypeMalus`
--

CREATE TABLE `TypeMalus` (
  `id` int(11) NOT NULL,
  `libelle` varchar(50) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `TypeMalus`
--

INSERT INTO `TypeMalus` (`id`, `libelle`, `description`) VALUES
(1, 'soin', 'perd de la vie'),
(2, 'mana', 'perd du mana'),
(3, 'puissance', 'perd de la puissance'),
(4, 'courage', 'perd du courage'),
(5, 'armure', 'perd de l\'armure'),
(6, 'initiative', 'perd de l\'initiative');

-- --------------------------------------------------------

--
-- Structure de la table `User`
--

CREATE TABLE `User` (
  `id` int(11) NOT NULL,
  `nom` text NOT NULL,
  `mdp` text NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Weapons`
--

CREATE TABLE `Weapons` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `item_id` int(11) NOT NULL,
  `slot` int(11) NOT NULL,
  `stat_attaque` int(11) NOT NULL,
  `stat_bonus` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Weapons`
--

INSERT INTO `Weapons` (`id`, `name`, `item_id`, `slot`, `stat_attaque`, `stat_bonus`) VALUES
(1, 'Dague', 6, 1, 5, 2),
(2, 'Baton de savoir', 2, 1, 15, NULL),
(3, 'Epée du Guerrier', 3, 1, 7, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `ChapterProf`
--
ALTER TABLE `Chapter`
  ADD PRIMARY KEY (`id`),
  ADD KEY `treasure_id` (`treasure_id`);

--
-- Index pour la table `Class`
--
ALTER TABLE `Class`
  ADD PRIMARY KEY (`id`),
  ADD KEY `secondary_object_id` (`secondary_object_id`),
  ADD KEY `primary_weapon_default_id` (`primary_weapon_default_id`);

--
-- Index pour la table `Encounter`
--
ALTER TABLE `Encounter`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chapter_id` (`chapter_id`),
  ADD KEY `monster_id` (`monster_id`);

--
-- Index pour la table `Event`
--
ALTER TABLE `Event`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chapter_id` (`chapter_id`),
  ADD KEY `Event_ibfk_2` (`event_type_id`);

--
-- Index pour la table `Hero`
--
ALTER TABLE `Hero`
  ADD PRIMARY KEY (`id`),
  ADD KEY `primary_weapon` (`primary_weapon`),
  ADD KEY `spell_id` (`spell_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `class_id` (`class_id`);

--
-- Index pour la table `Inventory`
--
ALTER TABLE `Inventory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hero_id` (`hero_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Index pour la table `Items`
--
ALTER TABLE `Items`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Level`
--
ALTER TABLE `Level`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class_id` (`hero_id`);

--
-- Index pour la table `Links`
--
ALTER TABLE `Links`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chapter_id` (`chapter_id`),
  ADD KEY `next_chapter_id` (`next_chapter_id`);

--
-- Index pour la table `Monster`
--
ALTER TABLE `Monster`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loot_id` (`loot_id`);

--
-- Index pour la table `Quest`
--
ALTER TABLE `Quest`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hero_id` (`hero_id`),
  ADD KEY `chapter_id` (`chapter_id`);

--
-- Index pour la table `SecondaryObject.php`
--
ALTER TABLE `SecondaryObject`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `bonus_type` (`bonus_type`);

--
-- Index pour la table `Spell`
--
ALTER TABLE `Spell`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `TypeBonus`
--
ALTER TABLE `TypeBonus`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `TypeEvent`
--
ALTER TABLE `TypeEvent`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `bonus_type_id` (`bonus_type_id`),
  ADD KEY `malus_type_id` (`malus_type_id`);

--
-- Index pour la table `TypeMalus`
--
ALTER TABLE `TypeMalus`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Weapons`
--
ALTER TABLE `Weapons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Weapons_ibfk_1` (`item_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `ChapterProf`
--
ALTER TABLE `Chapter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `Class`
--
ALTER TABLE `Class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `Encounter`
--
ALTER TABLE `Encounter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `Event`
--
ALTER TABLE `Event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `Hero`
--
ALTER TABLE `Hero`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Inventory`
--
ALTER TABLE `Inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Items`
--
ALTER TABLE `Items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `Level`
--
ALTER TABLE `Level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Links`
--
ALTER TABLE `Links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `Monster`
--
ALTER TABLE `Monster`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `Quest`
--
ALTER TABLE `Quest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `SecondaryObject.php`
--
ALTER TABLE `SecondaryObject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `Spell`
--
ALTER TABLE `Spell`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `TypeBonus`
--
ALTER TABLE `TypeBonus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `TypeEvent`
--
ALTER TABLE `TypeEvent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `TypeMalus`
--
ALTER TABLE `TypeMalus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `User`
--
ALTER TABLE `User`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Weapons`
--
ALTER TABLE `Weapons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `ChapterProf`
--
ALTER TABLE `Chapter`
  ADD CONSTRAINT `Chapter_ibfk_1` FOREIGN KEY (`treasure_id`) REFERENCES `Items` (`id`);

--
-- Contraintes pour la table `Class`
--
ALTER TABLE `Class`
  ADD CONSTRAINT `Class_ibfk_1` FOREIGN KEY (`secondary_object_id`) REFERENCES `SecondaryObject` (`id`),
  ADD CONSTRAINT `Class_ibfk_2` FOREIGN KEY (`primary_weapon_default_id`) REFERENCES `Weapons` (`id`);

--
-- Contraintes pour la table `Encounter`
--
ALTER TABLE `Encounter`
  ADD CONSTRAINT `Encounter_ibfk_1` FOREIGN KEY (`chapter_id`) REFERENCES `Chapter` (`id`),
  ADD CONSTRAINT `Encounter_ibfk_2` FOREIGN KEY (`monster_id`) REFERENCES `Monster` (`id`);

--
-- Contraintes pour la table `Event`
--
ALTER TABLE `Event`
  ADD CONSTRAINT `Event_ibfk_1` FOREIGN KEY (`chapter_id`) REFERENCES `Chapter` (`id`),
  ADD CONSTRAINT `Event_ibfk_2` FOREIGN KEY (`event_type_id`) REFERENCES `TypeEvent` (`id`);

--
-- Contraintes pour la table `Hero`
--
ALTER TABLE `Hero`
  ADD CONSTRAINT `Hero_ibfk_1` FOREIGN KEY (`primary_weapon`) REFERENCES `Weapons` (`id`),
  ADD CONSTRAINT `Hero_ibfk_2` FOREIGN KEY (`spell_id`) REFERENCES `Spell` (`id`),
  ADD CONSTRAINT `Hero_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `User` (`id`),
  ADD CONSTRAINT `Hero_ibfk_4` FOREIGN KEY (`class_id`) REFERENCES `Class` (`id`);

--
-- Contraintes pour la table `Inventory`
--
ALTER TABLE `Inventory`
  ADD CONSTRAINT `Inventory_ibfk_1` FOREIGN KEY (`hero_id`) REFERENCES `Hero` (`id`),
  ADD CONSTRAINT `Inventory_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `Items` (`id`);

--
-- Contraintes pour la table `Level`
--
ALTER TABLE `Level`
  ADD CONSTRAINT `Level_ibfk_1` FOREIGN KEY (`hero_id`) REFERENCES `Hero` (`id`);

--
-- Contraintes pour la table `Links`
--
ALTER TABLE `Links`
  ADD CONSTRAINT `Links_ibfk_1` FOREIGN KEY (`chapter_id`) REFERENCES `Chapter` (`id`),
  ADD CONSTRAINT `Links_ibfk_2` FOREIGN KEY (`next_chapter_id`) REFERENCES `Chapter` (`id`);

--
-- Contraintes pour la table `Monster`
--
ALTER TABLE `Monster`
  ADD CONSTRAINT `Monster_ibfk_1` FOREIGN KEY (`loot_id`) REFERENCES `Items` (`id`);

--
-- Contraintes pour la table `Quest`
--
ALTER TABLE `Quest`
  ADD CONSTRAINT `Quest_ibfk_1` FOREIGN KEY (`hero_id`) REFERENCES `Hero` (`id`),
  ADD CONSTRAINT `Quest_ibfk_2` FOREIGN KEY (`chapter_id`) REFERENCES `Chapter` (`id`);

--
-- Contraintes pour la table `SecondaryObject.php`
--
ALTER TABLE `SecondaryObject`
  ADD CONSTRAINT `SecondaryObject_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `Items` (`id`),
  ADD CONSTRAINT `SecondaryObject_ibfk_2` FOREIGN KEY (`bonus_type`) REFERENCES `TypeBonus` (`id`);

--
-- Contraintes pour la table `TypeEvent`
--
ALTER TABLE `TypeEvent`
  ADD CONSTRAINT `TypeEvent_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `Items` (`id`),
  ADD CONSTRAINT `TypeEvent_ibfk_2` FOREIGN KEY (`bonus_type_id`) REFERENCES `TypeBonus` (`id`),
  ADD CONSTRAINT `TypeEvent_ibfk_3` FOREIGN KEY (`malus_type_id`) REFERENCES `TypeMalus` (`id`);

--
-- Contraintes pour la table `Weapons`
--
ALTER TABLE `Weapons`
  ADD CONSTRAINT `Weapons_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `TypeBonus` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
