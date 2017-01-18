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
			<div class="col-sm-6">
				<label class="control-label"><?= $lang->line('date_create').' / '.$lang->line('user_create') ?></label>
				<div class="checkbox">
<?php if (strval($id) != '0'): ?>
					<?= $info['date_create'].' / '.$info['user_create_name'] ?>
<?php else: ?>
					<?= date("Y-m-d").' / '.$account ?>
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
				<label class="control-label"><?= $lang->line('inbound_date').' / '.$lang->line('outbound_date').' / '.$lang->line('c_outbound_descr').' / '.$lang->line('o_i_date') ?></label>
				<div class="checkbox" id="div_in_out_date">
<?php if (strval($id) != '0'): ?>
					<?= $info['li_date'].' / '.$info['c_outbound_date'].' / '.$info['c_outbound_descr'].' / '.((strtotime($info['c_outbound_date']) - strtotime($info['li_date']))/ (60*60*24)) ?>
<?php else: ?>
<?php endif; ?>	
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-6">
				<label class="control-label"><?= $lang->line('employed_workers_id') ?></label>
				<div >
<?php if (strval($id) != '0'): ?>
					<?= form_dropdown('sel_hire_id', $ary_hire_id, $info['hire_id'], 'class="form-control"'); ?>
<?php else: ?>
					<?= form_dropdown('sel_hire_id', $ary_hire_id, '', 'class="form-control"'); ?>
<?php endif; ?>				
				</div>
			</div>
			<div class="col-sm-3">
				<label class="control-label"><?= $lang->line('client').' / '.$lang->line('employer').' / '.$lang->line('duration').' / ' ?></label>
				<div class="checkbox" id="div_client_emp">
<?php if (strval($id) != '0'): ?>
					<?= $info['c_name_tw'].' / '.$info['e_name_tw'].' / '.$info['work_limit'] ?>
<?php else: ?>
					<?= $ary_sel_defult[20].' / '.$ary_sel_defult[21].' / '.$ary_sel_defult[22] ?>
<?php endif; ?>	
				</div>
			</div>
			<div class="col-sm-3">
				<label class="control-label"><?= $lang->line('school_short').' / '.$lang->line('license_foreign') ?></label>
				<div class="checkbox" id="div_school_license">
<?php if (strval($id) != '0'): ?>
					<?= $info['tw_short'].' / '.$info['b_license_foreign_tw'] ?>
<?php else: ?>
<?php endif; ?>	
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-6">
			</div>
			<div class="col-sm-6">
				<label class="control-label"><?= $lang->line('quote_id').' / '.$lang->line('quote_descr') ?></label>
				<div class="checkbox" id="div_quote_id">
<?php if (strval($id) != '0'): ?>
					<?= $info['quote_id'].' / '.$info['quote_descr'] ?>
<?php else: ?>
					<?= $ary_sel_defult[0].' / '.$ary_sel_defult[1] ?>
<?php endif; ?>
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-6">
				<label class="control-label"><?= $lang->line('fee_outbound') ?></label>
				<div>
<?php if (strval($id) != '0'): ?>
					<input type="text" class="form-control" name="txt_fee" value='<?= $info['fee']?>' pattern="[0-9]+">
<?php else: ?>
					<input type="text" class="form-control" name="txt_fee" value='' pattern="[0-9]+">
<?php endif; ?>
				</div>
			</div>
			<div class="col-sm-6">
				<label class="control-label"><?= $lang->line('m_f_money') ?></label>
				<table class="table table-bordered table-hover table-responsive" id="tab_feeOutboundFee">
					<thead>
						<tr >
							<th class="text-center">#</th>
							<th class="text-center text-nowrap"><?= $lang->line('m_f_money') ?></th>
						</tr>
					</thead>
					<tbody>
<? $row=0; ?>						
<?php if(count($ary_feeOutboundFee) > 0): ?>
<?php foreach ($ary_feeOutboundFee as $item): ?>
<? $row++;$item['row']=$row; ?>	
						<tr id="<?= 'addr_feeOutboundFee'.($item['row'] - 1) ?>">
							<td>
								<?= ($item['row']) ?>
								<input type='hidden' name='row_feeOutboundFee[]' value='<?= ($item['row']) ?>'>
							</td>
							<td>
								<input type="text" name='fee6_feeOutboundFee[]' value='<?= ($item['fee6']) ?>' class="form-control" pattern="[0-9]+"/>
							</td>
						</tr>
