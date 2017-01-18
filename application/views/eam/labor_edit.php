<script src='<?= base_url()?>assets/js/fileinput.min.js'></script>
<script src='<?= base_url()?>assets/js/fileinput_locale_zh-TW.js'></script>
<script src='<?= base_url()?>assets/js/bootstrap-datetimepicker.min.js'></script>
<link href='<?= base_url()?>assets/css/fileinput.min.css' rel='stylesheet' type='text/css'/>
<link href='<?= base_url()?>assets/css/bootstrap-datetimepicker.min.css' rel='stylesheet' type='text/css'/>

<input type='hidden' id='hid_baseurl' value='<?= base_url(); ?>'>
<input type='hidden' id='hid_frow' value=''>

<div class="container">
	<form class="form-horizontal" id='form1'>
		<input type='hidden' name='hid_id' value='<?= $id ?>'>
		<input type='hidden' name='hid_func' value='<?= $func ?>'>
		<input type='hidden' name='hid_language' value=''>
		<input type='hidden' name='hid_life' value=''>
		<input type='hidden' name='hid_life_qty' value=''>
		<input type='hidden' name='hid_life_child' value=''>

		<h1><?= $title ?></h1>
		<!-- Nav tabs -->
		<ul class="nav nav-tabs" role="tablist">
			<li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab"><?= $lang->line('basicdata') ?></a></li>
			<li role="presentation"><a href="#personaldata" aria-controls="personaldata" role="tab" data-toggle="tab"><?= $lang->line('personaldata') ?></a></li>
			<li role="presentation"><a href="#family_status" aria-controls="family_status" role="tab" data-toggle="tab"><?= $lang->line('family_status') ?></a></li>
			<li role="presentation"><a href="#education_skill" aria-controls="education_skill" role="tab" data-toggle="tab"><?= $lang->line('education_skill') ?></a></li>
			<li role="presentation"><a href="#work_skill" aria-controls="work_skill" role="tab" data-toggle="tab"><?= $lang->line('work_skill') ?></a></li>
			<li role="presentation"><a href="#contactdata" aria-controls="contactdata" role="tab" data-toggle="tab"><?= $lang->line('contactdata') ?></a></li>
			<li role="presentation"><a href="#maid_work_skill" aria-controls="maid_work_skill" role="tab" data-toggle="tab"><?= $lang->line('maid_work_skill') ?></a></li>
<?php if (($func == '412') || ($func == '241')): ?>
			<li role="presentation" ><a href="#school_status" aria-controls="school_status" role="tab" data-toggle="tab"><?= $lang->line('school_status') ?></a></li>
			<li role="presentation"><a href="#pick_office" aria-controls="pick_office" role="tab" data-toggle="tab"><?= $lang->line('pick_office') ?></a></li>
<?php endif; ?>
<?php if ($func == '241'): ?>
			<li role="presentation"><a href="#inbound_status" aria-controls="inbound_status" role="tab" data-toggle="tab"><?= $lang->line('inbound_status') ?></a></li>
<?php endif; ?>
		</ul>
		<!-- Tab panes -->
		<div class="tab-content">
			<!-- Tab 1 -->
			<div role="tabpanel" class="tab-pane active" id="home">
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('labor_id') ?></label>
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
						<label class="control-label"><?= $lang->line('worker_kind') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<?= form_dropdown('sel_worker_kind', $ary_worker_kind, $info['a_worker_kind'], 'class="form-control"'); ?>
<?php else: ?>
							<?= form_dropdown('sel_worker_kind', $ary_worker_kind, '', 'class="form-control"'); ?>
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
						<label class="control-label"><?= $lang->line('worker_type_major') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<?= form_dropdown('sel_worker_type_major', $ary_worker_type_major, $info['a_worker_type_major'], 'class="form-control"'); ?>
<?php else: ?>
							<?= form_dropdown('sel_worker_type_major', $ary_worker_type_major, '', 'class="form-control"'); ?>
<?php endif; ?>				
						</div>
					</div>
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('1-1-1') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<?= form_dropdown('sel_country', $ary_country, $info['a_country_id'], 'class="form-control"'); ?>
<?php else: ?>
							<?= form_dropdown('sel_country', $ary_country, '', 'class="form-control"'); ?>
<?php endif; ?>				
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('worker_type_minor') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<?= form_dropdown('sel_worker_type_minor', $ary_worker_type_minor, $info['a_worker_type_minor_id'], 'class="form-control"'); ?>
<?php else: ?>
							<?= form_dropdown('sel_worker_type_minor', $ary_worker_type_minor, '', 'class="form-control"'); ?>
<?php endif; ?>				
						</div>
					</div>
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('school_short') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<?= form_dropdown('sel_school', $ary_school, $info['a_school_id'], 'class="form-control"'); ?>
<?php else: ?>
							<?= form_dropdown('sel_school', $ary_school, '', 'class="form-control"'); ?>
<?php endif; ?>				
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('name_local') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<input type="text" class="form-control" name="txt_a_name_local" value='<?= $info['a_name_local']?>' required>
<?php else: ?>
							<input type="text" class="form-control" name="txt_a_name_local" value='' required>
<?php endif; ?>				
						</div>
					</div>
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('labor_file') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<input id="a_file_path" type="file" class="file-loading">
							<input name='hid_afilepath' type='hidden' value='<?= $info['a_file_path']?>'>
<?php else: ?>
							<input id="a_file_path" type="file" class="file-loading">
							<input name='hid_afilepath' type='hidden' value=''>
<?php endif; ?>				
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('name_tw') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<input type="text" class="form-control" name="txt_a_name_tw" value='<?= $info['a_name_tw']?>' required>
<?php else: ?>
							<input type="text" class="form-control" name="txt_a_name_tw" value='' required>
<?php endif; ?>				
						</div>
					</div>
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('name_en') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<input type="text" class="form-control" name="txt_a_name_en" value='<?= $info['a_name_en']?>' required>
<?php else: ?>
							<input type="text" class="form-control" name="txt_a_name_en" value='' required>
<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('tel') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<input type="text" class="form-control" name="txt_a_tel" value='<?= $info['a_tel']?>'>
<?php else: ?>
							<input type="text" class="form-control" name="txt_a_tel" value=''>
<?php endif; ?>
						</div>
					</div>
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('idno') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<input type="text" class="form-control" name="txt_a_idno" value='<?= $info['a_idno']?>'>
<?php else: ?>
							<input type="text" class="form-control" name="txt_a_idno" value=''>
<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('site_get') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<input type="text" class="form-control" name="txt_a_site_get" value='<?= $info['a_site_get']?>'>
<?php else: ?>
							<input type="text" class="form-control" name="txt_a_site_get" value=''>
<?php endif; ?>
						</div>
					</div>
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('date_get') ?></label>
						<div>
							<div class='input-group date' id='datetimepicker'>
<?php if (strval($id) != '0'): ?>
								<input type="text" class="form-control" name="txt_a_date_get" value='<?= $info['a_date_get']?>' readonly>
<?php else: ?>
								<input type="text" class="form-control" name="txt_a_date_get" value='' readonly>
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
						<label class="control-label"><?= $lang->line('passport_no') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<input type="text" class="form-control" name="txt_a_passport" value='<?= $info['a_passport']?>'>
<?php else: ?>
							<input type="text" class="form-control" name="txt_a_passport" value=''>
<?php endif; ?>
						</div>
					</div>
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('emp_id') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<?= form_dropdown('sel_emp_id', $ary_emp, $info['a_emp_id'], 'class="form-control"'); ?>
<?php else: ?>
							<?= form_dropdown('sel_emp_id', $ary_emp, '', 'class="form-control"'); ?>
<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('birthplace') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<input type="text" class="form-control" name="txt_a_birthplace" value='<?= $info['a_birthplace']?>'>
<?php else: ?>
							<input type="text" class="form-control" name="txt_a_birthplace" value=''>
<?php endif; ?>
						</div>
					</div>
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('referrals') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<input type="text" class="form-control" name="txt_a_referrals_id" value='<?= $info['a_referrals_id']?>'>
<?php else: ?>
							<input type="text" class="form-control" name="txt_a_referrals_id" value=''>
<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('labor_url') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<input type="text" class="form-control" name="txt_a_url" value='<?= $info['a_url']?>'>
<?php else: ?>
							<input type="text" class="form-control" name="txt_a_url" value=''>
<?php endif; ?>
						</div>
					</div>
					<div class="col-sm-6">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('labor_file2') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<input id="a_file_path2" type="file" class="file-loading">
							<input name='hid_afilepath2' type='hidden' value='<?= $info['a_file_path2']?>'>
<?php else: ?>
							<input id="a_file_path2" type="file" class="file-loading">
							<input name='hid_afilepath2' type='hidden' value=''>
<?php endif; ?>
						</div>
					</div>
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('labor_file6') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<input id="a_file_path6" type="file" class="file-loading">
							<input name='hid_afilepath6' type='hidden' value='<?= $info['a_file_path6']?>'>
<?php else: ?>
							<input id="a_file_path6" type="file" class="file-loading">
							<input name='hid_afilepath6' type='hidden' value=''>
<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('labor_file3') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<input id="a_file_path3" type="file" class="file-loading">
							<input name='hid_afilepath3' type='hidden' value='<?= $info['a_file_path3']?>'>
<?php else: ?>
							<input id="a_file_path3" type="file" class="file-loading">
							<input name='hid_afilepath3' type='hidden' value=''>
<?php endif; ?>
						</div>
					</div>
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('labor_file7') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<input id="a_file_path7" type="file" class="file-loading">
							<input name='hid_afilepath7' type='hidden' value='<?= $info['a_file_path7']?>'>
<?php else: ?>
							<input id="a_file_path7" type="file" class="file-loading">
							<input name='hid_afilepath7' type='hidden' value=''>
<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('labor_file4') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<input id="a_file_path4" type="file" class="file-loading">
							<input name='hid_afilepath4' type='hidden' value='<?= $info['a_file_path4']?>'>
<?php else: ?>
							<input id="a_file_path4" type="file" class="file-loading">
							<input name='hid_afilepath4' type='hidden' value=''>
<?php endif; ?>
						</div>
					</div>
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('labor_file8') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<input id="a_file_path8" type="file" class="file-loading">
							<input name='hid_afilepath8' type='hidden' value='<?= $info['a_file_path8']?>'>
<?php else: ?>
							<input id="a_file_path8" type="file" class="file-loading">
							<input name='hid_afilepath8' type='hidden' value=''>
<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('labor_file5') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<input id="a_file_path5" type="file" class="file-loading">
							<input name='hid_afilepath5' type='hidden' value='<?= $info['a_file_path5']?>'>
<?php else: ?>
							<input id="a_file_path5" type="file" class="file-loading">
							<input name='hid_afilepath5' type='hidden' value=''>
<?php endif; ?>
						</div>
					</div>
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('labor_file9') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<input id="a_file_path9" type="file" class="file-loading">
							<input name='hid_afilepath9' type='hidden' value='<?= $info['a_file_path9']?>'>
<?php else: ?>
							<input id="a_file_path9" type="file" class="file-loading">
							<input name='hid_afilepath9' type='hidden' value=''>
<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('registration_date') ?></label>
						<div>
							<div class='input-group date' id='datetimepicker'>
<?php if (strval($id) != '0'): ?>
								<input type="text" class="form-control" name="txt_a_registration_date" value='<?= $info['a_registration_date']?>' readonly>
<?php else: ?>
								<input type="text" class="form-control" name="txt_a_registration_date" value='' readonly>
<?php endif; ?>
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-calendar"></span>
								</span>
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('entry_date') ?></label>
						<div>
							<div class='input-group date' id='datetimepicker'>
<?php if (strval($id) != '0'): ?>
								<input type="text" class="form-control" name="txt_a_entry_date" value='<?= $info['a_entry_date']?>' readonly>
<?php else: ?>
								<input type="text" class="form-control" name="txt_a_entry_date" value='' readonly>
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
						<label class="control-label"><?= $lang->line('reasonschool_date') ?></label>
						<div>
							<div class='input-group date' id='datetimepicker'>
<?php if (strval($id) != '0'): ?>
								<input type="text" class="form-control" name="txt_a_reasonschool_date" value='<?= $info['a_reasonschool_date']?>' readonly>
<?php else: ?>
								<input type="text" class="form-control" name="txt_a_reasonschool_date" value='' readonly>
<?php endif; ?>
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-calendar"></span>
								</span>
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('1-4-4') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<?= form_dropdown('sel_reasonschool_id', $ary_reasonschool, $info['a_reasonschool_id'], 'class="form-control"'); ?>
<?php else: ?>
							<?= form_dropdown('sel_reasonschool_id', $ary_reasonschool, '', 'class="form-control"'); ?>
<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('interview') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<?= form_dropdown('sel_emp_id', $ary_emp, $info['a_interview_emp_id'], 'class="form-control"'); ?>
<?php else: ?>
							<?= form_dropdown('sel_emp_id', $ary_emp, '', 'class="form-control"'); ?>
<?php endif; ?>
						</div>
					</div>
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('actual_date') ?></label>
						<div>
							<div class='input-group date' id='datetimepicker'>
<?php if (strval($id) != '0'): ?>
								<input type="text" class="form-control" name="txt_c_date" value='<?= $info['c_date']?>' readonly>
<?php else: ?>
								<input type="text" class="form-control" name="txt_c_date" value='' readonly>
<?php endif; ?>
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-calendar"></span>
								</span>
							</div>
						</div>						
					</div>
				</div>
			</div>
			<!-- Tab 2 -->
			<div role="tabpanel" class="tab-pane" id="personaldata">
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('sex') ?> </label>
						<div>
<?php if (strval($id) != '0'): ?>
							<label class="radio-inline">
								<input type="radio" name="rdo_a_gender" id="" value=1 <?= $info['a_gender'] == 1 ? 'checked' : '' ?>> <?= $lang->line('rdo_m') ?>
							</label>
							<label class="radio-inline">
								<input type="radio" name="rdo_a_gender" id="" value=0 <?= $info['a_gender'] == 0 ? 'checked' : '' ?>> <?= $lang->line('rdo_f') ?>
							</label>
<?php else: ?>
							<label class="radio-inline">
								<input type="radio" name="rdo_a_gender" id="" value=1 checked> <?= $lang->line('rdo_m') ?>
							</label>
							<label class="radio-inline">
								<input type="radio" name="rdo_a_gender" id="" value=0> <?= $lang->line('rdo_f') ?>
							</label>
<?php endif; ?>
						</div>
					</div>
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('a_birthday') ?></label>
						<div>
							<div class='input-group date' id='datetimepicker'>
<?php if (strval($id) != '0'): ?>
								<input type="text" class="form-control" name="txt_a_birthday" value='<?= $info['a_birthday']?>' readonly>
<?php else: ?>
								<input type="text" class="form-control" name="txt_a_birthday" value='' readonly>
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
						<label class="control-label"><?= $lang->line('residence_address') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<input type="text" class="form-control" name="txt_a_residence_address" value='<?= $info['a_residence_address']?>'>
<?php else: ?>
							<input type="text" class="form-control" name="txt_a_residence_address" value=''>
<?php endif; ?>
						</div>
					</div>
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('labor_tel') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<input type="text" class="form-control" name="txt_a_residence_tel" value='<?= $info['a_residence_tel']?>'>
<?php else: ?>
							<input type="text" class="form-control" name="txt_a_residence_tel" value=''>
<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('residential_address') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<input type="text" class="form-control" name="txt_a_residential_address" value='<?= $info['a_residential_address']?>'>
<?php else: ?>
							<input type="text" class="form-control" name="txt_a_residential_address" value=''>
<?php endif; ?>
						</div>
					</div>
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('tel') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<input type="text" class="form-control" name="txt_a_residential_tel" value='<?= $info['a_residential_tel']?>'>
<?php else: ?>
							<input type="text" class="form-control" name="txt_a_residential_tel" value=''>
<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-5">
						<label class="control-label"><?= $lang->line('labor_height') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<input type="text" class="form-control" name="txt_a_height" value='<?= $info['a_height']?>' pattern="[0-9]+">
<?php else: ?>
							<input type="text" class="form-control" name="txt_a_height" value='' pattern="[0-9]+">
<?php endif; ?>	
						</div>
					</div>
					<div class="col-sm-1">
						<label class="control-label">　</label>
						<div class="checkbox">
							<?= $lang->line('cm') ?>
						</div>
					</div>
					<div class="col-sm-3">
						<label class="control-label"><?= $lang->line('vision').'('.$lang->line('left').')' ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<input type="text" class="form-control" name="txt_a_eye_l" value='<?= $info['a_eye_l']?>' pattern="[0-9,\.]+">
<?php else: ?>
							<input type="text" class="form-control" name="txt_a_eye_l" value='' pattern="[0-9,\.]+">
<?php endif; ?>
						</div>
					</div>
					<div class="col-sm-3">
						<label class="control-label"><?= $lang->line('vision').'('.$lang->line('right').')' ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<input type="text" class="form-control" name="txt_a_eye_r" value='<?= $info['a_eye_r']?>' pattern="[0-9,\.]+">
<?php else: ?>
							<input type="text" class="form-control" name="txt_a_eye_r" value='' pattern="[0-9,\.]+">
<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-5">
						<label class="control-label"><?= $lang->line('labor_weight') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<input type="text" class="form-control" name="txt_a_weight" value='<?= $info['a_weight']?>' pattern="[0-9,\.]+">
<?php else: ?>
							<input type="text" class="form-control" name="txt_a_weight" value='' pattern="[0-9,\.]+">
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
						<label class="control-label"><?= $lang->line('eye_color') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<?= form_dropdown('sel_eye_color', $ary_eye_color, $info['a_eye_color'], 'class="form-control"'); ?>
<?php else: ?>
							<?= form_dropdown('sel_eye_color', $ary_eye_color, '', 'class="form-control"'); ?>
<?php endif; ?>				
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('hand') ?> </label>
						<div>
<?php if (strval($id) != '0'): ?>
							<label class="radio-inline">
								<input type="radio" name="rdo_a_hand" id="" value=1 <?= $info['a_hand'] == 1 ? 'checked' : '' ?>> <?= $lang->line('left') ?>
							</label>
							<label class="radio-inline">
								<input type="radio" name="rdo_a_hand" id="" value=2 <?= $info['a_hand'] == 2 ? 'checked' : '' ?>> <?= $lang->line('right') ?>
							</label>
<?php else: ?>
							<label class="radio-inline">
								<input type="radio" name="rdo_a_hand" id="" value=1 checked> <?= $lang->line('left') ?>
							</label>
							<label class="radio-inline">
								<input type="radio" name="rdo_a_hand" id="" value=2> <?= $lang->line('right') ?>
							</label>
<?php endif; ?>
						</div>
					</div>
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('hand_descr') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<input type="text" class="form-control" name="txt_a_hand_descr" value='<?= $info['a_hand_descr']?>'>
<?php else: ?>
							<input type="text" class="form-control" name="txt_a_hand_descr" value=''>
<?php endif; ?>
						</div>
					</div>					
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('1-6-3') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<?= form_dropdown('sel_doc_id6_3', $ary_doc_id6_3, $info['a_doc_id6_3'], 'class="form-control"'); ?>
<?php else: ?>
							<?= form_dropdown('sel_doc_id6_3', $ary_doc_id6_3, '', 'class="form-control"'); ?>
<?php endif; ?>				
						</div>
					</div>
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('1-6-7') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<?= form_dropdown('sel_doc_id6_7', $ary_doc_id6_7, $info['a_doc_id6_7'], 'class="form-control"'); ?>
<?php else: ?>
							<?= form_dropdown('sel_doc_id6_7', $ary_doc_id6_7, '', 'class="form-control"'); ?>
<?php endif; ?>				
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('m_food') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<?= form_dropdown('sel_diet', $ary_diet, $info['a_diet'], 'class="form-control"'); ?>
<?php else: ?>
							<?= form_dropdown('sel_diet', $ary_diet, '', 'class="form-control"'); ?>
<?php endif; ?>				
						</div>
					</div>
					<div class="col-sm-6">
					</div>
				</div>	
				<div class="form-group">
					<div class="col-sm-3 form-inline">
						<label class='form-label'> <?= $lang->line('language_ability') ?></label><br/>
<?php if(count($ary_lang_sample) > 0): ?>	
						<div id='div_lang_sample'>
<?php foreach ($ary_lang_sample as $item): ?>
							<div>
								<tr>
									<?= form_dropdown('sel_language', $ary_language, $item[0], 'class="form-control"'); ?>
								</tr>
								<tr>
									<?= form_dropdown('sel_level', $ary_level, $item[1], 'class="form-control"'); ?>
								</tr>
							</div>
<?php endforeach;?>
						</div>
						<div id='div_lang'>
<?php foreach ($ary_lang as $item): ?>
							<div>
								<tr>
									<?= form_dropdown('sel_language', $ary_language, $item[0], 'class="form-control"'); ?>
								</tr>
								<tr>
									<?= form_dropdown('sel_level', $ary_level, $item[1], 'class="form-control"'); ?>
								</tr>
							</div>
<?php endforeach;?>
						</div>
<?php else: ?>
						<div id='div_lang_sample'>
							<div>
								<tr>
									<?= form_dropdown('sel_language', $ary_language, '', 'class="form-control"'); ?>
								</tr>
								<tr>
									<?= form_dropdown('sel_level', $ary_level, '', 'class="form-control"'); ?>
								</tr>
							</div>
						</div>
						<div id='div_lang'>
						</div>
<?php endif; ?>
						<a class="btn btn-warning pull-left" prefix='language' func='add'><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
						<a class="pull-right btn btn-danger" prefix='language' func='remove'><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></a>
						<div class='row mb20' ps='for_add_del_button'>
						</div>
					</div>
				</div>
<?php if ($func == '411'): ?>				
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('passport') ?></label>
						<div>
							<div class='input-group date' id='datetimepicker'>
<?php if (strval($id) != '0'): ?>
								<input type="text" class="form-control" name="llaa_dateget_1" value='<?= $ary_labor_auth[1]['dateget'] ?>' readonly>
<?php else: ?>
								<input type="text" class="form-control" name="llaa_dateget_1" value='' readonly>
<?php endif; ?>
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-calendar"></span>
								</span>
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('examination') ?></label>
						<div>
							<div class='input-group date' id='datetimepicker'>
<?php if (strval($id) != '0'): ?>
								<input type="text" class="form-control" name="llaa_dateget_2" value='<?= $ary_labor_auth[2]['dateget'] ?>' readonly>
<?php else: ?>
								<input type="text" class="form-control" name="llaa_dateget_2" value='' readonly>
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
						<label class="control-label"><?= $lang->line('card') ?></label>
						<div>
							<div class='input-group date' id='datetimepicker'>
<?php if (strval($id) != '0'): ?>
								<input type="text" class="form-control" name="llaa_dateget_3" value='<?= $ary_labor_auth[3]['dateget'] ?>' readonly>
<?php else: ?>
								<input type="text" class="form-control" name="llaa_dateget_3" value='' readonly>
<?php endif; ?>
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-calendar"></span>
								</span>
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('umid') ?></label>
						<div>
							<div class='input-group date' id='datetimepicker'>
<?php if (strval($id) != '0'): ?>
								<input type="text" class="form-control" name="llaa_dateget_18" value='<?= $ary_labor_auth[18]['dateget'] ?>' readonly>
