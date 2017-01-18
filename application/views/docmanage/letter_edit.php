<script src='<?= base_url()?>assets/js/fileinput.min.js'></script>
<script src='<?= base_url()?>assets/js/fileinput_locale_zh-TW.js'></script>
<script src='<?= base_url()?>assets/js/bootstrap-datetimepicker.min.js'></script>
<link href='<?= base_url()?>assets/css/fileinput.min.css' rel='stylesheet' type='text/css'/>
<link href='<?= base_url()?>assets/css/bootstrap-datetimepicker.min.css' rel='stylesheet' type='text/css'/>

<input type='hidden' id='hid_baseurl' value='<?= base_url(); ?>'>
<input type='hidden' id='hid_ftype' value=''>

<div class="container">
	<form class="form-horizontal" id='form1' onKeyDown="if(event.keyCode == 13) {return false;}">
		<input type='hidden' name='hid_id' value='<?= $id ?>'>

		<h1><?= $title ?></h1>
		<div class="tab-content">
			<div class="form-group">
				<div class="col-sm-6">
					<label class="control-label"><?= $lang->line('1-5-1') ?></label>
					<div>
<?php if (strval($id) != '0'): ?>
						<?= form_dropdown('sel_type', $ary_type, $info['type'], 'class="form-control"'); ?>
<?php else: ?>
						<?= form_dropdown('sel_type', $ary_type, '', 'class="form-control"'); ?>
<?php endif; ?>				
					</div>
				</div>
				<div class="col-sm-6">
					<label class="control-label"><?= $lang->line('date_send') ?></label>
					<div>
<?php if (strval($id) != '0'): ?>
						<div class='input-group date' id='datetimepicker2'>
							<input type="text" class="form-control" name="txt_date_send" value='<?= $info['date_send']?>' pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" required readonly>
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>
<?php else: ?>
						<div class='input-group date' id='datetimepicker2'>
							<input type="text" class="form-control" name="txt_date_send" value='' pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" required readonly>
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>
<?php endif; ?>	
					</div>
				</div>
			</div>
			<div class="form-group" id='div_type_radio' style='<?= ( ((strval($id) == '0') || ($info['type'] == LETTER_TYPE_RECRUIT)) ? '' : "display:none;") ?>'>
				<div class="col-sm-6">
					<label class="control-label"><?= $lang->line('recruit_type') ?></label>
					<div>
<?php if (strval($id) != '0'): ?>						
						<label class="radio-inline">
							<input type="radio" name="rdo_type_sub" id="" value=1 <?= $info['type_sub'] == 1 ? 'checked' : '' ?>> <?= $lang->line('type_sub') ?>
						</label>
						<br>
						<label class="radio-inline">
							<input type="radio" name="rdo_type_sub" id="" value=2 <?= $info['type_sub'] == 2 ? 'checked' : '' ?>> <?= $lang->line('type_sub2') ?>
						</label>
						<br>
						<label class="radio-inline">
							<input type="radio" name="rdo_type_sub" id="" value=3 <?= $info['type_sub'] == 3 ? 'checked' : '' ?>> <?= $lang->line('type_sub3') ?>
						</label>
<?php else: ?>
						<label class="radio-inline">
							<input type="radio" name="rdo_type_sub" id="" value=1 > <?= $lang->line('type_sub') ?>
						</label>
						<br>
						<label class="radio-inline">
							<input type="radio" name="rdo_type_sub" id="" value=2 > <?= $lang->line('type_sub2') ?>
						</label>
						<br>
						<label class="radio-inline">
							<input type="radio" name="rdo_type_sub" id="" value=3 > <?= $lang->line('type_sub3') ?>
						</label>
<?php endif; ?>
					</div>
				</div>
				<div class="col-sm-6">
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-6">
					<label class="control-label"><?= $lang->line('letter_no') ?></label>
					<div>
<?php if (strval($id) != '0'): ?>
						<input type="text" class="form-control" name="txt_no" value='<?= $info['no']?>' pattern="[A-Z0-9]{3}[\-]{1}[A-Z0-9]{7}[\-]{1}[A-Z0-9]{3}" required>
<?php else: ?>
						<input type="text" class="form-control" name="txt_no" value='' pattern="[A-Z0-9]{3}[\-]{1}[A-Z0-9]{7}[\-]{1}[A-Z0-9]{3}" required>
<?php endif; ?>	
					</div>
				</div>
				<div class="col-sm-6">
					<label class="control-label"><?= $lang->line('expiry_date') ?></label>
