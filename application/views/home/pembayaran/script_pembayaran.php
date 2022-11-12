<script>
	$('#tgl_penerimaan').hide();
	$('#harga_keseluruhan').hide();
	$('#kurang').hide();

	$('#datetimepicker3').datetimepicker({
		inline: true,
		sideBySide: true
	});

	<?php foreach ($show_intable as $kokoro): ?>
	let awl<?= $kokoro->id_pembayaran ?> = <?php $f = date_create($kokoro->tanggal_pembayaran_awl); $k = date_format($f,'m/d/Y H:i A'); echo '"'.$k.'"'; ?>;
	let max<?= $kokoro->id_pembayaran ?> = <?php $f = date_create($kokoro->tanggal_max_bayar); $k = date_format($f,'m/d/Y H:i A'); echo '"'.$k.'"'; ?>;
	$('#datetimepickerupdate1<?= $kokoro->id_pembayaran ?>').datetimepicker({
		inline: true,
		sideBySide: true
	});	
	$("#datetimepickerupdate1<?= $kokoro->id_pembayaran ?>").val(awl<?= $kokoro->id_pembayaran ?>);
	$('#datetimepickerupdate2<?= $kokoro->id_pembayaran ?>').datetimepicker({
		inline: true,
		sideBySide: true
	});
	$("#datetimepickerupdate2<?= $kokoro->id_pembayaran ?>").val(max<?= $kokoro->id_pembayaran ?>);
	<?php endforeach ?>

	$(document).ready(function() {
		$('#pembayaran_table').DataTable( {
			"lengthMenu": [
	        [3,5,10, 25, 50, -1],
	        [3,5,10, 25, 50, "All"]
	      ],
	      "bInfo" : false,
	      "iDisplayLength": 5,
	      "language": {
	        search: ""
	      },
			initComplete: function () {
				this.api().columns('.filter_scale').every( function () {
					var column = this;
					var select = $('<select><option value=""></option></select>')
					.appendTo( $(column.footer()).empty() )
					.on( 'change', function () {
						var val = $.fn.dataTable.util.escapeRegex(
							$(this).val()
							);

						column
						.search( val ? '^'+val+'$' : '', true, false )
						.draw();
					} );

					column.data().unique().sort().each( function ( d, j ) {
						select.append( '<option value="'+d+'">'+d+'</option>' )
					} );
				} );
			},
		} );
	});

	function numberWithCommas(x) {
		return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
	}

	function format_number(number, prefix, thousand_separator, decimal_separator)
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

	function remove_commas(str){
		return str.replace(/,/g, '').trim();
	}

	var input0 = document.getElementById('uang_dp');
	input0.addEventListener('keyup', function(e)
	{
		input0.value = format_number(this.value, '');
	});

	$(document).on('change', '#no_do_tambah', function(event) {
		let id_penjualan = $(this).val();
		$.ajax({
			url: '<?= site_url('Pembayaran/search_penerimaan')  ?>',
			type: 'POST',
			dataType: 'json',
			data: {id_penjualan:id_penjualan},
		})
		.done(function(data) {
			console.log(data);
			if (id_penjualan != '') {
				if (data.cek.length > 0) {
					$('#tgl_awl').hide();
					$('#tgl_akhr').hide();
					$('#tgl_penerimaan').fadeIn();
				} else {
					$('#tgl_awl').fadeIn();
					$('#tgl_akhr').fadeIn();
					$('#tgl_penerimaan').hide();
				}

				$('#total_beli').val(numberWithCommas(data.show.harga_keseluruhan));
				$('#must_bayar').val(numberWithCommas(data.pene));

				$('#harga_keseluruhan').fadeIn();
				$('#kurang').fadeIn();
			} else {
				$('#total_beli').val('0');
				$('#must_bayar').val('0');
				$('#harga_keseluruhan').hide();
				$('#kurang').hide();
			}
		});
		
	});
</script>