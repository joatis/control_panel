CREATE TABLE `control_panel`.`user` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `organization_id` int(10) unsigned NOT NULL,
  `name_first` varchar(45) DEFAULT NULL,
  `name_last` varchar(45) DEFAULT NULL,
  `name_middle` varchar(45) DEFAULT NULL,
  `email_primary` varchar(150) DEFAULT NULL,
  `password_hash` char(40) NOT NULL,
  `reset_password_hash` char(40) DEFAULT NULL,
  `reset_password_hash_dtm` datetime DEFAULT NULL,
  `disabled` tinyint(4) DEFAULT NULL,
  `created_dtm` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email_primary_UNIQUE` (`email_primary`),
  KEY `fk_user_org_idx` (`organization_id`),
  CONSTRAINT `fk_user_org` FOREIGN KEY (`organization_id`) REFERENCES `control_panel`.`organization` (`organization_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