<?php else: ?>
								<input type="text" class="form-control" name="llaa_dateget_18" value='' readonly>
<?php endif; ?>
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-calendar"></span>
								</span>
							</div>
						</div>
					</div>
				</div>
<?php endif; ?>
			</div>
			<!-- Tab 3 -->
			<div role="tabpanel" class="tab-pane" id="family_status">
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('marital_status') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<?= form_dropdown('sel_marriage', $ary_marriage, $info['a_marriage'], 'class="form-control"'); ?>
<?php else: ?>
							<?= form_dropdown('sel_marriage', $ary_marriage, '', 'class="form-control"'); ?>
<?php endif; ?>				
						</div>
					</div>
					<div class="col-sm-6">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('marriage_date') ?></label>
						<div>
							<div class='input-group date' id='datetimepicker'>
<?php if (strval($id) != '0'): ?>
								<input type="text" class="form-control" name="txt_a_marriage_date" value='<?= $info['a_marriage_date']?>' readonly>
<?php else: ?>
								<input type="text" class="form-control" name="txt_a_marriage_date" value='' readonly>
<?php endif; ?>
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-calendar"></span>
								</span>
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('divorce_date') ?></label>
						<div>
							<div class='input-group date' id='datetimepicker'>
<?php if (strval($id) != '0'): ?>
								<input type="text" class="form-control" name="txt_a_divorce_date" value='<?= $info['a_divorce_date']?>' readonly>
<?php else: ?>
								<input type="text" class="form-control" name="txt_a_divorce_date" value='' readonly>
<?php endif; ?>
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-calendar"></span>
								</span>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-1">
						<label class="control-label"></label>
					</div>
					<div class="col-sm-2">
						<label class="control-label"><?= $lang->line('life') ?></label>
					</div>
					<div class="col-sm-2">
						<label class="control-label"><?= $lang->line('name') ?></label>
					</div>
					<div class="col-sm-2">
						<label class="control-label"><?= $lang->line('m_w_child') ?></label>
					</div>
					<div class="col-sm-2">
						<label class="control-label"><?= $lang->line('labor_profssion') ?></label>						
					</div>
					<div class="col-sm-2">
					</div>
				</div>				
				<div id='div_life'>
					<div class="form-group">
						<div class="col-sm-1">
							<div>
								<label class="control-label"><?= $lang->line('father') ?></label>
							</div>
						</div>
						<div class="col-sm-2">
							<div>
<?php if (strval($id) != '0'): ?>
								<label class="radio-inline">
									<input type="radio" name="rdo_a_life11" id="" value=1 <?= $ary_life[0] == 1 ? 'checked' : '' ?>> <?= $lang->line('life_l') ?>
								</label>
								<label class="radio-inline">
									<input type="radio" name="rdo_a_life11" id="" value=2 <?= $ary_life[0] == 2 ? 'checked' : '' ?>> <?= $lang->line('life_d') ?>
								</label>
<?php else: ?>
								<label class="radio-inline">
									<input type="radio" name="rdo_a_life11" id="" value=1 checked> <?= $lang->line('life_l') ?>
								</label>
								<label class="radio-inline">
									<input type="radio" name="rdo_a_life11" id="" value=2> <?= $lang->line('life_d') ?>
								</label>
<?php endif; ?>
							</div>
						</div>
						<div class="col-sm-2">
							<div>
<?php if (strval($id) != '0'): ?>
								<input type="text" class="form-control" name="txt_a_life12" value='<?= $ary_life[1] ?>'>
<?php else: ?>
								<input type="text" class="form-control" name="txt_a_life12" value=''>
<?php endif; ?>
							</div>
						</div>
						<div class="col-sm-2">
							<div>
<?php if (strval($id) != '0'): ?>
								<input type="text" class="form-control" name="txt_a_life13" value='<?= $ary_life[2] ?>'>
<?php else: ?>
								<input type="text" class="form-control" name="txt_a_life13" value=''>
<?php endif; ?>
							</div>						
						</div>
						<div class="col-sm-2">
							<div>
<?php if (strval($id) != '0'): ?>
								<input type="text" class="form-control" name="txt_a_life14" value='<?= $ary_life[3] ?>'>
<?php else: ?>
								<input type="text" class="form-control" name="txt_a_life14" value=''>
<?php endif; ?>
							</div>
						</div>
						<div class="col-sm-2">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-1">
							<div>
								<label class="control-label"><?= $lang->line('mother') ?></label>
							</div>
						</div>
						<div class="col-sm-2">
							<div>
<?php if (strval($id) != '0'): ?>
								<label class="radio-inline">
									<input type="radio" name="rdo_a_life21" id="" value=1 <?= $ary_life[4] == 1 ? 'checked' : '' ?>> <?= $lang->line('life_l') ?>
								</label>
								<label class="radio-inline">
									<input type="radio" name="rdo_a_life21" id="" value=2 <?= $ary_life[4] == 2 ? 'checked' : '' ?>> <?= $lang->line('life_d') ?>
								</label>
<?php else: ?>
								<label class="radio-inline">
									<input type="radio" name="rdo_a_life21" id="" value=1 checked> <?= $lang->line('life_l') ?>
								</label>
								<label class="radio-inline">
									<input type="radio" name="rdo_a_life21" id="" value=2> <?= $lang->line('life_d') ?>
								</label>
<?php endif; ?>
							</div>
						</div>
						<div class="col-sm-2">
							<div>
<?php if (strval($id) != '0'): ?>
								<input type="text" class="form-control" name="txt_a_life22" value='<?= $ary_life[5] ?>'>
<?php else: ?>
								<input type="text" class="form-control" name="txt_a_life22" value=''>
<?php endif; ?>
							</div>
						</div>
						<div class="col-sm-2">
							<div>
<?php if (strval($id) != '0'): ?>
								<input type="text" class="form-control" name="txt_a_life23" value='<?= $ary_life[6] ?>'>
<?php else: ?>
								<input type="text" class="form-control" name="txt_a_life23" value=''>
<?php endif; ?>
							</div>						
						</div>
						<div class="col-sm-2">
							<div>
<?php if (strval($id) != '0'): ?>
								<input type="text" class="form-control" name="txt_a_life24" value='<?= $ary_life[7] ?>'>
<?php else: ?>
								<input type="text" class="form-control" name="txt_a_life24" value=''>
<?php endif; ?>
							</div>
						</div>
						<div class="col-sm-2">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-1">
							<div>
								<label class="control-label"><?= $lang->line('spouse') ?></label>
							</div>
						</div>
						<div class="col-sm-2">
							<div>
<?php if (strval($id) != '0'): ?>
								<label class="radio-inline">
									<input type="radio" name="rdo_a_life31" id="" value=1 <?= $ary_life[8] == 1 ? 'checked' : '' ?>> <?= $lang->line('life_l') ?>
								</label>
								<label class="radio-inline">
									<input type="radio" name="rdo_a_life31" id="" value=2 <?= $ary_life[8] == 2 ? 'checked' : '' ?>> <?= $lang->line('life_d') ?>
								</label>
<?php else: ?>
								<label class="radio-inline">
									<input type="radio" name="rdo_a_life31" id="" value=1 checked> <?= $lang->line('life_l') ?>
								</label>
								<label class="radio-inline">
									<input type="radio" name="rdo_a_life31" id="" value=2> <?= $lang->line('life_d') ?>
								</label>
<?php endif; ?>
							</div>
						</div>
						<div class="col-sm-2">
							<div>
<?php if (strval($id) != '0'): ?>
								<input type="text" class="form-control" name="txt_a_life32" value='<?= $ary_life[9] ?>'>
<?php else: ?>
								<input type="text" class="form-control" name="txt_a_life32" value=''>
<?php endif; ?>
							</div>
						</div>
						<div class="col-sm-2">
							<div>
<?php if (strval($id) != '0'): ?>
								<input type="text" class="form-control" name="txt_a_life33" value='<?= $ary_life[10] ?>'>
<?php else: ?>
								<input type="text" class="form-control" name="txt_a_life33" value=''>
<?php endif; ?>
							</div>
						</div>
						<div class="col-sm-2">
							<div>
<?php if (strval($id) != '0'): ?>
								<input type="text" class="form-control" name="txt_a_life34" value='<?= $ary_life[11] ?>'>
<?php else: ?>
								<input type="text" class="form-control" name="txt_a_life34" value=''>
<?php endif; ?>
							</div>
						</div>
						<div class="col-sm-2">
						</div>
					</div>
				</div>				
				<div class="form-group" id="div_life_qty">
					<div class="col-sm-2">
						<label class="control-label"><?= $lang->line('ranking') ?></label>						
						<div>
<?php if (strval($id) != '0'): ?>
							<input type="text" class="form-control" name="txt_a_life_qty1" value='<?= $ary_life_qty[0] ?>' placeholder='人數'>
<?php else: ?>
							<input type="text" class="form-control" name="txt_a_life_qty1" value='' placeholder='人數'>
<?php endif; ?>
						</div>
					</div>
					<div class="col-sm-2">
						<label class="control-label"><?= $lang->line('brother') ?></label>						
						<div>
<?php if (strval($id) != '0'): ?>
							<input type="text" class="form-control" name="txt_a_life_qty2" value='<?= $ary_life_qty[1] ?>' placeholder='人數'>
<?php else: ?>
							<input type="text" class="form-control" name="txt_a_life_qty2" value='' placeholder='人數'>
<?php endif; ?>
						</div>
					</div>
					<div class="col-sm-2">
						<label class="control-label"><?= $lang->line('brother2') ?></label>						
						<div>
<?php if (strval($id) != '0'): ?>
							<input type="text" class="form-control" name="txt_a_life_qty3" value='<?= $ary_life_qty[2] ?>' placeholder='人數'>
<?php else: ?>
							<input type="text" class="form-control" name="txt_a_life_qty3" value='' placeholder='人數'>
<?php endif; ?>
						</div>
					</div>
					<div class="col-sm-2">
						<label class="control-label"><?= $lang->line('sister') ?></label>						
						<div>
<?php if (strval($id) != '0'): ?>
							<input type="text" class="form-control" name="txt_a_life_qty4" value='<?= $ary_life_qty[3] ?>' placeholder='人數'>
<?php else: ?>
							<input type="text" class="form-control" name="txt_a_life_qty4" value='' placeholder='人數'>
<?php endif; ?>
						</div>
					</div>
					<div class="col-sm-2">
						<label class="control-label"><?= $lang->line('sister2') ?></label>						
						<div>
<?php if (strval($id) != '0'): ?>
							<input type="text" class="form-control" name="txt_a_life_qty5" value='<?= $ary_life_qty[4] ?>' placeholder='人數'>
<?php else: ?>
							<input type="text" class="form-control" name="txt_a_life_qty5" value='' placeholder='人數'>
<?php endif; ?>
						</div>
					</div>																				
					<div class="col-sm-2">
					</div>
				</div>				
				<div class="form-group">
					<div class="col-sm-3">
						<label class='form-label'> <?= $lang->line('child') ?></label><br/>						
<?php if(count($ary_life_child_sample) > 0): ?>
						<div id='div_life_child_sample'>
<?php foreach ($ary_life_child_sample as $item): ?>
							<div>
								<label class="radio-inline">
									<input type="radio" name="rdo_a_life_child" id="" value=1 <?= $item[0] == 1 ? 'checked="checked"' : '' ?>> <?= $lang->line('rdo_m') ?>
								</label>
								<label class="radio-inline">
									<input type="radio" name="rdo_a_life_child" id="" value=0 <?= $item[0] == 0 ? 'checked="checked"' : '' ?>> <?= $lang->line('rdo_f') ?>
								</label>
								<input type="text" class="form-control" name="txt_a_life_child2" value='<?= $item[1] ?>' placeholder='年齡'>
							</div>
<?php endforeach;?>
						</div>
						<div id='div_life_child'>
<?php foreach ($ary_life_child as $item): ?>
							<div>
								<label class="radio-inline">
									<input type="radio" name="rdo_a_life_child" id="" value=1 <?= $item[0] == 1 ? 'checked="checked"' : '' ?>> <?= $lang->line('rdo_m') ?>
								</label>
								<label class="radio-inline">
									<input type="radio" name="rdo_a_life_child" id="" value=0 <?= $item[0] == 0 ? 'checked="checked"' : '' ?>> <?= $lang->line('rdo_f') ?>
								</label>
								<input type="text" class="form-control" name="txt_a_life_child2" value='<?= $item[1] ?>' placeholder='年齡'>
							</div>
<?php endforeach;?>
						</div>
<?php else: ?>
						<div id='div_life_child_sample'>
							<div>
								<label class="radio-inline">
									<input type="radio" name="rdo_a_life_child" id="" value=1 checked="checked"> <?= $lang->line('rdo_m') ?>
								</label>
								<label class="radio-inline">
									<input type="radio" name="rdo_a_life_child" id="" value=2> <?= $lang->line('rdo_f') ?>
								</label>
								<input type="text" class="form-control" name="txt_a_life_child2" value='' placeholder='年齡'>
							</div>
						</div>
						<div id='div_life_child'>
						</div>
<?php endif; ?>
						<a class="btn btn-warning pull-left" prefix='child' func='add'><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
						<a class="pull-right btn btn-danger" prefix='child' func='remove'><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></a>
						<div class='row mb20' ps='for_add_del_button'>
						</div>
					</div>
				</div>
				
			</div>
			<!-- Tab 4 -->
			<div role="tabpanel" class="tab-pane" id="education_skill">
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('m_education') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<?= form_dropdown('sel_education', $ary_education, $info['a_education'], 'class="form-control"'); ?>
<?php else: ?>
							<?= form_dropdown('sel_education', $ary_education, '', 'class="form-control"'); ?>
<?php endif; ?>				
						</div>						
					</div>
					<div class="col-sm-3">
						<label class="control-label"><?= $lang->line('study_date_s') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<div class='input-group date' id='datetimepicker'>
								<input type="text" class="form-control" name="txt_a_study_start" value='<?= $info['a_study_start']?>' readonly>
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-calendar"></span>
								</span>
							</div>
<?php else: ?>
							<div class='input-group date' id='datetimepicker'>
								<input type="text" class="form-control" name="txt_a_study_start" value='' readonly>
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-calendar"></span>
								</span>
							</div>
<?php endif; ?>	
						</div>
					</div>
					<div class="col-sm-3">
						<label class="control-label"><?= $lang->line('study_date_e') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<div class='input-group date' id='datetimepicker'>
								<input type="text" class="form-control" name="txt_a_study_end" value='<?= $info['a_study_end']?>' readonly>
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-calendar"></span>
								</span>
							</div>
<?php else: ?>
							<div class='input-group date' id='datetimepicker'>
								<input type="text" class="form-control" name="txt_a_study_end" value='' readonly>
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
						<label class="control-label"><?= $lang->line('graduated_school') ?></label>						
						<div>
<?php if (strval($id) != '0'): ?>
							<input type="text" class="form-control" name="txt_a_graduated_school" value='<?= $info['a_graduated_school'] ?>'>
<?php else: ?>
							<input type="text" class="form-control" name="txt_a_graduated_school" value=''>
<?php endif; ?>
						</div>
					</div>
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('graduated_department') ?></label>						
						<div>
<?php if (strval($id) != '0'): ?>
							<input type="text" class="form-control" name="txt_a_graduated_department" value='<?= $info['a_graduated_department'] ?>'>
<?php else: ?>
							<input type="text" class="form-control" name="txt_a_graduated_department" value=''>
<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('license_file_path') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<input id="a_license" type="file" class="file-loading">
							<input name='hid_a_license' type='hidden' value='<?= $info['a_license']?>'>
<?php else: ?>
							<input id="a_license" type="file" class="file-loading">
							<input name='hid_a_license' type='hidden' value=''>
<?php endif; ?>				
						</div>
					</div>
					<div class="col-sm-6">
<!--						
						<label class="control-label"><?= $lang->line('work_expertise') ?></label>						
						<div>
<?php if (strval($id) != '0'): ?>
							<input type="text" class="form-control" name="txt_a_work_expertise" value='<?= $info['a_work_expertise'] ?>'>
<?php else: ?>
							<input type="text" class="form-control" name="txt_a_work_expertise" value=''>
<?php endif; ?>
						</div>
-->						
					</div>
				</div>
				<label class="control-label"><?= $lang->line('license') ?></label>
				<div class="form-group">
					<div class="col-sm-12">
						<table class="table table-bordered table-hover table-responsive" id="tab_laborLicense">
							<thead>
								<tr >
									<th width="5%"class="text-center">#</th>
									<th width="15%"class="text-center text-nowrap"><?= $lang->line('date') ?></th>
									<th width="20%"class="text-center text-nowrap"><?= $lang->line('user_create') ?></th>
									<th width="60%"class="text-center text-nowrap"><?= $lang->line('desc') ?></th>
								</tr>
							</thead>
							<tbody>
<?php if(count($ary_laborLicense) > 0): ?>
<?php foreach ($ary_laborLicense as $item): ?>
								<tr id="<?= 'addr_laborLicense'.($item['row'] - 1) ?>">
									<td>
										<?= ($item['row']) ?>
										<input type='hidden' name='row_laborLicense[]' value='<?= ($item['row']) ?>'>
									</td>
									<td>
										<div class='input-group date' id='datetimepicker'>
											<input type="text" class="form-control" name="date_laborLicense[]" value='<?= ($item['date']) ?>' readonly>
											<span class="input-group-addon">
												<span class="glyphicon glyphicon-calendar"></span>
											</span>
										</div>
									</td>
									<td>
										<?= form_dropdown('emp_id_laborLicense[]', $ary_emp, $item['emp_id'], 'class="form-control" row="'.$item['row'].'"'); ?>
									</td>
									<td>
										<input type="text" name='descr_laborLicense[]' value='<?= ($item['descr']) ?>' class="form-control" />
									</td>
								</tr>
<?php endforeach;?>
								<tr id='<?php echo 'addr_laborLicense'.count($ary_laborLicense) ?>'></tr>
<?php else: ?>
								<tr id='addr_laborLicense0'>
									<td>
										1
										<input type='hidden' name='row_laborLicense[]' value='1'>
									</td>
									<td>
										<div class='input-group date' id='datetimepicker'>
											<input type="text" class="form-control" name="date_laborLicense[]" value='' readonly>
											<span class="input-group-addon">
												<span class="glyphicon glyphicon-calendar"></span>
											</span>
										</div>
									</td>
									<td>
										<?= form_dropdown('emp_id_laborLicense[]', $ary_emp, '', 'class="form-control"'); ?>
									</td>
									<td>
										<input type="text" name='descr_laborLicense[]' class='form-control'>
									</td>
								</tr>
								<tr id='addr_laborLicense1'></tr>
<?php endif; ?>
							</tbody>
						</table>
						<a class="add_row btn btn-warning pull-left" prefix='laborLicense'><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
						<a class="delete_row pull-right btn btn-danger" prefix='laborLicense'><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></a>
						<div class='row mb20' ps='for_add_del_button'>
						</div>
					</div>
				</div>

			</div>
			<!-- Tab 5 -->
			<div role="tabpanel" class="tab-pane" id="work_skill">

			<label class="control-label"><?= $lang->line('m_w_home_6') ?></label>
				<div class="form-group">
					<div class="col-sm-12">
						<table class="table table-bordered table-hover table-responsive" id="tab_laborFactory">
							<thead>
								<tr >
									<th width="3%"  class="text-center">#</th>
									<th width="15%" class="text-center text-nowrap"><?= $lang->line('1-1-1').'/'.$lang->line('company') ?></th>
									<th width="15%" class="text-center text-nowrap"><?= $lang->line('work_time').'/'.$lang->line('work_year') ?></th>
									<th width="26%" class="text-center text-nowrap"><?= $lang->line('work_detail').'/'.$lang->line('company_product') ?></th>
									<th width="15%" class="text-center text-nowrap"><?= $lang->line('avg_salary').'/'.$lang->line('jobtitle') ?></th>
									<th width="26%" class="text-center text-nowrap"><?= $lang->line('offboard_desc') ?></th>
								</tr>
							</thead>
							<tbody>
<?php if(count($ary_laborFactory) > 0): ?>
<?php foreach ($ary_laborFactory as $item): ?>
								<tr id="<?= 'addr_laborFactory'.($item['row'] - 1) ?>">
									<td>
										<?= ($item['row']) ?>
										<input type='hidden' name='row_laborFactory[]' value='<?= ($item['row']) ?>'>
									</td>
									<td>
										<?= form_dropdown('sel_country_laborFactory[]', $ary_emp, $item['country_id'], 'class="form-control" row="'.$item['row'].'"'); ?>
										<input type="text" name='company_name_laborFactory[]' value='<?= ($item['company_name']) ?>' class="form-control" />
									</td>
									<td>
										<input type="text" name='period_laborFactory[]' value='<?= ($item['period']) ?>' class="form-control" />
										<input type="text" name='year_laborFactory[]' value='<?= ($item['year']) ?>' class="form-control" />
									</td>
									<td>
										<input type="text" name='detail_laborFactory[]' value='<?= ($item['detail']) ?>' class="form-control" />
										<input type="text" name='product_laborFactory[]' value='<?= ($item['product']) ?>' class="form-control" />
									</td>
									<td>
										<input type="text" name='salary_laborFactory[]' value='<?= ($item['detail']) ?>' class="form-control" />
										<input type="text" name='jobtitle_laborFactory[]' value='<?= ($item['product']) ?>' class="form-control" />
									</td>
									<td>
										<textarea name='descr_laborFactory[]' class='form-control'><?= $item['descr']?></textarea>								
									</td>
								</tr>
<?php endforeach;?>
								<tr id='<?php echo 'addr_laborFactory'.count($ary_laborFactory) ?>'></tr>
<?php else: ?>
								<tr id='addr_laborFactory0'>
									<td>
										1
										<input type='hidden' name='row_laborFactory[]' value='1'>
									</td>
									<td>
										<?= form_dropdown('sel_country_laborFactory[]', $ary_country, '', 'class="form-control"'); ?>
										<input type="text" name='company_name_laborFactory[]' class="form-control" />
									</td>
									<td>
										<input type="text" name='period_laborFactory[]' class="form-control" />
										<input type="text" name='year_laborFactory[]' class="form-control" />
									</td>
									<td>
										<input type="text" name='detail_laborFactory[]' class="form-control" />
										<input type="text" name='product_laborFactory[]' class="form-control" />
									</td>
									<td>
										<input type="text" name='salary_laborFactory[]' class="form-control" />
										<input type="text" name='jobtitle_laborFactory[]' class="form-control" />
									</td>
									<td>
										<textarea name='descr_laborFactory[]' class='form-control'></textarea>
									</td>
								</tr>
								<tr id='addr_laborFactory1'></tr>
