<script src='<?= base_url()?>assets/js/fileinput.min.js'></script>
<script src='<?= base_url()?>assets/js/fileinput_locale_zh-TW.js'></script>
<script src='<?= base_url()?>assets/js/bootstrap-datetimepicker.min.js'></script>
<link href='<?= base_url()?>assets/css/fileinput.min.css' rel='stylesheet' type='text/css'/>
<link href='<?= base_url()?>assets/css/bootstrap-datetimepicker.min.css' rel='stylesheet' type='text/css'/>

<input type='hidden' id='hid_baseurl' value='<?= base_url(); ?>'>
<input type='hidden' id='hid_ftype' value=''>
<input type='hidden' id='hid_frow' value=''>

<div class="container">
	<form class="form-horizontal" id='form1'>
		<input type='hidden' name='hid_id' value='<?= $id ?>'>

		<h1><?= $title ?></h1>
		<!-- Nav tabs -->
		<ul class="nav nav-tabs" role="tablist">
			<li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab"><?= $lang->line('mainpage') ?></a></li>
			<li role="presentation"><a href="#clientContact" aria-controls="clientContact" role="tab" data-toggle="tab"><?= $lang->line('contact') ?></a></li>
			<li role="presentation"><a href="#clientDescr" aria-controls="clientDescr" role="tab" data-toggle="tab"><?= $lang->line('client_desc') ?></a></li>
			<li role="presentation"><a href="#clientPayment" aria-controls="clientPayment" role="tab" data-toggle="tab"><?= $lang->line('payment') ?></a></li>
			<li role="presentation"><a href="#clientLicese" aria-controls="clientLicese" role="tab" data-toggle="tab"><?= $lang->line('client_licese') ?></a></li>
			<li role="presentation"><a href="#clientRelation" aria-controls="clientRelation" role="tab" data-toggle="tab"><?= $lang->line('client_elation') ?></a></li>
		</ul>
		<!-- Tab panes -->
		<div class="tab-content">
			<!-- Tab 1 -->
			<div role="tabpanel" class="tab-pane active" id="home">
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('client_id') ?></label>
						<div class="checkbox">
<?php if (strval($id) != '0'): ?>
							<?= $info['id'] ?>
<?php else: ?>
							<?= $lang->line('generate_system') ?>
<?php endif; ?>				
						</div>
					</div>
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('date_create') ?></label>
						<div class="checkbox">
<?php if (strval($id) != '0'): ?>
							<?= $info['date_create'] ?>
<?php else: ?>
							<?= date("Y-m-d") ?>
<?php endif; ?>				
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('liense') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<input type="text" class="form-control" name="txt_license" value='<?= $info['license']?>' pattern="[0-9\-]+" required>
<?php else: ?>
							<input type="text" class="form-control" name="txt_license" value='' pattern="[0-9\-]+" required>
<?php endif; ?>				
						</div>
					</div>
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('user_create') ?></label>
						<div class="checkbox">
<?php if (strval($id) != '0'): ?>
							<?= $info['user_create_name'] ?>
<?php else: ?>
							<?= $account ?>
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
						<label class="control-label"><?= $lang->line('date_client') ?></label>
						<div class="checkbox">
<?php if (strval($id) != '0'): ?>
<?php if (strval($info['date_client']) == '0000-00-00'): ?>
							<?= $lang->line('generate_system') ?>
							<label>
								<input type="checkbox" value="1" name="is_client"><?= $lang->line('is_client') ?><br>
							</label>
<?php else: ?>
							<?= $info['date_client'] ?>
<?php endif; ?>							
<?php else: ?>
							<?= $lang->line('generate_system') ?>
							<label>
								<input type="checkbox" value="1" name="is_client"><?= $lang->line('is_client') ?><br>
							</label>
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
						<label class="control-label"><?= $lang->line('client_file_path') ?></label>
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
						<label class="control-label"><?= $lang->line('vatnumber') ?></label>
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
						<label class="control-label"><?= $lang->line('qty_year') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<input type="text" class="form-control" name="txt_qty_year" value='<?= $info['qty_year']?>'>
<?php else: ?>
							<input type="text" class="form-control" name="txt_qty_year" value=''>
