<input type='hidden' id='hid_baseurl' value='<?= base_url(); ?>'>
<input type='hidden' id='hid_ftype' value=''>

<div class="container">
	<form class="form-horizontal" id='form1'>
		<input type='hidden' name='hid_id' value='<?= $id ?>'>

		<h1><?= $title ?></h1>
		<div class="form-group">
			<label class="col-sm-2 control-label"><?= $lang->line('1-1-1') ?></label>
			<div class="col-sm-10">
<?php if (strval($id) != '0'): ?>
				<?= form_dropdown('sel_country_id', $ary_country, $info['country_id'], 'class="form-control"'); ?>
<?php else: ?>
				<?= form_dropdown('sel_country_id', $ary_country, '', 'class="form-control"'); ?>
<?php endif; ?>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label"><?= $lang->line('ver') ?></label>
			<div class="col-sm-10">
<?php if (strval($id) != '0'): ?>
				<input type="text" class="form-control" name="txt_ver" value='<?= $info['ver']?>' required>
<?php else: ?>
				<input type="text" class="form-control" name="txt_ver" value='' required>
<?php endif; ?>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label"><?= $lang->line('worker_type_major') ?></label>
			<div class="col-sm-10">
<?php if (strval($id) != '0'): ?>
				<?= form_dropdown('sel_worker_type', $ary_worker_type, $info['worker_type'], 'class="form-control"'); ?>
<?php else: ?>
				<?= form_dropdown('sel_worker_type', $ary_worker_type, '', 'class="form-control"'); ?>
<?php endif; ?>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label"><?= $lang->line('worker_kind') ?></label>
			<div class="col-sm-10">
<?php if (strval($id) != '0'): ?>
				<?= form_dropdown('sel_worker_kind', $ary_worker_kind, $info['worker_kind'], 'class="form-control"'); ?>
<?php else: ?>
				<?= form_dropdown('sel_worker_kind', $ary_worker_kind, '', 'class="form-control"'); ?>
<?php endif; ?>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label"><?= $lang->line('client') ?></label>
			<div class="col-sm-10">
				<div class="input-group">
<?php if (strval($id) != '0'): ?>
	<?php if (strval($info['client_id']) != '-1'): ?>
					<?= form_dropdown('sel_client_id', array($info['client_id'] => $info['c_name_tw']), $info['client_id'], 'class="form-control" otype="client"'); ?>
	<?php else: ?>
					<?= form_dropdown('sel_client_id', array('-1'=>'未選取'), 0, 'class="form-control" otype="client"'); ?>
	<?php endif; ?>							
<?php else: ?>
					<?= form_dropdown('sel_client_id', array('-1'=>'未選取'), 0, 'class="form-control" otype="client"'); ?>
<?php endif; ?>
					<div class="input-group-btn">
						<button ftype='client' class="fsearch btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Search...</button>
					</div>
				</div>
			</div>
		</div>	
		<div class="form-group">
			<label class="col-sm-2 control-label"><?= $lang->line('1-3-1') ?></label>
			<div class="col-sm-10">
<?php if (strval($id) != '0'): ?>
				<?= form_dropdown('sel_fee_id', $ary_fee, $info['fee_id'], 'class="form-control"'); ?>
<?php else: ?>
				<?= form_dropdown('sel_fee_id', $ary_fee, '', 'class="form-control"'); ?>
<?php endif; ?>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label"><?= $lang->line('q_fee_stage') ?></label>
			<div class="col-sm-10">
<?php if (strval($id) != '0'): ?>
				<label class="radio-inline">
					<input type="radio" name="rdo_is_stage" value=1 <?= $info['is_stage'] == 1 ? 'checked' : '' ?>> <?= $lang->line('rdo_yes') ?>
				</label>
				<label class="radio-inline">
					<input type="radio" name="rdo_is_stage" value=0 <?= $info['is_stage'] == 0 ? 'checked' : '' ?>> <?= $lang->line('rdo_no') ?>
				</label>
