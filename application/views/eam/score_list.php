		<link href='<?= base_url()?>assets/css/bootstrap-table.min.css' rel='stylesheet' type='text/css'/>

		<script src='<?= base_url()?>assets/js/score_list.js'></script>

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
		window.location = '<?= base_url()?>eam/score_edit';
	});	

	$('#tblmain').bootstrapTable({
		toggle:"table",
		idField: 'id',
		url: '<?= base_url()?>eam/apiGetScore',
		formatSearch: function () {
			return '<?= $lang->line('search').' '.$lang->line('school_short') ?>';
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
			field:'school_id' ,
			title: "<?= $lang->line('school_short') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"15%",
			class:"text-nowrap"
		},{				
			field:'schoolclass_id' ,
			title: "<?= $lang->line('1-6-2') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"15%",
			class:"text-nowrap",
			searchable: false
		},{	
			field:'date' ,
			title: "<?= $lang->line('date') ?>",
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