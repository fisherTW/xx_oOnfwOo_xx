		<link href='<?= base_url()?>assets/css/bootstrap-table.min.css' rel='stylesheet' type='text/css'/>

		<script src='<?= base_url()?>assets/js/tutor_list.js'></script>

		<input type='hidden' id='baseUrl' value='<?= base_url()?>'>
		<input type='hidden' id='ROLE_ADMIN' value='<?= ROLE_ADMIN ?>'>

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
		window.location = '<?= base_url()?>eam/tutor_edit';
	});	

	$('#tblmain').bootstrapTable({
		toggle:"table",
		idField: 'id',
		url: '<?= base_url()?>eam/apiGetTutor',
		formatSearch: function () {
			return '<?= $lang->line('search').' '.$lang->line('4-3-1') ?>';
		},		
		sortName:"no",
		sortOrder:"asc",
		selectItemName:"toolbar1",
		sidePagination:"client",
		pagination: true ,
		search: true ,
		pageSize: 10,
		pageList:"[10, 50, 100]",
		columns: [{
			field:'emp_id' ,
			title: "<?= $lang->line('4-3-1') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"15%",
			class:"text-nowrap"
		},{			
			field:'school_id' ,
			title: "<?= $lang->line('school_short') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"20%",
			class:"text-nowrap",
			searchable: false			
		},{
			field:'schoolclass_id' ,
			title: "<?= $lang->line('1-6-2') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"20%",
			class:"text-nowrap",
			searchable: false			
		},{
			field:'date_start' ,
			title: "<?= $lang->line('tutor_date_s') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"15%",
			class:"text-nowrap",
			searchable: false			
		},{	
			field:'date_end' ,
			title: "<?= $lang->line('tutor_date_e') ?>",
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
			width:"15%",
			formatter: operateFormatter,
			events: operateEvents,
			class:"text-nowrap",
			searchable: false
		}]
	});
})
</script>