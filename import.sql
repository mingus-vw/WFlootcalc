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

CREATE TABLE `WFlootcalc`.`enemy_loot` (
    `enemy_id` INT NOT NULL,
    `loot_id` INT NOT NULL,
    `chance` INT NOT NULL,
    `amount` INT NOT NULL,
    PRIMARY KEY (`enemy_id`, `loot_id`),
    Foreign Key (`enemy_id`) REFERENCES `enemy`(`id`),	
    Foreign Key (`loot_id`) REFERENCES `loot`(`id`)
);

ALTER TABLE enemy ADD COLUMN is_favored BOOLEAN DEFAULT FALSE;

INSERT INTO `WFlootcalc`.`faction` (`name`) VALUES ('Grineer');
INSERT INTO `WFlootcalc`.`faction` (`name`) VALUES ('Corpus');
INSERT INTO `WFlootcalc`.`faction` (`name`) VALUES ('Infested');
INSERT INTO `WFlootcalc`.`faction` (`name`) VALUES ('Tenno');
INSERT INTO `WFlootcalc`.`faction` (`name`) VALUES ('Orokin');
INSERT INTO `WFlootcalc`.`faction` (`name`) VALUES ('Sentient');
INSERT INTO `WFlootcalc`.`faction` (`name`) VALUES ('Narmer');
INSERT INTO `WFlootcalc`.`faction` (`name`) VALUES ('Murmur');
INSERT INTO `WFlootcalc`.`faction` (`name`) VALUES ('Stalker');
INSERT INTO `WFlootcalc`.`faction` (`name`) VALUES ('Wild');
INSERT INTO `WFlootcalc`.`faction` (`name`) VALUES ('Syndicates');

INSERT INTO `WFlootcalc`.`loot` (`name`, `description`) VALUES ('Ferrite', 'Alloy pellets used in Grineer manufacturing.');
INSERT INTO `WFlootcalc`.`loot` (`name`, `description`) VALUES ('Polymer Bundle', 'A hard, thermoplastic casing. Manufactured by Corpus.');
INSERT INTO `WFlootcalc`.`loot` (`name`, `description`) VALUES ('Detonite Ampule', 'Researching the Detonite traces within could advance our weapon technology.');
INSERT INTO `WFlootcalc`.`loot` (`name`, `description`) VALUES ('Alloy Plate', 'Carbon steel plates used to reinforce Grineer armor.');
INSERT INTO `WFlootcalc`.`loot` (`name`, `description`) VALUES ('Circuits', 'Various electronic components.');
INSERT INTO `WFlootcalc`.`loot` (`name`, `description`) VALUES ('Rubedo', 'A jagged crystalline ore. Gives off radiant energy.');
INSERT INTO `WFlootcalc`.`loot` (`name`, `description`) VALUES ('Neurodes', 'Biotech sensor organ harvested from Infested entities.');
INSERT INTO `WFlootcalc`.`loot` (`name`, `description`) VALUES ('Nano Spores', 'Fibrous technocyte tumor. Handle Infested tissue with caution.');
INSERT INTO `WFlootcalc`.`loot` (`name`, `description`) VALUES ('Mutagen Sample', 'These samples could advance our knowledge of biological research.');
INSERT INTO `WFlootcalc`.`loot` (`name`, `description`) VALUES ('Orokin Cell', 'Ancient energy cell from the Orokin era.');
INSERT INTO `WFlootcalc`.`loot` (`name`, `description`) VALUES ('Fieldron Sample', 'This destroyed FIELDRON could further research into super-heated containment fields.');
INSERT INTO `WFlootcalc`.`loot` (`name`, `description`) VALUES ('Pulsating Tubercles', 'Drop from juggernaut.');
INSERT INTO `WFlootcalc`.`loot` (`name`, `description`) VALUES ('Infected Palpators', 'Drop from juggernaut.');
INSERT INTO `WFlootcalc`.`loot` (`name`, `description`) VALUES ('Chitinous Husk', 'Drop from juggernaut.');
INSERT INTO `WFlootcalc`.`loot` (`name`, `description`) VALUES ('Servered Bile Sac', 'Drop from juggernaut.');

