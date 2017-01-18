<script src='<?= base_url()?>assets/js/fileinput.min.js'></script>
<script src='<?= base_url()?>assets/js/fileinput_locale_zh-TW.js'></script>
<script src='<?= base_url()?>assets/js/bootstrap-datetimepicker.min.js'></script>
<link href='<?= base_url()?>assets/css/fileinput.min.css' rel='stylesheet' type='text/css'/>
<link href='<?= base_url()?>assets/css/bootstrap-datetimepicker.min.css' rel='stylesheet' type='text/css'/>

<input type='hidden' id='hid_baseurl' value='<?= base_url(); ?>'>
<input type='hidden' id='hid_ftype' value=''>
<input type='hidden' id='hid_employer' value=''>

<div class="container">
	<form class="form-horizontal" id='form1'>
		<input type='hidden' name='hid_id' value='<?= $id ?>'>

		<h1><?= $title ?></h1>
		<div class="tab-content">
			<div class="form-group">
				<div class="col-sm-6">
					<label class="control-label"><?= $lang->line('letter_no') ?></label>
					<div>
<?php if (strval($id) != '0'): ?>
						<input type="text" class="form-control" name="txt_inbound_no" value='<?= $info['inbound_no']?>' pattern="[0-9]{3}[\-]{1}[0-9]{7}[\-]{1}[0-9]{3}" required>
<?php else: ?>
						<input type="text" class="form-control" name="txt_inbound_no" value='' pattern="[0-9]{3}[\-]{1}[0-9]{7}[\-]{1}[0-9]{3}" required>
<?php endif; ?>
					</div>
				</div>
				<div class="col-sm-6">
					<label class="control-label"><?= $lang->line('date_send') ?></label>
					<div>
<?php if (strval($id) != '0'): ?>
						<div class='input-group date' id='datetimepicker2'>
							<input type="text" class="form-control" name="txt_inbound_date_send" value='<?= $info['inbound_date_send']?>' pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" required readonly>
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>
<?php else: ?>
						<div class='input-group date' id='datetimepicker2'>
							<input type="text" class="form-control" name="txt_inbound_date_send" value='' pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" required readonly>
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
					<label class="control-label"><?= $lang->line('quota') ?></label>
					<div>
<?php if (strval($id) != '0'): ?>
						<input type="text" class="form-control" name="txt_inbound_quota" value='<?= $info['inbound_quota']?>' pattern="[0-9]+" required>
<?php else: ?>
						<input type="text" class="form-control" name="txt_inbound_quota" value='' pattern="[0-9]+" required>
<?php endif; ?>	
					</div>
				</div>
				<div class="col-sm-6">
					<label class="control-label"><?= $lang->line('expiry_date') ?></label>
<?php if (strval($id) != '0'): ?>
<?php if ((substr($info['inbound_no'], -3, 3) == '021') || (substr($info['inbound_no'], -3, 3) == '045')): ?>
						<div class="checkbox"><?= date('Y-m-d',strtotime("{$info['inbound_date_send']} +6 month -1 day"))?></div>
<?php elseif(substr($info['inbound_no'], -3, 3) == '059') : ?>
						<div class="checkbox"><?= date('Y-m-d',strtotime("{$info['inbound_date_send']} +3 month -1 day"))?></div>
<?php else: ?>
						<div class="checkbox"><?= $lang->line('not_count_after_save') ?></div>
<?php endif; ?>
<?php else: ?>	
						<div class="checkbox"><?= $lang->line('auto_count_after_save') ?></div>
<?php endif; ?>
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
					<label class="control-label"><?= $lang->line('date_receive') ?></label>
					<div>
<?php if (strval($id) != '0'): ?>
						<div class='input-group date' id='datetimepicker2'>
							<input type="text" class="form-control" name="txt_inbound_date_receive" value='<?= $info['inbound_date_receive']?>' pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" required readonly>
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>
<?php else: ?>
						<div class='input-group date' id='datetimepicker2'>
							<input type="text" class="form-control" name="txt_inbound_date_receive" value='' pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" required readonly>
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
					<label class="control-label"><?= $lang->line('site_receive') ?> </label>
<?php if (strval($id) != '0'): ?>
					<?= form_dropdown('sel_inbound_site_receive', $ary_site_receive, $info['inbound_site_receive'], 'class="form-control"'); ?>
