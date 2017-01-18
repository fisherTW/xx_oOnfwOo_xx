function ynFormatter(value, row, index) {
	if(value == 0) {
		var ret = '<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>';
	} else {
		var ret = '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>';
	}

	return ret;
}

function sexFormatter(value, row, index) {
	if(value == 0) {
		var ret = 'F';
	} else {
		var ret = 'M';
	}

	return ret;
}