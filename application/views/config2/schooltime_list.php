		<link href='<?= base_url()?>assets/css/bootstrap-table.min.css' rel='stylesheet' type='text/css'/>

		<script src='<?= base_url()?>assets/js/schooltime_list.js'></script>

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
		window.location = '<?= base_url()?>config2/schooltime_edit';
	});	

	$('#tblmain').bootstrapTable({
		toggle:"table",
		idField: 'id',
		url: '<?= base_url()?>config2/apiGetSchooltime',
		sortName:"schoolname",
		sortOrder:"asc",
		selectItemName:"toolbar1",
		sidePagination:"client",
		pagination:"true",
		pageSize: 10,
		pageList:"[10, 50, 100]",
		columns: [{
			field:'schoolname' ,
			title: "<?= $lang->line('schoolname') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"30%",
			class:"text-nowrap"
		},{
			field:'section' ,
			title: "<?= $lang->line('section') ?>",
			halign:"center" ,
			align:"right" ,
			sortable:"true" ,
			width:"5%",
			class:"text"
		},{	
			field:'time_start' ,
			title: "<?= $lang->line('time_start') ?>",
			halign:"center" ,
			align:"right" ,
			sortable:"true" ,
			width:"30%",
			class:"text"
		},{	
			field:'time_end' ,
			title: "<?= $lang->line('time_end') ?>",
			halign:"center" ,
			align:"right" ,
			sortable:"true" ,
			width:"25%",
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
