<script src='<?= base_url()?>assets/js/fileinput.min.js'></script>
<script src='<?= base_url()?>assets/js/fileinput_locale_zh-TW.js'></script>
<script src='<?= base_url()?>assets/js/bootstrap-datetimepicker.min.js'></script>
<link href='<?= base_url()?>assets/css/fileinput.min.css' rel='stylesheet' type='text/css'/>
<link href='<?= base_url()?>assets/css/bootstrap-datetimepicker.min.css' rel='stylesheet' type='text/css'/>

<input type='hidden' id='hid_baseurl' value='<?= base_url(); ?>'>
<input type='hidden' id='hid_ftype' value=''>

<div class="container">
	<form class="form-horizontal" id='form1'>
		<input type='hidden' name='hid_id' value='<?= $id ?>'>

		<h1><?= $title ?></h1>
		<!-- Nav tabs -->
		<ul class="nav nav-tabs" role="tablist">
			<li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab"><?= $lang->line('mainpage') ?></a></li>
			<li role="presentation"><a href="#translate" aria-controls="translate" role="tab" data-toggle="tab"><?= $lang->line('1-4-3') ?></a></li>
		</ul>
		<!-- Tab panes -->
		<div class="tab-content">
			<!-- Tab 1 -->
			<div role="tabpanel" class="tab-pane active" id="home">
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('translate_date') ?></label>
						<div>
							<div class='input-group date'>
<?php if (strval($id) != '0'): ?>
								<input type="text" class="form-control" name="txt_date" value='<?= $info['date']?>'required readonly>
<?php else: ?>
								<input type="text" class="form-control" name="txt_date" value=''required readonly>
<?php endif; ?>	
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-calendar"></span>
								</span>
							</div>
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
						<label class="control-label"><?= $lang->line('translate_emp') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<?= form_dropdown('sel_emp_id', $ary_emp, $info['emp_id'], 'class="form-control"'); ?>
<?php else: ?>
							<?= form_dropdown('sel_emp_id', $ary_emp, '', 'class="form-control"'); ?>
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
						<label class="control-label"><?= $lang->line('1-1-1') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<?= form_dropdown('sel_country_id', $ary_country, $info['country_id'], 'class="form-control"'); ?>
<?php else: ?>
							<?= form_dropdown('sel_country_id', $ary_country, '', 'class="form-control"'); ?>
<?php endif; ?>	
						</div>
					</div>
					<div class="col-sm-6">
					</div>
				</div>	
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('translate_emp2') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<?= form_dropdown('sel_emp_id2', $ary_emp, $info['emp_id2'], 'class="form-control"'); ?>
<?php else: ?>
							<?= form_dropdown('sel_emp_id2', $ary_emp, '', 'class="form-control"'); ?>
<?php endif; ?>	
						</div>
					</div>
					<div class="col-sm-6">
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
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('employer') ?></label>
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
					<div class="col-sm-6">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('schedule_emp') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<input type="text" class="form-control" name="txt_man_together" value='<?= $info['man_together'] ?>' >
<?php else: ?>
							<input type="text" class="form-control" name="txt_man_together" value='' >
<?php endif; ?>		
						</div>
					</div>
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('tel') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<input type="text" class="form-control" name="txt_tel" value='<?= $info['tel']?>' pattern="[0-9,\-]+" >
<?php else: ?>
							<input type="text" class="form-control" name="txt_tel" value='' pattern="[0-9,\-]+" >
<?php endif; ?>		
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('arr_time') ?></label>
						<div>
							<div class='input-group time'>
<?php if (strval($id) != '0'): ?>
								<input type="text" class="form-control" name="txt_time_dep" value='<?= $info['time_dep']?>'required readonly>
<?php else: ?>
								<input type="text" class="form-control" name="txt_time_dep" value=''required readonly>
<?php endif; ?>	
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-time"></span>
								</span>
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('arrspot') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<input type="text" class="form-control" name="txt_dep" value='<?= $info['dep']?>' >
<?php else: ?>
							<input type="text" class="form-control" name="txt_dep" value='' >
<?php endif; ?>		
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('transname_item') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<?= form_dropdown('sel_trans_id', $ary_trans, $info['trans_id'], 'class="form-control"'); ?>
<?php else: ?>
							<?= form_dropdown('sel_trans_id', $ary_trans, '', 'class="form-control"'); ?>
<?php endif; ?>	
						</div>						
					</div>
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('desc') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<input type="text" class="form-control" name="txt_descr" value='<?= $info['descr']?>' >
<?php else: ?>
							<input type="text" class="form-control" name="txt_descr" value='' >
<?php endif; ?>		
						</div>
					</div>
				</div>
				<label class="control-label"><?= $lang->line('translate_service') ?></label>
				<div class="form-group">
					<div class="col-sm-6">
						<div class='col-md-offset-1'>
							<label class="control-label"><?= $lang->line('time') ?></label>
							<div class="checkbox">
