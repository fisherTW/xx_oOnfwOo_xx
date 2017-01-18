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

function networkFormatter(value, row, index) {
	var JSON_NETWORK_TYPE = $('#JSON_NETWORK_TYPE').val();
	var ary_network_type = JSON.parse(JSON_NETWORK_TYPE);
	return ary_network_type[value];
}

function is_woman_okFormatter(value, row, index) {
	if(value == 0) {
		var is_woman_ok = '<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>';
	} else {
		var is_woman_ok = '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>';
	}

	return is_woman_ok;
}

window.operateEvents = {
	'click .medit': function (e, value, row, index) {
		window.location = $('#baseUrl').val() + 'config/hotel_edit/' + row.id ;
	},
	'click .mremove': function (e, value, row, index) {
		$.ajax({
			type: "POST",
			url: $('#baseUrl').val() + 'config/hotel_doDel/' + row.id,
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
