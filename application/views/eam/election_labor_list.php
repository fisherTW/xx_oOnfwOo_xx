		<link href='<?= base_url()?>assets/css/bootstrap-table.min.css' rel='stylesheet' type='text/css'/>

		<script src='<?= base_url()?>assets/js/election_labor_list.js'></script>

		<input type='hidden' id='baseUrl' value='<?= base_url()?>'>
		<input type='hidden' id='ROLE_ADMIN' value='<?= ROLE_ADMIN ?>'>

		<div class='container'>
			<div class="row">
				<h1><?= $title ?></h1>
				<table id='tblmain'>
				</table>
			</div>
		</div>

<script src='<?= base_url()?>assets/js/bootstrap-table.min.js'></script>
<script type="text/javascript">
$(function () {
	$('#tblmain').bootstrapTable({
		toggle:"table",
		idField: 'id',
		url: '<?= base_url()?>eam/apiGetElectionLabor',
		formatSearch: function () {
			return '<?= $lang->line('search').' '.$lang->line('client').' '.$lang->line('employer').' '.$lang->line('election_id') ?>';
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
			field:'hire_id' ,
			title: "<?= $lang->line('employed_workers_id') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"10%",
			class:"text-nowrap",
			searchable: false
		},{
			field:'election_id' ,
			title: "<?= $lang->line('election_id') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"10%",
			class:"text-nowrap"
		},{
			field:'client_id',
			title: "<?= $lang->line('client') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"10%",
			formatter: clientFormatter,
			class:"text-nowrap",
		},{
			field:'employer_id' ,
			title: "<?= $lang->line('employer') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"10%",
			formatter: employerFormatter,
			class:"text-nowrap",
		},{				
			field:'labor_id' ,
			title: "<?= $lang->line('laborid') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"10%",
			class:"text-nowrap",
			searchable: false
		},{	
			field:'name_tw' ,
			title: "<?= $lang->line('name_tw') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"10%",
			class:"text-nowrap",
			searchable: false
		},{
			field:'name_en' ,
			title: "<?= $lang->line('name_en') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"20%",
			class:"text-nowrap",
			searchable: false
		},{
			field:'worker_type_major' ,
			title: "<?= $lang->line('worker_type_major') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"5%",
			formatter: worker_type_majorFormatter,
			class:"text-nowrap",
			searchable:false
		},{
			field:'worker_kind' ,
			title: "<?= $lang->line('worker_kind') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"5%",
			formatter: worker_kindFormatter,
			class:"text-nowrap",
			searchable:false
		},{
			field:'worker_type_minor_id' ,
			title: "<?= $lang->line('worker_type_minor') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"5%",
			formatter: worker_type_minorFormatter,
			class:"text-nowrap",
			searchable:false
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
function clientFormatter(value, row, index) {
	var ary = <?= $json_client ?>;
	return ary[parseInt(value)];
}
function employerFormatter(value, row, index) {
	var ary = <?= $json_employer ?>;
	return ary[parseInt(value)];
}		
function worker_type_majorFormatter(value, row, index) {
	var ary = <?= $json_worker_type_major ?>;
	return ary[parseInt(value)];
}
function worker_type_minorFormatter(value, row, index) {
	var ary = <?= $json_worker_type_minor ?>;
	return ary[parseInt(value)];
}
function worker_kindFormatter(value, row, index) {
	var ary = <?= $json_worker_kind ?>;
	return ary[parseInt(value)];
}	
</script>