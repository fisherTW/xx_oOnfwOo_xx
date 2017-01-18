<script src='<?= base_url()?>assets/js/fileinput.min.js'></script>
<script src='<?= base_url()?>assets/js/fileinput_locale_zh-TW.js'></script>
<script src='<?= base_url()?>assets/js/bootstrap-datetimepicker.min.js'></script>
<script src='<?= base_url()?>assets/js/bootstrap-table.min.js'></script>
<link href='<?= base_url()?>assets/css/fileinput.min.css' rel='stylesheet' type='text/css'/>
<link href='<?= base_url()?>assets/css/bootstrap-datetimepicker.min.css' rel='stylesheet' type='text/css'/>
<link href='<?= base_url()?>assets/css/bootstrap-table.min.css' rel='stylesheet' type='text/css'/>

<input type='hidden' id='hid_baseurl' value='<?= base_url(); ?>'>

<div class="container">
	<form class="form-horizontal" id='form1'>
		<input type='hidden' name='hid_id' value='<?= $id ?>'>

		<h1><?= $title ?></h1>
		<!-- Nav tabs -->
		<ul class="nav nav-tabs" role="tablist">
			<li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab"><?= $lang->line('sent_info') ?></a></li>
			<li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"><?= $lang->line('receive_info') ?></a></li>
		</ul>
		<!-- Tab panes -->
		<div class="tab-content">
			<!-- Tab 1 -->
			<div role="tabpanel" class="tab-pane active" id="home">
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('sent_id') ?></label>
						<div class="checkbox">
<?php if (strval($id) != '0'): ?>
							<?= $info['id'] ?>
<?php else: ?>
							<?= $lang->line('generate_system') ?>
<?php endif; ?>				
						</div>
					</div>
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('date_send2') ?></label>
					<div>
<?php if (strval($id) != '0'): ?>
						<div class='input-group date' id='datetimepicker2'>
							<input type="text" class="form-control" name="txt_date_send" value='<?= $info['date_send']?>' pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" required readonly>
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>
<?php else: ?>
						<div class='input-group date' id='datetimepicker2'>
							<input type="text" class="form-control" name="txt_date_send" value='' pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" required readonly>
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>
<?php endif; ?>	
					</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('1-1-1') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<?= form_dropdown('sel_country', $ary_country, $info['country_id'], 'class="form-control"'); ?>
<?php else: ?>
							<?= form_dropdown('sel_country', $ary_country, '', 'class="form-control"'); ?>
<?php endif; ?>				
						</div>
					</div>
					<div class="col-sm-6">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('send_type') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<?= form_dropdown('sel_send_type', $ary_sendway, $info['send_type'], 'class="form-control"'); ?>
<?php else: ?>
							<?= form_dropdown('sel_send_type', $ary_sendway, 1, 'class="form-control"'); ?>
<?php endif; ?>				
						</div>
					</div>
					<div class="col-sm-6">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('site_send') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<?= form_dropdown('sel_site_send', $ary_site_send, $info['site_send'], 'class="form-control"'); ?>
<?php else: ?>
							<?= form_dropdown('sel_site_send', $ary_site_send, 1, 'class="form-control"'); ?>
<?php endif; ?>	
						</div>
					</div>
					<div class="col-sm-6">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('receive_address') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<?= form_dropdown('sel_site_receive', $ary_site_receive, $info['site_receive'], 'class="form-control"'); ?>
<?php else: ?>
							<?= form_dropdown('sel_site_receive', $ary_site_receive, 1, 'class="form-control"'); ?>
<?php endif; ?>			
						</div>
					</div>
					<div class="col-sm-6">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-3">
						<label class="control-label"><?= $lang->line('user_send') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<input type="text" class="form-control" name="txt_user_send" value='<?= $info['user_send']?>' required>
<?php else: ?>
							<input type="text" class="form-control" name="txt_user_send" value='' required>
<?php endif; ?>				
						</div>
					</div>
					<div class="col-sm-3">
						<label class="control-label"><?= $lang->line('express') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<input type="text" class="form-control" name="txt_express" value='<?= $info['express']?>'>
<?php else: ?>
							<input type="text" class="form-control" name="txt_express" value=''>
