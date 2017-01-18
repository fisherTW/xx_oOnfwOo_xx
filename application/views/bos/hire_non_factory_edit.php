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
		<!-- Nav tabs -->
		<ul class="nav nav-tabs" role="tablist">
			<li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab"><?= $lang->line('required_condition') ?></a></li>
			<li role="presentation"><a href="#special_directions" aria-controls="special_directions" role="tab" data-toggle="tab"><?= $lang->line('special_directions') ?></a></li>
			<li role="presentation"><a href="#other" aria-controls="other" role="tab" data-toggle="tab"><?= $lang->line('other') ?></a></li>
			<li role="presentation"><a href="#non_f_work_content" aria-controls="non_f_work_content" role="tab" data-toggle="tab"><?= $lang->line('non_f_work_content') ?></a></li>
			<li role="presentation"><a href="#non_f_salary_condition" aria-controls="non_f_salary_condition" role="tab" data-toggle="tab"><?= $lang->line('non_f_salary_condition') ?></a></li>
			<li role="presentation"><a href="#non_f_monitor_patient_data" aria-controls="non_f_monitor_patient_data" role="tab" data-toggle="tab"><?= $lang->line('non_f_monitor_patient_data') ?></a></li>
			<li role="presentation"><a href="#non_f_emp_req_condition" aria-controls="non_f_emp_req_condition" role="tab" data-toggle="tab"><?= $lang->line('non_f_emp_req_condition') ?></a></li>
			<li role="presentation"><a href="#non_f_emp_family_status" aria-controls="non_f_emp_family_status" role="tab" data-toggle="tab"><?= $lang->line('non_f_emp_family_status') ?></a></li>
		</ul>
		<!-- Tab panes -->
		<div class="tab-content">
			<!-- Tab 1 -->
			<div role="tabpanel" class="tab-pane active" id="home">
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('employed_workers_id') ?></label>
						<div class="checkbox">
<?php if (strval($id) != '0'): ?>
							<?= $info['id'] ?>
<?php else: ?>
							<?= $lang->line('generate_system') ?>
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
					<div class="col-sm-3">
						<label class="control-label"><?= $lang->line('1-1-1') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<?= form_dropdown('sel_country', $ary_country, $info['country_id'], 'class="form-control"'); ?>
<?php else: ?>
							<?= form_dropdown('sel_country', $ary_country, '', 'class="form-control"'); ?>
<?php endif; ?>				
						</div>
					</div>
					<div class="col-sm-3">
						<label class="control-label"><?= $lang->line('country_id_input') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<?= form_dropdown('sel_country_id_input', $ary_country, $info['country_id_input'], 'class="form-control"'); ?>
<?php else: ?>
							<?= form_dropdown('sel_country_id_input', $ary_country, '', 'class="form-control"'); ?>
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
						<label class="control-label"><?= $lang->line('date_order') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<div class='input-group date' id='datetimepicker2'>
								<input type="text" class="form-control" name="txt_date_order" value='<?= $info['date_order']?>' pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" required readonly>
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-calendar"></span>
								</span>
							</div>
<?php else: ?>
							<div class='input-group date' id='datetimepicker2'>
								<input type="text" class="form-control" name="txt_date_order" value='' pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" required readonly>
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-calendar"></span>
								</span>
							</div>
<?php endif; ?>	
						</div>
					</div>
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
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('worker_kind') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<?= form_dropdown('sel_worker_kind', $ary_worker_kind, $info['worker_kind'], 'class="form-control"'); ?>
<?php else: ?>
							<?= form_dropdown('sel_worker_kind', $ary_worker_kind, '', 'class="form-control"'); ?>
<?php endif; ?>				
						</div>
					</div>
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('employer') ?></label>
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
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('worker_type_major') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<?= form_dropdown('sel_worker_type_major', $ary_worker_type_major, $info['worker_type_major'], 'class="form-control"'); ?>
<?php else: ?>
							<?= form_dropdown('sel_worker_type_major', $ary_worker_type_major, '', 'class="form-control"'); ?>
<?php endif; ?>				
						</div>
					</div>
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('work_limit') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<input type="text" class="form-control" name="txt_work_limit" placeholder='2Y0M0D' value='<?= $info['work_limit']?>' pattern="[0-9]Y(0|[1-9]|1[012])M(0|[1-9]|[12][0-9]|3[01])D" required>
<?php else: ?>
							<input type="text" class="form-control" name="txt_work_limit" placeholder='2Y0M0D' value='' pattern="[0-9]Y(0|[1-9]|1[012])M(0|[1-9]|[12][0-9]|3[01])D" required>
<?php endif; ?>	
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('worker_type_minor') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<?= form_dropdown('sel_worker_type_minor', $ary_worker_type_minor, $info['worker_type_minor_id'], 'class="form-control"'); ?>
<?php else: ?>
							<?= form_dropdown('sel_worker_type_minor', $ary_worker_type_minor, '', 'class="form-control"'); ?>
<?php endif; ?>				
						</div>
					</div>
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('sex') ?> </label>
						<div>
<?php if (strval($id) != '0'): ?>
							<label class="radio-inline">
								<input type="radio" name="rdo_sex" id="" value=1 <?= $info['gender'] == 1 ? 'checked' : '' ?>> <?= $lang->line('rdo_m') ?>
							</label>
							<label class="radio-inline">
								<input type="radio" name="rdo_sex" id="" value=0 <?= $info['gender'] == 0 ? 'checked' : '' ?>> <?= $lang->line('rdo_f') ?>
							</label>
<?php else: ?>
							<label class="radio-inline">
								<input type="radio" name="rdo_sex" id="" value=1 checked> <?= $lang->line('rdo_m') ?>
							</label>
							<label class="radio-inline">
								<input type="radio" name="rdo_sex" id="" value=0> <?= $lang->line('rdo_f') ?>
							</label>
<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('status') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<?= form_dropdown('sel_status', $ary_status, $info['status'], 'class="form-control"'); ?>
<?php else: ?>
							<?= form_dropdown('sel_status', $ary_status, '', 'class="form-control"'); ?>
<?php endif; ?>				
						</div>
					</div>
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('marital_status') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<?= form_dropdown('sel_marriage', $ary_marriage, $info['marriage'], 'class="form-control"'); ?>
<?php else: ?>
							<?= form_dropdown('sel_marriage', $ary_marriage, '', 'class="form-control"'); ?>
<?php endif; ?>				
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('qty_require') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<input type="text" class="form-control" name="txt_qty_require" value='<?= $info['qty_require']?>' pattern="[0-9]+" required>
<?php else: ?>
							<input type="text" class="form-control" name="txt_qty_require" value='' pattern="[0-9]+" required>
<?php endif; ?>	
						</div>
					</div>
					<div class="col-sm-5">
						<label class="control-label"><?= $lang->line('height') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<input type="text" class="form-control" name="txt_height" value='<?= $info['height']?>' pattern="[0-9]+">
<?php else: ?>
							<input type="text" class="form-control" name="txt_height" value='' pattern="[0-9]+">
<?php endif; ?>	
						</div>
					</div>
					<div class="col-sm-1">
						<label class="control-label">　</label>
						<div class="checkbox">
							<?= $lang->line('cm') ?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('qty_main') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<input type="text" class="form-control" name="txt_qty_main" value='<?= $info['qty_main']?>' pattern="[0-9]+">
<?php else: ?>
							<input type="text" class="form-control" name="txt_qty_main" value='' pattern="[0-9]+">
<?php endif; ?>	
						</div>
					</div>
					<div class="col-sm-5">
						<label class="control-label"><?= $lang->line('weight') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<input type="text" class="form-control" name="txt_weight" value='<?= $info['weight']?>' pattern="[0-9]+">
<?php else: ?>
							<input type="text" class="form-control" name="txt_weight" value='' pattern="[0-9]+">
<?php endif; ?>	
						</div>
					</div>
					<div class="col-sm-1">
						<label class="control-label">　</label>
						<div class="checkbox">
							<?= $lang->line('kg') ?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('qty_bench') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<input type="text" class="form-control" name="txt_qty_bench" value='<?= $info['qty_bench']?>' pattern="[0-9]+">
<?php else: ?>
							<input type="text" class="form-control" name="txt_qty_bench" value='' pattern="[0-9]+">
<?php endif; ?>	
						</div>
					</div>
					<div class="col-sm-3">
						<label class="control-label"><?= $lang->line('age_start') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<input type="text" class="form-control" name="txt_age_start" value='<?= $info['age_start']?>' pattern="[0-9]+">
<?php else: ?>
							<input type="text" class="form-control" name="txt_age_start" value='' pattern="[0-9]+">
<?php endif; ?>	
						</div>
					</div>
					<div class="col-sm-3">
						<label class="control-label"><?= $lang->line('age_end') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<input type="text" class="form-control" name="txt_age_end" value='<?= $info['age_end']?>' pattern="[0-9]+">
<?php else: ?>
							<input type="text" class="form-control" name="txt_age_end" value='' pattern="[0-9]+">
<?php endif; ?>	
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('immigration_people') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<input type="text" class="form-control" name="txt_qty_immigrate" value='<?= $info['qty_immigrate']?>' pattern="[0-9]+">
<?php else: ?>
							<input type="text" class="form-control" name="txt_qty_immigrate" value='' pattern="[0-9]+">
<?php endif; ?>	
						</div>
					</div>
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('comeback') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<?= form_dropdown('sel_comeback', $ary_comeback, $info['comeback'], 'class="form-control"'); ?>
<?php else: ?>
							<?= form_dropdown('sel_comeback', $ary_comeback, '', 'class="form-control"'); ?>
<?php endif; ?>				
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('client_addtw') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<input type="text" class="form-control" name="txt_client_addtw" value='<?= $info['client_addtw']?>'>
<?php else: ?>
							<input type="text" class="form-control" name="txt_client_addtw" value=''>
<?php endif; ?>	
						</div>
					</div>
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('arrspot2') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<?= form_dropdown('sel_arrspot', $ary_arrspot, $info['arrspot'], 'class="form-control"'); ?>
<?php else: ?>
							<?= form_dropdown('sel_arrspot', $ary_arrspot, '', 'class="form-control"'); ?>
<?php endif; ?>				
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('site_factory') ?></label>
						<div class="checkbox" id='div_site_factory'>
<?php if (strval($id) != '0'): ?>
							<?= $info['site_factory']?>
<?php else: ?>
							<?= $lang->line('generate_system')?>
<?php endif; ?>	
						</div>
					</div>
					<div class="col-sm-5">
						<label class="control-label"><?= $lang->line('actually_select') ?></label>
						<div class="checkbox">
<?php if (strval($id) != '0'): ?>
							<?= $ary_actually_select ?>
<?php else: ?>
							<?= $ary_actually_select ?>
<?php endif; ?>				
						</div>
					</div>
					<div class="col-sm-1">
						<label class="control-label">　</label>
						<div class="checkbox">
							<?= $lang->line('people') ?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('employed_workers_desc') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<input type="text" class="form-control" name="txt_descr" value='<?= $info['descr']?>'>
<?php else: ?>
							<input type="text" class="form-control" name="txt_descr" value=''>
<?php endif; ?>	
						</div>
					</div>
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('sales_id') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<?= form_dropdown('sel_sales_id', $ary_emp, $info['sales_id'], 'class="form-control"'); ?>
<?php else: ?>
							<?= form_dropdown('sel_sales_id', $ary_emp, '', 'class="form-control"'); ?>
<?php endif; ?>				
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('employed_workers_file_path') ?></label>
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
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('service_id') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<?= form_dropdown('sel_service_id', $ary_emp, $info['service_id'], 'class="form-control"'); ?>
<?php else: ?>
							<?= form_dropdown('sel_service_id', $ary_emp, '', 'class="form-control"'); ?>
<?php endif; ?>				
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-12">
						<label for="tab_exp" class='form-label'> <?= $lang->line('language_ability') ?></label><br />
						<table class="table table-bordered table-hover table-responsive" id="tab_exp">
							<thead>
								<tr >
									<th class="text-center">#</th>
									<th class="text-center text-nowrap"><?= $lang->line('language') ?></th>
									<th class="text-center text-nowrap"><?= $lang->line('language_level') ?></th>
								</tr>
							</thead>
							<tbody>
<?php if(count($ary_hire_factory_auth) > 0): ?>
<?php foreach ($ary_hire_factory_auth as $item): ?>
								<tr id="<?= 'addr_exp'.($item['row'] - 1) ?>">
									<td>
										<?= ($item['row']) ?>
										<input type='hidden' name='row_exp[]' value='<?= ($item['row']) ?>'>
									</td>
									<td>
										<?= form_dropdown('sel_language[]', $ary_language, $item['language'], 'class="form-control"'); ?>
									</td>
									<td>
										<?= form_dropdown('sel_level[]', $ary_level, $item['level'], 'class="form-control"'); ?>
									</td>
								</tr>
<?php endforeach;?>
								<tr id='<?php echo 'addr_exp'.count($ary_hire_factory_auth) ?>'></tr>
