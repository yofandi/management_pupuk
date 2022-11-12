<script>
	function insert_merk() {
		let nama_merk = $('#nama_merk').val();
		$.ajax({
			url: '<?= site_url('Referensi/insert_merk') ?>',
			type: 'POST',
			dataType: 'json',
			data: {merk: nama_merk},
		})
		.done(function(data) {
			alert(data);
			$('#nama_merk').val('');
			show_merk();
		});
	}

	show_merk();
	function show_merk() {
		$.ajax({
			url: '<?= site_url('Referensi/show_merk') ?>',
			dataType: 'json',
			success: function(data) {
				var html = '<option value="">--- Pilih Merk ---</option>';
				for (var i = 0; i < data.length; i++) {
					html += '<option value="' + data[i].id_merk + '">' + data[i].nama_merk + '</option>';
				}
				$('#show_merk_t').html(html);
			}
		});
	}
</script>