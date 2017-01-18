<input type='hidden' id='hid_baseurl' value='<?= base_url(); ?>'>

<div class="container">
	<form class="form-horizontal" id='form1'>
		<input type='hidden' name='hid_id' value='<?= $id ?>'>

		<h1><?= $title ?></h1>
		<div class="form-group" style='display:none;'>
			<label for="inputPassword3" class="col-sm-2 control-label"><?= $lang->line('hotelcode') ?></label>
			<div class="col-sm-10">
<?php if (strval($id) != '0'): ?>
				<input type="text" class="form-control" name="txt_name_init" value='<?= $info['name_init']?>' maxlength="5" required>
<?php else: ?>
				<input type="text" class="form-control" name="txt_name_init" maxlength="5" value='x' required>
<?php endif; ?>	
			</div>
		</div>
		<div class="form-group">
			<label for="inputPassword3" class="col-sm-2 control-label"><?= $lang->line('hotelname') ?></label>
			<div class="col-sm-10">
<?php if (strval($id) != '0'): ?>
				<input type="text" class="form-control" name="txt_tw" value='<?= $info['tw']?>' maxlength="30" required>
<?php else: ?>
				<input type="text" class="form-control" name="txt_tw" maxlength="30" required>
<?php endif; ?>				
			</div>
		</div>
		<div class="form-group">
			<label for="inputPassword3" class="col-sm-2 control-label"><?= $lang->line('hotelnameen') ?></label>
			<div class="col-sm-10">
<?php if (strval($id) != '0'): ?>
				<input type="text" class="form-control" name="txt_en" value='<?= $info['en']?>' maxlength="50" required>
<?php else: ?>
				<input type="text" class="form-control" name="txt_en" maxlength="50" required>
<?php endif; ?>	
			</div>
		</div>
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
			<label for="inputPassword3" class="col-sm-2 control-label"><?= $lang->line('1-1-2') ?></label>
			<div class="col-sm-10">
<?php if (strval($id) != '0'): ?>
				<?= form_dropdown('sel_school', $ary_school, $info['school_id'], 'class="form-control"'); ?>
<?php else: ?>
				<?= form_dropdown('sel_school', $ary_school, '', 'class="form-control"'); ?>
<?php endif; ?>				
			</div>
		</div>
		<div class="form-group">
			<label for="inputPassword3" class="col-sm-2 control-label"><?= $lang->line('vatnumber') ?></label>
			<div class="col-sm-10">
<?php if (strval($id) != '0'): ?>
				<input type="text" class="form-control" name="txt_vat_number" pattern="[0-9]{8}" value='<?= $info['vat_number']?>' >
<?php else: ?>
				<input type="text" class="form-control" name="txt_vat_number" pattern="[0-9]{8}">
<?php endif; ?>	
			</div>
		</div>
		<div class="form-group">
			<label for="inputPassword3" class="col-sm-2 control-label"><?= $lang->line('tw_address') ?></label>
			<div class="col-sm-10">
<?php if (strval($id) != '0'): ?>
				<input type="text" class="form-control" name="txt_address" value='<?= $info['address']?>' maxlength="100" required>
<?php else: ?>
				<input type="text" class="form-control" name="txt_address" maxlength="100" required>
<?php endif; ?>	
			</div>
		</div>
		<div class="form-group">
			<label for="inputPassword3" class="col-sm-2 control-label"><?= $lang->line('phone') ?></label>
			<div class="col-sm-10">
<?php if (strval($id) != '0'): ?>
				<input type="text" class="form-control" name="txt_phone" value='<?= $info['phone']?>' maxlength="20" >
<?php else: ?>
				<input type="text" class="form-control" name="txt_phone" maxlength="20" >
<?php endif; ?>	
			</div>
		</div>
		<div class="form-group">
			<label for="inputPassword3" class="col-sm-2 control-label"><?= $lang->line('fax') ?></label>
			<div class="col-sm-10">
<?php if (strval($id) != '0'): ?>
				<input type="text" class="form-control" name="txt_fax" value='<?= $info['fax']?>' maxlength="20" >
