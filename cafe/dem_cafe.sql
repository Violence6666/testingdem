CREATE TABLE `users` (
	`id_user` INT(11) NOT NULL AUTO_INCREMENT,
	`role` INT(1) NOT NULL,
	`status` varchar(255) NOT NULL,
	`name` varchar(255) NOT NULL,
	`surname` varchar(255) NOT NULL,
	PRIMARY KEY (`id_user`)
);

CREATE TABLE `shift` (
	`id_shift` INT(11) NOT NULL AUTO_INCREMENT,
	`id_user_shift` INT(11) NOT NULL,
	`time_start` TIME NOT NULL,
	`time_end` TIME NOT NULL,
	`date` DATE NOT NULL,
	PRIMARY KEY (`id_shift`)
);

CREATE TABLE `menu` (
	`id_dish` INT(11) NOT NULL AUTO_INCREMENT,
	`dish` varchar(255) NOT NULL,
	PRIMARY KEY (`id_dish`)
);

CREATE TABLE `orders` (
	`id_orders` INT(11) NOT NULL AUTO_INCREMENT,
	`id_dish_orders` INT(11) NOT NULL,
	`table` INT(3) NOT NULL,
	`number_of_people` INT(1) NOT NULL,
	`status_pay` INT(1) NOT NULL,
	`status_ready` INT(1) NOT NULL,
	PRIMARY KEY (`id_orders`)
);

ALTER TABLE `shift` ADD CONSTRAINT `shift_fk0` FOREIGN KEY (`id_user_shift`) REFERENCES `users`(`id_user`);

ALTER TABLE `orders` ADD CONSTRAINT `orders_fk0` FOREIGN KEY (`id_dish_orders`) REFERENCES `menu`(`id_dish`);





