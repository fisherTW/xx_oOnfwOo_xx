<script src='<?= base_url()?>assets/js/bootstrap-datetimepicker.min.js'></script>
<link href='<?= base_url()?>assets/css/bootstrap-datetimepicker.min.css' rel='stylesheet' type='text/css'/>

<input type='hidden' id='hid_baseurl' value='<?= base_url(); ?>'>

<div class="container">
	<form class="form-horizontal" id='form1'>
		<input type='hidden' name='hid_id' value='<?= $id ?>'>

		<h1><?= $title ?></h1>
		<div class="form-group">
			<label for="inputPassword3" class="col-sm-2 control-label"><?= $lang->line('1-1-1') ?></label>
			<div class="col-sm-10">
<?php if (strval($id) != '0'): ?>
				<?= form_dropdown('sel_country', $ary_country, $info['country_id'], 'class="form-control"'); ?>
<?php else: ?>
				<?= form_dropdown('sel_country', $ary_country, '', 'class="form-control"'); ?>
<?php endif; ?>				
			</div>
		</div>
		<div class="form-group">
			<label for="inputPassword3" class="col-sm-2 control-label"><?= $lang->line('name_tw') ?></label>
			<div class="col-sm-10">
<?php if (strval($id) != '0'): ?>
				<input type="text" class="form-control" name="txt_name_tw" value='<?= $info['name_tw']?>' maxlength="30" required>
<?php else: ?>
				<input type="text" class="form-control" name="txt_name_tw" maxlength="30" required>
<?php endif; ?>				
			</div>
		</div>
		<div class="form-group">
			<label for="inputPassword3" class="col-sm-2 control-label"><?= $lang->line('name_en') ?></label>
			<div class="col-sm-10">
<?php if (strval($id) != '0'): ?>
				<input type="text" class="form-control" name="txt_name_en" value='<?= $info['name_en']?>' maxlength="30" required>
<?php else: ?>
				<input type="text" class="form-control" name="txt_name_en" maxlength="30" required>
<?php endif; ?>				
			</div>
		</div>
		<div class="form-group">
			<label for="inputPassword3" class="col-sm-2 control-label"><?= $lang->line('emp_dep_name') ?></label>
			<div class="col-sm-10">
<?php if (strval($id) != '0'): ?>
				<?= form_dropdown('sel_emp_dep_id', $ary_dep, $info['emp_dep_id'], 'class="form-control"'); ?>
<?php else: ?>
				<?= form_dropdown('sel_emp_dep_id', $ary_dep, '', 'class="form-control"'); ?>
<?php endif; ?>				
			</div>
		</div>
		<div class="form-group">
			<label for="inputPassword3" class="col-sm-2 control-label"><?= $lang->line('emp_position_name') ?></label>
			<div class="col-sm-10">
<?php if (strval($id) != '0'): ?>
				<?= form_dropdown('sel_emp_position_id', $ary_position, $info['emp_position_id'], 'class="form-control"'); ?>
<?php else: ?>
				<?= form_dropdown('sel_emp_position_id', $ary_position, '', 'class="form-control"'); ?>
<?php endif; ?>				
			</div>
		</div>
		<div class="form-group">
			<label for="inputPassword3" class="col-sm-2 control-label"><?= $lang->line('schoolname') ?></label>
			<div class="col-sm-10">
<?php if (strval($id) != '0'): ?>
				<?= form_dropdown('sel_school_id', $ary_school, $info['school_id'], 'class="form-control"'); ?>
<?php else: ?>
				<?= form_dropdown('sel_school_id', $ary_school, '', 'class="form-control"'); ?>
<?php endif; ?>				
			</div>
		</div>
		<div class="form-group">
			<label for="inputPassword3" class="col-sm-2 control-label"> E-mail</label>
			<div class="col-sm-10">
<?php if (strval($id) != '0'): ?>
				<input type="text" class="form-control" name="txt_mail" value='<?= $info['mail']?>' maxlength="30" required>
<?php else: ?>
				<input type="text" class="form-control" name="txt_mail" maxlength="30" required>
<?php endif; ?>				
			</div>
		</div>
		<div class="form-group">
			<label for="inputPassword3" class="col-sm-2 control-label"><?= $lang->line('sex') ?> </label>
<?php if (strval($id) != '0'): ?>
			<label class="radio-inline">
			  <input type="radio" name="rdo_sex" id="inlineRadio1" value=1 <?= $info['sex'] == 1 ? 'checked' : '' ?>> <?= $lang->line('rdo_m') ?>
			</label>
			<label class="radio-inline">
			  <input type="radio" name="rdo_sex" id="inlineRadio2" value=0 <?= $info['sex'] == 0 ? 'checked' : '' ?>> <?= $lang->line('rdo_f') ?>
			</label>
