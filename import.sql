DROP DATABASE IF EXISTS `WFlootcalc`;

CREATE DATABASE `WFlootcalc`;

USE `WFlootcalc`;

CREATE TABLE `WFlootcalc`.`faction` (
    `id` INT NOT NULL AUTO_INCREMENT,	
    `name` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`)
);

CREATE TABLE `WFlootcalc`.`enemy` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `stats` VARCHAR(255) NOT NULL,
    `faction_id` INT NOT NULL,
    PRIMARY KEY (`id`),
    Foreign Key (`faction_id`) REFERENCES `faction`(`id`)
);

CREATE TABLE `WFlootcalc`.`loot` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `description` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`)
);

CREATE TABLE `WFlootcalc`.`enemy-loot` (
    `enemy_id` INT NOT NULL,
    `loot_id` INT NOT NULL,
    `chance` INT NOT NULL,
    `amount` INT NOT NULL,
    PRIMARY KEY (`enemy_id`, `loot_id`),
    Foreign Key (`enemy_id`) REFERENCES `enemy`(`id`),	
    Foreign Key (`loot_id`) REFERENCES `loot`(`id`)
);


INSERT INTO `WFlootcalc`.`faction` (`name`) VALUES ('Grineer');
INSERT INTO `WFlootcalc`.`faction` (`name`) VALUES ('Corpus');
INSERT INTO `WFlootcalc`.`faction` (`name`) VALUES ('Infested');

INSERT INTO `WFlootcalc`.`loot` (`name`, `description`) VALUES ('Oxium', 'Oxium is a rare lighter than air alloy of Orokin origin, used in certain Corpus Robotics.');
INSERT INTO `WFlootcalc`.`loot` (`name`, `description`) VALUES ('Plastids', 'A disgusting nanite-infested tissue mass.');
INSERT INTO `WFlootcalc`.`loot` (`name`, `description`) VALUES ('Mutagen Mass', 'This living mass can produce weaponized toxins for weaponry.');
INSERT INTO `WFlootcalc`.`loot` (`name`, `description`) VALUES ('Nano Spores', 'Fibrous technocyte tumor. Handle Infested tissue with caution.');
INSERT INTO `WFlootcalc`.`loot` (`name`, `description`) VALUES ('Circuits', 'Various electronic components.');
INSERT INTO `WFlootcalc`.`loot` (`name`, `description`) VALUES ('Alloy Plate', 'Carbon steel plates used to reinforce Grineer armor.');
INSERT INTO `WFlootcalc`.`loot` (`name`, `description`) VALUES ('Ferrite', 'Alloy pellets used in Grineer manufacturing.');
INSERT INTO `WFlootcalc`.`loot` (`name`, `description`) VALUES ('Salvage', 'High value metals collected from war salvage.');
INSERT INTO `WFlootcalc`.`loot` (`name`, `description`) VALUES ('Detonite Injector', 'Detonite injectors are the basis for explosive and incendiary weapons.');
INSERT INTO `WFlootcalc`.`loot` (`name`, `description`) VALUES ('Control Module', 'Autonomy processor for Robotics. A Corpus design.');
INSERT INTO `WFlootcalc`.`loot` (`name`, `description`) VALUES ('Fieldron', 'ClanTech weaponized containment field to contain superheated substances.');
INSERT INTO `WFlootcalc`.`loot` (`name`, `description`) VALUES ('Polymer Bundle', 'A hard, thermoplastic casing. Manufactured by Corpus.');

INSERT INTO `WFlootcalc`.`enemy` (`name`, `stats`, `faction_id`) VALUES ('Grineer lancer', 'stats 1', 1);
INSERT INTO `WFlootcalc`.`enemy` (`name`, `stats`, `faction_id`) VALUES ('Grineer trooper', 'stats 10', 1);
INSERT INTO `WFlootcalc`.`enemy` (`name`, `stats`, `faction_id`) VALUES ('Grineer heavy gunner', 'stats 100', 1);

INSERT INTO `WFlootcalc`.`enemy` (`name`, `stats`, `faction_id`) VALUES ('Corpus crewman', 'stats 1', 2);
INSERT INTO `WFlootcalc`.`enemy` (`name`, `stats`, `faction_id`) VALUES ('Corpus machinist', 'stats 10', 2);
INSERT INTO `WFlootcalc`.`enemy` (`name`, `stats`, `faction_id`) VALUES ('Corpus elite crewman', 'stats 100', 2);

INSERT INTO `WFlootcalc`.`enemy` (`name`, `stats`, `faction_id`) VALUES ('Infested charger', 'stats 1', 3);
INSERT INTO `WFlootcalc`.`enemy` (`name`, `stats`, `faction_id`) VALUES ('Infested ancient disruptor', 'stats 10', 3);
INSERT INTO `WFlootcalc`.`enemy` (`name`, `stats`, `faction_id`) VALUES ('Infested juggernaut', 'stats 100', 3);

INSERT INTO `WFlootcalc`.`enemy-loot` (`enemy_id`, `loot_id`, `chance`, `amount`) VALUES (1, 8, 23, 2);
INSERT INTO `WFlootcalc`.`enemy-loot` (`enemy_id`, `loot_id`, `chance`, `amount`) VALUES (2, 8, 23, 2);
INSERT INTO `WFlootcalc`.`enemy-loot` (`enemy_id`, `loot_id`, `chance`, `amount`) VALUES (3, 8, 23, 2);
INSERT INTO `WFlootcalc`.`enemy-loot` (`enemy_id`, `loot_id`, `chance`, `amount`) VALUES (4, 11, 100, 10);
INSERT INTO `WFlootcalc`.`enemy-loot` (`enemy_id`, `loot_id`, `chance`, `amount`) VALUES (5, 11, 100, 10);
INSERT INTO `WFlootcalc`.`enemy-loot` (`enemy_id`, `loot_id`, `chance`, `amount`) VALUES (6, 11, 100, 10);
INSERT INTO `WFlootcalc`.`enemy-loot` (`enemy_id`, `loot_id`, `chance`, `amount`) VALUES (7, 3, 50, 1);
INSERT INTO `WFlootcalc`.`enemy-loot` (`enemy_id`, `loot_id`, `chance`, `amount`) VALUES (8, 3, 50, 1);
INSERT INTO `WFlootcalc`.`enemy-loot` (`enemy_id`, `loot_id`, `chance`, `amount`) VALUES (9, 3, 50, 1);

SELECT `faction`.name as 'faction', `enemy`.name as 'enemy', `loot`.name as 'loot', `enemy-loot`.chance, `enemy-loot`.amount
FROM `WFlootcalc`.`faction`
INNER JOIN `WFlootcalc`.`enemy` ON `faction`.`id` = `enemy`.`faction_id`
INNER JOIN `WFlootcalc`.`enemy-loot` ON `enemy`.`id` = `enemy-loot`.`enemy_id`
INNER JOIN `WFlootcalc`.`loot` ON `enemy-loot`.`loot_id` = `loot`.`id`;