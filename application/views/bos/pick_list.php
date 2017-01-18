		<link href='<?= base_url()?>assets/css/bootstrap-table.min.css' rel='stylesheet' type='text/css'/>

		<script src='<?= base_url()?>assets/js/pick_list.js'></script>

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
		window.location = '<?= base_url()?>bos/pick_edit';
	});	

	$('#tblmain').bootstrapTable({
		toggle:"table",
		idField: 'id',
		url: '<?= base_url()?>bos/apiGetPick',
		formatSearch:function(){
			return '<?= $lang->line('search').' '.$lang->line('client').' / '.$lang->line('employer') ?>';
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
			title: "<?= $lang->line('pick_id') ?>",
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
			class:"text-nowrap",
			searchable:false
		},{
			field:'tw_c' ,
			title: "<?= $lang->line('1-1-1') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"5%",
			class:"text-nowrap",
			searchable:false
		},{
			field:'client_name_tw' ,
			title: "<?= $lang->line('client') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"10%",
			class:"text-nowrap"
		},{
			field:'employer_name_tw' ,
			title: "<?= $lang->line('employer') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"10%",
			class:"text-nowrap"
		},{
			field:'school_id' ,
			title: "<?= $lang->line('school_id') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"25%",
			formatter: json_schoolFormatter,
			class:"text-nowrap",
			searchable:false
		},{
			field:'date_dep' ,
			title: "<?= $lang->line('date_dep') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"10%",
			class:"text-nowrap",
			searchable:false
		},{
			field:'date_arr' ,
			title: "<?= $lang->line('date_arr') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"10%",
			class:"text-nowrap",
			searchable:false
		},{
			field:'' ,
			title: "<?= $lang->line('oprate') ?>",
			halign:"center" ,
			align:"center",
			width:"10%",
			events: operateEvents,
			formatter: operateFormatter,
			class:"text-nowrap",
			searchable:false
		}]
	});
})

function json_schoolFormatter(value, row, index) {
	var ary = <?= $json_school ?>;
	return ary[parseInt(value)];
}

</script>
