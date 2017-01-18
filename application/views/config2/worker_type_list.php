		<link href='<?= base_url()?>assets/css/bootstrap-table.min.css' rel='stylesheet' type='text/css'/>

		<script src='<?= base_url()?>assets/js/worker_type_list.js'></script>

		<input type='hidden' id='baseUrl' value='<?= base_url()?>'>
		<input type='hidden' id='WORKER_TYPE_FACTORY' value='<?= WORKER_TYPE_FACTORY ?>'>
		<input type='hidden' id='WORKER_TYPE_MAID' value='<?= WORKER_TYPE_MAID ?>'>
		<input type='hidden' id='WORKER_TYPE_CARE' value='<?= WORKER_TYPE_CARE ?>'>
		<input type='hidden' id='WORKER_TYPE_TRANS' value='<?= WORKER_TYPE_TRANS ?>'>
		<input type='hidden' id='WORKER_TYPE_FISHER' value='<?= WORKER_TYPE_FISHER ?>'>
		<input type='hidden' id='JSON_WORKER_TYPE' value='<?= JSON_WORKER_TYPE ?>'>
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
		window.location = '<?= base_url()?>config2/worker_type_edit';
	});	

	$('#tblmain').bootstrapTable({
		toggle:"table",
		idField: 'worker_type_major_id',
		url: '<?= base_url()?>config2/apiGetWorker_type',
		sortName:"tw",
		sortOrder:"asc",
		selectItemName:"toolbar1",
		sidePagination:"client",
		pagination:"true",
		pageSize: 10,
		pageList:"[10, 50, 100]",
		columns: [{
			field:'tw' ,
			title: "<?= $lang->line('worker_type_minor_name') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"30%",
			class:"text-nowrap"
		},{
			field:'descr' ,
			title: "<?= $lang->line('desc') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"60%",
			class:"text"
		},{	
			field:'' ,
			title: "<?= $lang->line('oprate') ?>",
			halign:"center" ,
			align:"center",
			events: operateEvents,
			formatter: operateFormatter,
			width:"10%",
			class:"text-nowrap"
		}]
	});
})
</script>
