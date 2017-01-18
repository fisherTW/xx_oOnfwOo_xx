<script src='<?= base_url()?>assets/js/bootstrap-datetimepicker.min.js'></script>
<script src='<?= base_url()?>assets/js/bootstrap-table.min.js'></script>
<link href='<?= base_url()?>assets/css/bootstrap-datetimepicker.min.css' rel='stylesheet' type='text/css'/>
<link href='<?= base_url()?>assets/css/bootstrap-table.min.css' rel='stylesheet' type='text/css'/>

<input type='hidden' id='hid_baseurl' value='<?= base_url(); ?>'>
<input type='hidden' id='hid_ftype' value=''>

<div class="container">
	<form class="form-horizontal" id='form1'>
		<input type='hidden' name='hid_id' value='<?= $id ?>'>

		<h1><?= $title ?></h1>
		<div class="form-group">
			<div class="col-sm-6">
				<label class="control-label"><?= $lang->line('id') ?></label>
				<div class="checkbox">
<?php if (strval($id) != '0'): ?>
					<?= $info['id'] ?>
<?php else: ?>
					<?= $lang->line('generate_system') ?>
<?php endif; ?>				
				</div>
			</div>
			<div class="col-sm-3">
				<label class="control-label"><?= $lang->line('date_create').' / '.$lang->line('user_create') ?></label>
				<div class="checkbox">
<?php if (strval($id) != '0'): ?>
					<?= $info['date_create'].' / '.$info['user_create_name'] ?>
<?php else: ?>
					<?= date("Y-m-d").' / '.$account ?>
<?php endif; ?>				
				</div>
			</div>
			<div class="col-sm-3">
				<label class="control-label"><?= $lang->line('quote_id').' / '.$lang->line('quote_descr') ?></label>
				<div class="checkbox" id="div_quote_id">
<?php if (strval($id) != '0'): ?>
					<?= $info['quote_id'].' / '.$info['quote_descr'] ?>
<?php else: ?>
<?php endif; ?>
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-6">
				<label class="control-label"><?= $lang->line('worker_id') ?></label>
				<div class="input-group">
<?php if (strval($id) != '0'): ?>
	<?php if (strval($info['labor_id']) != '-1'): ?>
					<?= form_dropdown('sel_labor_id', array($info['labor_id'] => $info['labor_id']), $info['labor_id'], 'class="form-control" otype="labor_id"'); ?>
<?php else: ?>
					<?= form_dropdown('sel_labor_id', array('-1'=>'未選取'), 0, 'class="form-control" otype="labor_id"'); ?>
<?php endif; ?>							
<?php else: ?>
					<?= form_dropdown('sel_labor_id', array('-1'=>'未選取'), 0, 'class="form-control" otype="labor_id"'); ?>
<?php endif; ?>
					<div class="input-group-btn">
						<button ftype='labor_id' class="fsearch btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Search...</button>
					</div>
				</div>
			</div>
			<div class="col-sm-6">
				<label class="control-label"><?= $lang->line('name_tw').' / '.$lang->line('birthday').' / '.$lang->line('school_short') ?></label>
				<div class="checkbox" id="div_school_license">
<?php if (strval($id) != '0'): ?>
					<?= $info['l_a_name_tw'].' / '.$info['l_a_birthday'].' / '.$info['tw_short'] ?>
<?php else: ?>
<?php endif; ?>	
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-6">
			</div>
			<div class="col-sm-6">
				<label class="control-label"><?= $lang->line('client').' / '.$lang->line('employer').' / '.$lang->line('inbound_date').' / '.$lang->line('c_run_sendback').' / '.$lang->line('c_run_date')?></label>
				<div class="checkbox" id="div_client_emp">
<?php if (strval($id) != '0'): ?>
					<?= $info['c_name_tw'].' / '.$info['e_name_tw'].' / '.$info['li_date'].' / '.$info['c_run_sendback'].' / '.$info['c_run_date'] ?>
