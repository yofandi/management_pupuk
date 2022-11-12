<script>
	<?php foreach ($history as $id_key): ?>
	$('#datetimepicker2<?= $id_key->id_history  ?>').datetimepicker({
		inline: true,
		sideBySide: true
	});
	<?php endforeach ?>

	<?php for ($i=0; $i < 2; $i++) { ?>
	function perngformtaz<?= $i ?>(number, prefix, thousand_separator, decimal_separator)
	{
		var 	thousand_separator = thousand_separator || ',',
		decimal_separator = decimal_separator || '.',
		regex		= new RegExp('[^' + decimal_separator + '\\d]', 'g'),
		number_string = number.replace(regex, '').toString(),
		split	  = number_string.split(decimal_separator),
		rest 	  = split[0].length % 3,
		result 	  = split[0].substr(0, rest),
		thousands = split[0].substr(rest).match(/\d{3}/g);

		if (thousands) {
			separator = rest ? thousand_separator : '';
			result += separator + thousands.join(thousand_separator);
		}
		result = split[1] != undefined ? result + decimal_separator + split[1] : result;
		return prefix == undefined ? result : (result ? prefix + result : '');
	};

	var input_tambahz<?= $i ?> = document.getElementById('format<?= $i ?>');
	input_tambahz<?= $i ?>.addEventListener('keyup', function(e)
	{
		input_tambahz<?= $i ?>.value = perngformtaz<?= $i ?>(this.value, '');
	});
	<?php } ?>

	$(document).on('change', '#pupuk', function(event) {
		let pupuk = $(this).val();
		$.ajax({
			url: '<?= site_url('Gudang/get_valuesat') ?>',
			type: 'POST',
			dataType: 'json',
			data: {pupuk: pupuk},
		})
		.done(function(core) {
			$('#id_satuan_barang').val(core.idsatuan_barang);
			$('#satuan_pupuk').val(core.nama_satuan);
		});
		
	});
</script>