<?php endforeach;?>
						<tr id='<?php echo 'addr_feeOutboundFee'.count($ary_feeOutboundFee) ?>'></tr>
<?php else: ?>
						<tr id='addr_feeOutboundFee0'>
							<td>
								1
								<input type='hidden' name='row_feeOutboundFee[]' value='1'>
							</td>
							<td>
								<input type="text" name='fee6_feeOutboundFee[]' class="form-control" pattern="[0-9]+"/>
							</td>
						</tr>
						<tr id='addr_feeOutboundFee1'></tr>
<?php endif; ?>
					</tbody>
				</table>
				<a class="add_row btn btn-warning pull-left" prefix='feeOutboundFee'><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
				<a class="delete_row pull-right btn btn-danger" prefix='feeOutboundFee'><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></a>
				<div class='row mb20' ps='for_add_del_button'>
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-6">
				<label class="control-label"><?= $lang->line('fee_outbound2') ?></label>
				<div>
<?php if (strval($id) != '0'): ?>
					<input type="text" class="form-control" name="txt_fee2" value='<?= $info['fee2']?>' pattern="[0-9]+">
<?php else: ?>
					<input type="text" class="form-control" name="txt_fee2" value='' pattern="[0-9]+">
<?php endif; ?>
				</div>
			</div>
			<div class="col-sm-6">
				<label class="control-label"><?= $lang->line('fee_outbound7') ?></label>
				<div>
<?php if (strval($id) != '0'): ?>
					<input type="text" class="form-control" name="txt_fee7" value='<?= $info['fee7']?>' pattern="[0-9]+">
<?php else: ?>
					<input type="text" class="form-control" name="txt_fee7" value='' pattern="[0-9]+">
<?php endif; ?>
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-6">
				<label class="control-label"><?= $lang->line('fee_outbound3') ?></label>
				<div>
<?php if (strval($id) != '0'): ?>
					<input type="text" class="form-control" name="txt_fee3" value='<?= $info['fee3']?>' pattern="[0-9]+">
<?php else: ?>
					<input type="text" class="form-control" name="txt_fee3" value='' pattern="[0-9]+">
<?php endif; ?>
				</div>
			</div>
			<div class="col-sm-6">
				<label class="control-label"><?= $lang->line('fee_outbound8') ?></label>
				<div>
<?php if (strval($id) != '0'): ?>
					<input type="text" class="form-control" name="txt_fee8" value='<?= $info['fee8']?>' pattern="[0-9]+">
<?php else: ?>
					<input type="text" class="form-control" name="txt_fee8" value='' pattern="[0-9]+">
<?php endif; ?>
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-6">
				<label class="control-label"><?= $lang->line('fee_outbound4') ?></label>
				<div>
<?php if (strval($id) != '0'): ?>
					<input type="text" class="form-control" name="txt_fee4" value='<?= $info['fee4']?>' pattern="[0-9]+">
<?php else: ?>
					<input type="text" class="form-control" name="txt_fee4" value='' pattern="[0-9]+">
<?php endif; ?>
				</div>
			</div>
			<div class="col-sm-6">
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-6">
				<label class="control-label"><?= $lang->line('fee_outbound5') ?></label>
				<div>
<?php if (strval($id) != '0'): ?>
					<input type="text" class="form-control" name="txt_fee5" value='<?= $info['fee5']?>' pattern="[0-9]+">
<?php else: ?>
					<input type="text" class="form-control" name="txt_fee5" value='' pattern="[0-9]+">
<?php endif; ?>				
				</div>
			</div>
			<div class="col-sm-6">
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-2">
				<label class="control-label"><?= $lang->line('1-3-1') ?></label>
				<div>
<?php if (strval($id) != '0'): ?>
					<?= form_dropdown('sel_fee_id', $ary_fee_id_outbound, $info['fee_id'], 'class="form-control sel" disabled="disabled"'); ?>
<?php else: ?>
					<?= form_dropdown('sel_fee_id', $ary_fee_id_outbound, '1', 'class="form-control sel" disabled="disabled"'); ?>
<?php endif; ?>
				</div>
			</div>
			<div class="col-sm-2">
				<label class="control-label"><?= $lang->line('1-1-8') ?></label>
				<div>
