<input type='hidden' id='hid_baseurl' value='<?= base_url(); ?>'>
<input type='hidden' id='hid_ftype' value=''>

<div class="container">
	<form class="form-horizontal" id='form1' onKeyDown="if(event.keyCode == 13) {return false;}">
		<input type='hidden' name='hid_id' value='<?= $id ?>'>		

		<h1><?= $title ?></h1>

		<div class="tab-content">
			<div class="form-group">
				<div class="col-sm-6">
					<label class="control-label"><?= $lang->line('schedule_date') ?></label>
					<div>
<?php if (strval($id) != '0'): ?>
						<?= $info['date'] ?>
<?php else: ?>
						<?= date("Y-m-d") ?>
<?php endif; ?>
					</div>
				</div>
				<div class="col-sm-6">
					<label class="control-label"><?= $lang->line('date_create') ?></label>
					<div>
<?php if (strval($id) != '0'): ?>
						<?= $info['date_create'] ?>
<?php else: ?>
						<?= date("Y-m-d") ?>
<?php endif; ?>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-6">
					<label class="control-label"><?= $lang->line('method') ?></label>
					<div>
<?php if (strval($id) != '0'): ?>
						<?= form_dropdown('sel_method', $ary_method, $info['method'], 'class="form-control"'); ?>
<?php else: ?>
						<?= form_dropdown('sel_method', $ary_method, '', 'class="form-control"'); ?>
<?php endif; ?>
					</div>
				</div>
				<div class="col-sm-6">
					<label class="control-label"><?= $lang->line('user_create') ?></label>
					<div>
<?php if (strval($id) != '0'): ?>
						<?= $info['user_create_name'] ?>
<?php else: ?>
						<?= $account ?>
<?php endif; ?>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-6">
					<label class="control-label"><?= $lang->line('schedule_man') ?></label>
				</div>
				<div class="col-sm-6">	
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-6">
					<div class='col-md-offset-1'>
						<label class="control-label"><?= $lang->line('client') ?></label>
						<div class="input-group">
<?php if (strval($id) != '0'): ?>
<?php if (strval($info['client_id']) != '0'): ?>
							<?= form_dropdown('sel_client_id', array($info['client_id'] => $info['c_name_tw']), $info['client_id'], 'class="form-control" otype="client"'); ?>
<?php else: ?>
							<?= form_dropdown('sel_client_id', array('-1'=>'未選取'), 0, 'class="form-control" otype="client"'); ?>
<?php endif; ?>
<?php else: ?>
							<?= form_dropdown('sel_client_id', array('-1'=>'未選取'), 0, 'class="form-control" otype="client"'); ?>
<?php endif; ?>
							<div class="input-group-btn">
								<button ftype='client' class="fsearch btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Search...</button>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<label class="control-label"><?= $lang->line('sales_id') ?></label>
					<div>
<?php if (strval($id) != '0'): ?>
						<?= form_dropdown('sel_sales_id', $ary_emp, $info['sales_id'], 'class="form-control"'); ?>
<?php else: ?>
						<?= form_dropdown('sel_sales_id', $ary_emp, '', 'class="form-control"'); ?>
<?php endif; ?>
					</div>					
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-6">
					<div class='col-md-offset-1'>
						<label class="control-label"><?= $lang->line('employer') ?></label>
						<div class="input-group">
<?php if (strval($id) != '0'): ?>
<?php if (strval($info['employer_id']) != '0'): ?>
							<?= form_dropdown('sel_employer_id', array($info['employer_id'] => $info['e_name_tw']), $info['employer_id'], 'class="form-control" otype="employer"'); ?>
<?php else: ?>
							<?= form_dropdown('sel_employer_id', array('-1'=>'未選取'), 0, 'class="form-control" otype="employer"'); ?>
<?php endif; ?>
<?php else: ?>
							<?= form_dropdown('sel_employer_id', array('-1'=>'未選取'), 0, 'class="form-control" otype="employer"'); ?>
<?php endif; ?>
							<div class="input-group-btn">
								<button ftype='employer' class="fsearch btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Search...</button>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6">
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-6">
					<div class='col-md-offset-1'>
					<label class="control-label"><?= $lang->line('offical') ?></label>
<?php if (strval($id) != '0'): ?>
						<input type="text" class="form-control" name="txt_offical" value='<?= $info['offical']?>' >
<?php else: ?>
						<input type="text" class="form-control" name="txt_offical" value='' >
<?php endif; ?>			
					</div>
				</div>
				<div class="col-sm-6">
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-6">
					<label class="control-label"><?= $lang->line('client_contact') ?></label>
					<div>
<?php if (strval($id) != '0'): ?>
						<input type="text" class="form-control" name="txt_contact" value='<?= $info['contact']?>' >
<?php else: ?>
						<input type="text" class="form-control" name="txt_contact" value='' >
<?php endif; ?>			
					</div>
				</div>
				<div class="col-sm-6">
					<label class="control-label"><?= $lang->line('schedule_emp') ?></label>
					<div>
