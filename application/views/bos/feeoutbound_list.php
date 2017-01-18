		<link href='<?= base_url()?>assets/css/bootstrap-table.min.css' rel='stylesheet' type='text/css'/>

		<script src='<?= base_url()?>assets/js/feeoutbound_list.js'></script>

		<input type='hidden' id='baseUrl' value='<?= base_url()?>'>
		<input type='hidden' id='ROLE_ADMIN' value='<?= ROLE_ADMIN ?>'>
		<input type='hidden' id='ROLE_SERVICE' value='<?= ROLE_SERVICE ?>'>
		<input type='hidden' id='ROLE_SERVICE_S' value='<?= ROLE_SERVICE_S ?>'>
		<input type='hidden' id='ROLE_VP' value='<?= ROLE_VP ?>'>
		<input type='hidden' id='ROLE_SALES_S' value='<?= ROLE_SALES_S ?>'>		

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
		window.location = '<?= base_url()?>bos/feeoutbound_edit';
	});	

	$('#tblmain').bootstrapTable({
		toggle:"table",
		idField: 'id',
		url: '<?= base_url()?>bos/apiGetFeeoutbound',
		formatSearch:function(){
			return '<?= $lang->line('search').' '.$lang->line('id')?>';
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
			title: "<?= $lang->line('id') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"10%",	
			class:"text-nowrap"
		},{
			field:'labor_id' ,
			title: "<?= $lang->line('worker_id') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"10%",
			class:"text-nowrap",
			searchable:false
		},{
			field:'l_name_tw' ,
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
			width:"10%",
			class:"text-nowrap",
			searchable:false
		},{
			field:'l_c_outbound_date' ,
			title: "<?= $lang->line('outbound_date') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"10%",
			class:"text-nowrap",
			searchable:false
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
			field: 'a_descr' ,
			title: "<?= $lang->line('reject_descr') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"15%",
			formatter: descrFormatter,			
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
			searchable:false
		}]
	});
})
function descrFormatter(val, row, index) {
	return val;
	return "<?= $lang->line("+ val+ ") ?>";
} 

</script>