<?php if (strval($id) != '0'): ?>
					<?= form_dropdown('sel_currency_id', ($info['currency_id']==0?array():$ary_currency), $info['currency_id'], 'class="form-control sel" disabled="disabled"'); ?>
<?php else: ?>
					<?= form_dropdown('sel_currency_id', $ary_currency, $ary_sel_defult[3], 'class="form-control sel" disabled="disabled"'); ?>
<?php endif; ?>
				</div>
			</div>
			<div class="col-sm-1">
				<label class="control-label"><?= $lang->line('quote_exchange_rate') ?></label>
				<div>
<?php if (strval($id) != '0'): ?>
					<input type="text" name='txt_quote_exchange_rate' value='<?= ($info['quote_exchange_rate']) ?>' class="form-control" readonly/>
<?php else: ?>
					<input type="text" name='txt_quote_exchange_rate' value='<?= $ary_sel_defult[4]?>' class="form-control" readonly/>
<?php endif; ?>	
				</div>
			</div>
			<div class="col-sm-1">
				<label class="control-label"><?= $lang->line('hire_money') ?></label>
				<div>
<?php if (strval($id) != '0'): ?>
					<input type="text" name='txt_money' value='<?= ($info['money']) ?>' class="form-control" readonly/>
<?php else: ?>
					<input type="text" name='txt_money' value='<?= $ary_sel_defult[5]?>' class="form-control" readonly/>
<?php endif; ?>	
				</div>
			</div>
			<div class="col-sm-2">
				<label class="control-label"><?= $lang->line('money_tw') ?></label>
				<div>
<?php if (strval($id) != '0'): ?>
					<input type="text" name='txt_money_tw' value='<?= ($info['money_tw']) ?>' class="form-control" readonly/>
<?php else: ?>
					<input type="text" name='txt_money_tw' value='<?= $ary_sel_defult[6]?>' class="form-control" readonly/>
<?php endif; ?>	
				</div>
			</div>
			<div class="col-sm-2">
				<label class="control-label"><?= $lang->line('man_receive') ?></label>
				<div>
<?php if (strval($id) != '0'): ?>
					<?= form_dropdown('sel_man_receive', ($info['man_receive']==0?array():$ary_man_receive), $info['man_receive'], 'class="form-control sel" disabled="disabled"'); ?>
<?php else: ?>
					<?= form_dropdown('sel_man_receive', $ary_man_receive, $ary_sel_defult[7], 'class="form-control sel" disabled="disabled"'); ?>
<?php endif; ?>
				</div>
			</div>
			<div class="col-sm-2">
				<label class="control-label"><?= $lang->line('method_receive') ?></label>
				<div>
<?php if (strval($id) != '0'): ?>
					<?= form_dropdown('sel_method_receive', $ary_method_receive, $info['method_receive'], 'class="form-control"'); ?>
<?php else: ?>
					<?= form_dropdown('sel_method_receive', $ary_method_receive, '', 'class="form-control"'); ?>
<?php endif; ?>	
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-2">
				<label class="control-label">　</label>
				<div>
<?php if (strval($id) != '0'): ?>
					<?= form_dropdown('sel_fee_id2', $ary_fee_id_outbound, $info['fee_id2'], 'class="form-control sel" disabled="disabled"'); ?>
<?php else: ?>
					<?= form_dropdown('sel_fee_id2', $ary_fee_id_outbound, '2', 'class="form-control sel" disabled="disabled"'); ?>
<?php endif; ?>
				</div>
			</div>
			<div class="col-sm-2">
				<label class="control-label">　</label>
				<div>
<?php if (strval($id) != '0'): ?>
					<?= form_dropdown('sel_currency_id2', ($info['currency_id2']==0?array():$ary_currency), $info['currency_id2'], 'class="form-control sel" disabled="disabled"'); ?>
<?php else: ?>
					<?= form_dropdown('sel_currency_id2', $ary_currency, $ary_sel_defult[9], 'class="form-control sel" disabled="disabled"'); ?>
<?php endif; ?>
				</div>
			</div>
			<div class="col-sm-1">
				<label class="control-label">　</label>
				<div>
<?php if (strval($id) != '0'): ?>
					<input type="text" name='txt_quote_exchange_rate2' value='<?= ($info['quote_exchange_rate2']) ?>' class="form-control" readonly/>
<?php else: ?>
					<input type="text" name='txt_quote_exchange_rate2' value='<?= $ary_sel_defult[10]?>' class="form-control" readonly/>
