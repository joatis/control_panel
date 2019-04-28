CREATE TABLE control_panel.organization (
  organization_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  name VARCHAR(150) NULL,
  disabled TINYINT(4) UNSIGNED DEFAULT 0,
  organization_uuid VARCHAR(36) NOT NULL,
  created_dtm DATETIME NULL,
  PRIMARY KEY (organization_id),
  UNIQUE INDEX name_UNIQUE (name ASC),
  UNIQUE INDEX org_uuid_UNIQUE (organization_uuid ASC));
