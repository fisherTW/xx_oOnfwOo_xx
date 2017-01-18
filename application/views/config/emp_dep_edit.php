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
			<label for="inputPassword3" class="col-sm-2 control-label"><?= $lang->line('emp_dep_name') ?></label>
			<div class="col-sm-10">
<?php if (strval($id) != '0'): ?>
				<input type="text" class="form-control" name="txt_tw" value='<?= $info['tw']?>' maxlength="30" required>
<?php else: ?>
				<input type="text" class="form-control" name="txt_tw" maxlength="30" required>
<?php endif; ?>				
			</div>
		</div>
		<div class="form-group">
			<label for="inputPassword3" class="col-sm-2 control-label"><?= $lang->line('emp_id_super') ?></label>
			<div class="col-sm-10">
<?php if (strval($id) != '0'): ?>
				<?= form_dropdown('sel_emp_id_super', $ary_emp_id, $info['emp_id_super'], 'class="form-control"'); ?>
<?php else: ?>
				<?= form_dropdown('sel_emp_id_super', $ary_emp_id, '', 'class="form-control"'); ?>
<?php endif; ?>				
			</div>
		</div>
		<div class="form-group">
			<label for="inputPassword3" class="col-sm-2 control-label"><?= $lang->line('emp_id_window') ?></label>
			<div class="col-sm-10">
<?php if (strval($id) != '0'): ?>
				<?= form_dropdown('sel_emp_id_window', $ary_emp_id, $info['emp_id_window'], 'class="form-control"'); ?>
<?php else: ?>
				<?= form_dropdown('sel_emp_id_window', $ary_emp_id, '', 'class="form-control"'); ?>
<?php endif; ?>				
			</div>
		</div>
		<div class="form-group">
			<label for="comment" class="col-sm-2 control-label"><?= $lang->line('desc') ?></label>
			<div class="col-sm-10">		  
<?php if (strval($id) != '0'): ?>
				<input type="text" class="form-control" name="txt_descr" value="<?= $info['descr']?>">	
<?php else: ?>
				<input type="text" class="form-control" name="txt_descr">	
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
		window.location = '<?= base_url()?>config/emp_dep';
	});	
	$("#btn_save").bind("click",function(){
		if(!$("form")[0].checkValidity()) return;

		$.ajax({
			type: "POST",
			url: $('#hid_baseurl').val() + 'config/emp_dep_doEdit',
			data: $('#form1').serialize(),
			statusCode: {
				200: function() {
					window.location = '<?= base_url()?>config/emp_dep';
				}
			},
			error: function() {
				alert('操作失敗');
			}
		});
	});	
})
</script>