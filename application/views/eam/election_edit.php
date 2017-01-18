<script src='<?= base_url()?>assets/js/bootstrap-table.min.js'></script>
<link href='<?= base_url()?>assets/css/bootstrap-table.min.css' rel='stylesheet' type='text/css'/>


<input type='hidden' id='hid_baseurl' value='<?= base_url(); ?>'>

<div class="container">
	<form class="form-horizontal" id='form1'>
		<input type='hidden' name='hid_id' value='<?= $id ?>'>
		<h1><?= $title ?></h1>
		<ul class="nav nav-tabs" role="tablist">
			<li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab"><?= $lang->line('election1') ?></a></li>
			<li role="presentation"><a href="#election2" aria-controls="election2" role="tab" data-toggle="tab"><?= $lang->line('election2') ?></a></li>
			<li role="presentation"><a href="#election3" aria-controls="election3" role="tab" data-toggle="tab"><?= $lang->line('election3') ?></a></li>
			<li role="presentation"><a href="#election4" aria-controls="election4" role="tab" data-toggle="tab"><?= $lang->line('election4') ?></a></li>
		</ul>
		<!-- Tab panes -->
		<div class="tab-content">
			<!-- Tab 1 -->
			<div role="tabpanel" class="tab-pane active" id="home">
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('id') ?></label>
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
						<label class="control-label"><?= $lang->line('employed_workers_id') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<?= form_dropdown('sel_hire_id', $ary_hire, $info['hire_id'], 'class="form-control"'); ?>
<?php else: ?>
							<?= form_dropdown('sel_hire_id', $ary_hire, '', 'class="form-control"'); ?>
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
						<label class="control-label"><?= $lang->line('client').' / '.$lang->line('employer').' / '.$lang->line('qty_require') ?></label>
						<div class="checkbox" id='div_qty_require'>
<?php if (strval($id) != '0'): ?>
							<?= $info['qty_require'].' / '.$info['client_id'].' / '.$info['employer_id'] ?>
<?php else: ?>
							<?= $ary_sel_defult[1] ?>
<?php endif; ?>
						</div>
					</div>
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('f_w_item') ?></label>
						<div class="checkbox" id='div_f_w_item'>
<?php if (strval($id) != '0'): ?>
							<?= $info['f_w_item'] ?>
<?php else: ?>
							<?= $ary_sel_defult[2] ?>
<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('client_addtw') ?></label>
						<div class="checkbox" id='div_client_addtw'>
<?php if (strval($id) != '0'): ?>
							<?= $info['client_addtw'] ?>
<?php else: ?>
							<?= $ary_sel_defult[3] ?>
<?php endif; ?>
						</div>
					</div>
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('f_w_time_descr') ?></label>
						<div class="checkbox" id='div_f_w_time_descr'>
<?php if (strval($id) != '0'): ?>
							<?= $info['f_w_time_descr'] ?>
<?php else: ?>
							<?= $ary_sel_defult[4] ?>
<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('work_limit') ?></label>
						<div class="checkbox" id='div_work_limit'>
<?php if (strval($id) != '0'): ?>
							<?= $info['work_limit'] ?>
<?php else: ?>
							<?= $ary_sel_defult[5] ?>
<?php endif; ?>
						</div>
					</div>
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('f_w_avg_salary') ?></label>
						<div class="checkbox" id='div_f_w_avg_salary'>
<?php if (strval($id) != '0'): ?>
							<?= $info['f_w_avg_salary'] ?>
<?php else: ?>
							<?= $ary_sel_defult[6] ?>
<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('desc') ?></label>
						<div class="checkbox" id='div_descr2'>
<?php if (strval($id) != '0'): ?>
							<?= $info['descr2'] ?>
<?php else: ?>
							<?= $ary_sel_defult[7] ?>
<?php endif; ?>
						</div>
					</div>
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('f_descr') ?></label>
						<div class="checkbox" id='div_f_descr'>
<?php if (strval($id) != '0'): ?>
							<?= $info['f_descr'] ?>
