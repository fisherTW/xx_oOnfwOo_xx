		<link href='<?= base_url()?>assets/css/bootstrap-table.min.css' rel='stylesheet' type='text/css'/>

		<script src='<?= base_url()?>assets/js/fee_client_list.js'></script>

		<input type='hidden' id='baseUrl' value='<?= base_url()?>'>
		<input type='hidden' id='ROLE_ADMIN' value='<?= ROLE_ADMIN ?>'>
		<input type='hidden' id='ROLE_SERVICE' value='<?= ROLE_SERVICE ?>'>
		<input type='hidden' id='ROLE_SERVICE_S' value='<?= ROLE_SERVICE_S ?>'>
		<input type='hidden' id='ROLE_VP' value='<?= ROLE_VP ?>'>		

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
		window.location = '<?= base_url()?>crm/fee_client_edit';
	});	

	$('#tblmain').bootstrapTable({
		toggle:"table",
		idField: 'id',
		url: '<?= base_url()?>crm/apiGetFeeClient',
		formatSearch: function () {
			return '<?= $lang->line('search').' '.$lang->line('client') ?>';
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
			field:'client_alias' ,
			title: "<?= $lang->line('client') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"10%",
			class:"text-nowrap",
		},{
			field:'employer_alias' ,
			title: "<?= $lang->line('employer') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"15%",
			class:"text-nowrap",
			searchable: false
		},{
			field:'fee_name' ,
			title: "<?= $lang->line('1-3-1') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"15%",
			class:"text-nowrap",
			searchable: false
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
			width:"10%",
			formatter: operateFormatter,
			events: operateEvents,
			class:"text-nowrap",
			searchable: false
		}]
	});
})	
</script>
