<script src='<?= base_url()?>assets/js/fileinput.min.js'></script>
<script src='<?= base_url()?>assets/js/fileinput_locale_zh-TW.js'></script>
<link href='<?= base_url()?>assets/css/fileinput.min.css' rel='stylesheet' type='text/css'/>
<script src='<?= base_url()?>assets/js/bootstrap-datetimepicker.min.js'></script>
<link href='<?= base_url()?>assets/css/bootstrap-datetimepicker.min.css' rel='stylesheet' type='text/css'/>

<input type='hidden' id='hid_baseurl' value='<?= base_url(); ?>'>

<div class="container">
	<form class="form-horizontal" id='form1'>
		<input type='hidden' name='hid_id' value='<?= $id ?>'>
		<h1><?= $title ?></h1>
		<div class="tab-content">
			<div class="form-group">
				<div class="col-sm-6">
					<label class="control-label"><?= $lang->line('employer_id') ?></label>
					<div>
<?php if (strval($id) != '0'): ?>
						<?= $info['id'] ?>
<?php else: ?>
						<?= $lang->line('generate_system') ?>
<?php endif; ?>
					</div>
				</div>
				<div class="col-sm-6">
					<label class="control-label"><?= $lang->line('date_create')." / ".$lang->line('user_create') ?></label>
					<div>
<?php if (strval($id) != '0'): ?>
						<?= $info['date_create']." / ".$info['user_create_name'] ?>
<?php else: ?>
						<?= date("Y-m-d")." / ".$account ?>
<?php endif; ?>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-6">
					<label class="control-label"><?= $lang->line('client_name_tw') ?></label>
					<div>
<?php if (strval($id) != '0'): ?>
						<input type="text" class="form-control" name="txt_name_tw" value='<?= $info['name_tw']?>' required>
<?php else: ?>
						<input type="text" class="form-control" name="txt_name_tw" value='' required>
<?php endif; ?>
					</div>
				</div>
				<div class="col-sm-6">
					<label class="control-label"><?= $lang->line('vatnumber').' / '.$lang->line('idno')?></label>
					<div>
<?php if (strval($id) != '0'): ?>
						<input type="text" class="form-control" name="txt_taxid" value='<?= $info['taxid']?>'>
<?php else: ?>
						<input type="text" class="form-control" name="txt_taxid" value=''>
<?php endif; ?>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-6">
					<label class="control-label"><?= $lang->line('client_name_en') ?></label>
					<div>
<?php if (strval($id) != '0'): ?>
						<input type="text" class="form-control" name="txt_name_en" value='<?= $info['name_en']?>'>
<?php else: ?>
						<input type="text" class="form-control" name="txt_name_en" value=''>
<?php endif; ?>
					</div>
				</div>
				<div class="col-sm-6">
					<label class="control-label"><?= $lang->line('area_id') ?></label>
					<div>
<?php if (strval($id) != '0'): ?>
						<?= form_dropdown('sel_area_id', $ary_area, $info['area_id'], 'class="form-control"'); ?>
<?php else: ?>
						<?= form_dropdown('sel_area_id', $ary_area, '', 'class="form-control"'); ?>
<?php endif; ?>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-6">
					<label class="control-label"><?= $lang->line('alias') ?></label>
					<div>
<?php if (strval($id) != '0'): ?>
						<input type="text" class="form-control" name="txt_alias" value='<?= $info['alias']?>' required>
<?php else: ?>
						<input type="text" class="form-control" name="txt_alias" value='' required>
<?php endif; ?>
					</div>
				</div>
				<div class="col-sm-6">
					<label class="control-label"><?= $lang->line('phone') ?></label>
					<div>
<?php if (strval($id) != '0'): ?>
						<input type="text" class="form-control" name="txt_tel" value='<?= $info['tel']?>'>
<?php else: ?>
						<input type="text" class="form-control" name="txt_tel" value=''>
<?php endif; ?>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-6">
					<label class="control-label"><?= $lang->line('url') ?></label>
					<div>
<?php if (strval($id) != '0'): ?>
						<input type="text" class="form-control" name="txt_web" value='<?= $info['web']?>'>
<?php else: ?>
						<input type="text" class="form-control" name="txt_web" value=''>
<?php endif; ?>
					</div>
				</div>
				<div class="col-sm-6">
					<label class="control-label"><?= $lang->line('fax') ?></label>
					<div>
<?php if (strval($id) != '0'): ?>
						<input type="text" class="form-control" name="txt_fax" value='<?= $info['fax']?>'>
<?php else: ?>
						<input type="text" class="form-control" name="txt_fax" value=''>
<?php endif; ?>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-6">
					<label class="control-label"><?= $lang->line('tw_address') ?></label>
					<div>
<?php if (strval($id) != '0'): ?>
						<input type="text" class="form-control" name="txt_add_tw" value='<?= $info['add_tw']?>'>
<?php else: ?>
						<input type="text" class="form-control" name="txt_add_tw" value=''>