<?php else: ?>
							<?= $ary_sel_defult[8] ?>
<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('f_doc_id6_8') ?></label>
						<div class="checkbox" id='div_f_doc_id6_8'>
<?php if (strval($id) != '0'): ?>
							<?= $info['f_doc_id6_8'] ?>
<?php else: ?>
							<?= $ary_sel_defult[9] ?>
<?php endif; ?>
						</div>
					</div>
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('company_web') ?></label>
						<div class="checkbox" id='div_web'>
<?php if (strval($id) != '0'): ?>
							<?= $info['web'] ?>
<?php else: ?>
							<?= $ary_sel_defult[10] ?>
<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
			<!-- Tab 2 -->
			<div role="tabpanel" class="tab-pane" id="election2">
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('worker_kind') ?></label>
						<div class="checkbox" id='div_worker_kind'>
<?php if (strval($id) != '0'): ?>
							<?= $ary_worker_kind[$info['worker_kind']] ?>
<?php else: ?>
							<?= $ary_sel_defult[11] ?>
<?php endif; ?>
						</div>
					</div>
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('sex') ?> </label>
						<div class="checkbox" id='div_gender'>
<?php if (strval($id) != '0'): ?>
							<?= $ary_gender[$info['gender']] ?>
<?php else: ?>
							<?= $ary_sel_defult[12] ?>
<?php endif; ?>
						</div>						
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('worker_type_major') ?></label>
						<div class="checkbox" id='div_worker_type_major'>
<?php if (strval($id) != '0'): ?>
							<?= $ary_worker_type_major[$info['worker_type_major']] ?>
<?php else: ?>
							<?= $ary_sel_defult[13] ?>
<?php endif; ?>
						</div>
					</div>
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('labor_height') ?></label>
						<div class="checkbox" id='div_height'>
<?php if (strval($id) != '0'): ?>
							<?= $info['height'] ?>
<?php else: ?>
							<?= $ary_sel_defult[14] ?>
<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('worker_type_minor') ?></label>
						<div class="checkbox" id='div_worker_type_minor_id'>
<?php if (strval($id) != '0'): ?>
							<?= $ary_worker_type_minor_id[$info['worker_type_minor_id']] ?>
<?php else: ?>
							<?= $ary_sel_defult[15] ?>
<?php endif; ?>
						</div>
					</div>
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('labor_weight') ?></label>
						<div class="checkbox" id='div_weight'>
<?php if (strval($id) != '0'): ?>
							<?= $info['weight'] ?>
<?php else: ?>
							<?= $ary_sel_defult[16] ?>
<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('marital_status') ?></label>
						<div class="checkbox" id='div_marriage'>
<?php if (strval($id) != '0'): ?>
							<?= $info['marriage'] ?>
<?php else: ?>
							<?= $ary_sel_defult[17] ?>
<?php endif; ?>
						</div>						
					</div>
					<div class="col-sm-3">
						<label class="control-label"><?= $lang->line('age_start') ?></label>
						<div class="checkbox" id='div_age_start'>
<?php if (strval($id) != '0'): ?>
							<?= $info['age_start'] ?>
<?php else: ?>
							<?= $ary_sel_defult[18] ?>
<?php endif; ?>	
						</div>
					</div>
					<div class="col-sm-3">
						<label class="control-label"><?= $lang->line('age_end') ?></label>
						<div class="checkbox" id='div_age_end'>
<?php if (strval($id) != '0'): ?>
							<?= $info['age_end'] ?>
<?php else: ?>
							<?= $ary_sel_defult[19] ?>
<?php endif; ?>	
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('m_education') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<?= form_dropdown('sel_education', $ary_education, $info['education'], 'class="form-control"'); ?>
<?php else: ?>
							<?= form_dropdown('sel_education', $ary_education, '', 'class="form-control"'); ?>
