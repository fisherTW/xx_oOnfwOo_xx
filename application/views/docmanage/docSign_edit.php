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
		<div class="form-group">
			<div class="col-sm-6">
				<label class="control-label"><?= $lang->line('doc_no') ?></label>
				<div>
<?php if (strval($id) != '0'): ?>
					<input type="text" class="form-control" name="txt_no" value='<?= $info['no']?>' required>
<?php else: ?>
					<input type="text" class="form-control" name="txt_no" value='' required>
<?php endif; ?>				
				</div>
			</div>
			<div class="col-sm-6">
				<label class="control-label"><?= $lang->line('date_create') ?></label>
				<div class="checkbox">
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
				<label class="control-label"><?= $lang->line('user_create') ?></label>
				<div class="checkbox">
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
				<label class="control-label"><?= $lang->line('doc_type') ?></label>
				<div>
<?php if (strval($id) != '0'): ?>
					<?= form_dropdown('sel_doc_type', $ary_doc_type, $info['doc_id5_2'], 'class="form-control"'); ?>
<?php else: ?>
					<?= form_dropdown('sel_doc_type', $ary_doc_type, '', 'class="form-control"'); ?>
<?php endif; ?>			
				</div>
			</div>
			<div class="col-sm-6">
				<label class="control-label"><?= $lang->line('doc_file_path') ?></label>
				<div>
<?php if (strval($id) != '0'): ?>
					<input id="file" type="file" class="file-loading">
					<input name='hid_filepath' type='hidden' value='<?= $info['file_path']?>'>
<?php else: ?>
					<input id="file" type="file" class="file-loading">
					<input name='hid_filepath' type='hidden' value=''>
<?php endif; ?>				
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-6">
				<label class="control-label"><?= $lang->line('doc_name') ?></label>
				<div>
<?php if (strval($id) != '0'): ?>
					<input type="text" class="form-control" name="txt_name" value='<?= $info['name']?>' required>
<?php else: ?>
					<input type="text" class="form-control" name="txt_name" value='' required>
<?php endif; ?>				
				</div>
			</div>
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
		</div>
		<div class="form-group">
			<div class="col-sm-6">
				<label class="control-label"><?= $lang->line('doc_qty') ?></label>
				<div>
<?php if (strval($id) != '0'): ?>
					<input type="text" class="form-control" name="txt_qty" value='<?= $info['qty']?>' pattern="[0-9]+">
<?php else: ?>
					<input type="text" class="form-control" name="txt_qty" value='' pattern="[0-9]+">
<?php endif; ?>				
				</div>
			</div>
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
		</div>
		<div class="form-group">
			<div class="col-sm-6">
				<label class="control-label"><?= $lang->line('doc_qtycopy') ?></label>
				<div>
<?php if (strval($id) != '0'): ?>
					<input type="text" class="form-control" name="txt_qtycopy" value='<?= $info['qtycopy']?>' pattern="[0-9]+">
<?php else: ?>
					<input type="text" class="form-control" name="txt_qtycopy" value='' pattern="[0-9]+">
<?php endif; ?>				
				</div>
			</div>
			<div class="col-sm-6">
				<label class="control-label"><?= $lang->line('doc_service_id') ?></label>
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
				<label class="control-label"><?= $lang->line('desc') ?></label>
				<div>
<?php if (strval($id) != '0'): ?>
					<textarea name='txt_descr' class='form-control'><?= $info['descr']?></textarea>
<?php else: ?>
					<textarea name='txt_descr' class='form-control'></textarea>
<?php endif; ?>	
				</div>
			</div>
			<div class="col-sm-6">
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
	var i_exp = $("#tab_exp" + " tr").length - 2;

	$('#file').fileinput({
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
	$('#file').on('fileuploaded', function(event, data, previewId, index) {
		var response = data.response;
		$('input[name=hid_filepath]').val(response.new_name);
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

	$(".btn-cancel").bind("click",function(){
		window.location = '<?= base_url()?>docmanage/docSign';
	});

	$("#btn_save").bind("click",function(){
		if(!$("form")[0].checkValidity()) return;

		$.ajax({
			type: "POST",
			url: $('#hid_baseurl').val() + 'docmanage/docSign_doEdit',
			data: $('#form1').serialize(),
			statusCode: {
				200: function() {
					window.location = '<?= base_url()?>docmanage/docSign';
				}
			},
			error: function() {
				alert('操作失敗');
			}
		});
	});
});
</script>