<?php if (strval($id) != '0'): ?>
								<label>
									<input type="checkbox" value="1" name="chk_day[]" <?= ($info['day'] & 1) == '1' ? 'checked="checked"' : '' ?>/><?= $lang->line('morning') ?>
								</label>
								<label>
									<input type="checkbox" value="2" name="chk_day[]" <?= ($info['day'] & 2) == '2' ? 'checked="checked"' : '' ?>/><?= $lang->line('afternoon') ?>
								</label>
<?php else: ?>
								<label>
									<input type="checkbox" value="1" name="chk_day[]"><?= $lang->line('morning') ?>
								</label>
								<label>
									<input type="checkbox" value="2" name="chk_day[]"><?= $lang->line('afternoon') ?>
								</label>								
<?php endif; ?>		
							</div>
						</div>
					</div>
					<div class="col-sm-6">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<div class='col-md-offset-1'>
							<label class="control-label"><?= $lang->line('translate_make_money') ?></label>
							<div>
<?php if (strval($id) != '0'): ?>
								<input type="text" class="form-control" name="txt_make_money" value='<?= $info['make_money']?>' pattern="[0-9]+" style="text-align: right">
<?php else: ?>
								<input type="text" class="form-control" name="txt_make_money" value='' pattern="[0-9]+" style="text-align: right">
<?php endif; ?>		
							</div>
						</div>
					</div>
					<div class="col-sm-6">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<div class='col-md-offset-1'>
							<label class="control-label"><?= $lang->line('translate_make_type') ?></label>
							<div>
<?php if (strval($id) != '0'): ?>
							<label class="radio-inline">
								<input type="radio" name="rdo_make_money_method" id="" value=1 <?= $info['make_money_method'] == 1 ? 'checked' : '' ?>> <?= $lang->line('accounts') ?>
							</label>
							<label class="radio-inline">
								<input type="radio" name="rdo_make_money_method" id="" value=2 <?= $info['make_money_method'] == 2 ? 'checked' : '' ?>> <?= $lang->line('cash') ?>
							</label>
<?php else: ?>
							<label class="radio-inline">
								<input type="radio" name="rdo_make_money_method" id="" value=1 checked> <?= $lang->line('accounts') ?>
							</label>
							<label class="radio-inline">
								<input type="radio" name="rdo_make_money_method" id="" value=2> <?= $lang->line('cash') ?>
							</label>
<?php endif; ?>	
							</div>
						</div>
					</div>
					<div class="col-sm-6">
					</div>
				</div>				
			</div>
			<!-- Tab 2 -->
			<div role="tabpanel" class="tab-pane" id="translate">
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('translate_date') ?></label>
						<div>
							<div class='input-group date'>
<?php if (strval($id) != '0'): ?>
								<input type="text" class="form-control" name="txt_date_service" value='<?= $info['date_service']?>'required readonly>
<?php else: ?>
								<input type="text" class="form-control" name="txt_date_service" value=''required readonly>
<?php endif; ?>	
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-calendar"></span>
								</span>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<label class="control-label"><?= $lang->line('translate_time_s') ?></label>
						<div>
							<div class='input-group time'>
<?php if (strval($id) != '0'): ?>
								<input type="text" class="form-control" name="txt_time_start" value='<?= $info['time_start']?>'required readonly>
<?php else: ?>
								<input type="text" class="form-control" name="txt_time_start" value=''required readonly>
<?php endif; ?>	
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-time"></span>
								</span>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<label class="control-label"><?= $lang->line('translate_time_e') ?></label>
						<div>
							<div class='input-group time'>
<?php if (strval($id) != '0'): ?>
								<input type="text" class="form-control" name="txt_time_end" value='<?= $info['time_end']?>'required readonly>
<?php else: ?>
								<input type="text" class="form-control" name="txt_time_end" value=''required readonly>
<?php endif; ?>	
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-time"></span>
								</span>
							</div>
						</div>						
					</div>
				</div>
				<label class="control-label"><?= $lang->line('car_fee') ?></label>
				<div class="form-group">
					<div class="col-sm-6">
						<div class='col-md-offset-1'>
							<label class="control-label"><?= $lang->line('bus') ?></label>
							<div>
<?php if (strval($id) != '0'): ?>
								<input type="text" class="form-control" name="txt_fare_bus" value='<?= $info['fare_bus']?>' pattern="[0-9]+" style="text-align: right">
<?php else: ?>
								<input type="text" class="form-control" name="txt_fare_bus" value='' pattern="[0-9]+" style="text-align: right">
<?php endif; ?>		
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('fare_file_path') ?></label>
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
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<div class='col-md-offset-1'>
							<label class="control-label"><?= $lang->line('train') ?></label>
							<div>