<?php else: ?>
								<tr id='addr_exp0'>
									<td>
										1
										<input type='hidden' name='row_exp[]' value='1'>
									</td>
									<td>
										<?= form_dropdown('sel_language[]', $ary_language, '', 'class="form-control"'); ?>
									</td>
									<td>
										<?= form_dropdown('sel_level[]', $ary_level, '', 'class="form-control"'); ?>
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
			</div>
			<!-- tab 2 -->
			<div role="tabpanel" class="tab-pane" id="special_directions">
				<div class="form-group">
					<div class="col-sm-12">
						<label class="control-label"><?= $lang->line('food_type') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<label class="radio-inline">
								<input type="radio" name="rdo_food_type" id="" value=1 <?= $info['food_type'] == 1 ? 'checked' : '' ?>> <?= $lang->line('free_food_type') ?>
							</label>
							<br>
							<label class="radio-inline">
								<input type="radio" name="rdo_food_type" id="" value=2 <?= $info['food_type'] == 2 ? 'checked' : '' ?>> <?= $lang->line('other') ?>
							</label>
							<br>
							<label class="radio-inline">
								<input type="radio" name="rdo_food_type" id="" value=3 <?= $info['food_type'] == 3 ? 'checked' : '' ?>> <?= $lang->line('month_deduct') ?>
							</label>
							<br>
							<label class="radio-inline">
								<input type="text" class="form-control" name="txt_food_descr" value='<?= $info['food_descr']?>'>
							</label>
<?php else: ?>
							<label class="radio-inline">
								<input type="radio" name="rdo_food_type" id="" value=1 checked> <?= $lang->line('free_food_type') ?>
							</label>
							<br>
							<label class="radio-inline">
								<input type="radio" name="rdo_food_type" id="" value=2> <?= $lang->line('other') ?>
							</label>
							<br>
							<label class="radio-inline">
								<input type="radio" name="rdo_food_type" id="" value=3> <?= $lang->line('month_deduct') ?>
							</label>
							<br>
							<label class="radio-inline">
								<input type="text" class="form-control" name="txt_food_descr" value=''>
							</label>
<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('ticket') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<?= form_dropdown('sel_ticket', $ary_ticket, $info['ticket'], 'class="form-control"'); ?>
<?php else: ?>
							<?= form_dropdown('sel_ticket', $ary_ticket, '', 'class="form-control"'); ?>
<?php endif; ?>				
						</div>
					</div>
					<div class="col-sm-6">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-5">
						<label class="control-label"><?= $lang->line('insur_labor') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
								<input type="text" class="form-control" name="txt_insur_labor" value='<?= $info['insur_labor']?>' pattern="[0-9]+">
<?php else: ?>
								<input type="text" class="form-control" name="txt_insur_labor" value='' pattern="[0-9]+">
<?php endif; ?>
						</div>
					</div>
					<div class="col-sm-1">
						<label class="control-label">　</label>
						<div class="checkbox">
							<?= $lang->line('yuan_month') ?>
						</div>
					</div>
					<div class="col-sm-6">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-5">
						<label class="control-label"><?= $lang->line('insur_health') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
								<input type="text" class="form-control" name="txt_insur_health" value='<?= $info['insur_health']?>' pattern="[0-9]+">
<?php else: ?>
								<input type="text" class="form-control" name="txt_insur_health" value='' pattern="[0-9]+">
<?php endif; ?>	
						</div>
					</div>
					<div class="col-sm-1">
						<label class="control-label">　</label>
						<div class="checkbox">
							<?= $lang->line('yuan_month') ?>
						</div>
					</div>
					<div class="col-sm-6">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-5">
						<label class="control-label"><?= $lang->line('insur_type') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<label class="radio-inline">
								<input type="radio" name="rdo_insur_type" id="" value=1 <?= $info['insur_type'] == 1 ? 'checked' : '' ?>> <?= $lang->line('labor_pay') ?>
							</label>
							<label class="radio-inline">
								<input type="radio" name="rdo_insur_type" id="" value=2 <?= $info['insur_type'] == 2 ? 'checked' : '' ?>> <?= $lang->line('employer_pay') ?>
							</label>
							<label class="radio-inline">
								<input type="text" class="form-control" name="txt_insur_descr" value='<?= $info['insur_descr']?>' pattern="[0-9]+">
							</label>
<?php else: ?>
							<label class="radio-inline">
								<input type="radio" name="rdo_insur_type" id="" value=1 checked> <?= $lang->line('labor_pay') ?>
							</label>
							<label class="radio-inline">
								<input type="radio" name="rdo_insur_type" id="" value=2> <?= $lang->line('employer_pay') ?>
							</label>
							<label class="radio-inline">
								<input type="text" class="form-control" name="txt_insur_descr" value='' pattern="[0-9]+">
							</label>
<?php endif; ?>
						</div>
					</div>
					<div class="col-sm-1">
						<label class="control-label">　</label>
						<div class="checkbox">
							<?= $lang->line('yuan_month') ?>
						</div>
					</div>
					<div class="col-sm-6">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-3">
						<label class="control-label"><?= $lang->line('save') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
								<input type="text" class="form-control" name="txt_save" value='<?= $info['save']?>' pattern="[0-9]+">
<?php else: ?>
								<input type="text" class="form-control" name="txt_save" value='' pattern="[0-9]+">
<?php endif; ?>	
						</div>
					</div>
					<div class="col-sm-3">
						<label class="control-label"><?= $lang->line('save2') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
								<input type="text" class="form-control" name="txt_save2" value='<?= $info['save2']?>' pattern="[0-9]+">
<?php else: ?>
								<input type="text" class="form-control" name="txt_save2" value='' pattern="[0-9]+">
<?php endif; ?>	
						</div>
					</div>
					<div class="col-sm-6">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('desc') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
								<input type="text" class="form-control" name="txt_descr2" value='<?= $info['descr2']?>'>
<?php else: ?>
								<input type="text" class="form-control" name="txt_descr2" value=''>
<?php endif; ?>	
						</div>
					</div>
					<div class="col-sm-6">
					</div>
				</div>
			</div>
			<!-- tab 3 -->
			<div role="tabpanel" class="tab-pane" id="other">
				<div class="form-group">
					<div class="col-sm-3">
						<label class="control-label"><?= $lang->line('recruit_visa') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<?= form_dropdown('sel_letter_id', $ary_letter_id, $info['letter_id'], 'class="form-control"'); ?>
<?php else: ?>
							<?= form_dropdown('sel_letter_id', $ary_letter_id, '', 'class="form-control"'); ?>
<?php endif; ?>				
						</div>
					</div>
					<div class="col-sm-3">
						<label class="control-label"><?= $lang->line('date_letter') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<div class='input-group date' id='datetimepicker2'>
								<input type="text" class="form-control" name="txt_date_letter" value='<?= $info['date_letter']?>' pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" required readonly>
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-calendar"></span>
								</span>
							</div>
<?php else: ?>
							<div class='input-group date' id='datetimepicker2'>
								<input type="text" class="form-control" name="txt_date_letter" value='' pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" required readonly>
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
					<div class="col-sm-3">
						<label class="control-label"><?= $lang->line('5-1-2') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<?= form_dropdown('sel_letter_id2', $ary_letter_id2, $info['letter_id2'], 'class="form-control"'); ?>
<?php else: ?>
							<?= form_dropdown('sel_letter_id2', $ary_letter_id2, '', 'class="form-control"'); ?>
<?php endif; ?>				
						</div>
					</div>
					<div class="col-sm-3">
						<label class="control-label"><?= $lang->line('date_letter') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<div class='input-group date' id='datetimepicker2'>
								<input type="text" class="form-control" name="txt_date_letter2" value='<?= $info['date_letter2']?>' pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" required readonly>
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-calendar"></span>
								</span>
							</div>
<?php else: ?>
							<div class='input-group date' id='datetimepicker2'>
								<input type="text" class="form-control" name="txt_date_letter2" value='' pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" required readonly>
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
						<label class="control-label"><?= $lang->line('date_desc3') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<div class='input-group date' id='datetimepicker2'>
								<input type="text" class="form-control" name="txt_date_descr3" value='<?= $info['date_descr3']?>' pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" required readonly>
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-calendar"></span>
								</span>
							</div>
<?php else: ?>
							<div class='input-group date' id='datetimepicker2'>
								<input type="text" class="form-control" name="txt_date_descr3" value='' pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" required readonly>
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
						<label class="control-label"><?= $lang->line('desc') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
								<input type="text" class="form-control" name="txt_descr3" value='<?= $info['descr3']?>'>
<?php else: ?>
								<input type="text" class="form-control" name="txt_descr3" value=''>
<?php endif; ?>	
						</div>
					</div>
					<div class="col-sm-6">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<label for="tab_hire_special" class='form-label'> <?= $lang->line('hire_worker') ?></label><br />
						<table class="table table-bordered table-hover table-responsive" id="tab_hire_special">
							<thead>
								<tr >
									<th class="text-center">#</th>
									<th class="text-center text-nowrap"><?= $lang->line('student_no') ?></th>
									<th class="text-center text-nowrap"><?= $lang->line('name_tw') ?></th>
									<th class="text-center text-nowrap"><?= $lang->line('name_en') ?></th>
									<th class="text-center text-nowrap"><?= $lang->line('tel') ?></th>
									<th class="text-center text-nowrap"><?= $lang->line('tel2') ?></th>
									<th class="text-center text-nowrap"><?= $lang->line('tw_address') ?></th>
									<th class="text-center text-nowrap"><?= $lang->line('desc') ?></th>
								</tr>
							</thead>
							<tbody>
<?php if(count($ary_hire_special_auth) > 0): ?>
<?php foreach ($ary_hire_special_auth as $item): ?>
								<tr id="<?= 'addr_hire_special'.($item['row'] - 1) ?>">
									<td>
										<?= ($item['row']) ?>
										<input type='hidden' name='row_hire_special[]' value='<?= ($item['row']) ?>'>
									</td>
									<td>
										<input type="text" name='no_hire_special[]' value='<?= ($item['no']) ?>' class="form-control" pattern="[0-9]+"/>
									</td>
									<td>
										<input type="text" name='name_tw_hire_special[]' value='<?= ($item['name_tw']) ?>' class="form-control" />
									</td>
									<td>
										<input type="text" name='name_en_hire_special[]' value='<?= ($item['name_en']) ?>' class="form-control" />
									</td>
									<td>
										<input type="text" name='tel_hire_special[]' value='<?= ($item['tel']) ?>' class="form-control" />
									</td>
									<td>
										<input type="text" name='tel2_hire_special[]' value='<?= ($item['tel2']) ?>' class="form-control" />
									</td>
									<td>
										<input type="text" name='address_hire_special[]' value='<?= ($item['address']) ?>' class="form-control" />
									</td>
									<td>
										<input type="text" name='descr_hire_special[]' value='<?= ($item['descr']) ?>' class="form-control" />
									</td>
								</tr>
<?php endforeach;?>
								<tr id='<?php echo 'addr_hire_special'.count($ary_hire_special_auth) ?>'></tr>
<?php else: ?>
								<tr id='addr_hire_special0'>
									<td>
										1
										<input type='hidden' name='row_hire_special[]' value='1'>
									</td>
									<td>
										<input type="text" name='no_hire_special[]' class="form-control" pattern="[0-9]+"/>
									</td>
									<td>
										<input type="text" name='name_tw_hire_special[]' class="form-control" />
									</td>
									<td>
										<input type="text" name='name_en_hire_special[]' class="form-control" />
									</td>
									<td>
										<input type="text" name='tel_hire_special[]' class="form-control" />
									</td>
									<td>
										<input type="text" name='tel2_hire_special[]' class="form-control" />
									</td>
									<td>
										<input type="text" name='address_hire_special[]' class="form-control" />
									</td>
									<td>
										<input type="text" name='descr_hire_special[]' class="form-control" />
									</td>
								</tr>
								<tr id='addr_hire_special1'></tr>
<?php endif; ?>
							</tbody>
						</table>
						<a class="add_row btn btn-warning pull-left" prefix='hire_special'><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
						<a class="delete_row pull-right btn btn-danger" prefix='hire_special'><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></a>
						<div class='row mb20' ps='for_add_del_button'>
						</div>
					</div>
				</div>
			</div>
			<!-- tab 4 -->
			<div role="tabpanel" class="tab-pane" id="non_f_work_content">
				<div class="form-group">
					<div class="col-sm-3">
						<label class="control-label"><?= $lang->line('m_w_main') ?></label>
						<div class='checkbox'>
							<label>
<?php if (strval($id) != '0'): ?>
								<input type="checkbox" name='chk_m_w_main[]' value="1" <?= ($info['m_w_main'] & 1) == '1' ? 'checked="checked"' : '' ?>/><?= $lang->line('m_w_main_1') ?>
<?php else: ?>
								<input type="checkbox" name='chk_m_w_main[]' value="1" /><?= $lang->line('m_w_main_1') ?>
<?php endif; ?>
							</label>
						</div>
					</div>
					<div class="col-sm-2">
						<label class="control-label">　</label>
						<div class='checkbox'>
							<label>
<?php if (strval($id) != '0'): ?>
								<input type="checkbox" name='chk_m_w_main[]' value="2" <?= ($info['m_w_main'] & 2) == '2' ? 'checked="checked"' : '' ?>/><?= $lang->line('m_w_main_2') ?>
<?php else: ?>
								<input type="checkbox" name='chk_m_w_main[]' value="2" /><?= $lang->line('m_w_main_2') ?>
<?php endif; ?>
							</label>
						</div>
					</div>
					<div class="col-sm-2">
						<label class="control-label">　</label>
						<div class='checkbox'>
							<label>
<?php if (strval($id) != '0'): ?>
								<input type="checkbox" name='chk_m_w_main[]' value="4" <?= ($info['m_w_main'] & 4) == '4' ? 'checked="checked"' : '' ?>/><?= $lang->line('m_w_main_3') ?>
<?php else: ?>
								<input type="checkbox" name='chk_m_w_main[]' value="4"/><?= $lang->line('m_w_main_3') ?>
<?php endif; ?>
							</label>
						</div>
					</div>
					<div class="col-sm-2">
						<label class="control-label">　</label>
						<div class='checkbox'>
							<label>