<?php else: ?>
				<label class="radio-inline">
					<input type="radio" name="rdo_is_stage" value=1 checked> <?= $lang->line('rdo_yes') ?>
				</label>
				<label class="radio-inline">
					<input type="radio" name="rdo_is_stage" value=0> <?= $lang->line('rdo_no') ?>
				</label>
<?php endif; ?>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label"><?= $lang->line('stage_no_start') ?></label>
			<div class="col-sm-10">
<?php if (strval($id) != '0'): ?>
				<input type="text" class="form-control" name="txt_stage_no_start" value='<?= $info['stage_no_start']?>' pattern="[0-9\-]+">
<?php else: ?>
				<input type="text" class="form-control" name="txt_stage_no_start" value='' pattern="[0-9\-]+">
<?php endif; ?>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label"><?= $lang->line('stage_no_end') ?></label>
			<div class="col-sm-10">
<?php if (strval($id) != '0'): ?>
				<input type="text" class="form-control" name="txt_stage_no_end" value='<?= $info['stage_no_end']?>' pattern="[0-9\-]+">
<?php else: ?>
				<input type="text" class="form-control" name="txt_stage_no_end" value='' pattern="[0-9\-]+">
<?php endif; ?>	
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label"><?= $lang->line('1-1-8') ?></label>
			<div class="col-sm-10">
<?php if (strval($id) != '0'): ?>
				<?= form_dropdown('sel_currency_id', $ary_currency, $info['currency_id'], 'class="form-control"'); ?>
<?php else: ?>
				<?= form_dropdown('sel_currency_id', $ary_currency, '', 'class="form-control"'); ?>
<?php endif; ?>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label"><?= $lang->line('hire_money') ?></label>
			<div class="col-sm-10">
<?php if (strval($id) != '0'): ?>
				<input type="text" class="form-control" name="txt_money" value='<?= $info['money']?>' pattern="[0-9\-]+">
<?php else: ?>
				<input type="text" class="form-control" name="txt_money" value='' pattern="[0-9\-]+">
<?php endif; ?>	
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label"><?= $lang->line('country_id') ?></label>
			<div class="col-sm-10">
<?php if (strval($id) != '0'): ?>
				<?= form_dropdown('sel_country_id_receive', $ary_country, $info['country_id_receive'], 'class="form-control"'); ?>
<?php else: ?>
				<?= form_dropdown('sel_country_id_receive', $ary_country, '', 'class="form-control"'); ?>
<?php endif; ?>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label"><?= $lang->line('man_receive') ?></label>
			<div class="col-sm-10">
<?php if (strval($id) != '0'): ?>
				<?= form_dropdown('sel_man_receive', $ary_man_receive, $info['man_receive'], 'class="form-control"'); ?>
<?php else: ?>
				<?= form_dropdown('sel_man_receive', $ary_man_receive, '', 'class="form-control"'); ?>
<?php endif; ?>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label"><?= $lang->line('method_receive') ?></label>
			<div class="col-sm-10">
<?php if (strval($id) != '0'): ?>
				<label class="radio-inline">
					<input type="radio" name="rdo_method_receive" id="" value=1 <?= $info['method_receive'] == 1 ? 'checked' : '' ?>> <?= $ary_method_receive[1] ?>
				</label>
				<label class="radio-inline">
					<input type="radio" name="rdo_method_receive" id="" value=2 <?= $info['method_receive'] == 2 ? 'checked' : '' ?>> <?= $ary_method_receive[2] ?>
				</label>
<?php else: ?>
				<label class="radio-inline">
					<input type="radio" name="rdo_method_receive" id="" value=1 checked> <?= $lang->line('method_receive_2') ?>
				</label>
				<label class="radio-inline">
					<input type="radio" name="rdo_method_receive" id="" value=2> <?= $lang->line('method_receive_3') ?>
				</label>