<?php endif; ?>				
						</div>
					</div>
				</div>
				<div class="form-group">
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
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('sales_id') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<?= form_dropdown('sel_sales_id', $ary_sales, $info['sales_id'], 'class="form-control"'); ?>
<?php else: ?>
							<?= form_dropdown('sel_sales_id', $ary_sales, '', 'class="form-control"'); ?>
<?php endif; ?>				
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('email') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<textarea class="form-control" name="txt_email" required><?= $info['email']?></textarea>
<?php else: ?>
							<textarea class="form-control" name="txt_email" placeholder="多筆資料請換行" required></textarea>
<?php endif; ?>				
						</div>
					</div>
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('service_id') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<?= form_dropdown('sel_service_id', $ary_service, $info['service_id'], 'class="form-control"'); ?>
<?php else: ?>
							<?= form_dropdown('sel_service_id', $ary_service, '', 'class="form-control"'); ?>
<?php endif; ?>				
						</div>
					</div>
				</div>
			</div>
			<!-- Tab 2 -->
			<div role="tabpane1" class="tab-pane" id="clientContact">
				<div class="form-group">
					<div class="col-sm-12">
						<table class="table table-bordered table-hover table-responsive" id="tab_clientContact">
							<thead>
								<tr >
									<th class="text-center">#</th>
									<th class="text-center text-nowrap"><?= $lang->line('name_tw')."/".$lang->line('name_en') ?></th>
									<th class="text-center text-nowrap"><?= $lang->line('jobtitle')."/".$lang->line('alias') ?></th>
									<th class="text-center text-nowrap"><?= $lang->line('phone')."/".$lang->line('cellphone') ?></th>
									<th class="text-center text-nowrap"><?= $lang->line('email')."/".$lang->line('skype') ?></th>
									<th class="text-center text-nowrap"><?= $lang->line('birthday')."/".$lang->line('favor') ?></th>
									<th class="text-center text-nowrap"><?= $lang->line('desc')."/".$lang->line('is_account') ?></th>
								</tr>
							</thead>
							<tbody>
<?php if(count($ary_clientContact) > 0): ?>
<?php foreach ($ary_clientContact as $item): ?>
								<tr id="<?= 'addr_clientContact'.($item['row'] - 1) ?>">
									<td>
										<?= ($item['row']) ?>
										<input type='hidden' name='row_clientContact[]' value='<?= ($item['row']) ?>'>
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
										<input type="text" name='descr[]' value='<?= ($item['descr']) ?>' class="form-control" />
										<div class='checkbox'>
											<label>											
												<input type="checkbox" value='<?= $item['row'] ?>' name='is_account[]' <?= $item['is_account'] == '1' ? 'checked="checked"' : '' ?>/><?= $lang->line('is_account') ?>
											</label>
										</div>
									</td>
								</tr>
<?php endforeach;?>
								<tr id='<?php echo 'addr_clientContact'.count($ary_clientContact) ?>'></tr>
<?php else: ?>
								<tr id='addr_clientContact0'>
									<td>
										1
										<input type='hidden' name='row_clientContact[]' value='1'>
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
										<input type="text" name='descr[]' class="form-control" />
										<div class='checkbox'>
											<label>
												<input type="checkbox" value="1"  name='is_account[]' /><?= $lang->line('is_account') ?>
											</label>
										</div>
									</td>
								</tr>
								<tr id='addr_clientContact1'></tr>
<?php endif; ?>
							</tbody>
						</table>
						<a class="add_row btn btn-warning pull-left" prefix='clientContact'><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
						<a class="delete_row pull-right btn btn-danger" prefix='clientContact'><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></a>
						<div class='row mb20' ps='for_add_del_button'>
						</div>
					</div>
				</div>
			</div>				
			<!-- Tab 3 -->
			<div role="tabpanel" class="tab-pane" id="clientDescr">
				<div class="form-group">
					<div class="col-sm-12">
						<table class="table table-bordered table-hover table-responsive" id="tab_clientDescr">
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th class="text-center text-nowrap"><?= $lang->line('date') ?></th>
									<th class="text-center text-nowrap"><?= $lang->line('deatil') ?></th>
									<th class="text-center text-nowrap"><?= $lang->line('desc') ?></th>
								</tr>
							</thead>
							<tbody>
