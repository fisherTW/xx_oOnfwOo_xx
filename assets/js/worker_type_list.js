function operateFormatter(value, row, index) {
		return [
			'<a class="medit ml10" href="javascript:void(0)" title="Edit">',
				'<i class="glyphicon glyphicon-edit"></i>',
			'</a>','　',
			'<a class="mremove ml10" href="javascript:void(0)" title="Remove">',
				'<i class="glyphicon glyphicon-trash"></i>',
			'</a>'
		].join('');
}

function worker_type_major_formatter(value, row, index) {
	var ary_workertype = JSON.parse($('#JSON_WORKER_TYPE').val());

	return ary_workertype[value];
}

window.operateEvents = {
	'click .medit': function (e, value, row, index) {
		window.location = $('#baseUrl').val() + 'config2/worker_type_edit/' + row.worker_type_major_id + '_' + row.worker_type_minor_id ;
	},
	'click .mremove': function (e, value, row, index) {
		$.ajax({
			type: "POST",
			url: $('#baseUrl').val() + 'config2/worker_type_doDel/' + row.worker_type_major_id + '_' + row.worker_type_minor_id,
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
