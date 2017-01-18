<input type='hidden' id='hid_baseurl' value='<?= base_url(); ?>'>
<input type='hidden' id='hid_ftype' value=''>

<div class="container">
	<form class="form-horizontal">
		<h1><?= $title ?></h1>
		<div class='row vertical-align'>
			<div class='col-md-6'>
				<label class="control-label"><?= $lang->line('1-1-1') ?></label>
				<div>
					<?= form_dropdown('sel_country', $ary_country, '', 'class="form-control"'); ?>
				</div>
				<label class="control-label"><?= $lang->line('worker_kind') ?></label>
				<div>
					<?= form_dropdown('sel_worker_kind', $ary_worker_kind, '', 'class="form-control"'); ?>
				</div>
				<label class="control-label"><?= $lang->line('worker_type_major') ?></label>
				<div>
					<?= form_dropdown('sel_worker_type_major', $ary_worker_type_major, '', 'class="form-control"'); ?>
				</div>
				<label class="control-label"><?= $lang->line('sales_id') ?></label>
				<div>
					<?= form_dropdown('sel_sales_id', $ary_emp, '', 'class="form-control"'); ?>		
				</div>
				<label class="control-label"><?= $lang->line('service_id') ?></label>
				<div>
					<?= form_dropdown('sel_service_id', $ary_emp, '', 'class="form-control"'); ?>
				</div>
				<label class="control-label"><?= $lang->line('status') ?></label>
				<div>
					<?= form_dropdown('sel_status', $ary_status, '', 'class="form-control"'); ?>
				</div>
				
				<label class="control-label"><?= $lang->line('client') ?></label>
				<div class="input-group">
					<select otype="client" class="form-control" name="sel_client_id">
						<option value="-1">未選取</option>
					</select>
					<div class="input-group-btn">
						<button class="fsearch btn btn-primary" ftype="client"><span aria-hidden="true" class="glyphicon glyphicon-search"></span> Search...</button>
					</div>
				</div>
				<label class="control-label"><?= $lang->line('employer') ?></label>
				<div class="input-group">
					<select otype="employer" class="form-control" name="sel_employer">
						<option value="-1">未選取</option>
					</select>
					<div class="input-group-btn">
						<button class="fsearch btn btn-primary" ftype="employer"><span aria-hidden="true" class="glyphicon glyphicon-search"></span> Search...</button>
					</div>
				</div>

			</div>
			<div class='col-md-6 text-center'>
				<button type="button" class="btn btn-success btn-lg export" rpttype="doc3">
				<span class="glyphicon glyphicon-share" aria-hidden="true"></span> Export
				</button>
			</div>
		</div>
	</form>

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
	$(".export").bind("click",function(){
		var url = <?= "'".base_url()."'"; ?> + 'report/' + $(this).attr('rpttype');

		$.ajax({
			async: false,
			type: "POST",
			url: url,
			data: $(this).parents('form:first').serialize(),
			success: function(response){
				window.location.href = response.url;
			},
			error: function() {
			}
		});
	});

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
			url: $('#hid_baseurl').val() + 'crm/apiSearch',
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
	});
});
</script>