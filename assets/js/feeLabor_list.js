function operateFormatter(value, row, index) {
	if(row.a_result == '1') {
		var ary_ret = [
			'<a href="javascript:void(0)" title="You can\'t Edit">',
				'<i class="glyphicon glyphicon-edit" style="color: gray;"></i>',
			'</a>'
		];
		if ( row.a_status != '通過') {
			if(($('#hid_sess_role').val() == $('#ROLE_SERVICE_S').val()) || 
				($('#hid_sess_role').val() == $('#ROLE_VP').val())) {
				ary_ret.push(
					'　',
					'<a class="audit ml10" href="javascript:void(0)" title="Audit">',
						'<i class="glyphicon glyphicon-eye-close"></i>',
					'</a>'
				);
			}
		}
	} else {
		var ary_ret = [
			'<a class="medit ml10" href="javascript:void(0)" title="Edit">',
				'<i class="glyphicon glyphicon-edit"></i>',
			'</a>'
		];
	}

	return ary_ret.join('');
}
window.operateEvents = {
	'click .medit': function (e, value, row, index) {
		window.location = $('#baseUrl').val() + 'bos/feeLabor_edit/' + row.id ;
	},
	'click .audit': function (e, value, row, index) {
		window.location = $('#baseUrl').val() + 'bos/feeLabor_audit/' + row.id ;
	},	
	'click .mdl1': function (e, value, row, index) {
		window.location = $('#baseUrl').val() + 'dl/dodl/' + row.file_path ;
	},
	'click .mdl2': function (e, value, row, index) {
		window.location = $('#baseUrl').val() + 'dl/dodl/' + row.acc_file_path_tw ;
	},
	'click .mdl3': function (e, value, row, index) {
		window.location = $('#baseUrl').val() + 'dl/dodl/' + row.acc_file_path_en ;
	},
	'click .mdl4': function (e, value, row, index) {
		window.location = $('#baseUrl').val() + 'dl/dodl/' + row.acc_file_path_ph ;
	},	
	'click .mremove': function (e, value, row, index) {
		$.ajax({
			type: "POST",
			url: $('#baseUrl').val() + 'bos/feeLabor_doDel/' + row.id,
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
