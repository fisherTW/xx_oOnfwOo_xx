<script src='<?= base_url()?>assets/js/bootstrap-datetimepicker.min.js'></script>
<link href='<?= base_url()?>assets/css/bootstrap-datetimepicker.min.css' rel='stylesheet' type='text/css'/>

<input type='hidden' id='hid_baseurl' value='<?= base_url(); ?>'>

<div class="container">
	<form class="form-horizontal" id='form1'>
		<input type='hidden' name='hid_election_id' value='<?= $election_id ?>'>
		<input type='hidden' name='hid_labor_id' value='<?= $labor_id ?>'>		

		<h1><?= $title ?></h1>
		<div class="form-group">
			<div class="col-sm-6">
				<label class="control-label"><?= $lang->line('election_id') ?></label>
				<div class="checkbox">
					<?= $info['election_id'] ?>
				</div>
			</div>
			<div class="col-sm-6">
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-6">
				<label class="control-label"><?= $lang->line('employed_workers_id') ?></label>
				<div>
					<?= $info['hire_id']?>
				</div>
			</div>
			<div class="col-sm-6">
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-6">
				<label class="control-label"><?= $lang->line('laborid').' / '.$lang->line('nametw').' / '.$lang->line('nameem') ?></label>
				<div>
					<?= $info['labor_id'].' / '.$info['name_tw'].' / '.$info['name_en']?>
				</div>
			</div>
			<div class="col-sm-6">
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-6">
				<label class="control-label"><?= $lang->line('select_end') ?></label>
				<div class='input-group date'>
					<input type="text" class="form-control" name="txt_date" value='<?= $info['date']?>'required readonly>
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-calendar"></span>
					</span>
				</div>
			</div>
			<div class="col-sm-6">
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-6">
				<label class="control-label"><?= $lang->line('election_type') ?></label>
				<div>
					<?= form_dropdown('sel_type', $ary_election, $info['type'], 'class="form-control"'); ?>
				</div>
			</div>
			<div class="col-sm-6">
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-6">
				<label class="control-label"><?= $lang->line('election_seq') ?></label>
				<input type="text" class="form-control" name="txt_seq" value='<?= $info['seq'] ?>' pattern='[0-9]+'>
			</div>
			<div class="col-sm-6">
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-6">
				<label class="control-label"><?= $lang->line('not_hiring_date') ?></label>
				<div class='input-group date'>
					<input type="text" class="form-control" name="txt_not_hiring_date" value='<?= $info['not_hiring_date']?>'required readonly>
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-calendar"></span>
					</span>
				</div>
			</div>
			<div class="col-sm-6">
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-6">
				<label class="control-label"><?= $lang->line('not_hiring_descr') ?></label>
				<input type="text" class="form-control" name="txt_not_hiring_descr" value='<?= $info['not_hiring_descr'] ?>'>
			</div>
			<div class="col-sm-6">
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-6">
				<label class="control-label"><?= $lang->line('drive') ?></label>
				<div class='checkbox'>	
					<label>
						<input type="checkbox" name='chk_drive[]' value="1" <?= ($info['drive'] & 1) == '1' ? 'checked="checked"' : '' ?>/><?= $lang->line('drive_outbound') ?>　
					</label>
					<label>
						<input type="checkbox" name='chk_drive[]' value="2" <?= ($info['drive'] & 2) == '2' ? 'checked="checked"' : '' ?>/><?= $lang->line('drive_return') ?>
					</label>
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
	$(".btn-cancel").bind("click",function(){
		window.location = '<?= base_url()?>eam/election_labor';
	});	
	$("#btn_save").bind("click",function(){
		if(!$("form")[0].checkValidity()) return;

		$.ajax({
			async: false,			
			type: "POST",
			url: $('#hid_baseurl').val() + 'eam/election_labor_doEdit',
			data: $('#form1').serialize(),
			statusCode: {
				200: function() {
					window.location = '<?= base_url()?>eam/election_labor';
				}
			},
			error: function() {
				alert('操作失敗');
			}
		});
	});

	$('.date').datetimepicker({
		format: 'YYYY-MM-DD',
		keepInvalid: true,
		ignoreReadonly: true,
		useCurrent: true
	});	
});
</script>