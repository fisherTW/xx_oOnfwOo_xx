<script src='<?= base_url()?>assets/js/bootstrap-datetimepicker.min.js'></script>
<script src='<?= base_url()?>assets/js/bootstrap-table.min.js'></script>
<link href='<?= base_url()?>assets/css/bootstrap-datetimepicker.min.css' rel='stylesheet' type='text/css'/>
<link href='<?= base_url()?>assets/css/bootstrap-table.min.css' rel='stylesheet' type='text/css'/>

<input type='hidden' id='hid_baseurl' value='<?= base_url(); ?>'>
<input type='hidden' id='hid_ftype' value=''>
<input type='hidden' id='hid_frow' value=''>

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
				<label class="control-label"><?= $lang->line('labor_id') ?></label>
				<div class="input-group">
<?php if (strval($id) != '0'): ?>
<?php if (strval($info['labor_id']) != '-1'): ?>
					<?= form_dropdown('sel_labor_id', array($info['labor_id'] => $info['labor_id']), $info['labor_id'], 'class="form-control" otype="labor"'); ?>
<?php else: ?>
					<?= form_dropdown('sel_labor_id', array('-1'=>'未選取'), 0, 'class="form-control" otype="labor"'); ?>
<?php endif; ?>
<?php else: ?>
					<?= form_dropdown('sel_labor_id', array('-1'=>'未選取'), 0, 'class="form-control" otype="labor"'); ?>
<?php endif; ?>
					<div class="input-group-btn">
						<button ftype='labor' class="fsearch btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Search...</button>
					</div>
				</div>
			</div>
			<div class="col-sm-6">
				<label class="control-label"><?= $lang->line('name_tw').' / '.$lang->line('a_birthday').' / '.$lang->line('school_short') ?></label>
				<div class="checkbox" id='div_a_name_tw'>
<?php if (strval($id) != '0'): ?>
					<?= $info['l_a_name_tw'].' / '.$info['l_a_birthday'].' / '.$info['tw_short'] ?>						
<?php endif; ?>
				</div>
			</div>
		</div>
		<br>
		<div class="form-group">
			<div class="col-sm-12">
				<table class="table table-bordered table-hover table-responsive" id="tab_feeLaborFee">
					<thead>
						<tr >
							<th width='5%' class="text-center">#</th>
							<th width='10%' class="text-center text-nowrap"><?= $lang->line('payment_type') ?></th>
							<th width='15%' class="text-center text-nowrap"><?= $lang->line('1-3-1')."/".$lang->line('date') ?></th>
							<th width='15%' class="text-center text-nowrap"><?= $lang->line('1-1-8')."/".$lang->line('finance_exchange_rate') ?></th>
							<th width='15%' class="text-center text-nowrap"><?= $lang->line('hire_money')."/".$lang->line('money_tw') ?></th>
							<th width='40%' class="text-center text-nowrap"><?= $lang->line('site')."/".$lang->line('desc') ?></th>
						</tr>
					</thead>
					<tbody>
<?php if(count($ary_feeLaborFee) > 0): ?>
<?php foreach ($ary_feeLaborFee as $item): ?>
						<tr id="<?= 'addr_feeLaborFee'.($item['row'] - 1) ?>">
							<td>
								<?= ($item['row']) ?>
								<input type='hidden' name='row_feeLaborFee[]' value='<?= ($item['row']) ?>'>
							</td>
							<td>
								<?= form_dropdown('type_feeLaborFee[]', $ary_fee_type, $item['type'], 'class="form-control" row="'.$item['row'].'"'); ?>
							</td>
							<td>
								<?= form_dropdown('fee_id_feeLaborFee[]', $ary_fee_id, $item['fee_id'], 'class="form-control" row="'.$item['row'].'"'); ?>
								<div class='input-group date' id='datetimepicker'>
									<input type="text" class="form-control" name="date_feeLaborFee[]" value='<?= ($item['date']) ?>' readonly>
									<span class="input-group-addon">
										<span class="glyphicon glyphicon-calendar"></span>
									</span>
								</div>
							</td>
							<td>
								<?= form_dropdown('currency_id_feeLaborFee[]', $ary_currency, $item['currency_id'], 'class="form-control" row="'.$item['row'].'"'); ?>
								<input type="text" name='finance_exchange_rate_feeLaborFee[]' value='<?= ($item['finance_exchange_rate']) ?>' class="form-control" row="<?=$item['row']?>" pattern="[0-9]+(\.){0,1}[0-9]{0,5}" />
							</td>
							<td>
								<input type="text" name='money_feeLaborFee[]' value='<?= ($item['money']) ?>' class="form-control" pattern="[0-9]+"/>
