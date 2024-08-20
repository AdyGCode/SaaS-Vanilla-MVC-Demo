-- Create the \SaaS Vanilla MVC' database & User
CREATE USER IF NOT EXISTS 'xxx_saas_vanilla_mvc'@'127.0.0.1' IDENTIFIED WITH mysql_native_password BY 'PasswordSecret';
GRANT USAGE ON *.* TO 'xxx_saas_vanilla_mvc'@'127.0.0.1';
ALTER USER 'xxx_saas_vanilla_mvc'@'127.0.0.1' REQUIRE NONE WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;

CREATE DATABASE IF NOT EXISTS `xxx_saas_vanilla_mvc`;
GRANT ALL PRIVILEGES ON `xxx\_saas\_vanilla\_mvc`.* TO 'xxx_saas_vanilla_mvc'@'127.0.0.1';

USE xxx_saas_vanilla_mvc;

DROP TABLE IF EXISTS `users`;

-- Table structure for 'users' table
CREATE TABLE IF NOT EXISTS `users`
(
    `id`         int          NOT NULL AUTO_INCREMENT,
    `name`       varchar(255)      DEFAULT NULL,
    `email`      varchar(255) NOT NULL,
    `password`   varchar(255) NOT NULL,
    `city`       varchar(45)       DEFAULT NULL,
    `state`      varchar(45)       DEFAULT NULL,
    `created_at` timestamp    NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 7
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_0900_ai_ci;

-- Insert data into 'users' table
INSERT INTO `users`
VALUES (1, 'John Doe', 'user1@example.com',
        '$2y$10$UkdJDaWLRHPVwOu3lb9XW.FZWZmFaLM0BJbaj0/7dvPIqs7sdDlvK',
        'Boston', 'MA', '2023-11-18 13:55:59'),
       (2, 'Jane Doe', 'user2@example.com',
        '$2y$10$UkdJDaWLRHPVwOu3lb9XW.FZWZmFaLM0BJbaj0/7dvPIqs7sdDlvK',
        'San Francisco', 'CA', '2023-11-18 13:58:26'),
       (3, 'Steve Smith', 'user3@example.com',
        '$2y$10$UkdJDaWLRHPVwOu3lb9XW.FZWZmFaLM0BJbaj0/7dvPIqs7sdDlvK',
        'Chicago', 'IL', '2023-11-18 13:59:13');

DROP TABLE IF EXISTS `products`;

-- Table structure for 'products' table
CREATE TABLE IF NOT EXISTS `products`
(
    `id`          int          NOT NULL AUTO_INCREMENT,
    `name`        varchar(255) NOT NULL,
    `description` text,
    `price`       int               DEFAULT NULL,
    `created_at`  timestamp    NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 21
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_0900_ai_ci;

-- Insert data into 'listings' table
INSERT INTO `products`(`id`, `name`, `description`, `price`, `created_at`)
VALUES (40380, 'Sheep BrickHeadz',
        'BrickHeadz theme: This set features an adorable sheep with a cute, blocky design, perfect for collectors and fans of the BrickHeadz series.',
        1999, '2020-01-01'),
       (75224, 'Sith Infiltrator Microfighter',
        'Star Wars theme: A mini version of Darth Maul\'s Sith Infiltrator, part of the LEGO Star Wars Microfighters series, great for Star Wars enthusiasts.',
        1599, '2019-01-01'),
       (75223, 'Naboo Starfighter Microfighter',
        'Star Wars theme: A compact, easy-to-build model of the Naboo Starfighter, perfect for young Star Wars fans.',
        1599, '2019-01-01'),
       (75228, 'Escape Pod vs. Dewback Microfighters',
        'Star Wars theme: This set features a Dewback and an Escape Pod, each with a mini-figure from the Star Wars saga, perfect for imaginative play.',
        2999, '2019-01-01'),
       (75317, 'The Mandalorian & The Child BrickHeadz',
        'Star Wars theme: A BrickHeadz double pack featuring The Mandalorian and The Child (Baby Yoda), perfect for fans of the popular Star Wars series.',
        2999, '2020-08-01'),
       (40379, 'Valentine\s Bear',
        'BrickHeadz theme: A seasonal BrickHeadz set featuring a charming Valentine\s Bear holding a heart, ideal for Valentine\s Day.',
        1999, '2020-01-01'),
       (40354, 'Dragon Dance',
        'Seasonal theme: This Chinese New Year-themed set features a vibrant and detailed dragon dance scene, complete with minifigures and traditional decorations.',
        8999, '2019-01-01'),
       (40440, 'German Shepherd',
        'BrickHeadz theme: A BrickHeadz pet set featuring a cute German Shepherd and puppy, great for dog lovers.',
        1999, '2021-01-01'),
       (21108, 'Ghostbusters Ecto-1',
        'Ideas theme: A LEGO Ideas set featuring the iconic Ecto-1 car from the Ghostbusters movies, complete with minifigures of the Ghostbusters team.',
        7999, '2014-06-01'),
       (10226, 'Sopwith Camel',
        'Creator Expert theme: A detailed model of the Sopwith Camel biplane, part of the LEGO Creator Expert series, perfect for aviation enthusiasts.',
        13999, '2012-06-01'),
       (6907, 'Cosmic Cruiser',
        'Space theme: A classic LEGO Space set featuring a detailed cosmic cruiser spacecraft, part of the Futuron sub-theme.',
        2999, '1987-01-01'),
       (6086, 'Black Knight\s Castle',
        'Castle theme: A large, fortified castle set from the LEGO Castle theme, complete with knights, horses, and secret passages.',
        10999, '1992-01-01'),
       (6990, 'Monorail Transport System',
        'Space theme: A futuristic monorail system set, part of the LEGO Space theme, featuring a full track, stations, and space-themed vehicles.',
        14999, '1987-01-01'),
       (6875, 'Spy Trak 1',
        'Space theme: A classic set from the LEGO Space theme, featuring a high-tech, mobile spying unit with various play features.',
        1999, '1988-01-01'),
       (885, 'Space Scooter',
        'Space theme: A small, classic LEGO Space set featuring a simple yet iconic space scooter vehicle.', 999,
        '1979-01-01');