<?php endif; ?>
						</div>
					</div>
					<div class="col-sm-6">
					</div>
				</div>
				<br>
				<div class="form-group">
					<div class="col-sm-12">
						<label class="control-label"><?= $lang->line('maid_work_wish') ?></label>
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
								<input type="checkbox" name='chk_maid_f_wish[]' value="1" <?= ($info['maid_f_wish'] & 1) == '1' ? 'checked="checked"' : '' ?>/>
							</label>
<?php else: ?>
							<label>
								<input type="checkbox" name='chk_maid_f_wish[]' value="1" />
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
								<input type="checkbox" name='chk_maid_f_wish[]' value="2" <?= ($info['maid_f_wish'] & 2) == '2' ? 'checked="checked"' : '' ?>/>
							</label>
<?php else: ?>
							<label>
								<input type="checkbox" name='chk_maid_f_wish[]' value="2" />
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
								<input type="checkbox" name='chk_maid_f_wish[]' value="4" <?= ($info['maid_f_wish'] & 4) == '4' ? 'checked="checked"' : '' ?>/>
							</label>
<?php else: ?>
							<label>
								<input type="checkbox" name='chk_maid_f_wish[]' value="4" />
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
								<input type="checkbox" name='chk_maid_f_wish[]' value="8" <?= ($info['maid_f_wish'] & 8) == '8' ? 'checked="checked"' : '' ?>/>
							</label>
<?php else: ?>
							<label>
								<input type="checkbox" name='chk_maid_f_wish[]' value="8" />
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
								<input type="checkbox" name='chk_maid_f_wish[]' value="16" <?= ($info['maid_f_wish'] & 16) == '16' ? 'checked="checked"' : '' ?>/>
							</label>
<?php else: ?>
							<label>
								<input type="checkbox" name='chk_maid_f_wish[]' value="16" />
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
								<input type="checkbox" name='chk_maid_f_wish[]' value="32" <?= ($info['maid_f_wish'] & 32) == '32' ? 'checked="checked"' : '' ?>/>
							</label>
<?php else: ?>
							<label>
								<input type="checkbox" name='chk_maid_f_wish[]' value="32" />
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
								<input type="checkbox" name='chk_maid_f_wish[]' value="64" <?= ($info['maid_f_wish'] & 64) == '64' ? 'checked="checked"' : '' ?>/>
							</label>
<?php else: ?>
							<label>
								<input type="checkbox" name='chk_maid_f_wish[]' value="64" />
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
								<input type="checkbox" name='chk_maid_f_wish[]' value="128" <?= ($info['maid_f_wish'] & 128) == '128' ? 'checked="checked"' : '' ?>/>
							</label>
<?php else: ?>
							<label>
								<input type="checkbox" name='chk_maid_f_wish[]' value="128" />
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
								<input type="checkbox" name='chk_maid_f_wish[]' value="256" <?= ($info['maid_f_wish'] & 256) == '256' ? 'checked="checked"' : '' ?>/>
							</label>
<?php else: ?>
							<label>
								<input type="checkbox" name='chk_maid_f_wish[]' value="256" />
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
								<input type="checkbox" name='chk_maid_f_wish[]' value="512" <?= ($info['maid_f_wish'] & 512) == '512' ? 'checked="checked"' : '' ?>/>
							</label>
<?php else: ?>
							<label>
								<input type="checkbox" name='chk_maid_f_wish[]' value="512" />
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
								<input type="checkbox" name='chk_maid_f_wish[]' value="1024" <?= ($info['maid_f_wish'] & 1024) == '1024' ? 'checked="checked"' : '' ?>/>
							</label>
<?php else: ?>
							<label>
								<input type="checkbox" name='chk_maid_f_wish[]' value="1024" />
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
								<input type="checkbox" name='chk_maid_f_wish[]' value="2048" <?= ($info['maid_f_wish'] & 2048) == '2048' ? 'checked="checked"' : '' ?>/>
							</label>
<?php else: ?>
							<label>
								<input type="checkbox" name='chk_maid_f_wish[]' value="2048" />
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
								<input type="checkbox" name='chk_maid_m_wish[]' value="1" <?= ($info['maid_m_wish'] & 1) == '1' ? 'checked="checked"' : '' ?>/>
							</label>
