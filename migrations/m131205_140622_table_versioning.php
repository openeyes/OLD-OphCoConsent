<?php

class m131205_140622_table_versioning extends CDbMigration
{
	public function up()
	{
		$this->execute("
CREATE TABLE `et_ophcoconsent_benfitrisk_version` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(10) unsigned NOT NULL,
  `benefits` text COLLATE utf8_bin,
  `risks` text COLLATE utf8_bin,
  `last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
  `last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
  `created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
  PRIMARY KEY (`id`),
  KEY `acv_et_ophcoconsent_benfitrisk_lmui_fk` (`last_modified_user_id`),
  KEY `acv_et_ophcoconsent_benfitrisk_cui_fk` (`created_user_id`),
  KEY `acv_et_ophcoconsent_benfitrisk_ev_fk` (`event_id`),
  CONSTRAINT `acv_et_ophcoconsent_benfitrisk_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `acv_et_ophcoconsent_benfitrisk_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `acv_et_ophcoconsent_benfitrisk_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin
		");

		$this->alterColumn('et_ophcoconsent_benfitrisk_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','et_ophcoconsent_benfitrisk_version');

		$this->createIndex('et_ophcoconsent_benfitrisk_aid_fk','et_ophcoconsent_benfitrisk_version','id');
		$this->addForeignKey('et_ophcoconsent_benfitrisk_aid_fk','et_ophcoconsent_benfitrisk_version','id','et_ophcoconsent_benfitrisk','id');

		$this->addColumn('et_ophcoconsent_benfitrisk_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('et_ophcoconsent_benfitrisk_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','et_ophcoconsent_benfitrisk_version','version_id');
		$this->alterColumn('et_ophcoconsent_benfitrisk_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `et_ophcoconsent_other_version` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(10) unsigned NOT NULL,
  `information` tinyint(1) unsigned NOT NULL,
  `witness_required` tinyint(1) unsigned NOT NULL,
  `interpreter_required` tinyint(1) unsigned NOT NULL,
  `parent_guardian` varchar(255) COLLATE utf8_bin DEFAULT '',
  `last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
  `last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
  `created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
  `witness_name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `interpreter_name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `acv_et_ophcoconsent_other_lmui_fk` (`last_modified_user_id`),
  KEY `acv_et_ophcoconsent_other_cui_fk` (`created_user_id`),
  KEY `acv_et_ophcoconsent_other_ev_fk` (`event_id`),
  CONSTRAINT `acv_et_ophcoconsent_other_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `acv_et_ophcoconsent_other_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`),
  CONSTRAINT `acv_et_ophcoconsent_other_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin
		");

		$this->alterColumn('et_ophcoconsent_other_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','et_ophcoconsent_other_version');

		$this->createIndex('et_ophcoconsent_other_aid_fk','et_ophcoconsent_other_version','id');
		$this->addForeignKey('et_ophcoconsent_other_aid_fk','et_ophcoconsent_other_version','id','et_ophcoconsent_other','id');

		$this->addColumn('et_ophcoconsent_other_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('et_ophcoconsent_other_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','et_ophcoconsent_other_version','version_id');
		$this->alterColumn('et_ophcoconsent_other_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `et_ophcoconsent_permissions_version` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(10) unsigned NOT NULL,
  `tissues_id` int(10) unsigned NOT NULL,
  `images` tinyint(1) unsigned NOT NULL,
  `last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
  `last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
  `created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
  PRIMARY KEY (`id`),
  KEY `acv_et_ophcoconsent_permissions_lmui_fk` (`last_modified_user_id`),
  KEY `acv_et_ophcoconsent_permissions_cui_fk` (`created_user_id`),
  KEY `acv_et_ophcoconsent_permissions_ev_fk` (`event_id`),
  KEY `acv_et_ophcoconsent_permissions_tissues_fk` (`tissues_id`),
  CONSTRAINT `acv_et_ophcoconsent_permissions_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `acv_et_ophcoconsent_permissions_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `acv_et_ophcoconsent_permissions_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`),
  CONSTRAINT `acv_et_ophcoconsent_permissions_tissues_fk` FOREIGN KEY (`tissues_id`) REFERENCES `et_ophcoconsent_permissions_tissues` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin
		");

		$this->alterColumn('et_ophcoconsent_permissions_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','et_ophcoconsent_permissions_version');

		$this->createIndex('et_ophcoconsent_permissions_aid_fk','et_ophcoconsent_permissions_version','id');
		$this->addForeignKey('et_ophcoconsent_permissions_aid_fk','et_ophcoconsent_permissions_version','id','et_ophcoconsent_permissions','id');

		$this->addColumn('et_ophcoconsent_permissions_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('et_ophcoconsent_permissions_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','et_ophcoconsent_permissions_version','version_id');
		$this->alterColumn('et_ophcoconsent_permissions_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `et_ophcoconsent_permissions_tissues_version` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8_bin NOT NULL,
  `display_order` int(10) unsigned NOT NULL DEFAULT '1',
  `last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
  `last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
  `created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
  PRIMARY KEY (`id`),
  KEY `acv_et_ophcoconsent_permissions_tissues_lmui_fk` (`last_modified_user_id`),
  KEY `acv_et_ophcoconsent_permissions_tissues_cui_fk` (`created_user_id`),
  CONSTRAINT `acv_et_ophcoconsent_permissions_tissues_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `acv_et_ophcoconsent_permissions_tissues_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin
		");

		$this->alterColumn('et_ophcoconsent_permissions_tissues_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','et_ophcoconsent_permissions_tissues_version');

		$this->createIndex('et_ophcoconsent_permissions_tissues_aid_fk','et_ophcoconsent_permissions_tissues_version','id');
		$this->addForeignKey('et_ophcoconsent_permissions_tissues_aid_fk','et_ophcoconsent_permissions_tissues_version','id','et_ophcoconsent_permissions_tissues','id');

		$this->addColumn('et_ophcoconsent_permissions_tissues_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('et_ophcoconsent_permissions_tissues_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','et_ophcoconsent_permissions_tissues_version','version_id');
		$this->alterColumn('et_ophcoconsent_permissions_tissues_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `et_ophcoconsent_procedure_version` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(10) unsigned NOT NULL,
  `eye_id` int(10) unsigned NOT NULL DEFAULT '2',
  `anaesthetic_type_id` int(10) unsigned NOT NULL DEFAULT '1',
  `last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
  `last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
  `created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
  `booking_event_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `acv_et_ophcoconsent_procedure_lmui_fk` (`last_modified_user_id`),
  KEY `acv_et_ophcoconsent_procedure_cui_fk` (`created_user_id`),
  KEY `acv_et_ophcoconsent_procedure_ev_fk` (`event_id`),
  KEY `acv_et_ophcoconsent_procedure_eye_id_fk` (`eye_id`),
  KEY `acv_et_ophcoconsent_procedure_anaesthetic_type_id_fk` (`anaesthetic_type_id`),
  KEY `acv_et_ophcoconsent_procedure_booking_event_id_fk` (`booking_event_id`),
  CONSTRAINT `acv_et_ophcoconsent_procedure_booking_event_id_fk` FOREIGN KEY (`booking_event_id`) REFERENCES `event` (`id`),
  CONSTRAINT `acv_et_ophcoconsent_procedure_anaesthetic_type_id_fk` FOREIGN KEY (`anaesthetic_type_id`) REFERENCES `anaesthetic_type` (`id`),
  CONSTRAINT `acv_et_ophcoconsent_procedure_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `acv_et_ophcoconsent_procedure_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`),
  CONSTRAINT `acv_et_ophcoconsent_procedure_eye_id_fk` FOREIGN KEY (`eye_id`) REFERENCES `eye` (`id`),
  CONSTRAINT `acv_et_ophcoconsent_procedure_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin
		");

		$this->alterColumn('et_ophcoconsent_procedure_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','et_ophcoconsent_procedure_version');

		$this->createIndex('et_ophcoconsent_procedure_aid_fk','et_ophcoconsent_procedure_version','id');
		$this->addForeignKey('et_ophcoconsent_procedure_aid_fk','et_ophcoconsent_procedure_version','id','et_ophcoconsent_procedure','id');

		$this->addColumn('et_ophcoconsent_procedure_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('et_ophcoconsent_procedure_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','et_ophcoconsent_procedure_version','version_id');
		$this->alterColumn('et_ophcoconsent_procedure_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `et_ophcoconsent_procedure_add_procs_add_procs_version` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `element_id` int(10) unsigned NOT NULL,
  `proc_id` int(10) unsigned NOT NULL,
  `last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
  `last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
  `created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
  PRIMARY KEY (`id`),
  KEY `acv_et_ophcoconsent_procedure_add_procs_add_procs_lmui_fk` (`last_modified_user_id`),
  KEY `acv_et_ophcoconsent_procedure_add_procs_add_procs_cui_fk` (`created_user_id`),
  KEY `acv_et_ophcoconsent_procedure_add_procs_add_procs_ele_fk` (`element_id`),
  KEY `acv_et_ophcoconsent_procedure_add_procs_add_procs_lku_fk` (`proc_id`),
  CONSTRAINT `acv_et_ophcoconsent_procedure_add_procs_add_procs_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `acv_et_ophcoconsent_procedure_add_procs_add_procs_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `acv_et_ophcoconsent_procedure_add_procs_add_procs_ele_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophcoconsent_procedure` (`id`),
  CONSTRAINT `acv_et_ophcoconsent_procedure_add_procs_add_procs_lku_fk` FOREIGN KEY (`proc_id`) REFERENCES `proc` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin
		");

		$this->alterColumn('et_ophcoconsent_procedure_add_procs_add_procs_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','et_ophcoconsent_procedure_add_procs_add_procs_version');

		$this->createIndex('et_ophcoconsent_procedure_add_procs_add_procs_aid_fk','et_ophcoconsent_procedure_add_procs_add_procs_version','id');
		$this->addForeignKey('et_ophcoconsent_procedure_add_procs_add_procs_aid_fk','et_ophcoconsent_procedure_add_procs_add_procs_version','id','et_ophcoconsent_procedure_add_procs_add_procs','id');

		$this->addColumn('et_ophcoconsent_procedure_add_procs_add_procs_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('et_ophcoconsent_procedure_add_procs_add_procs_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','et_ophcoconsent_procedure_add_procs_add_procs_version','version_id');
		$this->alterColumn('et_ophcoconsent_procedure_add_procs_add_procs_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `et_ophcoconsent_procedure_proc_defaults_version` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `value_id` int(10) unsigned NOT NULL,
  `last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
  `last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
  `created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
  PRIMARY KEY (`id`),
  KEY `acv_et_ophcoconsent_procedure_proc_defaults_lmui_fk` (`last_modified_user_id`),
  KEY `acv_et_ophcoconsent_procedure_proc_defaults_cui_fk` (`created_user_id`),
  CONSTRAINT `acv_et_ophcoconsent_procedure_proc_defaults_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `acv_et_ophcoconsent_procedure_proc_defaults_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin
		");

		$this->alterColumn('et_ophcoconsent_procedure_proc_defaults_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','et_ophcoconsent_procedure_proc_defaults_version');

		$this->createIndex('et_ophcoconsent_procedure_proc_defaults_aid_fk','et_ophcoconsent_procedure_proc_defaults_version','id');
		$this->addForeignKey('et_ophcoconsent_procedure_proc_defaults_aid_fk','et_ophcoconsent_procedure_proc_defaults_version','id','et_ophcoconsent_procedure_proc_defaults','id');

		$this->addColumn('et_ophcoconsent_procedure_proc_defaults_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('et_ophcoconsent_procedure_proc_defaults_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','et_ophcoconsent_procedure_proc_defaults_version','version_id');
		$this->alterColumn('et_ophcoconsent_procedure_proc_defaults_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `et_ophcoconsent_procedure_procedures_procedures_version` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `element_id` int(10) unsigned NOT NULL,
  `proc_id` int(10) unsigned NOT NULL,
  `last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
  `last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
  `created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
  PRIMARY KEY (`id`),
  KEY `acv_et_ophcoconsent_procedure_procedures_procedures_lmui_fk` (`last_modified_user_id`),
  KEY `acv_et_ophcoconsent_procedure_procedures_procedures_cui_fk` (`created_user_id`),
  KEY `acv_et_ophcoconsent_procedure_procedures_procedures_ele_fk` (`element_id`),
  KEY `acv_et_ophcoconsent_procedure_procedures_procedures_lku_fk` (`proc_id`),
  CONSTRAINT `acv_et_ophcoconsent_procedure_procedures_procedures_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `acv_et_ophcoconsent_procedure_procedures_procedures_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `acv_et_ophcoconsent_procedure_procedures_procedures_ele_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophcoconsent_procedure` (`id`),
  CONSTRAINT `acv_et_ophcoconsent_procedure_procedures_procedures_lku_fk` FOREIGN KEY (`proc_id`) REFERENCES `proc` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin
		");

		$this->alterColumn('et_ophcoconsent_procedure_procedures_procedures_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','et_ophcoconsent_procedure_procedures_procedures_version');

		$this->createIndex('et_ophcoconsent_procedure_procedures_procedures_aid_fk','et_ophcoconsent_procedure_procedures_procedures_version','id');
		$this->addForeignKey('et_ophcoconsent_procedure_procedures_procedures_aid_fk','et_ophcoconsent_procedure_procedures_procedures_version','id','et_ophcoconsent_procedure_procedures_procedures','id');

		$this->addColumn('et_ophcoconsent_procedure_procedures_procedures_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('et_ophcoconsent_procedure_procedures_procedures_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','et_ophcoconsent_procedure_procedures_procedures_version','version_id');
		$this->alterColumn('et_ophcoconsent_procedure_procedures_procedures_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `et_ophcoconsent_type_version` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(10) unsigned NOT NULL,
  `type_id` int(10) unsigned NOT NULL,
  `last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
  `last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
  `created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
  PRIMARY KEY (`id`),
  KEY `acv_et_ophcoconsent_type_lmui_fk` (`last_modified_user_id`),
  KEY `acv_et_ophcoconsent_type_cui_fk` (`created_user_id`),
  KEY `acv_et_ophcoconsent_type_ev_fk` (`event_id`),
  KEY `acv_et_ophcoconsent_type_type_fk` (`type_id`),
  CONSTRAINT `acv_et_ophcoconsent_type_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `acv_et_ophcoconsent_type_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `acv_et_ophcoconsent_type_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`),
  CONSTRAINT `acv_et_ophcoconsent_type_type_fk` FOREIGN KEY (`type_id`) REFERENCES `et_ophcoconsent_type_type` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin
		");

		$this->alterColumn('et_ophcoconsent_type_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','et_ophcoconsent_type_version');

		$this->createIndex('et_ophcoconsent_type_aid_fk','et_ophcoconsent_type_version','id');
		$this->addForeignKey('et_ophcoconsent_type_aid_fk','et_ophcoconsent_type_version','id','et_ophcoconsent_type','id');

		$this->addColumn('et_ophcoconsent_type_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('et_ophcoconsent_type_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','et_ophcoconsent_type_version','version_id');
		$this->alterColumn('et_ophcoconsent_type_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `et_ophcoconsent_type_type_version` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8_bin NOT NULL,
  `display_order` int(10) unsigned NOT NULL DEFAULT '1',
  `last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
  `last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
  `created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
  PRIMARY KEY (`id`),
  KEY `acv_et_ophcoconsent_type_type_lmui_fk` (`last_modified_user_id`),
  KEY `acv_et_ophcoconsent_type_type_cui_fk` (`created_user_id`),
  CONSTRAINT `acv_et_ophcoconsent_type_type_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `acv_et_ophcoconsent_type_type_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin
		");

		$this->alterColumn('et_ophcoconsent_type_type_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','et_ophcoconsent_type_type_version');

		$this->createIndex('et_ophcoconsent_type_type_aid_fk','et_ophcoconsent_type_type_version','id');
		$this->addForeignKey('et_ophcoconsent_type_type_aid_fk','et_ophcoconsent_type_type_version','id','et_ophcoconsent_type_type','id');

		$this->addColumn('et_ophcoconsent_type_type_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('et_ophcoconsent_type_type_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','et_ophcoconsent_type_type_version','version_id');
		$this->alterColumn('et_ophcoconsent_type_type_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');
	}

	public function down()
	{
		$this->dropTable('et_ophcoconsent_benfitrisk_version');
		$this->dropTable('et_ophcoconsent_other_version');
		$this->dropTable('et_ophcoconsent_permissions_version');
		$this->dropTable('et_ophcoconsent_permissions_tissues_version');
		$this->dropTable('et_ophcoconsent_procedure_version');
		$this->dropTable('et_ophcoconsent_procedure_add_procs_add_procs_version');
		$this->dropTable('et_ophcoconsent_procedure_proc_defaults_version');
		$this->dropTable('et_ophcoconsent_procedure_procedures_procedures_version');
		$this->dropTable('et_ophcoconsent_type_version');
		$this->dropTable('et_ophcoconsent_type_type_version');
	}
}
