<script src='<?= base_url()?>assets/js/fileinput.min.js'></script>
<script src='<?= base_url()?>assets/js/fileinput_locale_zh-TW.js'></script>
<script src='<?= base_url()?>assets/js/bootstrap-datetimepicker.min.js'></script>
<link href='<?= base_url()?>assets/css/fileinput.min.css' rel='stylesheet' type='text/css'/>
<link href='<?= base_url()?>assets/css/bootstrap-datetimepicker.min.css' rel='stylesheet' type='text/css'/>

<input type='hidden' id='hid_baseurl' value='<?= base_url(); ?>'>
<input type='hidden' id='hid_ftype' value=''>

<div class="container">
	<form class="form-horizontal" id='form1' onKeyDown="if(event.keyCode == 13) {return false;}">
		<input type='hidden' name='hid_id' value='<?= $id ?>'>

		<h1><?= $title ?></h1>
		<div class="form-group">
			<div class="col-sm-6">
				<label class="control-label"><?= $lang->line('sent_id') ?></label>
				<div>
<?php if (strval($id) != '0'): ?>
					<?= form_dropdown('sel_sent_id', $ary_sent_id, $info['package_title_id'], 'class="form-control"'); ?>
<?php else: ?>
					<?= form_dropdown('sel_sent_id', $ary_sent_id, '', 'class="form-control"'); ?>
<?php endif; ?>				
				</div>
			</div>
			<div class="col-sm-6">
				<label class="control-label"><?= $lang->line('1-1-1') ?></label>
				<div class="checkbox" id='div_country_id'>
<?php if (strval($id) != '0'): ?>
					<?= $ary_country[$info['country_id']] ?>
<?php else: ?>
					<?= $ary_sel_defult[1] ?>
<?php endif; ?>
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-6">
				<label class="control-label"><?= $lang->line('client') ?></label>
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
			<div class="col-sm-3">
				<label class="control-label"><?= $lang->line('date_send2') ?></label>
				<div class="checkbox" id='div_date_send'>
<?php if (strval($id) != '0'): ?>
					<?= $info['date_send'] ?>
<?php else: ?>
					<?= $ary_sel_defult[2] ?>
<?php endif; ?>				
				</div>
			</div>
			<div class="col-sm-3">
				<label class="control-label"><?= $lang->line('send_type') ?></label>
				<div class="checkbox" id='div_send_type'>
<?php if (strval($id) != '0'): ?>
					<?= $ary_sendway[$info['send_type']] ?>
<?php else: ?>
					<?= $ary_sel_defult[3] ?>
<?php endif; ?>				
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-6">
				<label class="control-label"><?= $lang->line('employer') ?></label>
				<div>
					<div class="input-group">
<?php if (strval($id) != '0'): ?>
<?php if (strval($info['employer_id']) != '-1'): ?>
					<?= form_dropdown('sel_employer_id', array($info['employer_id'] => $info['e_name_tw']), $info['employer_id'], 'class="form-control" otype="employer"'); ?>
<?php else: ?>
					<?= form_dropdown('sel_employer_id', array('-1'=>'未選取'), 0, 'class="form-control" otype="employer"'); ?>
<?php endif; ?>
<?php else: ?>
						<?= form_dropdown('sel_employer_id', array('-1'=>'未選取'), 0, 'class="form-control" otype="employer"'); ?>
<?php endif; ?>
						<div class="input-group-btn">
							<button ftype='employer' class="fsearch btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Search...</button>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-3">
				<label class="control-label"><?= $lang->line('site_send') ?></label>
				<div class="checkbox" id='div_site_send'>
<?php if (strval($id) != '0'): ?>
					<?= $ary_site_send[$info['site_send']] ?>
<?php else: ?>
					<?= $ary_sel_defult[4] ?>
<?php endif; ?>				
				</div>
			</div>
			<div class="col-sm-3">
				<label class="control-label"><?= $lang->line('receive_address') ?></label>
				<div class="checkbox" id='div_site_receive'>
<?php if (strval($id) != '0'): ?>
					<?= $ary_site_receive[$info['site_receive']] ?>
<?php else: ?>
					<?= $ary_sel_defult[5] ?>
