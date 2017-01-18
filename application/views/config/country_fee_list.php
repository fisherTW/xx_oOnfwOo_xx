		<link href='<?= base_url()?>assets/css/bootstrap-table.min.css' rel='stylesheet' type='text/css'/>

		<script src='<?= base_url()?>assets/js/country_fee_list.js'></script>

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
		window.location = '<?= base_url()?>config/country_fee_edit';
	});	

	$('#tblmain').bootstrapTable({
		toggle:"table",
		idField: 'id',
		url: '<?= base_url()?>config/apiGetCountryFee',
		sortName:"tw",
		sortOrder:"asc",
		selectItemName:"toolbar1",
		sidePagination:"client",
		pagination:"true",
		pageSize: 10,
		pageList:"[10, 50, 100]",
		columns: [{
			field:'ver' ,
			title: "<?= $lang->line('ver') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"20%",
			class:"text-nowrap"
		},{
			field:'country_id' ,
			title: "<?= $lang->line('1-1-1') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"14%",
			class:"text"
		},{
			field:'currency_id' ,
			title: "<?= $lang->line('1-1-8') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"14%",
			class:"text"
		},{
			field:'fee_id' ,
			title: "<?= $lang->line('1-3-1') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"14%",
			class:"text"
		},{
			field:'site_receive' ,
			title: "<?= $lang->line('country_id') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"14%",
			class:"text"
		},{
			field:'man_receive' ,
			title: "<?= $lang->line('man_receive') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"14%",	
			formatter: man_receiveFormatter,				
			class:"text"
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
function man_receiveFormatter(value, row, index) {
	var ary = <?= JSON_MAN_RECEIVE ?>;
	return ary[parseInt(value)];
}
</script>