<?php else: ?>
							<label>
								<input type="checkbox" name='chk_maid_m_wish[]' value="1" />
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
								<input type="checkbox" name='chk_maid_m_wish[]' value="2" <?= ($info['maid_m_wish'] & 2) == '2' ? 'checked="checked"' : '' ?>/>
							</label>
<?php else: ?>
							<label>
								<input type="checkbox" name='chk_maid_m_wish[]' value="2" />
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
								<input type="checkbox" name='chk_maid_m_wish[]' value="4" <?= ($info['maid_m_wish'] & 4) == '4' ? 'checked="checked"' : '' ?>/>
							</label>
<?php else: ?>
							<label>
								<input type="checkbox" name='chk_maid_m_wish[]' value="4" />
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
								<input type="checkbox" name='chk_maid_m_wish[]' value="8" <?= ($info['maid_m_wish'] & 8) == '8' ? 'checked="checked"' : '' ?>/>
							</label>
<?php else: ?>
							<label>
								<input type="checkbox" name='chk_maid_m_wish[]' value="8" />
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
								<input type="checkbox" name='chk_maid_m_wish[]' value="16" <?= ($info['maid_m_wish'] & 16) == '16' ? 'checked="checked"' : '' ?>/>
							</label>
<?php else: ?>
							<label>
								<input type="checkbox" name='chk_maid_m_wish[]' value="16" />
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
								<input type="checkbox" name='chk_maid_m_wish[]' value="32" <?= ($info['maid_m_wish'] & 32) == '32' ? 'checked="checked"' : '' ?>/>
							</label>
<?php else: ?>
							<label>
								<input type="checkbox" name='chk_maid_m_wish[]' value="32" />
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
								<input type="checkbox" name='chk_maid_m_wish[]' value="64" <?= ($info['maid_m_wish'] & 64) == '64' ? 'checked="checked"' : '' ?>/>
							</label>
<?php else: ?>
							<label>
								<input type="checkbox" name='chk_maid_m_wish[]' value="64" />
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
								<input type="checkbox" name='chk_maid_m_wish[]' value="128" <?= ($info['maid_m_wish'] & 128) == '128' ? 'checked="checked"' : '' ?>/>
							</label>
<?php else: ?>
							<label>
								<input type="checkbox" name='chk_maid_m_wish[]' value="128" />
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
								<input type="checkbox" name='chk_maid_m_wish[]' value="256" <?= ($info['maid_m_wish'] & 256) == '256' ? 'checked="checked"' : '' ?>/>
							</label>
<?php else: ?>
							<label>
								<input type="checkbox" name='chk_maid_m_wish[]' value="256" />
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
								<input type="checkbox" name='chk_maid_m_wish[]' value="512" <?= ($info['maid_m_wish'] & 512) == '512' ? 'checked="checked"' : '' ?>/>
							</label>
<?php else: ?>
							<label>
								<input type="checkbox" name='chk_maid_m_wish[]' value="512" />
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
								<input type="checkbox" name='chk_maid_m_wish[]' value="1024" <?= ($info['maid_m_wish'] & 1024) == '1024' ? 'checked="checked"' : '' ?>/>
							</label>
<?php else: ?>
							<label>
								<input type="checkbox" name='chk_maid_m_wish[]' value="1024" />
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
								<input type="checkbox" name='chk_maid_m_wish[]' value="2048" <?= ($info['maid_m_wish'] & 2048) == '2048' ? 'checked="checked"' : '' ?>/>
							</label>
<?php else: ?>
							<label>
								<input type="checkbox" name='chk_maid_m_wish[]' value="2048" />
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
								<input type="checkbox" name='chk_maid_m_wish[]' value="4096" <?= ($info['maid_m_wish'] & 4096) == '4096' ? 'checked="checked"' : '' ?>/>
							</label>
