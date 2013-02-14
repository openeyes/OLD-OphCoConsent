<?php

class m130114_133823_link_consent_form_to_operation_event extends CDbMigration
{
	public function up()
	{
		$this->addColumn('et_ophcoconsent_procedure','booking_event_id','int(10) unsigned NULL');
		$this->createIndex('et_ophcoconsent_procedure_booking_event_id_fk','et_ophcoconsent_procedure','booking_event_id');
		$this->addForeignKey('et_ophcoconsent_procedure_booking_event_id_fk','et_ophcoconsent_procedure','booking_event_id','event','id');
	}

	public function down()
	{
		$this->dropForeignKey('et_ophcoconsent_procedure','booking_event_id');
		$this->dropIndex('et_ophcoconsent_procedure','booking_event_id');
		$this->dropColumn('et_ophcoconsent_procedure','booking_event_id');
	}
}
