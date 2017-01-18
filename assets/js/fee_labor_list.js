function operateFormatter(value, row, index) {
	if( row.a_result == '1') {
		var ary_ret = [
			'<a href="javascript:void(0)" title="You can\'t Edit">',
				'<i class="glyphicon glyphicon-edit" style="color: gray;"></i>',
			'</a>'
		];
		if ( row.a_status != '通過') {
			if($('#hid_sess_role').val() == $('#ROLE_FINANCE_OUT_S').val()) {
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
		window.location = $('#baseUrl').val() + 'eam/fee_labor_edit/' + row.id + '/' +$('#hid_type').val();
	},
	'click .audit': function (e, value, row, index) {
		window.location = $('#baseUrl').val() + 'eam/fee_labor_audit/' + row.id + '/' +$('#hid_type').val();
	},
};

