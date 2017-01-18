<script src='<?= base_url()?>assets/js/fileinput.min.js'></script>
<script src='<?= base_url()?>assets/js/fileinput_locale_zh-TW.js'></script>
<link href='<?= base_url()?>assets/css/fileinput.min.css' rel='stylesheet' type='text/css'/>

<input type='hidden' id='hid_baseurl' value='<?= base_url(); ?>'>
<input type='hidden' id='hid_ftype' value=''>
<input type='hidden' id='hid_frow' value=''>

<div class="container">
	<form class="form-horizontal" id='form1'>
		<input type='hidden' name='hid_id' value='<?= $id ?>'>
		<h1><?= $title ?></h1>
		<div class="tab-content">
			<div class="form-group">
				<div class="col-sm-6">
					<label class="control-label"><?= $lang->line('id') ?></label>
					<div>
<?php if (strval($id) != '0'): ?>
						<?= $info['id'] ?>
<?php else: ?>
						<?= $lang->line('generate_system') ?>
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
					<label class="control-label"><?= $lang->line('client') ?></label>
					<div class="input-group">
<?php if (strval($id) != '0'): ?>
<?php if (strval($info['client_id']) != '-1'): ?>
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
					<label class="control-label"><?= $lang->line('employer') ?></label>
					<div>
						<div class="input-group">
<?php if (strval($id) != '0'): ?>
<?php if (strval($info['employer_id']) != '-1'): ?>
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
					<label class="control-label"><?= $lang->line('sales_id') ?></label>
					<div>
<?php if (strval($id) != '0'): ?>
						<?= form_dropdown('sel_sales_id', $ary_sales, $info['sales_id'], 'class="form-control"'); ?>
<?php else: ?>
						<?= form_dropdown('sel_sales_id', $ary_sales, '', 'class="form-control"'); ?>
<?php endif; ?>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-6">
					<label class="control-label"><?= $lang->line('1-3-1') ?></label>
					<div>
<?php if (strval($id) != '0'): ?>
						<?= form_dropdown('sel_fee_id', $ary_fee, $info['fee_id'], 'class="form-control"'); ?>
<?php else: ?>
						<?= form_dropdown('sel_fee_id', $ary_fee, '', 'class="form-control"'); ?>
<?php endif; ?>
					</div>
				</div>
				<div class="col-sm-6">
					<label class="control-label"><?= $lang->line('service_id') ?></label>
					<div>
<?php if (strval($id) != '0'): ?>
						<?= form_dropdown('sel_service_id', $ary_service, $info['service_id'], 'class="form-control"'); ?>
<?php else: ?>
						<?= form_dropdown('sel_service_id', $ary_service, '', 'class="form-control"'); ?>
<?php endif; ?>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-6">
					<label class="control-label"><?= $lang->line('doc_file_path') ?></label>
					<div>
<?php if (strval($id) != '0'): ?>
						<input id="file_1" type="file" class="file-loading">
						<input name='hid_filepath1' type='hidden' value='<?= $info['file_path']?>'>
<?php else: ?>
						<input id="file_1" type="file" class="file-loading">
						<input name='hid_filepath1' type='hidden' value=''>
<?php endif; ?>
					</div>					
				</div>
				<div class="col-sm-6">
					<label class="control-label"><?= $lang->line('desc') ?></label>
					<div>
<?php if (strval($id) != '0'): ?>
						<input type="text" class="form-control" name="txt_descr" value='<?= $info['descr']?>'>
<?php else: ?>
						<input type="text" class="form-control" name="txt_descr" value=''>
<?php endif; ?>
					</div>					
				</div>
			</div>		
		</div>
		<br>
		<div class="form-group">
			<div class="col-sm-12">
				<table class="table table-bordered table-hover table-responsive" id="tab_feeClientFee">
					<thead>
						<tr >
							<th class="text-center" rowspan='2'>#</th>
							<th class="text-center text-nowrap" rowspan='2'><?= $lang->line('currencyname')." / ".$lang->line('hire_money') ?></th>
							<th class="text-center text-nowrap" width="300" rowspan='2'><?= $lang->line('man_receive')." / ".$lang->line('worker_id')." & ".$lang->line('student_no') ?></th>
							<th class="text-center" colspan='4'><?= $lang->line('unit') ?></th>
						</tr>
						<tr>
							<th class="text-center text-nowrap">XX / 越南河內</th>
							<th class="text-center text-nowrap">越南藝安 / 越南胡志明</th>
							<th class="text-center text-nowrap">印尼雅加達 / 印尼瑪瑯</th>
							<th class="text-center text-nowrap">菲律賓</th>
						</tr>
					</thead>
					<tbody>
