		<link href='<?= base_url()?>assets/css/bootstrap-table.min.css' rel='stylesheet' type='text/css'/>

		<script src='<?= base_url()?>assets/js/hotel_list.js'></script>

		<input type='hidden' id='baseUrl' value='<?= base_url()?>'>
		<input type='hidden' id='ROLE_ADMIN' value='<?= ROLE_ADMIN ?>'>
		<input type='hidden' id='ROLE_SERVICE' value='<?= ROLE_SERVICE ?>'>
		<input type='hidden' id='JSON_NETWORK_TYPE' value='<?= JSON_NETWORK_TYPE ?>'>

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
		window.location = '<?= base_url()?>config/hotel_edit';
	});	

	$('#tblmain').bootstrapTable({
		toggle:"table",
		idField: 'id',
		url: '<?= base_url()?>config/apiGetHotel',
		sortName:"tw",
		sortOrder:"asc",
		selectItemName:"toolbar1",
		sidePagination:"client",
		pagination:"true",
		pageSize: 10,
		pageList:"[10, 50, 100]",
		columns: [{
			field:'tw' ,
			title: "<?= $lang->line('hotelname') ?>",
			halign:"left" ,
			align:"left" ,
			sortable:"true" ,
			width:"15%",
			class:"text-nowrap"
		},{
			field:'en' ,
			title: "<?= $lang->line('hotelnameen') ?>",
			halign:"left" ,
			align:"left" ,
			sortable:"true" ,
			width:"15%",
			class:"text"
		},{
			field:'name_init_c' ,
			title: "<?= $lang->line('countrycode') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"10%",
			class:"text-nowrap"
		},{
			field:'phone' ,
			title: "<?= $lang->line('phone') ?>",
			halign:"left" ,
			align:"left" ,
			sortable:"true" ,
			width:"10%",
			class:"text-nowrap"
		},{
			field:'fax' ,
			title: "<?= $lang->line('fax') ?>",
			halign:"left" ,
			align:"left" ,
			sortable:"true" ,
			width:"10%",
			class:"text-nowrap"
		},{
			field:'level' ,
			title: "<?= $lang->line('level') ?>",
			halign:"center" ,
			align:"center" ,
			sortable:"true" ,
			width:"10%",
			class:"text-nowrap"
		},{
			field:'network' ,
			title: "<?= $lang->line('network') ?>",
			halign:"left" ,
			align:"left" ,
			sortable:"true" ,
			width:"10%",
			class:"text-nowrap",
			formatter: networkFormatter
		},{
			field:'is_woman_ok' ,
			title: "<?= $lang->line('is_woman_ok') ?>",
			halign:"center" ,
			align:"center" ,
			sortable:"true" ,
			width:"10%",
			class:"text-nowrap",
			formatter: is_woman_okFormatter
		},{
			field:'' ,
			title: "<?= $lang->line('oprate') ?>",
			halign:"center" ,
			align:"center",
			width:"10%",
			events: operateEvents,
			formatter: operateFormatter,
			class:"text-nowrap"
		}]
	});
})
</script>
