<script>
	<?php foreach ($penerimaan_list as $key): ?>
		let terima<?= $key->id_penerimaan ?> = <?php $f = date_create($key->tanggal_terima); $k = date_format($f,'m/d/Y H:i A'); echo '"'.$k.'"'; ?>;
		$('#upapenerima<?= $key->id_penerimaan ?>').datetimepicker({
			inline: true,
			sideBySide: true
		});
		$("#upapenerima<?= $key->id_penerimaan ?>").val(terima<?= $key->id_penerimaan ?>);

		$('#nominal_update<?= $key->id_penerimaan ?>').keyup(function(event) {

		  // skip for arrow keys
		  if(event.which >= 37 && event.which <= 40) return;

		  // format number
		  $(this).val(function(index, value) {
		  	return value
		  	.replace(/\D/g, "")
		  	.replace(/\B(?=(\d{3})+(?!\d))/g, ",")
		  	;
		  });
		});	

	<?php endforeach ?>
</script>