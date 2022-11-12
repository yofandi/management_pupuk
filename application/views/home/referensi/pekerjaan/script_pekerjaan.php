<script>
	$(document).ready(function() {
		$('#grid_table_pekerjaan').jsGrid({
			height: "500px",
			width: "100%",
			filtering: true,
			editing: true,
			inserting: true,
			sorting: true,
			paging: true,
			autoload: true,
			pageSize: 15,
			pageButtonCount: 5,
			deleteConfirm: "Apakah anda yakin ingin menghapus data ini ?",

			controller: {
				loadData: function(filter){
					return $.ajax({
						type: "GET",
						url: "<?= site_url('Referensi/get_pekerjaan') ?>",
						data: filter
					});
				},
				insertItem: function(item){
					return $.ajax({
						type: "POST",
						url: "<?= site_url('Referensi/insert_pekerjaan') ?>",
						data:item
					});
				},
				updateItem: function(item){
					return $.ajax({
						type: "PUT",
						url: "<?= site_url('Referensi/update_pekerjaan') ?>",
						data: item
					});
				},
				deleteItem: function(item){
					return $.ajax({
						type: "DELETE",
						url: "<?= site_url('Referensi/delete_pekerjaan') ?>",
						data: item
					});
				},
			},

			fields: [
			{
				name: "id_pekerjaan",
				type: "hidden",
				css: 'hide'
			},
			{
				name: "nama_pekerjaan", 
				type: "text", 
				width: 150
			},
			{
				type: "control"
			}
			]

		})
	});
</script>