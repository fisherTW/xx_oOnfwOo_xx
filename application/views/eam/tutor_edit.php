<script src='<?= base_url()?>assets/js/bootstrap-datetimepicker.min.js'></script>
<link href='<?= base_url()?>assets/css/bootstrap-datetimepicker.min.css' rel='stylesheet' type='text/css'/>

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
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-6">
				<label class="control-label"><?= $lang->line('4-3-1') ?></label>
				<div>
<?php if (strval($id) != '0'): ?>
					<?= form_dropdown('sel_emp_id', $ary_emp, $info['emp_id'], 'class="form-control"'); ?>
<?php else: ?>
					<?= form_dropdown('sel_emp_id', $ary_emp, '', 'class="form-control"'); ?>
<?php endif; ?>
				</div>
			</div>
			<div class="col-sm-6">
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-6">
				<label class="control-label"><?= $lang->line('tutor_date_s') ?></label>
				<div>
					<div class='input-group date'>
<?php if (strval($id) != '0'): ?>
						<input type="text" class="form-control" name="txt_date_start" value='<?= $info['date_start']?>'required readonly>
<?php else: ?>
						<input type="text" class="form-control" name="txt_date_start" value=''required readonly>
<?php endif; ?>	
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-calendar"></span>
						</span>
					</div>
				</div>
			</div>
			<div class="col-sm-6">
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-6">
				<label class="control-label"><?= $lang->line('tutor_date_e') ?></label>
				<div>
					<div class='input-group date'>
<?php if (strval($id) != '0'): ?>
						<input type="text" class="form-control" name="txt_date_end" value='<?= $info['date_end']?>'required readonly>
<?php else: ?>
						<input type="text" class="form-control" name="txt_date_end" value=''required readonly>
<?php endif; ?>	
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-calendar"></span>
						</span>
					</div>
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
	$('.date').datetimepicker({
		format: 'YYYY-MM-DD',
		keepInvalid: true,
		ignoreReadonly: true,
		useCurrent: true
	});

	$(".btn-cancel").bind("click",function(){
		window.location = '<?= base_url()?>eam/tutor';
	});	
	$("#btn_save").bind("click",function(){
		if(!$("form")[0].checkValidity()) return;

		$.ajax({
			async: false,
			type: "POST",
			url: $('#hid_baseurl').val() + 'eam/tutor_doEdit',
			data: $('#form1').serialize(),
			statusCode: {
				200: function() {
					window.location = '<?= base_url()?>eam/tutor';
				}
			},
			error: function() {
				alert('操作失敗');
			}
		});
	});
});
</script>