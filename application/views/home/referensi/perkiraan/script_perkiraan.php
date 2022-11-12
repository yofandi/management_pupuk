<script>
	$(document).ready(function() {
		$('#grid_table').jsGrid({
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
						url: "<?= site_url('Referensi/get_perkiraan') ?>",
						data: filter
					});
				},
				insertItem: function(item){
					return $.ajax({
						type: "POST",
						url: "<?= site_url('Referensi/insert_perkiraan') ?>",
						data:item
					});
				},
				updateItem: function(item){
					return $.ajax({
						type: "PUT",
						url: "<?= site_url('Referensi/update_perkiraan') ?>",
						data: item
					});
				},
				deleteItem: function(item){
					return $.ajax({
						type: "DELETE",
						url: "<?= site_url('Referensi/delete_perkiraan') ?>",
						data: item
					});
				},
			},

			fields: [
			{
				name: "id_perkiraan",
				type: "hidden",
				css: 'hide'
			},
			{
				name: "no_perkiraan", 
				type: "text", 
				width: 150
			},
			{
				name: "nama_perkiraan", 
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