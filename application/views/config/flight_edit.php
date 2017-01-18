<script src='<?= base_url()?>assets/js/bootstrap-datetimepicker.min.js'></script>
<link href='<?= base_url()?>assets/css/bootstrap-datetimepicker.min.css' rel='stylesheet' type='text/css'/>

<input type='hidden' id='hid_baseurl' value='<?= base_url(); ?>'>

<div class="container">
	<form class="form-horizontal" id='form1'>
		<input type='hidden' name='hid_id' value='<?= $id ?>'>

		<h1><?= $title ?></h1>
		<div class="form-group">
			<label for="inputPassword3" class="col-sm-2 control-label"><?= $lang->line('1-1-4') ?></label>
			<div class="col-sm-10">
<?php if (strval($id) != '0'): ?>
				<?= form_dropdown('sel_airline', $ary_airline, $info['airline_id'], 'class="form-control"'); ?>
<?php else: ?>
				<?= form_dropdown('sel_airline', $ary_airline, '', 'class="form-control"'); ?>
<?php endif; ?>				
			</div>
		</div>
		<div class="form-group">
			<label for="inputPassword3" class="col-sm-2 control-label"><?= $lang->line('flightcode') ?></label>
			<div class="col-sm-10">
<?php if (strval($id) != '0'): ?>
				<input type="text" class="form-control" name="txt_number" value='<?= $info['number']?>' maxlength="10" required>
<?php else: ?>
				<input type="text" class="form-control" name="txt_number" maxlength="10" required>
<?php endif; ?>	
			</div>
		</div>
		<div class="form-group">
			<label for="inputPassword3" class="col-sm-2 control-label"><?= $lang->line('depspot') ?></label>
			<div class="col-sm-10">
<?php if (strval($id) != '0'): ?>
				<input type="text" class="form-control" name="txt_dep" value='<?= $info['dep']?>' maxlength="20" required>
<?php else: ?>
				<input type="text" class="form-control" name="txt_dep" maxlength="20" required>
<?php endif; ?>				
			</div>
		</div>
		<div class="form-group">
			<label for="inputPassword3" class="col-sm-2 control-label"><?= $lang->line('arrspot') ?></label>
			<div class="col-sm-10">
<?php if (strval($id) != '0'): ?>
				<input type="text" class="form-control" name="txt_arr" value='<?= $info['arr']?>' maxlength="20" required>
<?php else: ?>
				<input type="text" class="form-control" name="txt_arr" maxlength="20" required>
<?php endif; ?>				
			</div>
		</div>
		<div class="form-group">
			<label for="inputPassword3" class="col-sm-2 control-label"><?= $lang->line('dep_time') ?></label>
			<div class="col-sm-10">
<?php if (strval($id) != '0'): ?>
				<div class='input-group date' id='datetimepicker1'>
					<input type="text" class="form-control" name="txt_dep_time" value='<?= $info['dep_time']?>' pattern="[0-9]{2}:[0-9]{2}:[0-9]{2}" required>
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-calendar"></span>
					</span>
				</div>
<?php else: ?>
				<div class='input-group date' id='datetimepicker1'>
					<input type="text" class="form-control" name="txt_dep_time" value='' pattern="[0-9]{2}:[0-9]{2}:[0-9]{2}" required>
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-calendar"></span>
					</span>
				</div>
<?php endif; ?>	
			</div>
		</div>
		<div class="form-group">
			<label for="inputPassword3" class="col-sm-2 control-label"><?= $lang->line('arr_time') ?></label>
			<div class="col-sm-10">
<?php if (strval($id) != '0'): ?>
				<div class='input-group date' id='datetimepicker2'>
					<input type="text" class="form-control" name="txt_arr_time" value='<?= $info['arr_time']?>' pattern="[0-9]{2}:[0-9]{2}:[0-9]{2}" required>
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-calendar"></span>
					</span>
				</div>
<?php else: ?>
				<div class='input-group date' id='datetimepicker2'>
					<input type="text" class="form-control" name="txt_arr_time" value='' pattern="[0-9]{2}:[0-9]{2}:[0-9]{2}" required>
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
		format: 'HH:mm:ss',
		keepInvalid: true
	});
	$(".btn-cancel").bind("click",function(){
		window.location = '<?= base_url()?>config/flight';
	});	
	$("#btn_save").bind("click",function(){
		if(!$("form")[0].checkValidity()) return;

		$.ajax({
			type: "POST",
			url: $('#hid_baseurl').val() + 'config/flight_doEdit',
			data: $('#form1').serialize(),
			statusCode: {
				200: function() {
					window.location = '<?= base_url()?>config/flight';
				}
			},
			error: function() {
				alert('操作失敗');
			}
		});
	});	
})
</script>