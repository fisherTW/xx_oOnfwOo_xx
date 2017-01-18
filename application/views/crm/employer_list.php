		<link href='<?= base_url()?>assets/css/bootstrap-table.min.css' rel='stylesheet' type='text/css'/>

		<script src='<?= base_url()?>assets/js/employer_list.js'></script>

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
		window.location = '<?= base_url()?>crm/employer_edit';
	});	

	$('#tblmain').bootstrapTable({
		toggle:"table",
		idField: 'id',
		url: '<?= base_url()?>crm/apiGetEmployer',
		formatSearch: function () {
			return '<?= $lang->line('search').' '.$lang->line('alias').'、'.$lang->line('vatnumber') ?>';
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
			title: "<?= $lang->line('employer_id') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"10%",
			class:"text-nowrap",
			searchable: false
		},{
			field:'taxid' ,
			title: "<?= $lang->line('vatnumber').' / '.$lang->line('idno') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"15%",
			class:"text-nowrap"
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
			field:'tw_industry' ,
			title: "<?= $lang->line('1-1-10') ?>",
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
			'<a class="mdl1 ml10" href="javascript:void(0)" title="<?= $lang->line('company_history') ?>">',
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
