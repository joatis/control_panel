CREATE TABLE `control_panel`.`organization` (
  `organization_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(150) NULL,
  `disabled` VARCHAR(45) NULL DEFAULT 0,
  `created_dtm` DATETIME NULL,
  PRIMARY KEY (`organization_id`),
  UNIQUE INDEX `name_UNIQUE` (`name` ASC));
