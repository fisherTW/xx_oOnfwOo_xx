<input type='hidden' id='hid_baseurl' value='<?= base_url(); ?>'>
<input type='hidden' id='hid_ftype' value=''>
<input type='hidden' id='hid_frow' value=''>

<div class="container">
	<form class="form-horizontal" id='form1'>
		<input type='hidden' name='hid_id' value='<?= $id ?>'>
		<h1><?= $title ?></h1>					
		<div class="form-group">
			<div class="col-sm-6">
				<label class="control-label"><?= $lang->line('school_short') ?></label>
				<div>
<?php if (strval($id) != '0_0'): ?>
					<?= form_dropdown('sel_school_id', $ary_school, $info['school_id'], 'class="form-control"'); ?>
<?php else: ?>
					<?= form_dropdown('sel_school_id', $ary_school, '', 'class="form-control"'); ?>
<?php endif; ?>
				</div>
			</div>
			<div class="col-sm-6">
				<label class="control-label"><?= $lang->line('1-6-2') ?></label>
				<div>
<?php if (strval($id) != '0_0'): ?>
					<?= form_dropdown('sel_schoolclass_id', $ary_schoolclass, $info['schoolclass_id'], 'class="form-control"'); ?>
<?php else: ?>
					<?= form_dropdown('sel_schoolclass_id', $ary_schoolclass, '', 'class="form-control"'); ?>
<?php endif; ?>
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-12">
				<table class="table table-bordered table-hover table-responsive" id="tab_laborschool">
					<thead>
						<tr>
							<th width="5%" class="text-center">#</th>
							<th width="25%" class="text-center text-nowrap"><?= $lang->line('student_no') ?></th>
							<th width="20%" class="text-center text-nowrap"><?= $lang->line('name_tw') ?></th>
							<th width="20%" class="text-center text-nowrap"><?= $lang->line('name_en') ?></th>
							<th width="30%" class="text-center text-nowrap"><?= $lang->line('name_local') ?></th>
						</tr>
					</thead>
					<tbody>
<? $row=0; ?>						
<?php if(count($ary_laborschool) > 0): ?>
<?php foreach ($ary_laborschool as $item): ?>
<? $row++;$item['row']=$row; ?>	
						<tr id="<?= 'addr_laborschool'.($item['row'] - 1) ?>">
							<td>
								<?= ($item['row']) ?>
								<input type='hidden' name='row_laborschool[]' value='<?= ($item['labor_id']) ?>'>
							</td>
							<td>
								<div class="input-group">
									<?= form_dropdown('sel_labor_id[]', array($item['labor_id'] => $item['labor_id']), $item['name_tw'], 'class="form-control" otype="labor2" row="'.$item['row'].'"'); ?>
									<div class="input-group-btn">
										<button ftype='labor2' row='<?= ($item['row']) ?>' class="fsearch btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Search...</button>
									</div>
								</div>
							</td>
							<td>
								<div class="checkbox" name='div_name_tw[]' row="<?=$item['row']?>"></div>
							</td>
							<td>
								<div class="checkbox" name='div_name_en[]' row="<?=$item['row']?>"></div>
							</td>
							<td>
								<div class="checkbox" name='div_name_local[]' row="<?=$item['row']?>"></div>
							</td>
						</tr>
<?php endforeach;?>
						<tr id='<?php echo 'addr_laborschool'.count($ary_laborschool) ?>'></tr>
<?php else: ?>
						<tr id='addr_laborschool0'>
							<td>
								1
								<input type='hidden' name='row_laborschool[]' value='1'>
							</td>
							<td>
								<div class="input-group">
									<?= form_dropdown('sel_labor_id[]', array('-1'=>'未選取'), 0, 'class="form-control" otype="labor2" row="1" '); ?>
									<div class="input-group-btn">
										<button ftype='labor2' row='1' class="fsearch btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Search...</button>
									</div>
								</div>
							</td>
							<td>
								<div class="checkbox" name='div_name_tw[]' row="1"></div>
							</td>
							<td>
								<div class="checkbox" name='div_name_en[]' row="1"></div>
							</td>
							<td>
								<div class="checkbox" name='div_name_local[]' row="1"></div>
							</td>
						</tr>
						<tr id='addr_laborschool1'></tr>
