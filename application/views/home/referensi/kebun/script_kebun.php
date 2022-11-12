<script>
	function send_kebun(kebun) {
		$('#KEBUN_').val(kebun);
	}
	loadpag();
	function loadpag(){
		let url_aksi = $('#importFrm').slideToggle();
		$.ajax({
			url: "<?php echo base_url('Referensi/load_data_kota');?>",
			type: 'get',    
			dataType: 'json',       
			success: function(value) {
				table = '<tr id="importFrm">';
				table += '<td></td>';
				table += '<td id="nama_kota" contenteditable placeholder="Masukkan Nama Kota"></td>';
				table += '<td><button type="button" id="btn_addkota" class="btn btn-xs btn-success"><span class="mdi mdi-plus"></span></button></td>';
				table += '</tr>';
				let no = 1;
				for (var i = 0; i < value.length; i++) {
					table += '<tr>';
					table += '<td>' + no + '</td>';
					table += '<td class="table_datakota" data-row_id="'+value[i].id_kota+'" data-column_name="nama_kota" contenteditable>' + value[i].nama_kota + '</td>';
					table += '<td><button type="button" class="btn btn-xs btn-success idsendkota" id="'+value[i].nama_kota+'"><span class="mdi mdi-check"></span></button><button type="button" id="'+value[i].id_kota+'" class="btn btn-xs btn-danger hapuskota"><span class="mdi mdi-delete-variant"></span></button></td>';
					table += '</tr>';
					$(document).on('click', '.idsendkota', function(event) {
						var id = $(this).attr('id');
						$('#KOTA').val(id);
					});
					no++;
				}

				$('#table_kota').html(table); 
			},
		});
	}

	$(document).on('keyup', '#search', function(event) {
		let cari = $(this).val();
		$.ajax({
			url: '<?= base_url('Referensi/search_data_kota') ?>',
			type: 'POST',
			dataType: 'json',
			data: {cari:cari},
		})
		.done(function(value) {
			table = '<tr id="importFrm">';
			table += '<td></td>';
			table += '<td id="nama_kota" contenteditable placeholder="Masukkan Nama Kota"></td>';
			table += '<td><button type="button" id="btn_addkota" class="btn btn-xs btn-success"><span class="mdi mdi-plus"></span></button></td>';
			table += '</tr>';
			let no = 1;
			for (var i = 0; i < value.length; i++) {
				table += '<tr>';
				table += '<td>' + no + '</td>';
				table += '<td class="table_datakota" data-row_id="'+value[i].id_kota+'" data-column_name="nama_kota" contenteditable>' + value[i].nama_kota + '</td>';
				table += '<td><button type="button" class="btn btn-xs btn-success idsendkota" id="'+value[i].nama_kota+'"><span class="mdi mdi-check"></span></button><button type="button" id="'+value[i].id_kota+'" class="btn btn-xs btn-danger hapuskota"><span class="mdi mdi-delete-variant"></span></button></td>';
				table += '</tr>';
				$(document).on('click', '.idsendkota', function(event) {
					var id = $(this).attr('id');
					$('#KOTA').val(id);
				});
				no++;
			}

			$('#table_kota').html(table); 
		});

	});

	$(document).on('click', '#btn_addkota', function(){
		var kota = $('#nama_kota').text();
		if(kota == '')
		{
			alert('Masukkan kota');
			return false;
		}
		$.ajax({
			url: '<?= base_url('Referensi/insert_kota') ?>',
			method:"POST",
			data: {kota:kota},
			success:function(data){
				loadpag();
				show_load_kota();
				show_load_kota_update();
			}
		})
	});

	$(document).on('blur', '.table_datakota', function(){
		var id = $(this).data('row_id');
		var table_column = $(this).data('column_name');
		var value = $(this).text();
		$.ajax({
			url:"<?php echo base_url('Referensi/update_kota'); ?>",
			method:"POST",
			data:{id:id, table_column:table_column, value:value},
			success:function(data)
			{
				loadpag();
			}
		})
	});

	$(document).on('click', '.hapuskota', function(){
		let id = $(this).attr('id');
		if(confirm("Apakah anda yakin ingin menghapus data ini?"))
		{
			$.ajax({
				url:"<?php echo base_url('Referensi/delete_kota'); ?>",
				method:"POST",
				data:{id:id},
				success:function(data){
					loadpag();
				}
			})
		}
	});

	show_load_kota();
	function show_load_kota() {
		$.ajax({
			url: '<?php echo base_url('Referensi/show_kota'); ?>',
			dataType: 'json',
		})
		.done(function(kota) {
			$('.kota_id_kota').html(kota);
		})
		
	}

	show_load_kota_update();
	function show_load_kota_update() {
		let selected = $('#id_kota_untuk_update').val();
		$.ajax({
			url: '<?php echo base_url('Referensi/show_kota_update'); ?>',
			method:"POST",
			dataType: 'json',
			data:{kota_id_kota:selected},
		})
		.done(function(kota) {
			$('.kota_id_kota-update').html(kota);
		})
		
	}
	$(document).ready(function() {
	    // Setup - add a text input to each footer cell
	    $('#example tfoot tr th').each( function () {
	        var title = $(this).text();
	        $(this).html( '<div class="input-group input-group-sm mb-3"><input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" id="'+title+'" placeholder="'+title+'" /></div>' );
	    } );
	 
	    // DataTable
	    var table = $('#example').DataTable({
	      "lengthMenu": [
	        [3,5,10, 25, 50, -1],
	        [3,5,10, 25, 50, "All"]
	      ],
	      "bInfo" : false,
	      "iDisplayLength": 5,
	      "language": {
	        search: ""
	      }
	    });
	 
	    // Apply the search
	    table.columns().every( function () {
	        var that = this;
	 
	        $( 'input', this.footer() ).on( 'keyup change', function () {
	            if ( that.search() !== this.value ) {
	                that
	                    .search( this.value )
	                    .draw();
	            }
	        } );
	    } );

	    $('#example1 tfoot tr th').each( function () {
	        var title = $(this).text();
	        $(this).html( '<div class="input-group input-group-sm mb-3"><input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" id="'+title+'" placeholder="'+title+'" /></div>' );
	    } );
	 
	    // DataTable
	    var table = $('#example1').DataTable({
	      "lengthMenu": [
	        [3,5,10, 25, 50, -1],
	        [3,5,10, 25, 50, "All"]
	      ],
	      "bInfo" : false,
	      "iDisplayLength": 5,
	      "language": {
	        search: ""
	      }
	    });
	 
	    // Apply the search
	    table.columns().every( function () {
	        var that = this;
	 
	        $( 'input', this.footer() ).on( 'keyup change', function () {
	            if ( that.search() !== this.value ) {
	                that
	                    .search( this.value )
	                    .draw();
	            }
	        } );
	    } );
	} );
</script>