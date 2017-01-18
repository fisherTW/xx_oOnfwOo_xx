window.operateEvents = {
	'click .medit': function (e, value, row, index) {
		window.location = $('#baseUrl').val() + 'eam/labor_edit/' + row.id + '/' +$('#hid_type').val();
	},
	'click .mdl1': function (e, value, row, index) {
		window.location = $('#baseUrl').val() + 'dl/dodl/' + row.a_file_path ;
	},
	'click .mdl2': function (e, value, row, index) {
		window.location = $('#baseUrl').val() + 'dl/dodl/' + row.a_file_path2 ;
	},
	'click .mdl3': function (e, value, row, index) {
		window.location = $('#baseUrl').val() + 'dl/dodl/' + row.a_file_path3 ;
	},
	'click .mdl4': function (e, value, row, index) {
		window.location = $('#baseUrl').val() + 'dl/dodl/' + row.a_file_path4 ;
	},
	'click .mdl5': function (e, value, row, index) {
		window.location = $('#baseUrl').val() + 'dl/dodl/' + row.a_file_path5 ;
	},
	'click .mdl6': function (e, value, row, index) {
		window.location = $('#baseUrl').val() + 'dl/dodl/' + row.a_file_path6 ;
	},
	'click .mdl7': function (e, value, row, index) {
		window.location = $('#baseUrl').val() + 'dl/dodl/' + row.a_file_path7 ;
	},
	'click .mdl8': function (e, value, row, index) {
		window.location = $('#baseUrl').val() + 'dl/dodl/' + row.a_file_path8 ;
	},
	'click .mdl9': function (e, value, row, index) {
		window.location = $('#baseUrl').val() + 'dl/dodl/' + row.a_file_path9 ;
	},
	'click .mdl12': function (e, value, row, index) {
		window.location = $('#baseUrl').val() + 'dl/dodl/' + row.a_license ;
	},
	'click .mdl10': function (e, value, row, index) {
		window.location = $('#baseUrl').val() + 'dl/dodl/' + row.c_outbound_file_path ;
	},
	'click .mdl11': function (e, value, row, index) {
		window.location = $('#baseUrl').val() + 'dl/dodl/' + row.c_run_file_path ;
	},
	'click .mremove': function (e, value, row, index) {
		$.ajax({
			type: "POST",
			url: $('#baseUrl').val() + 'eam/labor_doDel/' + row.id,
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