<?php if (strval($id) != '0'): ?>
								<input type="checkbox" name='chk_m_w_main[]' value="8" <?= ($info['m_w_main'] & 8) == '8' ? 'checked="checked"' : '' ?>/><?= $lang->line('m_w_main_4') ?>
<?php else: ?>
								<input type="checkbox" name='chk_m_w_main[]' value="8"/><?= $lang->line('m_w_main_4') ?>
<?php endif; ?>
							</label>
						</div>
					</div>
					<div class="col-sm-2">
						<label class="control-label">　</label>
						<div class='checkbox'>
							<label>
<?php if (strval($id) != '0'): ?>
								<input type="checkbox" name='chk_m_w_main[]' value="16" <?= ($info['m_w_main'] & 16) == '16' ? 'checked="checked"' : '' ?>/><?= $lang->line('m_w_main_5') ?>
<?php else: ?>
								<input type="checkbox" name='chk_m_w_main[]' value="16" /><?= $lang->line('m_w_main_5') ?>
<?php endif; ?>
							</label>
						</div>
					</div>
					<div class="col-sm-1">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-3">
						<label class="control-label"><?= $lang->line('m_w_detail') ?></label>
						<div class='checkbox'>
							<label>
<?php if (strval($id) != '0'): ?>
								<input type="checkbox" name='chk_m_w_detail[]' value="1" <?= ($info['m_w_detail'] & 1) == '1' ? 'checked="checked"' : '' ?>/><?= $lang->line('m_w_detail_1') ?>
<?php else: ?>
								<input type="checkbox" name='chk_m_w_detail[]' value="1" /><?= $lang->line('m_w_detail_1') ?>
<?php endif; ?>

							</label>
						</div>
					</div>
					<div class="col-sm-2">
						<label class="control-label">　</label>
						<div class='checkbox'>
							<label>
<?php if (strval($id) != '0'): ?>
								<input type="checkbox" name='chk_m_w_detail[]' value="2" <?= ($info['m_w_detail'] & 2) == '2' ? 'checked="checked"' : '' ?>/><?= $lang->line('m_w_detail_2') ?>
<?php else: ?>
								<input type="checkbox" name='chk_m_w_detail[]' value="2" /><?= $lang->line('m_w_detail_2') ?>
<?php endif; ?>
							</label>
						</div>
					</div>
					<div class="col-sm-2">
						<label class="control-label">　</label>
						<div class='checkbox'>
							<label>
<?php if (strval($id) != '0'): ?>
								<input type="checkbox" name='chk_m_w_detail[]' value="4" <?= ($info['m_w_detail'] & 4) == '4' ? 'checked="checked"' : '' ?>/><?= $lang->line('m_w_detail_3') ?>
<?php else: ?>
								<input type="checkbox" name='chk_m_w_detail[]' value="4" /><?= $lang->line('m_w_detail_3') ?>								
<?php endif; ?>
							</label>
						</div>
					</div>
					<div class="col-sm-2">
						<label class="control-label">　</label>
						<div class='checkbox'>
							<label>
<?php if (strval($id) != '0'): ?>
								<input type="checkbox" name='chk_m_w_detail[]' value="8" <?= ($info['m_w_detail'] & 8) == '8' ? 'checked="checked"' : '' ?>/><?= $lang->line('m_w_detail_4') ?>
<?php else: ?>
								<input type="checkbox" name='chk_m_w_detail[]' value="8" /><?= $lang->line('m_w_detail_4') ?>
<?php endif; ?>
							</label>
						</div>
					</div>
					<div class="col-sm-2">
						<label class="control-label">　</label>
						<div class='checkbox'>
							<label>
<?php if (strval($id) != '0'): ?>
								<input type="checkbox" name='chk_m_w_detail[]' value="16" <?= ($info['m_w_detail'] & 16) == '16' ? 'checked="checked"' : '' ?>/><?= $lang->line('m_w_detail_5') ?>
<?php else: ?>
								<input type="checkbox" name='chk_m_w_detail[]' value="16" /><?= $lang->line('m_w_detail_5') ?>
<?php endif; ?>
							</label>
						</div>
					</div>
					<div class="col-sm-1">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-3">
						<div class='checkbox'>
							<label>
<?php if (strval($id) != '0'): ?>
								<input type="checkbox" name='chk_m_w_detail[]' value="32" <?= ($info['m_w_detail'] & 32) == '32' ? 'checked="checked"' : '' ?>/><?= $lang->line('m_w_detail_6') ?>
<?php else: ?>
								<input type="checkbox" name='chk_m_w_detail[]' value="32" /><?= $lang->line('m_w_detail_6') ?>
<?php endif; ?>
							</label>
						</div>
					</div>
					<div class="col-sm-2">
						<div class='checkbox'>
							<label>
<?php if (strval($id) != '0'): ?>
								<input type="checkbox" name='chk_m_w_detail[]' value="64" <?= ($info['m_w_detail'] & 64) == '64' ? 'checked="checked"' : '' ?>/><?= $lang->line('m_w_detail_7') ?>
<?php else: ?>
								<input type="checkbox" name='chk_m_w_detail[]' value="64" /><?= $lang->line('m_w_detail_7') ?>
<?php endif; ?>
							</label>
						</div>
					</div>
					<div class="col-sm-2">
						<div class='checkbox'>
							<label>
<?php if (strval($id) != '0'): ?>
								<input type="checkbox" name='chk_m_w_detail[]' value="128" <?= ($info['m_w_detail'] & 128) == '128' ? 'checked="checked"' : '' ?>/><?= $lang->line('m_w_detail_8') ?>
<?php else: ?>
								<input type="checkbox" name='chk_m_w_detail[]' value="128" /><?= $lang->line('m_w_detail_8') ?>
<?php endif; ?>
							</label>
						</div>
					</div>
					<div class="col-sm-2">
						<div class='checkbox'>
							<label>
<?php if (strval($id) != '0'): ?>
								<input type="checkbox" name='chk_m_w_detail[]' value="256" <?= ($info['m_w_detail'] & 256) == '256' ? 'checked="checked"' : '' ?>/><?= $lang->line('m_w_detail_9') ?>
<?php else: ?>
								<input type="checkbox" name='chk_m_w_detail[]' value="256" /><?= $lang->line('m_w_detail_9') ?>
<?php endif; ?>
							</label>
						</div>
					</div>
					<div class="col-sm-2">
						<div class='checkbox'>
							<label>
<?php if (strval($id) != '0'): ?>
								<input type="checkbox" name='chk_m_w_detail[]' value="512" <?= ($info['m_w_detail'] & 512) == '512' ? 'checked="checked"' : '' ?>/><?= $lang->line('m_w_detail_10') ?>
<?php else: ?>
								<input type="checkbox" name='chk_m_w_detail[]' value="512" /><?= $lang->line('m_w_detail_10') ?>
<?php endif; ?>
							</label>
						</div>
					</div>
					<div class="col-sm-1">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-3">
						<div class='checkbox'>
							<label>
<?php if (strval($id) != '0'): ?>
								<input type="checkbox" name='chk_m_w_detail[]' value="1024" <?= ($info['m_w_detail'] & 1024) == '1024' ? 'checked="checked"' : '' ?>/><?= $lang->line('m_w_detail_11') ?>
<?php else: ?>
								<input type="checkbox" name='chk_m_w_detail[]' value="1024" /><?= $lang->line('m_w_detail_11') ?>
<?php endif; ?>
							</label>
						</div>
					</div>
					<div class="col-sm-2">
						<div class='checkbox'>
							<label>
<?php if (strval($id) != '0'): ?>
								<input type="checkbox" name='chk_m_w_detail[]' value="2048" <?= ($info['m_w_detail'] & 2048) == '2048' ? 'checked="checked"' : '' ?>/><?= $lang->line('m_w_detail_12') ?>
<?php else: ?>
								<input type="checkbox" name='chk_m_w_detail[]' value="2048" /><?= $lang->line('m_w_detail_12') ?>
<?php endif; ?>
							</label>
						</div>
					</div>
					<div class="col-sm-2">
						<div class='checkbox'>
							<label>
<?php if (strval($id) != '0'): ?>
								<input type="checkbox" name='chk_m_w_detail[]' value="4096" <?= ($info['m_w_detail'] & 4096) == '4096' ? 'checked="checked"' : '' ?>/><?= $lang->line('m_w_detail_13') ?>
<?php else: ?>
								<input type="checkbox" name='chk_m_w_detail[]' value="4096" /><?= $lang->line('m_w_detail_13') ?>
<?php endif; ?>
							</label>
						</div>
					</div>
					<div class="col-sm-2">
						<div class='checkbox'>
							<label>
<?php if (strval($id) != '0'): ?>
								<input type="checkbox" name='chk_m_w_detail[]' value="8192" <?= ($info['m_w_detail'] & 8192 )== '8192' ? 'checked="checked"' : '' ?>/><?= $lang->line('m_w_detail_14') ?>
<?php else: ?>
								<input type="checkbox" name='chk_m_w_detail[]' value="8192" /><?= $lang->line('m_w_detail_14') ?>
<?php endif; ?>
							</label>
						</div>
					</div>
					<div class="col-sm-2">
						<div class='checkbox'>
							<label>
<?php if (strval($id) != '0'): ?>
								<input type="checkbox" name='chk_m_w_detail[]' value="16384" <?= ($info['m_w_detail'] & 16384) == '16384' ? 'checked="checked"' : '' ?>/><?= $lang->line('m_w_detail_15') ?>
<?php else: ?>
								<input type="checkbox" name='chk_m_w_detail[]' value="16384" /><?= $lang->line('m_w_detail_15') ?>
<?php endif; ?>
							</label>
						</div>
					</div>
					<div class="col-sm-1">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-3">
						<div class='checkbox'>
							<label>
<?php if (strval($id) != '0'): ?>
								<input type="checkbox" name='chk_m_w_detail[]' value="32768" <?= ($info['m_w_detail'] & 32768) == '32768' ? 'checked="checked"' : '' ?>/><?= $lang->line('m_w_detail_16') ?>
<?php else: ?>
								<input type="checkbox" name='chk_m_w_detail[]' value="32768" /><?= $lang->line('m_w_detail_16') ?>
<?php endif; ?>
							</label>
						</div>
					</div>
					<div class="col-sm-1">
						<div class='checkbox'>
							<label>
<?php if (strval($id) != '0'): ?>
								<input type="checkbox" name='chk_m_w_detail[]' value="65536" <?= ($info['m_w_detail'] & 65536) == '65536' ? 'checked="checked"' : '' ?>/><?= $lang->line('other') ?>
<?php else: ?>
								<input type="checkbox" name='chk_m_w_detail[]' value="65536" /><?= $lang->line('other') ?>
<?php endif; ?>
							</label>
						</div>
					</div>
					<div class="col-sm-7">
						<div>
<?php if (strval($id) != '0'): ?>
							<input type="text" class="form-control" name="txt_m_w_detail_descr" value='<?= $info['m_w_detail_descr']?>'>
<?php else: ?>
							<input type="text" class="form-control" name="txt_m_w_detail_descr" value=''>
<?php endif; ?>	
						</div>
					</div>
					<div class="col-sm-1">
					</div>	
				</div>
				<div class="form-group">
					<div class="col-sm-3">
						<label class="control-label"><?= $lang->line('m_w_wash') ?></label>
						<div class='checkbox'>
							<label>
<?php if (strval($id) != '0'): ?>
								<input type="checkbox" name='chk_m_w_wash[]' value="1" <?= ($info['m_w_wash'] & 1) == '1' ? 'checked="checked"' : '' ?>/><?= $lang->line('m_w_wash_1') ?>
<?php else: ?>
								<input type="checkbox" name='chk_m_w_wash[]' value="1" /><?= $lang->line('m_w_wash_1') ?>
<?php endif; ?>
							</label>
						</div>
					</div>
					<div class="col-sm-2">
						<label class="control-label">　</label>
						<div class='checkbox'>
							<label>
<?php if (strval($id) != '0'): ?>
								<input type="checkbox" name='chk_m_w_wash[]' value="2" <?= ($info['m_w_wash'] & 2) == '2' ? 'checked="checked"' : '' ?>/><?= $lang->line('m_w_wash_2') ?>
<?php else: ?>
								<input type="checkbox" name='chk_m_w_wash[]' value="2" /><?= $lang->line('m_w_wash_2') ?>
<?php endif; ?>
							</label>
						</div>
					</div>
					<div class="col-sm-2">
						<label class="control-label">　</label>
						<div class='checkbox'>
							<label>
<?php if (strval($id) != '0'): ?>
								<input type="checkbox" name='chk_m_w_wash[]' value="4" <?= ($info['m_w_wash'] & 4) == '4' ? 'checked="checked"' : '' ?>/><?= $lang->line('m_w_wash_3') ?>
<?php else: ?>
								<input type="checkbox" name='chk_m_w_wash[]' value="4" /><?= $lang->line('m_w_wash_3') ?>
<?php endif; ?>
							</label>
						</div>
					</div>
					<div class="col-sm-2">
						<label class="control-label">　</label>
						<div class='checkbox'>
							<label>
<?php if (strval($id) != '0'): ?>
								<input type="checkbox" name='chk_m_w_wash[]' value="8" <?= ($info['m_w_wash'] & 8) == '8' ? 'checked="checked"' : '' ?>/><?= $lang->line('m_w_wash_4') ?>
<?php else: ?>
								<input type="checkbox" name='chk_m_w_wash[]' value="8" /><?= $lang->line('m_w_wash_4') ?>
<?php endif; ?>
							</label>
						</div>
					</div>
					<div class="col-sm-2">
						<label class="control-label">　</label>
						<div class='checkbox'>
							<label>
