<script src='<?= base_url()?>assets/js/fileinput.min.js'></script>
<script src='<?= base_url()?>assets/js/fileinput_locale_zh-TW.js'></script>
<script src='<?= base_url()?>assets/js/bootstrap-datetimepicker.min.js'></script>
<link href='<?= base_url()?>assets/css/fileinput.min.css' rel='stylesheet' type='text/css'/>
<link href='<?= base_url()?>assets/css/bootstrap-datetimepicker.min.css' rel='stylesheet' type='text/css'/>

<input type='hidden' id='hid_baseurl' value='<?= base_url(); ?>'>
<input type='hidden' id='hid_ftype' value=''>

<div class="container">
	<form class="form-horizontal" id='form1'>
		<input type='hidden' name='hid_id' value='<?= $id ?>'>

		<h1><?= $title ?></h1>
		<!-- Nav tabs -->
		<ul class="nav nav-tabs" role="tablist">
			<li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab"><?= $lang->line('required_condition') ?></a></li>
			<li role="presentation"><a href="#special_directions" aria-controls="special_directions" role="tab" data-toggle="tab"><?= $lang->line('special_directions') ?></a></li>
			<li role="presentation"><a href="#other" aria-controls="other" role="tab" data-toggle="tab"><?= $lang->line('other') ?></a></li>
			<li role="presentation"><a href="#factory_required_condition" aria-controls="factory_required_condition" role="tab" data-toggle="tab"><?= $lang->line('factory_required_condition') ?></a></li>
			<li role="presentation"><a href="#factory_work_content" aria-controls="factory_work_content" role="tab" data-toggle="tab"><?= $lang->line('factory_work_content') ?></a></li>
			<li role="presentation"><a href="#factory_salary_condition" aria-controls="factory_salary_condition" role="tab" data-toggle="tab"><?= $lang->line('factory_salary_condition') ?></a></li>
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
	<?php if (strval($info['client_id']) != '0'): ?>
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
	<?php if (strval($info['employer_id']) != '0'): ?>
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
							<input type="text" class="form-control" name="txt_work_limit" placeholder='2Y0M0D' value='<?= $info['work_limit']?>' pattern="[0-9YMD]+" required>
<?php else: ?>
							<input type="text" class="form-control" name="txt_work_limit" placeholder='2Y0M0D' value='' pattern="[0-9YMD]+" required>
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
								<input type="radio" name="rdo_sex" id="" value=2 <?= $info['gender'] == 2 ? 'checked' : '' ?>> <?= $lang->line('rdo_f') ?>
							</label>
<?php else: ?>
							<label class="radio-inline">
								<input type="radio" name="rdo_sex" id="" value=1 checked> <?= $lang->line('rdo_m') ?>
							</label>
							<label class="radio-inline">
								<input type="radio" name="rdo_sex" id="" value=2> <?= $lang->line('rdo_f') ?>
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
						<label class="control-label"><?= $lang->line('arrspot') ?></label>
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
						<label class="control-label"><?= $lang->line('letter_id') ?></label>
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
						<label class="control-label"><?= $lang->line('letter_id2') ?></label>
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
						<label for="tab_hire_special" class='form-label'> <?= $lang->line('language_ability') ?></label><br />
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
										<input type="text" name='no_hire_special[]' value='<?= ($item['no']) ?>' class="form-control" pattern="[0-9]+" required/>
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
										<input type="text" name='no_hire_special[]' class="form-control" pattern="[0-9]+" required/>
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
			<div role="tabpanel" class="tab-pane" id="factory_required_condition">
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('f_test_item') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
								<input type="text" class="form-control" name="txt_f_test_item" value='<?= $info['f_test_item']?>'>
<?php else: ?>
								<input type="text" class="form-control" name="txt_f_test_item" value=''>
<?php endif; ?>	
						</div>
					</div>
					<div class="col-sm-6">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('5-2-1') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<input id="file2" type="file" class="file-loading2">
							<input name='hid_filepath2' type='hidden' value='<?= $info['f_file_path2']?>'>
<?php else: ?>
							<input id="file2" type="file" class="file-loading2">
							<input name='hid_filepath2' type='hidden' value=''>
<?php endif; ?>				
						</div>
					</div>
					<div class="col-sm-6">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('f_descr') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
								<input type="text" class="form-control" name="txt_f_descr" value='<?= $info['f_descr']?>'>
