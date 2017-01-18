function operateFormatter(value, row, index) {
	var ary_ret = [
		'<a class="medit ml10" href="javascript:void(0)" title="Edit">',
			'<i class="glyphicon glyphicon-edit"></i>',
		'</a>','　',
		'<a class="mremove ml10" href="javascript:void(0)" title="Remove">',
			'<i class="glyphicon glyphicon-trash"></i>',
		'</a>'
	];

	if((row.file_path != null) && (row.file_path.length > 0)) {
		ary_ret.push(
			'　',
			'<a class="mdl1 ml10" href="javascript:void(0)" title="download">',
				'<i class="glyphicon glyphicon-cloud-download"></i>',
			'</a>'
		);
	} else {
		ary_ret.push(
			'　',
			'<i class="glyphicon glyphicon-ban-circle"></i>'
		);		
	}
	return ary_ret.join('');
	
}

window.operateEvents = {
	'click .medit': function (e, value, row, index) {
		window.location = $('#baseUrl').val() + 'eam/course_edit/' + row.id ;
	},
	'click .mremove': function (e, value, row, index) {
		$.ajax({
			type: "POST",
			url: $('#baseUrl').val() + 'eam/course_doDel/' + row.id,
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
	},
	'click .mdl1': function (e, value, row, index) {
		window.location = $('#baseUrl').val() + 'dl/dodl/' + row.file_path ;
	}	
};