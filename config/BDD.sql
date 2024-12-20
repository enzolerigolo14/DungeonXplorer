CREATE TABLE `Class` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `name` VARCHAR(50) NOT NULL,
  `description` TEXT,
  `base_pv` INT NOT NULL,
  `base_mana` INT NOT NULL,
  `base_armor` INT NOT NULL,
  `strength` INT NOT NULL,
  `initiative` INT NOT NULL,
  `max_items` INT NOT NULL,
  `primary_weapon_default` text,
  `secondary_weapon_default` text
);

CREATE TABLE `Items` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `name` VARCHAR(50) NOT NULL,
  `description` TEXT
);

CREATE TABLE `Loot` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `name` VARCHAR(50) NOT NULL,
  `item_id` INT,
  `quantity` INT NOT NULL
);

CREATE TABLE `Treasure` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `name` VARCHAR(50) NOT NULL,
  `item_id` INT,
  `quantity` INT NOT NULL
);

CREATE TABLE `Monster` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `name` VARCHAR(50) NOT NULL,
  `pv` INT NOT NULL,
  `mana` INT,
  `initiative` INT NOT NULL,
  `strength` INT NOT NULL,
  `attack` TEXT,
  `loot_id` INT,
  `xp` INT NOT NULL,
  `armor` INT
  
);

CREATE TABLE `Hero` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `name` VARCHAR(50) NOT NULL,
  `class_id` INT,
  `user_id` INT,
  `image` VARCHAR(255),
  `biography` TEXT,
  `pv` INT NOT NULL,
  `mana` INT NOT NULL,
  `strength` INT NOT NULL,
  `initiative` INT NOT NULL,
  `armor` VARCHAR(50),
  `primary_weapon` VARCHAR(50),
  `secondary_weapon` VARCHAR(50),
  `spell_id` int,
  `xp` INT NOT NULL,
  `current_level` INT DEFAULT 1
);

CREATE TABLE `Level` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `class_id` INT,
  `class_id` INT,
  `level` INT NOT NULL,
  `required_xp` INT NOT NULL,
  `pv_bonus` INT NOT NULL,
  `mana_bonus` INT NOT NULL,
  `strength_bonus` INT NOT NULL,
  `initiative_bonus` INT NOT NULL
);

CREATE TABLE `Chapter` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `content` TEXT NOT NULL,
  `image` VARCHAR(255),
  `treasure_id` INT
);

CREATE TABLE `Encounter` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `chapter_id` INT,
  `monster_id` INT
);

CREATE TABLE `Inventory` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `hero_id` INT,
  `item_id` INT
);

CREATE TABLE `Links` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `chapter_id` INT,
  `next_chapter_id` INT,
  `description` TEXT
);

CREATE TABLE `Chapter_Treasure` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `chapter_id` INT,
  `item_id` INT
);

CREATE TABLE `Quest` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `hero_id` INT,
  `chapter_id` INT
);

CREATE TABLE `User` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `nom` text NOT NULL,
  `mdp` text NOT NULL,
  `admin` bool NOT NULL
);

CREATE TABLE `Spell` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `nom` text,
  `mana` int NOT NULL
);

CREATE TABLE `Weapons` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name` text NOT NULL,
  `item_id` int NOT NULL,
  `slot` int NOT NULL,
  `stat_attaque` int NOT NULL,
  `stat_bonus` int NOT NULL
);

ALTER TABLE `Class` ADD FOREIGN KEY (`secondary_weapon_default`) REFERENCES `Weapons` (`id`);

ALTER TABLE `Class` ADD FOREIGN KEY (`primary_weapon_default`) REFERENCES `Weapons` (`id`);

ALTER TABLE `Hero` ADD FOREIGN KEY (`secondary_weapon`) REFERENCES `Weapons` (`id`);

ALTER TABLE `Hero` ADD FOREIGN KEY (`primary_weapon`) REFERENCES `Weapons` (`id`);

ALTER TABLE `Weapons` ADD FOREIGN KEY (`item_id`) REFERENCES `Items` (`id`);

ALTER TABLE `Hero` ADD FOREIGN KEY (`spell_id`) REFERENCES `Spell` (`id`);

ALTER TABLE `Hero` ADD FOREIGN KEY (`user_id`) REFERENCES `User` (`id`);

ALTER TABLE `Loot` ADD FOREIGN KEY (`item_id`) REFERENCES `Items` (`id`);

ALTER TABLE `Treasure` ADD FOREIGN KEY (`item_id`) REFERENCES `Items` (`id`);

ALTER TABLE `Monster` ADD FOREIGN KEY (`loot_id`) REFERENCES `Loot` (`id`);

ALTER TABLE `Hero` ADD FOREIGN KEY (`class_id`) REFERENCES `Class` (`id`);

ALTER TABLE `Level` ADD FOREIGN KEY (`class_id`) REFERENCES `Class` (`id`);

ALTER TABLE `Chapter` ADD FOREIGN KEY (`treasure_id`) REFERENCES `Treasure` (`id`);

ALTER TABLE `Encounter` ADD FOREIGN KEY (`chapter_id`) REFERENCES `Chapter` (`id`);

ALTER TABLE `Encounter` ADD FOREIGN KEY (`monster_id`) REFERENCES `Monster` (`id`);

ALTER TABLE `Inventory` ADD FOREIGN KEY (`hero_id`) REFERENCES `Hero` (`id`);

ALTER TABLE `Inventory` ADD FOREIGN KEY (`item_id`) REFERENCES `Items` (`id`);

ALTER TABLE `Links` ADD FOREIGN KEY (`chapter_id`) REFERENCES `Chapter` (`id`);

ALTER TABLE `Links` ADD FOREIGN KEY (`next_chapter_id`) REFERENCES `Chapter` (`id`);

ALTER TABLE `Chapter_Treasure` ADD FOREIGN KEY (`chapter_id`) REFERENCES `Chapter` (`id`);

ALTER TABLE `Chapter_Treasure` ADD FOREIGN KEY (`item_id`) REFERENCES `Items` (`id`);

ALTER TABLE `Quest` ADD FOREIGN KEY (`hero_id`) REFERENCES `Hero` (`id`);

ALTER TABLE `Quest` ADD FOREIGN KEY (`chapter_id`) REFERENCES `Chapter` (`id`);