<?php endif; ?>	
				</div>
			</div>
			<div class="col-sm-1">
				<label class="control-label">　</label>
				<div>
<?php if (strval($id) != '0'): ?>
					<input type="text" name='txt_money2' value='<?= ($info['money2']) ?>' class="form-control" readonly/>
<?php else: ?>
					<input type="text" name='txt_money2' value='<?= $ary_sel_defult[11]?>' class="form-control" readonly/>
<?php endif; ?>	
				</div>
			</div>
			<div class="col-sm-2">
				<label class="control-label">　</label>
				<div>
<?php if (strval($id) != '0'): ?>
					<input type="text" name='txt_money_tw2' value='<?= ($info['money_tw2']) ?>' class="form-control" readonly/>
<?php else: ?>
					<input type="text" name='txt_money_tw2' value='<?= $ary_sel_defult[12]?>' class="form-control" readonly/>
<?php endif; ?>	
				</div>
			</div>
			<div class="col-sm-2">
				<label class="control-label">　</label>
				<div>
<?php if (strval($id) != '0'): ?>
					<?= form_dropdown('sel_man_receive2', ($info['man_receive2']==0?array():$ary_man_receive), $info['man_receive2'], 'class="form-control sel" disabled="disabled"'); ?>
<?php else: ?>
					<?= form_dropdown('sel_man_receive2', $ary_man_receive, $ary_sel_defult[13], 'class="form-control sel" disabled="disabled"'); ?>
<?php endif; ?>
				</div>
			</div>
			<div class="col-sm-2">
				<label class="control-label">　</label>
				<div>
<?php if (strval($id) != '0'): ?>
					<?= form_dropdown('sel_method_receive2', $ary_method_receive, $info['method_receive2'], 'class="form-control"'); ?>
<?php else: ?>
					<?= form_dropdown('sel_method_receive2', $ary_method_receive, '', 'class="form-control"'); ?>
<?php endif; ?>	
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-2">
				<label class="control-label">　</label>
				<div>
<?php if (strval($id) != '0'): ?>
					<?= form_dropdown('sel_fee_id3', $ary_fee_id_outbound, $info['fee_id3'], 'class="form-control sel" disabled="disabled"'); ?>
<?php else: ?>
					<?= form_dropdown('sel_fee_id3', $ary_fee_id_outbound, '3', 'class="form-control sel" disabled="disabled"'); ?>
<?php endif; ?>
				</div>
			</div>
			<div class="col-sm-2">
				<label class="control-label">　</label>
				<div>
<?php if (strval($id) != '0'): ?>
					<?= form_dropdown('sel_currency_id3', ($info['currency_id3']==0?array():$ary_currency), $info['currency_id3'], 'class="form-control sel" disabled="disabled"'); ?>
<?php else: ?>
					<?= form_dropdown('sel_currency_id3', $ary_currency, $ary_sel_defult[15], 'class="form-control sel" disabled="disabled"'); ?>
<?php endif; ?>
				</div>
			</div>
			<div class="col-sm-1">
				<label class="control-label">　</label>
				<div>
<?php if (strval($id) != '0'): ?>
					<input type="text" name='txt_quote_exchange_rate3' value='<?= ($info['quote_exchange_rate3']) ?>' class="form-control" readonly/>
<?php else: ?>
					<input type="text" name='txt_quote_exchange_rate3' value='<?= $ary_sel_defult[16]?>' class="form-control" readonly/>
<?php endif; ?>	
				</div>
			</div>
			<div class="col-sm-1">
				<label class="control-label">　</label>
				<div>
<?php if (strval($id) != '0'): ?>
					<input type="text" name='txt_money3' value='<?= ($info['money3']) ?>' class="form-control" readonly/>
<?php else: ?>
					<input type="text" name='txt_money3' value='<?= $ary_sel_defult[17]?>' class="form-control" readonly/>
<?php endif; ?>	
				</div>
			</div>
			<div class="col-sm-2">
				<label class="control-label">　</label>
				<div>
<?php if (strval($id) != '0'): ?>
					<input type="text" name='txt_money_tw3' value='<?= ($info['money_tw3']) ?>' class="form-control" readonly/>
<?php else: ?>
					<input type="text" name='txt_money_tw3' value='<?= $ary_sel_defult[18]?>' class="form-control" readonly/>