<?php if (strval($id) != '0'): ?>
								<input type="checkbox" name='chk_m_w_wash[]' value="16" <?= ($info['m_w_wash'] & 16) == '16' ? 'checked="checked"' : '' ?>/><?= $lang->line('m_w_wash_5') ?>
<?php else: ?>
								<input type="checkbox" name='chk_m_w_wash[]' value="16" /><?= $lang->line('m_w_wash_5') ?>
<?php endif; ?>
							</label>
						</div>
					</div>
					<div class="col-sm-1">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-3">
						<div class='checkbox'>
							<label>
<?php if (strval($id) != '0'): ?>
								<input type="checkbox" name='chk_m_w_wash[]' value="32" <?= ($info['m_w_wash'] & 32) == '32' ? 'checked="checked"' : '' ?>/><?= $lang->line('m_w_wash_6') ?>
<?php else: ?>
								<input type="checkbox" name='chk_m_w_wash[]' value="32" /><?= $lang->line('m_w_wash_6') ?>
<?php endif; ?>
							</label>
						</div>
					</div>
					<div class="col-sm-2">
						<div class='checkbox'>
							<label>
<?php if (strval($id) != '0'): ?>
								<input type="checkbox" name='chk_m_w_wash[]' value="64" <?= ($info['m_w_wash'] & 64) == '64' ? 'checked="checked"' : '' ?>/><?= $lang->line('m_w_wash_7') ?>
<?php else: ?>
								<input type="checkbox" name='chk_m_w_wash[]' value="64" /><?= $lang->line('m_w_wash_7') ?>
<?php endif; ?>
							</label>
						</div>
					</div>
					<div class="col-sm-7">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-2">
						<div class='checkbox'>
							<label>
<?php if (strval($id) != '0'): ?>
								<input type="checkbox" name='chk_m_w_home[]' value="1" <?= ($info['m_w_home'] & 1) == '1' ? 'checked="checked"' : '' ?>/><?= $lang->line('m_w_home') ?>
<?php else: ?>
								<input type="checkbox" name='chk_m_w_home[]' value="1" /><?= $lang->line('m_w_home') ?>
<?php endif; ?>
							</label>
						</div>
					</div>
					<div class="col-sm-1">
						<div class='checkbox'>
							<label>
<?php if (strval($id) != '0'): ?>								
								<input type="checkbox" name='chk_m_w_home[]' value="2" <?= ($info['m_w_home'] & 2) == '2' ? 'checked="checked"' : '' ?>/><?= $lang->line('m_w_home_1') ?>
<?php else: ?>
								<input type="checkbox" name='chk_m_w_home[]' value="2" /><?= $lang->line('m_w_home_1') ?>
<?php endif; ?>
							</label>
						</div>
					</div>
					<div class="col-sm-2">
						<div class='checkbox'>
							<label>
<?php if (strval($id) != '0'): ?>
								<input type="checkbox" name='chk_m_w_home[]' value="4" <?= ($info['m_w_home'] & 4 )== '4' ? 'checked="checked"' : '' ?>/><?= $lang->line('m_w_home_2') ?>
<?php else: ?>
								<input type="checkbox" name='chk_m_w_home[]' value="4" /><?= $lang->line('m_w_home_2') ?>
<?php endif; ?>
							</label>
						</div>
					</div>
					<div class="col-sm-1">
						<div class='checkbox'>
							<label>
<?php if (strval($id) != '0'): ?>
								<input type="checkbox" name='chk_m_w_home[]' value="8" <?= ($info['m_w_home'] & 8) == '8' ? 'checked="checked"' : '' ?>/><?= $lang->line('m_w_home_3') ?>
<?php else: ?>
								<input type="checkbox" name='chk_m_w_home[]' value="8" /><?= $lang->line('m_w_home_3') ?>
<?php endif; ?>
							</label>
						</div>
					</div>
					<div class="col-sm-1">
						<div class='checkbox'>
							<label>
<?php if (strval($id) != '0'): ?>
								<input type="checkbox" name='chk_m_w_home[]' value="16" <?= ($info['m_w_home'] & 16) == '16' ? 'checked="checked"' : '' ?>/><?= $lang->line('m_w_home_4') ?>
<?php else: ?>
								<input type="checkbox" name='chk_m_w_home[]' value="16" /><?= $lang->line('m_w_home_4') ?>
<?php endif; ?>
							</label>
						</div>
					</div>
					<div class="col-sm-1">
						<div class='checkbox'>
							<label>
<?php if (strval($id) != '0'): ?>
								<input type="checkbox" name='chk_m_w_home[]' value="32" <?= ($info['m_w_home'] & 32) == '32' ? 'checked="checked"' : '' ?>/><?= $lang->line('m_w_home_5') ?>
<?php else: ?>
								<input type="checkbox" name='chk_m_w_home[]' value="32" /><?= $lang->line('m_w_home_5') ?>
<?php endif; ?>						
							</label>
						</div>
					</div>
					<div class="col-sm-1">
						<div class='checkbox'>
							<label>
<?php if (strval($id) != '0'): ?>
								<input type="checkbox" name='chk_m_w_home[]' value="64" <?= ($info['m_w_home'] & 64) == '64' ? 'checked="checked"' : '' ?>/><?= $lang->line('m_w_home_6') ?>
<?php else: ?>
								<input type="checkbox" name='chk_m_w_home[]' value="64" /><?= $lang->line('m_w_home_6') ?>
<?php endif; ?>
							</label>
						</div>
					</div>
					<div class="col-sm-3">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-1">
					</div>
					<div class="col-sm-1">
						<div class='checkbox'>
							<?= $lang->line('m_w_home_0') ?>
						</div>
					</div>
					<div class="col-sm-1">
						<div>
<?php if (strval($id) != '0'): ?>
								<input type="text" class="form-control" name="txt_m_w_home2" value='<?= $info['m_w_home2']?>' pattern="[0-9]+">
<?php else: ?>
								<input type="text" class="form-control" name="txt_m_w_home2" value='' pattern="[0-9]+">
<?php endif; ?>	
						</div>
					</div>
					<div class="col-sm-1">
						<div class='checkbox'>
							<?= $lang->line('m_w_home2') ?>
						</div>
					</div>
					<div class="col-sm-1">
						<div>
<?php if (strval($id) != '0'): ?>
								<input type="text" class="form-control" name="txt_m_w_home3" value='<?= $info['m_w_home3']?>' pattern="[0-9]+">
<?php else: ?>
								<input type="text" class="form-control" name="txt_m_w_home3" value='' pattern="[0-9]+">
<?php endif; ?>	
						</div>
					</div>
					<div class="col-sm-1">
						<div class='checkbox'>
							<?= $lang->line('m_w_home3') ?>
						</div>
					</div>
					<div class="col-sm-1">
						<div>
<?php if (strval($id) != '0'): ?>
								<input type="text" class="form-control" name="txt_m_w_home4" value='<?= $info['m_w_home4']?>' pattern="[0-9]+">
<?php else: ?>
								<input type="text" class="form-control" name="txt_m_w_home4" value='' pattern="[0-9]+">
<?php endif; ?>	
						</div>
					</div>
					<div class="col-sm-1">
						<div class='checkbox'>
							<?= $lang->line('m_w_home4') ?>
						</div>
					</div>
					<div class="col-sm-1">
						<div class='checkbox'>
							<?= $lang->line('about') ?>
						</div>
					</div>
					<div class="col-sm-1">
						<div>
<?php if (strval($id) != '0'): ?>
								<input type="text" class="form-control" name="txt_m_w_home5" value='<?= $info['m_w_home5']?>' pattern="[0-9]+">
<?php else: ?>
								<input type="text" class="form-control" name="txt_m_w_home5" value='' pattern="[0-9]+">
<?php endif; ?>	
						</div>
					</div>
					<div class="col-sm-1">
						<div class='checkbox'>
							<?= $lang->line('m_w_home5') ?>
						</div>
					</div>
					<div class="col-sm-1">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-2">
						<div class='checkbox'>
							<label>
<?php if (strval($id) != '0'): ?>
								<input type="checkbox" name='chk_m_w_home[]' value="128" <?= ($info['m_w_home'] & 128) == '128' ? 'checked="checked"' : '' ?>/><?= $lang->line('m_w_home_7') ?>
<?php else: ?>
								<input type="checkbox" name='chk_m_w_home[]' value="128" /><?= $lang->line('m_w_home_7') ?>
<?php endif; ?>
							</label>
						</div>
					</div>
					<div class="col-sm-1">
						<div class='checkbox'>
							<label>
<?php if (strval($id) != '0'): ?>
								<input type="checkbox" name='chk_m_w_home[]' value="256" <?= ($info['m_w_home'] & 256) == '256' ? 'checked="checked"' : '' ?>/><?= $lang->line('m_w_home_8') ?>
<?php else: ?>
								<input type="checkbox" name='chk_m_w_home[]' value="256" /><?= $lang->line('m_w_home_8') ?>
<?php endif; ?>
							</label>
						</div>
					</div>
					<div class="col-sm-1">
						<div class='checkbox'>
							<label>
<?php if (strval($id) != '0'): ?>
								<input type="checkbox" name='chk_m_w_home[]' value="512" <?= ($info['m_w_home'] & 512) == '512' ? 'checked="checked"' : '' ?>/><?= $lang->line('m_w_home_9') ?>
<?php else: ?>
								<input type="checkbox" name='chk_m_w_home[]' value="512" /><?= $lang->line('m_w_home_9') ?>
<?php endif; ?>
							</label>
						</div>
					</div>
					<div class="col-sm-1">
						<div class='checkbox'>
							<label>
<?php if (strval($id) != '0'): ?>
								<input type="checkbox" name='chk_m_w_home[]' value="1024" <?= ($info['m_w_home'] & 1024) == '1024' ? 'checked="checked"' : '' ?>/><?= $lang->line('other') ?>
<?php else: ?>
								<input type="checkbox" name='chk_m_w_home[]' value="1024" /><?= $lang->line('other') ?>
<?php endif; ?>
							</label>
						</div>
					</div>
					<div class="col-sm-6">
						<div>
<?php if (strval($id) != '0'): ?>
							<input type="text" class="form-control" name="txt_m_w_pet" value='<?= $info['m_w_pet']?>' >
<?php else: ?>
							<input type="text" class="form-control" name="txt_m_w_pet" value=''>
<?php endif; ?>	
						</div>
					</div>
					<div class="col-sm-1">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-2">
						<label class="control-label">　</label>
						<div class='checkbox'>
							<label>
<?php if (strval($id) != '0'): ?>
								<input type="checkbox" name='chk_m_w_home[]' value="2048" <?= ($info['m_w_home'] & 2048) == '2048' ? 'checked="checked"' : '' ?>/><?= $lang->line('m_w_home_10') ?>
<?php else: ?>
								<input type="checkbox" name='chk_m_w_home[]' value="2048" /><?= $lang->line('m_w_home_10') ?>
<?php endif; ?>
							</label>
							<?= '　'.$lang->line('pet') ?>
						</div>
					</div>
					<div class="col-sm-2">
						<label class="control-label">　</label>
<?php if (strval($id) != '0'): ?>
						<div class="checkbox"><?= $info['sum']?></div>
<?php else: ?>
						<div class="checkbox"><?= $lang->line('auto_count_after_save') ?></div>
<?php endif; ?>
					</div>
					<div class="col-sm-1">
						<label class="control-label">　</label>
						<div class='checkbox'>
							<?= $lang->line('single') ?>
						</div>
					</div>
					<div class="col-sm-1">
						<label class="control-label"><?= $lang->line('m_w_pet2') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
								<input type="text" class="form-control" name="txt_m_w_pet2" value='<?= $info['m_w_pet2']?>' pattern="[0-9]+">
<?php else: ?>
								<input type="text" class="form-control" name="txt_m_w_pet2" value='' pattern="[0-9]+">
<?php endif; ?>	
						</div>
					</div>
					<div class="col-sm-1">
						<label class="control-label">　</label>
						<div class='checkbox'>
							<?= $lang->line('single') ?>
						</div>
					</div>
					<div class="col-sm-1">
						<label class="control-label"><?= $lang->line('m_w_pet3') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
								<input type="text" class="form-control" name="txt_m_w_pet3" value='<?= $info['m_w_pet3']?>' pattern="[0-9]+">
<?php else: ?>
								<input type="text" class="form-control" name="txt_m_w_pet3" value='' pattern="[0-9]+">
<?php endif; ?>	
						</div>
					</div>
					<div class="col-sm-1">
						<label class="control-label">　</label>
						<div class='checkbox'>
							<?= $lang->line('single') ?>
						</div>
					</div>
					<div class="col-sm-1">
						<label class="control-label"><?= $lang->line('m_w_pet4') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
								<input type="text" class="form-control" name="txt_m_w_pet4" value='<?= $info['m_w_pet4']?>' pattern="[0-9]+">
<?php else: ?>
								<input type="text" class="form-control" name="txt_m_w_pet4" value='' pattern="[0-9]+">
<?php endif; ?>	
						</div>
					</div>
					<div class="col-sm-1">
						<label class="control-label">　</label>
						<div class='checkbox'>
							<?= $lang->line('single') ?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-1">
						<div class='checkbox'>
							<label>
<?php if (strval($id) != '0'): ?>								
								<input type="checkbox" name='chk_m_w_home[]' value="4096" <?= ($info['m_w_home'] & 4096) == '4096' ? 'checked="checked"' : '' ?>/><?= $lang->line('other') ?>
<?php else: ?>
								<input type="checkbox" name='chk_m_w_home[]' value="4096" /><?= $lang->line('other') ?>
<?php endif; ?>
							</label>
						</div>
					</div>
					<div class="col-sm-10">
						<div>
<?php if (strval($id) != '0'): ?>
								<input type="text" class="form-control" name="txt_m_w_pet5" value='<?= $info['m_w_pet5']?>'>