<?php if($item['money'] != 0 ): ?>								
								<input type="text" name='money_tw_feeLaborFee[]' value='<?= ($item['money_tw']) ?>' class="form-control" readonly/>
<?php else: ?>
								<input type="text" name='money_tw_feeLaborFee[]' value="<?= $lang->line('auto_count_after_save')?>" class="form-control" readonly/>
<?php endif; ?>								
							</td>
							<td>
								<?= form_dropdown('country_id_feeLaborFee[]', $ary_country, $item['country_id'], 'class="form-control" row="'.$item['row'].'"'); ?>
								<textarea name='descr_feeLaborFee[]' class='form-control'><?= $item['descr']?></textarea>
 							</td>								
						</tr>
<?php endforeach;?>
						<tr id='<?php echo 'addr_feeLaborFee'.count($ary_feeLaborFee) ?>'></tr>
<?php else: ?>
						<tr id='addr_feeLaborFee0'>
							<td>
								1
								<input type='hidden' name='row_feeLaborFee[]' value='1'>
							</td>
							<td>
								<?= form_dropdown('type_feeLaborFee[]', $ary_fee_type, '', 'class="form-control" row="1"'); ?>
							</td>
							<td>
								<?= form_dropdown('fee_id_feeLaborFee[]', $ary_fee_id, '', 'class="form-control" row="1"'); ?>
								<div class='input-group date' id='datetimepicker'>
									<input type="text" class="form-control" name="date_feeLaborFee[]" value='' readonly>
									<span class="input-group-addon">
										<span class="glyphicon glyphicon-calendar"></span>
									</span>
								</div>
							</td>
							<td>
								<?= form_dropdown('currency_id_feeLaborFee[]', $ary_currency, '', 'class="form-control" row="1"'); ?>
								<input type="text" name='finance_exchange_rate_feeLaborFee[]' class="form-control" row="1" pattern="[0-9]+(\.){0,1}[0-9]{0,5}" />	 
 							</td>
							<td>
								<input type="text" name='money_feeLaborFee[]' class="form-control" pattern="[0-9]+"/>
								<input type="text" name='money_tw_feeLaborFee[]' value="<?= $lang->line('auto_count_after_save')?>" class="form-control" readonly/>
							</td>
							<td>
								<?= form_dropdown('country_id_feeLaborFee[]', $ary_country, '', 'class="form-control" row="1"'); ?>
								<textarea name='descr_feeLaborFee[]' class='form-control' row="1"></textarea>
 							</td>
						</tr>
						<tr id='addr_feeLaborFee1'></tr>