INSERT INTO `WFlootcalc`.`enemy` (`name`, `stats`, `faction_id`) VALUES ('Grineer lancer', 'stats 133', 1);
INSERT INTO `WFlootcalc`.`enemy` (`name`, `stats`, `faction_id`) VALUES ('Grineer trooper', 'stats 180', 1);
INSERT INTO `WFlootcalc`.`enemy` (`name`, `stats`, `faction_id`) VALUES ('Grineer heavy gunner', 'stats 800', 1);
INSERT INTO `WFlootcalc`.`enemy` (`name`, `stats`, `faction_id`) VALUES ('Corpus shield osprey', 'stats 85', 2);
INSERT INTO `WFlootcalc`.`enemy` (`name`, `stats`, `faction_id`) VALUES ('Corpus crewman', 'stats 210', 2);
INSERT INTO `WFlootcalc`.`enemy` (`name`, `stats`, `faction_id`) VALUES ('Corpus tech', 'stats 950', 2);
INSERT INTO `WFlootcalc`.`enemy` (`name`, `stats`, `faction_id`) VALUES ('Infested charger', 'stats 80', 3);
INSERT INTO `WFlootcalc`.`enemy` (`name`, `stats`, `faction_id`) VALUES ('Infested ancient disruptor', 'stats 400', 3);
INSERT INTO `WFlootcalc`.`enemy` (`name`, `stats`, `faction_id`) VALUES ('Infested juggernaut', 'stats 5833', 3);