<?php else: ?>
								<input type="text" class="form-control" name="txt_m_w_pet5" value=''>
<?php endif; ?>	
						</div>
					</div>
					<div class="col-sm-1">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-3">
						<label class="control-label"><?= $lang->line('m_w_cook') ?></label>
						<div class='checkbox'>
							<label>
<?php if (strval($id) != '0'): ?>
								<input type="checkbox" name='chk_m_w_cook[]' value="1" <?= ($info['m_w_cook'] & 1) == '1' ? 'checked="checked"' : '' ?>/><?= $lang->line('m_w_cook_1') ?>
<?php else: ?>
								<input type="checkbox" name='chk_m_w_cook[]' value="1" /><?= $lang->line('m_w_cook_1') ?>
<?php endif; ?>
							</label>
						</div>
					</div>
					<div class="col-sm-2">
						<label class="control-label">　</label>
						<div class='checkbox'>
							<label>
<?php if (strval($id) != '0'): ?>
								<input type="checkbox" name='chk_m_w_cook[]' value="2" <?= ($info['m_w_cook'] & 2) == '2' ? 'checked="checked"' : '' ?>/><?= $lang->line('m_w_cook_2') ?>
<?php else: ?>
								<input type="checkbox" name='chk_m_w_cook[]' value="2" /><?= $lang->line('m_w_cook_2') ?>
<?php endif; ?>
							</label>
						</div>
					</div>
					<div class="col-sm-2">
						<label class="control-label">　</label>
						<div class='checkbox'>
							<label>
<?php if (strval($id) != '0'): ?>
								<input type="checkbox" name='chk_m_w_cook[]' value="4" <?= ($info['m_w_cook'] & 4) == '4' ? 'checked="checked"' : '' ?>/><?= $lang->line('m_w_cook_3') ?>
<?php else: ?>
								<input type="checkbox" name='chk_m_w_cook[]' value="4" /><?= $lang->line('m_w_cook_3') ?>
<?php endif; ?>
							</label>
						</div>
					</div>
					<div class="col-sm-1">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-3">
						<div class='checkbox'>
							<label>
<?php if (strval($id) != '0'): ?>
								<input type="checkbox" name='chk_m_w_cook_detail[]' value="1" <?= ($info['m_w_cook_detail'] & 1) == '1' ? 'checked="checked"' : '' ?>/><?= $lang->line('m_w_cook_detail') ?>
<?php else: ?>
								<input type="checkbox" name='chk_m_w_cook_detail[]' value="1" /><?= $lang->line('m_w_cook_detail') ?>
<?php endif; ?>
							</label>
						</div>
					</div>
					<div class="col-sm-2">
						<div class='checkbox'>
							<label>
<?php if (strval($id) != '0'): ?>
								<input type="checkbox" name='chk_m_w_cook_detail[]' value="2" <?= ($info['m_w_cook_detail'] & 2) == '2' ? 'checked="checked"' : '' ?>/><?= $lang->line('m_w_cook_detail_1') ?>
<?php else: ?>
								<input type="checkbox" name='chk_m_w_cook_detail[]' value="2" /><?= $lang->line('m_w_cook_detail_1') ?>
<?php endif; ?>
							</label>
						</div>
					</div>
					<div class="col-sm-2">
						<div class='checkbox'>
							<label>
<?php if (strval($id) != '0'): ?>
								<input type="checkbox" name='chk_m_w_cook_detail[]' value="4" <?= ($info['m_w_cook_detail'] & 4) == '4' ? 'checked="checked"' : '' ?>/><?= $lang->line('m_w_cook_detail_2') ?>
<?php else: ?>
								<input type="checkbox" name='chk_m_w_cook_detail[]' value="4" /><?= $lang->line('m_w_cook_detail_2') ?>
<?php endif; ?>
							</label>
						</div>
					</div>
					<div class="col-sm-2">
						<div class='checkbox'>
							<label>
<?php if (strval($id) != '0'): ?>
								<input type="checkbox" name='chk_m_w_cook_detail[]' value="8" <?= ($info['m_w_cook_detail'] & 8) == '8' ? 'checked="checked"' : '' ?>/><?= $lang->line('m_w_cook_detail_3') ?>
<?php else: ?>
								<input type="checkbox" name='chk_m_w_cook_detail[]' value="8" /><?= $lang->line('m_w_cook_detail_3') ?>
<?php endif; ?>
							</label>
						</div>
					</div>
					<div class="col-sm-3">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-3">
						<div class='checkbox'>
							<label>
<?php if (strval($id) != '0'): ?>
								<input type="checkbox" name='chk_m_w_cook_detail[]' value="16" <?= ($info['m_w_cook_detail'] & 16) == '16' ? 'checked="checked"' : '' ?>/><?= $lang->line('m_w_cook_detail_4') ?>
<?php else: ?>
								<input type="checkbox" name='chk_m_w_cook_detail[]' value="16" /><?= $lang->line('m_w_cook_detail_4') ?>
<?php endif; ?>
							</label>
						</div>
					</div>
					<div class="col-sm-2">
						<div class='checkbox'>
							<label>
<?php if (strval($id) != '0'): ?>
								<input type="checkbox" name='chk_m_w_cook_detail[]' value="32" <?= ($info['m_w_cook_detail'] & 32) == '32' ? 'checked="checked"' : '' ?>/><?= $lang->line('m_w_cook_detail_5') ?>
<?php else: ?>
								<input type="checkbox" name='chk_m_w_cook_detail[]' value="32" /><?= $lang->line('m_w_cook_detail_5') ?>
<?php endif; ?>
							</label>
						</div>
					</div>
					<div class="col-sm-2">
						<div class='checkbox'>
							<label>
<?php if (strval($id) != '0'): ?>
								<input type="checkbox" name='chk_m_w_cook_detail[]' value="64" <?= ($info['m_w_cook_detail'] & 64) == '64' ? 'checked="checked"' : '' ?>/><?= $lang->line('m_w_cook_detail_6') ?>
<?php else: ?>
								<input type="checkbox" name='chk_m_w_cook_detail[]' value="64" /><?= $lang->line('m_w_cook_detail_6') ?>
<?php endif; ?>
							</label>
						</div>
					</div>
					<div class="col-sm-2">
						<div class='checkbox'>
							<label>
<?php if (strval($id) != '0'): ?>
								<input type="checkbox" name='chk_m_w_cook_detail[]' value="128" <?= ($info['m_w_cook_detail'] & 128) == '128' ? 'checked="checked"' : '' ?>/><?= $lang->line('m_w_cook_detail_7') ?>
<?php else: ?>
								<input type="checkbox" name='chk_m_w_cook_detail[]' value="128" /><?= $lang->line('m_w_cook_detail_7') ?>
<?php endif; ?>
							</label>
						</div>
					</div>
					<div class="col-sm-3">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-1">
						<label class="control-label">　</label>
						<div class='checkbox'>
							<?= $lang->line('attend_people') ?>
						</div>
					</div>
					<div class="col-sm-2">
						<label class="control-label">　</label>
<?php if (strval($id) != '0'): ?>
						<div class="checkbox">
							<? $sum = 0 ;?>
							<? (strlen($info['m_w_child']) == 0 ? $sum : $sum = $sum + 1 ); ?>
							<? (strlen($info['m_w_child2']) == 0 ? $sum : $sum = $sum + 1 ); ?>
							<? (strlen($info['m_w_child3']) == 0 ? $sum : $sum = $sum + 1 ); ?>
							<? (strlen($info['m_w_child4']) == 0 ? $sum : $sum = $sum + 1 ); ?>
							<?= $sum ; ?>
						</div>
<?php else: ?>
						<div class="checkbox"><?= $lang->line('auto_count_after_save') ?></div>
<?php endif; ?>
					</div>
					<div class="col-sm-1">
						<label class="control-label">　</label>
						<div class='checkbox'>
							<?= $lang->line('people') ?>
						</div>
					</div>
					<div class="col-sm-1">
						<label class="control-label"><?= $lang->line('m_w_child') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
								<input type="text" class="form-control" name="txt_m_w_child" value='<?= $info['m_w_child']?>' pattern="[0-9]+">
<?php else: ?>
								<input type="text" class="form-control" name="txt_m_w_child" value='' pattern="[0-9]+">
<?php endif; ?>	
						</div>
					</div>
					<div class="col-sm-1">
						<label class="control-label">　</label>
						<div class='checkbox'>
							<?= $lang->line('year_old') ?>
						</div>
					</div>
					<div class="col-sm-1">
						<label class="control-label"><?= $lang->line('m_w_child') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
								<input type="text" class="form-control" name="txt_m_w_child2" value='<?= $info['m_w_child2']?>' pattern="[0-9]+">
<?php else: ?>
								<input type="text" class="form-control" name="txt_m_w_child2" value='' pattern="[0-9]+">
<?php endif; ?>	
						</div>
					</div>
					<div class="col-sm-1">
						<label class="control-label">　</label>
						<div class='checkbox'>
							<?= $lang->line('year_old') ?>
						</div>
					</div>
					<div class="col-sm-1">
						<label class="control-label"><?= $lang->line('m_w_child') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
								<input type="text" class="form-control" name="txt_m_w_child3" value='<?= $info['m_w_child3']?>' pattern="[0-9]+">
<?php else: ?>
								<input type="text" class="form-control" name="txt_m_w_child3" value='' pattern="[0-9]+">
<?php endif; ?>	
						</div>
					</div>
					<div class="col-sm-1">
						<label class="control-label">　</label>
						<div class='checkbox'>
							<?= $lang->line('year_old') ?>
						</div>
					</div>
					<div class="col-sm-1">
						<label class="control-label"><?= $lang->line('m_w_child') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
								<input type="text" class="form-control" name="txt_m_w_child4" value='<?= $info['m_w_child4']?>' pattern="[0-9]+">
<?php else: ?>
								<input type="text" class="form-control" name="txt_m_w_child4" value='' pattern="[0-9]+">
<?php endif; ?>	
						</div>
					</div>
					<div class="col-sm-1">
						<label class="control-label">　</label>
						<div class='checkbox'>
							<?= $lang->line('year_old') ?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-3">
						<label class="control-label"><?= $lang->line('m_w_child_detail') ?></label>
						<div class='checkbox'>
							<label>
<?php if (strval($id) != '0'): ?>
								<input type="checkbox" name='chk_m_w_child_detail[]' value="1" <?= ($info['m_w_child_detail'] & 1) == '1' ? 'checked="checked"' : '' ?>/><?= $lang->line('m_w_child_detail_1') ?>
<?php else: ?>
								<input type="checkbox" name='chk_m_w_child_detail[]' value="1" /><?= $lang->line('m_w_child_detail_1') ?>
<?php endif; ?>
							</label>
						</div>
					</div>
					<div class="col-sm-2">
						<label class="control-label">　</label>
						<div class='checkbox'>
							<label>
<?php if (strval($id) != '0'): ?>
								<input type="checkbox" name='chk_m_w_child_detail[]' value="2" <?= ($info['m_w_child_detail'] & 2) == '2' ? 'checked="checked"' : '' ?>/><?= $lang->line('m_w_child_detail_2') ?>
<?php else: ?>
								<input type="checkbox" name='chk_m_w_child_detail[]' value="2" /><?= $lang->line('m_w_child_detail_2') ?>
<?php endif; ?>
							</label>
						</div>
					</div>
					<div class="col-sm-2">
						<label class="control-label">　</label>
						<div class='checkbox'>
							<label>
<?php if (strval($id) != '0'): ?>
								<input type="checkbox" name='chk_m_w_child_detail[]' value="4" <?= ($info['m_w_child_detail'] & 4) == '4' ? 'checked="checked"' : '' ?>/><?= $lang->line('m_w_detail_12') ?>
<?php else: ?>
								<input type="checkbox" name='chk_m_w_child_detail[]' value="4" /><?= $lang->line('m_w_detail_12') ?>
<?php endif; ?>
							</label>
						</div>
					</div>
					<div class="col-sm-2">
						<label class="control-label">　</label>
						<div class='checkbox'>
							<label>
<?php if (strval($id) != '0'): ?>
								<input type="checkbox" name='chk_m_w_child_detail[]' value="8" <?= ($info['m_w_child_detail'] & 8) == '8' ? 'checked="checked"' : '' ?>/><?= $lang->line('m_w_child_detail_3') ?>
<?php else: ?>
								<input type="checkbox" name='chk_m_w_child_detail[]' value="8" /><?= $lang->line('m_w_child_detail_3') ?>
<?php endif; ?>
							</label>
						</div>
					</div>
					<div class="col-sm-3">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-3">
						<div class='checkbox'>
							<label>
<?php if (strval($id) != '0'): ?>								
								<input type="checkbox" name='chk_m_w_child_detail[]' value="16" <?= ($info['m_w_child_detail'] & 16) == '16' ? 'checked="checked"' : '' ?>/><?= $lang->line('m_w_child_detail_4') ?>
<?php else: ?>
								<input type="checkbox" name='chk_m_w_child_detail[]' value="16" /><?= $lang->line('m_w_child_detail_4') ?>
<?php endif; ?>
							</label>
						</div>
					</div>
					<div class="col-sm-2">
						<div class='checkbox'>
							<label>
<?php if (strval($id) != '0'): ?>
								<input type="checkbox" name='chk_m_w_child_detail[]' value="32" <?= ($info['m_w_child_detail'] & 32) == '32' ? 'checked="checked"' : '' ?>/><?= $lang->line('m_w_child_detail_5') ?>
<?php else: ?>
								<input type="checkbox" name='chk_m_w_child_detail[]' value="32" /><?= $lang->line('m_w_child_detail_5') ?>
