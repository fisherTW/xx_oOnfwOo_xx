<script src='<?= base_url()?>assets/js/fileinput.min.js'></script>
<script src='<?= base_url()?>assets/js/fileinput_locale_zh-TW.js'></script>
<link href='<?= base_url()?>assets/css/fileinput.min.css' rel='stylesheet' type='text/css'/>

<input type='hidden' id='hid_baseurl' value='<?= base_url(); ?>'>

<div class="container">
	<form class="form-horizontal" id='form1' onKeyDown="if(event.keyCode == 13) {return false;}">
		<input type='hidden' name='hid_id' value='<?= $id ?>'>
		<h1><?= $title ?></h1>
		<div class="form-group">
			<div class="col-sm-6">
				<label class="control-label"><?= $lang->line('school_short') ?></label>
				<div>
<?php if (strval($id) != '0'): ?>
					<?= form_dropdown('sel_school_id', $ary_school, $info['school_id'], 'class="form-control"'); ?>
<?php else: ?>
					<?= form_dropdown('sel_school_id', $ary_school, '', 'class="form-control"'); ?>
<?php endif; ?>
				</div>
			</div>
			<div class="col-sm-6">
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-6">
				<label class="control-label"><?= $lang->line('1-6-2') ?></label>
				<div>
<?php if (strval($id) != '0'): ?>
					<?= form_dropdown('sel_schoolclass_id', $ary_schoolclass, $info['schoolclass_id'], 'class="form-control"'); ?>
<?php else: ?>
					<?= form_dropdown('sel_schoolclass_id', $ary_schoolclass, '', 'class="form-control"'); ?>
<?php endif; ?>
				</div>
			</div>
			<div class="col-sm-6">
				<label class="control-label"><?= $lang->line('4-4-2') ?></label>
				<div>
<?php if (strval($id) != '0'): ?>
					<?= form_dropdown('sel_course_id', $ary_course, $info['course_id'], 'class="form-control"'); ?>
<?php else: ?>
					<?= form_dropdown('sel_course_id', $ary_course, '', 'class="form-control"'); ?>
<?php endif; ?>
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-6">
				<label class="control-label"><?= $lang->line('nametw') ?></label>
				<div>
<?php if (strval($id) != '0'): ?>
					<input type="text" class="form-control" name="txt_name_tw" value='<?= $info['name_tw']?>'>
<?php else: ?>
					<input type="text" class="form-control" name="txt_name_tw" value=''>
<?php endif; ?>
				</div>
			</div>
			<div class="col-sm-6">
				<label class="control-label"><?= $lang->line('course_name_local') ?></label>
				<div>
<?php if (strval($id) != '0'): ?>
					<input type="text" class="form-control" name="txt_name_local" value='<?= $info['name_local']?>'>
<?php else: ?>
					<input type="text" class="form-control" name="txt_name_local" value=''>
<?php endif; ?>
				</div>
			</div>
		</div>					
		<div class="form-group">
			<div class="col-sm-6">
				<label class="control-label"><?= $lang->line('e_detail_tw') ?></label>
				<div>
<?php if (strval($id) != '0'): ?>
					<input type="text" class="form-control" name="txt_detail_tw" value='<?= $info['detail_tw']?>'>
<?php else: ?>
					<input type="text" class="form-control" name="txt_detail_tw" value=''>
<?php endif; ?>
				</div>
			</div>
			<div class="col-sm-6">
				<label class="control-label"><?= $lang->line('e_detail_local') ?></label>
				<div>
<?php if (strval($id) != '0'): ?>
					<input type="text" class="form-control" name="txt_detail_local" value='<?= $info['detail_local']?>'>
<?php else: ?>
					<input type="text" class="form-control" name="txt_detail_local" value=''>
<?php endif; ?>
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-6">
				<label class="control-label"><?= $lang->line('e_score') ?></label>
				<div>
<?php if (strval($id) != '0'): ?>
					<input type="text" class="form-control" name="txt_score" value='<?= $info['score']?>'>
<?php else: ?>
					<input type="text" class="form-control" name="txt_score" value=''>
<?php endif; ?>
				</div>
			</div>
			<div class="col-sm-6">
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-6">
				<label class="control-label"><?= $lang->line('e_file_path') ?></label>
				<div>
					<div>
<?php if (strval($id) != '0'): ?>
						<input id="file_path" type="file" class="file-loading">
						<input name='hid_filepath' type='hidden' value='<?= $info['file_path']?>'>
<?php else: ?>
						<input id="file_path" type="file" class="file-loading">
						<input name='hid_filepath' type='hidden' value=''>
<?php endif; ?>
					</div>
				</div>
			</div>
			<div class="col-sm-6">
				<label class="control-label"><?= $lang->line('e_file_path2') ?></label>
				<div>
					<div>
<?php if (strval($id) != '0'): ?>
						<input id="file_path2" type="file" class="file-loading">
						<input name='hid_filepath2' type='hidden' value='<?= $info['file_path2']?>'>
<?php else: ?>
						<input id="file_path2" type="file" class="file-loading">
						<input name='hid_filepath2' type='hidden' value=''>
<?php endif; ?>
					</div>
				</div>				
			</div>
		</div>	
	</form>
	<button id="btn_save" class="btn btn-primary">Save</button>
	<button class="btn btn-default btn-cancel">Cancel</button>	
</div>

<script type="text/javascript">
$(function () {
	$('#file_path').fileinput({
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
	$('#file_path').on('fileuploaded', function(event, data, previewId, index) {
		var response = data.response;
		$('input[name=hid_filepath]').val(response.new_name);
	});

	$('#file_path2').fileinput({
		showPreview: false,
		language: "zh-TW",
		uploadUrl: '<?= base_url()?>upload/do_upload',
		allowedFileExtensions: ["jpg","jpeg","gif","png","pdf"],
<?php if((strval($id) != '0') && (strlen($info['file_path2'])) > 0): ?>
		initialCaption: "<?= $info['file_path2']?>",
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
	$('#file_path2').on('fileuploaded', function(event, data, previewId, index) {
		var response = data.response;
		$('input[name=hid_filepath2]').val(response.new_name);
	});	

	$(".btn-cancel").bind("click",function(){
		window.location = '<?= base_url()?>eam/examination';
	});	
	$("#btn_save").bind("click",function(){
		if(!$("form")[0].checkValidity()) return;

		$.ajax({
			async: false,
			type: "POST",
			url: $('#hid_baseurl').val() + 'eam/examination_doEdit',
			data: $('#form1').serialize(),
			statusCode: {
				200: function() {
					window.location = '<?= base_url()?>eam/examination';
				}
			},
			error: function() {
				alert('操作失敗');
			}
		});
	});
});
</script>