<?php endif; ?>
					</tbody>
				</table>
				<a class="add_row btn btn-warning pull-left" prefix='feeLaborFee'><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
				<a class="delete_row pull-right btn btn-danger" prefix='feeLaborFee'><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></a>
				<div class='row mb20' ps='for_add_del_button'>
				</div>
			</div>
		</div>
	</form>
	<div class='modal fade' id='ddd'>
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h2 class="modal-title">Search: <span id='span_modal_title'></span></h2>
				</div>
				<div class='modal-body'>
					<input type="text" class="form-control" name="txt_search" ></input>
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

	var i_feeLaborFee = $("#tab_feeLaborFee" + " tr").length - 2;

	$('select[name="currency_id_feeLaborFee[]"]').bind('change', this, onchg_currency_id);
	$('select[name="currency_id_feeLaborFee[]"]').trigger('change');

	$('.date').datetimepicker({
		format: 'YYYY-MM-DD',
		keepInvalid: true,
		ignoreReadonly: true,
		useCurrent: true
	});

	$(".btn-audit").bind("click",function(){
		$.ajax({
			async: false,
			type: "POST",
			url: $('#hid_baseurl').val() + 'eam/fee_labor_doAudit',
			data: {
				result:$(this).attr('fvalue'),	
				id:<?= $id ?>,
				descr:$('input[name="txt_a_descr"]').val()
			},
			statusCode: {
				200: function() {
					window.location = '<?= base_url()?>eam/fee_labor';
				}
			},
			error: function() {
				alert('操作失敗');
			}
		});
	});
	$(".btn-cancel").bind("click",function(){
		if('<?= $func ?>'== '414') {
			var labor = '<?= base_url()?>eam/fee_labor';
		} else {
			var labor = '<?= base_url()?>eam/fee_labor2';
		}
		window.location = labor;
	});
	$("#btn_save").bind("click",function(){
		if(!$("form")[0].checkValidity()) return;
		if ('<?= $func ?>'== '414') {
			$type = 'a';
		} else {
			$type = 'b';
		}
		$.ajax({
			async: false,
			type: "POST",
			url: $('#hid_baseurl').val() + 'eam/fee_labor_doEdit/'+ $type,
			data: $('#form1').serialize(),
			statusCode: {
				200: function() {
					if('<?= $func ?>'== '414') {
						var labor = '<?= base_url()?>eam/fee_labor';
					} else {
						var labor = '<?= base_url()?>eam/fee_labor2';
					}
					window.location = labor;
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

		$("select[otype=" + $('#hid_ftype').val() +"] option").remove();
		$("select[otype=" + $('#hid_ftype').val() +"]").append($("<option></option>").attr("value", $('#sel_search').val()).text($('#sel_search :selected').text()));

		$.ajax({
			async: false,			
            type: "POST",
            url: $('#hid_baseurl').val() + 'eam/apiGetLaborById',
            data: {labor_id:$('#sel_search :selected').text()},
            statusCode: {
                200: function(e) {
                    var obj = JSON.parse(e);
                    $('#div_a_name_tw').html(obj.a_name_tw + ' / ' + obj.a_birthday + ' / ' + obj.a_school_id);
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

		$("#tab_" + prefix + " input[row=" + (i + 1) + "]").each(function() {
			$(this).val('');
			($(this).attr('name') == 'money_tw_feeLaborFee[]' ? $('input[name="money_tw_feeLaborFee[]"][row="'+(i + 1)+'"]').val("<?= $lang->line('auto_count_after_save')?>"):"");			
		});		

		$('#tab_' + prefix).append('<tr id="addr_'+ prefix + (i+1)+'"></tr>');
		var str = tmp + " = " + eval(tmp) + "+1";
		eval(str);

		$('select[name="currency_id_feeLaborFee[]"]').unbind();
		$('select[name="currency_id_feeLaborFee[]"]').bind('change', this, onchg_currency_id);
		$('select[name="currency_id_feeLaborFee[]"]:last').trigger('change');

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

	$("select[name=currency_id_feeLaborFee]").bind("change",function(){
		onchg_currency_id();
	});

});
function onchg_currency_id() {
	var row = $(this).attr('row');

	$.ajax({
		async: false,
		type: "POST",
		url: $('#hid_baseurl').val() + 'eam/apiGetFerByCurrencyId',
		data: {id:$(this).val()},
		statusCode: {
			200: function(e) {
				var obj = JSON.parse(e);
				$('input[name="finance_exchange_rate_feeLaborFee[]"][row="'+ row +'"]').val(obj.finance_exchange_rate);
			}
		},
		error: function() {
			alert('操作失敗');
		}
	});	
}
</script>