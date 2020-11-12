<?php
/* ------------------------------------------------------------
	Module "Bootstrap 4 Template-Manager" made by Karl

	modified eCommerce Shopsoftware
	http://www.modified-shop.org

	Released under the GNU General Public License
-------------------------------------------------------------- */

?>
<script type="text/javascript">
var Custom1select;
var Custom2select;
$(document).ready(function () {
	setTimeout(
		function(){
			$('.success_message').hide('slow');
		}, 6000
	);
	// Color Picker Spectrum
	$(".basic").spectrum({
        showAlpha: true,
		showInput: true,
		className: "full-spectrum",
		showInitial: true,
		preferredFormat: "hex",
		change: function(color) {
			$(this).prev('.basic_val').val(color);
		}
	});
	// setzt SumoSelect standard (nicht modifiziert)
	Custom1select =	$('#thememodel').SumoSelect();
	Custom2select =	$('#thememodel2').SumoSelect();
	// aktuell gewähltes Thememodel setzen
	var sel_model = $('#thememodel option:selected').index();
	var sel_model2 = $('#thememodel2 option:selected').index();
	$('#last_selected').attr('value', sel_model);
	$('#last_selected2').attr('value', sel_model2);
	if($('.error_message').length === 0){
	    var previewtheme = $('select[name="configuration[BS4_BOOTSTRAP_THEME]"] option:selected').text();
		$('#preview').text(previewtheme);
	} else {
		$('#preview').html('<div class="error_message"><?php echo ICON_ERROR; ?></div>');
	}
});
function checkAction(action) {
	if (action == 'update') {
		// prüft, ob vor dem Aktualisieren eine Vorlage geladen wurde
		var new_selected = $('#thememodel').find("option:selected");
		var new_selected2 = $('#thememodel2').find("option:selected");
		var last_selected = $('#last_selected').attr('value');
		var last_selected2 = $('#last_selected2').attr('value');
		if (new_selected != last_selected) {
			Custom1select.sumo.selectItem(last_selected);
		}
		if (new_selected2 != last_selected2) {
			Custom2select.sumo.selectItem(last_selected2);
		}
		$("#tpl_manager").submit();
	}
	if (action == 'load_thememodel') {
		return confirmBs4("<?php echo BS4_LOAD_THEMEMODEL; ?>","",action);
	}
	if (action == 'load_thememodel2') {
		return confirmBs4("<?php echo BS4_LOAD_THEMEMODEL; ?>","",action);
	}
	if (action == 'copy') {
		return confirmBs4('<?php echo sprintf(BS4_COPY_2_TEMPLATE , '/templates/'.$bs4_conf["BS4_CURRENT_TEMPLATE"].'/'); ?>','',action);
	}
}
function confirmBs4(message, title, action) {
	title = title || 'Information';
	$.confirm({
		keyboardEnabled: true,
		title: title,
		content: (message ? message : ' '),
		confirmButton: js_button_yes,
		cancelButton: js_button_no,
		columnClass: 'jconfirm-width',
		animation: 'none',
		confirm: function () {
			if (action == 'load_thememodel'){
				// setzt neu gewähltes Thememodel
				var new_selected = $('#thememodel').find("option:selected");
				$('#action').attr('value', action);
				$('#last_selected').attr('value', new_selected);
				$("#tpl_manager").submit();
			}
			if (action == 'load_thememodel2'){
				// setzt neu gewähltes Thememodel
				var new_selected2 = $('#thememodel2').find("option:selected");
				$('#action').attr('value', action);
				$('#last_selected2').attr('value', new_selected2);
				$("#tpl_manager").submit();
			}
			if (action == 'copy'){
				$('#action').attr('value', action);
				$("#tpl_manager").submit();
			}
		},
		cancel: function () {
			if (action == 'load_thememodel'){
				// setzt Thememodel-Dropdown zurück
				var last_selected = $('#last_selected').attr('value');
				Custom1select.sumo.selectItem(last_selected);
			}
			if (action == 'load_thememodel2'){
				// setzt Thememodel-Dropdown zurück
				var last_selected2 = $('#last_selected2').attr('value');
				Custom2select.sumo.selectItem(last_selected2);
			}
		}
	});
	return false;
}
</script>