<?php if(count($ary_clientDescr) > 0): ?>
<?php foreach ($ary_clientDescr as $item): ?>
								<tr id="<?= 'addr_clientDescr'.($item['row'] - 1) ?>">
									<td>
										<?= ($item['row']) ?>
										<input type='hidden' name='row_clientDescr[]' value='<?= ($item['row']) ?>'>
									</td>
									<td>
										<div class='input-group date' id='datetimepicker'>
											<input type="text" class="form-control" name="date_clientDescr[]" value='<?= ($item['date']) ?>' pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" required readonly>
											<span class="input-group-addon">
												<span class="glyphicon glyphicon-calendar"></span>
											</span>
										</div>
									</td>
									<td>
										<input type="text" name='detail_clientDescr[]' value='<?= ($item['detail']) ?>' class="form-control" />
									</td>
									<td>
										<input type="text" name='descr_clientDescr[]' value='<?= ($item['descr']) ?>' class="form-control" />
									</td>
								</tr>
<?php endforeach;?>
								<tr id='<?php echo 'addr_clientDescr'.count($ary_clientDescr) ?>'></tr>
<?php else: ?>
								<tr id='addr_clientDescr0'>
									<td>
										1
										<input type='hidden' name='row_clientDescr[]' value='1'>
									</td>
									<td>
										<div class='input-group date' id='datetimepicker'>
											<input type="text" class="form-control" name="date_clientDescr[]" value='' pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" required readonly>
											<span class="input-group-addon">
												<span class="glyphicon glyphicon-calendar"></span>
											</span>
										</div>
									</td>
									<td>
										<input type="text" name='detail_clientDescr[]' class="form-control" />
									</td>
									<td>
										<input type="text" name='descr_clientDescr[]' class="form-control" />
									</td>
								</tr>
								<tr id='addr_clientDescr1'></tr>
<?php endif; ?>
							</tbody>
						</table>
						<a class="add_row btn btn-warning pull-left" prefix='clientDescr'><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
						<a class="delete_row pull-right btn btn-danger" prefix='clientDescr'><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></a>
						<div class='row mb20' ps='for_add_del_button'>
						</div>
					</div>
				</div>
			</div>
			<!-- Tab 4 -->
			<div role="tabpanel" class="tab-pane" id="clientPayment">
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('payment_condition') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<?= form_dropdown('sel_payment', $ary_payment, $info['payment'], 'class="form-control"'); ?>
<?php else: ?>
							<?= form_dropdown('sel_payment', $ary_payment, '', 'class="form-control"'); ?>
<?php endif; ?>				
						</div>
					</div>
					<div class="col-sm-6">
					</div>
				</div>
				<label class="control-label"><?= $lang->line('typeacc') ?></label>
				<br>
				<br>
				<label class="control-label"><?= $lang->line('acc_bank_tw') ?></label>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('acc_bank') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<input type="text" class="form-control" name="txt_acc_bank_tw" value='<?= $info['acc_bank_tw']?>'>
<?php else: ?>
							<input type="text" class="form-control" name="txt_acc_bank_tw" value=''>
<?php endif; ?>		
						</div>
					</div>
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('acc_fee') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<label class="radio-inline">
								<input type="radio" name="rdo_acc_fee_tw" id="" value=1 <?= $info['acc_fee_tw'] == 1 ? 'checked' : '' ?>> <?= $lang->line('acc_feei') ?>
							</label>
							<label class="radio-inline">
								<input type="radio" name="rdo_acc_fee_tw" id="" value=2 <?= $info['acc_fee_tw'] == 2 ? 'checked' : '' ?>> <?= $lang->line('acc_feeo') ?>
							</label>
<?php else: ?>
							<label class="radio-inline">
								<input type="radio" name="rdo_acc_fee_tw" id="" value=1 checked> <?= $lang->line('acc_feei') ?>
							</label>
							<label class="radio-inline">
								<input type="radio" name="rdo_acc_fee_tw" id="" value=2> <?= $lang->line('acc_feeo') ?>
							</label>
<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('accountname') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<input type="text" class="form-control" name="txt_acc_name_tw" value='<?= $info['acc_name_tw']?>'>
<?php else: ?>
							<input type="text" class="form-control" name="txt_acc_name_tw" value=''>
