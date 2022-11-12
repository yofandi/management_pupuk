<script src="<?= base_url() ?>assets/vendors/js/vendor.bundle.base.js"></script>
<script src="<?= base_url() ?>assets/vendors/js/vendor.bundle.addons.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.5/js/bootstrap-select.min.js"></script>
<!-- costumizable datetime picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>

<script src="<?= base_url() ?>assets/js/shared/off-canvas.js"></script>
<script src="<?= base_url() ?>assets/js/shared/hoverable-collapse.js"></script>
<script src="<?= base_url() ?>assets/js/shared/misc.js"></script>
<script src="<?= base_url() ?>assets/js/shared/todolist.js"></script>
<script src="<?= base_url() ?>assets/js/shared/widgets.js"></script>
<script src="<?= base_url() ?>assets/js/shared/data-table.js"></script>
<script>
	$.extend(true, $.fn.datetimepicker.defaults, {
		icons: {
			time: 'far fa-clock',
			date: 'far fa-calendar',
			up: 'fas fa-arrow-up',
			down: 'fas fa-arrow-down',
			previous: 'fas fa-chevron-left',
			next: 'fas fa-chevron-right',
			today: 'fas fa-calendar-check',
			clear: 'far fa-trash-alt',
			close: 'far fa-times-circle'
		}
	});

	$('#datetimepicker1').datetimepicker({
		inline: true,
		sideBySide: true
	});

	$('#datetimepicker2').datetimepicker({
		inline: true,
		sideBySide: true
	});
	
	load_fullname_users();
	function load_fullname_users() {
		$.ajax({
			url: '<?= site_url('Login/show_fullname') ?>',
			dataType: 'json',
		})
		.done(function(data) {;
			let fullname_navbar = 'Hello, ' + data.full_name;
			$('#fullname_sidebar').html(data.full_name);
			$('#fullname_navbar').html(fullname_navbar);
			$('#name_level').html(data.name_level);
		});
	}
</script>