<?php endif; ?>				
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-6">
				<label class="control-label"><?= $lang->line('letter_no') ?></label>
				<div class="checkbox" id='div_letter_no'>					
<?php if (strval($id) != '0'): ?>
					<?= form_dropdown('sel_letter_id', $ary_letter_id, $info['letter_id'], 'class="form-control"'); ?>
<?php else: ?>
					<?= form_dropdown('sel_letter_id', $ary_letter_id, '', 'class="form-control"'); ?>
<?php endif; ?>	
				</div>
			</div>
			<div class="col-sm-3">
				<label class="control-label"><?= $lang->line('letter_qty') ?></label>
				<div>
<?php if (strval($id) != '0'): ?>
					<input type="text" class="form-control" name="txt_letter_qty" value='<?= $info['letter_qty']?>' pattern="[0-9]+">
<?php else: ?>
					<input type="text" class="form-control" name="txt_letter_qty" value='' pattern="[0-9]+">
<?php endif; ?>				
				</div>
			</div>
			<div class="col-sm-3">
				<label class="control-label"><?= $lang->line('letter_qtycopy') ?></label>
				<div>
<?php if (strval($id) != '0'): ?>
					<input type="text" class="form-control" name="txt_letter_qtycopy" value='<?= $info['letter_qtycopy']?>' pattern="[0-9]+">
<?php else: ?>
					<input type="text" class="form-control" name="txt_letter_qtycopy" value='' pattern="[0-9]+">
<?php endif; ?>				
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-6">
				<label class="control-label"><?= $lang->line('5-1-2') ?></label>
				<div class="checkbox" id='div_inbound_no'>
<?php if (strval($id) != '0'): ?>
					<?= form_dropdown('sel_inbound_id', $ary_inbound_id, $info['letter_inbound_id'], 'class="form-control"'); ?>
<?php else: ?>
					<?= form_dropdown('sel_inbound_id', $ary_inbound_id, '', 'class="form-control"'); ?>
<?php endif; ?>
				</div>
			</div>
			<div class="col-sm-3">
				<label class="control-label"><?= $lang->line('letter_qty') ?></label>
				<div>
<?php if (strval($id) != '0'): ?>
					<input type="text" class="form-control" name="txt_letter_inbound_qty" value='<?= $info['letter_inbound_qty']?>' pattern="[0-9]+" >
<?php else: ?>
					<input type="text" class="form-control" name="txt_letter_inbound_qty" value='' pattern="[0-9]+" >
<?php endif; ?>				
				</div>
			</div>
			<div class="col-sm-3">
				<label class="control-label"><?= $lang->line('letter_qtycopy') ?></label>
				<div>
<?php if (strval($id) != '0'): ?>
					<input type="text" class="form-control" name="txt_letter_inbound_qtycopy" value='<?= $info['letter_inbound_qtycopy']?>' pattern="[0-9]+" >
<?php else: ?>
					<input type="text" class="form-control" name="txt_letter_inbound_qtycopy" value='' pattern="[0-9]+">
<?php endif; ?>				
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-6">
				<label class="control-label"><?= $lang->line('desc') ?></label>
				<div>
<?php if (strval($id) != '0'): ?>
					<textarea name='txt_descr' class='form-control'><?= $info['descr']?></textarea>
<?php else: ?>
					<textarea name='txt_descr' class='form-control'></textarea>
<?php endif; ?>	
				</div>
			</div>
			<div class="col-sm-6">
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-12">
				<label for="tab_exp" class='form-label'> <?= $lang->line('doc_directions') ?></label><br />
				<table class="table table-bordered table-hover table-responsive" id="tab_exp">
					<thead>
						<tr >
							<th class="text-center">#</th>
							<th class="text-center text-nowrap" width='16%'><?= $lang->line('doc_type') ?></th>
							<th class="text-center text-nowrap" width='20%'><?= $lang->line('package') ?></th>
							<th class="text-center text-nowrap" width='16%'><?= $lang->line('desc') ?></th>
							<th class="text-center text-nowrap" width='1%'><?= $lang->line('letter_qty') ?></th>
							<th class="text-center text-nowrap" width='1%'><?= $lang->line('letter_qtycopy') ?></th>
							<th class="text-center text-nowrap" width='14%'><?= $lang->line('worker_name_tw') ?></th>
							<th class="text-center text-nowrap" width='14%'><?= $lang->line('worker_name_en') ?></th>
						</tr>
					</thead>
					<tbody>
