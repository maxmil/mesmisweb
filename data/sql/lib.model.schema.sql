
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
	`state` VARCHAR(10) default 'PUBLISHED',
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- content_i18n
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `content_i18n`;


CREATE TABLE `content_i18n`
(
	`title` TEXT  NOT NULL,
	`body` TEXT,
	`id` INTEGER  NOT NULL,
	`culture` VARCHAR(7)  NOT NULL,
	PRIMARY KEY (`id`,`culture`),
	CONSTRAINT `content_i18n_FK_1`
		FOREIGN KEY (`id`)
		REFERENCES `content` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- news_item
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `news_item`;


CREATE TABLE `news_item`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`photo_filename` VARCHAR(255),
	`priority` INTEGER,
	`state` VARCHAR(10) default 'PUBLISHED',
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- news_item_i18n
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `news_item_i18n`;


CREATE TABLE `news_item_i18n`
(
	`title` VARCHAR(255)  NOT NULL,
	`body` TEXT,
	`id` INTEGER  NOT NULL,
	`culture` VARCHAR(7)  NOT NULL,
	PRIMARY KEY (`id`,`culture`),
	CONSTRAINT `news_item_i18n_FK_1`
		FOREIGN KEY (`id`)
		REFERENCES `news_item` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- product
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `product`;


CREATE TABLE `product`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`mimetype` VARCHAR(20),
	`state` VARCHAR(10) default 'PUBLISHED',
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- product_i18n
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `product_i18n`;


CREATE TABLE `product_i18n`
(
	`title` VARCHAR(255)  NOT NULL,
	`descrip` TEXT,
	`photo_filename` VARCHAR(255),
	`attach_filename` VARCHAR(255),
	`url` VARCHAR(255),
	`id` INTEGER  NOT NULL,
	`culture` VARCHAR(7)  NOT NULL,
	PRIMARY KEY (`id`,`culture`),
	CONSTRAINT `product_i18n_FK_1`
		FOREIGN KEY (`id`)
		REFERENCES `product` (`id`)
		ON DELETE CASCADE
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
