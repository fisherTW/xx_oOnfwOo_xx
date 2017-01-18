		<link href='<?= base_url()?>assets/css/bootstrap-table.min.css' rel='stylesheet' type='text/css'/>

		<script src='<?= base_url()?>assets/js/hire_non_factory_list.js'></script>

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
		window.location = '<?= base_url()?>bos/hire_non_factory_edit';
	});	

	$('#tblmain').bootstrapTable({
		toggle:"table",
		idField: 'id',
		url: '<?= base_url()?>bos/apiGetHire_non_factory',
		sortName:"date_order",
		sortOrder:"asc",
		selectItemName:"toolbar1",
		sidePagination:"client",
		pagination:"true",
		pageSize: 10,
		pageList:"[10, 50, 100]",
		columns: [{
			field:'date_order' ,
			title: "<?= $lang->line('date_order') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"10%",
			class:"text-nowrap"
		},{
			field:'id' ,
			title: "<?= $lang->line('employed_workers_id') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"15%",
			class:"text-nowrap"
		},{
			field:'tw_c' ,
			title: "<?= $lang->line('1-1-1') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"5%",
			class:"text-nowrap"
		},{
			field:'client_name_tw' ,
			title: "<?= $lang->line('client') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"15%",
			class:"text-nowrap"
		},{
			field:'employer_name_tw' ,
			title: "<?= $lang->line('employer_id') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"15%",
			class:"text-nowrap"
		},{
			field:'worker_type_major' ,
			title: "<?= $lang->line('worker_type_major') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"10%",
			formatter: worker_type_majorFormatter,
			class:"text-nowrap"
		},{
			field:'worker_kind' ,
			title: "<?= $lang->line('worker_kind') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"10%",
			formatter: worker_kindFormatter,
			class:"text-nowrap"
		},{
			field:'worker_type_minor_id' ,
			title: "<?= $lang->line('worker_type_minor') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"10%",
			formatter: worker_type_minorFormatter,
			class:"text-nowrap"
		},{
			field:'' ,
			title: "<?= $lang->line('oprate') ?>",
			halign:"center" ,
			align:"center",
			width:"10%",
			events: operateEvents,
			formatter: operateFormatter,
			class:"text-nowrap"
		}]
	});
})

function worker_type_majorFormatter(value, row, index) {
	var ary = <?= $json_worker_type_major ?>;
	return ary[parseInt(value)];
}
function worker_type_minorFormatter(value, row, index) {
	var ary = <?= $json_worker_type_minor ?>;
	return ary[parseInt(value)];
}
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

		if((row.file_path != null) && (row.file_path.length > 0)) {
			ary_ret.push(
				'　',
				'<a class="mdl1 ml10" href="javascript:void(0)" title="<?= $lang->line('employed_workers_file_path') ?>">',
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