<?php else: ?>
					<?= form_dropdown('sel_inbound_site_receive', $ary_site_receive, 1, 'class="form-control"'); ?>
<?php endif; ?>				
				</div>
			</div>
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
					<label class="control-label"><?= $lang->line('file_path') ?></label>
					<div>
<?php if (strval($id) != '0'): ?>
						<input id="file_2" type="file" class="file-loading">
						<input name='hid_filepath2' type='hidden' value='<?= $info['inbound_file_path']?>'>
<?php else: ?>
						<input id="file_2" type="file" class="file-loading">
						<input name='hid_filepath2' type='hidden' value=''>
<?php endif; ?>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-6">
					<div class="col-sm-offset-1">
						<label class="control-label"><?= $lang->line('letter_no') ?></label>
						<div id='div_sel_letter_id'>
<?php if (strval($id) != '0'): ?>
							<?= form_dropdown('sel_letter_id', $ary_letter_id, $info['letter_id'], 'class="form-control"'); ?>
<?php else: ?>
							<?= form_dropdown('sel_letter_id', $ary_letter_id, '', 'class="form-control"'); ?>
<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<label class="control-label"><?= $lang->line('immigration_people') ?></label>
					<div class="checkbox">
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-6">
					<label class="control-label"><?= $lang->line('case_status') ?></label>
					<div>
<?php if (strval($id) != '0'): ?>
						<?= form_dropdown('sel_inbound_is_enable', $ary_is_enable, $info['inbound_is_enable'], 'class="form-control"'); ?>
<?php else: ?>
						<?= form_dropdown('sel_inbound_is_enable', $ary_is_enable, 1, 'class="form-control"'); ?>
<?php endif; ?>
					</div>
				</div>
				<div class="col-sm-6">
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-6">
					<label class="control-label"><?= $lang->line('1-1-1') ?></label>
					<div>
<?php if (strval($id) != '0'): ?>
						<?= form_dropdown('sel_inbound_country', $ary_country, $info['inbound_country_id'], 'class="form-control"'); ?>
<?php else: ?>
						<?= form_dropdown('sel_inbound_country', $ary_country, '', 'class="form-control"'); ?>
<?php endif; ?>				
					</div>
				</div>
				<div class="col-sm-6">
					<label class="control-label"><?= $lang->line('desc') ?></label>
					<div>
<?php if (strval($id) != '0'): ?>
						<textarea name='txt_inbound_descr' class='form-control'><?= $info['inbound_descr']?></textarea>
<?php else: ?>
						<textarea name='txt_inbound_descr' class='form-control'></textarea>
<?php endif; ?>	
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

	$('#file_2').fileinput({
		showPreview: false,
		language: "zh-TW",
		uploadUrl: '<?= base_url()?>upload/do_upload',
		allowedFileExtensions: ["jpg","jpeg","gif","png","pdf"],
<?php if((strval($id) != '0') && (strlen($info['inbound_file_path'])) > 0): ?>
		initialCaption: "<?= $info['inbound_file_path']?>",
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

	$('#file_2').on('fileuploaded', function(event, data, previewId, index) {
		var response = data.response;
		$('input[name=hid_filepath2]').val(response.new_name);
	});	
	$('.date').datetimepicker({
		format: 'YYYY-MM-DD',
		keepInvalid: true,
		ignoreReadonly: true,
		useCurrent: true
	});
	
	$(".btn-cancel").bind("click",function(){
		window.location = '<?= base_url()?>docmanage/letter_inbound';
	});	

	$("#btn_save").bind("click",function(){
		if(!$("form")[0].checkValidity()) return;

		$.ajax({
			type: "POST",
			url: $('#hid_baseurl').val() + 'docmanage/letter_inbound_doEdit',
			data: $('#form1').serialize(),
			statusCode: {
				200: function() {
					window.location = '<?= base_url()?>docmanage/letter_inbound';
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
		if ($('#hid_ftype').val() == 'employer') {
			$.ajax({
				async: false,
				type: "POST",
				url: $('#hid_baseurl').val() + 'docmanage/apiGetLetterByType',
				data: {
					employer_id: $('#sel_search').val(),
					type: $('select[name=sel_type]').val()
				},
				statusCode: {
					200: function(e) {
						$('#div_sel_letter_id').html(e);
					}
				}
			});	
		}
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