<script>
  $('#tanggal_penjualan').datetimepicker({
    inline: true,
    sideBySide: true
  });
  $('#tanggal_kirim').datetimepicker({
    inline: true,
    sideBySide: true
  });
  $('#penjualan_table').DataTable( {
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
  function tampil() {
    $.ajax({
      url: '<?= site_url('Penjualan/view_session_keranjang') ?>',
      type: 'POST',
      dataType: 'json',
    })
    .done(function(post) {
      $('#ppp').html(post.table);
      $('#total').text(post.total);
      $('#total_pupuk').val(post.total_sb);
    })

  }

  function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
  }

  function destroy() {
    $.ajax({
      url: '<?= site_url('Penjualan/destory') ?>',
      dataType: 'json',
    })
    .done(function(data) {
     alert(data);
     tampil();
   });
    
  }

  function counting() {
    let dis_univ = parseInt($('#diskon_univ').val());
    let total_pupuk = parseInt($('#total_pupuk').val());

    let tot_diskon = (total_pupuk * dis_univ) / 100;
    let total_semua = total_pupuk - tot_diskon;
    $('#total_semua').val(numberWithCommas(total_semua));
    $('#total_semua_sblm').val(total_semua);
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

  function send_to_penjualan() {
    let total_pupuk = $('#total_pupuk').val();
    let diskon_kes = $('#diskon_univ').val();
    let total_kes = $('#total_semua_sblm').val();
    let tanggal_penjualan = $('#tanggal_penjualan').val();
    let tanggal_kirim = $('#tanggal_kirim').val();
    let no_do = $('#no_do').val();
    let sales = $('#sales').val();
    let kebun = $('#kebun').val(); 
    let blok = $('#blok').val();
    let pekerjaan = $('#pekerjaan').val();
    let supir = $('#supir').val();
    let pemohon = $('#pemohon').val();
    let perkiraan = $('#perkiraan').val();
    let pengirim = $('#pengirim').val();

    $.ajax({
      url: '<?= site_url('Penjualan/insert_penjualan') ?>',
      type: 'POST',
      dataType: 'json',

      data: {
        total_pupuk:total_pupuk,
        diskon_kes:diskon_kes,
        total_kes:total_kes,
        tanggal_penjualan:tanggal_penjualan,
        tanggal_kirim:tanggal_kirim,
        no_do:no_do,
        sales:sales,
        kebun:kebun,
        blok:blok,
        pekerjaan:pekerjaan,
        supir:supir,
        pemohon:pemohon,
        perkiraan:perkiraan,
        pengirim:pengirim
      },
    })
    .done(function(data) {
      alert(data); window.location.href = "<?= site_url('Penjualan/penjualaan') ?>";

    });
    
  }

  $(document).ready(function() {
    tampil();
  });
</script>