<?php else: ?>
<?php endif; ?>	
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-12">
				<label class="control-label"><?= $lang->line('payment_type') ?></label>
				<table class="table table-bordered table-hover table-responsive" id="tab_feeLabor">
					<thead>
						<tr>
							<th class="text-center">#</th>
							<th class="text-center text-nowrap"><?= $lang->line('payment_type').'/'.$lang->line('date') ?></th>
							<th class="text-center text-nowrap"><?= $lang->line('1-3-1').'/'.$lang->line('stage_no') ?></th>
							<th class="text-center text-nowrap"><?= $lang->line('stage_no_start').'/'.$lang->line('stage_no_end') ?></th>
							<th class="text-center text-nowrap"><?= $lang->line('1-1-8').'/'.$lang->line('finance_exchange_rate') ?></th>
							<th class="text-center text-nowrap"><?= $lang->line('hire_money').'/'.$lang->line('money_tw') ?></th>
							<th class="text-center text-nowrap"><?= $lang->line('site').'/'.$lang->line('man_receive') ?></th>
							<th class="text-center text-nowrap"><?= $lang->line('method_receive').'/'.$lang->line('desc') ?></th>
						</tr>
					</thead>
					<tbody>
<? $row=0; ?>						
<?php if(count($ary_feeLabor) > 0): ?>
<?php foreach ($ary_feeLabor as $item): ?>
<? $row++;$item['row']=$row; ?>
						<tr id="<?= 'addr_feeLabor'.($item['row'] - 1) ?>">
							<td>
								<?= ($item['row']) ?>
								<input type='hidden' name='row_feeLabor[]' value='<?= ($item['row']) ?>'>
							</td>
							<td>
								<?= form_dropdown('type_feeLabor[]', $ary_fee_type, $item['type'], 'class="form-control" '); ?>
								<div class='input-group date' id='datetimepicker'>
									<input type="text" class="form-control" name="date_feeLabor[]" value='<?= ($item['date']) ?>' pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" required readonly>
									<span class="input-group-addon">
										<span class="glyphicon glyphicon-calendar"></span>
									</span>
								</div>
							</td>
							<td>
								<?= form_dropdown('fee_id_feeLabor[]', $ary_fee_id, $item['fee_id'], 'class="form-control" row="'.$item['row'].'"'); ?>
								<input type="text" name='stage_no_feeLabor[]' value='<?= ($item['stage_no']) ?>' class="form-control" row="<?=$item['row']?>" pattern="[0-9]+"/>
							</td>
							<td>
								<input type="text" name='stage_no_start_feeLabor[]' value='<?= ($item['stage_no_start']) ?>' class="form-control" row="<?=$item['row']?>" pattern="[0-9]+"/>
								<input type="text" name='stage_no_end_feeLabor[]' value='<?= ($item['stage_no_end']) ?>' class="form-control" row="<?=$item['row']?>" pattern="[0-9]+"/>
							</td>
							<td>
								<?= form_dropdown('currency_id_feeLabor[]', $ary_currency, $item['currency_id'], 'class="form-control" row="'.$item['row'].'"'); ?>
								<input type="text" name='finance_exchange_rate_feeLabor[]' value='<?= ($item['finance_exchange_rate']) ?>' class="form-control" row="<?=$item['row']?>" pattern="[0-9]+(\.){0,1}[0-9]{0,5}" />
							</td>
							<td>
								<input type="text" name='money_feeLabor[]' value='<?= ($item['money']) ?>' class="form-control" pattern="[0-9]+"/>
<?php if($item['money'] != 0 ): ?>								
								<input type="text" name='money_tw_feeLabor[]' value='<?= ($item['money_tw']) ?>' class="form-control" readonly/>
<?php else: ?>
								<input type="text" name='money_tw_feeLabor[]' value="<?= $lang->line('auto_count_after_save')?>" class="form-control" readonly/>
<?php endif; ?>
							</td>
							<td>
								<?= form_dropdown('country_id_feeLabor[]', $ary_country, $item['country_id'], 'class="form-control" '); ?>
								<?= form_dropdown('man_receive_feeLabor[]', $ary_man_receive_feelabor, $item['man_receive'], 'class="form-control" '); ?>
							</td>
							<td>
								<?= form_dropdown('method_receive_feeLabor[]', $ary_method_receive_feelabor, $item['method_receive'], 'class="form-control" '); ?>
								<input type="text" name='descr_feeLabor[]' value='<?= ($item['descr']) ?>' class="form-control" />
							</td>
						</tr>