<? $row=0; ?>						
<?php if(count($ary_packageDetail_auth) > 0): ?>
<?php foreach ($ary_packageDetail_auth as $item): ?>
<? $row++;$item['row']=$row; ?>
						<tr id="<?= 'addr_exp'.($item['row'] - 1) ?>">
							<td>
								<?= ($item['row']) ?>
								<input type='hidden' name='row_exp[]' value='<?= ($item['row']) ?>'>
							</td>
							<td>
								<?= form_dropdown('type[]', $ary_pkg_detail_type, $item['type'], 'class="form-control" row="'.$item['row'].'"'); ?>
							</td>
							<td>
								<?= $item['sel_2_html'] ?>
							</td>
							<td>
								<input type="text" name='package_descr[]' value='<?= ($item['package_descr']) ?>' class="form-control" />
							</td>
							<td>
								<input type="text" name='package_qty[]' value='<?= ($item['package_qty']) ?>' class="form-control" pattern="[0-9]+" />
							</td>
							<td>
								<input type="text" name='package_qtycopy[]' value='<?= ($item['package_qtycopy']) ?>' class="form-control" pattern="[0-9]+" />
							</td>
							<td>
								<input type="text" name='name_tw[]' value='<?= ($item['name_tw']) ?>' class="form-control" maxlength="20"/>
							</td>
							<td>
								<input type="text" name='name_en[]' value='<?= ($item['name_en']) ?>' class="form-control" maxlength="20"/>
							</td>
						</tr>
<?php endforeach;?>
						<tr id='<?php echo 'addr_exp'.count($ary_packageDetail_auth) ?>'></tr>
<?php else: ?>

								<tr id='addr_exp0'>
									<td>
										1
										<input type='hidden' name='row_exp[]' value='1'>
									</td>
									<td>
										<?= form_dropdown('type[]', $ary_pkg_detail_type, '', 'class="form-control" row="1"'); ?>
									</td>
									<td>
										<?= form_dropdown('package[]', $ary_package_default, '', 'class="form-control" row="1"'); ?>
									</td>
									<td>
										<input type="text" name='package_descr[]' class="form-control" />
									</td>
									<td>
										<input type="text" name='package_qty[]' class="form-control" pattern="[0-9]+" />
									</td>
									<td>
										<input type="text" name='package_qtycopy[]' class="form-control" pattern="[0-9]+" />
									</td>
									<td>
										<input type="text" name='name_tw[]' class="form-control" maxlength="20"/>
									</td>
									<td>
										<input type="text" name='name_en[]' class="form-control" maxlength="20"/>
									</td>
								</tr>
								<tr id='addr_exp1'></tr>