<?php endif; ?>
					</tbody>
				</table>
				<a class="add_row btn btn-warning pull-left" prefix='laborschool'><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
				<a class="delete_row pull-right btn btn-danger" prefix='laborschool'><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></a>
				<div class='row mb20' ps='for_add_del_button'>
				</div>
			</div>
		</div>		
	</form>
	<button id="btn_save" class="btn btn-primary">Save</button>
	<button class="btn btn-default btn-cancel">Cancel</button>

	<div class='modal fade'>
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h2 class="modal-title">Search: <span id='span_modal_title'></span></h2>
				</div>
				<div class='modal-body'>
					<input type="text" class="form-control" name="txt_search"></input>
					<div id='div_modal_search'>
						<select id='sel_search' class='form-control' size='10'></select>
					</div>
				</div>
				<div class='modal-footer'>
					<button id="btn_search_apply" class="btn btn-primary">Apply</button>
				</div>
			</div>
		</div>
	</div>	
</div>

<script type="text/javascript">
$(function () {
	var i_laborschool = $("#tab_laborschool" + " tr").length - 2;

	$(".btn-cancel").bind("click",function(){
		window.location = '<?= base_url()?>eam/labor_school';
	});	
	$("#btn_save").bind("click",function(){
		if(!$("form")[0].checkValidity()) return;

		$.ajax({
			async: false,
			type: "POST",
			url: $('#hid_baseurl').val() + 'eam/labor_school_doEdit',
			data: $('#form1').serialize(),
			statusCode: {
				200: function() {
					window.location = '<?= base_url()?>eam/labor_school';
				}
			},
			error: function() {
				alert('操作失敗');
			}
		});
	});

	// search
	$('.modal').on('shown.bs.modal', function () {
		$("input[name='txt_search']").focus();
	});
	$(".fsearch").bind("click",function(){
		$('#span_modal_title').html($(this).attr('ftype'));
		$('#hid_ftype').val($(this).attr('ftype'));
		$('#hid_frow').val($(this).attr('row'));
		$('.modal').modal({
			backdrop: 'static'
		});
		$(".modal").modal('show');

		$("input[name='txt_search']").val('');
		$("#sel_search option").remove();

		return false;
	});
	$("input[name='txt_search']").bind("keyup",function(){
		if($("input[name='txt_search']").val().length == 0) return;

		$.ajax({
			async: false,
			type: "POST",
			url: $('#hid_baseurl').val() + 'eam/apiSearch',
			data: {
				keyword: $("input[name='txt_search']").val(),
				type: $('#hid_ftype').val()
			},
			statusCode: {
				200: function(e) {
					$('#div_modal_search').html(e);
				}
			},
			error: function() {
			}
		});
	});
	$("#btn_search_apply").bind("click",function(){
		if($('#sel_search').val() === null) return;

		$("select[otype=" + $('#hid_ftype').val() +"][row=" + $('#hid_frow').val() + "] option").remove();
		$("select[otype=" + $('#hid_ftype').val() +"][row=" + $('#hid_frow').val() + "]").append($("<option></option>").attr("value", $('#sel_search').val()).text($('#sel_search :selected').text()));

		var row = $('#hid_frow').val();
		$.ajax({
			async: false,			
            type: "POST",
            url: $('#hid_baseurl').val() + 'eam/apiGetLaborById',
            data: {labor_id:$('#sel_search :selected').text()},
            statusCode: {
                200: function(e) {
                    var obj = JSON.parse(e);
					$('div[name="div_name_tw[]"][row="'+ row +'"]').html(obj.a_name_tw);                       
					$('div[name="div_name_en[]"][row="'+ row +'"]').html(obj.a_name_en);                       
					$('div[name="div_name_local[]"][row="'+ row +'"]').html(obj.a_name_local);                       
                }
            },
            error: function() {
                alert('操作失敗');
            }
        });

		$(".modal").modal('hide');
	});

	$(".add_row").click(function() {
		var prefix = $(this).attr("prefix");
		var tmp = 'i_' +  prefix;
		var i  = eval(tmp);

		$('#addr_' + prefix + i).html($('#addr_' + prefix +'0').html());
		$('#addr_' + prefix + i).children().children().attr('row',i + 1);	// replace attr:row
		$('#addr_' + prefix + i).children().first().html((i + 1) + "<input type='hidden' name='row_" + prefix + "[]' value='" + (i + 1) + "'>");	// replace #

		$('#tab_' + prefix).append('<tr id="addr_'+ prefix + (i+1)+'"></tr>');
		var str = tmp + " = " + eval(tmp) + "+1";
		eval(str);
				

	});
	$(".delete_row").click(function() {
		var prefix = $(this).attr("prefix");
		var tmp = 'i_' +  prefix;
		var i  = eval(tmp);

		if(i>1){
			$("#addr_" + prefix + (i-1)).html('');
			$("#addr_" + prefix + i).remove();
			var str = tmp + " = " + eval(tmp) + "-1";
			eval(str);
		}
	});	
});
</script>