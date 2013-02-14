
/* Module-specific javascript can be placed here */

$(document).ready(function() {
	$('#et_save').unbind('click').click(function() {
		if (!$(this).hasClass('inactive')) {
			disableButtons();

			
			return true;
		}
		return false;
	});

	$('#et_cancel').unbind('click').click(function() {
		if (!$(this).hasClass('inactive')) {
			disableButtons();

			if (m = window.location.href.match(/\/update\/[0-9]+/)) {
				window.location.href = window.location.href.replace('/update/','/view/');
			} else {
				window.location.href = baseUrl+'/patient/episodes/'+et_patient_id;
			}
		}
		return false;
	});

	$('#et_deleteevent').unbind('click').click(function() {
		if (!$(this).hasClass('inactive')) {
			disableButtons();
			return true;
		}
		return false;
	});

	$('#et_canceldelete').unbind('click').click(function() {
		if (!$(this).hasClass('inactive')) {
			disableButtons();

			if (m = window.location.href.match(/\/delete\/[0-9]+/)) {
				window.location.href = window.location.href.replace('/delete/','/view/');
			} else {
				window.location.href = baseUrl+'/patient/episodes/'+et_patient_id;
			}
		} 
		return false;
	});

	$('select.populate_textarea').unbind('change').change(function() {
		if ($(this).val() != '') {
			var cLass = $(this).parent().parent().parent().attr('class').match(/Element.*/);
			var el = $('#'+cLass+'_'+$(this).attr('id'));
			var currentText = el.text();
			var newText = $(this).children('option:selected').text();

			if (currentText.length == 0) {
				el.text(ucfirst(newText));
			} else {
				el.text(currentText+', '+newText);
			}
		}
	});

	$('input[id="Element_OphCoConsent_Other_witness_required"]').unbind('click').click(function() {
		if ($(this).attr('checked') == 'checked') {
			$('#div_Element_OphCoConsent_Other_witness_name').show();
			$('#Element_OphCoConsent_Other_witness_name').show();
			$('#Element_OphCoConsent_Other_witness_name').val('').focus();
		} else {
			$('#div_Element_OphCoConsent_Other_witness_name').hide();
			$('#Element_OphCoConsent_Other_witness_name').hide();
		}
	});

	$('input[id="Element_OphCoConsent_Other_interpreter_required"]').unbind('click').click(function() {
		if ($(this).attr('checked') == 'checked') {
			$('#div_Element_OphCoConsent_Other_interpreter_name').show();
			$('#Element_OphCoConsent_Other_interpreter_name').show();
			$('#Element_OphCoConsent_Other_interpreter_name').val('').focus();
		} else {
			$('#div_Element_OphCoConsent_Other_interpreter_name').hide();
			$('#Element_OphCoConsent_Other_interpreter_name').hide();
		}
	});

	$('#et_print').unbind('click').click(function() {
		var m = window.location.href.match(/\/view\/([0-9]+)/);
		printPDF(baseUrl+'/OphCoConsent/default/print/'+m[1]+"?lang_id="+$('#printLanguage').val(),{});
		return false;
	});
});

function ucfirst(str) { str += ''; var f = str.charAt(0).toUpperCase(); return f + str.substr(1); }

function eDparameterListener(_drawing) {
	if (_drawing.selectedDoodle != null) {
		// handle event
	}
}

function OphCoConsent_inArray(needle, haystack) {
	var length = haystack.length;
	for(var i = 0; i < length; i++) {
		if (haystack[i].toLowerCase() == needle.toLowerCase()) return true;
	}
	return false;
}

function callbackAddProcedure(procedure_id) {
	$.ajax({
		'url': baseUrl+'/procedure/benefits/'+procedure_id,
		'type': 'GET',
		'dataType': 'json',
		'success': function(data) {
			var benefits = $('#Element_OphCoConsent_BenefitsAndRisks_benefits').text().split(/,\s*/);
			for (var i in benefits) {
				if (benefits[i].length <1) {
					benefits.splice(i,1);
				}
			}
			for (var i in data) {
				if (!OphCoConsent_inArray(data[i], benefits)) {
					benefits.push(data[i]);
				}
			}
			$('#Element_OphCoConsent_BenefitsAndRisks_benefits').text(OphCoConsent_ucfirst(benefits.join(", ")));
		}
	});

	$.ajax({
		'url': baseUrl+'/procedure/complications/'+procedure_id,
		'type': 'GET',
		'dataType': 'json',
		'success': function(data) {
			var complications = $('#Element_OphCoConsent_BenefitsAndRisks_risks').text().split(/,\s*/);
			for (var i in complications) {
				if (complications[i].length <1) {
					complications.splice(i,1);
				}
			}
			for (var i in data) {
				if (!OphCoConsent_inArray(data[i], complications)) {
					complications.push(data[i]);
				}
			}
			$('#Element_OphCoConsent_BenefitsAndRisks_risks').text(OphCoConsent_ucfirst(complications.join(", ")));
		}
	});
}

function OphCoConsent_ucfirst(str) {
	str += '';
	var f = str.charAt(0).toUpperCase();
	return f + str.substr(1);
}

function callbackRemoveProcedure(procedure_id) {
}