<?php endif; ?>		
						</div>
					</div>
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('acc_filepath') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<input id="file_acctw" type="file" class="file-loading">
							<input name='hid_filepathacctw' type='hidden' value='<?= $info['acc_file_path_tw']?>'>
<?php else: ?>
							<input id="file_acctw" type="file" class="file-loading">
							<input name='hid_filepathacctw' type='hidden' value=''>
<?php endif; ?>	
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('accountnumber') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<input type="text" class="form-control" name="txt_acc_no_tw" value='<?= $info['acc_no_tw']?>'>
<?php else: ?>
							<input type="text" class="form-control" name="txt_acc_no_tw" value=''>
<?php endif; ?>		
						</div>
					</div>
					<div class="col-sm-6">
					</div>
				</div>
				<br>
				<label class="control-label"><?= $lang->line('acc_bank_en') ?></label>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('acc_bank') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<input type="text" class="form-control" name="txt_acc_bank_en" value='<?= $info['acc_bank_en']?>'>
<?php else: ?>
							<input type="text" class="form-control" name="txt_acc_bank_en" value=''>
<?php endif; ?>		
						</div>
					</div>
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('acc_fee') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<label class="radio-inline">
								<input type="radio" name="rdo_acc_fee_en" id="" value=1 <?= $info['acc_fee_en'] == 1 ? 'checked' : '' ?>> <?= $lang->line('acc_feei') ?>
							</label>
							<label class="radio-inline">
								<input type="radio" name="rdo_acc_fee_en" id="" value=2 <?= $info['acc_fee_en'] == 2 ? 'checked' : '' ?>> <?= $lang->line('acc_feeo') ?>
							</label>
<?php else: ?>
							<label class="radio-inline">
								<input type="radio" name="rdo_acc_fee_en" id="" value=1 checked> <?= $lang->line('acc_feei') ?>
							</label>
							<label class="radio-inline">
								<input type="radio" name="rdo_acc_fee_en" id="" value=2> <?= $lang->line('acc_feeo') ?>
							</label>
<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('accountname') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<input type="text" class="form-control" name="txt_acc_name_en" value='<?= $info['acc_name_en']?>'>
<?php else: ?>
							<input type="text" class="form-control" name="txt_acc_name_en" value=''>
<?php endif; ?>		
						</div>
					</div>
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('acc_filepath') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<input id="file_accen" type="file" class="file-loading">
							<input name='hid_filepathaccen' type='hidden' value='<?= $info['acc_file_path_en']?>'>
<?php else: ?>
							<input id="file_accen" type="file" class="file-loading">
							<input name='hid_filepathaccen' type='hidden' value=''>
<?php endif; ?>	
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('accountnumber') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<input type="text" class="form-control" name="txt_acc_no_en" value='<?= $info['acc_no_en']?>'>
<?php else: ?>
							<input type="text" class="form-control" name="txt_acc_no_en" value=''>
<?php endif; ?>		
						</div>
					</div>
					<div class="col-sm-6">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('acc_swift') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<input type="text" class="form-control" name="txt_acc_swift_en" value='<?= $info['acc_swift_en']?>'>
<?php else: ?>
							<input type="text" class="form-control" name="txt_acc_swift_en" value=''>
<?php endif; ?>		
						</div>
					</div>
					<div class="col-sm-6">
					</div>
				</div>
				<br>				
				<label class="control-label"><?= $lang->line('acc_bank_ph') ?></label>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('acc_bank') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<input type="text" class="form-control" name="txt_acc_bank_ph" value='<?= $info['acc_bank_ph']?>'>
<?php else: ?>
							<input type="text" class="form-control" name="txt_acc_bank_ph" value=''>
<?php endif; ?>		
						</div>
					</div>
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('acc_fee') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<label class="radio-inline">
								<input type="radio" name="rdo_acc_fee_ph" id="" value=1 <?= $info['acc_fee_ph'] == 1 ? 'checked' : '' ?>> <?= $lang->line('acc_feei') ?>
							</label>
							<label class="radio-inline">
								<input type="radio" name="rdo_acc_fee_ph" id="" value=2 <?= $info['acc_fee_ph'] == 2 ? 'checked' : '' ?>> <?= $lang->line('acc_feeo') ?>
							</label>
