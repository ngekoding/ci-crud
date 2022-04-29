var site_url = document.querySelector('meta[name="site-url"]').content

var table_post;
var delete_post;

$(document).ready(function() {
	delete_post = function(id, title) {
		var confirmed = confirm(`Are you sure to delete ${title}?`);

		if (confirmed) {
			$.ajax({
				url: site_url + '/post/ajax_delete',
				method: 'POST',
				data: { id },
				dataType: 'json',
				success: function() {
					table_post.draw();
					$.toast({
						icon: 'success',
						heading: 'Success',
						text: 'The post successfully deleted.',
						position: 'bottom-right'
					});
				},
				error: function() {
					$.toast({
						icon: 'error',
						heading: 'Error',
						text: 'Something went wrong!',
						position: 'bottom-right'
					});
				}
			})
		}
	}

	/**
	 * For the simple reason,
	 * we will use the same modal for 'add new' and 'edit'
	 */
	$('#modal-post').on('shown.bs.modal', function(e) {
		var id = $(e.relatedTarget).data('id');
		var modal = $(this);
		var form = modal.find('form');

		// Reset form value every modal shown
		form.trigger('reset');

		// Because we have an input hidden for the ID
		// The reset above won't reset this field
		form.find('input[type="hidden"]').val('');

		// Change modal title
		modal.find('.modal-title').html(id !== undefined ? 'Edit post' : 'Add new post');

		// If the ID exists, so it we are going to edit
		if (id) {
			// Get post detail to edit
			$.ajax({
				url: site_url + '/post/ajax_get/' + id,
				success: function(data) {
					var post = data.data;
					form.find('.id').val(post.id);
					form.find('.title').val(post.title);
					form.find('.description').val(post.description);
					form.find('.category').val(post.category_id);
				}
			});
		}
	});

	$('#modal-post .btn-save').on('click', function() {
		var modal = $('#modal-post');
		var form = modal.find('form');

		$.ajax({
			url: site_url + '/post/ajax_store',
			method: 'POST',
			data: form.serialize(),
			success: function() {
				modal.modal('hide');
				table_post.draw();
				$.toast({
					icon: 'success',
					heading: 'Success',
					text: 'The post successfully saved.',
					position: 'bottom-right'
				});
			},
			error: function() {
				$.toast({
					icon: 'error',
					heading: 'Error',
					text: 'Something went wrong!',
					position: 'bottom-right'
				});
			}
		})
	});

	table_post = $('#table-post').DataTable({
		processing: true,
		serverSide: true,
		ajax: site_url + '/post/ajax_datatables',
		order: [],
		columns: [
			{
				data: 'row_number',
				searchable: false,
				orderable: false,
				className: 'text-center'
			},
			{ data: 'title' },
			{ data: 'category' },
			{ data: 'description' },
			{
				data: null,
				searchable: false,
				orderable: false,
				render: function(data, type, row, meta) {
					if (type == 'display') {
						var btn_delete = `<button class="btn btn-danger btn-sm" onclick="delete_post('${row.id}', '${row.title}')">Delete</button>`;
						var btn_edit = `<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-post" data-id="${row.id}">Edit</button>`;
						return `${btn_edit} ${btn_delete}`;
					}
					return data;
				}
			},
		],
		// Individual column filter
		initComplete: function () {
			var settings = this.api().settings()[0];

			// Apply only when the column is searchable
			this.api().columns().every(function (idx) {
				var column = this;
				var title = column.header().innerHTML;
				var searchable = settings.aoColumns[idx].bSearchable;

				if (searchable) {
					$(`<input class="form-control form-control-sm" placeholder="Search ${title}" />`)
						.appendTo($(column.footer()).empty())
						.on('change keyup clear', function() {
							if (column.search() !== this.value) {
								column.search(this.value)
											.draw();
							}
						})
				} else {
					$(column.footer()).empty();
				}
			});
		}
	})

	$('#table-post-array').DataTable({
		processing: true,
		serverSide: true,
		ajax: site_url + '/post/ajax_datatables_array',
		order: [],
	})
})
