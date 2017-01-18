		<link href='<?= base_url()?>assets/css/bootstrap-table.min.css' rel='stylesheet' type='text/css'/>

		<script src='<?= base_url()?>assets/js/client_list.js'></script>

		<input type='hidden' id='baseUrl' value='<?= base_url()?>'>
		<input type='hidden' id='ROLE_ADMIN' value='<?= ROLE_ADMIN ?>'>
		<input type='hidden' id='ROLE_SERVICE' value='<?= ROLE_SERVICE ?>'>

		<div class='container'>
			<div class="row">
				<h1><?= $title ?></h1>
				<h1></h1>
				<button type="button" class='btn btn-primary' name="btn_create" id="btn_create">Create</button>
				<h1></h1>
				<table id='tblmain'>
				</table>
			</div>
		</div>

<script src='<?= base_url()?>assets/js/bootstrap-table.min.js'></script>
<script type="text/javascript">
$(function () {
	$("#btn_create").bind("click",function(){
		window.location = '<?= base_url()?>crm/client_edit';
	});	

	$('#tblmain').bootstrapTable({
		toggle:"table",
		idField: 'id',
		url: '<?= base_url()?>crm/apiGetClient',
		formatSearch: function () {
			return '<?= $lang->line('search').' '.$lang->line('alias') ?>';
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
			field:'is_client' ,
			title: "<?= $lang->line('is_client') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"5%",	
			formatter: is_clientFormatter,
			class:"text-nowrap",
			searchable: false
		},{
			field:'id' ,
			title: "<?= $lang->line('client_id') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"10%",
			class:"text-nowrap",
			searchable: false
		},{
			field:'license' ,
			title: "<?= $lang->line('liense') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"10%",
			class:"text-nowrap",
			searchable: false
		},{
			field:'alias' ,
			title: "<?= $lang->line('alias') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"15%",
			class:"text-nowrap"
		},{
			field:'tw_area' ,
			title: "<?= $lang->line('1-1-9') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"15%",
			class:"text-nowrap",
			searchable: false
		},{
			field:'tw_sales' ,
			title: "<?= $lang->line('sales_id') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"15%",
			class:"text-nowrap",
			searchable: false
		},{
			field:'' ,
			title: "<?= $lang->line('oprate') ?>",
			halign:"center" ,
			align:"left",
			width:"10%",
			formatter: operateFormatter,
			events: operateEvents,
			class:"text-nowrap",
			searchable: false
		}]
	});
})
function is_clientFormatter(value, row, index) {
	var ary = <?= $json_is_client ?>;
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

	if((row.file_path != null) && (row.file_path.length > 0)) {
		ary_ret.push(
			'　',
			'<a class="mdl1 ml10" href="javascript:void(0)" title="<?= $lang->line('liense') ?>">',
				'<i class="glyphicon glyphicon-cloud-download"></i>',
			'</a>'
		);
	} else {
		ary_ret.push(
			'　',
			'<i class="glyphicon glyphicon-ban-circle"></i>'
		);
	}
	if((row.acc_file_path_tw != null) && (row.acc_file_path_tw.length > 0)) {
		ary_ret.push(
			'　',
			'<a class="mdl2 ml10" href="javascript:void(0)" title="<?= $lang->line('acc_bank_tw') ?>">',
				'<i class="glyphicon glyphicon-cloud-download"></i>',
			'</a>'
		);
	} else {
		ary_ret.push(
			'　',
			'<i class="glyphicon glyphicon-ban-circle"></i>'
		);
	}
	if((row.acc_file_path_en != null) && (row.acc_file_path_en.length > 0)) {
		ary_ret.push(
			'　',
			'<a class="mdl3 ml10" href="javascript:void(0)" title="<?= $lang->line('acc_bank_en') ?>">',
				'<i class="glyphicon glyphicon-cloud-download"></i>',
			'</a>'
		);
	} else {
		ary_ret.push(
			'　',
			'<i class="glyphicon glyphicon-ban-circle"></i>'
		);
	}
	if((row.acc_file_path_ph != null) && (row.acc_file_path_ph.length > 0)) {
		ary_ret.push(
			'　',
			'<a class="mdl4 ml10" href="javascript:void(0)" title="<?= $lang->line('acc_bank_ph') ?>">',
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