<?php else: ?>
							<label class="radio-inline">
								<input type="radio" name="rdo_acc_fee_ph" id="" value=1 checked> <?= $lang->line('acc_feei') ?>
							</label>
							<label class="radio-inline">
								<input type="radio" name="rdo_acc_fee_ph" id="" value=2> <?= $lang->line('acc_feeo') ?>
							</label>
<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('accountname') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<input type="text" class="form-control" name="txt_acc_name_ph" value='<?= $info['acc_name_ph']?>'>
<?php else: ?>
							<input type="text" class="form-control" name="txt_acc_name_ph" value=''>
<?php endif; ?>	
							</div>
					</div>
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('acc_filepath') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<input id="file_accph" type="file" class="file-loading">
							<input name='hid_filepathaccph' type='hidden' value='<?= $info['acc_file_path_ph']?>'>
<?php else: ?>
							<input id="file_accph" type="file" class="file-loading">
							<input name='hid_filepathaccph' type='hidden' value=''>
<?php endif; ?>	
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('accountnumber') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<input type="text" class="form-control" name="txt_acc_no_ph" value='<?= $info['acc_no_ph']?>'>
<?php else: ?>
							<input type="text" class="form-control" name="txt_acc_no_ph" value=''>
<?php endif; ?>		
						</div>
					</div>
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('acc_bankadd') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<input type="text" class="form-control" name="txt_acc_bankadd_ph" value='<?= $info['acc_bankadd_ph']?>'>
<?php else: ?>
							<input type="text" class="form-control" name="txt_acc_bankadd_ph" value=''>
<?php endif; ?>		
						</div>						
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('acc_swift') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<input type="text" class="form-control" name="txt_acc_swift_ph" value='<?= $info['acc_swift_ph']?>'>
<?php else: ?>
							<input type="text" class="form-control" name="txt_acc_swift_ph" value=''>
<?php endif; ?>		
						</div>
					</div>
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('acc_addph') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<input type="text" class="form-control" name="txt_acc_add_ph" value='<?= $info['acc_add_ph']?>'>
<?php else: ?>
							<input type="text" class="form-control" name="txt_acc_add_ph" value=''>
<?php endif; ?>		
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<br>
						<label class="control-label"><?= $lang->line('typeother') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<input type="text" class="form-control" name="txt_acc_descr" value='<?= $info['acc_descr']?>'>
<?php else: ?>
							<input type="text" class="form-control" name="txt_acc_descr" value=''>
<?php endif; ?>		
						</div>
					</div>
				</div>
				<label class="control-label"><?= $lang->line('typecash') ?></label>
				<div class="form-group">
					<div class="col-sm-12">
						<table class="table table-bordered table-hover table-responsive" id="tab_clientCash">
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th class="text-center text-nowrap"><?= $lang->line('1-1-1') ?></th>
									<th class="text-center text-nowrap"><?= $lang->line('1-1-8') ?></th>
									<th class="text-center text-nowrap"><?= $lang->line('desc') ?></th>
								</tr>
							</thead>
							<tbody>
<?php if(count($ary_clientCash) > 0): ?>
<?php foreach ($ary_clientCash as $item): ?>
								<tr id="<?= 'addr_clientCash'.($item['row'] - 1) ?>">
									<td>
										<?= ($item['row']) ?>
										<input type='hidden' name='row_clientCash[]' value='<?= ($item['row']) ?>'>
									</td>
									<td>
										<?= form_dropdown('sel_country_clientCash[]', $ary_country, $item['country_id'], 'class="form-control"'); ?>
									</td>
									<td>
										<?= form_dropdown('sel_currency_clientCash[]', $ary_currency, $item['currency_id'], 'class="form-control"'); ?>										
									</td>
									<td>
										<input type="text" name='descr_clientCash[]' value='<?= ($item['descr']) ?>' class="form-control" />
									</td>
								</tr>
<?php endforeach;?>
								<tr id='<?php echo 'addr_clientCash'.count($ary_clientCash) ?>'></tr>
<?php else: ?>
								<tr id='addr_clientCash0'>
									<td>
										1
										<input type='hidden' name='row_clientCash[]' value='1'>
									</td>
									<td>
										<?= form_dropdown('sel_country_clientCash[]', $ary_country, '', 'class="form-control"'); ?>
									</td>
									<td>
										<?= form_dropdown('sel_currency_clientCash[]', $ary_currency, '', 'class="form-control"'); ?>										
									</td>									
									<td>
										<input type="text" name='descr_clientCash[]' class="form-control" />
									</td>
								</tr>
								<tr id='addr_clientCash1'></tr>