<?php else: ?>
							<label>
								<input type="checkbox" name='chk_maid_m_wish[]' value="4096" />
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
								<input type="checkbox" name='chk_maid_m_wish[]' value="8192" <?= ($info['maid_m_wish'] & 8192) == '8192' ? 'checked="checked"' : '' ?>/>
							</label>
<?php else: ?>
							<label>
								<input type="checkbox" name='chk_maid_m_wish[]' value="8192" />
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
								<input type="checkbox" name='chk_maid_m_wish[]' value="16384" <?= ($info['maid_m_wish'] & 16384) == '16384' ? 'checked="checked"' : '' ?>/>
							</label>
<?php else: ?>
							<label>
								<input type="checkbox" name='chk_maid_m_wish[]' value="16384" />
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
								<input type="checkbox" name='chk_maid_m_wish[]' value="32768" <?= ($info['maid_m_wish'] & 32768) == '32768' ? 'checked="checked"' : '' ?>/>
							</label>
<?php else: ?>
							<label>
								<input type="checkbox" name='chk_maid_m_wish[]' value="32768" />
							</label>
<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
			<!-- Tab 3 -->
			<div role="tabpanel" class="tab-pane" id="election3">
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('labor_type') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<?= form_dropdown('sel_labor_type', $ary_labor_type, $info['labor_type'], 'class="form-control"'); ?>
<?php else: ?>
							<?= form_dropdown('sel_labor_type', $ary_labor_type, '', 'class="form-control"'); ?>
<?php endif; ?>
						</div>
					</div>
					<div class="col-sm-6">
					</div>
				</div>				
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('school_short') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<?= form_dropdown('sel_school_id', $ary_school, $info['school_id'], 'class="form-control"'); ?>
<?php else: ?>
							<?= form_dropdown('sel_school_id', $ary_school, '', 'class="form-control"'); ?>
<?php endif; ?>
						</div>
					</div>
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('1-6-7') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<?= form_dropdown('sel_doc_id6_7', $ary_doc_id6_7, $info['doc_id6_7'], 'class="form-control"'); ?>
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
							<?= form_dropdown('sel_diet', $ary_diet, $info['diet'], 'class="form-control"'); ?>
<?php else: ?>
							<?= form_dropdown('sel_diet', $ary_diet, '', 'class="form-control"'); ?>
<?php endif; ?>
						</div>
					</div>
					<div class="col-sm-5">
						<label class="control-label"><?= $lang->line('maid_2') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<input type="text" class="form-control" name="txt_work_wish_kg" value='<?= $info['work_wish_kg']?>' pattern="[0-9]+">
<?php else: ?>
							<input type="text" class="form-control" name="txt_work_wish_kg" value='' pattern="[0-9]+">
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
					<div class="col-sm-3">
						<label class="control-label"><?= $lang->line('vision').'('.$lang->line('left').')' ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<input type="text" class="form-control" name="txt_eye_l" value='<?= $info['eye_l']?>' pattern="[0-9,\.]+">
<?php else: ?>
							<input type="text" class="form-control" name="txt_eye_l" value='' pattern="[0-9,\.]+">
<?php endif; ?>
						</div>
					</div>
					<div class="col-sm-3">
						<label class="control-label"><?= $lang->line('vision').'('.$lang->line('right').')' ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<input type="text" class="form-control" name="txt_eye_r" value='<?= $info['eye_r']?>' pattern="[0-9,\.]+">
<?php else: ?>
							<input type="text" class="form-control" name="txt_eye_r" value='' pattern="[0-9,\.]+">
<?php endif; ?>
						</div>
					</div>
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('hand') ?> </label>
						<div>
<?php if (strval($id) != '0'): ?>
							<label class="radio-inline">
								<input type="radio" name="rdo_hand" id="" value=1 <?= $info['hand'] == 1 ? 'checked' : '' ?>> <?= $lang->line('left') ?>
							</label>
							<label class="radio-inline">
								<input type="radio" name="rdo_hand" id="" value=2 <?= $info['hand'] == 2 ? 'checked' : '' ?>> <?= $lang->line('right') ?>
							</label>