<?php if (strval($id) != '0'): ?>
								<input type="text" class="form-control" name="txt_fare_train" value='<?= $info['fare_train']?>' pattern="[0-9]+" style="text-align: right">
<?php else: ?>
								<input type="text" class="form-control" name="txt_fare_train" value='' pattern="[0-9]+" style="text-align: right">
<?php endif; ?>		
							</div>
						</div>
					</div>
					<div class="col-sm-6">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<div class='col-md-offset-1'>
							<label class="control-label"><?= $lang->line('taxi') ?></label>
							<div>
<?php if (strval($id) != '0'): ?>
								<input type="text" class="form-control" name="txt_fare_taxi" value='<?= $info['fare_taxi']?>' pattern="[0-9]+" style="text-align: right">
<?php else: ?>
								<input type="text" class="form-control" name="txt_fare_taxi" value='' pattern="[0-9]+" style="text-align: right">
<?php endif; ?>		
							</div>
						</div>
					</div>
					<div class="col-sm-6">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<div class='col-md-offset-1'>
							<label class="control-label"><?= $lang->line('fare_stay') ?></label>
							<div>
<?php if (strval($id) != '0'): ?>
								<input type="text" class="form-control" name="txt_fare_stay" value='<?= $info['fare_stay']?>' pattern="[0-9]+" style="text-align: right">
<?php else: ?>
								<input type="text" class="form-control" name="txt_fare_stay" value='' pattern="[0-9]+" style="text-align: right">
<?php endif; ?>
							</div>
						</div>
					</div>
					<div class="col-sm-6">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<div class='col-md-offset-1'>
							<label class="control-label"><?= $lang->line('fare_comm') ?></label>
							<div>
<?php if (strval($id) != '0'): ?>
								<input type="text" class="form-control" name="txt_fare_comm" value='<?= $info['fare_comm']?>' pattern="[0-9]+" style="text-align: right">
<?php else: ?>
								<input type="text" class="form-control" name="txt_fare_comm" value='' pattern="[0-9]+" style="text-align: right">
<?php endif; ?>
							</div>
						</div>
					</div>
					<div class="col-sm-6">
					</div>
				</div>						
				<div class="form-group">
					<div class="col-sm-6">
						<div class='col-md-offset-1'>
							<label class="control-label"><?= $lang->line('other') ?></label>
							<div>
<?php if (strval($id) != '0'): ?>
								<input type="text" class="form-control" name="txt_fare_other" value='<?= $info['fare_other']?>' pattern="[0-9]+" style="text-align: right">
<?php else: ?>
								<input type="text" class="form-control" name="txt_fare_other" value='' pattern="[0-9]+" style="text-align: right">
<?php endif; ?>		
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('desc') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<input type="text" class="form-control" name="txt_fare_descr" value='<?= $info['fare_descr']?>' >
<?php else: ?>
							<input type="text" class="form-control" name="txt_fare_descr" value='' >
<?php endif; ?>		
						</div>						
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('translate_descr') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
						<textarea name='txt_descr2' class='form-control'><?= $info['descr2']?></textarea>
<?php else: ?>
						<textarea name='txt_descr2' class='form-control'></textarea>
<?php endif; ?>	
						</div>				
					</div>
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('translate_descr2') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
						<textarea name='txt_descr3' class='form-control'><?= $info['descr3']?></textarea>
<?php else: ?>
						<textarea name='txt_descr3' class='form-control'></textarea>
<?php endif; ?>	
						</div>					
					</div>
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

	$('.date').datetimepicker({
		format: 'YYYY-MM-DD',
		keepInvalid: true,
		ignoreReadonly: true,
		useCurrent: true
	});

	$('.time').datetimepicker({
		format: 'LT',
		keepInvalid: true,
		ignoreReadonly: true,
		useCurrent: true
	});

	$(".btn-cancel").bind("click",function(){
		window.location = '<?= base_url()?>crm/translate';
	});	
	$(".btn-audit").bind("click",function(){
		$.ajax({
			async: false,
			type: "POST",
			url: $('#hid_baseurl').val() + 'crm/translate_doAudit',
			data: {
				result:$(this).attr('fvalue'),	
				id:<?= $id ?>,
				descr:$('input[name="txt_a_descr"]').val()
			},
			statusCode: {
				200: function() {
					window.location = '<?= base_url()?>crm/translate';
				}
			},
			error: function() {
				alert('操作失敗');
			}
		});
	});	
	$("#btn_save").bind("click",function(){
		if(!$("form")[0].checkValidity()) return;

		$.ajax({
			async: false,
			type: "POST",
			url: $('#hid_baseurl').val() + 'crm/translate_doEdit',
			data: $('#form1').serialize(),
			statusCode: {
				200: function() {
					window.location = '<?= base_url()?>crm/translate';
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

});
</script>