<?php endif; ?>
							</tbody>
						</table>
						<a class="add_row btn btn-warning pull-left" prefix='clientCash'><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
						<a class="delete_row pull-right btn btn-danger" prefix='clientCash'><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></a>
						<div class='row mb20' ps='for_add_del_button'>
						</div>
					</div>
				</div>
			</div>
			<!-- Tab 5 -->
			<div role="tabpanel" class="tab-pane" id="clientLicese">
				<div class="form-group">
					<div class="col-sm-12">
						<table class="table table-bordered table-hover table-responsive" id="tab_clientLicense">
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th class="text-center text-nowrap"><?= $lang->line('1-1-1') ?></th>
									<th class="text-center text-nowrap"><?= $lang->line('worker_type_major')."/".$lang->line('number_tw') ?></th>
									<th class="text-center text-nowrap"><?= $lang->line('license_nametw')."/".$lang->line('license_nameen') ?></th>
									<th class="text-center text-nowrap"><?= $lang->line('license_foreign')."/".$lang->line('license_nameen') ?></th>
									<th class="text-center text-nowrap"><?= $lang->line('license_date')."/".$lang->line('license_expiry_date') ?></th>
								</tr>
							</thead>
							<tbody>
<?php if(count($ary_clientLicense) > 0): ?>
<?php foreach ($ary_clientLicense as $item): ?>
								<tr id="<?= 'addr_clientLicense'.($item['row'] - 1) ?>">
									<td>
										<?= ($item['row']) ?>
										<input type='hidden' name='row_clientLicense[]' value='<?= ($item['row']) ?>'>
									</td>
									<td>
										<?= form_dropdown('sel_country_clientLicense[]', $ary_country, $item['country_id'], 'class="form-control"'); ?>
									</td>
									<td>
										<?= form_dropdown('sel_work_type_major_clientLicense[]', $ary_worker_type_major, $item['work_type_major'], 'class="form-control"'); ?>										
										<input type="text" name='number_tw_clientLicense[]' value='<?= ($item['number_tw']) ?>' class="form-control" />
									</td>
									<td>
										<input type="text" name='name_en_clientLicense[]' value='<?= ($item['name_en']) ?>' class="form-control" />
										<input type="text" name='name_tw_clientLicense[]' value='<?= ($item['name_tw']) ?>' class="form-control" />
									</td>
									<td>
										<input type="text" name='foreign_tw_clientLicense[]' value='<?= ($item['foreign_tw']) ?>' class="form-control" />
										<input type="text" name='foreign_en_clientLicense[]' value='<?= ($item['foreign_en']) ?>' class="form-control" />
									</td>
									<td>
										<div class='input-group date' id='datetimepicker'>
											<input type="text" class="form-control" name="date_clientLicense[]" value='<?= ($item['date']) ?>' pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" required readonly>
											<span class="input-group-addon">
												<span class="glyphicon glyphicon-calendar"></span>
											</span>
										</div>
										<div class='input-group date' id='datetimepicker'>
											<input type="text" class="form-control" name="expiry_date_clientLicense[]" value='<?= ($item['expiry_date']) ?>' pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" required readonly>
											<span class="input-group-addon">
												<span class="glyphicon glyphicon-calendar"></span>
											</span>
										</div>
									</td>		
								</tr>
<?php endforeach;?>
								<tr id='<?php echo 'addr_clientLicense'.count($ary_clientLicense) ?>'></tr>
