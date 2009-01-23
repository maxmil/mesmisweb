
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- user
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `user`;


CREATE TABLE `user`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(50)  NOT NULL,
	`surname1` VARCHAR(50)  NOT NULL,
	`surname2` VARCHAR(50),
	`email` VARCHAR(255)  NOT NULL,
	`password` VARCHAR(255)  NOT NULL,
	`institution` VARCHAR(255),
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- visit
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `visit`;


CREATE TABLE `visit`
(
	`user_id` INTEGER,
	`ip` VARCHAR(15),
	`created_at` DATETIME,
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`),
	INDEX `visit_FI_1` (`user_id`),
	CONSTRAINT `visit_FK_1`
		FOREIGN KEY (`user_id`)
		REFERENCES `user` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- content
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `content`;


CREATE TABLE `content`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`alias` VARCHAR(50),
	`title` TEXT  NOT NULL,
	`body` TEXT,
	`state` VARCHAR(10) default 'PUBLISH',
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- news_item
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `news_item`;


CREATE TABLE `news_item`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`title` VARCHAR(255)  NOT NULL,
	`descrip` TEXT  NOT NULL,
	`body` TEXT,
	`photo_filename` VARCHAR(255),
	`priority` INTEGER,
	`state` VARCHAR(10) default 'PUBLISH',
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- product
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `product`;


CREATE TABLE `product`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`title` VARCHAR(255)  NOT NULL,
	`descrip` TEXT,
	`photo_filename` VARCHAR(255),
	`attach_filename` VARCHAR(255),
	`url` VARCHAR(255),
	`state` VARCHAR(10) default 'PUBLISH',
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- download
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `download`;


CREATE TABLE `download`
(
	`user_id` INTEGER,
	`product_id` INTEGER,
	`created_at` DATETIME,
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`),
	INDEX `download_FI_1` (`user_id`),
	CONSTRAINT `download_FK_1`
		FOREIGN KEY (`user_id`)
		REFERENCES `user` (`id`),
	INDEX `download_FI_2` (`product_id`),
	CONSTRAINT `download_FK_2`
		FOREIGN KEY (`product_id`)
		REFERENCES `product` (`id`)
)Type=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
