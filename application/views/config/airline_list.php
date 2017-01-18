		<link href='<?= base_url()?>assets/css/bootstrap-table.min.css' rel='stylesheet' type='text/css'/>

		<script src='<?= base_url()?>assets/js/airline_list.js'></script>

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
		window.location = '<?= base_url()?>config/airline_edit';
	});	

	$('#tblmain').bootstrapTable({
		toggle:"table",
		idField: 'id',
		url: '<?= base_url()?>config/apiGetairline',
		sortName:"tw",
		sortOrder:"asc",
		selectItemName:"toolbar1",
		sidePagination:"client",
		pagination:"true",
		pageSize: 10,
		pageList:"[10, 50, 100]",
		columns: [{
			field:'tw' ,
			title: "<?= $lang->line('airlinename') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"35%",
			class:"text-nowrap"
		},{
			field:'name_init' ,
			title: "<?= $lang->line('airlinecode') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"10%",
			class:"text-nowrap"
		},{
			field:'tw_c' ,
			title: "<?= $lang->line('countryname') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"35%",
			class:"text-nowrap"
		},{
			field:'name_init_c' ,
			title: "<?= $lang->line('countrycode') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"10%",
			class:"text-nowrap"
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