<?php endif; ?>
							</tbody>
						</table>
						<a class="add_row btn btn-warning pull-left" prefix='laborFactory'><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
						<a class="delete_row pull-right btn btn-danger" prefix='laborFactory'><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></a>
						<div class='row mb20' ps='for_add_del_button'>
						</div>
					</div>
				</div>
				<label class="control-label"><?= $lang->line('m_w_main_2').'/'.$lang->line('m_w_main_1') ?></label>
				<div class="form-group">
					<div class="col-sm-12">
						<table class="table table-bordered table-hover table-responsive" id="tab_laborMaid">
							<thead>
								<tr >
									<th width="3%" class="text-center">#</th>
									<th width="15%" class="text-center text-nowrap"><?= $lang->line('1-1-1').'/'.$lang->line('work_type') ?></th>
									<th width="15%" class="text-center text-nowrap"><?= $lang->line('work_time').'/'.$lang->line('work_year') ?></th>
									<th width="15%" class="text-center text-nowrap"><?= $lang->line('employer_gender').'/'.$lang->line('m_w_child') ?></th>
									<th width="26%" class="text-center text-nowrap"><?= $lang->line('maid_desc') ?></th>
									<th width="26%" class="text-center text-nowrap"><?= $lang->line('offboard_desc') ?></th>
								</tr>
							</thead>
							<tbody>
<?php if(count($ary_laborMaid) > 0): ?>
<?php foreach ($ary_laborMaid as $item): ?>
								<tr id="<?= 'addr_laborMaid'.($item['row'] - 1) ?>">
									<td>
										<?= ($item['row']) ?>
										<input type='hidden' name='row_laborMaid[]' value='<?= ($item['row']) ?>'>
									</td>
									<td>
										<?= form_dropdown('sel_country_laborMaid[]', $ary_emp, $item['country_id'], 'class="form-control" row="'.$item['row'].'"'); ?>
										<?= form_dropdown('sel_type_laborMaid[]', $ary_maidType, $item['type'], 'class="form-control" row="'.$item['row'].'"'); ?>
									</td>
									<td>
										<input type="text" name='detail_laborFactory[]' value='<?= ($item['detail']) ?>' class="form-control" />
										<input type="text" name='age_laborFactory[]' value='<?= ($item['age']) ?>' class="form-control" />
									</td>
									<td>
										<div class="checkbox">
											<label class="radio-inline">
												<input type="radio" name="gender_laborMaid_<?=$item['row']?>" id="" value=1 <?= $item['gender'] == 1 ? 'checked' : '' ?> row="<?=$item['row']?>"> <?= $lang->line('rdo_m') ?>
											</label>
											<label class="radio-inline">
												<input type="radio" name="gender_laborMaid_<?=$item['row']?>" id="" value=2 <?= $item['gender'] == 2 ? 'checked' : '' ?> row="<?=$item['row']?>"> <?= $lang->line('rdo_f') ?>
											</label>
										</div>
										<input type='hidden' name="gender_laborMaid[]" id="" value="<?= $item['gender'] ?>" row="<?=$item['row']?>">
										<input type="text" name='year_laborMaid[]' value='<?= ($item['year']) ?>' class="form-control" />
									</td>
									<td>
										<textarea name='detail_laborMaid[]' class="form-control"><?= ($item['detail']) ?></textarea>
									</td>							
									<td>
										<textarea name='descr_laborMaid[]' class='form-control'><?= $item['descr'] ?></textarea>								
									</td>
								</tr>
<?php endforeach;?>
								<tr id='<?php echo 'addr_laborMaid'.count($ary_laborMaid) ?>'></tr>
<?php else: ?>
								<tr id='addr_laborMaid0'>
									<td>
										1
										<input type='hidden' name='row_laborMaid[]' value='1'>
									</td>
									<td>
										<?= form_dropdown('sel_country_laborMaid[]', $ary_country, '', 'class="form-control"'); ?>
										<?= form_dropdown('sel_type_laborMaid[]', $ary_maidType, '', 'class="form-control"'); ?>
									</td>
									<td>
										<input type="text" name='period_laborMaid[]' class="form-control" />
										<input type="text" name='year_laborMaid[]' class="form-control" />
									</td>
									<td>
										<div class="checkbox">
											<label class="radio-inline">
												<input type="radio" name="gender_laborMaid_<?=$item['row']?>" id="" value=1 row="1" checked> <?= $lang->line('rdo_m') ?>
											</label>
											<label class="radio-inline">
												<input type="radio" name="gender_laborMaid_<?=$item['row']?>" id="" value=2 row="1" > <?= $lang->line('rdo_f') ?>											</label>
											</label>
										</div>
										<input type='hidden' name="gender_laborMaid[]" id="" value=1 row="1">	

										<input type="text" name='age_laborMaid[]' class="form-control" />
									</td>
									<td>
										<textarea name='detail_laborMaid[]' class='form-control'></textarea>
									</td>
									<td>
										<textarea name='descr_laborMaid[]' class='form-control'></textarea>
									</td>
								</tr>
								<tr id='addr_laborMaid1'></tr>
<?php endif; ?>
							</tbody>
						</table>
						<a class="add_row btn btn-warning pull-left" prefix='laborMaid'><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
						<a class="delete_row pull-right btn btn-danger" prefix='laborMaid'><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></a>
						<div class='row mb20' ps='for_add_del_button'>
						</div>
					</div>
				</div>
			</div>
			<!-- Tab 6 -->
			<div role="tabpanel" class="tab-pane" id="contactdata">
				<label class="control-label"><?= $lang->line('referrals') ?></label>
				<div class="form-group">
					<div class="col-sm-12">
						<table class="table table-bordered table-hover table-responsive" id="tab_laborContact1">
							<thead>
								<tr>
									<th width="3%" class="text-center">#</th>
									<th width="15%" class="text-center text-nowrap"><?= $lang->line('referrals') ?></th>
									<th width="17%" class="text-center text-nowrap"><?= $lang->line('name') ?></th>
									<th width="15%" class="text-center text-nowrap"><?= $lang->line('phone') ?></th>
									<th width="25%" class="text-center text-nowrap"><?= $lang->line('tw_address') ?></th>
									<th width="25%" class="text-center text-nowrap"><?= $lang->line('desc') ?></th>
								</tr>
							</thead>
							<tbody>
<?php if(count($ary_laborContact1) > 0): ?>
<?php foreach ($ary_laborContact1 as $item): ?>
								<tr id="<?= 'addr_laborContact1'.($item['row'] - 1) ?>">
									<td>
										<?= ($item['row']) ?>
										<input type='hidden' name='row_laborContact1[]' value='<?= ($item['row']) ?>'>
									</td>
									<td>
										<input type="text" name='sel_referrals_id_laborContact1[]' value='<?= ($item['referrals_id']) ?>' class="form-control" />
									</td>
									<td>
										<input type="text" name='name_laborContact1[]' value='<?= ($item['name']) ?>' class="form-control" />
									</td>
									<td>
										<input type="text" name='tel_laborContact1[]' value='<?= ($item['tel']) ?>' class="form-control" />
									</td>
									<td>
										<textarea name='address_laborContact1[]' class='form-control'><?= $item['address'] ?></textarea>								
									</td>
									<td>
										<textarea name='descr_laborContact1[]' class='form-control'><?= $item['descr'] ?></textarea>								
									</td>
								</tr>
<?php endforeach;?>
								<tr id='<?php echo 'addr_laborContact1'.count($ary_laborContact1) ?>'></tr>
<?php else: ?>
								<tr id='addr_laborContact10'>
									<td>
										1
										<input type='hidden' name='row_laborContact1[]' value='1'>
									</td>
									<td>
										<input type="text" name='sel_referrals_id_laborContact1[]' class="form-control" />
									</td>
									<td>
										<input type="text" name='name_laborContact1[]' class="form-control" />
									</td>
									<td>
										<input type="text" name='tel_laborContact1[]' class="form-control" />
									</td>
									<td>
										<textarea name='add_laborContact1[]' class='form-control'></textarea>
									</td>																		
									<td>
										<textarea name='descr_laborContact1[]' class='form-control'></textarea>
									</td>
								</tr>
								<tr id='addr_laborContact11'></tr>
<?php endif; ?>
							</tbody>
						</table>
						<a class="add_row btn btn-warning pull-left" prefix='laborContact1'><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
						<a class="delete_row pull-right btn btn-danger" prefix='laborContact1'><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></a>
						<div class='row mb20' ps='for_add_del_button'>
						</div>
					</div>
				</div>
				<label class="control-label"><?= $lang->line('friend_tw') ?></label>
				<div class="form-group">
					<div class="col-sm-12">
						<table class="table table-bordered table-hover table-responsive" id="tab_laborContact2">
							<thead>
								<tr>
									<th width="3%" class="text-center">#</th>
									<th width="10%" class="text-center text-nowrap"><?= $lang->line('friend_tw') ?></th>
									<th width="12%" class="text-center text-nowrap"><?= $lang->line('name') ?></th>
									<th width="15%" class="text-center text-nowrap"><?= $lang->line('phone') ?></th>
									<th width="20%" class="text-center text-nowrap"><?= $lang->line('work_site') ?></th>
									<th width="15%" class="text-center text-nowrap"><?= $lang->line('work_name') ?></th>
									<th width="25%" class="text-center text-nowrap"><?= $lang->line('desc') ?></th>
								</tr>
							</thead>
							<tbody>
<?php if(count($ary_laborContact2) > 0): ?>
<?php foreach ($ary_laborContact2 as $item): ?>
								<tr id="<?= 'addr_laborContact2'.($item['row'] - 1) ?>">
									<td>
										<?= ($item['row']) ?>
										<input type='hidden' name='row_laborContact2[]' value='<?= ($item['row']) ?>'>
									</td>
									<td>
										<?= form_dropdown('sel_friend_laborContact2[]', $ary_friend, $item['friend'], 'class="form-control" row="'.$item['row'].'"'); ?>
									</td>
									<td>
										<input type="text" name='name_laborContact2[]' value='<?= ($item['name']) ?>' class="form-control" />
									</td>
									<td>
										<input type="text" name='tel_laborContact2[]' value='<?= ($item['tel']) ?>' class="form-control" />
									</td>
									<td>
										<textarea name='address_laborContact2[]' class='form-control'><?= $item['address'] ?></textarea>								
									</td>
									<td>
										<textarea name='factory_name_laborContact2[]' class='form-control'><?= $item['factory_name'] ?></textarea>								
									</td>									
									<td>
										<textarea name='descr_laborContact2[]' class='form-control'><?= $item['descr'] ?></textarea>								
									</td>
								</tr>
<?php endforeach;?>
								<tr id='<?php echo 'addr_laborContact2'.count($ary_laborContact2) ?>'></tr>
<?php else: ?>
								<tr id='addr_laborContact20'>
									<td>
										1
										<input type='hidden' name='row_laborContact2[]' value='1'>
									</td>
									<td>
										<?= form_dropdown('sel_friend_laborMaid[]', $ary_friend, '', 'class="form-control"'); ?>
									</td>
									<td>
										<input type="text" name='name_laborContact2[]' class="form-control" />
									</td>
									<td>
										<input type="text" name='tel_laborContact2[]' class="form-control" />
									</td>
									<td>
										<textarea name='address_laborContact2[]' class='form-control'></textarea>
									</td>
									<td>
										<textarea name='factory_name_laborContact2[]' class='form-control'></textarea>
									</td>																											
									<td>
										<textarea name='descr_laborContact2[]' class='form-control'></textarea>
									</td>
								</tr>
								<tr id='addr_laborContact21'></tr>
<?php endif; ?>
							</tbody>
						</table>
						<a class="add_row btn btn-warning pull-left" prefix='laborContact2'><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
						<a class="delete_row pull-right btn btn-danger" prefix='laborContact2'><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></a>
						<div class='row mb20' ps='for_add_del_button'>
						</div>
					</div>
				</div>
				<label class="control-label"><?= $lang->line('contact2') ?></label>
				<div class="form-group">
					<div class="col-sm-12">
						<table class="table table-bordered table-hover table-responsive" id="tab_laborContact3">
							<thead>
								<tr>
									<th width="3%" class="text-center">#</th>
									<th width="15%" class="text-center text-nowrap"><?= $lang->line('relationship') ?></th>
									<th width="17%" class="text-center text-nowrap"><?= $lang->line('name') ?></th>
									<th width="15%" class="text-center text-nowrap"><?= $lang->line('phone') ?></th>
									<th width="25%" class="text-center text-nowrap"><?= $lang->line('tw_address') ?></th>
									<th width="25%" class="text-center text-nowrap"><?= $lang->line('desc') ?></th>
								</tr>
							</thead>
							<tbody>
<?php if(count($ary_laborContact3) > 0): ?>
<?php foreach ($ary_laborContact3 as $item): ?>
								<tr id="<?= 'addr_laborContact3'.($item['row'] - 1) ?>">
									<td>
										<?= ($item['row']) ?>
										<input type='hidden' name='row_laborContact3[]' value='<?= ($item['row']) ?>'>
									</td>
									<td>
										<input type="text" name='relationship_laborContact3[]' value='<?= ($item['relationship']) ?>' class="form-control" />
									</td>
									<td>
										<input type="text" name='name_laborContact3[]' value='<?= ($item['name']) ?>' class="form-control" />
									</td>
									<td>
										<input type="text" name='tel_laborContact3[]' value='<?= ($item['tel']) ?>' class="form-control" />
									</td>
									<td>
										<textarea name='address_laborContact3[]' class='form-control'><?= $item['address'] ?></textarea>								
									</td>
									<td>
										<textarea name='descr_laborContact3[]' class='form-control'><?= $item['descr'] ?></textarea>								
									</td>
								</tr>
<?php endforeach;?>
								<tr id='<?php echo 'addr_laborContact3'.count($ary_laborContact3) ?>'></tr>
<?php else: ?>
								<tr id='addr_laborContact30'>
									<td>
										1
										<input type='hidden' name='row_laborContact3[]' value='1'>
									</td>
									<td>
										<input type="text" name='relationship_laborContact3[]' class="form-control" />
									</td>
									<td>
										<input type="text" name='name_laborContact3[]' class="form-control" />
									</td>
									<td>
										<input type="text" name='tel_laborContact3[]' class="form-control" />
									</td>
									<td>
										<textarea name='add_laborContact3[]' class='form-control'></textarea>
									</td>																		
									<td>
										<textarea name='descr_laborContact3[]' class='form-control'></textarea>
									</td>
								</tr>
								<tr id='addr_laborContact31'></tr>
<?php endif; ?>
							</tbody>
						</table>
						<a class="add_row btn btn-warning pull-left" prefix='laborContact3'><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
						<a class="delete_row pull-right btn btn-danger" prefix='laborContact3'><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></a>
						<div class='row mb20' ps='for_add_del_button'>
						</div>
					</div>
				</div>				
			</div>
			<!-- Tab 7 -->
			<div role="tabpanel" class="tab-pane" id="maid_work_skill">
				<div class="form-group">
					<div class="col-sm-2">
					</div>
					<div class="col-sm-1">
						<label class="control-label"><?= $lang->line('experience') ?></label>
						<label class="control-label"><?= $lang->line('wish') ?></label>
					</div>
					<div class="col-sm-2">
					</div>
					<div class="col-sm-1">
						<label class="control-label"><?= $lang->line('experience') ?></label>
						<label class="control-label"><?= $lang->line('wish') ?></label>
					</div>
					<div class="col-sm-2">
					</div>
					<div class="col-sm-1">
						<label class="control-label"><?= $lang->line('experience') ?></label>
						<label class="control-label"><?= $lang->line('wish') ?></label>
					</div>
					<div class="col-sm-2">
					</div>
					<div class="col-sm-1">
						<label class="control-label"><?= $lang->line('experience') ?></label>
						<label class="control-label"><?= $lang->line('wish') ?></label>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-1">
						<label class="control-label"><?= $lang->line('maid_f') ?></label>
					</div>
					<div class="col-sm-1">
						<label class="control-label"><?= $lang->line('maid_m_1') ?></label>
					</div>
					<div class="col-sm-1">
						<div class='checkbox'>
<?php if (strval($id) != '0'): ?>
							<label>
								<input type="checkbox" name='chk_a_maid_f_experience[]' value="1" <?= ($info['a_maid_f_experience'] & 1) == '1' ? 'checked="checked"' : '' ?>/>
							</label>　
							<label>
								<input type="checkbox" name='chk_a_maid_f_wish[]' value="1" <?= ($info['a_maid_f_wish'] & 1) == '1' ? 'checked="checked"' : '' ?>/>
							</label>
<?php else: ?>
							<label>
								<input type="checkbox" name='chk_a_maid_f_experience[]' value="1" />
							</label>　
							<label>
								<input type="checkbox" name='chk_a_maid_f_wish[]' value="1" />
							</label>
<?php endif; ?>
						</div>
					</div>
					<div class="col-sm-2">
						<label class="control-label"><?= $lang->line('maid_m_3') ?></label>
					</div>
					<div class="col-sm-1">
						<div class='checkbox'>
<?php if (strval($id) != '0'): ?>
							<label>
								<input type="checkbox" name='chk_a_maid_f_experience[]' value="2" <?= ($info['a_maid_f_experience'] & 2) == '2' ? 'checked="checked"' : '' ?>/>
							</label>　
							<label>
								<input type="checkbox" name='chk_a_maid_f_wish[]' value="2" <?= ($info['a_maid_f_wish'] & 2) == '2' ? 'checked="checked"' : '' ?>/>
							</label>
<?php else: ?>
							<label>
								<input type="checkbox" name='chk_a_maid_f_experience[]' value="2" />
							</label>　
							<label>
								<input type="checkbox" name='chk_a_maid_f_wish[]' value="2" />
							</label>
<?php endif; ?>
						</div>
					</div>
					<div class="col-sm-2">
						<label class="control-label"><?= $lang->line('maid_m_5') ?></label>
					</div>
					<div class="col-sm-1">
						<div class='checkbox'>
<?php if (strval($id) != '0'): ?>
							<label>
								<input type="checkbox" name='chk_a_maid_f_experience[]' value="4" <?= ($info['a_maid_f_experience'] & 4) == '4' ? 'checked="checked"' : '' ?>/>
							</label>　
							<label>
								<input type="checkbox" name='chk_a_maid_f_wish[]' value="4" <?= ($info['a_maid_f_wish'] & 4) == '4' ? 'checked="checked"' : '' ?>/>
							</label>
<?php else: ?>
							<label>
								<input type="checkbox" name='chk_a_maid_f_experience[]' value="4" />
							</label>　
							<label>
								<input type="checkbox" name='chk_a_maid_f_wish[]' value="4" />
							</label>
<?php endif; ?>
						</div>
					</div>
					<div class="col-sm-2">
						<label class="control-label"><?= $lang->line('maid_m_8') ?></label>
					</div>
					<div class="col-sm-1">
						<div class='checkbox'>
<?php if (strval($id) != '0'): ?>
							<label>
								<input type="checkbox" name='chk_a_maid_f_experience[]' value="8" <?= ($info['a_maid_f_experience'] & 8) == '8' ? 'checked="checked"' : '' ?>/>
							</label>　
							<label>
								<input type="checkbox" name='chk_a_maid_f_wish[]' value="8" <?= ($info['a_maid_f_wish'] & 8) == '8' ? 'checked="checked"' : '' ?>/>
							</label>
<?php else: ?>
							<label>
								<input type="checkbox" name='chk_a_maid_f_experience[]' value="8" />
							</label>　
							<label>
								<input type="checkbox" name='chk_a_maid_f_wish[]' value="8" />
							</label>
<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-1">
					</div>
					<div class="col-sm-1">
						<label class="control-label"><?= $lang->line('m_w_wash_1') ?></label>
					</div>
					<div class="col-sm-1">
						<div class='checkbox'>
<?php if (strval($id) != '0'): ?>
							<label>
								<input type="checkbox" name='chk_a_maid_f_experience[]' value="16" <?= ($info['a_maid_f_experience'] & 16) == '16' ? 'checked="checked"' : '' ?>/>
							</label>　
							<label>
								<input type="checkbox" name='chk_a_maid_f_wish[]' value="16" <?= ($info['a_maid_f_wish'] & 16) == '16' ? 'checked="checked"' : '' ?>/>
							</label>
<?php else: ?>
							<label>
								<input type="checkbox" name='chk_a_maid_f_experience[]' value="16" />
							</label>　
							<label>
								<input type="checkbox" name='chk_a_maid_f_wish[]' value="16" />
							</label>
<?php endif; ?>
						</div>
					</div>
					<div class="col-sm-2">
						<label class="control-label"><?= $lang->line('m_w_wash_2') ?></label>
					</div>
					<div class="col-sm-1">
						<div class='checkbox'>
<?php if (strval($id) != '0'): ?>
							<label>
								<input type="checkbox" name='chk_a_maid_f_experience[]' value="32" <?= ($info['a_maid_f_experience'] & 32) == '32' ? 'checked="checked"' : '' ?>/>
							</label>　
							<label>
								<input type="checkbox" name='chk_a_maid_f_wish[]' value="32" <?= ($info['a_maid_f_wish'] & 32) == '32' ? 'checked="checked"' : '' ?>/>
							</label>
<?php else: ?>
							<label>
								<input type="checkbox" name='chk_a_maid_f_experience[]' value="32" />
							</label>　
							<label>
								<input type="checkbox" name='chk_a_maid_f_wish[]' value="32" />
							</label>
<?php endif; ?>
						</div>
					</div>
					<div class="col-sm-2">
						<label class="control-label"><?= $lang->line('maid_m_6') ?></label>
					</div>
					<div class="col-sm-1">
						<div class='checkbox'>
<?php if (strval($id) != '0'): ?>
							<label>
								<input type="checkbox" name='chk_a_maid_f_experience[]' value="64" <?= ($info['a_maid_f_experience'] & 64) == '64' ? 'checked="checked"' : '' ?>/>
							</label>　
							<label>
								<input type="checkbox" name='chk_a_maid_f_wish[]' value="64" <?= ($info['a_maid_f_wish'] & 64) == '64' ? 'checked="checked"' : '' ?>/>
							</label>
<?php else: ?>
							<label>
								<input type="checkbox" name='chk_a_maid_f_experience[]' value="64" />
							</label>　
							<label>
								<input type="checkbox" name='chk_a_maid_f_wish[]' value="64" />
							</label>
<?php endif; ?>
						</div>
					</div>
					<div class="col-sm-2">
						<label class="control-label"><?= $lang->line('maid_m_9') ?></label>
					</div>
					<div class="col-sm-1">
						<div class='checkbox'>
<?php if (strval($id) != '0'): ?>
							<label>
								<input type="checkbox" name='chk_a_maid_f_experience[]' value="128" <?= ($info['a_maid_f_experience'] & 128) == '128' ? 'checked="checked"' : '' ?>/>
							</label>　
							<label>
								<input type="checkbox" name='chk_a_maid_f_wish[]' value="128" <?= ($info['a_maid_f_wish'] & 128) == '128' ? 'checked="checked"' : '' ?>/>
							</label>
<?php else: ?>
							<label>
								<input type="checkbox" name='chk_a_maid_f_experience[]' value="128" />
							</label>　
							<label>
								<input type="checkbox" name='chk_a_maid_f_wish[]' value="128" />
							</label>
<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-1">
					</div>
					<div class="col-sm-1">
						<label class="control-label"><?= $lang->line('maid_m_2') ?></label>
					</div>
					<div class="col-sm-1">
						<div class='checkbox'>