<?php else: ?>
								<input type="text" class="form-control" name="txt_f_descr" value=''>
<?php endif; ?>	
						</div>
					</div>
					<div class="col-sm-6">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('f_date_doc') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<div class='input-group date' id='datetimepicker2'>
								<input type="text" class="form-control" name="txt_f_date_doc" value='<?= $info['f_date_doc']?>' pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" required readonly>
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-calendar"></span>
								</span>
							</div>
<?php else: ?>
							<div class='input-group date' id='datetimepicker2'>
								<input type="text" class="form-control" name="txt_f_date_doc" value='' pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" required readonly>
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
						<label class="control-label"><?= $lang->line('f_doc_id6_8') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<?= form_dropdown('sel_f_doc_id6_8', $ary_f_doc_id6_8, $info['f_doc_id6_8'], 'class="form-control"'); ?>
<?php else: ?>
							<?= form_dropdown('sel_f_doc_id6_8', $ary_f_doc_id6_8, '', 'class="form-control"'); ?>
<?php endif; ?>				
						</div>
					</div>
					<div class="col-sm-6">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('f_date_immigrate') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<div class='input-group date' id='datetimepicker2'>
								<input type="text" class="form-control" name="txt_f_date_immigrate" value='<?= $info['f_date_immigrate']?>' pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" required readonly>
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-calendar"></span>
								</span>
							</div>
<?php else: ?>
							<div class='input-group date' id='datetimepicker2'>
								<input type="text" class="form-control" name="txt_f_date_immigrate" value='' pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" required readonly>
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
			</div>
			<!-- tab 5 -->
			<div role="tabpanel" class="tab-pane" id="factory_work_content">
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('company_web') ?></label>
						<div class="checkbox" id='div_company_web'>
<?php if (strval($id) != '0'): ?>
							<?= $info['employer_web'] ?>
<?php else: ?>
							<?= $lang->line('generate_system')?>
<?php endif; ?>				
						</div>
					</div>
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('1-6-4') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<?= form_dropdown('sel_f_w_doc_id6_4', $ary_f_w_doc_id6_4, $info['f_w_doc_id6_4'], 'class="form-control"'); ?>
<?php else: ?>
							<?= form_dropdown('sel_f_w_doc_id6_4', $ary_f_w_doc_id6_4, '', 'class="form-control"'); ?>
<?php endif; ?>				
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('company_history') ?></label>
						<div class="checkbox" id='div_company_history'>
<?php if (strval($id) != '0'): ?>
							<?= $info['employer_history'] ?>
<?php else: ?>
							<?= $lang->line('generate_system')?>
<?php endif; ?>				
						</div>
					</div>
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('f_w_overtime') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
								<input type="text" class="form-control" name="txt_f_w_overtime" value='<?= $info['f_w_overtime']?>'>
<?php else: ?>
								<input type="text" class="form-control" name="txt_f_w_overtime" value=''>
<?php endif; ?>	
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('1-1-10') ?></label>
						<div class="checkbox" id='div_industry_id'>
<?php if (strval($id) != '0'): ?>
							<?= $info['industry_tw'] ?>
<?php else: ?>
							<?= $lang->line('generate_system')?>
<?php endif; ?>				
						</div>
					</div>
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('f_w_avg_salary') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
								<input type="text" class="form-control" name="txt_f_w_avg_salary" value='<?= $info['f_w_avg_salary']?>'>
<?php else: ?>
								<input type="text" class="form-control" name="txt_f_w_avg_salary" value=''>
<?php endif; ?>	
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('company_product') ?></label>
						<div class="checkbox" id='div_company_product'>
<?php if (strval($id) != '0'): ?>
							<?= $info['employer_product'] ?>
<?php else: ?>
							<?= $lang->line('generate_system')?>
<?php endif; ?>				
						</div>
					</div>
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('f_w_file_path') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<input id="file3" type="file" class="file-loading3">
							<input name='hid_filepath3' type='hidden' value='<?= $info['f_w_file_path']?>'>
<?php else: ?>
							<input id="file3" type="file" class="file-loading3">
							<input name='hid_filepath3' type='hidden' value=''>
<?php endif; ?>				
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('f_w_environment') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
								<input type="text" class="form-control" name="txt_f_w_environment" value='<?= $info['f_w_environment']?>'>
<?php else: ?>
								<input type="text" class="form-control" name="txt_f_w_environment" value=''>
