		<link href='<?= base_url()?>assets/css/bootstrap-table.min.css' rel='stylesheet' type='text/css'/>

		<script src='<?= base_url()?>assets/js/letter_inbound_list.js'></script>

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
		window.location = '<?= base_url()?>docmanage/letter_inbound_edit';
	});	

	$('#tblmain').bootstrapTable({
		toggle:"table",
		idField: 'id',
		formatSearch: function () {
			return '<?= $lang->line('search').' '.$lang->line('letter_no').' '.$lang->line('client').' '.$lang->line('employer') ?>';
		},		
		url: '<?= base_url()?>docmanage/apiGetLetter_inbound',
		selectItemName:"toolbar1",
		sidePagination:"mapping_letter_inbound",
		pagination: true ,
		search: true ,		
		pageSize: 10,
		pageList:"[10, 50, 100]",
		columns: [{
			field:'inbound_no' ,
			title: "<?= $lang->line('letter_no') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"20%",
			class:"text-nowrap",
			searchable: false			
		},{
			field:'letter_no' ,
			title: "<?= $lang->line('with_letter_no') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"20%",
			class:"text-nowrap",			
		},{
			field:'inbound_date_send' ,
			title: "<?= $lang->line('date_send') ?>",
			halign:"center" ,
			align:"center" ,
			sortable:"true" ,
			width:"15%",
			class:"text-nowrap",
			searchable: false			
		},{
			field:'client_tw' ,
			title: "<?= $lang->line('client') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"20%",
			class:"text-nowrap"
		},{				
			field:'employer_tw' ,
			title: "<?= $lang->line('employer') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"20%",
			class:"text-nowrap"
		},{			
			field:'inbound_is_enable' ,
			title: "<?= $lang->line('case_status') ?>",
			halign:"center" ,
			align:"center" ,
			sortable:"true" ,
			width:"15%",
			formatter: enableFormatter,
			class:"text-nowrap",
			searchable: false			
		},{
			field:'' ,
			title: "<?= $lang->line('oprate') ?>",
			halign:"center" ,
			align:"center",
			width:"10%",
			events: operateEvents,
			formatter: operateFormatter,
			class:"text-nowrap",
			searchable: false			
		}]
	});
})

function enableFormatter(value, row, index) {
	var ary = <?= $json_is_enable ?>;
	return ary[parseInt(value)];
}

function operateFormatter(value, row, index) {
	var ary_ret = [
		'<a class="medit ml10" href="javascript:void(0)" title="Edit">',
			'<i class="glyphicon glyphicon-edit"></i>',
		'</a>','　',
		'<a class="mremove ml10" href="javascript:void(0)" title="Remove">',
			'<i class="glyphicon glyphicon-trash"></i>',
		'</a>'
	];

	if((row.inbound_file_path != null) && (row.inbound_file_path.length > 0)) {
		ary_ret.push(
			'　',
			'<a class="mdl2 ml10" href="javascript:void(0)" title="<?= $lang->line('file_path')?>">',
				'<i class="glyphicon glyphicon-cloud-download"></i>',
			'</a>'
		);
	} else {
		ary_ret.push(
			'　',
			'<i class="glyphicon glyphicon-ban-circle"></i>'
		);		
	}
	return ary_ret.join('');
}
</script>
