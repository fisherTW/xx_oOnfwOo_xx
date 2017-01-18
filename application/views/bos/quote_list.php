		<link href='<?= base_url()?>assets/css/bootstrap-table.min.css' rel='stylesheet' type='text/css'/>

		<script src='<?= base_url()?>assets/js/quote_list.js'></script>

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
		window.location = '<?= base_url()?>bos/quote_edit';
	});	

	$('#tblmain').bootstrapTable({
		toggle:"table",
		idField: 'id',
		url: '<?= base_url()?>bos/apiGetQuote',
		formatSearch:function(){
			return '<?= $lang->line('search').' '.$lang->line('quote_id').' / '.$lang->line('employed_workers_id') ?>';
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
			title: "<?= $lang->line('quote_id') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"10%",	
			class:"text-nowrap"
		},{
			field:'date_check' ,
			title: "<?= $lang->line('date_check') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"10%",
			class:"text-nowrap",
			searchable:false
		},{
			field:'hire_id' ,
			title: "<?= $lang->line('employed_workers_id') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"10%",
			class:"text-nowrap"
		},{
			field:'c_name_tw' ,
			title: "<?= $lang->line('client') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"10%",
			class:"text-nowrap",
			searchable:false
		},{
			field:'e_name_tw' ,
			title: "<?= $lang->line('employer') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"10%",
			class:"text-nowrap",
			searchable:false
		},{
			field:'h_worker_type_major' ,
			title: "<?= $lang->line('worker_type_major') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"10%",
			formatter: worker_type_majorFormatter,
			class:"text-nowrap",
			searchable:false
		},{
			field:'h_worker_kind' ,
			title: "<?= $lang->line('worker_kind') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"10%",
			formatter: worker_kindFormatter,
			class:"text-nowrap",
			searchable:false
		},{
			field:'h_worker_type_minor_id' ,
			title: "<?= $lang->line('worker_type_minor') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"10%",
			formatter: worker_type_minorFormatter,
			class:"text-nowrap",
			searchable:false
		},{
			field:'h_gender' ,
			title: "<?= $lang->line('sex') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"5%",
			formatter: h_genderFormatter,
			class:"text-nowrap",
			searchable:false
		},{
			field:'h_qty_immigrate' ,
			title: "<?= $lang->line('immigration_people') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"5%",
			class:"text-nowrap",
			searchable:false
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
function h_genderFormatter(value, row, index) {
	var ary = <?= $json_h_gender ?>;
	return ary[parseInt(value)];
}

		
</script>
