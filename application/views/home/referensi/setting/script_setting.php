<script>
	show_pimpinan();
	function show_pimpinan() {
		$.ajax({
			url: '<?= site_url('Referensi/load_pimpinan') ?>',
			dataType: 'json',
			success : function(data) {
				$('#pimpinan').val(data.pimpinan);
			}
		})
	}

	function update_pimpinan() {
		let pimpinan = $('#pimpinan').val();

		$.ajax({
			url: '<?= site_url('Referensi/update_pimpinan') ?>',
			type: 'POST',
			dataType: 'json',
			data: {pimpinan: pimpinan},
			success :function(data) {
				if (data > 0) {
					alert("Pimpinan berhasil diupdate!!");
					show_pimpinan();
				} else {
					alert("Pimpinan gagal diupdate!!");	
					show_pimpinan();
				}
			}
		})
	}
</script>