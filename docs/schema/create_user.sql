CREATE TABLE `control_panel`.`user` (
  `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name_first` varchar(45) DEFAULT NULL,
  `name_last` varchar(45) DEFAULT NULL,
  `name_middle` varchar(45) DEFAULT NULL,
  `email_primary` varchar(150) DEFAULT NULL,
  `user_uuid` VARCHAR(36) NOT NULL,
  `password_hash` char(40) NOT NULL,
  `reset_password_hash` char(40) DEFAULT NULL,
  `reset_password_hash_dtm` datetime DEFAULT NULL,
  `disabled` tinyint(4) DEFAULT NULL,
  `created_dtm` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email_primary_UNIQUE` (`email_primary`),
  UNIQUE KEY `user_uuid_UNIQUE` (`user_uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

