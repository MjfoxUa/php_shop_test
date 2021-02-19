CREATE TABLE `shop`.`products` (
 `id` INT(10) NOT NULL AUTO_INCREMENT ,
  `category` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
 `name` VARCHAR(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
 `sku` VARCHAR(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
 `price` FLOAT(50) NOT NULL ,
 `image` VARCHAR(100) NOT NULL ,
 `description` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
 `create_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
 `update_at` TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
 PRIMARY KEY (`id`)) ENGINE = InnoDB;
CREATE TABLE `category` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `name` varchar(250) CHARACTER SET utf8 NOT NULL,
 `url` varchar(250) CHARACTER SET utf8 NOT NULL,
 PRIMARY KEY (`id`)) ENGINE=InnoDB;
CREATE TABLE IF NOT EXISTS `accounts` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `username` varchar(50) NOT NULL,
    `password` varchar(255) NOT NULL,
    `email` varchar(100) NOT NULL,
    PRIMARY KEY (`id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `accounts` (`id`, `username`, `password`, `email`) VALUES (1, 'root', '$2y$10$kfoKQpYw2ncRvwqmPxH/F.5hNSm/I254j/KRYetwiU1lcjZQqe7ai', 'root@root.com');