<?php if (strval($id) != '0'): ?>
<?php if ((strval($info['type']) == '1') && (strval($info['type_sub']) == '1') ||  (strval($info['type']) == '1') && (strval($info['type_sub']) == '3') || (strval($info['type']) == '2')): ?>
						<div class="checkbox"><?= date('Y-m-d',strtotime("{$info['date_send']} +6 month -1 day"))?></div>
<?php else: ?>	
						<div class="checkbox">-</div>
<?php endif; ?>	
<?php else: ?>
						<div class="checkbox"><?= $lang->line('auto_count_after_save') ?></div>
<?php endif; ?>	
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-6">
					<label class="control-label"><?= $lang->line('quota') ?></label>
					<div>
<?php if (strval($id) != '0'): ?>
						<input type="text" class="form-control" name="txt_quota" value='<?= $info['quota']?>' pattern="[0-9]+" required>
<?php else: ?>
						<input type="text" class="form-control" name="txt_quota" value='' pattern="[0-9]+" required>
<?php endif; ?>	
					</div>
				</div>
				<div class="col-sm-6">
					<label class="control-label"><?= $lang->line('date_receive') ?></label>
					<div>
<?php if (strval($id) != '0'): ?>
						<div class='input-group date' id='datetimepicker2'>
							<input type="text" class="form-control" name="txt_date_receive" value='<?= $info['date_receive']?>' pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" required readonly>
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>
<?php else: ?>
						<div class='input-group date' id='datetimepicker2'>
							<input type="text" class="form-control" name="txt_date_receive" value='' pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" required readonly>
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>
<?php endif; ?>	
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-6">
					<label class="control-label"><?= $lang->line('duration') ?></label>
					<div>
<?php if (strval($id) != '0'): ?>
						<input type="text" class="form-control" name="txt_duration" placeholder='3Y0M0D' value='<?= $info['duration']?>' pattern="[0-9]Y(0|[1-9]|1[012])M(0|[1-9]|[12][0-9]|3[01])D" required>
<?php else: ?>
						<input type="text" class="form-control" name="txt_duration" placeholder='3Y0M0D' value='' pattern="[0-9]Y(0|[1-9]|1[012])M(0|[1-9]|[12][0-9]|3[01])D" required>
<?php endif; ?>	
					</div>
				</div>
				<div class="col-sm-6">
					<label class="control-label"><?= $lang->line('site_receive') ?> </label>
					<div>
<?php if (strval($id) != '0'): ?>
						<?= form_dropdown('sel_site_receive', $ary_site_receive, $info['site_receive'], 'class="form-control"'); ?>
<?php else: ?>
						<?= form_dropdown('sel_site_receive', $ary_site_receive, 1, 'class="form-control"'); ?>
<?php endif; ?>			
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-6">
					<label class="control-label"><?= $lang->line('case_status') ?></label>
					<div>
<?php if (strval($id) != '0'): ?>
						<?= form_dropdown('sel_is_enable', $ary_is_enable, $info['is_enable'], 'class="form-control"'); ?>
<?php else: ?>
						<?= form_dropdown('sel_is_enable', $ary_is_enable, 1, 'class="form-control"'); ?>
<?php endif; ?>				
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
					<label class="control-label"><?= $lang->line('1-1-1') ?></label>
					<div>
<?php if (strval($id) != '0'): ?>
						<?= form_dropdown('sel_country', $ary_country, $info['country_id'], 'class="form-control"'); ?>
<?php else: ?>
						<?= form_dropdown('sel_country', $ary_country, '', 'class="form-control"'); ?>
<?php endif; ?>				
					</div>
				</div>
				<div class="col-sm-6">
					<label class="control-label"><?= $lang->line('service_id') ?></label>
					<div>
<?php if (strval($id) != '0'): ?>
						<?= form_dropdown('sel_service_id', $ary_emp, $info['service_id'], 'class="form-control"'); ?>
<?php else: ?>
						<?= form_dropdown('sel_service_id', $ary_emp, '', 'class="form-control"'); ?>
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
					<label class="control-label"><?= $lang->line('file_path') ?></label>
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
					<label class="control-label"><?= $lang->line('desc') ?></label>
					<div>
<?php if (strval($id) != '0'): ?>
						<textarea name='txt_descr' class='form-control'><?= $info['descr']?></textarea>
<?php else: ?>
						<textarea name='txt_descr' class='form-control'></textarea>