<?php endif; ?>
			</div>
		</div>
	</form>

	<button id="btn_save" class="btn btn-primary">Save</button>
	<button class="btn btn-default btn-cancel">Cancel</button>

	<div class='modal fade'>
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h2 class="modal-title">Search: <span id='span_modal_title'></span></h2>
				</div>
				<div class='modal-body'>
					<input type="text" class="form-control" name="txt_search"></input>
					<div id='div_modal_search'>
						<select id='sel_search' class='form-control' size='10'></select>
					</div>
				</div>
				<div class='modal-footer'>
					<button id="btn_search_apply" class="btn btn-primary">Apply</button>
				</div>
			</div>
		</div>
	</div>

</div>

<script type="text/javascript">
$(function () {
	// search
	$('.modal').on('shown.bs.modal', function () {
		$("input[name='txt_search']").focus();
	});
	$(".fsearch").bind("click",function(){
		$('#span_modal_title').html($(this).attr('ftype'));
		$('#hid_ftype').val($(this).attr('ftype'));
		$('.modal').modal({
			backdrop: 'static'
		});
		$(".modal").modal('show');
		$("input[name='txt_search']").val('');
		$("#sel_search option").remove();

		return false;
	});
	$("input[name='txt_search']").bind("keyup",function(){
		if($("input[name='txt_search']").val().length == 0) return;

		$.ajax({
			async: false,
			type: "POST",
			url: $('#hid_baseurl').val() + 'bos/apiSearch',
			data: {
				keyword: $("input[name='txt_search']").val(),
				type: $('#hid_ftype').val()
			},
			statusCode: {
				200: function(e) {
					$('#div_modal_search').html(e);
				}
			},
			error: function() {
			}
		});
	});
	$("#btn_search_apply").bind("click",function(){
		if($('#sel_search').val() === null) return;

		$("select[otype=" + $('#hid_ftype').val() +"] option").remove();
		$("select[otype=" + $('#hid_ftype').val() +"]").append($("<option></option>").attr("value", $('#sel_search').val()).text($('#sel_search :selected').text()));
		$(".modal").modal('hide');


		//select[name=sel_client_id]
		var obj_this = $("select[name=sel_client_id]");

		$.ajax({
			type: "POST",
			url: $('#hid_baseurl').val() + 'bos/apiGetHireFactoryClientIdSel/' + $("select[name=sel_client_id]").val(),
			data: '',
			dataType: 'json',
			statusCode: {
				200: function(e) {
					$("input[name$='txt_client_addtw']").val(e[1]);
					$('#div_site_factory').html(e[1]);
				}
			},
			error: function() {
			}
		});
		//select[name=sel_employer_id]
		var obj_this = $("select[name=sel_employer_id]");

		$.ajax({
			type: "POST",
			url: $('#hid_baseurl').val() + 'bos/apiGetHireFactoryEmployerIdSel/' + $("select[name=sel_employer_id]").val(),
			data: '',
			dataType: 'json',
			statusCode: {
				200: function(e) {
					$('#div_company_web').html(e[1]);
					$('#div_company_history').html(e[2]);
					$('#div_industry_id').html(e[3]);
					$('#div_company_product').html(e[4]);
				}
			},
			error: function() {
			}
		});
	});

	$(".btn-cancel").bind("click",function(){
		window.location = '<?= base_url()?>config/country_fee';
	});	
	$("#btn_save").bind("click",function(){
		if(!$("form")[0].checkValidity()) return;

		$.ajax({
			type: "POST",
			url: $('#hid_baseurl').val() + 'config/country_fee_doEdit',
			data: $('#form1').serialize(),
			statusCode: {
				200: function() {
					window.location = '<?= base_url()?>config/country_fee';
				}
			},
			error: function() {
				alert('操作失敗');
			}
		});
	});	
})
</script>