<?php endforeach;?>
						<tr id='<?php echo 'addr_feeLabor'.count($ary_feeLabor) ?>'></tr>
<?php else: ?>
						<tr id='addr_feeLabor0'>
							<td>
								1
								<input type='hidden' name='row_feeLabor[]' value='1'>
							</td>
							<td>
								<?= form_dropdown('type_feeLabor[]', $ary_fee_type, '', 'class="form-control" '); ?>
								<div class='input-group date' id='datetimepicker'>
									<input type="text" class="form-control" name="date_feeLabor[]" value='' pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" required readonly>
									<span class="input-group-addon">
										<span class="glyphicon glyphicon-calendar"></span>
									</span>
								</div>
							</td>
							<td>
								<?= form_dropdown('fee_id_feeLabor[]', $ary_fee_id, '', 'class="form-control" row="1"'); ?>
								<input type="text" name='stage_no_feeLabor[]' class="form-control" row="1" pattern="[0-9]+"/>
							</td>
							<td>
								<input type="text" name='stage_no_start_feeLabor[]' class="form-control" row="1" pattern="[0-9]+"/>
								<input type="text" name='stage_no_end_feeLabor[]' class="form-control" row="1" pattern="[0-9]+"/>
							</td>
							<td>
								<?= form_dropdown('currency_id_feeLabor[]', $ary_currency, '', 'class="form-control" row="1"'); ?>
								<input type="text" name='finance_exchange_rate_feeLabor[]' class="form-control" row="1" pattern="[0-9]+(\.){0,1}[0-9]{0,5}" />
							</td>
							<td>
								<input type="text" name='money_feeLabor[]' class="form-control" pattern="[0-9]+"/>
								<input type="text" name='money_tw_feeLabor[]' value="<?= $lang->line('auto_count_after_save')?>" class="form-control" readonly/>
							</td>
							<td>
								<?= form_dropdown('country_id_feeLabor[]', $ary_country, '', 'class="form-control" '); ?>
								<?= form_dropdown('man_receive_feeLabor[]', $ary_man_receive_feelabor, '', 'class="form-control" '); ?>
							</td>
							<td>
								<?= form_dropdown('method_receive_feeLabor[]', $ary_method_receive_feelabor, '', 'class="form-control" '); ?>
								<input type="text" name='descr_feeLabor[]' class="form-control" />
							</td>
						</tr>
						<tr id='addr_feeLabor1'></tr>
<?php endif; ?>
					</tbody>
				</table>
				<a class="add_row btn btn-warning pull-left" prefix='feeLabor'><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
				<a class="delete_row pull-right btn btn-danger" prefix='feeLabor'><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></a>
				<div class='row mb20' ps='for_add_del_button'>
				</div>
			</div>
		</div>			
	</form>

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
		