<?php else: ?>
			<label class="radio-inline">
			  <input type="radio" name="rdo_sex" id="inlineRadio1" value=1 checked> <?= $lang->line('rdo_m') ?>
			</label>
			<label class="radio-inline">
			  <input type="radio" name="rdo_sex" id="inlineRadio2" value=0> <?= $lang->line('rdo_f') ?>
			</label>
<?php endif; ?>	
		</div>	
		<div class="form-group">
			<label for="inputPassword3" class="col-sm-2 control-label"><?= $lang->line('is_enable') ?> </label>
<?php if (strval($id) != '0'): ?>
			<label class="radio-inline">
			  <input type="radio" name="rdo_is_enable" id="inlineRadio1" value=1 <?= $info['is_enable'] == 1 ? 'checked' : '' ?>> <?= $lang->line('rdo_yes') ?>
			</label>
			<label class="radio-inline">
			  <input type="radio" name="rdo_is_enable" id="inlineRadio2" value=0 <?= $info['is_enable'] == 0 ? 'checked' : '' ?>> <?= $lang->line('rdo_no') ?>
			</label>
<?php else: ?>
			<label class="radio-inline">
			  <input type="radio" name="rdo_is_enable" id="inlineRadio1" value=1 checked> <?= $lang->line('rdo_yes') ?>
			</label>
			<label class="radio-inline">
			  <input type="radio" name="rdo_is_enable" id="inlineRadio2" value=0> <?= $lang->line('rdo_no') ?>
			</label>
<?php endif; ?>	
		</div>
		<div class="form-group">
			<label for="inputPassword3" class="col-sm-2 control-label"><?= $lang->line('date_onboard') ?></label>
			<div class="col-sm-10">
<?php if (strval($id) != '0'): ?>
				<div class='input-group date' id='datetimepicker2'>
					<input type="text" class="form-control" name="txt_date_onboard" value='<?= $info['date_onboard']?>' pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" required readonly>
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-calendar"></span>
					</span>
				</div>
<?php else: ?>
				<div class='input-group date' id='datetimepicker2'>
					<input type="text" class="form-control" name="txt_date_onboard" value='' pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" required readonly>
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-calendar"></span>
					</span>
				</div>
<?php endif; ?>	
			</div>
		</div>
		<div class="form-group">
			<label for="inputPassword3" class="col-sm-2 control-label"><?= $lang->line('date_offboard') ?></label>
			<div class="col-sm-10">
<?php if (strval($id) != '0'): ?>
				<div class='input-group date' id='datetimepicker2'>
					<input type="text" class="form-control" name="txt_date_offboard" value='<?= $info['date_offboard']?>' pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" readonly>
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-calendar"></span>
					</span>
				</div>
<?php else: ?>
				<div class='input-group date' id='datetimepicker2'>
					<input type="text" class="form-control" name="txt_date_offboard" value='' pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" readonly>
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-calendar"></span>
					</span>
				</div>
<?php endif; ?>	
			</div>
		</div>
		<div class="form-group">
			<label for="inputPassword3" class="col-sm-2 control-label"><?= $lang->line('phone_comm') ?></label>
			<div class="col-sm-10">
<?php if (strval($id) != '0'): ?>
				<input type="text" class="form-control" name="txt_phone_comm" value='<?= $info['phone_comm']?>' maxlength="30" required>
<?php else: ?>
				<input type="text" class="form-control" name="txt_phone_comm" maxlength="30" required>
<?php endif; ?>				
			</div>
		</div>
		<div class="form-group">
			<label for="inputPassword3" class="col-sm-2 control-label"><?= $lang->line('addr_comm') ?></label>
			<div class="col-sm-10">
<?php if (strval($id) != '0'): ?>
				<input type="text" class="form-control" name="txt_addr_comm" value='<?= $info['addr_comm']?>' maxlength="30" required>
<?php else: ?>
				<input type="text" class="form-control" name="txt_addr_comm" maxlength="30" required>
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
		format: 'YYYY-MM-DD',
		keepInvalid: true,
		ignoreReadonly: true,
		useCurrent: true
	});
	if($('input[name=hid_id]').val().toString() == '0') {
		$('input[name=txt_date_onboard]').datetimepicker({
			defaultDate: moment(new Date()),
			format: 'YYYY-MM-DD'
		});
	}

	$(".btn-cancel").bind("click",function(){
		window.location = '<?= base_url()?>config/emp';
	});	
	$("#btn_save").bind("click",function(){
		if(!$("form")[0].checkValidity()) return;

		$.ajax({
			type: "POST",
			url: $('#hid_baseurl').val() + 'config/emp_doEdit',
			data: $('#form1').serialize(),
			statusCode: {
				200: function() {
					window.location = '<?= base_url()?>config/emp';
				}
			},
			error: function() {
				alert('操作失敗');
			}
		});
	});	
})
</script>