<?php endif; ?>
							</tbody>
						</table>
					<a class="add_row btn btn-warning pull-left" prefix='exp'><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
					<a class="delete_row pull-right btn btn-danger" prefix='exp'><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></a>
					<div class='row mb20' ps='for_add_del_button'>
					</div>
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
	var i_exp = $("#tab_exp" + " tr").length - 2;

	$('.date').datetimepicker({
		format: 'YYYY-MM-DD',
		keepInvalid: true,
		ignoreReadonly: true,
		useCurrent: true
	});
	$(".btn-cancel").bind("click",function(){
		window.location = '<?= base_url()?>docmanage/packageDetail';
	});

	$("select[name=sel_letter_id]").bind("change",function(){
		chang_letter_id();
	});

	$("select[name='type[]']").each(function() {
		$(this).bind("change",function(){
			var obj_this = $(this);

			$.ajax({
				async: false,				
				type: "POST",
				url: $('#hid_baseurl').val() + 'docmanage/apiGetPackageDetailTypeSel/' + $(this).val(),
				data: '',
				statusCode: {
					200: function(e) {
						$("select[name='package[]'][row=" + obj_this.attr('row') + "]").html(e);
					}
				},
				error: function() {
				}
			});
		});
	});	

	$("select[name=sel_sent_id]").each(function() {
		$(this).bind("change",function(){
			var obj_this = $(this);

			$.ajax({
				async: false,
				type: "POST",
				url: $('#hid_baseurl').val() + 'docmanage/apiGetPackageDetailSentIdSel/' + $(this).val(),
				data: '',
				dataType: 'json',
				statusCode: {
					200: function(e) {
						$('#div_country_id').html(e[1]);
						$('#div_date_send').html(e[2]);
						$('#div_send_type').html(e[3]);
						$('#div_site_send').html(e[4]);
						$('#div_site_receive').html(e[5]);
					}
				},
				error: function() {
				}
			});
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
			url: $('#hid_baseurl').val() + 'docmanage/apiSearch',
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
		
		if ($('#hid_ftype').val() == 'employer') {
			$.ajax({
				async: false,
				type: "POST",
				url: $('#hid_baseurl').val() + 'docmanage/apiGetPackageDetailLetterNo',
				data: {employer_id:$('#sel_search').val()},
				statusCode: {
					200: function(e) {
						var obj = JSON.parse(e);
						$('#div_letter_no').html(obj[0]);
						$('#div_inbound_no').html(obj[1]);
					}
				},
				error: function() {
				}
			});
		}
		$("select[name=sel_letter_id]").bind("change",function(){
			chang_letter_id();
		});	

		$(".modal").modal('hide');
	});

	$("#btn_save").bind("click",function(){
		if(!$("form")[0].checkValidity()) return;

		$.ajax({
			async: false,
			type: "POST",
			url: $('#hid_baseurl').val() + 'docmanage/packageDetail_doEdit',
			data: $('#form1').serialize(),
			statusCode: {
				200: function() {
					window.location = '<?= base_url()?>docmanage/packageDetail';
				}
			},
			error: function() {
				alert('操作失敗');
			}
		});
	});
	$(".add_row").click(function() {
		var prefix = $(this).attr("prefix");
		var tmp = 'i_' +  prefix;
		var i  = eval(tmp);

		$('#addr_' + prefix + i).html($('#addr_' + prefix +'0').html());
		$('#addr_' + prefix + i).children().children().attr('row',i + 1);	// replace attr:row
		$('#addr_' + prefix + i).children().first().html((i + 1) + "<input type='hidden' name='row_" + prefix + "[]' value='" + (i + 1) + "'>");	// replace #

		$("#tab_" + prefix + " input[row=" + (i + 1) + "]").each(function() {
			$(this).val('');
		});
		$("#tab_" + prefix + " select[name='type[]'][row=" + (i + 1) + "]").each(function() {
			$(this).val($('select[name="type[]"][row=1]').val());
		});

		$('#tab_' + prefix).append('<tr id="addr_'+ prefix + (i+1)+'"></tr>');
		var str = tmp + " = " + eval(tmp) + "+1";
		eval(str);

		// bind again !!
		$("select[name='type[]']").each(function() {
			//重bind要先unbind
			$(this).unbind("change");
			$(this).bind("change",function(){
				var obj_this = $(this);

				$.ajax({
					async: false,					
					type: "POST",
					url: $('#hid_baseurl').val() + 'docmanage/apiGetPackageDetailTypeSel/' + $(this).val(),
					data: '',
					statusCode: {
						200: function(e) {
							$("select[name='package[]'][row=" + obj_this.attr('row') + "]").html(e);
						}
					},
					error: function() {
					}
				});
			});
		});	
	});
	$(".delete_row").click(function() {
		var prefix = $(this).attr("prefix");
		var tmp = 'i_' +  prefix;
		var i  = eval(tmp);

		if(i>1){
			$("#addr_" + prefix + (i-1)).html('');
			$("#addr_" + prefix + i).remove();
			var str = tmp + " = " + eval(tmp) + "-1";
			eval(str);
		}
	});
});
function chang_letter_id() {
	$.ajax({
		async: false,
		type: "POST",
		url: $('#hid_baseurl').val() + 'docmanage/apiGetPackageDetailLetterNoSel',
		data: {letter_id: $("select[name=sel_letter_id]").val()},
		statusCode: {
			200: function(e) {
				$('#div_inbound_no').html(e);
			}
		},
		error: function() {
		}
	});
}
</script>