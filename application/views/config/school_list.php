		<link href='<?= base_url()?>assets/css/bootstrap-table.min.css' rel='stylesheet' type='text/css'/>

		<script src='<?= base_url()?>assets/js/school_list.js'></script>

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
		window.location = '<?= base_url()?>config/school_edit';
	});	

	$('#tblmain').bootstrapTable({
		toggle:"table",
		idField: 'id',
		url: '<?= base_url()?>config/apiGetSchool',
		sortName:"name_init",
		sortOrder:"asc",
		smartDisplay: 'true',
		selectItemName:"toolbar1",
		sidePagination:"client",
		pagination:"true",
		pageSize: 10,
		pageList:"[10, 50, 100]",
		columns: [{
			field:'name_init' ,
			title: "<?= $lang->line('schoolcode') ?>",
			halign:"left" ,
			align:"left" ,
			sortable:"true" ,
			width:"15%",
			class:"text"
		},{
			field:'tw' ,
			title: "<?= $lang->line('schoolname') ?>",
			halign:"left" ,
			align:"left" ,
			sortable:"true" ,
			width:"15%",
			class:"text"
		},{
			field:'tw_short' ,
			title: "<?= $lang->line('tw_short') ?>",
			halign:"left" ,
			align:"left" ,
			sortable:"true" ,
			width:"10%",
			class:"text-nowrap"
		},{
			field:'tw_address' ,
			title: "<?= $lang->line('tw_address') ?>",
			halign:"left" ,
			align:"left" ,
			sortable:"true" ,
			width:"10%",
			class:"text"
		},{	
			field:'en_address' ,
			title: "<?= $lang->line('en_address') ?>",
			halign:"left" ,
			align:"left" ,
			sortable:"true" ,
			width:"10%",
			class:"text"
		},{
			field:'phone' ,
			title: "<?= $lang->line('phone') ?>",
			halign:"left" ,
			align:"left" ,
			sortable:"true" ,
			width:"10%",
			class:"text-nowrap"
		},{	
			field:'city' ,
			title: "<?= $lang->line('city') ?>",
			halign:"left" ,
			align:"left" ,
			sortable:"true" ,
			width:"10%",
			class:"text-nowrap"
		},{
			field:'tw_c' ,
			title: "<?= $lang->line('countryname') ?>",
			halign:"left" ,
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