<?php endif; ?>				
						</div>
					</div>
					<div class="col-sm-3">
						<label class="control-label"><?= $lang->line('water_no') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<input type="text" class="form-control" name="txt_water_no" value='<?= $info['water_no']?>'>
<?php else: ?>
							<input type="text" class="form-control" name="txt_water_no" value=''>
<?php endif; ?>				
						</div>
					</div>
					<div class="col-sm-3">
						<label class="control-label"><?= $lang->line('user_bring') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<input type="text" class="form-control" name="txt_user_bring" value='<?= $info['user_bring']?>'>
<?php else: ?>
							<input type="text" class="form-control" name="txt_user_bring" value=''>
<?php endif; ?>				
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-3">
						<label class="control-label"><?= $lang->line('user_receive') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<input type="text" class="form-control" name="txt_user_receive" value='<?= $info['user_receive']?>' required>
<?php else: ?>
							<input type="text" class="form-control" name="txt_user_receive" value='' required>
<?php endif; ?>				
						</div>
					</div>
					<div class="col-sm-9">
						<label class="control-label"><?= $lang->line('address_receive') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<input type="text" class="form-control" name="txt_address_receive" value='<?= $info['address_receive']?>'>
<?php else: ?>
							<input type="text" class="form-control" name="txt_address_receive" value=''>
<?php endif; ?>				
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('upload_signfile') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<input id="file" type="file" class="file-loading">
							<input name='hid_filepath' type='hidden' value='<?= $info['file_path']?>'>
<?php else: ?>
							<input id="file" type="file" class="file-loading">
							<input name='hid_filepath' type='hidden' value=''>
<?php endif; ?>			
						</div>
					</div>
				</div>				
				<div class="form-group">
					<div class="col-sm-12">
						<label for="tab_exp" class='form-label'> <?= $lang->line('5-1-3') ?></label><br />
						<table id='tblmain' class="table table-bordered table-hover table-responsive">
						</table>
					</div>
				</div>
			</div>
			<!-- tab 2 -->
			<div role="tabpanel" class="tab-pane" id="profile">
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('user_check') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<input type="text" class="form-control" name="txt_user_check" value='<?= $info['user_check']?>'>
<?php else: ?>
							<input type="text" class="form-control" name="txt_user_check" value=''>
<?php endif; ?>	
						</div>
					</div>
					<div class="col-sm-6">
					</div>
				</div>	
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('date_receive') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<div class='input-group date' id='datetimepicker2'>
								<input type="text" class="form-control" name="txt_date_receive" value='<?= $info['date_receive']?>' readonly>
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-calendar"></span>
								</span>
							</div>
<?php else: ?>
							<div class='input-group date' id='datetimepicker2'>
								<input type="text" class="form-control" name="txt_date_receive" value='' readonly>
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-calendar"></span>
								</span>
							</div>
<?php endif; ?>	
						</div>
					</div>
					<div class="col-sm-6">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('site_paper') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<?= form_dropdown('sel_site_paper', $ary_site_paper, $info['site_paper'], 'class="form-control"'); ?>
<?php else: ?>
							<?= form_dropdown('sel_site_paper', $ary_site_paper, 1, 'class="form-control"'); ?>
<?php endif; ?>					
						</div>
					</div>
					<div class="col-sm-6">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('sign_receive') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<input id="file_2" type="file" class="file-loading2">
							<input name='hid_filepath2' type='hidden' value='<?= $info['file_path2']?>'>
<?php else: ?>
							<input id="file_2" type="file" class="file-loading2">
							<input name='hid_filepath2' type='hidden' value=''>
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
			</div>
		</div>
	</form>

	<button id="btn_save" class="btn btn-primary">Save</button>
	<button class="btn btn-default btn-cancel">Cancel</button>
</div>

