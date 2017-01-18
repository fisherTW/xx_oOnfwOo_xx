		<link href='<?= base_url()?>assets/css/bootstrap-table.min.css' rel='stylesheet' type='text/css'/>

		<script src='<?= base_url()?>assets/js/packageTitle_list.js'></script>

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
		window.location = '<?= base_url()?>docmanage/packageTitle_edit';
	});	

	$('#tblmain').bootstrapTable({
		toggle:"table",
		idField: 'id',
		url: '<?= base_url()?>docmanage/apiGetPackageTitle',
		formatSearch: function () {
			return '<?= $lang->line('search').' '.$lang->line('id').' '.$lang->line('1-1-1').' '.$lang->line('receive_address')?>';
		},		
		sortName:"date_send",
		sortOrder:"desc",
		selectItemName:"toolbar1",
		sidePagination:"client",
		pagination: true,
		search: true ,
		pageSize: 10,
		pageList:"[10, 50, 100]",
		columns: [{
			field:'date_send' ,
			title: "<?= $lang->line('date_send2') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"15%",
			class:"text-nowrap",
			searchable: false
		},{
			field:'id' ,
			title: "<?= $lang->line('sent_id') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"20%",
			class:"text-nowrap"
		},{
			field:'tw_c' ,
			title: "<?= $lang->line('1-1-1') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"15%",
			class:"text-nowrap"
		},{
			field:'send_type' ,
			title: "<?= $lang->line('send_type') ?>",
			halign:"center" ,
			align:"left",
			sortable:"true" ,
			width:"15%",
			formatter: sendwayFormatter,
			class:"text-nowrap",
			searchable: false
		},{
			field:'site_send' ,
			title: "<?= $lang->line('site_send') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"15%",
			formatter: site_sendFormatter,
			class:"text-nowrap",
			searchable: false			
		},{
			field:'site_receive' ,
			title: "<?= $lang->line('receive_address') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"15%",
			formatter: site_receiveFormatter,
			class:"text-nowrap"
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

function sendwayFormatter(value, row, index) {
	var ary = <?= $json_sendway ?>;
	return ary[parseInt(value)];
}
function site_sendFormatter(value, row, index) {
	var ary = <?= $json_site_send ?>;
	return ary[parseInt(value)];
}
function site_receiveFormatter(value, row, index) {
	var ary = <?= $json_site_receive ?>;
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

	if((row.file_path != null) && (row.file_path.length > 0)) {
		ary_ret.push(
			'　',
			'<a class="mdl1 ml10" href="javascript:void(0)" title="<?= $lang->line('upload_signfile')?>">',
				'<i class="glyphicon glyphicon-cloud-download"></i>',
			'</a>'
		);
	} else {
		ary_ret.push(
			'　',
			'<i class="glyphicon glyphicon-ban-circle"></i>'
		);		
	}
	if((row.file_path2 != null) && (row.file_path2.length > 0)) {
		ary_ret.push(
			'　',
			'<a class="mdl2 ml10" href="javascript:void(0)" title="<?= $lang->line('sign_receive')?>">',
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