INSERT INTO `WFlootcalc`.`enemy_loot` (`enemy_id`, `loot_id`, `chance`, `amount`) VALUES (1, 1, 7, 50);
INSERT INTO `WFlootcalc`.`enemy_loot` (`enemy_id`, `loot_id`, `chance`, `amount`) VALUES (1, 3, 7, 1);
INSERT INTO `WFlootcalc`.`enemy_loot` (`enemy_id`, `loot_id`, `chance`, `amount`) VALUES (1, 6, 7, 15);
INSERT INTO `WFlootcalc`.`enemy_loot` (`enemy_id`, `loot_id`, `chance`, `amount`) VALUES (1, 7, 1, 1);
INSERT INTO `WFlootcalc`.`enemy_loot` (`enemy_id`, `loot_id`, `chance`, `amount`) VALUES (2, 1, 7, 50);
INSERT INTO `WFlootcalc`.`enemy_loot` (`enemy_id`, `loot_id`, `chance`, `amount`) VALUES (2, 3, 7, 1);
INSERT INTO `WFlootcalc`.`enemy_loot` (`enemy_id`, `loot_id`, `chance`, `amount`) VALUES (2, 6, 7, 15);
INSERT INTO `WFlootcalc`.`enemy_loot` (`enemy_id`, `loot_id`, `chance`, `amount`) VALUES (2, 7, 1, 1);
INSERT INTO `WFlootcalc`.`enemy_loot` (`enemy_id`, `loot_id`, `chance`, `amount`) VALUES (3, 1, 7, 50);
INSERT INTO `WFlootcalc`.`enemy_loot` (`enemy_id`, `loot_id`, `chance`, `amount`) VALUES (3, 3, 7, 1);
INSERT INTO `WFlootcalc`.`enemy_loot` (`enemy_id`, `loot_id`, `chance`, `amount`) VALUES (3, 6, 7, 15);
INSERT INTO `WFlootcalc`.`enemy_loot` (`enemy_id`, `loot_id`, `chance`, `amount`) VALUES (3, 7, 1, 1);
INSERT INTO `WFlootcalc`.`enemy_loot` (`enemy_id`, `loot_id`, `chance`, `amount`) VALUES (4, 2, 7, 40);
INSERT INTO `WFlootcalc`.`enemy_loot` (`enemy_id`, `loot_id`, `chance`, `amount`) VALUES (4, 4, 7, 50);
INSERT INTO `WFlootcalc`.`enemy_loot` (`enemy_id`, `loot_id`, `chance`, `amount`) VALUES (4, 5, 7, 35);
INSERT INTO `WFlootcalc`.`enemy_loot` (`enemy_id`, `loot_id`, `chance`, `amount`) VALUES (4, 11, 1, 1);
INSERT INTO `WFlootcalc`.`enemy_loot` (`enemy_id`, `loot_id`, `chance`, `amount`) VALUES (5, 2, 7, 40);
INSERT INTO `WFlootcalc`.`enemy_loot` (`enemy_id`, `loot_id`, `chance`, `amount`) VALUES (5, 4, 7, 50);
INSERT INTO `WFlootcalc`.`enemy_loot` (`enemy_id`, `loot_id`, `chance`, `amount`) VALUES (5, 5, 7, 35);
INSERT INTO `WFlootcalc`.`enemy_loot` (`enemy_id`, `loot_id`, `chance`, `amount`) VALUES (5, 11, 1, 1);
INSERT INTO `WFlootcalc`.`enemy_loot` (`enemy_id`, `loot_id`, `chance`, `amount`) VALUES (6, 2, 7, 40);
INSERT INTO `WFlootcalc`.`enemy_loot` (`enemy_id`, `loot_id`, `chance`, `amount`) VALUES (6, 4, 7, 50);
INSERT INTO `WFlootcalc`.`enemy_loot` (`enemy_id`, `loot_id`, `chance`, `amount`) VALUES (6, 5, 7, 35);
INSERT INTO `WFlootcalc`.`enemy_loot` (`enemy_id`, `loot_id`, `chance`, `amount`) VALUES (6, 11, 1, 1);
INSERT INTO `WFlootcalc`.`enemy_loot` (`enemy_id`, `loot_id`, `chance`, `amount`) VALUES (7, 7, 1, 1);
INSERT INTO `WFlootcalc`.`enemy_loot` (`enemy_id`, `loot_id`, `chance`, `amount`) VALUES (7, 8, 7, 150);
INSERT INTO `WFlootcalc`.`enemy_loot` (`enemy_id`, `loot_id`, `chance`, `amount`) VALUES (7, 9, 1, 1);
INSERT INTO `WFlootcalc`.`enemy_loot` (`enemy_id`, `loot_id`, `chance`, `amount`) VALUES (7, 10, 1, 1);
INSERT INTO `WFlootcalc`.`enemy_loot` (`enemy_id`, `loot_id`, `chance`, `amount`) VALUES (8, 7, 1, 1);
INSERT INTO `WFlootcalc`.`enemy_loot` (`enemy_id`, `loot_id`, `chance`, `amount`) VALUES (8, 8, 7, 150);
INSERT INTO `WFlootcalc`.`enemy_loot` (`enemy_id`, `loot_id`, `chance`, `amount`) VALUES (8, 9, 1, 1);
INSERT INTO `WFlootcalc`.`enemy_loot` (`enemy_id`, `loot_id`, `chance`, `amount`) VALUES (8, 10, 1, 1);
INSERT INTO `WFlootcalc`.`enemy_loot` (`enemy_id`, `loot_id`, `chance`, `amount`) VALUES (9, 12, 25, 1);
INSERT INTO `WFlootcalc`.`enemy_loot` (`enemy_id`, `loot_id`, `chance`, `amount`) VALUES (9, 13, 25, 1);
INSERT INTO `WFlootcalc`.`enemy_loot` (`enemy_id`, `loot_id`, `chance`, `amount`) VALUES (9, 14, 25, 1);
INSERT INTO `WFlootcalc`.`enemy_loot` (`enemy_id`, `loot_id`, `chance`, `amount`) VALUES (9, 15, 25, 1);

SELECT `faction`.name as 'faction', `enemy`.name as 'enemy', `loot`.name as 'loot', `enemy_loot`.chance, `enemy_loot`.amount
FROM `WFlootcalc`.`faction`
INNER JOIN `WFlootcalc`.`enemy` ON `faction`.`id` = `enemy`.`faction_id`
INNER JOIN `WFlootcalc`.`enemy_loot` ON `enemy`.`id` = `enemy_loot`.`enemy_id`
INNER JOIN `WFlootcalc`.`loot` ON `enemy_loot`.`loot_id` = `loot`.`id`;

