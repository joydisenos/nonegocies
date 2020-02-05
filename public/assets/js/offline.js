$(document).ready(function(){
	$('#nombreempresa').change(function(){
		id = $(this).val();
		$('#nombre').val('');
		$('#precio').val('');
		$('#nombre option[data-empresa!='+ id +']').hide();
		$('#nombre option[data-empresa='+ id +']').show();


	});

	$('#nombre').change(function(){
		precio = parseFloat($('#nombre option:selected').data('precio'));
		comision = parseFloat($('#nombre option:selected').data('comision'));
		ofertaId = parseInt($('#nombre option:selected').data('id'));
		$('#precio').val(precio);
		$('#inputComision').val(comision);
		$('#inputOferta').val(ofertaId);
	});
});