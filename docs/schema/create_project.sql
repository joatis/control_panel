CREATE TABLE `project` (
  `project_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `organization_id` int(10) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(10) unsigned NOT NULL,
  `project_uuid` VARCHAR(36) NOT NULL,
  `last_updated_by` int(10) unsigned NOT NULL,
  `last_updated_dtm` datetime NOT NULL,
  `created_by` int(10) unsigned NOT NULL,
  `created_dtm` datetime NOT NULL,
  PRIMARY KEY (`project_id`),
  KEY `fk_org_id_idx` (`organization_id`),
  KEY `fk_created_by_idx` (`created_by`),
  KEY `fk_updated_by_idx` (`last_updated_by`),
  CONSTRAINT `fk_created_by` FOREIGN KEY (`created_by`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_org_id` FOREIGN KEY (`organization_id`) REFERENCES `organization` (`organization_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_updated_by` FOREIGN KEY (`last_updated_by`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4