<?php if (strval($id) != '0'): ?>
							<label>
								<input type="checkbox" name='chk_a_maid_f_experience[]' value="256" <?= ($info['a_maid_f_experience'] & 256) == '256' ? 'checked="checked"' : '' ?>/>
							</label>　
							<label>
								<input type="checkbox" name='chk_a_maid_f_wish[]' value="256" <?= ($info['a_maid_f_wish'] & 256) == '256' ? 'checked="checked"' : '' ?>/>
							</label>
<?php else: ?>
							<label>
								<input type="checkbox" name='chk_a_maid_f_experience[]' value="256" />
							</label>　
							<label>
								<input type="checkbox" name='chk_a_maid_f_wish[]' value="256" />
							</label>
<?php endif; ?>
						</div>
					</div>
					<div class="col-sm-2">
						<label class="control-label"><?= $lang->line('maid_m_4') ?></label>
					</div>
					<div class="col-sm-1">
						<div class='checkbox'>
<?php if (strval($id) != '0'): ?>
							<label>
								<input type="checkbox" name='chk_a_maid_f_experience[]' value="512" <?= ($info['a_maid_f_experience'] & 512) == '512' ? 'checked="checked"' : '' ?>/>
							</label>　
							<label>
								<input type="checkbox" name='chk_a_maid_f_wish[]' value="512" <?= ($info['a_maid_f_wish'] & 512) == '512' ? 'checked="checked"' : '' ?>/>
							</label>
<?php else: ?>
							<label>
								<input type="checkbox" name='chk_a_maid_f_experience[]' value="512" />
							</label>　
							<label>
								<input type="checkbox" name='chk_a_maid_f_wish[]' value="512" />
							</label>
<?php endif; ?>
						</div>
					</div>
					<div class="col-sm-2">
						<label class="control-label"><?= $lang->line('maid_m_7') ?></label>
					</div>
					<div class="col-sm-1">
						<div class='checkbox'>
<?php if (strval($id) != '0'): ?>
							<label>
								<input type="checkbox" name='chk_a_maid_f_experience[]' value="1024" <?= ($info['a_maid_f_experience'] & 1024) == '1024' ? 'checked="checked"' : '' ?>/>
							</label>　
							<label>
								<input type="checkbox" name='chk_a_maid_f_wish[]' value="1024" <?= ($info['a_maid_f_wish'] & 1024) == '1024' ? 'checked="checked"' : '' ?>/>
							</label>
<?php else: ?>
							<label>
								<input type="checkbox" name='chk_a_maid_f_experience[]' value="1024" />
							</label>　
							<label>
								<input type="checkbox" name='chk_a_maid_f_wish[]' value="1024" />
							</label>
<?php endif; ?>
						</div>
					</div>
					<div class="col-sm-2">
						<label class="control-label"><?= $lang->line('maid_m_10') ?></label>
					</div>
					<div class="col-sm-1">
						<div class='checkbox'>
<?php if (strval($id) != '0'): ?>
							<label>
								<input type="checkbox" name='chk_a_maid_f_experience[]' value="2048" <?= ($info['a_maid_f_experience'] & 2048) == '2048' ? 'checked="checked"' : '' ?>/>
							</label>　
							<label>
								<input type="checkbox" name='chk_a_maid_f_wish[]' value="2048" <?= ($info['a_maid_f_wish'] & 2048) == '2048' ? 'checked="checked"' : '' ?>/>
							</label>
<?php else: ?>
							<label>
								<input type="checkbox" name='chk_a_maid_f_experience[]' value="2048" />
							</label>　
							<label>
								<input type="checkbox" name='chk_a_maid_f_wish[]' value="2048" />
							</label>
<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-1">
						<label class="control-label"><?= $lang->line('maid_m') ?></label>
					</div>
					<div class="col-sm-1">
						<label class="control-label"><?= $lang->line('maid_f_1') ?></label>
					</div>
					<div class="col-sm-1">
						<div class='checkbox'>
<?php if (strval($id) != '0'): ?>
							<label>
								<input type="checkbox" name='chk_a_maid_m_experience[]' value="1" <?= ($info['a_maid_m_experience'] & 1) == '1' ? 'checked="checked"' : '' ?>/>
							</label>　
							<label>
								<input type="checkbox" name='chk_a_maid_m_wish[]' value="1" <?= ($info['a_maid_m_wish'] & 1) == '1' ? 'checked="checked"' : '' ?>/>
							</label>
<?php else: ?>
							<label>
								<input type="checkbox" name='chk_a_maid_m_experience[]' value="1" />
							</label>　
							<label>
								<input type="checkbox" name='chk_a_maid_m_wish[]' value="1" />
							</label>
<?php endif; ?>
						</div>
					</div>
					<div class="col-sm-2">
						<label class="control-label"><?= $lang->line('maid_f_4') ?></label>
					</div>
					<div class="col-sm-1">
						<div class='checkbox'>
<?php if (strval($id) != '0'): ?>
							<label>
								<input type="checkbox" name='chk_a_maid_m_experience[]' value="2" <?= ($info['a_maid_m_experience'] & 2) == '2' ? 'checked="checked"' : '' ?>/>
							</label>　
							<label>
								<input type="checkbox" name='chk_a_maid_m_wish[]' value="2" <?= ($info['a_maid_m_wish'] & 2) == '2' ? 'checked="checked"' : '' ?>/>
							</label>
<?php else: ?>
							<label>
								<input type="checkbox" name='chk_a_maid_m_experience[]' value="2" />
							</label>　
							<label>
								<input type="checkbox" name='chk_a_maid_m_wish[]' value="2" />
							</label>
<?php endif; ?>
						</div>
					</div>
					<div class="col-sm-2">
						<label class="control-label"><?= $lang->line('m_w_detail_3') ?></label>
					</div>
					<div class="col-sm-1">
						<div class='checkbox'>
<?php if (strval($id) != '0'): ?>
							<label>
								<input type="checkbox" name='chk_a_maid_m_experience[]' value="4" <?= ($info['a_maid_m_experience'] & 4) == '4' ? 'checked="checked"' : '' ?>/>
							</label>　
							<label>
								<input type="checkbox" name='chk_a_maid_m_wish[]' value="4" <?= ($info['a_maid_m_wish'] & 4) == '4' ? 'checked="checked"' : '' ?>/>
							</label>
<?php else: ?>
							<label>
								<input type="checkbox" name='chk_a_maid_m_experience[]' value="4" />
							</label>　
							<label>
								<input type="checkbox" name='chk_a_maid_m_wish[]' value="4" />
							</label>
<?php endif; ?>
						</div>
					</div>
					<div class="col-sm-2">
						<label class="control-label"><?= $lang->line('maid_f_10') ?></label>
					</div>
					<div class="col-sm-1">
						<div class='checkbox'>
<?php if (strval($id) != '0'): ?>
							<label>
								<input type="checkbox" name='chk_a_maid_m_experience[]' value="8" <?= ($info['a_maid_m_experience'] & 8) == '8' ? 'checked="checked"' : '' ?>/>
							</label>　
							<label>
								<input type="checkbox" name='chk_a_maid_m_wish[]' value="8" <?= ($info['a_maid_m_wish'] & 8) == '8' ? 'checked="checked"' : '' ?>/>
							</label>
<?php else: ?>
							<label>
								<input type="checkbox" name='chk_a_maid_m_experience[]' value="8" />
							</label>　
							<label>
								<input type="checkbox" name='chk_a_maid_m_wish[]' value="8" />
							</label>
<?php endif; ?>
						</div>
					</div>
				</div>				
				<div class="form-group">
					<div class="col-sm-1">
					</div>
					<div class="col-sm-1">
						<label class="control-label"><?= $lang->line('maid_f_2') ?></label>
					</div>
					<div class="col-sm-1">
						<div class='checkbox'>
<?php if (strval($id) != '0'): ?>
							<label>
								<input type="checkbox" name='chk_a_maid_m_experience[]' value="16" <?= ($info['a_maid_m_experience'] & 16) == '16' ? 'checked="checked"' : '' ?>/>
							</label>　
							<label>
								<input type="checkbox" name='chk_a_maid_m_wish[]' value="16" <?= ($info['a_maid_m_wish'] & 16) == '16' ? 'checked="checked"' : '' ?>/>
							</label>
<?php else: ?>
							<label>
								<input type="checkbox" name='chk_a_maid_m_experience[]' value="16" />
							</label>　
							<label>
								<input type="checkbox" name='chk_a_maid_m_wish[]' value="16" />
							</label>
<?php endif; ?>
						</div>
					</div>
					<div class="col-sm-2">
						<label class="control-label"><?= $lang->line('maid_f_5') ?></label>
					</div>
					<div class="col-sm-1">
						<div class='checkbox'>
<?php if (strval($id) != '0'): ?>
							<label>
								<input type="checkbox" name='chk_a_maid_m_experience[]' value="32" <?= ($info['a_maid_m_experience'] & 32) == '32' ? 'checked="checked"' : '' ?>/>
							</label>　
							<label>
								<input type="checkbox" name='chk_a_maid_m_wish[]' value="32" <?= ($info['a_maid_m_wish'] & 32) == '32' ? 'checked="checked"' : '' ?>/>
							</label>
<?php else: ?>
							<label>
								<input type="checkbox" name='chk_a_maid_m_experience[]' value="32" />
							</label>　
							<label>
								<input type="checkbox" name='chk_a_maid_m_wish[]' value="32" />
							</label>
<?php endif; ?>
						</div>
					</div>
					<div class="col-sm-2">
						<label class="control-label"><?= $lang->line('maid_f_8') ?></label>
					</div>
					<div class="col-sm-1">
						<div class='checkbox'>
<?php if (strval($id) != '0'): ?>
							<label>
								<input type="checkbox" name='chk_a_maid_m_experience[]' value="64" <?= ($info['a_maid_m_experience'] & 64) == '64' ? 'checked="checked"' : '' ?>/>
							</label>　
							<label>
								<input type="checkbox" name='chk_a_maid_m_wish[]' value="64" <?= ($info['a_maid_m_wish'] & 64) == '64' ? 'checked="checked"' : '' ?>/>
							</label>
<?php else: ?>
							<label>
								<input type="checkbox" name='chk_a_maid_m_experience[]' value="64" />
							</label>　
							<label>
								<input type="checkbox" name='chk_a_maid_m_wish[]' value="64" />
							</label>
<?php endif; ?>
						</div>
					</div>
					<div class="col-sm-2">
						<label class="control-label"><?= $lang->line('maid_f_11') ?></label>
					</div>
					<div class="col-sm-1">
						<div class='checkbox'>
<?php if (strval($id) != '0'): ?>
							<label>
								<input type="checkbox" name='chk_a_maid_m_experience[]' value="128" <?= ($info['a_maid_m_experience'] & 128) == '128' ? 'checked="checked"' : '' ?>/>
							</label>　
							<label>
								<input type="checkbox" name='chk_a_maid_m_wish[]' value="128" <?= ($info['a_maid_m_wish'] & 128) == '128' ? 'checked="checked"' : '' ?>/>
							</label>
<?php else: ?>
							<label>
								<input type="checkbox" name='chk_a_maid_m_experience[]' value="128" />
							</label>　
							<label>
								<input type="checkbox" name='chk_a_maid_m_wish[]' value="128" />
							</label>
<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-1">
					</div>
					<div class="col-sm-1">
						<label class="control-label"><?= $lang->line('m_w_detail_8') ?></label>
					</div>
					<div class="col-sm-1">
						<div class='checkbox'>
<?php if (strval($id) != '0'): ?>
							<label>
								<input type="checkbox" name='chk_a_maid_m_experience[]' value="256" <?= ($info['a_maid_m_experience'] & 256) == '256' ? 'checked="checked"' : '' ?>/>
							</label>　
							<label>
								<input type="checkbox" name='chk_a_maid_m_wish[]' value="256" <?= ($info['a_maid_m_wish'] & 256) == '256' ? 'checked="checked"' : '' ?>/>
							</label>
<?php else: ?>
							<label>
								<input type="checkbox" name='chk_a_maid_m_experience[]' value="256" />
							</label>　
							<label>
								<input type="checkbox" name='chk_a_maid_m_wish[]' value="256" />
							</label>
<?php endif; ?>
						</div>
					</div>
					<div class="col-sm-2">
						<label class="control-label"><?= $lang->line('maid_f_6') ?></label>
					</div>
					<div class="col-sm-1">
						<div class='checkbox'>
<?php if (strval($id) != '0'): ?>
							<label>
								<input type="checkbox" name='chk_a_maid_m_experience[]' value="512" <?= ($info['a_maid_m_experience'] & 512) == '512' ? 'checked="checked"' : '' ?>/>
							</label>　
							<label>
								<input type="checkbox" name='chk_a_maid_m_wish[]' value="512" <?= ($info['a_maid_m_wish'] & 512) == '512' ? 'checked="checked"' : '' ?>/>
							</label>
<?php else: ?>
							<label>
								<input type="checkbox" name='chk_a_maid_m_experience[]' value="512" />
							</label>　
							<label>
								<input type="checkbox" name='chk_a_maid_m_wish[]' value="512" />
							</label>
<?php endif; ?>
						</div>
					</div>
					<div class="col-sm-2">
						<label class="control-label"><?= $lang->line('maid_f_9') ?></label>
					</div>
					<div class="col-sm-1">
						<div class='checkbox'>
<?php if (strval($id) != '0'): ?>
							<label>
								<input type="checkbox" name='chk_a_maid_m_experience[]' value="1024" <?= ($info['a_maid_m_experience'] & 1024) == '1024' ? 'checked="checked"' : '' ?>/>
							</label>　
							<label>
								<input type="checkbox" name='chk_a_maid_m_wish[]' value="1024" <?= ($info['a_maid_m_wish'] & 1024) == '1024' ? 'checked="checked"' : '' ?>/>
							</label>
<?php else: ?>
							<label>
								<input type="checkbox" name='chk_a_maid_m_experience[]' value="1024" />
							</label>　
							<label>
								<input type="checkbox" name='chk_a_maid_m_wish[]' value="1024" />
							</label>
<?php endif; ?>
						</div>
					</div>
					<div class="col-sm-2">
						<label class="control-label"><?= $lang->line('maid_f_12') ?></label>
					</div>
					<div class="col-sm-1">
						<div class='checkbox'>
<?php if (strval($id) != '0'): ?>
							<label>
								<input type="checkbox" name='chk_a_maid_m_experience[]' value="2048" <?= ($info['a_maid_m_experience'] & 2048) == '2048' ? 'checked="checked"' : '' ?>/>
							</label>　
							<label>
								<input type="checkbox" name='chk_a_maid_m_wish[]' value="2048" <?= ($info['a_maid_m_wish'] & 2048) == '2048' ? 'checked="checked"' : '' ?>/>
							</label>
<?php else: ?>
							<label>
								<input type="checkbox" name='chk_a_maid_m_experience[]' value="2048" />
							</label>　
							<label>
								<input type="checkbox" name='chk_a_maid_m_wish[]' value="2048" />
							</label>
<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-1">
					</div>
					<div class="col-sm-1">
						<label class="control-label"><?= $lang->line('maid_f_3') ?></label>
					</div>
					<div class="col-sm-1">
						<div class='checkbox'>
<?php if (strval($id) != '0'): ?>
							<label>
								<input type="checkbox" name='chk_a_maid_m_experience[]' value="4096" <?= ($info['a_maid_m_experience'] & 4096) == '4096' ? 'checked="checked"' : '' ?>/>
							</label>　
							<label>
								<input type="checkbox" name='chk_a_maid_m_wish[]' value="4096" <?= ($info['a_maid_m_wish'] & 4096) == '4096' ? 'checked="checked"' : '' ?>/>
							</label>
<?php else: ?>
							<label>
								<input type="checkbox" name='chk_a_maid_m_experience[]' value="4096" />
							</label>　
							<label>
								<input type="checkbox" name='chk_a_maid_m_wish[]' value="4096" />
							</label>
<?php endif; ?>
						</div>
					</div>
					<div class="col-sm-2">
						<label class="control-label"><?= $lang->line('maid_f_7') ?></label>
					</div>
					<div class="col-sm-1">
						<div class='checkbox'>
<?php if (strval($id) != '0'): ?>
							<label>
								<input type="checkbox" name='chk_a_maid_m_experience[]' value="8192" <?= ($info['a_maid_m_experience'] & 8192) == '8192' ? 'checked="checked"' : '' ?>/>
							</label>　
							<label>
								<input type="checkbox" name='chk_a_maid_m_wish[]' value="8192" <?= ($info['a_maid_m_wish'] & 8192) == '8192' ? 'checked="checked"' : '' ?>/>
							</label>
<?php else: ?>
							<label>
								<input type="checkbox" name='chk_a_maid_m_experience[]' value="8192" />
							</label>　
							<label>
								<input type="checkbox" name='chk_a_maid_m_wish[]' value="8192" />
							</label>
<?php endif; ?>
						</div>
					</div>
					<div class="col-sm-2">
						<label class="control-label"><?= $lang->line('m_w_detail_16') ?></label>
					</div>
					<div class="col-sm-1">
						<div class='checkbox'>
<?php if (strval($id) != '0'): ?>
							<label>
								<input type="checkbox" name='chk_a_maid_m_experience[]' value="16384" <?= ($info['a_maid_m_experience'] & 16384) == '16384' ? 'checked="checked"' : '' ?>/>
							</label>　
							<label>
								<input type="checkbox" name='chk_a_maid_m_wish[]' value="16384" <?= ($info['a_maid_m_wish'] & 16384) == '16384' ? 'checked="checked"' : '' ?>/>
							</label>
<?php else: ?>
							<label>
								<input type="checkbox" name='chk_a_maid_m_experience[]' value="16384" />
							</label>　
							<label>
								<input type="checkbox" name='chk_a_maid_m_wish[]' value="16384" />
							</label>
<?php endif; ?>
						</div>
					</div>
					<div class="col-sm-2">
						<label class="control-label"><?= $lang->line('maid_f_13') ?></label>
					</div>
					<div class="col-sm-1">
						<div class='checkbox'>
<?php if (strval($id) != '0'): ?>
							<label>
								<input type="checkbox" name='chk_a_maid_m_experience[]' value="32768" <?= ($info['a_maid_m_experience'] & 32768) == '32768' ? 'checked="checked"' : '' ?>/>
							</label>　
							<label>
								<input type="checkbox" name='chk_a_maid_m_wish[]' value="32768" <?= ($info['a_maid_m_wish'] & 32768) == '32768' ? 'checked="checked"' : '' ?>/>
							</label>
<?php else: ?>
							<label>
								<input type="checkbox" name='chk_a_maid_m_experience[]' value="32768" />
							</label>　
							<label>
								<input type="checkbox" name='chk_a_maid_m_wish[]' value="32768" />
							</label>
<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="form-group">
				</div>
				<div class="form-group">
					<div class="col-sm-2">
						<label class="control-label"><?= $lang->line('maid_1') ?></label>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-2">
						<div class='checkbox'>
							<label>
<?php if (strval($id) != '0'): ?>
								<input type="checkbox" name='chk_a_work_wish[]' value="1" <?= ($info['a_work_wish'] & 1) == '1' ? 'checked="checked"' : '' ?>/><?= $lang->line('maid_m_3') ?>
<?php else: ?>
								<input type="checkbox" name='chk_a_work_wish[]' value="1" /><?= $lang->line('maid_m_3') ?>
<?php endif; ?>
							</label>
						</div>
					</div>
					<div class="col-sm-2">
						<div class='checkbox'>
							<label>
<?php if (strval($id) != '0'): ?>
								<input type="checkbox" name='chk_a_work_wish[]' value="2" <?= ($info['a_work_wish'] & 2) == '2' ? 'checked="checked"' : '' ?>/><?= $lang->line('maid_f_1').",".$lang->line('maid_2') ?>
<?php else: ?>
								<input type="checkbox" name='chk_a_work_wish[]' value="2" /><?= $lang->line('maid_f_1').",".$lang->line('maid_2') ?>
<?php endif; ?>
							</label>
						</div>
					</div>
					<div class="col-sm-1">
<?php if (strval($id) != '0'): ?>
						<input type="text" class="form-control" name="txt_a_work_wish_kg" value='<?= $info['a_work_wish_kg']?>' >
<?php else: ?>
						<input type="text" class="form-control" name="txt_a_work_wish_kg" value=''>
<?php endif; ?>
					</div>
					<div class="col-sm-2">
						<div class='checkbox'>
							<label>
<?php if (strval($id) != '0'): ?>
								<input type="checkbox" name='chk_a_work_wish[]' value="4" <?= ($info['a_work_wish'] & 4) == '4' ? 'checked="checked"' : '' ?>/><?= $lang->line('maid_3') ?>
<?php else: ?>
								<input type="checkbox" name='chk_a_work_wish[]' value="4" /><?= $lang->line('maid_3') ?>
<?php endif; ?>
							</label>
						</div>
					</div>
					<div class="col-sm-1">
						<div class='checkbox'>
							<label>
<?php if (strval($id) != '0'): ?>
								<input type="checkbox" name='chk_a_work_wish[]' value="8" <?= ($info['a_work_wish'] & 8) == '8' ? 'checked="checked"' : '' ?>/><?= $lang->line('other') ?>
<?php else: ?>
								<input type="checkbox" name='chk_a_work_wish[]' value="8" /><?= $lang->line('other') ?>
<?php endif; ?>
							</label>
						</div>
					</div>
					<div class="col-sm-3">
<?php if (strval($id) != '0'): ?>
						<input type="text" class="form-control" name="txt_a_work_wish_descr" value='<?= $info['a_work_wish_descr']?>' >
<?php else: ?>
						<input type="text" class="form-control" name="txt_a_work_wish_descr" value=''>
<?php endif; ?>
					</div>
				</div>
				<div class="form-group">
				</div>
				<div class="form-group">
					<div class="col-sm-2">
						<label class="control-label"><?= $lang->line('maid_4') ?></label>
					</div>
				</div>				
				<div class="form-group">
					<div class="col-sm-1">
						<div class='checkbox'>
							<label>
<?php if (strval($id) != '0'): ?>
								<input type="checkbox" name='chk_a_cooking[]' value="1" <?= ($info['a_cooking'] & 1) == '1' ? 'checked="checked"' : '' ?>/><?= $lang->line('maid_5') ?>
<?php else: ?>
								<input type="checkbox" name='chk_a_cooking[]' value="1" /><?= $lang->line('maid_5') ?>
<?php endif; ?>
							</label>
						</div>
					</div>
					<div class="col-sm-1">
						<div class='checkbox'>
							<label>
<?php if (strval($id) != '0'): ?>
								<input type="checkbox" name='chk_a_cooking[]' value="2" <?= ($info['a_cooking'] & 2) == '2' ? 'checked="checked"' : '' ?>/><?= $lang->line('maid_6') ?>
<?php else: ?>
								<input type="checkbox" name='chk_a_cooking[]' value="2" /><?= $lang->line('maid_6') ?>
<?php endif; ?>
							</label>
						</div>
					</div>
					<div class="col-sm-1">
						<div class='checkbox'>
							<label>
<?php if (strval($id) != '0'): ?>
								<input type="checkbox" name='chk_a_cooking[]' value="4" <?= ($info['a_cooking'] & 4) == '4' ? 'checked="checked"' : '' ?>/><?= $lang->line('maid_7') ?>
<?php else: ?>
								<input type="checkbox" name='chk_a_cooking[]' value="4" /><?= $lang->line('maid_7') ?>
