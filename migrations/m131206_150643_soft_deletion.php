<?php

class m131206_150643_soft_deletion extends CDbMigration
{
	public function up()
	{
		$this->addColumn('et_ophcoconsent_benfitrisk','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcoconsent_benfitrisk_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcoconsent_other','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcoconsent_other_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcoconsent_permissions','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcoconsent_permissions_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcoconsent_permissions_tissues','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcoconsent_permissions_tissues_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcoconsent_procedure','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcoconsent_procedure_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcoconsent_procedure_add_procs_add_procs','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcoconsent_procedure_add_procs_add_procs_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcoconsent_procedure_proc_defaults','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcoconsent_procedure_proc_defaults_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcoconsent_procedure_procedures_procedures','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcoconsent_procedure_procedures_procedures_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcoconsent_type','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcoconsent_type_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcoconsent_type_type','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcoconsent_type_type_version','deleted','tinyint(1) unsigned not null');
	}

	public function down()
	{
		$this->dropColumn('et_ophcoconsent_benfitrisk','deleted');
		$this->dropColumn('et_ophcoconsent_benfitrisk_version','deleted');
		$this->dropColumn('et_ophcoconsent_other','deleted');
		$this->dropColumn('et_ophcoconsent_other_version','deleted');
		$this->dropColumn('et_ophcoconsent_permissions','deleted');
		$this->dropColumn('et_ophcoconsent_permissions_version','deleted');
		$this->dropColumn('et_ophcoconsent_permissions_tissues','deleted');
		$this->dropColumn('et_ophcoconsent_permissions_tissues_version','deleted');
		$this->dropColumn('et_ophcoconsent_procedure','deleted');
		$this->dropColumn('et_ophcoconsent_procedure_version','deleted');
		$this->dropColumn('et_ophcoconsent_procedure_add_procs_add_procs','deleted');
		$this->dropColumn('et_ophcoconsent_procedure_add_procs_add_procs_version','deleted');
		$this->dropColumn('et_ophcoconsent_procedure_proc_defaults','deleted');
		$this->dropColumn('et_ophcoconsent_procedure_proc_defaults_version','deleted');
		$this->dropColumn('et_ophcoconsent_procedure_procedures_procedures','deleted');
		$this->dropColumn('et_ophcoconsent_procedure_procedures_procedures_version','deleted');
		$this->dropColumn('et_ophcoconsent_type','deleted');
		$this->dropColumn('et_ophcoconsent_type_version','deleted');
		$this->dropColumn('et_ophcoconsent_type_type','deleted');
		$this->dropColumn('et_ophcoconsent_type_type_version','deleted');
	}
}