<?php endif; ?>	
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-12">
					<label for="tab_exp" class='form-label'> <?= $lang->line('certification_info') ?></label><br />
					<table class="table table-bordered table-hover table-responsive" id="tab_exp">
						<thead>
							<tr >
								<th width="5%"class="text-center">#</th>
								<th width="30%"class="text-center text-nowrap"><?= $lang->line('certification_license') ?></th>
								<th width="15%"class="text-center text-nowrap"><?= $lang->line('certification_date') ?></th>
								<th width="15%"class="text-center text-nowrap"><?= $lang->line('basic_salary') ?></th>
								<th width="10%"class="text-center text-nowrap"><?= $lang->line('certification_number_m') ?></th>
								<th width="10%"class="text-center text-nowrap"><?= $lang->line('certification_number_w') ?></th>
								<th width="15%"class="text-center text-nowrap"><?= $lang->line('total_people') ?></th>
							</tr>
						</thead>
						<tbody>
<?php if(count($ary_letter_auth) > 0): ?>
<?php foreach ($ary_letter_auth as $item): ?>
							<tr id="<?= 'addr_exp'.($item['row'] - 1) ?>">
								<td>
									<?= ($item['row']) ?>
									<input type='hidden' name='row_exp[]' value='<?= ($item['row']) ?>'>
								</td>
								<td>
									<?= form_dropdown('auth_id[]', $ary_auth_id, $item['auth_id'], 'class="form-control"'); ?>
								</td>
								<td>
									<div class='input-group date' id='datetimepicker2'>
										<input type="text" class="form-control" name="date_auth[]" value='<?= ($item['date_auth']) ?>' readonly>
										<span class="input-group-addon">
											<span class="glyphicon glyphicon-calendar"></span>
										</span>
									</div>
								</td>
								<td>
									<input type="text" name='salary[]' value='<?= ($item['salary']) ?>' class="form-control" pattern="[0-9]+"/>
								</td>
								<td>
									<input type="text" name='quota_m[]' value='<?= ($item['quota_m']) ?>' class="form-control" pattern="[0-9]+"/>
								</td>
								<td>
									<input type="text" name='quota_f[]' value='<?= ($item['quota_f']) ?>' class="form-control" pattern="[0-9]+"/>
								</td>
								<td>
									<input type="text" name="quota_sum[]" value='<?= ($item['quota_sum']) ?>' class="form-control"/>
								</td>
							</tr>
<?php endforeach;?>
							<tr id='<?php echo 'addr_exp'.count($ary_letter_auth) ?>'></tr>
<?php else: ?>
							<tr id='addr_exp0'>
								<td>
									1
									<input type='hidden' name='row_exp[]' value='1'>
								</td>
								<td>
									<?= form_dropdown('auth_id[]', $ary_auth_id, '', 'class="form-control"'); ?>
								</td>
								<td>
									<div class='input-group date' id='datetimepicker2'>
										<input type="text" class="form-control" name="date_auth[]" value='' readonly>
										<span class="input-group-addon">
											<span class="glyphicon glyphicon-calendar"></span>
										</span>
									</div>
								</td>
								<td>
									<input type="text" name='salary[]' class="form-control" pattern="[0-9]+"/>
								</td>
								<td>
									<input type="text" name='quota_m[]' class="form-control" pattern="[0-9]+"/>
								</td>
								<td>
									<input type="text" name='quota_f[]' class="form-control" pattern="[0-9]+"/>
								</td>
								<td>
									<input type="text" name="quota_sum[]" class="form-control"　pattern="[0-9]+"/>
								</td>
							</tr>
							<tr id='addr_exp1'></tr>
<?php endif; ?>
						</tbody>
					</table>
					<a class="add_row btn btn-warning pull-left" prefix='exp'><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
					<a class="delete_row pull-right btn btn-danger" prefix='exp'><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></a>
					<div class='row mb20' ps='for_add_del_button'>
					</div>
				</div>
			</div>
		</div>
	</form>

	<button id="btn_save" class="btn btn-primary">Save</button>
	<button class="btn btn-default btn-cancel">Cancel</button>

	<div class='modal fade' id='ddd'>
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
	var i_exp = $("#tab_exp" + " tr").length - 2;

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

	$('.date').datetimepicker({
		format: 'YYYY-MM-DD',
		keepInvalid: true,
		ignoreReadonly: true,
		useCurrent: true
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
			url: $('#hid_baseurl').val() + 'docmanage/apiSearch',
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
	

	$(".btn-cancel").bind("click",function(){
		window.location = '<?= base_url()?>docmanage/letter';
	});	
	$("#btn_save").bind("click",function(){
		if(!$("form")[0].checkValidity()) return;

		$.ajax({
			type: "POST",
			url: $('#hid_baseurl').val() + 'docmanage/letter_doEdit',
			data: $('#form1').serialize(),
			statusCode: {
				200: function() {
					window.location = '<?= base_url()?>docmanage/letter';
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
			($(this).attr('name') == 'people[]' ? $('input[name="people[]"][row="'+(i + 1)+'"]').val("<?= $lang->line('auto_count_after_save')?>") :"");
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