<?php endif; ?>
							</label>
						</div>
					</div>
					<div class="col-sm-1">
						<div class='checkbox'>
							<label>
<?php if (strval($id) != '0'): ?>
								<input type="checkbox" name='chk_a_cooking[]' value="8" <?= ($info['a_cooking'] & 8) == '8' ? 'checked="checked"' : '' ?>/><?= $lang->line('maid_8') ?>
<?php else: ?>
								<input type="checkbox" name='chk_a_cooking[]' value="8" /><?= $lang->line('maid_8') ?>
<?php endif; ?>
							</label>
						</div>
					</div>
					<div class="col-sm-1">
						<div class='checkbox'>
							<label>
<?php if (strval($id) != '0'): ?>
								<input type="checkbox" name='chk_a_cooking[]' value="16" <?= ($info['a_cooking'] & 16) == '16' ? 'checked="checked"' : '' ?>/><?= $lang->line('maid_9') ?>
<?php else: ?>
								<input type="checkbox" name='chk_a_cooking[]' value="16" /><?= $lang->line('maid_9') ?>
<?php endif; ?>
							</label>
						</div>
					</div>
					<div class="col-sm-1">
						<div class='checkbox'>
							<label>
<?php if (strval($id) != '0'): ?>
								<input type="checkbox" name='chk_a_cooking[]' value="32" <?= ($info['a_cooking'] & 32) == '32' ? 'checked="checked"' : '' ?>/><?= $lang->line('maid_10') ?>
<?php else: ?>
								<input type="checkbox" name='chk_a_cooking[]' value="32" /><?= $lang->line('maid_10') ?>
<?php endif; ?>
							</label>
						</div>
					</div>
					<div class="col-sm-1">
						<div class='checkbox'>
							<label>
<?php if (strval($id) != '0'): ?>
								<input type="checkbox" name='chk_a_cooking[]' value="64" <?= ($info['a_cooking'] & 64) == '64' ? 'checked="checked"' : '' ?>/><?= $lang->line('maid_11') ?>
<?php else: ?>
								<input type="checkbox" name='chk_a_cooking[]' value="64" /><?= $lang->line('maid_11') ?>
<?php endif; ?>
							</label>
						</div>
					</div>
					<div class="col-sm-1">
						<div class='checkbox'>
							<label>
<?php if (strval($id) != '0'): ?>
								<input type="checkbox" name='chk_a_cooking[]' value="128" <?= ($info['a_cooking'] & 128) == '128' ? 'checked="checked"' : '' ?>/><?= $lang->line('maid_12') ?>
<?php else: ?>
								<input type="checkbox" name='chk_a_cooking[]' value="128" /><?= $lang->line('maid_12') ?>
<?php endif; ?>
							</label>
						</div>
					</div>
				</div>
			</div>
			<!-- Tab 8 -->
			<div role="tabpanel" class="tab-pane" id="school_status">
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('is_election') ?> </label>
						<div>
<?php if (strval($id) != '0'): ?>
							<label class="radio-inline">
								<input type="radio" name="rdo_b_is_election" id="" value=1 <?= $info['b_is_election'] == 1 ? 'checked' : '' ?>> <?= $lang->line('rdo_yes') ?>
							</label>
							<label class="radio-inline">
								<input type="radio" name="rdo_b_is_election" id="" value=2 <?= $info['b_is_election'] == 2 ? 'checked' : '' ?>> <?= $lang->line('rdo_no') ?>
							</label>
<?php else: ?>
							<label class="radio-inline">
								<input type="radio" name="rdo_b_is_election" id="" value=1 checked> <?= $lang->line('rdo_yes') ?>
							</label>
							<label class="radio-inline">
								<input type="radio" name="rdo_b_is_election" id="" value=2> <?= $lang->line('rdo_no') ?>
							</label>
<?php endif; ?>
						</div>
					</div>
					<div class="col-sm-6">
					</div>
				</div>
				<br>
				<label class="control-label"><?= $lang->line('stay_date') ?></label>
				<div class="form-group">
					<div class="col-sm-6">
						<table class="table table-bordered table-hover table-responsive" id="tab_laborStaySchool1">
							<thead>
								<tr>
									<th width="3%" class="text-center">#</th>
									<th width="15%" class="text-center text-nowrap"><?= $lang->line('stay_date_start') ?></th>
									<th width="15%" class="text-center text-nowrap"><?= $lang->line('stay_date_end') ?></th>
								</tr>
							</thead>
							<tbody>
<?php if(count($ary_laborStaySchool1) > 0): ?>
<?php foreach ($ary_laborStaySchool1 as $item): ?>
								<tr id="<?= 'addr_laborStaySchool1'.($item['row'] - 1) ?>">
									<td>
										<?= ($item['row']) ?>
										<input type='hidden' name='row_laborStaySchool1[]' value='<?= ($item['row']) ?>'>
									</td>
									<td>
										<div class='input-group date' id='datetimepicker'>
											<input type="text" class="form-control" name="date_start_laborStaySchool1[]" value='<?= ($item['date_start']) ?>' readonly>
											<span class="input-group-addon">
												<span class="glyphicon glyphicon-calendar"></span>
											</span>
										</div>
									</td>
									<td>
										<div class='input-group date' id='datetimepicker'>
											<input type="text" class="form-control" name="date_end_laborStaySchool1[]" value='<?= ($item['date_end']) ?>' readonly>
											<span class="input-group-addon">
												<span class="glyphicon glyphicon-calendar"></span>
											</span>
										</div>
									</td>
								</tr>
<?php endforeach;?>
								<tr id='<?php echo 'addr_laborStaySchool1'.count($ary_laborStaySchool1) ?>'></tr>
<?php else: ?>
								<tr id='addr_laborStaySchool10'>
									<td>
										1
										<input type='hidden' name='row_laborStaySchool1[]' value='1'>
									</td>
									<td>
										<div class='input-group date' id='datetimepicker'>
											<input type="text" class="form-control" name="date_start_laborStaySchool1[]" value='' readonly>
											<span class="input-group-addon">
												<span class="glyphicon glyphicon-calendar"></span>
											</span>
										</div>
									</td>
									<td>
										<div class='input-group date' id='datetimepicker'>
											<input type="text" class="form-control" name="date_end_laborStaySchool1[]" value='' readonly>
											<span class="input-group-addon">
												<span class="glyphicon glyphicon-calendar"></span>
											</span>
										</div>
									</td>
								</tr>
								<tr id='addr_laborStaySchool11'></tr>
<?php endif; ?>
							</tbody>
						</table>
						<a class="add_row btn btn-warning pull-left" prefix='laborStaySchool1'><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
						<a class="delete_row pull-right btn btn-danger" prefix='laborStaySchool1'><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></a>
						<div class='row mb20' ps='for_add_del_button'>
						</div>
					</div>
					<div class="col-sm-6">
					</div>
				</div>
				<br>
				<label class="control-label"><?= $lang->line('1-6-2') ?></label>
				<div class="form-group">
					<div class="col-sm-9">
						<table class="table table-bordered table-hover table-responsive" id="tab_laborStaySchool2">
							<thead>
								<tr>
									<th width="3%" class="text-center">#</th>
									<th width="15%" class="text-center text-nowrap"><?= $lang->line('1-6-2') ?></th>
									<th width="15%" class="text-center text-nowrap"><?= $lang->line('stay_date_start') ?></th>
									<th width="15%" class="text-center text-nowrap"><?= $lang->line('stay_date_end') ?></th>
								</tr>
							</thead>
							<tbody>
<?php if(count($ary_laborStaySchool2) > 0): ?>
<?php foreach ($ary_laborStaySchool2 as $item): ?>
								<tr id="<?= 'addr_laborStaySchool2'.($item['row'] - 1) ?>">
									<td>
										<?= ($item['row']) ?>
										<input type='hidden' name='row_laborStaySchool2[]' value='<?= ($item['row']) ?>'>
									</td>
									<td>
										<?= form_dropdown('sel_schoolclass_id_laborStaySchool2[]', $ary_schoolclass, $item['schoolclass_id'], 'class="form-control"'); ?>
									</td>
									<td>
										<div class='input-group date' id='datetimepicker'>
											<input type="text" class="form-control" name="date_start_laborStaySchool2[]" value='<?= ($item['date_start']) ?>' readonly>
											<span class="input-group-addon">
												<span class="glyphicon glyphicon-calendar"></span>
											</span>
										</div>
									</td>
									<td>
										<div class='input-group date' id='datetimepicker'>
											<input type="text" class="form-control" name="date_end_laborStaySchool2[]" value='<?= ($item['date_end']) ?>' readonly>
											<span class="input-group-addon">
												<span class="glyphicon glyphicon-calendar"></span>
											</span>
										</div>
									</td>
								</tr>
<?php endforeach;?>
								<tr id='<?php echo 'addr_laborStaySchool2'.count($ary_laborStaySchool2) ?>'></tr>
<?php else: ?>
								<tr id='addr_laborStaySchool20'>
									<td>
										1
										<input type='hidden' name='row_laborStaySchool2[]' value='1'>
									</td>
									<td>
										<?= form_dropdown('sel_schoolclass_id_laborStaySchool2[]', $ary_schoolclass, '', 'class="form-control"'); ?>
									</td>
									<td>
										<div class='input-group date' id='datetimepicker'>
											<input type="text" class="form-control" name="date_start_laborStaySchool2[]" value='' readonly>
											<span class="input-group-addon">
												<span class="glyphicon glyphicon-calendar"></span>
											</span>
										</div>
									</td>
									<td>
										<div class='input-group date' id='datetimepicker'>
											<input type="text" class="form-control" name="date_end_laborStaySchool2[]" value='' readonly>
											<span class="input-group-addon">
												<span class="glyphicon glyphicon-calendar"></span>
											</span>
										</div>
									</td>
								</tr>
								<tr id='addr_laborStaySchool21'></tr>
<?php endif; ?>
							</tbody>
						</table>
						<a class="add_row btn btn-warning pull-left" prefix='laborStaySchool2'><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
						<a class="delete_row pull-right btn btn-danger" prefix='laborStaySchool2'><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></a>
						<div class='row mb20' ps='for_add_del_button'>
						</div>
					</div>
					<div class="col-sm-3">
					</div>
				</div>
				<br>
				<label class="control-label"><?= $lang->line('learn_data') ?></label>
				<div class="form-group">
					<div class="col-sm-12">
						<table class="table table-bordered table-hover table-responsive" id="tab_laborLearn">
							<thead>
								<tr>
									<th width="10%" class="text-center">#</th>
									<th width="20%" class="text-center text-nowrap"><?= $lang->line('hire_type') ?></th>
									<th width="20%" class="text-center text-nowrap"><?= $lang->line('date') ?></th>
									<th width="20%" class="text-center text-nowrap"><?= $lang->line('learn_emp') ?></th>
									<th width="30%" class="text-center text-nowrap"><?= $lang->line('desc').' / '.$lang->line('learn_descr') ?></th>
<!--
									<th width="20%" class="text-center text-nowrap"><?= $lang->line('doc_file_path') ?></th>
-->								
								</tr>
							</thead>
							<tbody>
<?php if(count($ary_laborLearn) > 0): ?>
<?php foreach ($ary_laborLearn as $item): ?>
								<tr id="<?= 'addr_laborLearn'.($item['row'] - 1) ?>">
									<td>
										<?= ($item['row']) ?>
										<input type='hidden' name='row_laborLearn[]' value='<?= ($item['row']) ?>'>
									</td>
									<td>
										<?= form_dropdown('sel_typeData_laborLearn[]', $ary_typeData, $item['type'], 'class="form-control"'); ?>
									</td>
									<td>
										<div class='input-group date' id='datetimepicker'>
											<input type="text" class="form-control" name="date_laborLearn[]" value='<?= ($item['date']) ?>' readonly>
											<span class="input-group-addon">
												<span class="glyphicon glyphicon-calendar"></span>
											</span>
										</div>
									</td>
									<td>
										<?= form_dropdown('sel_emp_id_laborLearn[]', $ary_emp, $item['emp_id'], 'class="form-control"'); ?>
									</td>
									<td>
										<textarea name='descr_laborLearn[]' class='form-control'><?= $item['descr']?></textarea>								
									</td>
<!--									
									<td>
										<input type='text' name='file_path_laborLearn[]' value='<?= ($item['file_path']) ?>'>
									</td>
-->									
								</tr>
<?php endforeach;?>
								<tr id='<?php echo 'addr_laborLearn'.count($ary_laborLearn) ?>'></tr>
<?php else: ?>
								<tr id='addr_laborLearn0'>
									<td>
										1
										<input type='hidden' name='row_laborLearn[]' value='1'>
									</td>
									<td>
										<?= form_dropdown('sel_typeData_laborLearn[]', $ary_typeData, '', 'class="form-control"'); ?>
									</td>
									<td>
										<div class='input-group date' id='datetimepicker'>
											<input type="text" class="form-control" name="date_laborLearn[]" value='' readonly>
											<span class="input-group-addon">
												<span class="glyphicon glyphicon-calendar"></span>
											</span>
										</div>
									</td>
									<td>
										<?= form_dropdown('sel_emp_id_laborLearn[]', $ary_emp, '', 'class="form-control"'); ?>
									</td>
									<td>
										<textarea name='descr_laborLearn[]' class='form-control'></textarea>
									</td>
<!--									
									<td>
										<input type='text' name='file_path_laborLearn[]'>
									</td>
-->
								</tr>
								<tr id='addr_laborLearn1'></tr>
<?php endif; ?>
							</tbody>
						</table>
						<a class="add_row btn btn-warning pull-left" prefix='laborLearn'><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
						<a class="delete_row pull-right btn btn-danger" prefix='laborLearn'><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></a>
						<div class='row mb20' ps='for_add_del_button'>
						</div>
					</div>
				</div>
			</div>
			<!-- Tab 9 -->
			<div role="tabpanel" class="tab-pane" id="pick_office">
				<label class="control-label"><?= $lang->line('document_management') ?></label>		
				<div class="form-group">
					<div class="col-sm-2">
					</div>
					<div class="col-sm-2">
						<label class="control-label"><?= $lang->line('date_get1') ?></label>
					</div>
					<div class="col-sm-2">
						<label class="control-label"><?= $lang->line('site_get') ?></label>
					</div>
					<div class="col-sm-2">
						<label class="control-label"><?= $lang->line('date_expire') ?></label>
					</div>
					<div class="col-sm-2">
						<label class="control-label"><?= $lang->line('doc_file_path') ?></label>
					</div>
					<div class="col-sm-2">
					</div>
				</div>
				<div class="form-group form-group1">
					<div class="col-sm-2">
						<label class="control-label"><?= $lang->line('passport') ?></label>
					</div>
					<div class="col-sm-2">
						<div class='input-group date' id='datetimepicker'>
<?php if((strval($id) != '0') && (isset($ary_labor_auth[1]))): ?>	
							<input type="text" class="form-control" name="llaa_dateget_1" value='<?= $ary_labor_auth[1]['dateget'] ?>' readonly>
<?php else: ?>
							<input type="text" class="form-control" name="llaa_dateget_1" value='' readonly>
<?php endif; ?>
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>
					</div>
					<div class="col-sm-2">
						<div>
<?php if((strval($id) != '0') && (isset($ary_labor_auth[1]))): ?>
							<input type="text" class="form-control" name="llaa_siteget_1" value='<?= $ary_labor_auth[1]['siteget'] ?>' >
<?php else: ?>
							<input type="text" class="form-control" name="llaa_siteget_1" value=''>
<?php endif; ?>				
						</div>
					</div>
					<div class="col-sm-2">
						<div class='input-group date' id='datetimepicker'>
<?php if((strval($id) != '0') && (isset($ary_labor_auth[1]))): ?>
							<input type="text" class="form-control" name="llaa_dateexpire_1" value='<?= $ary_labor_auth[1]['dateexpire'] ?>' readonly>
<?php else: ?>
							<input type="text" class="form-control" name="llaa_dateexpire_1" value='' readonly>
<?php endif; ?>
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>
					</div>
					<div class="col-sm-4">
						<div>
<?php if((strval($id) != '0') && (isset($ary_labor_auth[1]))): ?>
							<input id="llaa_filepath_1" type="file" class="file-loading">
							<input name='llaa_filepath_1' type='hidden' value='<?= $ary_labor_auth[1]['filepath'] ?>'>
<?php else: ?>
							<input id="llaa_filepath_1" type="file" class="file-loading">
							<input name='llaa_filepath_1' type='hidden' value=''>
<?php endif; ?>
						</div>
					</div>
				</div>							
				<div class="form-group form-group2">
					<div class="col-sm-2">
						<label class="control-label"><?= $lang->line('examination') ?></label>
					</div>
					<div class="col-sm-2">
						<div class='input-group date' id='datetimepicker'>
<?php if((strval($id) != '0') && (isset($ary_labor_auth[2]))): ?>
							<input type="text" class="form-control" name="llaa_dateget_2" value='<?= $ary_labor_auth[2]['dateget'] ?>' readonly>
<?php else: ?>
							<input type="text" class="form-control" name="llaa_dateget_2" value='' readonly>
<?php endif; ?>
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>
					</div>
					<div class="col-sm-2">
						<div>
<?php if((strval($id) != '0') && (isset($ary_labor_auth[2]))): ?>
							<input type="text" class="form-control" name="llaa_siteget_2" value='<?= $ary_labor_auth[2]['siteget'] ?>'>
<?php else: ?>
							<input type="text" class="form-control" name="llaa_siteget_2" value=''>
<?php endif; ?>				
						</div>
					</div>
					<div class="col-sm-2">
						<div class='input-group date' id='datetimepicker'>
<?php if((strval($id) != '0') && (isset($ary_labor_auth[2]))): ?>
							<input type="text" class="form-control" name="llaa_dateexpire_2" value='<?= $ary_labor_auth[2]['dateexpire'] ?>' readonly>
<?php else: ?>
							<input type="text" class="form-control" name="llaa_dateexpire_2" value='' readonly>
<?php endif; ?>
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>
					</div>
					<div class="col-sm-4">
						<div>
<?php if((strval($id) != '0') && (isset($ary_labor_auth[2]))): ?>
							<input id="llaa_filepath_2" type="file" class="file-loading">
							<input name='llaa_filepath_2' type='hidden' value='<?= $ary_labor_auth[2]['filepath'] ?>'>
<?php else: ?>
							<input id="llaa_filepath_2" type="file" class="file-loading">
							<input name='llaa_filepath_2' type='hidden' value=''>
<?php endif; ?>	
						</div>
					</div>
				</div>
				<div class="form-group form-group3">
					<div class="col-sm-2">
						<label class="control-label"><?= $lang->line('card') ?></label>
					</div>
					<div class="col-sm-2">
						<div class='input-group date' id='datetimepicker'>
<?php if((strval($id) != '0') && (isset($ary_labor_auth[3]))): ?>
							<input type="text" class="form-control" name="llaa_dateget_3" value='<?= $ary_labor_auth[3]['dateget'] ?>' readonly>
<?php else: ?>
							<input type="text" class="form-control" name="llaa_dateget_3" value='' readonly>
<?php endif; ?>
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>
					</div>
					<div class="col-sm-2">
						<div>
<?php if((strval($id) != '0') && (isset($ary_labor_auth[3]))): ?>
							<input type="text" class="form-control" name="llaa_siteget_3" value='<?= $ary_labor_auth[3]['siteget'] ?>'>
<?php else: ?>
							<input type="text" class="form-control" name="llaa_siteget_3" value=''>
<?php endif; ?>				
						</div>
					</div>
					<div class="col-sm-2">
						<div class='input-group date' id='datetimepicker'>
<?php if((strval($id) != '0') && (isset($ary_labor_auth[3]))): ?>
							<input type="text" class="form-control" name="llaa_dateexpire_3" value='<?= $ary_labor_auth[3]['dateexpire'] ?>' readonly>
<?php else: ?>
							<input type="text" class="form-control" name="llaa_dateexpire_3" value='' readonly>
<?php endif; ?>
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>
					</div>
					<div class="col-sm-4">
						<div>
<?php if((strval($id) != '0') && (isset($ary_labor_auth[3]))): ?>
							<input id="llaa_filepath_3" type="file" class="file-loading">
							<input name='llaa_filepath_3' type='hidden' value='<?= $ary_labor_auth[3]['filepath'] ?>'>
<?php else: ?>
							<input id="llaa_filepath_3" type="file" class="file-loading">
							<input name='llaa_filepath_3' type='hidden' value=''>
<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="form-group form-group18">
					<div class="col-sm-2">
						<label class="control-label"><?= $lang->line('umid') ?></label>
					</div>
					<div class="col-sm-2">
						<div class='input-group date' id='datetimepicker'>
<?php if((strval($id) != '0') && (isset($ary_labor_auth[18]))): ?>
							<input type="text" class="form-control" name="llaa_dateget_18" value='<?= $ary_labor_auth[18]['dateget'] ?>' readonly>
<?php else: ?>
							<input type="text" class="form-control" name="llaa_dateget_18" value='' readonly>
<?php endif; ?>
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>
					</div>
					<div class="col-sm-2">
						<div>
<?php if((strval($id) != '0') && (isset($ary_labor_auth[18]))): ?>
							<input type="text" class="form-control" name="llaa_siteget_18" value='<?= $ary_labor_auth[18]['siteget'] ?>'>
<?php else: ?>
							<input type="text" class="form-control" name="llaa_siteget_18" value=''>
<?php endif; ?>
						</div>
					</div>
					<div class="col-sm-2">
						<div class='input-group date' id='datetimepicker'>
<?php if((strval($id) != '0') && (isset($ary_labor_auth[18]))): ?>
							<input type="text" class="form-control" name="llaa_dateexpire_18" value='<?= $ary_labor_auth[18]['dateexpire'] ?>' readonly>
<?php else: ?>
							<input type="text" class="form-control" name="llaa_dateexpire_18" value='' readonly>
<?php endif; ?>
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>
					</div>
					<div class="col-sm-4">
						<div>
<?php if((strval($id) != '0') && (isset($ary_labor_auth[18]))): ?>
							<input id="llaa_filepath_18" type="file" class="file-loading">
							<input name='llaa_filepath_18' type='hidden' value='<?= $ary_labor_auth[18]['filepath'] ?>'>
<?php else: ?>
							<input id="llaa_filepath_18" type="file" class="file-loading">
							<input name='llaa_filepath_18' type='hidden' value=''>
<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="form-group form-group19">
					<div class="col-sm-2">
						<label class="control-label"><?= $lang->line('birthdaycard') ?></label>
					</div>
					<div class="col-sm-2">
						<div class='input-group date' id='datetimepicker'>
<?php if((strval($id) != '0') && (isset($ary_labor_auth[19]))): ?>
							<input type="text" class="form-control" name="llaa_dateget_19" value='<?= $ary_labor_auth[19]['dateget'] ?>' readonly>
<?php else: ?>
							<input type="text" class="form-control" name="llaa_dateget_19" value='' readonly>
<?php endif; ?>
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>
					</div>
					<div class="col-sm-8">
					</div>
				</div>
				<div class="form-group form-group4">
					<div class="col-sm-2">
						<label class="control-label"><?= $lang->line('rubella') ?></label>
					</div>
					<div class="col-sm-2">
						<div class='input-group date' id='datetimepicker'>