<script type="text/javascript">
$(function () {
	if(<?= json_encode($is_audit); ?>  == false) {
		$('#btn_audit_reject').hide();
		$('#btn_audit_pass').hide();
	} else {
		$('#btn_save').hide();
	}

	var i_feeLabor = $("#tab_feeLabor" + " tr").length - 2;

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
			url: $('#hid_baseurl').val() + 'bos/apiSearch',
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

		$.ajax({
			async: false,			
			type: "POST",
			url: $('#hid_baseurl').val() + 'bos/apiGetFeeoutboundLaborSel/' + $('#sel_search').val(),
			data: '',
			dataType: 'json',
			statusCode: {
				200: function(e) {
					$('#div_school_license').html(e[9]+' / '+e[10]+' / '+e[1]);
					$('#div_client_emp').html(e[11]+' / '+e[12]+' / '+e[5]+' / '+e[7]+' / '+e[8]);
					$('#div_quote_id').html(e[13]+' / '+e[14]);
				}
			},
			error: function() {
			}
		});

		$(".modal").modal('hide');
	});


	//create預帶值
	<?php if (strval($id) != '0'): ?>
	<?php else: ?>
		$.ajax({
			type: "POST",
			url: $('#hid_baseurl').val() + 'bos/apiGetQuoteCurrencySel/' + $("select[name='currency_id_feeLabor[]']").val(),
			data: '',
			dataType: 'json',
			statusCode: {
				200: function(e) {
					$("input[name='finance_exchange_rate_feeLabor[]'][row='1']").val(e[1]);
				}
			},
			error: function() {
			}
		});
	<?php endif; ?>

	$("select[name='currency_id_feeLabor[]']").each(function() {
		$(this).bind("change",function(){
			var obj_this = $(this);

			$.ajax({
				type: "POST",
				url: $('#hid_baseurl').val() + 'bos/apiGetQuoteCurrencySel/' + $(this).val(),
				data: '',
				dataType: 'json',
				statusCode: {
					200: function(e) {
						$("input[name='finance_exchange_rate_feeLabor[]'][row='" + obj_this.attr('row') + "']").val(e[1]);
					}
				},
				error: function() {
				}
			});
		});
	});

	$('.date').datetimepicker({
		format: 'YYYY-MM-DD',
		keepInvalid: true,
		ignoreReadonly: true,
		useCurrent: true
	});


	$(".btn-audit").bind("click",function(){
		$.ajax({
			type: "POST",
			url: $('#hid_baseurl').val() + 'bos/feeLabor_doAudit',
			data: {
				result:$(this).attr('fvalue'),	
				id:<?= $id ?>,
				descr:$('input[name="txt_a_descr"]').val()				
			},
			statusCode: {
				200: function() {
					window.location = '<?= base_url()?>bos/feeLabor';
				}
			},
			error: function() {
				alert('操作失敗');
			}
		});
	});

	$(".btn-cancel").bind("click",function(){
		window.location = '<?= base_url()?>bos/feeLabor';
	});	
	
	$("#btn_save").bind("click",function(){
		if(!$("form")[0].checkValidity()) return;

		$.ajax({
			type: "POST",
			url: $('#hid_baseurl').val() + 'bos/feeLabor_doEdit',
			data: $('#form1').serialize(),
			statusCode: {
				200: function() {
					window.location = '<?= base_url()?>bos/feeLabor';
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
			($(this).attr('name') == 'money_tw_feeLabor[]' ? $('input[name="money_tw_feeLabor[]"][row="'+(i + 1)+'"]').val("<?= $lang->line('auto_count_after_save')?>"):"");
		});

		$('#tab_' + prefix).append('<tr id="addr_'+ prefix + (i+1)+'"></tr>');
		var str = tmp + " = " + eval(tmp) + "+1";
		eval(str);

		$("#tab_" + prefix + " select[row=" + (i + 1) + "]").each(function() {
			//insert一筆，預帶值
			if(($(this).attr('name') == 'currency_id_feeLabor[]') && ($(this).attr('row') == (i + 1))){
				var obj_this = $(this);

				$.ajax({
					type: "POST",
					url: $('#hid_baseurl').val() + 'bos/apiGetQuoteCurrencySel/' + $(this).val(),
					data: '',
					dataType: 'json',
					statusCode: {
						200: function(e) {
							$("input[name='finance_exchange_rate_feeLabor[]'][row='" + obj_this.attr('row') + "']").val(e[1]);
						}
					},
					error: function() {
					}
				});
			}
		});

		$("select[name='currency_id_feeLabor[]']").each(function() {
			//重bind要先unbind
			$(this).unbind("change");
			$(this).bind("change",function(){
				var obj_this = $(this);

				$.ajax({
					type: "POST",
					url: $('#hid_baseurl').val() + 'bos/apiGetQuoteCurrencySel/' + $(this).val(),
					data: '',
					dataType: 'json',
					statusCode: {
						200: function(e) {
							$("input[name='finance_exchange_rate_feeLabor[]'][row='" + obj_this.attr('row') + "']").val(e[1]);
						}
					},
					error: function() {
					}
				});
			});
		});

		$('.date').datetimepicker({
			format: 'YYYY-MM-DD',
			keepInvalid: true,
			ignoreReadonly: true,
			useCurrent: true
		});
		
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