<?php endif; ?>
					</div>
				</div>
				<div class="col-sm-6">
					<label class="control-label"><?= $lang->line('1-1-10') ?></label>
					<div>
<?php if (strval($id) != '0'): ?>
						<?= form_dropdown('sel_industry_id', $ary_industry, $info['industry_id'], 'class="form-control"'); ?>
<?php else: ?>
						<?= form_dropdown('sel_industry_id', $ary_industry, '', 'class="form-control"'); ?>
<?php endif; ?>				
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-6">
					<label class="control-label"><?= $lang->line('en_address') ?></label>
					<div>
<?php if (strval($id) != '0'): ?>
						<input type="text" class="form-control" name="txt_add_en" value='<?= $info['add_en']?>'>
<?php else: ?>
						<input type="text" class="form-control" name="txt_add_en" value=''>
<?php endif; ?>
					</div>
				</div>
				<div class="col-sm-6">
					<label class="control-label"><?= $lang->line('employer_item') ?></label>
					<div>
<?php if (strval($id) != '0'): ?>
						<input type="text" class="form-control" name="txt_item" value='<?= $info['item']?>'>
<?php else: ?>
						<input type="text" class="form-control" name="txt_item" value=''>
<?php endif; ?>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-6">
					<label class="control-label"><?= $lang->line('company_history') ?></label>
					<div>
<?php if (strval($id) != '0'): ?>
						<input type="text" class="form-control" name="txt_history" value='<?= $info['history']?>'>
<?php else: ?>
						<input type="text" class="form-control" name="txt_history" value=''>
<?php endif; ?>
					</div>
				</div>
				<div class="col-sm-6">
					<label class="control-label"><?= $lang->line('company_file_path') ?></label>
					<div>
<?php if (strval($id) != '0'): ?>
						<input id="file_1" type="file" class="file-loading">
						<input name='hid_filepath1' type='hidden' value='<?= $info['file_path']?>'>
<?php else: ?>
						<input id="file_1" type="file" class="file-loading">
						<input name='hid_filepath1' type='hidden' value=''>
<?php endif; ?>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-6">
					<label class="control-label"><?= $lang->line('company_product') ?></label>
					<div>
<?php if (strval($id) != '0'): ?>
						<input type="text" class="form-control" name="txt_product" value='<?= $info['product']?>'>
<?php else: ?>
						<input type="text" class="form-control" name="txt_product" value=''>
<?php endif; ?>
					</div>
				</div>
				<div class="col-sm-6">
					<label class="control-label"><?= $lang->line('email') ?></label>
					<div>
<?php if (strval($id) != '0'): ?>
						<input type="text" class="form-control" name="txt_email" value='<?= $info['email']?>'>
<?php else: ?>
						<input type="text" class="form-control" name="txt_email" value=''>
<?php endif; ?>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-6">
					<label class="control-label"><?= $lang->line('owner_tw') ?></label>
					<div>
<?php if (strval($id) != '0'): ?>
						<input type="text" class="form-control" name="txt_owner_tw" value='<?= $info['owner_tw']?>'>
<?php else: ?>
						<input type="text" class="form-control" name="txt_owner_tw" value=''>
<?php endif; ?>
					</div>
				</div>
				<div class="col-sm-6">
					<label class="control-label"><?= $lang->line('owner_en') ?></label>
					<div>
<?php if (strval($id) != '0'): ?>
						<input type="text" class="form-control" name="txt_owner_en" value='<?= $info['owner_en']?>'>
<?php else: ?>
						<input type="text" class="form-control" name="txt_owner_en" value=''>
<?php endif; ?>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-6">
					<label class="control-label"><?= $lang->line('birthday') ?></label>
					<div>
						<div class='input-group date'>
<?php if (strval($id) != '0'): ?>
							<input type="text" class="form-control" name="txt_birthday" value='<?= $info['birthday']?>'required readonly>
<?php else: ?>
							<input type="text" class="form-control" name="txt_birthday" value=''required readonly>
<?php endif; ?>	
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<label class="control-label"><?= $lang->line('desc') ?></label>
					<div>
<?php if (strval($id) != '0'): ?>
						<input type="text" class="form-control" name="txt_descr" value='<?= $info['descr']?>'>
<?php else: ?>
						<input type="text" class="form-control" name="txt_descr" value=''>
<?php endif; ?>
					</div>					
				</div>
			</div>			
		</div>
		<br>
		<label class="control-label"><?= $lang->line('contact') ?></label>
		<div class="form-group">
			<div class="col-sm-12">
				<table class="table table-bordered table-hover table-responsive" id="tab_employerContact">
					<thead>
						<tr >
							<th class="text-center">#</th>
							<th class="text-center text-nowrap"><?= $lang->line('name_tw')."/".$lang->line('name_en') ?></th>
							<th class="text-center text-nowrap"><?= $lang->line('jobtitle')."(".$lang->line('family').")/".$lang->line('alias') ?></th>
							<th class="text-center text-nowrap"><?= $lang->line('phone')."/".$lang->line('cellphone') ?></th>
							<th class="text-center text-nowrap"><?= $lang->line('email')."/".$lang->line('skype') ?></th>
							<th class="text-center text-nowrap"><?= $lang->line('birthday')."/".$lang->line('favor') ?></th>
							<th class="text-center text-nowrap"><?= $lang->line('desc') ?></th>
						</tr>
					</thead>
					<tbody>