<?php if((strval($id) != '0') && (isset($ary_labor_auth[4]))): ?>
							<input type="text" class="form-control" name="llaa_dateget_4" value='<?= $ary_labor_auth[4]['dateget'] ?>' readonly>
<?php else: ?>
							<input type="text" class="form-control" name="llaa_dateget_4" value='' readonly>
<?php endif; ?>
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>
					</div>
					<div class="col-sm-2">
						<div>
<?php if((strval($id) != '0') && (isset($ary_labor_auth[4]))): ?>
							<input type="text" class="form-control" name="llaa_siteget_4" value='<?= $ary_labor_auth[4]['siteget'] ?>'>
<?php else: ?>
							<input type="text" class="form-control" name="llaa_siteget_4" value=''>
<?php endif; ?>				
						</div>
					</div>
					<div class="col-sm-2">
						<div class='input-group date' id='datetimepicker'>
<?php if((strval($id) != '0') && (isset($ary_labor_auth[4]))): ?>
							<input type="text" class="form-control" name="llaa_dateexpire_4" value='<?= $ary_labor_auth[4]['dateexpire'] ?>' readonly>
<?php else: ?>
							<input type="text" class="form-control" name="llaa_dateexpire_4" value='' readonly>
<?php endif; ?>
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>
					</div>
					<div class="col-sm-4">
					</div>
				</div>				
				<div class="form-group form-group5">
					<div class="col-sm-2">
						<label class="control-label"><?= $lang->line('maid_classDate') ?></label>
					</div>
					<div class="col-sm-2">
						<div class='input-group date' id='datetimepicker'>
<?php if((strval($id) != '0') && (isset($ary_labor_auth[5]))): ?>
							<input type="text" class="form-control" name="llaa_dateget_5" value='<?= $ary_labor_auth[5]['dateget'] ?>' readonly>
<?php else: ?>
							<input type="text" class="form-control" name="llaa_dateget_5" value='' readonly>
<?php endif; ?>
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>
					</div>
					<div class="col-sm-8">
					</div>
				</div>
				<div class="form-group form-group6">
					<div class="col-sm-2">
						<label class="control-label"><?= $lang->line('brought_out') ?></label>
					</div>
					<div class="col-sm-2">
						<div class='input-group date' id='datetimepicker'>
<?php if((strval($id) != '0') && (isset($ary_labor_auth[6]))): ?>
							<input type="text" class="form-control" name="llaa_dateget_6" value='<?= $ary_labor_auth[6]['dateget'] ?>' readonly>
<?php else: ?>
							<input type="text" class="form-control" name="llaa_dateget_6" value='' readonly>
<?php endif; ?>
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>
					</div>
					<div class="col-sm-8">
					</div>
				</div>				
				<div class="form-group form-group20">
					<div class="col-sm-2">
						<label class="control-label"><?= $lang->line('training_start') ?></label>
					</div>
					<div class="col-sm-2">
						<div class='input-group date' id='datetimepicker'>
<?php if((strval($id) != '0') && (isset($ary_labor_auth[20]))): ?>
							<input type="text" class="form-control" name="llaa_dateget_20" value='<?= $ary_labor_auth[20]['dateget'] ?>' readonly>
<?php else: ?>
							<input type="text" class="form-control" name="llaa_dateget_20" value='' readonly>
<?php endif; ?>
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>
					</div>
					<div class="col-sm-8">
					</div>
				</div>
				<div class="form-group form-group21">
					<div class="col-sm-2">
						<label class="control-label"><?= $lang->line('training_end') ?></label>
					</div>
					<div class="col-sm-2">
						<div class='input-group date' id='datetimepicker'>
<?php if((strval($id) != '0') && (isset($ary_labor_auth[21]))): ?>
							<input type="text" class="form-control" name="llaa_dateget_21" value='<?= $ary_labor_auth[21]['dateget'] ?>' readonly>
<?php else: ?>
							<input type="text" class="form-control" name="llaa_dateget_21" value='' readonly>
<?php endif; ?>
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>
					</div>
					<div class="col-sm-8">
					</div>
				</div>
				<div class="form-group form-group22">
					<div class="col-sm-2">
						<label class="control-label"><?= $lang->line('owwa_date') ?></label>
					</div>
					<div class="col-sm-2">
						<div class='input-group date' id='datetimepicker'>
<?php if((strval($id) != '0') && (isset($ary_labor_auth[22]))): ?>
							<input type="text" class="form-control" name="llaa_dateget_22" value='<?= $ary_labor_auth[22]['dateget'] ?>' readonly>
<?php else: ?>
							<input type="text" class="form-control" name="llaa_dateget_22" value='' readonly>
<?php endif; ?>
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>
					</div>
					<div class="col-sm-8">
					</div>
				</div>
				<div class="form-group form-group23">
					<div class="col-sm-2">
						<label class="control-label"><?= $lang->line('owwa_date_start') ?></label>
					</div>
					<div class="col-sm-2">
						<div class='input-group date' id='datetimepicker'>
<?php if((strval($id) != '0') && (isset($ary_labor_auth[23]))): ?>
							<input type="text" class="form-control" name="llaa_dateget_23" value='<?= $ary_labor_auth[23]['dateget'] ?>' readonly>
<?php else: ?>
							<input type="text" class="form-control" name="llaa_dateget_23" value='' readonly>
<?php endif; ?>
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>
					</div>
					<div class="col-sm-8">
					</div>
				</div>
				<div class="form-group form-group24">
					<div class="col-sm-2">
						<label class="control-label"><?= $lang->line('owwa_date_end') ?></label>
					</div>
					<div class="col-sm-2">
						<div class='input-group date' id='datetimepicker'>
<?php if((strval($id) != '0') && (isset($ary_labor_auth[24]))): ?>
							<input type="text" class="form-control" name="llaa_dateget_24" value='<?= $ary_labor_auth[24]['dateget'] ?>' readonly>
<?php else: ?>
							<input type="text" class="form-control" name="llaa_dateget_24" value='' readonly>
<?php endif; ?>
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>
					</div>
					<div class="col-sm-8">
					</div>
				</div>
				<div class="form-group form-group10">
					<div class="col-sm-2">
						<label class="control-label"><?= $lang->line('country_file') ?></label>
					</div>
					<div class="col-sm-2">
						<div class='input-group date' id='datetimepicker'>
<?php if((strval($id) != '0') && (isset($ary_labor_auth[10]))): ?>
							<input type="text" class="form-control" name="llaa_dateget_10" value='<?= $ary_labor_auth[10]['dateget'] ?>' readonly>
<?php else: ?>
							<input type="text" class="form-control" name="llaa_dateget_10" value='' readonly>
<?php endif; ?>
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>
					</div>
					<div class="col-sm-8">
					</div>
				</div>
				<div class="form-group form-group11">
					<div class="col-sm-2">
						<label class="control-label"><?= $lang->line('country_file2') ?></label>
					</div>
					<div class="col-sm-2">
						<div class='input-group date' id='datetimepicker'>
<?php if((strval($id) != '0') && (isset($ary_labor_auth[11]))): ?>
							<input type="text" class="form-control" name="llaa_dateget_11" value='<?= $ary_labor_auth[11]['dateget'] ?>' readonly>
<?php else: ?>
							<input type="text" class="form-control" name="llaa_dateget_11" value='' readonly>
<?php endif; ?>
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>
					</div>
					<div class="col-sm-8">
					</div>
				</div>
				<div class="form-group form-group12">
					<div class="col-sm-2">
						<label class="control-label"><?= $lang->line('country_file3') ?></label>
					</div>
					<div class="col-sm-2">
						<div class='input-group date' id='datetimepicker'>
<?php if((strval($id) != '0') && (isset($ary_labor_auth[12]))): ?>
							<input type="text" class="form-control" name="llaa_dateget_12" value='<?= $ary_labor_auth[12]['dateget'] ?>' readonly>
<?php else: ?>
							<input type="text" class="form-control" name="llaa_dateget_12" value='' readonly>
<?php endif; ?>
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>
					</div>
					<div class="col-sm-8">
					</div>
				</div>
				<div class="form-group form-group13">
					<div class="col-sm-2">
						<label class="control-label"><?= $lang->line('country_file4') ?></label>
					</div>
					<div class="col-sm-2">
						<div class='input-group date' id='datetimepicker'>
<?php if((strval($id) != '0') && (isset($ary_labor_auth[13]))): ?>
							<input type="text" class="form-control" name="llaa_dateget_13" value='<?= $ary_labor_auth[13]['dateget'] ?>' readonly>
<?php else: ?>
							<input type="text" class="form-control" name="llaa_dateget_13" value='' readonly>
<?php endif; ?>
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>
					</div>
					<div class="col-sm-8">
					</div>
				</div>
				<div class="form-group form-group14">
					<div class="col-sm-2">
						<label class="control-label"><?= $lang->line('country_file5') ?></label>
					</div>
					<div class="col-sm-2">
						<div class='input-group date' id='datetimepicker'>
<?php if((strval($id) != '0') && (isset($ary_labor_auth[14]))): ?>
							<input type="text" class="form-control" name="llaa_dateget_14" value='<?= $ary_labor_auth[14]['dateget'] ?>' readonly>
<?php else: ?>
							<input type="text" class="form-control" name="llaa_dateget_14" value='' readonly>
<?php endif; ?>
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>
					</div>
					<div class="col-sm-8">
					</div>
				</div>
				<div class="form-group form-group15">
					<div class="col-sm-2">
						<label class="control-label"><?= $lang->line('idnumber') ?></label>
					</div>
					<div class="col-sm-2">
						<div class='input-group date' id='datetimepicker'>
<?php if((strval($id) != '0') && (isset($ary_labor_auth[15]))): ?>
							<input type="text" class="form-control" name="llaa_dateget_15" value='<?= $ary_labor_auth[15]['dateget'] ?>' readonly>
<?php else: ?>
							<input type="text" class="form-control" name="llaa_dateget_15" value='' readonly>
<?php endif; ?>
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>
					</div>
					<div class="col-sm-8">
					</div>
				</div>
				<div class="form-group form-group16">
					<div class="col-sm-2">
						<label class="control-label"><?= $lang->line('taiwanfile') ?></label>
					</div>
					<div class="col-sm-2">
						<div class='input-group date' id='datetimepicker'>
<?php if((strval($id) != '0') && (isset($ary_labor_auth[16]))): ?>
							<input type="text" class="form-control" name="llaa_dateget_16" value='<?= $ary_labor_auth[16]['dateget'] ?>' readonly>
<?php else: ?>
							<input type="text" class="form-control" name="llaa_dateget_16" value='' readonly>
<?php endif; ?>
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>
					</div>
					<div class="col-sm-8">
					</div>
				</div>
				<div class="form-group form-group25">
					<div class="col-sm-2">
						<label class="control-label"><?= $lang->line('class_day') ?></label>
					</div>
					<div class="col-sm-2">
					</div>
					<div class="col-sm-8">
					</div>
				</div>
				<div class="form-group form-group17">
					<div class="col-sm-2">
						<label class="control-label"><?= $lang->line('test_report') ?></label>
					</div>
					<div class="col-sm-2">
						<div class='input-group date' id='datetimepicker'>
<?php if((strval($id) != '0') && (isset($ary_labor_auth[17]))): ?>
							<input type="text" class="form-control" name="llaa_dateget_17" value='<?= $ary_labor_auth[17]['dateget'] ?>' readonly>
<?php else: ?>
							<input type="text" class="form-control" name="llaa_dateget_17" value='' readonly>
<?php endif; ?>
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>
					</div>
					<div class="col-sm-8">
					</div>
				</div>
				<div class="form-group form-group7">
					<div class="col-sm-2">
						<label class="control-label"><?= $lang->line('passport_picture') ?></label>
					</div>
					<div class="col-sm-2">
						<div class='input-group date' id='datetimepicker'>
<?php if((strval($id) != '0') && (isset($ary_labor_auth[7]))): ?>
							<input type="text" class="form-control" name="llaa_dateget_7" value='<?= $ary_labor_auth[7]['dateget'] ?>' readonly>
<?php else: ?>
							<input type="text" class="form-control" name="llaa_dateget_7" value='' readonly>
<?php endif; ?>
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>
					</div>
					<div class="col-sm-8">
					</div>
				</div>
				<div class="form-group form-group8">
					<div class="col-sm-2">
						<label class="control-label"><?= $lang->line('Affidavit_for_Wage') ?></label>
					</div>
					<div class="col-sm-2">
						<div class='input-group date' id='datetimepicker'>
<?php if((strval($id) != '0') && (isset($ary_labor_auth[8]))): ?>
							<input type="text" class="form-control" name="llaa_dateget_8" value='<?= $ary_labor_auth[8]['dateget'] ?>' readonly>
<?php else: ?>
							<input type="text" class="form-control" name="llaa_dateget_8" value='' readonly>
<?php endif; ?>
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>
					</div>
					<div class="col-sm-8">
					</div>
				</div>
				<div class="form-group form-group9">
					<div class="col-sm-2">
						<label class="control-label"><?= $lang->line('enroll') ?></label>
					</div>
					<div class="col-sm-2">
						<div class='input-group date' id='datetimepicker'>
<?php if((strval($id) != '0') && (isset($ary_labor_auth[9]))): ?>
							<input type="text" class="form-control" name="llaa_dateget_9" value='<?= $ary_labor_auth[9]['dateget'] ?>' readonly>
<?php else: ?>
							<input type="text" class="form-control" name="llaa_dateget_9" value='' readonly>
<?php endif; ?>
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>
					</div>
					<div class="col-sm-8">
					</div>
				</div>
<?php if(strval($id) != '0'): ?>
				<br>
				<label class="control-label"><?= $lang->line('pick_office_management') ?></label>
				<div class="form-group">
					<div class="col-sm-8">
						<label class="control-label"><?= $lang->line('quote_id').' / '.$lang->line('quote_descr') ?></label>
						<div class="checkbox">
							<?= $labor_quote['quote_id'].' / '.$labor_quote['quote_descr'] ?>	
						</div>
					</div>
					<div class="col-sm-4">
						<label class="control-label"><?= $lang->line('election_date').' / '.$lang->line('select_end') ?></label>
						<div class="checkbox">
							<?= $labor_quote['date_create'].' / '.$labor_quote['me_date'] ?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-2">
						<label class="control-label"><?= $lang->line('employed_workers_date').' / '.$lang->line('employed_workers_id') ?></label>
						<div class="checkbox">
							<?= $labor_quote['h_date_create'].' / '.$labor_quote['h_id'] ?>
						</div>
					</div>
					<div class="col-sm-2">
						<label class="control-label"><?= $lang->line('client').' / '.$lang->line('employer') ?></label>
						<div class="checkbox">
							<?= $ary_client[$labor_quote['h_client_id']].' / '.$ary_employer[$labor_quote['h_employer_id']] ?>
						</div>
					</div>
					<div class="col-sm-2">
						<label class="control-label"><?= $lang->line('worker_kind').' / '.$lang->line('duration') ?></label>
						<div class="checkbox">
							<?= $ary_worker_kind[$labor_quote['h_worker_kind']].' / '.$labor_quote['h_work_limit'] ?>
						</div>
					</div>
					<div class="col-sm-2">
						<label class="control-label"><?= $lang->line('qty_require').' / '.$lang->line('sex') ?></label>
						<div class="checkbox">
							<?= $labor_quote['h_qty_require'].' / '.$labor_quote['h_gender'] ?>
						</div>
					</div>
					<div class="col-sm-4">
						<label class="control-label"><?= $lang->line('sales_id').' / '.$lang->line('service_id') ?></label>
						<div class="checkbox">
							<?= $ary_emp[$labor_quote['h_sales_id']].' / '.$ary_emp[$labor_quote['h_service_id']] ?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('letter_no') ?></label>
						<div class="checkbox">
							<?= $labor_quote['l_letter_no'] ?>
						</div>
					</div>
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('quota').' / '.$lang->line('duration').' / '.$lang->line('date_receive') ?></label>
						<div class="checkbox">
							<?= $labor_quote['l_quota'].' / '.$labor_quote['l_duration'].' / '.$labor_quote['l_date_receive'] ?>							
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('5-1-2') ?></label>
						<div class="checkbox">
							<?= $labor_quote['li_inbound_no'] ?>
						</div>
					</div>
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('quota') ?></label>
						<div class="checkbox">
							<?= $labor_quote['li_quota']?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('schedule_foreign') ?></label>
						<div>
							<?= form_dropdown('sel_schedule_emp_id', $ary_emp, $info['b_schedule_emp_id'], 'class="form-control"'); ?>
						</div>
					</div>
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('arrspot2') ?></label>
						<div class="checkbox">
							<?= $ary_arrspot[$labor_quote['h_arrspot']] ?>
						</div>
					</div>			
				</div>
				<div class="form-group">
					<div class="col-sm-2">
						<label class="control-label"><?= $lang->line('client_licese1') ?></label>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('nametw') ?></label>
						<div>
							<input type="text" class="form-control" name="txt_b_license_client_tw" value='<?= $info['b_license_client_tw']?>'>			
						</div>
					</div>
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('nameem') ?></label>
						<div>
							<input type="text" class="form-control" name="txt_b_license_client_en" value='<?= $info['b_license_client_en']?>'>			
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-2">
						<label class="control-label"><?= $lang->line('foreign_licese1') ?></label>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('nametw') ?></label>
						<div>
							<input type="text" class="form-control" name="txt_b_license_foreign_tw" value='<?= $info['b_license_foreign_tw']?>'>			
						</div>
					</div>
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('nameem') ?></label>
						<div>
							<input type="text" class="form-control" name="txt_b_license_foreign_en" value='<?= $info['b_license_foreign_en']?>'>			
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-2">
						<label class="control-label"><?= $lang->line('auth_type') ?></label>
					</div>
				</div>
				<div class="form-group form-group26">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('auth_type26') ?></label>
						<div class='input-group date' id='datetimepicker'>
<?php if(isset($ary_labor_auth[26])): ?>
							<input type="text" class="form-control" name="llaa_dateget_26" value='<?= $ary_labor_auth[26]['dateget'] ?>' readonly>
<?php else: ?>
							<input type="text" class="form-control" name="llaa_dateget_26" value='' readonly>
<?php endif; ?>
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>
					</div>
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('auth_type27') ?></label>
						<div class='input-group date' id='datetimepicker'>
<?php if(isset($ary_labor_auth[27])): ?>
							<input type="text" class="form-control" name="llaa_dateget_27" value='<?= $ary_labor_auth[27]['dateget'] ?>' readonly>
<?php else: ?>
							<input type="text" class="form-control" name="llaa_dateget_27" value='' readonly>
<?php endif; ?>
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>
					</div>
				</div>
				<div class="form-group form-group28">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('auth_type28') ?></label>
						<div class='input-group date' id='datetimepicker'>
<?php if(isset($ary_labor_auth[28])): ?>
							<input type="text" class="form-control" name="llaa_dateget_28" value='<?= $ary_labor_auth[28]['dateget'] ?>' readonly>
<?php else: ?>
							<input type="text" class="form-control" name="llaa_dateget_28" value='' readonly>
<?php endif; ?>
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>
					</div>
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('auth_type29') ?></label>
						<div class='input-group date' id='datetimepicker'>
<?php if(isset($ary_labor_auth[29])): ?>
							<input type="text" class="form-control" name="llaa_dateget_29" value='<?= $ary_labor_auth[29]['dateget'] ?>' readonly>
<?php else: ?>
							<input type="text" class="form-control" name="llaa_dateget_29" value='' readonly>
<?php endif; ?>
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>
					</div>
				</div>
				<div class="form-group form-group31">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('auth_type31') ?></label>
						<div class='input-group date' id='datetimepicker'>
<?php if(isset($ary_labor_auth[31])): ?>
							<input type="text" class="form-control" name="llaa_dateget_31" value='<?= $ary_labor_auth[31]['dateget'] ?>' readonly>
<?php else: ?>
							<input type="text" class="form-control" name="llaa_dateget_31" value='' readonly>
<?php endif; ?>
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>
					</div>
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('auth_type32') ?></label>
						<div class='input-group date' id='datetimepicker'>
<?php if(isset($ary_labor_auth[32])): ?>
							<input type="text" class="form-control" name="llaa_dateget_32" value='<?= $ary_labor_auth[32]['dateget'] ?>' readonly>
<?php else: ?>
							<input type="text" class="form-control" name="llaa_dateget_32" value='' readonly>
<?php endif; ?>
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>
					</div>
				</div>
				<div class="form-group form-group33">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('auth_type33') ?></label>
						<div class='input-group date' id='datetimepicker'>
<?php if(isset($ary_labor_auth[33])): ?>
							<input type="text" class="form-control" name="llaa_dateget_33" value='<?= $ary_labor_auth[33]['dateget'] ?>' readonly>
<?php else: ?>
							<input type="text" class="form-control" name="llaa_dateget_33" value='' readonly>
<?php endif; ?>
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>
					</div>
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('auth_type34') ?></label>
						<div class='input-group date' id='datetimepicker'>
<?php if(isset($ary_labor_auth[34])): ?>
							<input type="text" class="form-control" name="llaa_dateget_34" value='<?= $ary_labor_auth[34]['dateget'] ?>' readonly>
<?php else: ?>
							<input type="text" class="form-control" name="llaa_dateget_34" value='' readonly>
<?php endif; ?>
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>
					</div>
				</div>
				<div class="form-group form-group35">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('auth_type35') ?></label>
						<div class='input-group date' id='datetimepicker'>
<?php if(isset($ary_labor_auth[35])): ?>
							<input type="text" class="form-control" name="llaa_dateget_35" value='<?= $ary_labor_auth[35]['dateget'] ?>' readonly>
<?php else: ?>
							<input type="text" class="form-control" name="llaa_dateget_35" value='' readonly>
<?php endif; ?>
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>
					</div>
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('auth_type36') ?></label>
						<div class='input-group date' id='datetimepicker'>
<?php if(isset($ary_labor_auth[36])): ?>
							<input type="text" class="form-control" name="llaa_dateget_36" value='<?= $ary_labor_auth[36]['dateget'] ?>' readonly>
<?php else: ?>
							<input type="text" class="form-control" name="llaa_dateget_36" value='' readonly>
<?php endif; ?>
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>
					</div>
				</div>
				<div class="form-group form-group37">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('auth_type37') ?></label>
						<div class='input-group date' id='datetimepicker'>
<?php if(isset($ary_labor_auth[37])): ?>
							<input type="text" class="form-control" name="llaa_dateget_37" value='<?= $ary_labor_auth[37]['dateget'] ?>' readonly>
<?php else: ?>
							<input type="text" class="form-control" name="llaa_dateget_37" value='' readonly>
<?php endif; ?>
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>
					</div>
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('auth_type38') ?></label>
						<div class='input-group date' id='datetimepicker'>
<?php if(isset($ary_labor_auth[38])): ?>
							<input type="text" class="form-control" name="llaa_dateget_38" value='<?= $ary_labor_auth[38]['dateget'] ?>' readonly>
<?php else: ?>
							<input type="text" class="form-control" name="llaa_dateget_38" value='' readonly>
<?php endif; ?>
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>
					</div>
				</div>
				<div class="form-group form-group39">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('auth_type39') ?></label>
						<div class='input-group date' id='datetimepicker'>