<?php else: ?>
								<tr id='addr_clientLicense0'>
									<td>
										1
										<input type='hidden' name='row_clientLicense[]' value='1'>
									</td>
									<td>
										<?= form_dropdown('sel_country_clientLicense[]', $ary_country, '', 'class="form-control"'); ?>
									</td>
									<td>
										<?= form_dropdown('sel_work_type_major_clientLicense[]', $ary_worker_type_major, '', 'class="form-control"'); ?>										
										<input type="text" name='number_tw_clientLicense[]' class="form-control" />
									</td>
									<td>
										<input type="text" name='name_tw_clientLicense[]' class="form-control" />
										<input type="text" name='name_en_clientLicense[]' class="form-control" />
									</td>
									<td>
										<input type="text" name='foreign_tw_clientLicense[]' class="form-control" />
										<input type="text" name='foreign_en_clientLicense[]' class="form-control" />
									</td>
									<td>
										<div class='input-group date' id='datetimepicker'>
											<input type="text" class="form-control" name="date_clientLicense[]" value='' pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" required readonly>
											<span class="input-group-addon">
												<span class="glyphicon glyphicon-calendar"></span>
											</span>
										</div>
										<div class='input-group date' id='datetimepicker'>
											<input type="text" class="form-control" name="expiry_date_clientLicense[]" value='' pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" required readonly>
											<span class="input-group-addon">
												<span class="glyphicon glyphicon-calendar"></span>
											</span>
										</div>
									</td>
								</tr>
								<tr id='addr_clientLicense1'></tr>
<?php endif; ?>
							</tbody>
						</table>
						<a class="add_row btn btn-warning pull-left" prefix='clientLicense'><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
						<a class="delete_row pull-right btn btn-danger" prefix='clientLicense'><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></a>
						<div class='row mb20' ps='for_add_del_button'>
						</div>
					</div>
				</div>
			</div>
			<!-- Tab 6 -->
			<div role="tabpanel" class="tab-pane" id="clientRelation">
				<div class="form-group">
					<div class="col-sm-6">
						<table class="table table-bordered table-hover table-responsive" id="tab_clientRelation">
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th class="text-center text-nowrap"><?= $lang->line('employer') ?></th>
								</tr>
							</thead>
							<tbody>
<?php if(count($ary_clientRelation) > 0): ?>
<?php foreach ($ary_clientRelation as $item): ?>
								<tr id="<?= 'addr_clientRelation'.($item['row'] - 1) ?>">
									<td>
										<?= ($item['row']) ?>
										<input type='hidden' name='row_clientRelation[]' value='<?= ($item['row']) ?>'>
									</td>									
									<td>
										<div class="input-group">
											<?= form_dropdown('sel_employer_id[]', array($item['employer_id'] => $item['e_name_tw']), $item['e_name_tw'], 'class="form-control" otype="employer" row="'.$item['row'].'"'); ?>
											<div class="input-group-btn">
												<button ftype='employer' row='<?= ($item['row']) ?>' class="fsearch btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Search...</button>
											</div>
										</div>
									</td>
								</tr>
<?php endforeach;?>
								<tr id='<?php echo 'addr_clientRelation'.count($ary_clientRelation) ?>'></tr>
<?php else: ?>
								<tr id='addr_clientRelation0'>
									<td>
										1
										<input type='hidden' name='row_clientRelation[]' value='1'>
									</td>
									<td>
										<div class="input-group">										
											<?= form_dropdown('sel_employer_id[]', array('-1'=>'未選取'), 0, 'class="form-control" otype="employer" row="1" '); ?>
											<div class="input-group-btn">
												<button ftype='employer' row='1' class="fsearch btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Search...</button>
											</div>
										</div>
									</td>
								</tr>
								<tr id='addr_clientRelation1'></tr>