<?php if (strval($id) != '0'): ?>
						<?= form_dropdown('sel_emp_id', $ary_emp, $info['emp_id'], 'class="form-control"'); ?>
<?php else: ?>
						<?= form_dropdown('sel_emp_id', $ary_emp, '', 'class="form-control"'); ?>
<?php endif; ?>			
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-6">
					<label class="control-label"><?= $lang->line('schedule_descr') ?></label>
					<div>
<?php if (strval($id) != '0'): ?>
						<input type="text" class="form-control" name="txt_descr" value='<?= $info['descr']?>' >
<?php else: ?>
						<input type="text" class="form-control" name="txt_descr" value='' >
<?php endif; ?>		
					</div>			
				</div>
				<div class="col-sm-6">
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-12">
					<table class="table table-bordered table-hover table-responsive" id="tab_salesscheduleFee">
					<label class="control-label"><?= $lang->line('expense') ?></label>
						<thead>
							<tr >
								<th class="text-center">#</th>
								<th class="text-center text-nowrap"><?= $lang->line('hire_item') ?></th>
								<th class="text-center text-nowrap"><?= $lang->line('hire_money') ?></th>
								<th class="text-center text-nowrap"><?= $lang->line('desc') ?></th>
							</tr>
						</thead>
						<tbody>
<?php if(count($ary_salesscheduleFee) > 0): ?>
<?php foreach ($ary_salesscheduleFee as $item): ?>
							<tr id="<?= 'addr_salesscheduleFee'.($item['row'] - 1) ?>">
								<td>
									<?= ($item['row']) ?>
									<input type='hidden' name='row_salesscheduleFee[]' value='<?= ($item['row']) ?>'>
								</td>
								<td>
									<input type="text" name='item_salesscheduleFee[]' value='<?= ($item['item']) ?>' class="form-control" />
								</td>
								<td>
									<input type="text" name='money_salesscheduleFee[]' value='<?= ($item['money']) ?>' class="form-control" pattern="[0-9]+"  style="text-align: right"/>
								</td>
								<td>
									<input type="text" name='descr_salesscheduleFee[]' value='<?= ($item['descr']) ?>' class="form-control" />
								</td>
							</tr>
<?php endforeach;?>
							<tr id='<?php echo 'addr_salesscheduleFee'.count($ary_salesscheduleFee) ?>'></tr>
<?php else: ?>
							<tr id='addr_salesscheduleFee0'>
								<td>
									1
									<input type='hidden' name='row_salesscheduleFee[]' value='1'>
								</td>
								<td>
									<input type="text" name='item_salesscheduleFee[]' class="form-control" />
								</td>
								<td>
									<input type="text" name='money_salesscheduleFee[]' class="form-control" pattern="[0-9]+"  style="text-align: right"/>
								</td>
								<td>
									<input type="text" name='descr_salesscheduleFee[]' class="form-control" />
								</td>
							</tr>
							<tr id='addr_salesscheduleFee1'></tr>
<?php endif; ?>
						</tbody>
					</table>
					<a class="add_row btn btn-warning pull-left" prefix='salesscheduleFee'><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
					<a class="delete_row pull-right btn btn-danger" prefix='salesscheduleFee'><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></a>
					<div class='row mb20' ps='for_add_del_button'>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-6">
					<label class="control-label"><?= $lang->line('ocar_no') ?></label>
					<div>
<?php if (strval($id) != '0'): ?>
						<input type="text" class="form-control" name="txt_ocar_no" value='<?= $info['ocar_no']?>' >
<?php else: ?>
						<input type="text" class="form-control" name="txt_ocar_no" value='' >
<?php endif; ?>
					</div>
				</div>
				<div class="col-sm-6">
					<label class="control-label"><?= $lang->line('pcar_no') ?></label>
					<div>
<?php if (strval($id) != '0'): ?>
						<input type="text" class="form-control" name="txt_pcar_no" value='<?= $info['pcar_no']?>' >
<?php else: ?>
						<input type="text" class="form-control" name="txt_pcar_no" value='' >
<?php endif; ?>
					</div>					
				</div>
			</div>	
			<div class="form-group">
				<div class="col-sm-6">
					<label class="control-label"><?= $lang->line('park_fee') ?></label>
					<div>
<?php if (strval($id) != '0'): ?>
						<input type="text" class="form-control" name="txt_park_money" value='<?= $info['park_money']?>' pattern="[0-9]+" style="text-align: right">
<?php else: ?>
						<input type="text" class="form-control" name="txt_park_money" value=''  pattern="[0-9]+" style="text-align: right">
<?php endif; ?>
					</div>
				</div>
				<div class="col-sm-6">
				</div>
			</div>
			<label class="control-label"><?= $lang->line('car_fee') ?></label>
			<div class="form-group">
				<div class="col-sm-6">
					<div class='col-md-offset-1'>
						<label class="control-label"><?= $lang->line('ocar_no') ?></label>						
					</div>
					<div class='col-md-offset-2'>
						<label class="control-label"><?= $lang->line('car_money') ?></label>
