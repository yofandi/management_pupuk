<script>
  $('#tanggal_penjualan').datetimepicker({
    inline: true,
    sideBySide: true
  });
  $('#tanggal_kirim').datetimepicker({
    inline: true,
    sideBySide: true
  });
  function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
  }

  function counting() {
    let dis_univ = parseInt($('#diskon_univ').val());
    let total_pupuk = parseInt($('#total_pupuk').val());

    let tot_diskon = (total_pupuk * dis_univ) / 100;
    let total_semua = total_pupuk - tot_diskon;
    $('#total_semua').val(numberWithCommas(total_semua));
    $('#total_semua_sblm').val(total_semua);
  }

  load_keranjang();
  function load_keranjang() {
  	let id_penjualan = $('#idpenup').val();

  	$.ajax({
  		url: '<?= site_url('Penjualan/load_pupuk_beli/') ?>' + id_penjualan,
  		type: 'POST',
  		dataType: 'json',
  		data: {id_penjualan:id_penjualan},
  	})
  	.done(function(data) {
  		// /console.log(data);
  		$('#load_sam').html(data.table);
  		$('#total').text(numberWithCommas(data.total));
  		$('#total_pupuk').val(data.total);
  	});
  	
  }

  function hapus_terpilih() {
  	let idpenup = $('#idpenup').val();

  	$.ajax({
  		url: '<?= site_url('Penjualan/') ?>',
  		type: 'POST',
  		dataType: 'json',
  		data: {idpenup:idpenup},
  	})
  	.done(function(data) {
  		console.log(data);
  	});
  	
  }

  function update_keranjang() {
  	let idpenup = $('#idpenup').val();
  	let harga_pupuk = $('#total_pupuk').val();
  	let diskon_univ = $('#diskon_univ').val();
  	let total_semua_sblm = $('#total_semua_sblm').val();

  	$.ajax({
  		url: '<?= site_url('Penjualan/update_totalhargasemua') ?>',
  		type: 'POST',
  		dataType: 'json',
  		data: {
  			harga_pupuk:harga_pupuk,diskon_univ:diskon_univ,total_semua_sblm:total_semua_sblm,idpenup:idpenup
  		},
  	})
  	.done(function(data) {
  		// console.log(data);
  		alert(data); window.location.href = "<?= site_url('Penjualan/edit_penjualan/') ?>"+idpenup;
  	});
  	
  }

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

  $(document).on('change', '#kebun', function(event) {
    let id_kebun = $(this).val();
    $.ajax({
      url: '<?= site_url('Penjualan/load_blok') ?>',
      type: 'POST',
      dataType: 'json',
      data: {id_kebun:id_kebun},
    })
    .done(function(data) {
      let html = '<option value="">--- Pilih Blok ---</option>';
      for (var i = 0; i < data.length; i++) {
        html += '<option value="'+ data[i].id_blok +'">'+ data[i].nama_blok +'</option>';
      }
      $('#blok').html(html);
    });
    
  });

  $('#example tfoot th').each( function () {
    var title = $(this).text();
    $(this).html( '<div class="form-group"><input type="text" class="form-control" placeholder="'+title+' Search" /></div>' );
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
</script>