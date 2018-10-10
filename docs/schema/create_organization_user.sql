CREATE TABLE `organization_user` (
  `organization_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,  
  KEY `organization_id_fk_idx` (`organization_id`),
  KEY `user_fk_idx` (`user_id`),
  CONSTRAINT `fk_organization_id` FOREIGN KEY (`organization_id`) REFERENCES `organization` (`organization_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4