<script type="text/javascript">
$(function () {
	var i_exp = $("#tab_exp" + " tr").length - 2;

	$('#file').fileinput({
		showPreview: false,
		language: "zh-TW",
		uploadUrl: '<?= base_url()?>upload/do_upload',
		allowedFileExtensions: ["jpg","jpeg","gif","png","pdf"],
<?php if((strval($id) != '0') && (strlen($info['file_path'])) > 0): ?>
		initialCaption: "<?= $info['file_path']?>",
<?php endif; ?>	
		uploadExtraData: function() {
			var obj = {};
			$('.file-loading').each(function() {
				var id = $(this).attr('id');
				obj['file_for'] = id;
				obj['func'] = 'create';
			});
			return obj;
		}
	});
	$('#file').on('fileuploaded', function(event, data, previewId, index) {
		var response = data.response;
		$('input[name=hid_filepath]').val(response.new_name);
	});	
	$('#file_2').fileinput({
		showPreview: false,
		language: "zh-TW",
		uploadUrl: '<?= base_url()?>upload/do_upload',
		allowedFileExtensions: ["jpg","jpeg","gif","png","pdf"],
<?php if((strval($id) != '0') && (strlen($info['file_path2'])) > 0): ?>
		initialCaption: "<?= $info['file_path2']?>",
<?php endif; ?>	
		uploadExtraData: function() {
			var obj = {};
			$('.file-loading2').each(function() {
				var id = $(this).attr('id');
				obj['file_for'] = id;
				obj['func'] = 'create';
			});
			return obj;
		}
	});
	$('#file_2').on('fileuploaded', function(event, data, previewId, index) {
		var response = data.response;
		$('input[name=hid_filepath2]').val(response.new_name);
	});	

	$('.date').datetimepicker({
		format: 'YYYY-MM-DD',
		keepInvalid: true,
		ignoreReadonly: true,
		useCurrent: true
	});
	$(".btn-cancel").bind("click",function(){
		window.location = '<?= base_url()?>docmanage/packageTitle';
	});	
	$("#btn_save").bind("click",function(){
		if(!$("form")[0].checkValidity()) return;

		$.ajax({
			type: "POST",
			url: $('#hid_baseurl').val() + 'docmanage/packageTitle_doEdit',
			data: $('#form1').serialize(),
			statusCode: {
				200: function() {
					window.location = '<?= base_url()?>docmanage/packageTitle';
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

		$('#tab_' + prefix).append('<tr id="addr_'+ prefix + (i+1)+'"></tr>');
		var str = tmp + " = " + eval(tmp) + "+1";
		eval(str);

		$('.date').datetimepicker({
			format: 'YYYY-MM-DD',
			keepInvalid: true,
			ignoreReadonly: true,
			useCurrent: true
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
	$('#tblmain').bootstrapTable({
		toggle:"table",
		idField: 'id',
		url: '<?= base_url()?>docmanage/apiGetPackageDetailBypkgtitleid/<?= ((strval($id) != "0") ? $info["id"]:"") ?>',
		sortName:"client_id",
		sortOrder:"asc",
		selectItemName:"toolbar1",
		sidePagination:"client",
		pagination:"true",
		pageSize: 10,
		pageList:"[10, 50, 100]",
		columns: [{
			field:'c_name_tw' ,
			title: "<?= $lang->line('client') ?>",
			halign:"center" ,
			align:"left" ,
			width:"20%",
			class:"text-nowrap"
		},{
			field:'e_name_tw' ,
			title: "<?= $lang->line('employer') ?>",
			halign:"center" ,
			align:"left" ,
			width:"20%",
			class:"text-nowrap"
		},{
			field:'letter_no' ,
			title: "<?= $lang->line('letter_no') ?>",
			halign:"center" ,
			align:"left" ,
			width:"20%",
			class:"text-nowrap"
		},{
			field:'letter_qty' ,
			title: "<?= $lang->line('letter_qty') ?>",
			halign:"center" ,
			align:"left" ,
			width:"5%",
			class:"text-nowrap"
		},{
			field:'letter_qtycopy' ,
			title: "<?= $lang->line('letter_qtycopy') ?>",
			halign:"center" ,
			align:"left" ,
			width:"5%",
			class:"text-nowrap"
		},{				
			field:'letter_inbound_no' ,
			title: "<?= $lang->line('5-1-2') ?>",
			halign:"center" ,
			align:"left" ,
			width:"20%",
			class:"text-nowrap"
		},{
			field:'letter_inbound_qty' ,
			title: "<?= $lang->line('letter_qty') ?>",
			halign:"center" ,
			align:"left" ,
			width:"5%",
			class:"text-nowrap"
		},{
			field:'letter_inbound_qtycopy' ,
			title: "<?= $lang->line('letter_qtycopy') ?>",
			halign:"center" ,
			align:"left" ,
			width:"5%",
			class:"text-nowrap"		
		}]
	});
});

</script>