		<link href='<?= base_url()?>assets/css/bootstrap-table.min.css' rel='stylesheet' type='text/css'/>

		<script src='<?= base_url()?>assets/js/labor_list.js'></script>

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
		window.location = '<?= base_url()?>eam/labor_edit';
	});	

	$('#tblmain').bootstrapTable({
		toggle:"table",
		idField: 'id',
		url: '<?= base_url()?>eam/apiGetLabor',
		formatSearch:function(){
			return '<?= $lang->line('search').' '.$lang->line('worker_id') ?>';
		},
		sortName:"id",
		sortOrder:"desc",
		selectItemName:"toolbar1",
		sidePagination:"client",
		pagination:"true",
		search:true,
		pageSize: 10,
		pageList:"[10, 50, 100]",
		columns: [{
			field:'id' ,
			title: "<?= $lang->line('worker_id') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"10%",	
			class:"text-nowrap"
		},{
			field:'a_name_tw' ,
			title: "<?= $lang->line('name_tw') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"10%",
			class:"text-nowrap",
			searchable:false
		},{
			field:'a_name_en' ,
			title: "<?= $lang->line('name_en') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"10%",
			class:"text-nowrap",
			searchable:false
		},{
			field:'a_gender' ,
			title: "<?= $lang->line('sex') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"10%",
			formatter: a_genderFormatter,
			class:"text-nowrap",
			searchable:false
		},{
			field:'a_birthday' ,
			title: "<?= $lang->line('birthday') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"10%",
			class:"text-nowrap",
			searchable:false
		},{			
			field:'' ,
			title: "<?= $lang->line('oprate') ?>",
			halign:"center" ,
			align:"left",
			width:"10%",
			formatter: operateFormatter,
			events: operateEvents,
			class:"text-nowrap",
			searchable:false
		}]
	});
})
function a_genderFormatter(value, row, index) {
	var ary = <?= $json_a_gender ?>;
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
/*
		if((row.c_outbound_file_path != null) && (row.c_outbound_file_path.length > 0)) {
			ary_ret.push(
				'　',
				'<a class="mdl1 ml10" href="javascript:void(0)" title="<?= $lang->line('doc_file_path') ?>">',
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
				'<a class="mdl2 ml10" href="javascript:void(0)" title="<?= $lang->line('c_run_file_path') ?>">',
					'<i class="glyphicon glyphicon-cloud-download"></i>',
				'</a>'
			);
		} else {
			ary_ret.push(
				'　',
				'<i class="glyphicon glyphicon-ban-circle"></i>'
			);		
		}
*/
		return ary_ret.join('');
	}
</script>