<?php if(isset($ary_labor_auth[39])): ?>
							<input type="text" class="form-control" name="llaa_dateget_39" value='<?= $ary_labor_auth[39]['dateget'] ?>' readonly>
<?php else: ?>
							<input type="text" class="form-control" name="llaa_dateget_39" value='' readonly>
<?php endif; ?>
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>
					</div>
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('auth_type40') ?></label>
						<div class='input-group date' id='datetimepicker'>
<?php if(isset($ary_labor_auth[40])): ?>
							<input type="text" class="form-control" name="llaa_dateget_40" value='<?= $ary_labor_auth[40]['dateget'] ?>' readonly>
<?php else: ?>
							<input type="text" class="form-control" name="llaa_dateget_40" value='' readonly>
<?php endif; ?>
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>
					</div>
				</div>
				<div class="form-group form-group41">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('auth_type41') ?></label>
						<div class='input-group date' id='datetimepicker'>
<?php if(isset($ary_labor_auth[41])): ?>
							<input type="text" class="form-control" name="llaa_dateget_41" value='<?= $ary_labor_auth[41]['dateget'] ?>' readonly>
<?php else: ?>
							<input type="text" class="form-control" name="llaa_dateget_41" value='' readonly>
<?php endif; ?>
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>
					</div>
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('auth_type42') ?></label>
						<div class='input-group date' id='datetimepicker'>
<?php if(isset($ary_labor_auth[42])): ?>
							<input type="text" class="form-control" name="llaa_dateget_42" value='<?= $ary_labor_auth[42]['dateget'] ?>' readonly>
<?php else: ?>
							<input type="text" class="form-control" name="llaa_dateget_42" value='' readonly>
<?php endif; ?>
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>
					</div>
				</div>
				<div class="form-group form-group43">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('auth_type43') ?></label>
						<div class='input-group date' id='datetimepicker'>
<?php if(isset($ary_labor_auth[43])): ?>
							<input type="text" class="form-control" name="llaa_dateget_43" value='<?= $ary_labor_auth[43]['dateget'] ?>' readonly>
<?php else: ?>
							<input type="text" class="form-control" name="llaa_dateget_43" value='' readonly>
<?php endif; ?>
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>
					</div>
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('auth_type44') ?></label>
						<div class='input-group date' id='datetimepicker'>
<?php if(isset($ary_labor_auth[44])): ?>
							<input type="text" class="form-control" name="llaa_dateget_44" value='<?= $ary_labor_auth[44]['dateget'] ?>' readonly>
<?php else: ?>
							<input type="text" class="form-control" name="llaa_dateget_44" value='' readonly>
<?php endif; ?>
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>
					</div>
				</div>				
				<div class="form-group form-group30">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('auth_type30') ?></label>
						<div class='input-group date' id='datetimepicker'>
<?php if(isset($ary_labor_auth[30])): ?>
							<input type="text" class="form-control" name="llaa_dateget_30" value='<?= $ary_labor_auth[30]['dateget'] ?>' readonly>
<?php else: ?>
							<input type="text" class="form-control" name="llaa_dateget_30" value='' readonly>
<?php endif; ?>
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>
					</div>
					<div class="col-sm-6">
					</div>
				</div>
<?php endif; ?>				
				<br>
				<label class="control-label"><?= $lang->line('pick_course') ?></label>
				<div class="form-group">
					<div class="col-sm-12">
						<table class="table table-bordered table-hover table-responsive" id="tab_laborCase">
							<thead>
								<tr>
									<th width='5%' class="text-center">#</th>
									<th width='20%' class="text-center text-nowrap"><?= $lang->line('date') ?></th>
									<th width='75%' class="text-center text-nowrap"><?= $lang->line('labor_status') ?></th>
								</tr>
							</thead>
							<tbody>
<?php if(count($ary_laborCase) > 0): ?>
<?php foreach ($ary_laborCase as $item): ?>
								<tr id="<?= 'addr_laborCase'.($item['row'] - 1) ?>">
									<td>
										<?= ($item['row']) ?>
										<input type='hidden' name='row_laborCase[]' value='<?= ($item['row']) ?>'>
									</td>
									<td>
										<div class='input-group date' id='datetimepicker'>
											<input type="text" class="form-control" name="date_laborCase[]" value='<?= ($item['date']) ?>' readonly>
											<span class="input-group-addon">
												<span class="glyphicon glyphicon-calendar"></span>
											</span>
										</div>
									</td>
									<td>
										<input type="text" name='descr_laborCase[]' value='<?= ($item['descr']) ?>' class="form-control" />
									</td>
								</tr>
<?php endforeach;?>
								<tr id='<?php echo 'addr_laborCase'.count($ary_laborCase) ?>'></tr>
<?php else: ?>
								<tr id='addr_laborCase0'>
									<td>
										1
										<input type='hidden' name='row_laborCase[]' value='1'>
									</td>
									<td>
										<div class='input-group date' id='datetimepicker'>
											<input type="text" class="form-control" name="date_laborCase[]" value='' readonly>
											<span class="input-group-addon">
												<span class="glyphicon glyphicon-calendar"></span>
											</span>
										</div>
									</td>
									<td>
										<input type="text" name='descr_laborCase[]' class="form-control" />
									</td>
								</tr>
								<tr id='addr_laborCase1'></tr>
<?php endif; ?>
							</tbody>
						</table>
						<a class="add_row btn btn-warning pull-left" prefix='laborCase'><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
						<a class="delete_row pull-right btn btn-danger" prefix='laborCase'><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></a>
						<div class='row mb20' ps='for_add_del_button'>
						</div>
					</div>
				</div>
				<br>
				<label class="control-label"><?= $lang->line('inbound_management') ?></label>
				<div class="form-group">
					<div class="col-sm-12">
						<table class="table table-bordered table-hover table-responsive" id="tab_laborInbound">
							<thead>
								<tr>
									<th width='5%' class="text-center">#</th>
									<th width='15%' class="text-center text-nowrap"><?= $lang->line('actual_date') ?></th>
									<th width='15%' class="text-center text-nowrap"><?= $lang->line('billing_date') ?></th>
									<th width='15%' class="text-center text-nowrap"><?= $lang->line('1-1-5') ?></th>
									<th width='10%' class="text-center text-nowrap"><?= $lang->line('dep_time')?><br><?=$lang->line('depspot') ?></th>
									<th width='15%' class="text-center text-nowrap"><?= $lang->line('connection_dep_id') ?></th>
									<th width='15%' class="text-center text-nowrap"><?= $lang->line('connection_dep_time')?><br><?=$lang->line('connection_depspot') ?></th>
									<th width='10%' class="text-center text-nowrap"><?= $lang->line('arr_time')?><br><?=$lang->line('arrspot') ?></th>
								</tr>
							</thead>
							<tbody>
<?php if(count($ary_laborInbound) > 0): ?>
<?php foreach ($ary_laborInbound as $item): ?>
								<tr id="<?= 'addr_laborInbound'.($item['row'] - 1) ?>">
									<td>
										<?= ($item['row']) ?>
										<input type='hidden' name='row_laborInbound[]' value='<?= ($item['row']) ?>'>
									</td>
									<td>
										<div class='input-group date' id='datetimepicker'>
											<input type="text" class="form-control" name="date_laborInbound[]" value='<?= ($item['date']) ?>' readonly>
											<span class="input-group-addon">
												<span class="glyphicon glyphicon-calendar"></span>
											</span>
										</div>
									</td>
									<td>
										<div class='input-group date' id='datetimepicker'>
											<input type="text" class="form-control" name="date_ticket_laborInbound[]" value='<?= ($item['date_ticket']) ?>' readonly>
											<span class="input-group-addon">
												<span class="glyphicon glyphicon-calendar"></span>
											</span>
										</div>
									</td>
									<td>
										<?= form_dropdown('sel_flight_id_laborInbound[]', $ary_flight_id, $item['flight_id'], 'class="form-control" row="'.$item['row'].'"'); ?>
									</td>
									<td>
										<div name='dep_time_laborInbound[]' row="<?=$item['row']?>"></div>
									</td>
									<td>
										<?= form_dropdown('sel_flight_id2_laborInbound[]', $ary_flight_id2, $item['flight_id2'], 'class="form-control" row="'.$item['row'].'"'); ?>
									</td>
									<td>
										<div name='connection_dep_time_laborInbound[]' row="<?=$item['row']?>"></div>
									</td>
									<td>
										<div name='arr_time_laborInbound[]' row="<?=$item['row']?>"></div>
									</td>
								</tr>
<?php endforeach;?>
								<tr id='<?php echo 'addr_laborInbound'.count($ary_laborInbound) ?>'></tr>
<?php else: ?>
								<tr id='addr_laborInbound0'>
									<td>
										1
										<input type='hidden' name='row_laborInbound[]' value='1'>
									</td>
									<td>
										<div class='input-group date' id='datetimepicker'>
											<input type="text" class="form-control" name="date_laborInbound[]" value='' readonly>
											<span class="input-group-addon">
												<span class="glyphicon glyphicon-calendar"></span>
											</span>
										</div>
									</td>
									<td>
										<div class='input-group date' id='datetimepicker'>
											<input type="text" class="form-control" name="date_ticket_laborInbound[]" value='' readonly>
											<span class="input-group-addon">
												<span class="glyphicon glyphicon-calendar"></span>
											</span>
										</div>
									</td>
									<td>
										<?= form_dropdown('sel_flight_id_laborInbound[]', $ary_flight_id, '', 'class="form-control" row="1"'); ?>
									</td>
									<td>
										<div name='dep_time_laborInbound[]' row="1"></div>
									</td>
									<td>
										<?= form_dropdown('sel_flight_id2_laborInbound[]', $ary_flight_id2, '', 'class="form-control" row="1"'); ?>
									</td>
									<td>
										<div name='connection_dep_time_laborInbound[]' row="1"></div>
									</td>
									<td>
										<div name='arr_time_laborInbound[]' row="1"></div>
									</td>
								</tr>
								<tr id='addr_laborInbound1'></tr>
<?php endif; ?>
							</tbody>
						</table>
						<a class="add_row btn btn-warning pull-left" prefix='laborInbound'><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
						<a class="delete_row pull-right btn btn-danger" prefix='laborInbound'><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></a>
						<div class='row mb20' ps='for_add_del_button'>
						</div>
					</div>
				</div>
			</div>
			<!-- Tab 10 -->
			<div role="tabpanel" class="tab-pane" id="inbound_status">
				<div class="form-group">
					<div class="col-sm-1">
						<div class='checkbox'>
							<label>
<?php if (strval($id) != '0'): ?>
								<input type="checkbox" name='chk_c_is_black' value="1" <?= ($info['c_is_black'] & 1) == '1' ? 'checked="checked"' : '' ?>/><?= $lang->line('blacklist') ?>
<?php else: ?>
								<input type="checkbox" name='chk_c_is_black' value="1" /><?= $lang->line('blacklist') ?>
<?php endif; ?>
							</label>
						</div>
					</div>
					<div class="col-sm-1">
						<div class='checkbox'>
							<?= $lang->line('reason') ?>
						</div>
					</div>
					<div class="col-sm-4">
						<div class='checkbox'>
<?php if (strval($id) != '0'): ?>
							<input type="text" class="form-control" name="txt_c_black_descr" value='<?= $info['c_black_descr']?>'>
<?php else: ?>
							<input type="text" class="form-control" name="txt_c_black_descr" value=''>
<?php endif; ?>
						</div>
					</div>
					<div class="col-sm-6">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-4">
						<label class="control-label"><?= $lang->line('tw_tel') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<input type="text" class="form-control" name="txt_c_tel_tw" value='<?= $info['c_tel_tw']?>' >
<?php else: ?>
							<input type="text" class="form-control" name="txt_c_tel_tw" value='' >
<?php endif; ?>	
						</div>
					</div>
					<div class="col-sm-4">
						<label class="control-label">　</label>
						<div>
<?php if (strval($id) != '0'): ?>
							<input type="text" class="form-control" name="txt_c_tel_tw2" value='<?= $info['c_tel_tw2']?>' >
<?php else: ?>
							<input type="text" class="form-control" name="txt_c_tel_tw2" value='' >
<?php endif; ?>	
						</div>
					</div>
					<div class="col-sm-4">
						<label class="control-label">　</label>
						<div>
<?php if (strval($id) != '0'): ?>
							<input type="text" class="form-control" name="txt_c_tel_tw3" value='<?= $info['c_tel_tw3']?>' >
<?php else: ?>
							<input type="text" class="form-control" name="txt_c_tel_tw3" value='' >
<?php endif; ?>	
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<label for="tab_laborOutput" class='form-label'> <?= $lang->line('turnout') ?></label><br />
						<table class="table table-bordered table-hover table-responsive" id="tab_laborOutput">
							<thead>
								<tr >
									<th width='5%' class="text-center">#</th>
									<th width='15%' class="text-center text-nowrap"><?= $lang->line('date') ?></th>
									<th width='15%' class="text-center text-nowrap"><?= $lang->line('new_client') ?></th>
									<th width='15%' class="text-center text-nowrap"><?= $lang->line('tel') ?></th>
									<th width='15%' class="text-center text-nowrap"><?= $lang->line('new_employer') ?></th>
									<th width='15%' class="text-center text-nowrap"><?= $lang->line('tel') ?></th>
									<th width='20%' class="text-center text-nowrap"><?= $lang->line('desc') ?></th>
								</tr>
							</thead>
							<tbody>
<?php if(count($ary_laborOutput) > 0): ?>
<?php foreach ($ary_laborOutput as $item): ?>
								<tr id="<?= 'addr_laborOutput'.($item['row'] - 1) ?>">
									<td>
										<?= ($item['row']) ?>
										<input type='hidden' name='row_laborOutput[]' value='<?= ($item['row']) ?>'>
									</td>
									<td>
										<div class='input-group date' id='datetimepicker'>
											<input type="text" class="form-control" name="date_laborOutput[]" value='<?= ($item['date']) ?>' readonly>
											<span class="input-group-addon">
												<span class="glyphicon glyphicon-calendar"></span>
											</span>
										</div>
									</td>
									<td>
										<input type="text" name='client_laborOutput[]' value='<?= ($item['client']) ?>' class="form-control"/>
									</td>
									<td>
										<input type="text" name='tel_c_laborOutput[]' value='<?= ($item['tel_c']) ?>' class="form-control" />
									</td>
									<td>
										<input type="text" name='employer_laborOutput[]' value='<?= ($item['employer']) ?>' class="form-control" />
									</td>
									<td>
										<input type="text" name='tel_e_laborOutput[]' value='<?= ($item['tel_e']) ?>' class="form-control" />
									</td>
									<td>
										<input type="text" name='descr_laborOutput[]' value='<?= ($item['descr']) ?>' class="form-control" />
									</td>
								</tr>
<?php endforeach;?>
								<tr id='<?php echo 'addr_laborOutput'.count($ary_laborOutput) ?>'></tr>
<?php else: ?>
								<tr id='addr_laborOutput0'>
									<td>
										1
										<input type='hidden' name='row_laborOutput[]' value='1'>
									</td>
									<td>
										<div class='input-group date' id='datetimepicker'>
											<input type="text" class="form-control" name="date_laborOutput[]" value='' readonly>
											<span class="input-group-addon">
												<span class="glyphicon glyphicon-calendar"></span>
											</span>
										</div>
									</td>
									<td>
										<input type="text" name='client_laborOutput[]' class="form-control"/>
									</td>
									<td>
										<input type="text" name='tel_c_laborOutput[]' class="form-control" />
									</td>
									<td>
										<input type="text" name='employer_laborOutput[]' class="form-control" />
									</td>
									<td>
										<input type="text" name='tel_e_laborOutput[]' class="form-control" />
									</td>
									<td>
										<input type="text" name='descr_laborOutput[]' class="form-control" />
									</td>
								</tr>
								<tr id='addr_laborOutput1'></tr>
<?php endif; ?>
							</tbody>
						</table>
						<a class="add_row btn btn-warning pull-left" prefix='laborOutput'><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
						<a class="delete_row pull-right btn btn-danger" prefix='laborOutput'><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></a>
						<div class='row mb20' ps='for_add_del_button'>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('outbound') ?></label>
					</div>
					<div class="col-sm-6">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<div class='col-md-offset-1'>
							<label class="control-label"><?= $lang->line('date') ?></label>
							<div>
								<div class='input-group date' id='datetimepicker'>
<?php if (strval($id) != '0'): ?>
									<input type="text" class="form-control" name="txt_c_outbound_date" value='<?= $info['c_outbound_date']?>' readonly>
<?php else: ?>
									<input type="text" class="form-control" name="txt_c_outbound_date" value='' readonly>
<?php endif; ?>	
									<span class="input-group-addon">
										<span class="glyphicon glyphicon-calendar"></span>
									</span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('desc') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<input type="text" class="form-control" name="txt_c_outbound_descr" value='<?= $info['c_outbound_descr']?>' >
<?php else: ?>
							<input type="text" class="form-control" name="txt_c_outbound_descr" value='' >
<?php endif; ?>	
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<div class='col-md-offset-1'>
							<label class="control-label"><?= $lang->line('doc_file_path') ?></label>
							<div>
								<input id="file" type="file" class="file-loading">
<?php if (strval($id) != '0'): ?>
								<input name='hid_filepath' type='hidden' value='<?= $info['c_outbound_file_path']?>'>
<?php else: ?>
								<input name='hid_filepath' type='hidden' value=''>
<?php endif; ?>				
							</div>
						</div>
					</div>
					<div class="col-sm-6">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('run') ?></label>
					</div>
					<div class="col-sm-6">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-4">
						<div class='col-md-offset-1'>
							<label class="control-label"><?= $lang->line('c_run_date') ?></label>
							<div>
								<div class='input-group date' id='datetimepicker'>
<?php if (strval($id) != '0'): ?>
									<input type="text" class="form-control" name="txt_c_run_date" value='<?= $info['c_run_date']?>' readonly>
<?php else: ?>
									<input type="text" class="form-control" name="txt_c_run_date" value='' readonly>
<?php endif; ?>
									<span class="input-group-addon">
										<span class="glyphicon glyphicon-calendar"></span>
									</span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<label class="control-label"><?= $lang->line('c_run_descr') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<input type="text" class="form-control" name="txt_c_run_descr" value='<?= $info['c_run_descr']?>' >
<?php else: ?>
							<input type="text" class="form-control" name="txt_c_run_descr" value='' >
<?php endif; ?>	
						</div>
					</div>
					<div class="col-sm-4">
						<label class="control-label"><?= $lang->line('c_run_letterno') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<input type="text" class="form-control" name="txt_c_run_letterno" value='<?= $info['c_run_letterno']?>' >
<?php else: ?>
							<input type="text" class="form-control" name="txt_c_run_letterno" value='' >
<?php endif; ?>	
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-4">
						<div class='col-md-offset-1'>
							<label class="control-label"><?= $lang->line('c_run_getdate') ?></label>
							<div>
								<div class='input-group date' id='datetimepicker'>
<?php if (strval($id) != '0'): ?>
									<input type="text" class="form-control" name="txt_c_run_getdate" value='<?= $info['c_run_getdate']?>' readonly>
<?php else: ?>
									<input type="text" class="form-control" name="txt_c_run_getdate" value='' readonly>
<?php endif; ?>
									<span class="input-group-addon">
										<span class="glyphicon glyphicon-calendar"></span>
									</span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<label class="control-label"><?= $lang->line('c_run_sendback') ?></label>
						<div>
							<div class='input-group date' id='datetimepicker'>
<?php if (strval($id) != '0'): ?>
								<input type="text" class="form-control" name="txt_c_run_sendback" value='<?= $info['c_run_sendback']?>' readonly>
<?php else: ?>
								<input type="text" class="form-control" name="txt_c_run_sendback" value='' readonly>
<?php endif; ?>
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-calendar"></span>
								</span>
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<label class="control-label"><?= $lang->line('c_run_file_path') ?></label>
						<div>
							<input id="file2" type="file" class="file-loading2">
<?php if (strval($id) != '0'): ?>
							<input name='hid_filepath2' type='hidden' value='<?= $info['c_run_file_path']?>'>
<?php else: ?>
							<input name='hid_filepath2' type='hidden' value=''>
<?php endif; ?>				
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<label for="tab_laborRun" class='form-label'></label><br />
						<table class="table table-bordered table-hover table-responsive" id="tab_laborRun">
							<thead>
								<tr >
									<th width='5%' class="text-center">#</th>
									<th width='15%' class="text-center text-nowrap"><?= $lang->line('track_date') ?></th>
									<th width='15%' class="text-center text-nowrap"><?= $lang->line('track_time') ?></th>
									<th width='15%' class="text-center text-nowrap"><?= $lang->line('contact_window') ?></th>
									<th width='15%' class="text-center text-nowrap"><?= $lang->line('contact_result') ?></th>
									<th width='35%' class="text-center text-nowrap"><?= $lang->line('desc') ?></th>
								</tr>
							</thead>
							<tbody>
<?php if(count($ary_laborRun) > 0): ?>
<?php foreach ($ary_laborRun as $item): ?>
								<tr id="<?= 'addr_laborRun'.($item['row'] - 1) ?>">
									<td>
										<?= ($item['row']) ?>
										<input type='hidden' name='row_laborRun[]' value='<?= ($item['row']) ?>'>
									</td>
									<td>
										<div class='input-group date' id='datetimepicker'>
											<input type="text" class="form-control" name="date_laborRun[]" value='<?= ($item['date']) ?>' readonly>
											<span class="input-group-addon">
												<span class="glyphicon glyphicon-calendar"></span>
											</span>
										</div>
									</td>
									<td>
										<div class='input-group time' id='datetimepicker1'>
											<input type="text" class="form-control" name="time_laborRun[]" value='<?= $item['time']?>' readonly>
											<span class="input-group-addon">
												<span class="glyphicon glyphicon-time"></span>
											</span>											
										</div>
									</td>
									<td>
										<input type="text" name='contact_laborRun[]' value='<?= ($item['contact']) ?>' class="form-control"/>
									</td>
									<td>
										<input type="text" name='contact_descr_laborRun[]' value='<?= ($item['contact_descr']) ?>' class="form-control" />
									</td>
									<td>
										<input type="text" name='descr_laborRun[]' value='<?= ($item['descr']) ?>' class="form-control" />
									</td>
								</tr>
<?php endforeach;?>
								<tr id='<?php echo 'addr_laborRun'.count($ary_laborRun) ?>'></tr>
<?php else: ?>
								<tr id='addr_laborRun0'>
									<td>
										1
										<input type='hidden' name='row_laborRun[]' value='1'>
									</td>
									<td>
										<div class='input-group date' id='datetimepicker'>
											<input type="text" class="form-control" name="date_laborRun[]" value='' readonly>
											<span class="input-group-addon">
												<span class="glyphicon glyphicon-calendar"></span>
											</span>
										</div>
									</td>
									<td>
										<div class='input-group time' id='datetimepicker1'>
											<input type="text" class="form-control" name="time_laborRun[]" value='' readonly>
											<span class="input-group-addon">
												<span class="glyphicon glyphicon-time"></span>
											</span>	
										</div>
									</td>
									<td>
										<input type="text" name='contact_laborRun[]' class="form-control"/>
									</td>
									<td>
										<input type="text" name='contact_descr_laborRun[]' class="form-control" />
									</td>
									<td>
										<input type="text" name='descr_laborRun[]' class="form-control" />
									</td>
								</tr>
								<tr id='addr_laborRun1'></tr>