<?php endif; ?>
							</label>
						</div>
					</div>
					<div class="col-sm-2">
						<div class='checkbox'>
							<label>
<?php if (strval($id) != '0'): ?>
								<input type="checkbox" name='chk_m_w_child_detail[]' value="64" <?= ($info['m_w_child_detail'] & 64) == '64' ? 'checked="checked"' : '' ?>/><?= $lang->line('m_w_child_detail_6') ?>
<?php else: ?>
								<input type="checkbox" name='chk_m_w_child_detail[]' value="64" /><?= $lang->line('m_w_child_detail_6') ?>
<?php endif; ?>
							</label>
						</div>
					</div>
					<div class="col-sm-2">
						<div class='checkbox'>
							<label>
<?php if (strval($id) != '0'): ?>
								<input type="checkbox" name='chk_m_w_child_detail[]' value="128" <?= ($info['m_w_child_detail'] & 128) == '128' ? 'checked="checked"' : '' ?>/><?= $lang->line('m_w_child_detail_7') ?>
<?php else: ?>
								<input type="checkbox" name='chk_m_w_child_detail[]' value="128" /><?= $lang->line('m_w_child_detail_7') ?>
<?php endif; ?>
							</label>
						</div>
					</div>
					<div class="col-sm-3">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-1">
						<div class='checkbox'>
							<label>
<?php if (strval($id) != '0'): ?>
								<input type="checkbox" name='chk_m_w_child_detail[]' value="256" <?= ($info['m_w_child_detail'] & 256) == '256' ? 'checked="checked"' : '' ?>/><?= $lang->line('other') ?>
<?php else: ?>
								<input type="checkbox" name='chk_m_w_child_detail[]' value="256" /><?= $lang->line('other') ?>
<?php endif; ?>
							</label>
						</div>
					</div>
					<div class="col-sm-10">
						<div>
<?php if (strval($id) != '0'): ?>
								<input type="text" class="form-control" name="txt_m_w_child_detail_descr" value='<?= $info['m_w_child_detail_descr']?>'>
<?php else: ?>
								<input type="text" class="form-control" name="txt_m_w_child_detail_descr" value=''>
<?php endif; ?>	
						</div>
					</div>
					<div class="col-sm-1">
					</div>
				</div>
			</div>
			<!-- tab 5 -->
			<div role="tabpanel" class="tab-pane" id="non_f_salary_condition">
				<div class="form-group">
					<div class="col-sm-5">
						<label class="control-label"><?= $lang->line('month_salary') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
								<input type="text" class="form-control" name="txt_month_salary" value='<?= $info['month_salary']?>' pattern="[0-9]+">
<?php else: ?>
								<input type="text" class="form-control" name="txt_month_salary" value='' pattern="[0-9]+">
<?php endif; ?>				
						</div>
					</div>
					<div class="col-sm-1">
						<label class="control-label">　</label>
						<div class="checkbox">
							<?= $lang->line('yuan_month') ?>
						</div>
					</div>
					<div class="col-sm-6">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-5">
						<label class="control-label"><?= $lang->line('m_allowance_salary') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
								<input type="text" class="form-control" name="txt_m_allowance_salary" value='<?= $info['m_allowance_salary']?>' pattern="[0-9]+">
<?php else: ?>
								<input type="text" class="form-control" name="txt_m_allowance_salary" value='' pattern="[0-9]+">
<?php endif; ?>				
						</div>
					</div>
					<div class="col-sm-1">
						<label class="control-label">　</label>
						<div class="checkbox">
							<?= $lang->line('yuan_month') ?>
						</div>
					</div>
					<div class="col-sm-6">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-5">
						<label class="control-label"><?= $lang->line('total') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
						<div class="checkbox"><?= $info['sum_total']?></div>
<?php else: ?>
						<div class="checkbox"><?= $lang->line('auto_count_after_save') ?></div>
<?php endif; ?>			
						</div>
					</div>
					<div class="col-sm-1">
						<label class="control-label">　</label>
						<div class="checkbox">
							<?= $lang->line('yuan_month') ?>
						</div>
					</div>
					<div class="col-sm-6">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-5">
						<label class="control-label"><?= $lang->line('holiday_salary') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
								<input type="text" class="form-control" name="txt_holiday_salary" value='<?= $info['holiday_salary']?>' pattern="[0-9]+">
<?php else: ?>
								<input type="text" class="form-control" name="txt_holiday_salary" value='' pattern="[0-9]+">
<?php endif; ?>	
						</div>
					</div>
					<div class="col-sm-1">
						<label class="control-label">　</label>
						<div class="checkbox">
							<?= $lang->line('yuan_day') ?>
						</div>
					</div>
					<div class="col-sm-6">
					</div>
				</div>
<!--				
				<div class="form-group">
					<div class="col-sm-2">
						<label class="control-label"><?= $lang->line('tax') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
								<input type="text" class="form-control" name="txt_tax" value='<?= $info['tax']?>' pattern="[0-9]+">
<?php else: ?>
								<input type="text" class="form-control" name="txt_tax" value='' pattern="[0-9]+">
<?php endif; ?>	
						</div>
					</div>
					<div class="col-sm-2">
						<label class="control-label"><?= $lang->line('tax2') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
								<input type="text" class="form-control" name="txt_tax2" value='<?= $info['tax2']?>' pattern="[0-9]+">
<?php else: ?>
								<input type="text" class="form-control" name="txt_tax2" value='' pattern="[0-9]+">
<?php endif; ?>	
						</div>
					</div>
					<div class="col-sm-2">
						<label class="control-label"><?= $lang->line('tax3') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
								<input type="text" class="form-control" name="txt_tax3" value='<?= $info['tax3']?>' pattern="[0-9]+">
<?php else: ?>
								<input type="text" class="form-control" name="txt_tax3" value='' pattern="[0-9]+">
<?php endif; ?>	
						</div>
					</div>
					<div class="col-sm-6">
					</div>
				</div>
-->				
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('desc') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
								<input type="text" class="form-control" name="txt_descr_salary" value='<?= $info['descr_salary']?>'>
<?php else: ?>
								<input type="text" class="form-control" name="txt_descr_salary" value=''>
<?php endif; ?>	
						</div>
					</div>
					<div class="col-sm-6">
					</div>
				</div>
			</div>
			<!-- tab 6 -->
			<div role="tabpanel" class="tab-pane" id="non_f_monitor_patient_data">
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('m_patient') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
								<input type="text" class="form-control" name="txt_m_patient" value='<?= $info['m_patient']?>'>
<?php else: ?>
								<input type="text" class="form-control" name="txt_m_patient" value=''>
<?php endif; ?>	
						</div>
					</div>
					<div class="col-sm-6">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('sex') ?> </label>
						<div>
<?php if (strval($id) != '0'): ?>
							<label class="radio-inline">
								<input type="radio" name="rdo_m_patient_gender" id="" value=1 <?= $info['m_patient_gender'] == 1 ? 'checked' : '' ?>> <?= $lang->line('rdo_m') ?>
							</label>
							<label class="radio-inline">
								<input type="radio" name="rdo_m_patient_gender" id="" value=2 <?= $info['m_patient_gender'] == 2 ? 'checked' : '' ?>> <?= $lang->line('rdo_f') ?>
							</label>
<?php else: ?>
							<label class="radio-inline">
								<input type="radio" name="rdo_m_patient_gender" id="" value=1 checked> <?= $lang->line('rdo_m') ?>
							</label>
							<label class="radio-inline">
								<input type="radio" name="rdo_m_patient_gender" id="" value=2> <?= $lang->line('rdo_f') ?>
							</label>
<?php endif; ?>
						</div>
					</div>
					<div class="col-sm-6">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-5">
						<label class="control-label"><?= $lang->line('m_patient_height') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<input type="text" class="form-control" name="txt_m_patient_height" value='<?= $info['m_patient_height']?>' pattern="[0-9]+">
<?php else: ?>
							<input type="text" class="form-control" name="txt_m_patient_height" value='' pattern="[0-9]+">
<?php endif; ?>	
						</div>
					</div>
					<div class="col-sm-1">
						<label class="control-label">　</label>
						<div class="checkbox">
							<?= $lang->line('cm') ?>
						</div>
					</div>
					<div class="col-sm-6">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-5">
						<label class="control-label"><?= $lang->line('m_patient_weight') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<input type="text" class="form-control" name="txt_m_patient_weight" value='<?= $info['m_patient_weight']?>' pattern="[0-9]+">
<?php else: ?>
							<input type="text" class="form-control" name="txt_m_patient_weight" value='' pattern="[0-9]+">
<?php endif; ?>	
						</div>
					</div>
					<div class="col-sm-1">
						<label class="control-label">　</label>
						<div class="checkbox">
							<?= $lang->line('kg') ?>
						</div>
					</div>
					<div class="col-sm-6">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-5">
						<label class="control-label"><?= $lang->line('m_patient_age') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<input type="text" class="form-control" name="txt_m_patient_age" value='<?= $info['m_patient_age']?>' pattern="[0-9]+">
<?php else: ?>
							<input type="text" class="form-control" name="txt_m_patient_age" value='' pattern="[0-9]+">
<?php endif; ?>	
						</div>
					</div>
					<div class="col-sm-1">
						<label class="control-label">　</label>
						<div class="checkbox">
							<?= $lang->line('year_old') ?>
						</div>
					</div>
					<div class="col-sm-6">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('m_patient_descr') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
								<input type="text" class="form-control" name="txt_m_patient_descr" value='<?= $info['m_patient_descr']?>'>
<?php else: ?>
								<input type="text" class="form-control" name="txt_m_patient_descr" value=''>
<?php endif; ?>	
						</div>
					</div>
					<div class="col-sm-6">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-2">
						<label class="control-label"><?= $lang->line('m_patient_item') ?></label>
						<div class='checkbox'>
							<label>
<?php if (strval($id) != '0'): ?>
								<input type="checkbox" name='chk_m_patient_item[]' value="1" <?= ($info['m_patient_item'] & 1) == '1' ? 'checked="checked"' : '' ?>/><?= $lang->line('m_patient_item_1') ?>
<?php else: ?>
								<input type="checkbox" name='chk_m_patient_item[]' value="1" /><?= $lang->line('m_patient_item_1') ?>
<?php endif; ?>
							</label>
						</div>
					</div>
					<div class="col-sm-3">
						<label class="control-label">　</label>
						<div class='checkbox'>
							<label>
<?php if (strval($id) != '0'): ?>
								<input type="checkbox" name='chk_m_patient_item[]' value="2" <?= ($info['m_patient_item'] & 2) == '2' ? 'checked="checked"' : '' ?>/><?= $lang->line('m_patient_item_2') ?>
<?php else: ?>
								<input type="checkbox" name='chk_m_patient_item[]' value="2" /><?= $lang->line('m_patient_item_2') ?>
<?php endif; ?>
							</label>
						</div>
					</div>
					<div class="col-sm-2">
						<label class="control-label">　</label>
						<div class='checkbox'>
							<label>
<?php if (strval($id) != '0'): ?>
								<input type="checkbox" name='chk_m_patient_item[]' value="4" <?= ($info['m_patient_item'] & 4) == '4' ? 'checked="checked"' : '' ?>/><?= $lang->line('m_patient_item_3') ?>
<?php else: ?>
								<input type="checkbox" name='chk_m_patient_item[]' value="4" /><?= $lang->line('m_patient_item_3') ?>
<?php endif; ?>
							</label>
						</div>
					</div>
					<div class="col-sm-2">
						<label class="control-label">　</label>
						<div class='checkbox'>
							<label>
<?php if (strval($id) != '0'): ?>
								<input type="checkbox" name='chk_m_patient_item[]' value="8" <?= ($info['m_patient_item'] & 8) == '8' ? 'checked="checked"' : '' ?>/><?= $lang->line('m_patient_item_4') ?>
<?php else: ?>
								<input type="checkbox" name='chk_m_patient_item[]' value="8" /><?= $lang->line('m_patient_item_4') ?>
<?php endif; ?>
							</label>
						</div>
					</div>
					<div class="col-sm-2">
						<label class="control-label">　</label>
						<div class='checkbox'>
							<label>
<?php if (strval($id) != '0'): ?>
								<input type="checkbox" name='chk_m_patient_item[]' value="16" <?= ($info['m_patient_item'] & 16) == '16' ? 'checked="checked"' : '' ?>/><?= $lang->line('m_patient_item_5') ?>
<?php else: ?>
								<input type="checkbox" name='chk_m_patient_item[]' value="16" /><?= $lang->line('m_patient_item_5') ?>
<?php endif; ?>
							</label>
						</div>
					</div>
					<div class="col-sm-1">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-2">
						<div class='checkbox'>
							<label>
<?php if (strval($id) != '0'): ?>
								<input type="checkbox" name='chk_m_patient_item[]' value="32" <?= ($info['m_patient_item'] & 32) == '32' ? 'checked="checked"' : '' ?>/><?= $lang->line('m_patient_item_6') ?>
<?php else: ?>
								<input type="checkbox" name='chk_m_patient_item[]' value="32" /><?= $lang->line('m_patient_item_6') ?>
<?php endif; ?>
							</label>
						</div>
					</div>
					<div class="col-sm-3">
						<div class='checkbox'>
							<label>
<?php if (strval($id) != '0'): ?>
								<input type="checkbox" name='chk_m_patient_item[]' value="64" <?= ($info['m_patient_item'] & 64) == '64' ? 'checked="checked"' : '' ?>/><?= $lang->line('m_patient_item_7') ?>
<?php else: ?>
								<input type="checkbox" name='chk_m_patient_item[]' value="64" /><?= $lang->line('m_patient_item_7') ?>
