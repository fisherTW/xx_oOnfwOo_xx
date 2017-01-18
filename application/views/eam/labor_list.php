		<link href='<?= base_url()?>assets/css/bootstrap-table.min.css' rel='stylesheet' type='text/css'/>

		<script src='<?= base_url()?>assets/js/labor_list.js'></script>

		<input type='hidden' id='baseUrl' value='<?= base_url()?>'>
		<input type='hidden' id='ROLE_ADMIN' value='<?= ROLE_ADMIN ?>'>
		<input type='hidden' id='ROLE_SERVICE' value='<?= ROLE_SERVICE ?>'>	
		<input type='hidden' id='hid_type' value='<?= $type ?>'>

		<div class='container'>			
			<div class="row">
				<h1><?= $title ?></h1>
				<h1></h1>
<?php if ($type != '241'): ?>
				<button type="button" class='btn btn-primary' name="btn_create" id="btn_create">Create</button>
<?php endif; ?>		
				<h1></h1>
				<table id='tblmain'>
				</table>
			</div>
		</div>

<script src='<?= base_url()?>assets/js/bootstrap-table.min.js'></script>
<script type="text/javascript">
$(function () {
	$("#btn_create").bind("click",function(){
		window.location = '<?= base_url()?>eam/labor_edit/0/'+'<?= $type ?>';
	});	

	if ('<?= $type ?>' == '411') {
		var url = '<?= base_url()?>eam/apiGetLabor/411';
		var labor_id = '<?= $lang->line('labor_id') ?>';
	} else if ('<?= $type ?>' == '412') {
		var	url = '<?= base_url()?>eam/apiGetLabor/412';
		var labor_id = '<?= $lang->line('student_no') ?>';
	} else {
		var	url = '<?= base_url()?>eam/apiGetLabor/241';		
		var labor_id = '<?= $lang->line('worker_id') ?>';
	}

	$('#tblmain').bootstrapTable({
		toggle:"table",
		idField: 'id',
		url: url,
		formatSearch: function () {
			return '<?= $lang->line('search').' '.$lang->line('name_tw').'、'.$lang->line('name_en') ?>';
		},
		sortName:"id",
		sortOrder:"desc",
		selectItemName:"toolbar1",
		sidePagination:"client",
		pagination: true ,
		search: true ,
		pageSize: 10,
		pageList:"[10, 50, 100]",
		columns: [{
			field:'id' ,
			title: labor_id,
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"10%",
			class:"text-nowrap",
			searchable: false
		},{
			field:'a_name_tw' ,
			title: "<?= $lang->line('name_tw') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"10%",
			class:"text-nowrap"
		},{
			field:'a_name_en' ,
			title: "<?= $lang->line('name_en') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"20%",
			class:"text-nowrap"
		},{
			field:'country_tw' ,
			title: "<?= $lang->line('1-1-1') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"15%",
			class:"text-nowrap",
			searchable: false
		},{
			field:'a_worker_kind' ,
			title: "<?= $lang->line('worker_kind') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"15%",
			formatter: worker_kindFormatter,			
			class:"text-nowrap",
			searchable: false
		},{
			field:'' ,
			title: "<?= $lang->line('oprate') ?>",
			halign:"center" ,
			align:"left",
			width:"20%",
			formatter: operateFormatter,
			events: operateEvents,
			class:"text-nowrap",
			searchable: false
		}]
	});
})
function worker_kindFormatter(value, row, index) {
	var ary = <?= $json_worker_kind ?>;
	return ary[parseInt(value)];
}
function operateFormatter(value, row, index) {
	var ary_ret = [
		'<a class="medit ml10" href="javascript:void(0)" title="Edit">',
			'<i class="glyphicon glyphicon-edit"></i>',
		'</a>','　',
		'<a class="mremove ml10" href="javascript:void(0)" title="Remove">',
			'<i class="glyphicon glyphicon-trash"></i>',
		'</a>'
	];

	if((row.a_file_path != null) && (row.a_file_path.length > 0)) {
		ary_ret.push(
			'　',
			'<a class="mdl1 ml10" href="javascript:void(0)" title="<?= $lang->line('labor_file') ?>">',
				'<i class="glyphicon glyphicon-cloud-download"></i>',
			'</a>'
		);
	} else {
		ary_ret.push(
			'　',
			'<i class="glyphicon glyphicon-ban-circle"></i>'
		);
	}
	if((row.a_file_path2 != null) && (row.a_file_path2.length > 0)) {
		ary_ret.push(
			'　',
			'<a class="mdl2 ml10" href="javascript:void(0)" title="<?= $lang->line('labor_file2') ?>">',
				'<i class="glyphicon glyphicon-cloud-download"></i>',
			'</a>'
		);
	} else {
		ary_ret.push(
			'　',
			'<i class="glyphicon glyphicon-ban-circle"></i>'
		);
	}
	if((row.a_file_path3 != null) && (row.a_file_path3.length > 0)) {
		ary_ret.push(
			'　',
			'<a class="mdl3 ml10" href="javascript:void(0)" title="<?= $lang->line('labor_file3') ?>">',
				'<i class="glyphicon glyphicon-cloud-download"></i>',
			'</a>'
		);
	} else {
		ary_ret.push(
			'　',
			'<i class="glyphicon glyphicon-ban-circle"></i>'
		);
	}
	if((row.a_file_path4 != null) && (row.a_file_path4.length > 0)) {
		ary_ret.push(
			'　',
			'<a class="mdl4 ml10" href="javascript:void(0)" title="<?= $lang->line('labor_file4') ?>">',
				'<i class="glyphicon glyphicon-cloud-download"></i>',
			'</a>'
		);
	} else {
		ary_ret.push(
			'　',
			'<i class="glyphicon glyphicon-ban-circle"></i>'
		);
	}
	if((row.a_file_path5 != null) && (row.a_file_path5.length > 0)) {
		ary_ret.push(
			'　',
			'<a class="mdl5 ml10" href="javascript:void(0)" title="<?= $lang->line('labor_file5') ?>">',
				'<i class="glyphicon glyphicon-cloud-download"></i>',
			'</a>'
		);
	} else {
		ary_ret.push(
			'　',
			'<i class="glyphicon glyphicon-ban-circle"></i>'
		);
	}
	if((row.a_file_path6 != null) && (row.a_file_path6.length > 0)) {
		ary_ret.push(
			'　',
			'<a class="mdl6 ml10" href="javascript:void(0)" title="<?= $lang->line('labor_file6') ?>">',
				'<i class="glyphicon glyphicon-cloud-download"></i>',
			'</a>'
		);
	} else {
		ary_ret.push(
			'　',
			'<i class="glyphicon glyphicon-ban-circle"></i>'
		);
	}
	if((row.a_file_path7 != null) && (row.a_file_path7.length > 0)) {
		ary_ret.push(
			'　',
			'<a class="mdl7 ml10" href="javascript:void(0)" title="<?= $lang->line('labor_file7') ?>">',
				'<i class="glyphicon glyphicon-cloud-download"></i>',
			'</a>'
		);
	} else {
		ary_ret.push(
			'　',
			'<i class="glyphicon glyphicon-ban-circle"></i>'
		);
	}
	if((row.a_file_path8 != null) && (row.a_file_path8.length > 0)) {
		ary_ret.push(
			'　',
			'<a class="mdl8 ml10" href="javascript:void(0)" title="<?= $lang->line('labor_file8') ?>">',
				'<i class="glyphicon glyphicon-cloud-download"></i>',
			'</a>'
		);
	} else {
		ary_ret.push(
			'　',
			'<i class="glyphicon glyphicon-ban-circle"></i>'
		);
	}
	if((row.a_file_path9 != null) && (row.a_file_path9.length > 0)) {
		ary_ret.push(
			'　',
			'<a class="mdl9 ml10" href="javascript:void(0)" title="<?= $lang->line('labor_file9') ?>">',
				'<i class="glyphicon glyphicon-cloud-download"></i>',
			'</a>'
		);
	} else {
		ary_ret.push(
			'　',
			'<i class="glyphicon glyphicon-ban-circle"></i>'
		);
	}
	
	if((row.a_license != null) && (row.a_license.length > 0)) {
		ary_ret.push(
			'　',
			'<a class="mdl12 ml10" href="javascript:void(0)" title="<?= $lang->line('license') ?>">',
				'<i class="glyphicon glyphicon-cloud-download"></i>',
			'</a>'
		);
	} else {
		ary_ret.push(
			'　',
			'<i class="glyphicon glyphicon-ban-circle"></i>'
		);
	}

	if((row.c_outbound_file_path != null) && (row.c_outbound_file_path.length > 0)) {
		ary_ret.push(
			'　',
			'<a class="mdl10 ml10" href="javascript:void(0)" title="<?= $lang->line('doc_file_path') ?>">',
				'<i class="glyphicon glyphicon-cloud-download"></i>',
			'</a>'
		);
	} else {
		ary_ret.push(
			'　',
			'<i class="glyphicon glyphicon-ban-circle"></i>'
		);
	}

	if((row.c_run_file_path != null) && (row.c_run_file_path.length > 0)) {
		ary_ret.push(
			'　',
			'<a class="mdl11 ml10" href="javascript:void(0)" title="<?= $lang->line('c_run_file_path') ?>">',
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
</script>