<?php if(count($ary_feeClientFee) > 0): ?>
<?php foreach ($ary_feeClientFee as $item): ?>
						<tr id="<?= 'addr_feeClientFee'.($item['row'] - 1) ?>">
							<td>
								<?= ($item['row']) ?>
								<input type='hidden' name='row_feeClientFee[]' value='<?= ($item['row']) ?>'>
							</td>
							<td>
								<?= form_dropdown('currency_id[]', $ary_currency_id, $item['currency_id'], 'class="form-control"'); ?>
								<input type="text" name='money_feeClientFee[]' value='<?= ($item['money']) ?>' class="form-control" pattern="[0-9]+"  style="text-align: right"/>
							</td>
							<td>
								<?= form_dropdown('man_receive[]', $ary_man_receive, $item['man_receive'], 'class="form-control"'); ?>
								<div class="input-group">
									<?= form_dropdown('sel_labor_id[]', array($item['labor_id'] => $item['name_en']), $item['name_en'], 'class="form-control" otype="labor" row="'.$item['row'].'"'); ?>
									<div class="input-group-btn">
										<button ftype='labor' row='<?= ($item['row']) ?>' class="fsearch btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Search...</button>
									</div>
								</div>
							</td>
							<td>
								<input type="text" name='unit_feeClientFee[]' value='<?= ($item['unit']) ?>' class="form-control" pattern="[0-9]+"  style="text-align: right"/>
								<input type="text" name='unit2_feeClientFee[]' value='<?= ($item['unit2']) ?>' class="form-control" pattern="[0-9]+"  style="text-align: right"/>
							</td>
							<td>
								<input type="text" name='unit3_feeClientFee[]' value='<?= ($item['unit3']) ?>' class="form-control" pattern="[0-9]+"  style="text-align: right"/>
								<input type="text" name='unit4_feeClientFee[]' value='<?= ($item['unit4']) ?>' class="form-control" pattern="[0-9]+"  style="text-align: right"/>
							</td>
							<td>
								<input type="text" name='unit5_feeClientFee[]' value='<?= ($item['unit5']) ?>' class="form-control" pattern="[0-9]+"  style="text-align: right"/>
								<input type="text" name='unit6_feeClientFee[]' value='<?= ($item['unit6']) ?>' class="form-control" pattern="[0-9]+"  style="text-align: right"/>
							</td>
							<td>
								<input type="text" name='unit7_feeClientFee[]' value='<?= ($item['unit7']) ?>' class="form-control" pattern="[0-9]+"  style="text-align: right"/>
							</td>
						</tr>
<?php endforeach;?>
						<tr id='<?php echo 'addr_feeClientFee'.count($ary_feeClientFee) ?>'></tr>
<?php else: ?>
						<tr id='addr_feeClientFee0'>
							<td>
								1
								<input type='hidden' name='row_feeClientFee[]' value='1'>
							</td>
							<td>
								<?= form_dropdown('currency_id[]', $ary_currency_id, '', 'class="form-control"'); ?>
								<input type="text" name='money_feeClientFee[]' class="form-control" pattern="[0-9]+"  style="text-align: right"/>
							</td>
							<td>
								<?= form_dropdown('man_receive[]', $ary_man_receive, '', 'class="form-control"'); ?>
								<div class="input-group">										
									<?= form_dropdown('sel_labor_id[]', array('-1'=>'未選取'), 0, 'class="form-control" otype="labor" row="1" '); ?>
									<div class="input-group-btn">
										<button ftype='labor' row='1' class="fsearch btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Search...</button>
									</div>
								</div>
							</td>
							<td>
								<input type="text" name='unit_feeClientFee[]' class="form-control" pattern="[0-9]+"  style="text-align: right"/>
								<input type="text" name='unit2_feeClientFee[]' class="form-control" pattern="[0-9]+"  style="text-align: right"/>
							</td>
							<td>
								<input type="text" name='unit3_feeClientFee[]' class="form-control" pattern="[0-9]+"  style="text-align: right"/>
								<input type="text" name='unit4_feeClientFee[]' class="form-control" pattern="[0-9]+"  style="text-align: right"/>
							</td>
							<td>
								<input type="text" name='unit5_feeClientFee[]' class="form-control" pattern="[0-9]+"  style="text-align: right"/>
								<input type="text" name='unit6_feeClientFee[]' class="form-control" pattern="[0-9]+"  style="text-align: right"/>
							</td>
							<td>
								<input type="text" name='unit7_feeClientFee[]' class="form-control" pattern="[0-9]+"  style="text-align: right"/>
							</td>
						</tr>
						<tr id='addr_feeClientFee1'></tr>
