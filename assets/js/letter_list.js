window.operateEvents = {
	'click .medit': function (e, value, row, index) {
		window.location = $('#baseUrl').val() + 'docmanage/letter_edit/' + row.id ;
	},
	'click .mdl1': function (e, value, row, index) {
		window.location = $('#baseUrl').val() + 'dl/dodl/' + row.file_path ;
	},
	'click .mdl2': function (e, value, row, index) {
		window.location = $('#baseUrl').val() + 'dl/dodl/' + row.inbound_file_path ;
	},
	'click .mremove': function (e, value, row, index) {
		$.ajax({
			type: "POST",
			url: $('#baseUrl').val() + 'docmanage/letter_doDel/' + row.id,
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
