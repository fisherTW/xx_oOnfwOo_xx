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
			<label for="inputPassword3" class="col-sm-2 control-label"><?= $lang->line('schoolclassname') ?></label>
			<div class="col-sm-10">
<?php if (strval($id) != '0'): ?>
				<input type="text" class="form-control" name="txt_tw" value='<?= $info['tw']?>' required>
<?php else: ?>
				<input type="text" class="form-control" name="txt_tw" required>
<?php endif; ?>				
			</div>
		</div>
		<div class="form-group">
		  <label for="comment" class="col-sm-2 control-label"><?= $lang->line('desc') ?></label>
			<div class="col-sm-10">		  
<?php if (strval($id) != '0'): ?>
				<textarea class="form-control" rows="5" name="txt_descr"><?= $info['descr']?></textarea>	
<?php else: ?>
				<textarea class="form-control" rows="5" name="txt_descr"></textarea>	
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
		window.location = '<?= base_url()?>config2/schoolclass';
	});	
	$("#btn_save").bind("click",function(){
		if(!$("form")[0].checkValidity()) return;

		$.ajax({
			type: "POST",
			url: $('#hid_baseurl').val() + 'config2/schoolclass_doEdit',
			data: $('#form1').serialize(),
			statusCode: {
				200: function() {
					window.location = '<?= base_url()?>config2/schoolclass';
				}
			},
			error: function() {
				alert('操作失敗');
			}
		});
	});	
})
</script>