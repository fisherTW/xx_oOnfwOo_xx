<script src='<?= base_url()?>assets/js/bootstrap-datetimepicker.min.js'></script>
<link href='<?= base_url()?>assets/css/bootstrap-datetimepicker.min.css' rel='stylesheet' type='text/css'/>

<input type='hidden' id='hid_baseurl' value='<?= base_url(); ?>'>

<div class="container">
	<form class="form-horizontal" id='form1'>
		<input type='hidden' name='hid_id' value='<?= $id ?>'>

		<h1><?= $title ?></h1>
		<div class="form-group">
			<label for="inputPassword3" class="col-sm-2 control-label"><?= $lang->line('schoolname') ?></label>
			<div class="col-sm-10">
<?php if (strval($id) != '0'): ?>
				<?= form_dropdown('sel_school', $ary_school, $info['school_id'], 'class="form-control"'); ?>
<?php else: ?>
				<?= form_dropdown('sel_school', $ary_school, '', 'class="form-control"'); ?>
<?php endif; ?>				
			</div>
		</div>
		<div class="form-group">
			<label for="inputPassword3" class="col-sm-2 control-label"><?= $lang->line('section') ?></label>
			<div class="col-sm-10">
<?php if (strval($id) != '0'): ?>
				<input type="number" class="form-control" name="txt_section" value='<?= $info['section']?>' max='10' min='1' required>
<?php else: ?>
				<input type="number" class="form-control" name="txt_section" max='10' min='1' required>
<?php endif; ?>				
			</div>
		</div>
		<div class="form-group">
			<label for="inputPassword3" class="col-sm-2 control-label"><?= $lang->line('time_start') ?></label>
			<div class="col-sm-10">
<?php if (strval($id) != '0'): ?>
				<div class='input-group date' id='datetimepicker1'>
					<input type="text" class="form-control" name="txt_time_start" value='<?= $info['time_start']?>' pattern="[0-9]{2}:[0-9]{2}:[0-9]{2}" required readonly>
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-calendar"></span>
					</span>
				</div>
<?php else: ?>
				<div class='input-group date' id='datetimepicker1'>
					<input type="text" class="form-control" name="txt_time_start" value='' pattern="[0-9]{2}:[0-9]{2}:[0-9]{2}" required readonly>
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-calendar"></span>
					</span>
				</div>
<?php endif; ?>	
			</div>
		</div>
		<div class="form-group">
			<label for="inputPassword3" class="col-sm-2 control-label"><?= $lang->line('time_end') ?></label>
			<div class="col-sm-10">
<?php if (strval($id) != '0'): ?>
				<div class='input-group date' id='datetimepicker1'>
					<input type="text" class="form-control" name="txt_time_end" value='<?= $info['time_end']?>' pattern="[0-9]{2}:[0-9]{2}:[0-9]{2}" required readonly>
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-calendar"></span>
					</span>
				</div>
<?php else: ?>
				<div class='input-group date' id='datetimepicker1'>
					<input type="text" class="form-control" name="txt_time_end" value='' pattern="[0-9]{2}:[0-9]{2}:[0-9]{2}" required readonly>
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-calendar"></span>
					</span>
				</div>
<?php endif; ?>	
			</div>
		</div>
	</form>

	<button id="btn_save" class="btn btn-primary">Save</button>
	<button class="btn btn-default btn-cancel">Cancel</button>
</div>

<script type="text/javascript">
$(function () {
	$('.date').datetimepicker({
		format: 'HH:mm',
		keepInvalid: true,
		ignoreReadonly: true,
		useCurrent: true
	});
	$(".btn-cancel").bind("click",function(){
		window.location = '<?= base_url()?>config2/schooltime';
	});	
	$("#btn_save").bind("click",function(){
		if(!$("form")[0].checkValidity()) return;

		$.ajax({
			type: "POST",
			url: $('#hid_baseurl').val() + 'config2/schooltime_doEdit',
			data: $('#form1').serialize(),
			statusCode: {
				200: function() {
					window.location = '<?= base_url()?>config2/schooltime';
				}
			},
			error: function() {
				alert('操作失敗');
			}
		});
	});	
})
</script>