<?php endif; ?>
							</tbody>
						</table>
						<a class="add_row btn btn-warning pull-left" prefix='clientRelation'><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
						<a class="delete_row pull-right btn btn-danger" prefix='clientRelation'><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></a>
						<div class='row mb20' ps='for_add_del_button'>
						</div>
					</div>
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
	var i_clientContact = $("#tab_clientContact" + " tr").length - 2;
	var i_clientDescr = $("#tab_clientDescr" + " tr").length - 2;
	var i_clientCash = $("#tab_clientCash" + " tr").length - 2;
	var i_clientLicense = $("#tab_clientLicense" + " tr").length - 2;
	var i_clientRelation = $("#tab_clientRelation" + " tr").length - 2;

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

	$('#file_acctw').fileinput({
		showPreview: false,
		language: "zh-TW",
		uploadUrl: '<?= base_url()?>upload/do_upload',
		allowedFileExtensions: ["jpg","jpeg","gif","png","pdf"],
<?php if((strval($id) != '0') && (strlen($info['acc_file_path_tw'])) > 0): ?>
		initialCaption: "<?= $info['acc_file_path_tw']?>",
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

	$('#file_accen').fileinput({
		showPreview: false,
		language: "zh-TW",
		uploadUrl: '<?= base_url()?>upload/do_upload',
		allowedFileExtensions: ["jpg","jpeg","gif","png","pdf"],
<?php if((strval($id) != '0') && (strlen($info['acc_file_path_en'])) > 0): ?>
		initialCaption: "<?= $info['acc_file_path_en']?>",
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

	$('#file_accph').fileinput({
		showPreview: false,
		language: "zh-TW",
		uploadUrl: '<?= base_url()?>upload/do_upload',
		allowedFileExtensions: ["jpg","jpeg","gif","png","pdf"],
<?php if((strval($id) != '0') && (strlen($info['acc_file_path_ph'])) > 0): ?>
		initialCaption: "<?= $info['acc_file_path_ph']?>",
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

	$('#file_acctw').on('fileuploaded', function(event, data, previewId, index) {
		var response = data.response;
		$('input[name=hid_filepathacctw]').val(response.new_name);
	});

	$('#file_accen').on('fileuploaded', function(event, data, previewId, index) {
		var response = data.response;
		$('input[name=hid_filepathaccen]').val(response.new_name);
	});

	$('#file_accph').on('fileuploaded', function(event, data, previewId, index) {
		var response = data.response;
		$('input[name=hid_filepathaccph]').val(response.new_name);
	});	

	$('.date').datetimepicker({
		format: 'YYYY-MM-DD',
		keepInvalid: true,
		ignoreReadonly: true,
		useCurrent: true
	});

	$(".btn-cancel").bind("click",function(){
		window.location = '<?= base_url()?>crm/client';
	});	
	$("#btn_save").bind("click",function(){
		if(!$("form")[0].checkValidity()) return;

		$.ajax({
			async: false,
			type: "POST",
			url: $('#hid_baseurl').val() + 'crm/client_doEdit',
			data: $('#form1').serialize(),
			statusCode: {
				200: function(e) {
					if(e.toString() == '0') {
						alert('許可證重覆');
					} else {
						window.location = '<?= base_url()?>crm/client';
					}
					
				}
			},
			error: function() {
				alert('操作失敗');
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
		$('#hid_frow').val($(this).attr('row'));
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

		$("select[otype=" + $('#hid_ftype').val() +"][row=" + $('#hid_frow').val() + "] option").remove();
		$("select[otype=" + $('#hid_ftype').val() +"][row=" + $('#hid_frow').val() + "]").append($("<option></option>").attr("value", $('#sel_search').val()).text($('#sel_search :selected').text()));
		$(".modal").modal('hide');
	});
	
	$(".add_row").click(function() {
		var prefix = $(this).attr("prefix");
		var tmp = 'i_' +  prefix;
		var i  = eval(tmp);

		$('#addr_' + prefix + i).html($('#addr_' + prefix +'0').html());
		$('#addr_' + prefix + i).children().children().attr('row',i + 1);	// replace attr:row
		$('#addr_' + prefix + i).children().children().children().attr('row',i + 1);	// replace attr:row
		$('#addr_' + prefix + i).children().children().children().children().attr('row',i + 1);	// replace attr:row
		$('#addr_' + prefix + i).children().first().html((i + 1) + "<input type='hidden' name='row_" + prefix + "[]' value='" + (i + 1) + "'>");	// replace #

		$("#tab_clientRelation" + " select[row=" + (i + 1) + "]").each(function() {
			$(this).children("option").remove();
			$(this).append($("<option value='-1'>未選取</option>"));
		});

		$("#tab_" + prefix + " input[row=" + (i + 1) + "]").each(function() {
			$(this).val('');
		});		

		// checkbox
		$("#tab_" + prefix + " input[row=" + (i + 1) + "][type=checkbox]").each(function() {
			$(this).val($(this).attr('row'));
			$(this).removeAttr('checked');
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

		// search
		$(".fsearch").bind("click",function(){
			$('#span_modal_title').html($(this).attr('ftype'));
			$('#hid_ftype').val($(this).attr('ftype'));
			$('#hid_frow').val($(this).attr('row'));
			$('.modal').modal({
				backdrop: 'static'
			});
			$(".modal").modal('show');

			$("input[name='txt_search']").val('');
			$("#sel_search option").remove();

			return false;
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