<?php endif; ?>
							</label>
						</div>
					</div>
					<div class="col-sm-2">
						<div class='checkbox'>
							<label>
<?php if (strval($id) != '0'): ?>
								<input type="checkbox" name='chk_m_patient_item[]' value="128" <?= ($info['m_patient_item'] & 128) == '128' ? 'checked="checked"' : '' ?>/><?= $lang->line('m_patient_item_8') ?>
<?php else: ?>
								<input type="checkbox" name='chk_m_patient_item[]' value="128" /><?= $lang->line('m_patient_item_8') ?>
<?php endif; ?>
							</label>
						</div>
					</div>
					<div class="col-sm-2">
						<div class='checkbox'>
							<label>
<?php if (strval($id) != '0'): ?>
								<input type="checkbox" name='chk_m_patient_item[]' value="256" <?= ($info['m_patient_item'] & 256) == '256' ? 'checked="checked"' : '' ?>/><?= $lang->line('m_patient_item_9') ?>
<?php else: ?>
								<input type="checkbox" name='chk_m_patient_item[]' value="256" /><?= $lang->line('m_patient_item_9') ?>
<?php endif; ?>
							</label>
						</div>
					</div>
					<div class="col-sm-2">
						<div class='checkbox'>
							<label>
<?php if (strval($id) != '0'): ?>
								<input type="checkbox" name='chk_m_patient_item[]' value="512" <?= ($info['m_patient_item'] & 512) == '512' ? 'checked="checked"' : '' ?>/><?= $lang->line('m_patient_item_10') ?>
<?php else: ?>
								<input type="checkbox" name='chk_m_patient_item[]' value="512" /><?= $lang->line('m_patient_item_10') ?>
<?php endif; ?>
							</label>
						</div>
					</div>
					<div class="col-sm-1">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-1">
						<div class='checkbox'>
							<label>
<?php if (strval($id) != '0'): ?>
								<input type="checkbox" name='chk_m_patient_item[]' value="1024" <?= ($info['m_patient_item'] & 1024) == '1024' ? 'checked="checked"' : '' ?>/><?= $lang->line('other') ?>
<?php else: ?>
								<input type="checkbox" name='chk_m_patient_item[]' value="1024" /><?= $lang->line('other') ?>
<?php endif; ?>
							</label>
						</div>
					</div>
					<div class="col-sm-9">
						<div>
<?php if (strval($id) != '0'): ?>
							<input type="text" class="form-control" name="txt_m_patient_item_descr" value='<?= $info['m_patient_item_descr']?>'>
<?php else: ?>
							<input type="text" class="form-control" name="txt_m_patient_item_descr" value=''>
<?php endif; ?>	
						</div>
					</div>
					<div class="col-sm-2">
					</div>
				</div>	
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('m_patient_item2') ?> </label>
						<div>
<?php if (strval($id) != '0'): ?>
							<label class="radio-inline">
								<input type="radio" name="rdo_m_patient_item2" id="" value=1 <?= $info['m_patient_item2'] == 1 ? 'checked' : '' ?>> <?= $lang->line('rdo_yes') ?>
							</label>
							<label class="radio-inline">
								<input type="radio" name="rdo_m_patient_item2" id="" value=2 <?= $info['m_patient_item2'] == 2 ? 'checked' : '' ?>> <?= $lang->line('rdo_no') ?>
							</label>
<?php else: ?>
							<label class="radio-inline">
								<input type="radio" name="rdo_m_patient_item2" id="" value=1 checked> <?= $lang->line('rdo_yes') ?>
							</label>
							<label class="radio-inline">
								<input type="radio" name="rdo_m_patient_item2" id="" value=2> <?= $lang->line('rdo_no') ?>
							</label>
<?php endif; ?>
						</div>
					</div>
					<div class="col-sm-6">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('m_patient_item3') ?> </label>
						<div>
<?php if (strval($id) != '0'): ?>
							<label class="radio-inline">
								<input type="radio" name="rdo_m_patient_item3" id="" value=1 <?= $info['m_patient_item3'] == 1 ? 'checked' : '' ?>> <?= $lang->line('rdo_yes') ?>
							</label>
							<label class="radio-inline">
								<input type="radio" name="rdo_m_patient_item3" id="" value=2 <?= $info['m_patient_item3'] == 2 ? 'checked' : '' ?>> <?= $lang->line('rdo_no') ?>
							</label>
<?php else: ?>
							<label class="radio-inline">
								<input type="radio" name="rdo_m_patient_item3" id="" value=1 checked> <?= $lang->line('rdo_yes') ?>
							</label>
							<label class="radio-inline">
								<input type="radio" name="rdo_m_patient_item3" id="" value=2> <?= $lang->line('rdo_no') ?>
							</label>
<?php endif; ?>
						</div>
					</div>
					<div class="col-sm-6">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('m_patient_item4') ?> </label>
						<div>
<?php if (strval($id) != '0'): ?>
							<label class="radio-inline">
								<input type="radio" name="rdo_m_patient_item4" id="" value=1 <?= $info['m_patient_item4'] == 1 ? 'checked' : '' ?>> <?= $lang->line('rdo_yes') ?>
							</label>
							<label class="radio-inline">
								<input type="radio" name="rdo_m_patient_item4" id="" value=2 <?= $info['m_patient_item4'] == 2 ? 'checked' : '' ?>> <?= $lang->line('rdo_no') ?>
							</label>
<?php else: ?>
							<label class="radio-inline">
								<input type="radio" name="rdo_m_patient_item4" id="" value=1 checked> <?= $lang->line('rdo_yes') ?>
							</label>
							<label class="radio-inline">
								<input type="radio" name="rdo_m_patient_item4" id="" value=2> <?= $lang->line('rdo_no') ?>
							</label>
<?php endif; ?>
						</div>
					</div>
					<div class="col-sm-6">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('m_patient_item5') ?> </label>
						<div>
<?php if (strval($id) != '0'): ?>
							<label class="radio-inline">
								<input type="radio" name="rdo_m_patient_item5" id="" value=1 <?= $info['m_patient_item5'] == 1 ? 'checked' : '' ?>> <?= $lang->line('rdo_yes') ?>
							</label>
							<label class="radio-inline">
								<input type="radio" name="rdo_m_patient_item5" id="" value=2 <?= $info['m_patient_item5'] == 2 ? 'checked' : '' ?>> <?= $lang->line('rdo_no') ?>
							</label>
<?php else: ?>
							<label class="radio-inline">
								<input type="radio" name="rdo_m_patient_item5" id="" value=1 checked> <?= $lang->line('rdo_yes') ?>
							</label>
							<label class="radio-inline">
								<input type="radio" name="rdo_m_patient_item5" id="" value=2> <?= $lang->line('rdo_no') ?>
							</label>
<?php endif; ?>
						</div>
					</div>
					<div class="col-sm-6">
					</div>
				</div>
			</div>
			<!-- tab 7 -->
			<div role="tabpanel" class="tab-pane" id="non_f_emp_req_condition">
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('m_education') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<?= form_dropdown('sel_m_education', $ary_m_education, $info['m_education'], 'class="form-control"'); ?>
<?php else: ?>
							<?= form_dropdown('sel_m_education', $ary_m_education, '', 'class="form-control"'); ?>
<?php endif; ?>
						</div>
					</div>
					<div class="col-sm-6">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<label class="control-label"><?= $lang->line('m_work_time') ?></label>
						<div class='checkbox'>
							<label>
<?php if (strval($id) != '0'): ?>
								<input type="checkbox" name='chk_m_work_time[]' value="1" <?= ($info['m_work_time'] & 1) == '1' ? 'checked="checked"' : '' ?>/><?= $lang->line('m_work_time_1') ?>
<?php else: ?>
								<input type="checkbox" name='chk_m_work_time[]' value="1" /><?= $lang->line('m_work_time_1') ?>
<?php endif; ?>
							</label>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<div class='checkbox'>
							<label>
<?php if (strval($id) != '0'): ?>
								<input type="checkbox" name='chk_m_work_time[]' value="2" <?= ($info['m_work_time'] & 2) == '2' ? 'checked="checked"' : '' ?>/><?= $lang->line('m_work_time_2') ?>
<?php else: ?>
								<input type="checkbox" name='chk_m_work_time[]' value="2" /><?= $lang->line('m_work_time_2') ?>
<?php endif; ?>
							</label>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<div class='checkbox'>
							<label>
<?php if (strval($id) != '0'): ?>
								<input type="checkbox" name='chk_m_work_time[]' value="4" <?= ($info['m_work_time'] & 4) == '4' ? 'checked="checked"' : '' ?>/><?= $lang->line('m_work_time_3') ?>
<?php else: ?>
								<input type="checkbox" name='chk_m_work_time[]' value="4" /><?= $lang->line('m_work_time_3') ?>
<?php endif; ?>
							</label>
						</div>
					</div>
				</div>		
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('m_personality') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<?= form_dropdown('sel_m_personality', $ary_m_personality, $info['m_personality'], 'class="form-control"'); ?>
<?php else: ?>
							<?= form_dropdown('sel_m_personality', $ary_m_personality, '', 'class="form-control"'); ?>
<?php endif; ?>	
						</div>
					</div>
					<div class="col-sm-6">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('1-6-3') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<?= form_dropdown('sel_m_doc_id6_3', $ary_m_doc_id6_3, $info['m_doc_id6_3'], 'class="form-control"'); ?>
<?php else: ?>
							<?= form_dropdown('sel_m_doc_id6_3', $ary_m_doc_id6_3, '', 'class="form-control"'); ?>
<?php endif; ?>	
						</div>
					</div>
					<div class="col-sm-6">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('m_doc_id6_7') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<?= form_dropdown('sel_m_doc_id6_7', $ary_m_doc_id6_7, $info['m_doc_id6_7'], 'class="form-control"'); ?>
<?php else: ?>
							<?= form_dropdown('sel_m_doc_id6_7', $ary_m_doc_id6_7, '', 'class="form-control"'); ?>
<?php endif; ?>	
						</div>
					</div>
					<div class="col-sm-6">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('m_food') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<?= form_dropdown('sel_m_food', $ary_m_food, $info['m_food'], 'class="form-control"'); ?>
<?php else: ?>
							<?= form_dropdown('sel_m_food', $ary_m_food, '', 'class="form-control"'); ?>
<?php endif; ?>	
						</div>
					</div>
					<div class="col-sm-6">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('m_descr') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
								<input type="text" class="form-control" name="txt_m_descr" value='<?= $info['m_descr']?>'>
<?php else: ?>
								<input type="text" class="form-control" name="txt_m_descr" value=''>
<?php endif; ?>	
						</div>
					</div>
					<div class="col-sm-6">
					</div>
				</div>
			</div>
			<!-- tab 8 -->
			<div role="tabpanel" class="tab-pane" id="non_f_emp_family_status">
				<div class="form-group">
					<div class="col-sm-4">
						<label class="control-label"><?= $lang->line('m_profssion') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<label class="radio-inline">
								<input type="radio" name="rdo_m_profssion" id="" value=1 <?= $info['m_profssion'] == 1 ? 'checked' : '' ?>> <?= $lang->line('m_profssion_1') ?>
							</label>
							<label class="radio-inline">
								<input type="radio" name="rdo_m_profssion" id="" value=2 <?= $info['m_profssion'] == 2 ? 'checked' : '' ?>> <?= $lang->line('m_profssion_2') ?>
							</label>
							<label class="radio-inline">
								<input type="radio" name="rdo_m_profssion" id="" value=3 <?= $info['m_profssion'] == 3 ? 'checked' : '' ?>> <?= $lang->line('m_profssion_3') ?>
							</label>
							<label class="radio-inline">
								<input type="radio" name="rdo_m_profssion" id="" value=4 <?= $info['m_profssion'] == 4 ? 'checked' : '' ?>> <?= $lang->line('m_profssion_4') ?>
							</label>
							<label class="radio-inline">
								<input type="radio" name="rdo_m_profssion" id="" value=5 <?= $info['m_profssion'] == 5 ? 'checked' : '' ?>> <?= $lang->line('other') ?>
							</label>
<?php else: ?>
							<label class="radio-inline">
								<input type="radio" name="rdo_m_profssion" id="" value=1 checked> <?= $lang->line('m_profssion_1') ?>
							</label>
							<label class="radio-inline">
								<input type="radio" name="rdo_m_profssion" id="" value=2> <?= $lang->line('m_profssion_2') ?>
							</label>
							<label class="radio-inline">
								<input type="radio" name="rdo_m_profssion" id="" value=3> <?= $lang->line('m_profssion_3') ?>
							</label>
							<label class="radio-inline">
								<input type="radio" name="rdo_m_profssion" id="" value=4> <?= $lang->line('m_profssion_4') ?>
							</label>
							<label class="radio-inline">
								<input type="radio" name="rdo_m_profssion" id="" value=5> <?= $lang->line('other') ?>
							</label>
<?php endif; ?>
						</div>
					</div>
					<div class="col-sm-2">
						<label class="control-label">　</label>
						<div>
<?php if (strval($id) != '0'): ?>
								<input type="text" class="form-control" name="txt_m_profssion_descr" value='<?= $info['m_profssion_descr']?>'>
<?php else: ?>
								<input type="text" class="form-control" name="txt_m_profssion_descr" value=''>
<?php endif; ?>	
						</div>
					</div>
					<div class="col-sm-6">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-2">
						<label class="control-label"><?= $lang->line('m_family') ?></label>
						<div class='checkbox'>
							<label>
<?php if (strval($id) != '0'): ?>
								<input type="checkbox" name='chk_m_family[]' value="1" <?= ($info['m_family'] & 1) == '1' ? 'checked="checked"' : '' ?>/><?= $lang->line('m_family_1') ?>