<?php if (strval($id) != '0'): ?>
						<input type="text" class="form-control" name="txt_ocar_money" value='<?= $info['ocar_money']?>' pattern="[0-9]+" style="text-align: right">
<?php else: ?>
						<input type="text" class="form-control" name="txt_ocar_money" value='' pattern="[0-9]+" style="text-align: right">
<?php endif; ?>
					</div>
				</div>
				<div class="col-sm-6">
				</div>
			</div>		
			<div class="form-group">
				<div class="col-sm-6">
					<div class='col-md-offset-1'>
						<label class="control-label"><?= $lang->line('pcar_no') ?></label>						
					</div>
					<div class='col-md-offset-2'>
						<label class="control-label"><?= $lang->line('car_kmstart') ?></label>
<?php if (strval($id) != '0'): ?>
						<input type="text" class="form-control" name="txt_pcar_kmstart" value='<?= $info['pcar_kmstart']?>' style="text-align: right">
<?php else: ?>
						<input type="text" class="form-control" name="txt_pcar_kmstart" value='' style="text-align: right">
<?php endif; ?>
					</div>
				</div>
				<div class="col-sm-6">
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-6">
					<div class='col-md-offset-2'>
						<label class="control-label"><?= $lang->line('car_kmend') ?></label>
<?php if (strval($id) != '0'): ?>
						<input type="text" class="form-control" name="txt_pcar_kmend" value='<?= $info['pcar_kmend']?>' style="text-align: right">
<?php else: ?>
						<input type="text" class="form-control" name="txt_pcar_kmend" value='' style="text-align: right">
<?php endif; ?>
					</div>
				</div>
				<div class="col-sm-6">
				</div>
			</div>			
			<div class="form-group">
				<div class="col-sm-6">
					<div class='col-md-offset-2'>
						<label class="control-label"><?= $lang->line('car_money') ?></label>
<?php if (strval($id) != '0'): ?>
						<input type="text" class="form-control" name="txt_pcar_money" value='<?= $info['pcar_money']?>' pattern="[0-9]+" style="text-align: right">
<?php else: ?>
						<input type="text" class="form-control" name="txt_pcar_money" value=''  pattern="[0-9]+" style="text-align: right">
<?php endif; ?>
					</div>
				</div>
				<div class="col-sm-6">
				</div>
			</div>			
			<div class="form-group">
				<div class="col-sm-6">
					<div class='col-md-offset-2'>
						<label class="control-label"><?= $lang->line('car_etc') ?></label>
<?php if (strval($id) != '0'): ?>
						<input type="text" class="form-control" name="txt_pcar_etc" value='<?= $info['pcar_etc']?>' style="text-align: right">
<?php else: ?>
						<input type="text" class="form-control" name="txt_pcar_etc" value='' style="text-align: right">
<?php endif; ?>
					</div>
				</div>
				<div class="col-sm-6">
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
	var i_salesscheduleFee = $("#tab_salesscheduleFee" + " tr").length - 2;

	$(".btn-cancel").bind("click",function(){
		window.location = '<?= base_url()?>crm/salesschedule';
	});	
	$("#btn_save").bind("click",function(){
		if(!$("form")[0].checkValidity()) return;

		$.ajax({
			async: false,
			type: "POST",
			url: $('#hid_baseurl').val() + 'crm/salesschedule_doEdit',
			data: $('#form1').serialize(),
			statusCode: {
				200: function() {
					window.location = '<?= base_url()?>crm/salesschedule';
				}
			},
			error: function() {
				alert('操作失敗');
			}
		});
	});

	$(".add_row").click(function() {
		var prefix = $(this).attr("prefix");
		var tmp = 'i_' +  prefix;
		var i  = eval(tmp);

		$('#addr_' + prefix + i).html($('#addr_' + prefix +'0').html());
		$('#addr_' + prefix + i).children().children().attr('row',i + 1);	// replace attr:row
		$('#addr_' + prefix + i).children().first().html((i + 1) + "<input type='hidden' name='row_" + prefix + "[]' value='" + (i + 1) + "'>");	// replace #

		$("#tab_" + prefix + " input[row=" + (i + 1) + "]").each(function() {
			$(this).val('');
		});

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

	// search
	$('.modal').on('shown.bs.modal', function () {
		$("input[name='txt_search']").focus();
	});

	$(".fsearch").bind("click",function(){
		$('#span_modal_title').html($(this).attr('ftype'));
		$('#hid_ftype').val($(this).attr('ftype'));
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
			url: $('#hid_baseurl').val() + 'crm/apiSearch',
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

		$("select[otype=" + $('#hid_ftype').val() +"] option").remove();
		$("select[otype=" + $('#hid_ftype').val() +"]").append($("<option></option>").attr("value", $('#sel_search').val()).text($('#sel_search :selected').text()));
		$(".modal").modal('hide');
	});
	
	$("select[name=sel_type]").bind("change",function(){
		if($("select[name=sel_type]").val() == <?= LETTER_TYPE_RECRUIT ?>) {	// show
			$('#div_type_radio').show();
		} else { // hide
			$('#div_type_radio').hide();
		}
	});

});
</script>