<?php endif; ?>	
						</div>
					</div>
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('f_w_date_salary') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
								<input type="text" class="form-control" name="txt_f_w_date_salary" value='<?= $info['f_w_date_salary']?>' pattern="[0-9]+">
<?php else: ?>
								<input type="text" class="form-control" name="txt_f_w_date_salary" value='' pattern="[0-9]+">
<?php endif; ?>	
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('f_w_item') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
								<input type="text" class="form-control" name="txt_f_w_item" value='<?= $info['f_w_item']?>'>
<?php else: ?>
								<input type="text" class="form-control" name="txt_f_w_item" value=''>
<?php endif; ?>	
						</div>
					</div>
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('f_w_time_descr') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
								<input type="text" class="form-control" name="txt_f_w_time_descr" value='<?= $info['f_w_time_descr']?>'>
<?php else: ?>
								<input type="text" class="form-control" name="txt_f_w_time_descr" value=''>
<?php endif; ?>	
						</div>
					</div>
				</div>
			</div>
			<!-- tab 6 -->
			<div role="tabpanel" class="tab-pane" id="factory_salary_condition">
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
					<div class="col-sm-12">
						<label for="tab_hire_salary" class='form-label'> <?= $lang->line('hire_salary') ?></label><br />
						<table class="table table-bordered table-hover table-responsive" id="tab_hire_salary">
							<thead>
								<tr >
									<th class="text-center">#</th>
									<th class="text-center text-nowrap"><?= $lang->line('hire_type') ?></th>
									<th class="text-center text-nowrap"><?= $lang->line('hire_item') ?></th>
									<th colspan="2" class="text-center text-nowrap"><?= $lang->line('hire_money') ?></th>
								</tr>
							</thead>
							<tbody>
<? $row=0; ?>								
<?php if(count($ary_hire_salary_auth) > 0): ?>
<?php foreach ($ary_hire_salary_auth as $item): ?>
<? $row++;$item['row']=$row; ?>	
								<tr id="<?= 'addr_hire_salary'.($item['row'] - 1) ?>">
									<td>
										<?= ($item['row']) ?>
										<input type='hidden' name='row_hire_salary[]' value='<?= ($item['row']) ?>'>
									</td>
									<td>
										<?= form_dropdown('sel_type_hire_salary[]', $ary_type_hire_salary, $item['type'], 'class="form-control" row="'.$item['row'].'"'); ?>
									</td>
									<td>
										<?= $item['sel_2_html'] ?>
									</td>
									<td>
										<input type="text" name='txt_money_hire_salary[]' value='<?= ($item['money']) ?>' class="form-control" pattern="[0-9]+"/>
									</td>
									<td>
										<?= $lang->line('yuan') ?>
									</td>	
								</tr>
<?php endforeach;?>
								<tr id='<?php echo 'addr_hire_salary'.count($ary_hire_salary_auth) ?>'></tr>
<?php else: ?>
								<tr id='addr_hire_salary0'>
									<td>
										1
										<input type='hidden' name='row_hire_salary[]' value='1'>
									</td>
									<td>
										<?= form_dropdown('sel_type_hire_salary[]', $ary_type_hire_salary, '', 'class="form-control" row="1"'); ?>
									</td>
									<td>
										<?= form_dropdown('sel_item_hire_salary[]', $ary_item_hire_salary, '', 'class="form-control" row="1"'); ?>
									</td>
									<td>
										<input type="text" name='txt_money_hire_salary[]' class="form-control" pattern="[0-9]+"/>
									</td>
								</tr>
								<tr id='addr_hire_salary1'></tr>
<?php endif; ?>
							</tbody>
						</table>
						<a class="add_row btn btn-warning pull-left" prefix='hire_salary'><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
						<a class="delete_row pull-right btn btn-danger" prefix='hire_salary'><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></a>
						<div class='row mb20' ps='for_add_del_button'>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('f_real_salary') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
								<input type="text" class="form-control" name="txt_f_real_salary" value='<?= $info['f_real_salary']?>' pattern="[0-9]+">
<?php else: ?>
								<input type="text" class="form-control" name="txt_f_real_salary" value='' pattern="[0-9]+">
<?php endif; ?>	
						</div>
					</div>
					<div class="col-sm-6">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('f_overtime2') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<?= form_dropdown('sel_f_overtime2', $ary_f_overtime2, $info['f_overtime2'], 'class="form-control"'); ?>