<?php else: ?>
				<input type="text" class="form-control" name="txt_fax" maxlength="20" >
<?php endif; ?>	
			</div>
		</div>
		<div class="form-group">
			<label for="inputPassword3" class="col-sm-2 control-label"><?= $lang->line('url') ?></label>
			<div class="col-sm-10">
<?php if (strval($id) != '0'): ?>
				<input type="text" class="form-control" name="txt_site" value='<?= $info['site']?>' maxlength="100" >
<?php else: ?>
				<input type="text" class="form-control" name="txt_site" maxlength="100" >
<?php endif; ?>	
			</div>
		</div>
		<div class="form-group">
			<label for="inputPassword3" class="col-sm-2 control-label"><?= $lang->line('level') ?></label>
			<div class="col-sm-10">
<?php if (strval($id) != '0'): ?>
				<?= form_dropdown('sel_level', $ary_level, $info['level'], 'class="form-control"'); ?>
<?php else: ?>
				<?= form_dropdown('sel_level', $ary_level, '', 'class="form-control"'); ?>
<?php endif; ?>				
			</div>
		</div>
		<div class="form-group">
			<label for="inputPassword3" class="col-sm-2 control-label"><?= $lang->line('network') ?></label>
			<div class="col-sm-10">
<?php if (strval($id) != '0'): ?>
				<?= form_dropdown('sel_network', $ary_network, $info['network'], 'class="form-control"'); ?>
<?php else: ?>
				<?= form_dropdown('sel_network', $ary_network, '', 'class="form-control"'); ?>
<?php endif; ?>				
			</div>
		</div>
		<div class="form-group">
			<label for="inputPassword3" class="col-sm-2 control-label"><?= $lang->line('networkremark') ?></label>
			<div class="col-sm-10">
<?php if (strval($id) != '0'): ?>
				<input type="text" class="form-control" name="txt_networkremark" value='<?= $info['networkremark']?>' maxlength="20" >
<?php else: ?>
				<input type="text" class="form-control" name="txt_networkremark" maxlength="20" >
<?php endif; ?>	
			</div>
		</div>
		<div class="form-group">
			<label for="inputPassword3" class="col-sm-2 control-label"><?= $lang->line('is_woman_ok') ?> </label>
<?php if (strval($id) != '0'): ?>
			<label class="radio-inline">
			  <input type="radio" name="rdo_is_woman_ok" id="inlineRadio1" value=1 <?= $info['is_woman_ok'] == 1 ? 'checked' : '' ?>> <?= $lang->line('rdo_yes') ?>
			</label>
			<label class="radio-inline">
			  <input type="radio" name="rdo_is_woman_ok" id="inlineRadio2" value=0 <?= $info['is_woman_ok'] == 0 ? 'checked' : '' ?>> <?= $lang->line('rdo_no') ?>
			</label>
<?php else: ?>
			<label class="radio-inline">
			  <input type="radio" name="rdo_is_woman_ok" id="inlineRadio1" value=1> <?= $lang->line('rdo_yes') ?>
			</label>
			<label class="radio-inline">
			  <input type="radio" name="rdo_is_woman_ok" id="inlineRadio2" value=0 checked> <?= $lang->line('rdo_no') ?>
			</label>
<?php endif; ?>	
		</div>
	</form>

	<button id="btn_save" class="btn btn-primary">Save</button>
	<button class="btn btn-default btn-cancel">Cancel</button>
</div>

<script type="text/javascript">
$(function () {
	$(".btn-cancel").bind("click",function(){
		window.location = '<?= base_url()?>config/hotel';
	});	
	$("#btn_save").bind("click",function(){
		if(!$("form")[0].checkValidity()) return;

		$.ajax({
			type: "POST",
			url: $('#hid_baseurl').val() + 'config/hotel_doEdit',
			data: $('#form1').serialize(),
			statusCode: {
				200: function() {
					window.location = '<?= base_url()?>config/hotel';
				}
			},
			error: function() {
				alert('操作失敗');
			}
		});
	});	
})
</script>