<script src='<?= base_url()?>assets/js/fileinput.min.js'></script>
<script src='<?= base_url()?>assets/js/fileinput_locale_zh-TW.js'></script>
<script src='<?= base_url()?>assets/js/bootstrap-datetimepicker.min.js'></script>
<link href='<?= base_url()?>assets/css/fileinput.min.css' rel='stylesheet' type='text/css'/>
<link href='<?= base_url()?>assets/css/bootstrap-datetimepicker.min.css' rel='stylesheet' type='text/css'/>

<input type='hidden' id='hid_baseurl' value='<?= base_url(); ?>'>

<div class="container">
	<form class="form-horizontal" id='form1'>
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
					<?= form_dropdown('sel_doc_type', $ary_doc_type, $info['doc_id5_3'], 'class="form-control"'); ?>
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
				<label class="control-label"><?= $lang->line('1-2-2') ?></label>
				<div>
<?php if (strval($id) != '0'): ?>
					<?= form_dropdown('sel_emp_dep_id', $ary_emp_dep, $info['emp_dep_id'], 'class="form-control"'); ?>
<?php else: ?>
					<?= form_dropdown('sel_emp_dep_id', $ary_emp_dep, '', 'class="form-control"'); ?>
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

	$(".btn-cancel").bind("click",function(){
		window.location = '<?= base_url()?>docmanage/doc_internal';
	});

	$("#btn_save").bind("click",function(){
		if(!$("form")[0].checkValidity()) return;

		$.ajax({
			type: "POST",
			url: $('#hid_baseurl').val() + 'docmanage/doc_internal_doEdit',
			data: $('#form1').serialize(),
			statusCode: {
				200: function() {
					window.location = '<?= base_url()?>docmanage/doc_internal';
				}
			},
			error: function() {
				alert('操作失敗');
			}
		});
	});
});
</script>