<?php endif; ?>
							</tbody>
						</table>
						<a class="add_row btn btn-warning pull-left" prefix='laborRun'><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
						<a class="delete_row pull-right btn btn-danger" prefix='laborRun'><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></a>
						<div class='row mb20' ps='for_add_del_button'>
						</div>
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
	if('<?= $func ?>'== '241') {
		$('li a[href="#inbound_status"]').tab('show');
	}

	changeworkercountry();

	var i_laborLicense = $("#tab_laborLicense" + " tr").length - 2;
	var i_laborFactory = $("#tab_laborFactory" + " tr").length - 2;
	var i_laborMaid = $("#tab_laborMaid" + " tr").length - 2;
	var i_laborContact1 = $("#tab_laborContact1" + " tr").length - 2;
	var i_laborContact2 = $("#tab_laborContact2" + " tr").length - 2;
	var i_laborContact3 = $("#tab_laborContact3" + " tr").length - 2;
	var i_laborStaySchool1 = $("#tab_laborStaySchool1" + " tr").length - 2;
	var i_laborStaySchool2 = $("#tab_laborStaySchool2" + " tr").length - 2;
	var i_laborLearn = $("#tab_laborLearn" + " tr").length - 2;
	var i_laborCase = $("#tab_laborCase" + " tr").length - 2;
	var i_laborInbound = $("#tab_laborInbound" + " tr").length - 2;

	// 入境管理
	$('select[name="sel_flight_id_laborInbound[]"]').bind('change', this, onchg_flight_id_laborInbound);
	$('select[name="sel_flight_id2_laborInbound[]"]').bind('change', this, onchg_flight_id_laborInbound2);
	// fire
	$('select[name="sel_flight_id_laborInbound[]"]').trigger('change');
	$('select[name="sel_flight_id2_laborInbound[]"]').trigger('change');

	//language
	$('a[prefix=language][func=add]').bind('click', function() {
		$('#div_lang').append($('#div_lang_sample').html());
	});
	$('a[prefix=language][func=remove]').bind('click', function() {
		$('#div_lang div').last().remove();
	});
	//child
	$i = 0;
	$('a[prefix=child][func=add]').bind('click', function() {
		checkedtmp = $('#div_life_child_sample').html().replace(/"rdo_a_life_child"/g, "rdo_a_life_child_"+($i + 1));
		$('#div_life_child').append(checkedtmp);
//		$('#div_life_child').append($('#div_life_child_sample').html());
	});
	$('a[prefix=child][func=remove]').bind('click', function() {
		$('#div_life_child div').last().remove();
	});

	$('.date').datetimepicker({
		format: 'YYYY-MM-DD',
		keepInvalid: true,
		ignoreReadonly: true,
		useCurrent: true
	});

	$('.time').datetimepicker({
		format: 'LT',
		keepInvalid: true,
		ignoreReadonly: true,
		useCurrent: true
	});

	$(".btn-cancel").bind("click",function(){
		if('<?= $func ?>'== '411') {
			var labor = '<?= base_url()?>eam/labor';
		} else if('<?= $func ?>' == '412') {
			var labor = '<?= base_url()?>eam/labor2';
		} else {
			var labor = '<?= base_url()?>bos/labor';
		}
		window.location = labor;
	});	
	$("#btn_save").bind("click",function(){
		if(!$("form")[0].checkValidity()) return;

		// lang
		var ary = new Array();
		$('#div_lang_sample div').each(function(){
			var ary_col = new Array();
			$(this).find('select').each(function(){
				ary_col.push($(this).val());
			});
			ary.push(ary_col);
		});		
		$('#div_lang div').each(function(){
			var ary_col = new Array();
			$(this).find('select').each(function(){
				ary_col.push($(this).val());
			});
			ary.push(ary_col);
		});
		var json = JSON.stringify(ary);
		$('input[name=hid_language]').val(json);

		//life
		var ary_life = new Array();
		$('#div_life').find('input').each(function(){
			if($(this).attr('type') == 'radio') {
				if(this.checked) {
					ary_life.push($(this).val());
				}
			} else {
				ary_life.push($(this).val());
			}
		});
		var json = JSON.stringify(ary_life);
		$('input[name=hid_life]').val(json);	

		//life_qty
		var ary_life_qty = new Array();
		$('#div_life_qty').find('input').each(function(){
			ary_life_qty.push($(this).val());
		});
		var json = JSON.stringify(ary_life_qty);
		$('input[name=hid_life_qty]').val(json);

		// child
		var ary = new Array();		
		$('#div_life_child_sample div').each(function(){
			var ary_col = new Array();
			$(this).find('input').each(function(){
				if($(this).attr('type') == 'radio') {
					if(this.checked) {
						ary_col.push($(this).val());
					} else {
						return;
					}
				} else {
					ary_col.push($(this).val());
				}
			});
			ary.push(ary_col);
		});
		$('#div_life_child div').each(function(){
			var ary_col = new Array();
			$(this).find('input').each(function(){
				if($(this).attr('type') == 'radio') {
					if(this.checked) {
						ary_col.push($(this).val());
					} else {
						return;
					}
				} else {
					ary_col.push($(this).val());
				}
			});
			ary.push(ary_col);
		});
		var json = JSON.stringify(ary);
		$('input[name=hid_life_child]').val(json);


		$.ajax({
			async: false,			
			type: "POST",
			url: $('#hid_baseurl').val() + 'eam/labor_doEdit',
			data: $('#form1').serialize(),
			statusCode: {
				200: function() {
					if('<?= $func ?>'== '411') {
						var labor = '<?= base_url()?>eam/labor';
					} else if('<?= $func ?>' == '412') {
						var labor = '<?= base_url()?>eam/labor2';
					} else {
						var labor = '<?= base_url()?>bos/labor';
					}
					window.location = labor;
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

		//radio取代掉name
		if(prefix == 'laborMaid'){
			checkedtmp = $('#addr_' + prefix +'0').html().replace(/"gender_laborMaid_1"/g, "gender_laborMaid_"+(i + 1));
			$('#addr_' + prefix + i).html(checkedtmp);
		} else {
			$('#addr_' + prefix + i).html($('#addr_' + prefix +'0').html());
		}

		$('#addr_' + prefix + i).children().children().attr('row',i + 1);	// replace attr:row
		$('#addr_' + prefix + i).children().children().children().attr('row',i + 1);	// replace attr:row
		$('#addr_' + prefix + i).children().children().children().children().attr('row',i + 1);	// replace attr:row
		$('#addr_' + prefix + i).children().first().html((i + 1) + "<input type='hidden' name='row_" + prefix + "[]' value='" + (i + 1) + "'>");	// replace #

		$("#tab_" + prefix + " input[row=" + (i + 1) + "]").each(function() {
			$(this).val('');
		});

		$('#tab_' + prefix).append('<tr id="addr_'+ prefix + (i+1)+'"></tr>');
		var str = tmp + " = " + eval(tmp) + "+1";
		eval(str);

		$('select[name="sel_flight_id_laborInbound[]"]').unbind();
		$('select[name="sel_flight_id2_laborInbound[]"]').unbind();
		$('select[name="sel_flight_id_laborInbound[]"]').bind('change', this, onchg_flight_id_laborInbound);
		$('select[name="sel_flight_id2_laborInbound[]"]').bind('change', this, onchg_flight_id_laborInbound2);

		// labor inbound
		if(prefix == 'laborInbound') {
			$('select[name="sel_flight_id_laborInbound[]"]:last').trigger('change');
			// 使某 option 變為 selected
			$('select[name="sel_flight_id2_laborInbound[]"]:last').children().each(function() {
				if ($(this).val() == 0){
					$(this).attr("selected", "selected");
				} else {
					$(this).removeAttr("selected");
				}
			});
			$('select[name="sel_flight_id2_laborInbound[]"]:last').trigger('change');
		}

		$('.date').datetimepicker({
			format: 'YYYY-MM-DD',
			keepInvalid: true,
			ignoreReadonly: true,
			useCurrent: true
		});

		$('.time').datetimepicker({
			format: 'LT',
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

	$("select[name=sel_worker_type_major]").bind("change",function(){
		changeworkercountry();
	});

	$("select[name=sel_country]").bind("change",function(){
		changeworkercountry();
	});

	//filepath start
	$('#a_file_path').fileinput({
		showPreview: false,
		language: "zh-TW",
		uploadUrl: '<?= base_url()?>upload/do_upload',
		allowedFileExtensions: ["jpg","jpeg","gif","png","pdf"],
<?php if((strval($id) != '0') && (strlen($info['a_file_path'])) > 0): ?>
		initialCaption: "<?= $info['a_file_path']?>",
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
	$('#a_file_path').on('fileuploaded', function(event, data, previewId, index) {
		var response = data.response;
		$('input[name=hid_afilepath]').val(response.new_name);
	});	

	$('#a_file_path2').fileinput({
		showPreview: false,
		language: "zh-TW",
		uploadUrl: '<?= base_url()?>upload/do_upload',
		allowedFileExtensions: ["jpg","jpeg","gif","png","pdf"],
<?php if((strval($id) != '0') && (strlen($info['a_file_path2'])) > 0): ?>
		initialCaption: "<?= $info['a_file_path2']?>",
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
	$('#a_file_path2').on('fileuploaded', function(event, data, previewId, index) {
		var response = data.response;
		$('input[name=hid_afilepath2]').val(response.new_name);
	});

	$('#a_file_path3').fileinput({
		showPreview: false,
		language: "zh-TW",
		uploadUrl: '<?= base_url()?>upload/do_upload',
		allowedFileExtensions: ["jpg","jpeg","gif","png","pdf"],
<?php if((strval($id) != '0') && (strlen($info['a_file_path3'])) > 0): ?>
		initialCaption: "<?= $info['a_file_path3']?>",
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
	$('#a_file_path3').on('fileuploaded', function(event, data, previewId, index) {
		var response = data.response;
		$('input[name=hid_afilepath3]').val(response.new_name);
	});

	$('#a_file_path4').fileinput({
		showPreview: false,
		language: "zh-TW",
		uploadUrl: '<?= base_url()?>upload/do_upload',
		allowedFileExtensions: ["jpg","jpeg","gif","png","pdf"],
<?php if((strval($id) != '0') && (strlen($info['a_file_path4'])) > 0): ?>
		initialCaption: "<?= $info['a_file_path4']?>",
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
	$('#a_file_path4').on('fileuploaded', function(event, data, previewId, index) {
		var response = data.response;
		$('input[name=hid_afilepath4]').val(response.new_name);
	});

	$('#a_file_path5').fileinput({
		showPreview: false,
		language: "zh-TW",
		uploadUrl: '<?= base_url()?>upload/do_upload',
		allowedFileExtensions: ["jpg","jpeg","gif","png","pdf"],
<?php if((strval($id) != '0') && (strlen($info['a_file_path5'])) > 0): ?>
		initialCaption: "<?= $info['a_file_path5']?>",
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
	$('#a_file_path5').on('fileuploaded', function(event, data, previewId, index) {
		var response = data.response;
		$('input[name=hid_afilepath5]').val(response.new_name);
	});

	$('#a_file_path6').fileinput({
		showPreview: false,
		language: "zh-TW",
		uploadUrl: '<?= base_url()?>upload/do_upload',
		allowedFileExtensions: ["jpg","jpeg","gif","png","pdf"],
<?php if((strval($id) != '0') && (strlen($info['a_file_path6'])) > 0): ?>
		initialCaption: "<?= $info['a_file_path6']?>",
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
	$('#a_file_path6').on('fileuploaded', function(event, data, previewId, index) {
		var response = data.response;
		$('input[name=hid_afilepath6]').val(response.new_name);
	});

	$('#a_file_path7').fileinput({
		showPreview: false,
		language: "zh-TW",
		uploadUrl: '<?= base_url()?>upload/do_upload',
		allowedFileExtensions: ["jpg","jpeg","gif","png","pdf"],
<?php if((strval($id) != '0') && (strlen($info['a_file_path7'])) > 0): ?>
		initialCaption: "<?= $info['a_file_path7']?>",
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
	$('#a_file_path7').on('fileuploaded', function(event, data, previewId, index) {
		var response = data.response;
		$('input[name=hid_afilepath7]').val(response.new_name);
	});

	$('#a_file_path8').fileinput({
		showPreview: false,
		language: "zh-TW",
		uploadUrl: '<?= base_url()?>upload/do_upload',
		allowedFileExtensions: ["jpg","jpeg","gif","png","pdf"],
<?php if((strval($id) != '0') && (strlen($info['a_file_path8'])) > 0): ?>
		initialCaption: "<?= $info['a_file_path8']?>",
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
	$('#a_file_path8').on('fileuploaded', function(event, data, previewId, index) {
		var response = data.response;
		$('input[name=hid_afilepath8]').val(response.new_name);
	});

	$('#a_file_path9').fileinput({
		showPreview: false,
		language: "zh-TW",
		uploadUrl: '<?= base_url()?>upload/do_upload',
		allowedFileExtensions: ["jpg","jpeg","gif","png","pdf"],
<?php if((strval($id) != '0') && (strlen($info['a_file_path9'])) > 0): ?>
		initialCaption: "<?= $info['a_file_path9']?>",
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
	$('#a_file_path9').on('fileuploaded', function(event, data, previewId, index) {
		var response = data.response;
		$('input[name=hid_afilepath9]').val(response.new_name);
	});

	$('#llaa_filepath_1').fileinput({
		showPreview: false,
		language: "zh-TW",
		uploadUrl: '<?= base_url()?>upload/do_upload',
		allowedFileExtensions: ["jpg","jpeg","gif","png","pdf"],
<?php if((strval($id) != '0') && (isset($ary_labor_auth[1]['filepath']))): ?>
		initialCaption: "<?= $ary_labor_auth[1]['filepath'] ?>",
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
	$('#llaa_filepath_1').on('fileuploaded', function(event, data, previewId, index) {
		var response = data.response;
		$('input[name=llaa_filepath_1]').val(response.new_name);
	});

	$('#llaa_filepath_2').fileinput({
		showPreview: false,
		language: "zh-TW",
		uploadUrl: '<?= base_url()?>upload/do_upload',
		allowedFileExtensions: ["jpg","jpeg","gif","png","pdf"],
<?php if((strval($id) != '0') && (isset($ary_labor_auth[2]['filepath']))): ?>
		initialCaption: "<?= $ary_labor_auth[2]['filepath'] ?>",
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
	$('#llaa_filepath_2').on('fileuploaded', function(event, data, previewId, index) {
		var response = data.response;
		$('input[name=llaa_filepath_2]').val(response.new_name);
	});

	$('#llaa_filepath_3').fileinput({
		showPreview: false,
		language: "zh-TW",
		uploadUrl: '<?= base_url()?>upload/do_upload',
		allowedFileExtensions: ["jpg","jpeg","gif","png","pdf"],
<?php if((strval($id) != '0') && (isset($ary_labor_auth[3]['filepath']))): ?>
		initialCaption: "<?= $ary_labor_auth[3]['filepath'] ?>",
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
	$('#llaa_filepath_3').on('fileuploaded', function(event, data, previewId, index) {
		var response = data.response;
		$('input[name=llaa_filepath_3]').val(response.new_name);
	});

	$('#llaa_filepath_18').fileinput({
		showPreview: false,
		language: "zh-TW",
		uploadUrl: '<?= base_url()?>upload/do_upload',
		allowedFileExtensions: ["jpg","jpeg","gif","png","pdf"],
<?php if((strval($id) != '0') && (isset($ary_labor_auth[18]['filepath']))): ?>
		initialCaption: "<?= $ary_labor_auth[18]['filepath'] ?>",
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
	$('#llaa_filepath_18').on('fileuploaded', function(event, data, previewId, index) {
		var response = data.response;
		$('input[name=llaa_filepath_18]').val(response.new_name);
	});

	$('#file').fileinput({
		showPreview: false,
		language: "zh-TW",
		uploadUrl: '<?= base_url()?>upload/do_upload',
		allowedFileExtensions: ["jpg","jpeg","gif","png","pdf"],
<?php if((strval($id) != '0') && (strlen($info['c_outbound_file_path'])) > 0): ?>
		initialCaption: "<?= $info['c_outbound_file_path']?>",
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
<?php if((strval($id) != '0') && (strlen($info['c_run_file_path'])) > 0): ?>
		initialCaption: "<?= $info['c_run_file_path']?>",
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
	$('#a_license').on('fileuploaded', function(event, data, previewId, index) {
		var response = data.response;
		$('input[name=hid_filepath2]').val(response.new_name);
	});

	$('#a_license').fileinput({
		showPreview: false,
		language: "zh-TW",
		uploadUrl: '<?= base_url()?>upload/do_upload',
		allowedFileExtensions: ["jpg","jpeg","gif","png","pdf"],
<?php if((strval($id) != '0') && (strlen($info['a_license'])) > 0): ?>
		initialCaption: "<?= $info['a_license']?>",
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
	$('#a_license').on('fileuploaded', function(event, data, previewId, index) {
		var response = data.response;
		$('input[name=hid_a_license]').val(response.new_name);
	});	
	//filepath end
});

function changeworkercountry() {
	$(".form-group1").hide();
	$(".form-group2").hide();
	$(".form-group3").hide();
	$(".form-group4").hide();
	$(".form-group5").hide();
	$(".form-group6").hide();
	$(".form-group7").hide();
	$(".form-group8").hide();
	$(".form-group9").hide();
	$(".form-group10").hide();
	$(".form-group11").hide();
	$(".form-group12").hide();
	$(".form-group13").hide();
	$(".form-group14").hide();
	$(".form-group15").hide();
	$(".form-group16").hide();
	$(".form-group17").hide();
	$(".form-group18").hide();
	$(".form-group19").hide();
	$(".form-group20").hide();
	$(".form-group21").hide();
	$(".form-group22").hide();
	$(".form-group23").hide();
	$(".form-group24").hide();
	$(".form-group25").hide();
	$(".form-group26").hide();
	$(".form-group28").hide();
	$(".form-group30").hide();
	$(".form-group31").hide();
	$(".form-group33").hide();
	$(".form-group35").hide();
	$(".form-group37").hide();
	$(".form-group39").hide();
	$(".form-group41").hide();
	$(".form-group43").hide();
	if($("select[name=sel_country]").val() == <?= COUNTRY_ID_VN ?>) {
		$(".form-group26").show();
		$(".form-group28").show();
		$(".form-group30").show();
		if($("select[name=sel_worker_type_major]").val() == <?= WORKER_TYPE_FACTORY ?>) {
			$(".form-group1").show();
			$(".form-group2").show();
			$(".form-group3").show();
			$(".form-group4").show();
			$(".form-group7").show();
			$(".form-group8").show();
			$(".form-group9").show();
		} else if($("select[name=sel_worker_type_major]").val() == <?= WORKER_TYPE_MAID ?>) { 
			$(".form-group1").show();
			$(".form-group2").show();
			$(".form-group3").show();
			$(".form-group4").show();
			$(".form-group5").show();
			$(".form-group6").show();
			$(".form-group7").show();
			$(".form-group8").show();
			$(".form-group9").show();
		}			
	} else if($("select[name=sel_country]").val() == <?= COUNTRY_ID_ID ?>) {
		$(".form-group31").show();
		$(".form-group33").show();
		$(".form-group35").show();
		$(".form-group30").show();
		if($("select[name=sel_worker_type_major]").val() == <?= WORKER_TYPE_FACTORY ?>) {
			$(".form-group1").show();
			$(".form-group2").show();
			$(".form-group3").show();
			$(".form-group7").show();
			$(".form-group8").show();
			$(".form-group9").show();
			$(".form-group10").show();
			$(".form-group11").show();
			$(".form-group12").show();
			$(".form-group13").show();
			$(".form-group14").show();
			$(".form-group15").show();
			$(".form-group16").show();
		} else if($("select[name=sel_worker_type_major]").val() == <?= WORKER_TYPE_MAID ?>) { 
			$(".form-group1").show();
			$(".form-group2").show();
			$(".form-group3").show();
			$(".form-group7").show();
			$(".form-group8").show();
			$(".form-group9").show();
			$(".form-group10").show();
			$(".form-group11").show();
			$(".form-group12").show();
			$(".form-group13").show();
			$(".form-group14").show();
			$(".form-group15").show();
			$(".form-group16").show();
			$(".form-group17").show();
			$(".form-group25").show();
		}			
	} else if($("select[name=sel_country]").val() == <?= COUNTRY_ID_PH ?>) {
		$(".form-group37").show();
		$(".form-group39").show();
		$(".form-group41").show();
		$(".form-group43").show();
		$(".form-group30").show();
		if($("select[name=sel_worker_type_major]").val() == <?= WORKER_TYPE_FACTORY ?>) {
			$(".form-group1").show();
			$(".form-group2").show();
			$(".form-group3").show();
			$(".form-group7").show();
			$(".form-group8").show();
			$(".form-group9").show();
			$(".form-group18").show();
			$(".form-group19").show();
		} else if($("select[name=sel_worker_type_major]").val() == <?= WORKER_TYPE_MAID ?>) { 
			$(".form-group1").show();
			$(".form-group2").show();
			$(".form-group3").show();
			$(".form-group7").show();
			$(".form-group8").show();
			$(".form-group9").show();
			$(".form-group18").show();
			$(".form-group19").show();
			$(".form-group20").show();
			$(".form-group21").show();
			$(".form-group22").show();
			$(".form-group23").show();
			$(".form-group24").show();
		}
	}
}

function onchg_flight_id_laborInbound() {
	var row = $(this).attr('row');
	$.ajax({
		async: false,
		type: "POST",
		url: $('#hid_baseurl').val() + 'eam/apiGetFlightById',
		data: {id:$(this).val()},
		statusCode: {
			200: function(e) {
				var obj = JSON.parse(e);
				$('div[name="dep_time_laborInbound[]"][row="'+ row +'"]').html(obj.dep_time + '<br>' + obj.dep);
				$('div[name="arr_time_laborInbound[]"][row="'+ row +'"]').html(obj.arr_time + '<br>' + obj.arr);
			}
		},
		error: function() {
			alert('操作失敗');
		}
	});	
}

function onchg_flight_id_laborInbound2() {
	var row = $(this).attr('row');

	if ($(this).val() != 0) {
		$.ajax({
			async: false,
			type: "POST",
			url: $('#hid_baseurl').val() + 'eam/apiGetFlightById',
			data: {id:$(this).val()},
			statusCode: {
				200: function(e) {
					var obj = JSON.parse(e);
					$('div[name="connection_dep_time_laborInbound[]"][row="'+ row +'"]').html(obj.dep_time + '<br>' + obj.dep);
					$('div[name="arr_time_laborInbound[]"][row="'+ row +'"]').html(obj.arr_time + '<br>' + obj.arr);
				}
			},
			error: function() {
				alert('操作失敗');
			}
		});
	} else {
		$('div[name="connection_dep_time_laborInbound[]"][row="'+ row +'"]').html('');
		$('div[name="arr_time_laborInbound[]"][row="'+ row +'"]').html('');
	}

}

</script>