CREATE TABLE IF NOT EXISTS `accounts` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
  	`username` varchar(50) NOT NULL,
  	`password` varchar(255) NOT NULL,
  	`email` varchar(100) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `accounts` (`id`, `username`, `password`, `email`) VALUES (1, 'test', '$2y$10$SfhYIDtn.iOuCW7zfoFLuuZHX6lja4lF4XA4JqNmpiH/.P3zB8JCa', 'test@test.com');

127.0.0.1/wflootcalc/		http://localhost/phpmyadmin/index.php?route=/database/sql&db=wflootcalc

   Weergave van records 0 - 119 (120 totaal, Query duurde 0,4174 seconden.)


SELECT 'mysql' dbms,t.TABLE_SCHEMA,t.TABLE_NAME,c.COLUMN_NAME,c.ORDINAL_POSITION,c.DATA_TYPE,c.CHARACTER_MAXIMUM_LENGTH,n.CONSTRAINT_TYPE,k.REFERENCED_TABLE_SCHEMA,k.REFERENCED_TABLE_NAME,k.REFERENCED_COLUMN_NAME FROM INFORMATION_SCHEMA.TABLES t LEFT JOIN INFORMATION_SCHEMA.COLUMNS c ON t.TABLE_SCHEMA=c.TABLE_SCHEMA AND t.TABLE_NAME=c.TABLE_NAME LEFT JOIN INFORMATION_SCHEMA.KEY_COLUMN_USAGE k ON c.TABLE_SCHEMA=k.TABLE_SCHEMA AND c.TABLE_NAME=k.TABLE_NAME AND c.COLUMN_NAME=k.COLUMN_NAME LEFT JOIN INFORMATION_SCHEMA.TABLE_CONSTRAINTS n ON k.CONSTRAINT_SCHEMA=n.CONSTRAINT_SCHEMA AND k.CONSTRAINT_NAME=n.CONSTRAINT_NAME AND k.TABLE_SCHEMA=n.TABLE_SCHEMA AND k.TABLE_NAME=n.TABLE_NAME WHERE t.TABLE_TYPE='BASE TABLE' AND t.TABLE_SCHEMA NOT IN('INFORMATION_SCHEMA','mysql','performance_schema');


dbms	TABLE_SCHEMA	TABLE_NAME	COLUMN_NAME	ORDINAL_POSITION	DATA_TYPE	CHARACTER_MAXIMUM_LENGTH	CONSTRAINT_TYPE	REFERENCED_TABLE_SCHEMA	REFERENCED_TABLE_NAME	REFERENCED_COLUMN_NAME	
mysql	wflootcalc	enemy	id	1	int	NULL	PRIMARY KEY	NULL	NULL	NULL	
mysql	wflootcalc	enemy	faction_id	4	int	NULL	FOREIGN KEY	wflootcalc	faction	id	
mysql	wflootcalc	enemy_loot	enemy_id	1	int	NULL	PRIMARY KEY	NULL	NULL	NULL	
mysql	wflootcalc	enemy_loot	loot_id	2	int	NULL	PRIMARY KEY	NULL	NULL	NULL	
mysql	wflootcalc	enemy_loot	enemy_id	1	int	NULL	FOREIGN KEY	wflootcalc	enemy	id	
mysql	wflootcalc	enemy_loot	loot_id	2	int	NULL	FOREIGN KEY	wflootcalc	loot	id		
mysql	wflootcalc	enemy	name	2	varchar	255	NULL	NULL	NULL	NULL	
mysql	wflootcalc	enemy	stats	3	varchar	255	NULL	NULL	NULL	NULL	
mysql	wflootcalc	faction	id	1	int	NULL	PRIMARY KEY	NULL	NULL	NULL	
mysql	wflootcalc	loot	id	1	int	NULL	PRIMARY KEY	NULL	NULL	NULL	
mysql	wflootcalc	enemy_loot	chance	3	int	NULL	NULL	NULL	NULL	NULL	
mysql	wflootcalc	enemy_loot	amount	4	int	NULL	NULL	NULL	NULL	NULL	
mysql	wflootcalc	faction	name	2	varchar	255	NULL	NULL	NULL	NULL	
mysql	wflootcalc	loot	name	2	varchar	255	NULL	NULL	NULL	NULL	
mysql	wflootcalc	loot	description	3	varchar	255	NULL	NULL	NULL	NULL	
