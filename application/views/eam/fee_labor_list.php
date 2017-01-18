		<link href='<?= base_url()?>assets/css/bootstrap-table.min.css' rel='stylesheet' type='text/css'/>

		<script src='<?= base_url()?>assets/js/fee_labor_list.js'></script>

		<input type='hidden' id='baseUrl' value='<?= base_url()?>'>
		<input type='hidden' id='ROLE_ADMIN' value='<?= ROLE_ADMIN ?>'>
		<input type='hidden' id='ROLE_FINANCE_OUT_S' value='<?= ROLE_FINANCE_OUT_S ?>'>
		<input type='hidden' id='hid_type' value='<?= $type ?>'>

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
		window.location = '<?= base_url()?>eam/fee_labor_edit/0/'+'<?= $type ?>';
	});	

	if ('<?= $type ?>' == '414') {
		var url = '<?= base_url()?>eam/apiGetFeeLabor/a/414';
		var labor_id = '<?= $lang->line('labor_id') ?>';
	} else if ('<?= $type ?>' == '415') {
		var	url = '<?= base_url()?>eam/apiGetFeeLabor/b/415';
		var labor_id = '<?= $lang->line('student_no') ?>';
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
			title: "<?= $lang->line('id') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"10%",
			class:"text-nowrap",
			searchable: false
		},{			
			field:'labor_id' ,
			title: labor_id,
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"10%",
			class:"text-nowrap",
			searchable: false
		},{
			field:'l_a_name_tw' ,
			title: "<?= $lang->line('name_tw') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"10%",
			class:"text-nowrap"
		},{
			field:'l_name_en' ,
			title: "<?= $lang->line('name_en') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"15%",
			class:"text-nowrap"
		},{
			field:'a_status' ,
			title: "<?= $lang->line('a_status') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"5%",
			class:"text-nowrap",
			searchable: false
		},{			
			field:'a_user' ,
			title: "<?= $lang->line('reject_user') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"15%",
			class:"text-nowrap",
			searchable: false
		},{
			field:'a_date' ,
			title: "<?= $lang->line('reject_date') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"15%",
			class:"text-nowrap",
			searchable: false
		},{
			field:'a_descr' ,
			title: "<?= $lang->line('reject_descr') ?>",
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
			width:"5%",
			formatter: operateFormatter,
			events: operateEvents,
			class:"text-nowrap",
			searchable: false
		}]
	});
})
</script>