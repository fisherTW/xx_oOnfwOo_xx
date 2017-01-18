		<link href='<?= base_url()?>assets/css/bootstrap-table.min.css' rel='stylesheet' type='text/css'/>

		<script src='<?= base_url()?>assets/js/room_list.js'></script>

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
		window.location = '<?= base_url()?>config/room_edit';
	});	

	$('#tblmain').bootstrapTable({
		toggle:"table",
		idField: 'id',
		url: '<?= base_url()?>config/apiGetRoom',
		sortName:"name_init",
		sortOrder:"asc",
		selectItemName:"toolbar1",
		sidePagination:"client",
		pagination:"true",
		pageSize: 10,
		pageList:"[10, 50, 100]",
		columns: [{	
			field:'tw_d' ,
			title: "<?= $lang->line('hotelname') ?>",
			halign:"left" ,
			align:"left" ,
			sortable:"true" ,
			width:"10%",
			class:"text-nowrap"
		},{			
			field:'name_init' ,
			title: "<?= $lang->line('roomcode') ?>",
			halign:"left" ,
			align:"left" ,
			sortable:"true" ,
			width:"10%",
			class:"text-nowrap"
		},{
			field:'tw' ,
			title: "<?= $lang->line('roomname') ?>",
			halign:"left" ,
			align:"left" ,
			sortable:"true" ,
			width:"20%",
			class:"text-nowrap"
		},{
			field:'person' ,
			title: "<?= $lang->line('roomperson') ?>",
			halign:"left" ,
			align:"left" ,
			sortable:"true" ,
			width:"10%",
			class:"text-nowrap"
		},{
			field:'name_init_c' ,
			title: "<?= $lang->line('currencycode') ?>",
			halign:"left" ,
			align:"left" ,
			sortable:"true" ,
			width:"10%",
			class:"text-nowrap"
		},{
			field:'tw_c' ,
			title: "<?= $lang->line('currencyname') ?>",
			halign:"left" ,
			align:"left" ,
			sortable:"true" ,
			width:"10%",
			class:"text-nowrap"
		},{	
			field:'price' ,
			title: "<?= $lang->line('roomprice') ?>",
			halign:"right" ,
			align:"right" ,
			sortable:"true" ,
			width:"20%",
			class:"text-nowrap"
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
