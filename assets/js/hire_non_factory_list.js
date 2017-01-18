window.operateEvents = {
	'click .medit': function (e, value, row, index) {
		window.location = $('#baseUrl').val() + 'bos/hire_non_factory_edit/' + row.id ;
	},
	'click .mdl1': function (e, value, row, index) {
		window.location = $('#baseUrl').val() + 'dl/dodl/' + row.file_path ;
	},
	'click .mdl2': function (e, value, row, index) {
		window.location = $('#baseUrl').val() + 'dl/dodl/' + row.f_file_path2 ;
	},
	'click .mdl3': function (e, value, row, index) {
		window.location = $('#baseUrl').val() + 'dl/dodl/' + row.f_w_file_path ;
	},
	'click .mremove': function (e, value, row, index) {
		$.ajax({
			type: "POST",
			url: $('#baseUrl').val() + 'bos/hire_non_factory_doDel/' + row.id,
			data: { id: row.id },
			statusCode: {
				200: function() {
					alert("成功刪除");
					$('#tblmain').bootstrapTable('refresh');
				}
			},
			error: function() {
				alert('刪除失敗');
			}
		});
	}
};