<?php else: ?>
							<label class="radio-inline">
								<input type="radio" name="rdo_hand" id="" value=1 checked> <?= $lang->line('left') ?>
							</label>
							<label class="radio-inline">
								<input type="radio" name="rdo_hand" id="" value=2> <?= $lang->line('right') ?>
							</label>
<?php endif; ?>
						</div>
					</div>					
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('eye_color') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<?= form_dropdown('sel_eye_color', $ary_eye_color, $info['eye_color'], 'class="form-control"'); ?>
<?php else: ?>
							<?= form_dropdown('sel_eye_color', $ary_eye_color, '', 'class="form-control"'); ?>
<?php endif; ?>				
						</div>
					</div>
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('auth') ?></label>
						<div class='checkbox'>
							<label>
<?php if (strval($id) != '0'): ?>
								<input type="checkbox" name='chk_auth[]' value="1" <?= ($info['auth'] & 1) == '1' ? 'checked="checked"' : '' ?>/><?= $lang->line('examination') ?>　
<?php else: ?>
								<input type="checkbox" name='chk_auth[]' value="1" /><?= $lang->line('examination') ?>　
<?php endif; ?>
							</label>
							<label>
<?php if (strval($id) != '0'): ?>
								<input type="checkbox" name='chk_auth[]' value="2" <?= ($info['auth'] & 2) == '2' ? 'checked="checked"' : '' ?>/><?= $lang->line('card') ?>　
<?php else: ?>
								<input type="checkbox" name='chk_auth[]' value="2" /><?= $lang->line('card') ?>　
<?php endif; ?>
							</label>
							<label>
<?php if (strval($id) != '0'): ?>
								<input type="checkbox" name='chk_auth[]' value="4" <?= ($info['auth'] & 4) == '4' ? 'checked="checked"' : '' ?>/><?= $lang->line('passport') ?>　
<?php else: ?>
								<input type="checkbox" name='chk_auth[]' value="4" /><?= $lang->line('passport') ?>　
<?php endif; ?>
							</label>
							<label>
<?php if (strval($id) != '0'): ?>
								<input type="checkbox" name='chk_auth[]' value="8" <?= ($info['auth'] & 8) == '8' ? 'checked="checked"' : '' ?>/><?= $lang->line('umid') ?>
<?php else: ?>
								<input type="checkbox" name='chk_auth[]' value="8" /><?= $lang->line('umid') ?>
<?php endif; ?>
							</label>														
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('attendance') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<input type="text" class="form-control" name="txt_attendance" value='<?= $info['attendance']?>' pattern="[0-9]+">
<?php else: ?>
							<input type="text" class="form-control" name="txt_attendance" value='' pattern="[0-9]+">
<?php endif; ?>
						</div>
					</div>
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('election_qty') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<input type="text" class="form-control" name="txt_election_qty" value='<?= $info['election_qty']?>' pattern="[0-9]+">
<?php else: ?>
							<input type="text" class="form-control" name="txt_election_qty" value='' pattern="[0-9]+">
<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('attendance_rate') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<input type="text" class="form-control" name="txt_attendance_rate" value='<?= $info['attendance_rate']?>' pattern="[/.0-9]+">
<?php else: ?>
							<input type="text" class="form-control" name="txt_attendance_rate" value='' pattern="[/.0-9]+">
<?php endif; ?>
						</div>
					</div>
					<div class="col-sm-6">
					</div>
				</div>
			</div>
			<!-- Tab 4 -->
			<div role="tabpanel" class="tab-pane" id="election4">
				<div class="form-group">
					<div class="col-sm-12">
						<table id='tblmain' class="table table-bordered table-hover table-responsive">
						</table>
					</div>
				</div>
			</div>
		</div>
	</form>
<?php if (strval($id) == '0'): ?>	
	<button id="btn_save" class="btn btn-primary">Save</button>
<?php endif; ?>
	<button class="btn btn-default btn-cancel">Cancel</button>	