<?php endif; ?>
					</tbody>
				</table>
				<a class="add_row btn btn-warning pull-left" prefix='feeClientFee'><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
				<a class="delete_row pull-right btn btn-danger" prefix='feeClientFee'><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></a>
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

	var i_feeClientFee = $("#tab_feeClientFee" + " tr").length - 2;

	$('#file_1').fileinput({
		showPreview: false,
		language: "zh-TW",
		uploadUrl: '<?= base_url()?>upload/do_upload',
		allowedFileExtensions: ["jpg","jpeg","gif","png","pdf"],
<?php if((strval($id) != '0') && (strlen($info['file_path'])) > 0): ?>
		initialCaption: "<?= $info['file_path']?>",
<?php endif; ?>	
		uploadExtraData: function() {
			var obj = {};
			$('.file-loading').each(function() {
				var id = $(this).attr('id');
				obj['file_for'] = id;
				obj['func'] = 'create';
			});
			return obj;
		}
	});

	$('#file_1').on('fileuploaded', function(event, data, previewId, index) {
		var response = data.response;
		$('input[name=hid_filepath1]').val(response.new_name);
	});

	$(".btn-audit").bind("click",function(){
		$.ajax({
			async: false,
			type: "POST",
			url: $('#hid_baseurl').val() + 'crm/fee_client_doAudit',
			data: {
				result:$(this).attr('fvalue'),	
				id:<?= $id ?>,
				descr:$('input[name="txt_a_descr"]').val()
			},
			statusCode: {
				200: function() {
					window.location = '<?= base_url()?>crm/fee_client';
				}
			},
			error: function() {
				alert('操作失敗');
			}
		});
	});
	$(".btn-cancel").bind("click",function(){
		window.location = '<?= base_url()?>crm/fee_client';
	});
	$("#btn_save").bind("click",function(){
		if(!$("form")[0].checkValidity()) return;

		$.ajax({
			async: false,
			type: "POST",
			url: $('#hid_baseurl').val() + 'crm/fee_client_doEdit',
			data: $('#form1').serialize(),
			statusCode: {
				200: function() {
					window.location = '<?= base_url()?>crm/fee_client';
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
		if ($('#hid_ftype').val() == 'labor'){
			$("select[otype=" + $('#hid_ftype').val() +"][row=" + $('#hid_frow').val() + "] option").remove();
			$("select[otype=" + $('#hid_ftype').val() +"][row=" + $('#hid_frow').val() + "]").append($("<option></option>").attr("value", $('#sel_search').val()).text($('#sel_search :selected').text()));
		} else {
			$("select[otype=" + $('#hid_ftype').val() +"] option").remove();
			$("select[otype=" + $('#hid_ftype').val() +"]").append($("<option></option>").attr("value", $('#sel_search').val()).text($('#sel_search :selected').text()));
		}
		$(".modal").modal('hide');
	});

	$(".add_row").click(function() {
		var prefix = $(this).attr("prefix");
		var tmp = 'i_' +  prefix;
		var i  = eval(tmp);
		// table head row=2
		i -= 1;

		$('#addr_' + prefix + i).html($('#addr_' + prefix +'0').html());
		$('#addr_' + prefix + i).children().children().attr('row',i + 1);	// replace attr:row
		$('#addr_' + prefix + i).children().children().children().attr('row',i + 1);	// replace attr:row
		$('#addr_' + prefix + i).children().children().children().children().attr('row',i + 1);	// replace attr:row
		$('#addr_' + prefix + i).children().first().html((i + 1) + "<input type='hidden' name='row_" + prefix + "[]' value='" + (i + 1) + "'>");	// replace #

		$("#tab_" + prefix + " select[row=" + (i + 1) + "]").each(function() {
			if(($(this).attr('name') == 'sel_labor_id[]') && ($(this).attr('row') == (i + 1))){
				$(this).children("option").remove();
				$(this).append($("<option value='-1'>未選取</option>"));
			}
		});

		$("#tab_" + prefix + " input[row=" + (i + 1) + "]").each(function() {
			$(this).val('');
		});		

		$('#tab_' + prefix).append('<tr id="addr_'+ prefix + (i+1)+'"></tr>');
		var str = tmp + " = " + eval(tmp) + "+1";
		eval(str);

		// search
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