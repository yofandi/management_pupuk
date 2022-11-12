<script>
	$('#tagihan_table').DataTable( {
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
</script>