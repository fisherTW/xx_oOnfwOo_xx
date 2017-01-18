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
				<label class="control-label"><?= $lang->line('1-6-2') ?></label>
				<div>
<?php if (strval($id) != '0'): ?>
					<?= form_dropdown('sel_schoolclass_id', $ary_schoolclass, $info['schoolclass_id'], 'class="form-control"'); ?>
<?php else: ?>
					<?= form_dropdown('sel_schoolclass_id', $ary_schoolclass, '', 'class="form-control"'); ?>
<?php endif; ?>
				</div>
			</div>
		</div>
		<br>
		<div class="form-group">	
			<div class="col-sm-2">
				<label class="control-label"><?= $lang->line('week1') ?></label>
			</div>
			<div class="col-sm-2">
				<label class="control-label"><?= $lang->line('week2') ?></label>
			</div>
			<div class="col-sm-2">
				<label class="control-label"><?= $lang->line('week3') ?></label>
			</div>
			<div class="col-sm-2">
				<label class="control-label"><?= $lang->line('week4') ?></label>
			</div>
			<div class="col-sm-2">
				<label class="control-label"><?= $lang->line('week5') ?></label>
			</div>
			<div class="col-sm-2">
				<label class="control-label"><?= $lang->line('week6') ?></label>
			</div>
		</div>
		<div class='form-group' id='div_content'><?= $init_detail ?>
		</div>
	</form>
	<button id="btn_save" class="btn btn-primary">Save</button>
	<button class="btn btn-default btn-cancel">Cancel</button>	
</div>

<script type="text/javascript">
$(function () {
	$('.month').datetimepicker({
		format: 'YYYY-MM',
		keepInvalid: true,
		ignoreReadonly: true,
		useCurrent: true
	});

	$(".btn-cancel").bind("click",function(){
		window.location = '<?= base_url()?>eam/curriculum';
	});	
	$("#btn_save").bind("click",function(){
		if(!$("form")[0].checkValidity()) return;

		$.ajax({
			async: false,
			type: "POST",
			url: $('#hid_baseurl').val() + 'eam/curriculum_doEdit',
			data: $('#form1').serialize(),
			statusCode: {
				200: function() {
					window.location = '<?= base_url()?>eam/curriculum';
				}
			},
			error: function() {
				alert('操作失敗');
			}
		});
	});

	$("select[name=sel_school_id]").bind("change",function(){	
		changeweekcourse();
	});

	$("select[name=sel_schoolclass_id]").bind("change",function(){
		changeweekcourse();
	});	
});

function changeweekcourse() {
	$.ajax({
		async: false,
		type: "POST",
		url: $('#hid_baseurl').val() + 'eam/apiGetCourseId/',
		data: {
			school: $("select[name=sel_school_id]").val() , 
			school_class: $("select[name=sel_schoolclass_id]").val()
		},
		statusCode: {
			200: function(e) {
				$('#div_content').html(e);
			}
		},
		error: function() {
		}
	});
}
</script>