</div>

<script type="text/javascript">
$(function () {
	$(".btn-cancel").bind("click",function(){
		window.location = '<?= base_url()?>eam/election';
	});
	$("#btn_save").bind("click",function(){
		if(!$("form")[0].checkValidity()) return;

		$.ajax({
			async: false,
			type: "POST",
			url: $('#hid_baseurl').val() + 'eam/election_doEdit',
			data: $('#form1').serialize(),
			statusCode: {
				200: function() {
					window.location = '<?= base_url()?>eam/election';
				}
			},
			error: function() {
				alert('操作失敗');
			}
		});
	});

	$("select[name=sel_hire_id]").bind("change",function(){
		$.ajax({
			async: false,
			type: "POST",
			url: $('#hid_baseurl').val() + 'eam/apiGeElectionHireIdSel/' + $(this).val(),
			data: '',
			dataType: 'json',
			statusCode: {
				200: function(e) {
					$('#div_qty_require').html(e[1]);
					$('#div_f_w_item').html(e[2]);
					$('#div_client_addtw').html(e[3]);
					$('#div_f_w_time_descr').html(e[4]);
					$('#div_work_limit').html(e[5]);
					$('#div_f_w_avg_salary').html(e[6]);
					$('#div_descr2').html(e[7]);
					$('#div_f_descr').html(e[8]);
					$('#div_f_doc_id6_8').html(e[9]);
					$('#div_web').html(e[10]);
					$('#div_worker_kind').html(e[11]);			
					$('#div_gender').html(e[12]);
					$('#div_worker_type_major').html(e[13]);
					$('#div_height').html(e[14]);
					$('#div_worker_type_minor_id').html(e[15]);
					$('#div_weight').html(e[16]);
					$('#div_marriage').html(e[17]);
					$('#div_age_start').html(e[18]);
					$('#div_age_end').html(e[19]);
				}
			},
			error: function() {
			}
		});
	});

	$('#tblmain').bootstrapTable({
		toggle:"table",
		idField: 'id',
		url: '<?= base_url()?>eam/apiGetMappingElectionLaborByElectionID/<?= ((strval($id) != "0") ? $info["id"]:"") ?>',
		sortName:"id",
		sortOrder:"asc",
		selectItemName:"toolbar1",
		sidePagination:"client",
		pagination: true ,
		pageSize: 10,
		pageList:"[10, 50, 100]",
		columns: [{
			field:'labor_id' ,
			title: "<?= $lang->line('laborid') ?>",
			halign:"center" ,
			align:"left" ,
			width:"10%",
			class:"text-nowrap"
		},{
			field:'name_tw' ,
			title: "<?= $lang->line('name_tw') ?>",
			halign:"center" ,
			align:"left" ,
			width:"10%",
			class:"text-nowrap"
		},{
			field:'name_en' ,
			title: "<?= $lang->line('name_en') ?>",
			halign:"center" ,
			align:"left" ,
			width:"20%",
			class:"text-nowrap"
		},{
			field:'name_local' ,
			title: "<?= $lang->line('name_local') ?>",
			halign:"center" ,
			align:"left" ,
			width:"20%",
			class:"text-nowrap"
		},{
			field:'birthday' ,
			title: "<?= $lang->line('birthday') ?>",
			halign:"center" ,
			align:"left" ,
			width:"10%",
			class:"text-nowrap"
		},{			
			field:'work_expertise' ,
			title: "<?= $lang->line('work_expertise') ?>",
			halign:"center" ,
			align:"left" ,
			width:"10%",
			class:"text-nowrap"
		},{
			field:'passport' ,
			title: "<?= $lang->line('passport') ?>",
			halign:"center" ,
			align:"left" ,
			width:"10%",
			class:"text-nowrap"
		},{
			field:'examination' ,
			title: "<?= $lang->line('examination') ?>",
			halign:"center" ,
			align:"left" ,
			width:"10%",
			class:"text-nowrap"			
		}]
	});
});
</script>