<?php if(count($ary_employerContact) > 0): ?>
<?php foreach ($ary_employerContact as $item): ?>
						<tr id="<?= 'addr_employerContact'.($item['row'] - 1) ?>">
							<td>
								<?= ($item['row']) ?>
								<input type='hidden' name='row_employerContact[]' value='<?= ($item['row']) ?>'>
							</td>
							<td>
								<input type="text" name='name_tw[]' value='<?= ($item['name_tw']) ?>' class="form-control" />
								<input type="text" name='name_en[]' value='<?= ($item['name_en']) ?>' class="form-control" />
							</td>
							<td>
								<input type="text" name='jobtitle[]' value='<?= ($item['jobtitle']) ?>' class="form-control" />
								<input type="text" name='alias[]' value='<?= ($item['alias']) ?>' class="form-control" />
							</td>
							<td>
								<input type="text" name='tel[]' value='<?= ($item['tel']) ?>' class="form-control" />
								<input type="text" name='cellphone[]' value='<?= ($item['cellphone']) ?>' class="form-control" />
							</td>
							<td>
								<input type="text" name='email[]' value='<?= ($item['email']) ?>' class="form-control" />
								<input type="text" name='skype[]' value='<?= ($item['skype']) ?>' class="form-control" />
							</td>
							<td>
								<div class='input-group date' id='datetimepicker'>
									<input type="text" class="form-control" name="birthday[]" value='<?= ($item['birthday']) ?>' readonly>
									<span class="input-group-addon">
										<span class="glyphicon glyphicon-calendar"></span>
									</span>
								</div>
								<input type="text" name='favor[]' value='<?= ($item['favor']) ?>' class="form-control" />
							</td>
							<td>
								<textarea name='descr[]' class='form-control'><?= $item['descr']?></textarea>								
							</td>
						</tr>
<?php endforeach;?>
						<tr id='<?php echo 'addr_employerContact'.count($ary_employerContact) ?>'></tr>
<?php else: ?>
						<tr id='addr_employerContact0'>
							<td>
								1
								<input type='hidden' name='row_employerContact[]' value='1'>
							</td>
							<td>
								<input type="text" name='name_tw[]' class="form-control" />
								<input type="text" name='name_en[]' class="form-control" />
							</td>
							<td>
								<input type="text" name='jobtitle[]' class="form-control" />
								<input type="text" name='alias[]' class="form-control" />
							</td>
							<td>
								<input type="text" name='tel[]' class="form-control" />
								<input type="text" name='cellphone[]' class="form-control" />
							</td>
							<td>
								<input type="text" name='email[]' class="form-control" />
								<input type="text" name='skype[]' class="form-control" />
							</td>
							<td>
								<div class='input-group date' id='datetimepicker'>
									<input type="text" class="form-control" name="birthday[]" value='' readonly>
									<span class="input-group-addon">
										<span class="glyphicon glyphicon-calendar"></span>
									</span>
								</div>
								<input type="text" name='favor[]' class="form-control" />
							</td>
							<td>
								<textarea name='descr[]' class='form-control'></textarea>
							</td>
						</tr>
						<tr id='addr_employerContact1'></tr>
<?php endif; ?>
					</tbody>
				</table>
				<a class="add_row btn btn-warning pull-left" prefix='employerContact'><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
				<a class="delete_row pull-right btn btn-danger" prefix='employerContact'><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></a>
				<div class='row mb20' ps='for_add_del_button'>
				</div>
			</div>
		</div>		
	</form>
	<button id="btn_save" class="btn btn-primary">Save</button>
	<button class="btn btn-default btn-cancel">Cancel</button>	
</div>

<script type="text/javascript">
$(function () {
	var i_employerContact = $("#tab_employerContact" + " tr").length - 2;

	$('.date').datetimepicker({
		format: 'YYYY-MM-DD',
		keepInvalid: true,
		ignoreReadonly: true,
		useCurrent: true
	});	

	$('#file_1').fileinput({
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

	$('#file_1').on('fileuploaded', function(event, data, previewId, index) {
		var response = data.response;
		$('input[name=hid_filepath1]').val(response.new_name);
	});

	$(".btn-cancel").bind("click",function(){
		window.location = '<?= base_url()?>crm/employer';
	});	
	$("#btn_save").bind("click",function(){
		if(!$("form")[0].checkValidity()) return;

		$.ajax({
			async: false,
			type: "POST",
			url: $('#hid_baseurl').val() + 'crm/employer_doEdit',
			data: $('#form1').serialize(),
			statusCode: {
				200: function() {
					window.location = '<?= base_url()?>crm/employer';
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

		$("#tab_" + prefix + " textarea[row=" + (i + 1) + "]").each(function() {
			$(this).html('');
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

});
</script>