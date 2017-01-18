		<link href='<?= base_url()?>assets/css/bootstrap-table.min.css' rel='stylesheet' type='text/css'/>

		<script src='<?= base_url()?>assets/js/packageDetail_list.js'></script>

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
		window.location = '<?= base_url()?>docmanage/packageDetail_edit';
	});	

	$('#tblmain').bootstrapTable({
		toggle:"table",
		idField: 'id',
		formatSearch: function () {
			return '<?= $lang->line('search').' '.$lang->line('employer').' '.$lang->line('letter_no').' '.$lang->line('5-1-2') ?>';			
		},		
		url: '<?= base_url()?>docmanage/apiGetPackageDetail',
		sortName:"package_title_id",
		sortOrder:"desc",
		selectItemName:"toolbar1",
		sidePagination:"client",
		pagination: true,
		search: true ,
		pageSize: 10,
		pageList:"[10, 50, 100]",
		columns: [{
			field:'package_title_id' ,
			title: "<?= $lang->line('sent_id') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"20%",
			class:"text-nowrap",
			searchable: false
		},{
			field:'c_name_tw' ,
			title: "<?= $lang->line('client') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"20%",
			class:"text-nowrap",
			searchable: false
		},{
			field:'e_name_tw' ,
			title: "<?= $lang->line('employer') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"20%",
			class:"text-nowrap"
		},{
			field:'letter_no' ,
			title: "<?= $lang->line('letter_no') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"20%",
			class:"text-nowrap"
		},{
			field:'inbound_no' ,
			title: "<?= $lang->line('5-1-2') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"20%",
			class:"text-nowrap"
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
			class:"text-nowrap",
			searchable: false
		},{
			field:'' ,
			title: "<?= $lang->line('oprate') ?>",
			halign:"center" ,
			align:"center",
			width:"120px",
			events: operateEvents,
			formatter: operateFormatter,
			width:"10%",
			class:"text-nowrap",
			searchable: false
		}]
	});
})

function site_sendFormatter(value, row, index) {
	var ary = <?= $json_site_send ?>;
	return ary[parseInt(value)];
}
function site_receiveFormatter(value, row, index) {
	var ary = <?= $json_site_receive ?>;
	return ary[parseInt(value)];
}
</script>