<?php endif; ?>	
				</div>
			</div>
			<div class="col-sm-2">
				<label class="control-label">　</label>
				<div>
<?php if (strval($id) != '0'): ?>
					<?= form_dropdown('sel_man_receive3', ($info['man_receive3']==0?array():$ary_man_receive), $info['man_receive3'], 'class="form-control sel" disabled="disabled"'); ?>
<?php else: ?>
					<?= form_dropdown('sel_man_receive3', $ary_man_receive, $ary_sel_defult[19], 'class="form-control sel" disabled="disabled"'); ?>
<?php endif; ?>
				</div>
			</div>
			<div class="col-sm-2">
				<label class="control-label">　</label>
				<div>
<?php if (strval($id) != '0'): ?>
					<?= form_dropdown('sel_method_receive3', $ary_method_receive, $info['method_receive3'], 'class="form-control"'); ?>
<?php else: ?>
					<?= form_dropdown('sel_method_receive3', $ary_method_receive, '', 'class="form-control"'); ?>
<?php endif; ?>	
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

	var i_feeOutboundFee = $("#tab_feeOutboundFee" + " tr").length - 2;

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
			type: "POST",
			url: $('#hid_baseurl').val() + 'bos/apiGetFeeoutboundLaborSel/' + $('#sel_search').val(),
			data: '',
			dataType: 'json',
			statusCode: {
				200: function(e) {
					$('#div_school_license').html(e[1]+' / '+e[2]);
					$('#div_in_out_date').html(e[5]+' / '+e[3]+' / '+e[4]+' / '+e[6]);
				}
			},
			error: function() {
			}
		});

		$(".modal").modal('hide');
	});


	$("select[name=sel_hire_id]").each(function() {
		$(this).bind("change",function(){
			var obj_this = $(this);

			$.ajax({
				type: "POST",
				url: $('#hid_baseurl').val() + 'bos/apiGetFeeoutboundHireIdSel/' + $(this).val(),
				data: '',
				dataType: 'json',
				statusCode: {
					200: function(e) {
						$('#div_quote_id').html(e[0]+' / '+e[1]);
						$("select[name=sel_currency_id]").val(e[3]);
						$("input[name=txt_quote_exchange_rate]").val(e[4]);
						$("input[name=txt_money]").val(e[5]);
						$("input[name=txt_money_tw]").val(e[6]);
						$("select[name=sel_man_receive]").val(e[7]);
						$("select[name=sel_currency_id2]").val(e[9]);
						$("input[name=txt_quote_exchange_rate2]").val(e[10]);
						$("input[name=txt_money2]").val(e[11]);
						$("input[name=txt_money_tw2]").val(e[12]);
						$("select[name=sel_man_receive2]").val(e[13]);
						$("select[name=sel_currency_id3]").val(e[15]);
						$("input[name=txt_quote_exchange_rate3]").val(e[16]);
						$("input[name=txt_money3]").val(e[17]);
						$("input[name=txt_money_tw3]").val(e[18]);
						$("select[name=sel_man_receive3]").val(e[19]);
						$('#div_client_emp').html(e[20]+' / '+e[21]+' / '+e[22]);
					}
				},
				error: function() {
				}
			});

		});
	});

	$(".btn-audit").bind("click",function(){
		$.ajax({
			type: "POST",
			url: $('#hid_baseurl').val() + 'bos/feeoutbound_doAudit',
			data: {
				result:$(this).attr('fvalue'),	
				id:<?= $id ?>,
				descr:$('input[name="txt_a_descr"]').val()				
			},
			statusCode: {
				200: function() {
					window.location = '<?= base_url()?>bos/feeoutbound';
				}
			},
			error: function() {
				alert('操作失敗');
			}
		});
	});


	$('.date').datetimepicker({
		format: 'YYYY-MM-DD',
		keepInvalid: true,
		ignoreReadonly: true,
		useCurrent: true
	});

	$(".btn-cancel").bind("click",function(){
		window.location = '<?= base_url()?>bos/feeoutbound';
	});	
	
	$("#btn_save").bind("click",function(){
		if(!$("form")[0].checkValidity()) return;

		$(".sel").attr("disabled",false);

		$.ajax({
			type: "POST",
			url: $('#hid_baseurl').val() + 'bos/feeoutbound_doEdit',
			data: $('#form1').serialize(),
			statusCode: {
				200: function() {
					window.location = '<?= base_url()?>bos/feeoutbound';
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