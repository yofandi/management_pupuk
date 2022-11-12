<script>
$(document).ready(function() {
	 $('#konfirmasi_table').DataTable( {
		'bInfo' : false,
		"lengthMenu": [[3,5,10, 25, 50, -1], [3,5,10, 25, 50, "All"]],
		initComplete: function () {
			this.api().columns('.filter_scale').every( function () {
				var column = this;
				var select = $('<select><option value="">Status</option></select>')
				.appendTo( $(column.header()).empty() )
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
		}
    } );
});
  load_blok_up();
  function load_blok_up() {
    let id_kebun = $('#kebun_fo').val();
    let id_blok = $('#blok_fo').val();
    $.ajax({
      url: '<?= site_url('Penjualan/load_blok') ?>',
      type: 'POST',
      dataType: 'json',
      data: {id_kebun:id_kebun},
    })
    .done(function(data) {
      let html = '<option value="">--- Pilih Blok ---</option>';
      for (var i = 0; i < data.length; i++) {
        html += '<option value="'+ data[i].id_blok +'"';
          if (data[i].id_blok == id_blok) {
          html += 'selected';
          }
        html += '>'+ data[i].nama_blok +'</option>';
      }
      $('#blok').html(html);
    });
  }
</script>