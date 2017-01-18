<script src='<?= base_url()?>assets/js/bootstrap-datetimepicker.min.js'></script>
<link href='<?= base_url()?>assets/css/bootstrap-datetimepicker.min.css' rel='stylesheet' type='text/css'/>

<input type='hidden' id='hid_baseurl' value='<?= base_url(); ?>'>

<div class="container">
	<form class="form-horizontal" id='form1'>
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
				<label class="control-label"><?= $lang->line('test_date') ?></label>
				<div>
					<div class='input-group date' id='datetimepicker'>
<?php if (strval($id) != '0'): ?>
						<input type="text" class="form-control" name="txt_date" value='<?= $info['date']?>' >
<?php else: ?>
						<input type="text" class="form-control" name="txt_date" value='' >
<?php endif; ?>
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-calendar"></span>
						</span>
					</div>
				</div>
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
				<label class="control-label"><?= $lang->line('4-4-2') ?></label>
				<div>
<?php if (strval($id) != '0'): ?>
					<?= form_dropdown('sel_course_id', $ary_course, $info['course_id'], 'class="form-control"'); ?>
<?php else: ?>
					<?= form_dropdown('sel_course_id', $ary_course, '', 'class="form-control"'); ?>
<?php endif; ?>
				</div>
			</div>
			<div class="col-sm-6">
			</div>
		</div>			
		<div class="form-group">	
			<div class="col-sm-1">
				<label class="control-label"><?= $lang->line('student_no') ?></label>
			</div>
			<div class="col-sm-2">
				<label class="control-label"><?= $lang->line('name_tw') ?></label>
			</div>
			<div class="col-sm-2">
				<label class="control-label"><?= $lang->line('name_en') ?></label>
			</div>
			<div class="col-sm-2">
				<label class="control-label"><?= $lang->line('name_local') ?></label>
			</div>
			<div class="col-sm-1">
				<label class="control-label"><?= $lang->line('score') ?></label>
			</div>
			<div class="col-sm-4">
				<label class="control-label"><?= $lang->line('learn_descr') ?></label>
			</div>
		</div>
		<div class='form-group' id='div_labor_course'><?= $init_detail ?>
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
		window.location = '<?= base_url()?>eam/score';
	});	
	$("#btn_save").bind("click",function(){
		if(!$("form")[0].checkValidity()) return;

		$.ajax({
			async: false,
			type: "POST",
			url: $('#hid_baseurl').val() + 'eam/score_doEdit',
			data: $('#form1').serialize(),
			statusCode: {
				200: function() {
					window.location = '<?= base_url()?>eam/score';
				}
			},
			error: function() {
				alert('操作失敗');
			}
		});
	});

	$("select[name=sel_school_id]").bind("change",function(){	
		changelaborcourse();
	});

	$("select[name=sel_schoolclass_id]").bind("change",function(){
		changelaborcourse();
	});	
});

function changelaborcourse() {
	$.ajax({
		async: false,
		type: "POST",
		url: $('#hid_baseurl').val() + 'eam/apiGetScoreId/',
		data: {
			school: $("select[name=sel_school_id]").val() , 
			school_class: $("select[name=sel_schoolclass_id]").val()
		},
		statusCode: {
			200: function(e) {
				$('#div_labor_course').html(e);
			}
		},
		error: function() {
		}
	});
}
</script>