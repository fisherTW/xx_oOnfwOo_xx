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
			<label for="inputPassword3" class="col-sm-2 control-label"><?= $lang->line('accountnumber') ?></label>
			<div class="col-sm-10">
<?php if (strval($id) != '0'): ?>
				<input type="text" class="form-control" name="txt_number" value='<?= $info['number']?>' maxlength="20" required>
<?php else: ?>
				<input type="text" class="form-control" name="txt_number" maxlength="20" required>
<?php endif; ?>	
			</div>
		</div>
		<div class="form-group">
			<label for="inputPassword3" class="col-sm-2 control-label"><?= $lang->line('accountname') ?></label>
			<div class="col-sm-10">
<?php if (strval($id) != '0'): ?>
				<input type="text" class="form-control" name="txt_tw" value='<?= $info['tw']?>' maxlength="20" required>
<?php else: ?>
				<input type="text" class="form-control" name="txt_tw" maxlength="20" required>
<?php endif; ?>	
			</div>
		</div>	
		<div class="form-group">
			<label for="inputPassword3" class="col-sm-2 control-label"><?= $lang->line('bank_tw') ?></label>
			<div class="col-sm-10">
<?php if (strval($id) != '0'): ?>
				<input type="text" class="form-control" name="txt_bank_tw" value='<?= $info['bank_tw']?>' maxlength="30" required>
<?php else: ?>
				<input type="text" class="form-control" name="txt_bank_tw" maxlength="30" required>
<?php endif; ?>	
			</div>
		</div>	
		<div class="form-group">
			<label for="inputPassword3" class="col-sm-2 control-label"><?= $lang->line('bank_add') ?></label>
			<div class="col-sm-10">
<?php if (strval($id) != '0'): ?>
				<input type="text" class="form-control" name="txt_bank_add" value='<?= $info['bank_add']?>' maxlength="100" >
<?php else: ?>
				<input type="text" class="form-control" name="txt_bank_add" maxlength="100" >
<?php endif; ?>	
			</div>
		</div>
		<div class="form-group">
			<label for="inputPassword3" class="col-sm-2 control-label"><?= $lang->line('bank_phone') ?></label>
			<div class="col-sm-10">
<?php if (strval($id) != '0'): ?>
				<input type="text" class="form-control" name="txt_bank_phone" value='<?= $info['bank_phone']?>' maxlength="20" >
<?php else: ?>
				<input type="text" class="form-control" name="txt_bank_phone" maxlength="20" >
<?php endif; ?>	
			</div>
		</div>
	</form>

	<button id="btn_save" class="btn btn-primary">Save</button>
	<button class="btn btn-default btn-cancel">Cancel</button>
</div>

<script type="text/javascript">
$(function () {
	$(".btn-cancel").bind("click",function(){
		window.location = '<?= base_url()?>config/account';
	});	
	$("#btn_save").bind("click",function(){
		if(!$("form")[0].checkValidity()) return;

		$.ajax({
			type: "POST",
			url: $('#hid_baseurl').val() + 'config/account_doEdit',
			data: $('#form1').serialize(),
			statusCode: {
				200: function() {
					window.location = '<?= base_url()?>config/account';
				}
			},
			error: function() {
				alert('操作失敗');
			}
		});
	});	
})
</script>