		<link href='<?= base_url()?>assets/css/bootstrap-table.min.css' rel='stylesheet' type='text/css'/>

		<script src='<?= base_url()?>assets/js/account_list.js'></script>

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
		window.location = '<?= base_url()?>config/account_edit';
	});	

	$('#tblmain').bootstrapTable({
		toggle:"table",
		idField: 'id',
		url: '<?= base_url()?>config/apiGetAccount',
		sortName:"tw",
		sortOrder:"asc",
		selectItemName:"toolbar1",
		sidePagination:"client",
		pagination:"true",
		pageSize: 10,
		pageList:"[10, 50, 100]",
		columns: [{
			field:'number' ,
			title: "<?= $lang->line('accountnumber') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"20%",
			class:"text-nowrap"
		},{
			field:'tw' ,
			title: "<?= $lang->line('accountname') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"20%",
			class:"text-nowrap"
		},{
			field:'bank_tw' ,
			title: "<?= $lang->line('bank_tw') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"20%",
			class:"text-nowrap"
		},{
			field:'bank_add' ,
			title: "<?= $lang->line('bank_add') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"10%",
			class:"text"
		},{
			field:'bank_phone' ,
			title: "<?= $lang->line('bank_phone') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"10%",
			class:"text-nowrap"
		},{
			field:'name_init' ,
			title: "<?= $lang->line('countrycode') ?>",
			halign:"center" ,
			align:"center" ,
			sortable:"true" ,
			width:"5%",
			class:"text-nowrap"
		},{
			field:'tw_c' ,
			title: "<?= $lang->line('countryname') ?>",
			halign:"center" ,
			align:"center" ,
			sortable:"true" ,
			width:"5%",
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