<?php else: ?>
								<input type="checkbox" name='chk_m_family[]' value="1" /><?= $lang->line('m_family_1') ?>
<?php endif; ?>
							</label>
						</div>
					</div>
					<div class="col-sm-1">
						<label class="control-label">　</label>
						<div class="checkbox">
							<?= $lang->line('rdo_m') ?>
						</div>
					</div>
					<div class="col-sm-1">
						<label class="control-label">　</label>
						<div>
<?php if (strval($id) != '0'): ?>
								<input type="text" class="form-control" name="txt_m_family_b" value='<?= $info['m_family_b']?>' pattern="[0-9]+">
<?php else: ?>
								<input type="text" class="form-control" name="txt_m_family_b" value='' pattern="[0-9]+">
<?php endif; ?>
						</div>
					</div>
					<div class="col-sm-1">
						<label class="control-label">　</label>
						<div class="checkbox">
							<?= $lang->line('rdo_f') ?>
						</div>
					</div>
					<div class="col-sm-1">
						<label class="control-label">　</label>
						<div>
<?php if (strval($id) != '0'): ?>
								<input type="text" class="form-control" name="txt_m_family_g" value='<?= $info['m_family_g']?>' pattern="[0-9]+">
<?php else: ?>
								<input type="text" class="form-control" name="txt_m_family_g" value='' pattern="[0-9]+">
<?php endif; ?>
						</div>
					</div>
					<div class="col-sm-6">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-2">
						<div class='checkbox'>
							<label>
<?php if (strval($id) != '0'): ?>
								<input type="checkbox" name='chk_m_family[]' value="2" <?= ($info['m_family'] & 2) == '2' ? 'checked="checked"' : '' ?>/><?= $lang->line('m_family_2') ?>
<?php else: ?>
								<input type="checkbox" name='chk_m_family[]' value="2" /><?= $lang->line('m_family_2') ?>
<?php endif; ?>
							</label>
						</div>
					</div>
					<div class="col-sm-1">
						<div class="checkbox">
							<?= $lang->line('rdo_m') ?>
						</div>
					</div>
					<div class="col-sm-1">
						<div>
<?php if (strval($id) != '0'): ?>
								<input type="text" class="form-control" name="txt_m_family_b2" value='<?= $info['m_family_b2']?>' pattern="[0-9]+">
<?php else: ?>
								<input type="text" class="form-control" name="txt_m_family_b2" value='' pattern="[0-9]+">
<?php endif; ?>
						</div>
					</div>
					<div class="col-sm-1">
						<div class="checkbox">
							<?= $lang->line('rdo_f') ?>
						</div>
					</div>
					<div class="col-sm-1">
						<div>
<?php if (strval($id) != '0'): ?>
								<input type="text" class="form-control" name="txt_m_family_g2" value='<?= $info['m_family_g2']?>' pattern="[0-9]+">
<?php else: ?>
								<input type="text" class="form-control" name="txt_m_family_g2" value='' pattern="[0-9]+">
<?php endif; ?>
						</div>
					</div>
					<div class="col-sm-6">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-2">
						<div class='checkbox'>
							<label>
<?php if (strval($id) != '0'): ?>
								<input type="checkbox" name='chk_m_family[]' value="4" <?= ($info['m_family'] & 4) == '4' ? 'checked="checked"' : '' ?>/><?= $lang->line('m_family_3') ?>
<?php else: ?>
								<input type="checkbox" name='chk_m_family[]' value="4" /><?= $lang->line('m_family_3') ?>
<?php endif; ?>
							</label>
						</div>
					</div>
					<div class="col-sm-1">
						<div class="checkbox">
							<?= $lang->line('rdo_m') ?>
						</div>
					</div>
					<div class="col-sm-1">
						<div>
<?php if (strval($id) != '0'): ?>
								<input type="text" class="form-control" name="txt_m_family_b3" value='<?= $info['m_family_b3']?>' pattern="[0-9]+">
<?php else: ?>
								<input type="text" class="form-control" name="txt_m_family_b3" value='' pattern="[0-9]+">
<?php endif; ?>
						</div>
					</div>
					<div class="col-sm-1">
						<div class="checkbox">
							<?= $lang->line('rdo_f') ?>
						</div>
					</div>
					<div class="col-sm-1">
						<div>
<?php if (strval($id) != '0'): ?>
								<input type="text" class="form-control" name="txt_m_family_g3" value='<?= $info['m_family_g3']?>' pattern="[0-9]+">
<?php else: ?>
								<input type="text" class="form-control" name="txt_m_family_g3" value='' pattern="[0-9]+">
<?php endif; ?>
						</div>
					</div>
					<div class="col-sm-6">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-2">
						<div class='checkbox'>
							<label>
<?php if (strval($id) != '0'): ?>
								<input type="checkbox" name='chk_m_family[]' value="8" <?= ($info['m_family'] & 8) == '8' ? 'checked="checked"' : '' ?>/><?= $lang->line('m_family_4') ?>
<?php else: ?>
								<input type="checkbox" name='chk_m_family[]' value="8" /><?= $lang->line('m_family_4') ?>
<?php endif; ?>
							</label>
						</div>
					</div>
					<div class="col-sm-1">
						<div class="checkbox">
							<?= $lang->line('rdo_m') ?>
						</div>
					</div>
					<div class="col-sm-1">
						<div>
<?php if (strval($id) != '0'): ?>
								<input type="text" class="form-control" name="txt_m_family_b4" value='<?= $info['m_family_b4']?>' pattern="[0-9]+">
<?php else: ?>
								<input type="text" class="form-control" name="txt_m_family_b4" value='' pattern="[0-9]+">
<?php endif; ?>	
						</div>
					</div>
					<div class="col-sm-1">
						<div class="checkbox">
							<?= $lang->line('rdo_f') ?>
						</div>
					</div>
					<div class="col-sm-1">
						<div>
<?php if (strval($id) != '0'): ?>
								<input type="text" class="form-control" name="txt_m_family_g4" value='<?= $info['m_family_g4']?>' pattern="[0-9]+">
<?php else: ?>
								<input type="text" class="form-control" name="txt_m_family_g4" value='' pattern="[0-9]+">
<?php endif; ?>	
						</div>
					</div>
					<div class="col-sm-6">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-2">
						<div class='checkbox'>
							<label>
<?php if (strval($id) != '0'): ?>
								<input type="checkbox" name='chk_m_family[]' value="16" <?= ($info['m_family'] & 16) == '16' ? 'checked="checked"' : '' ?>/><?= $lang->line('m_family_5') ?>
<?php else: ?>
								<input type="checkbox" name='chk_m_family[]' value="16" /><?= $lang->line('m_family_5') ?>
<?php endif; ?>
							</label>
						</div>
					</div>
					<div class="col-sm-1">
						<div class="checkbox">
							<?= $lang->line('rdo_m') ?>
						</div>
					</div>
					<div class="col-sm-1">
						<div>
<?php if (strval($id) != '0'): ?>
								<input type="text" class="form-control" name="txt_m_family_b5" value='<?= $info['m_family_b5']?>' pattern="[0-9]+">
<?php else: ?>
								<input type="text" class="form-control" name="txt_m_family_b5" value='' pattern="[0-9]+">
<?php endif; ?>	
						</div>
					</div>
					<div class="col-sm-1">
						<div class="checkbox">
							<?= $lang->line('rdo_f') ?>
						</div>
					</div>
					<div class="col-sm-1">
						<div>
<?php if (strval($id) != '0'): ?>
								<input type="text" class="form-control" name="txt_m_family_g5" value='<?= $info['m_family_g5']?>' pattern="[0-9]+">
<?php else: ?>
								<input type="text" class="form-control" name="txt_m_family_g5" value='' pattern="[0-9]+">
<?php endif; ?>	
						</div>
					</div>
					<div class="col-sm-6">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-2">
						<label class="control-label"><?= $lang->line('m_house_room') ?></label>
						<div class='checkbox'>
							<label>
<?php if (strval($id) != '0'): ?>
								<input type="checkbox" name='chk_m_house[]' value="1" <?= ($info['m_house'] & 1) == '1' ? 'checked="checked"' : '' ?>/><?= $lang->line('m_house_room2') ?>
<?php else: ?>
								<input type="checkbox" name='chk_m_house[]' value="1" /><?= $lang->line('m_house_room2') ?>
<?php endif; ?>
							</label>
						</div>
					</div>
					<div class="col-sm-1">
						<label class="control-label">　</label>
						<div>
<?php if (strval($id) != '0'): ?>
								<input type="text" class="form-control" name="txt_m_house_room" value='<?= $info['m_house_room']?>' pattern="[0-9]+">
<?php else: ?>
								<input type="text" class="form-control" name="txt_m_house_room" value='' pattern="[0-9]+">
<?php endif; ?>	
						</div>
					</div>
					<div class="col-sm-1">
						<label class="control-label">　</label>
						<div class="checkbox">
							<?= $lang->line('room') ?>
						</div>
					</div>
					<div class="col-sm-1">
						<label class="control-label">　</label>
						<div class="checkbox">
							<?= $lang->line('m_house_space') ?>
						</div>
					</div>
					<div class="col-sm-1">
						<label class="control-label">　</label>
						<div>
<?php if (strval($id) != '0'): ?>
								<input type="text" class="form-control" name="txt_m_house_space" value='<?= $info['m_house_space']?>' pattern="[0-9]+">
<?php else: ?>
								<input type="text" class="form-control" name="txt_m_house_space" value='' pattern="[0-9]+">
<?php endif; ?>	
						</div>
					</div>
					<div class="col-sm-6">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-2">
						<div class='checkbox'>
							<label>
<?php if (strval($id) != '0'): ?>
								<input type="checkbox" name='chk_m_house[]' value="2" <?= ($info['m_house'] & 2) == '2' ? 'checked="checked"' : '' ?>/><?= $lang->line('m_house_room3') ?>
<?php else: ?>
								<input type="checkbox" name='chk_m_house[]' value="2" /><?= $lang->line('m_house_room3') ?>
<?php endif; ?>
							</label>
						</div>
					</div>
					<div class="col-sm-1">
						<div>
<?php if (strval($id) != '0'): ?>
								<input type="text" class="form-control" name="txt_m_house_room2" value='<?= $info['m_house_room2']?>' pattern="[0-9]+">
<?php else: ?>
								<input type="text" class="form-control" name="txt_m_house_room2" value='' pattern="[0-9]+">
<?php endif; ?>	
						</div>
					</div>
					<div class="col-sm-1">
						<div class="checkbox">
							<?= $lang->line('room') ?>
						</div>
					</div>
					<div class="col-sm-1">
						<div class="checkbox">
							<?= $lang->line('m_house_space') ?>
						</div>
					</div>
					<div class="col-sm-1">
						<div>
<?php if (strval($id) != '0'): ?>
								<input type="text" class="form-control" name="txt_m_house_space2" value='<?= $info['m_house_space2']?>' pattern="[0-9]+">
<?php else: ?>
								<input type="text" class="form-control" name="txt_m_house_space2" value='' pattern="[0-9]+">
<?php endif; ?>	
						</div>
					</div>
					<div class="col-sm-6">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-2">
						<div class='checkbox'>
							<label>
<?php if (strval($id) != '0'): ?>
								<input type="checkbox" name='chk_m_house[]' value="4" <?= ($info['m_house'] & 4) == '4' ? 'checked="checked"' : '' ?>/><?= $lang->line('other') ?>
<?php else: ?>
								<input type="checkbox" name='chk_m_house[]' value="4" /><?= $lang->line('other') ?>
<?php endif; ?>
							</label>
						</div>
					</div>
					<div class="col-sm-1">
						<div>
<?php if (strval($id) != '0'): ?>
								<input type="text" class="form-control" name="txt_m_house_room3" value='<?= $info['m_house_room3']?>' pattern="[0-9]+">
<?php else: ?>
								<input type="text" class="form-control" name="txt_m_house_room3" value='' pattern="[0-9]+">
<?php endif; ?>	
						</div>
					</div>
					<div class="col-sm-1">
						<div class="checkbox">
							<?= $lang->line('room') ?>
						</div>
					</div>
					<div class="col-sm-1">
						<div class="checkbox">
							<?= $lang->line('m_house_space') ?>
						</div>
					</div>
					<div class="col-sm-1">
						<div>
<?php if (strval($id) != '0'): ?>
								<input type="text" class="form-control" name="txt_m_house_space3" value='<?= $info['m_house_space3']?>' pattern="[0-9]+">
<?php else: ?>
								<input type="text" class="form-control" name="txt_m_house_space3" value='' pattern="[0-9]+">
<?php endif; ?>	
						</div>
					</div>
					<div class="col-sm-6">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('desc') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
								<input type="text" class="form-control" name="txt_m_descr2" value='<?= $info['m_descr2']?>'>
<?php else: ?>
								<input type="text" class="form-control" name="txt_m_descr2" value=''>
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
	var i_hire_special = $("#tab_hire_special" + " tr").length -2 ;
	var i_hire_salary = $("#tab_hire_salary" + " tr").length -2 ;

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
	
	$('.date').datetimepicker({
		format: 'YYYY-MM-DD',
		keepInvalid: true,
		ignoreReadonly: true,
		useCurrent: true
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
		window.location = '<?= base_url()?>bos/hire_non_factory';
	});	
	$("#btn_save").bind("click",function(){
		if(!$("form")[0].checkValidity()) return;

		$.ajax({
			type: "POST",
			url: $('#hid_baseurl').val() + 'bos/hire_non_factory_doEdit',
			data: $('#form1').serialize(),
			statusCode: {
				200: function() {
					window.location = '<?= base_url()?>bos/hire_non_factory';
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
});
</script>