<?php else: ?>
							<?= form_dropdown('sel_f_overtime2', $ary_f_overtime2, '', 'class="form-control"'); ?>
<?php endif; ?>	
						</div>
					</div>	
					<div class="col-sm-6">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('f_overtime3') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<?= form_dropdown('sel_f_overtime3', $ary_f_overtime2, $info['f_overtime3'], 'class="form-control"'); ?>
<?php else: ?>
							<?= form_dropdown('sel_f_overtime3', $ary_f_overtime2, '', 'class="form-control"'); ?>
<?php endif; ?>	
						</div>
					</div>	
					<div class="col-sm-6">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('holiday_salary') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
								<input type="text" class="form-control" name="txt_holiday_salary" value='<?= $info['holiday_salary']?>' pattern="[0-9]+">
<?php else: ?>
								<input type="text" class="form-control" name="txt_holiday_salary" value='' pattern="[0-9]+">
<?php endif; ?>	
						</div>
					</div>
					<div class="col-sm-6">
					</div>
				</div>
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
	$('#file2').fileinput({
		showPreview: false,
		language: "zh-TW",
		uploadUrl: '<?= base_url()?>upload/do_upload',
		allowedFileExtensions: ["jpg","jpeg","gif","png","pdf"],
<?php if((strval($id) != '0') && (strlen($info['f_file_path2'])) > 0): ?>
		initialCaption: "<?= $info['f_file_path2']?>",
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
	$('#file2').on('fileuploaded', function(event, data, previewId, index) {
		var response = data.response;
		$('input[name=hid_filepath2]').val(response.new_name);
	});
	$('#file3').fileinput({
		showPreview: false,
		language: "zh-TW",
		uploadUrl: '<?= base_url()?>upload/do_upload',
		allowedFileExtensions: ["jpg","jpeg","gif","png","pdf"],
<?php if((strval($id) != '0') && (strlen($info['f_w_file_path'])) > 0): ?>
		initialCaption: "<?= $info['f_w_file_path']?>",
<?php endif; ?>	
		uploadExtraData: function() {
			var obj = {};
			$('.file-loading3').each(function() {
				var id = $(this).attr('id');
				obj['file_for'] = id;
				obj['func'] = 'create';
			});
			return obj;
		}
	});
	$('#file3').on('fileuploaded', function(event, data, previewId, index) {
		var response = data.response;
		$('input[name=hid_filepath3]').val(response.new_name);
	});		
	
	$('.date').datetimepicker({
		format: 'YYYY-MM-DD',
		keepInvalid: true,
		ignoreReadonly: true,
		useCurrent: true
	});
	$("select[name='sel_type_hire_salary[]']").each(function() {
		$(this).bind("change",function(){
			var obj_this = $(this);

			$.ajax({
				type: "POST",
				url: $('#hid_baseurl').val() + 'bos/apiGetHireSalaryTypeSel/' + $(this).val(),
				data: '',
				statusCode: {
					200: function(e) {
						$("select[name='sel_item_hire_salary[]'][row=" + obj_this.attr('row') + "]").html(e);
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
		window.location = '<?= base_url()?>bos/hire_factory';
	});	
	$("#btn_save").bind("click",function(){
		if(!$("form")[0].checkValidity()) return;

		$.ajax({
			type: "POST",
			url: $('#hid_baseurl').val() + 'bos/hire_factory_doEdit',
			data: $('#form1').serialize(),
			statusCode: {
				200: function() {
					window.location = '<?= base_url()?>bos/hire_factory';
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

		$("#tab_" + prefix + " select[name='sel_type_hire_salary[]'][row=" + (i + 1) + "]").each(function() {
			$(this).val($('select[name="sel_type_hire_salary[]"][row=1]').val());
		});

		$('#tab_' + prefix).append('<tr id="addr_'+ prefix + (i+1)+'"></tr>');
		var str = tmp + " = " + eval(tmp) + "+1";
		eval(str);

		// bind again !!
		$("select[name='sel_type_hire_salary[]']").each(function() {
		$(this).bind("change",function(){
			var obj_this = $(this);

			$.ajax({
				type: "POST",
				url: $('#hid_baseurl').val() + 'bos/apiGetHireSalaryTypeSel/' + $(this).val(),
				data: '',
				statusCode: {
					200: function(e) {
						$("select[name='sel_item_hire_salary[]'][row=" + obj_this.attr('row') + "]").html(e);
					}
				},
				error: function() {
				}
			});
		});
	});	

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