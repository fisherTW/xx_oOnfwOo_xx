<script src='<?= base_url()?>assets/js/bootstrap-table.min.js'></script>
<script src='<?= base_url()?>assets/js/bootstrap-datetimepicker.min.js'></script>
<link href='<?= base_url()?>assets/css/bootstrap-table.min.css' rel='stylesheet' type='text/css'/>
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
			<li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab"><?= $lang->line('pick_stroke') ?></a></li>
			<li role="presentation"><a href="#expected_pick" aria-controls="expected_pick" role="tab" data-toggle="tab"><?= $lang->line('expected_pick') ?></a></li>
			<li role="presentation"><a href="#expected_stroke" aria-controls="expected_stroke" role="tab" data-toggle="tab"><?= $lang->line('expected_stroke') ?></a></li>
			<li role="presentation"><a href="#expected_pick_fee" aria-controls="expected_pick_fee" role="tab" data-toggle="tab"><?= $lang->line('expected_pick_fee') ?></a></li>
<?php if (strval($id) != '0'): ?>
	<?php if (date("Y-m-d") >= $info['date_dep']): ?>
			<li role="presentation"><a href="#real_pick" aria-controls="real_pick" role="tab" data-toggle="tab"><?= $lang->line('real_pick') ?></a></li>
			<li role="presentation"><a href="#real_stroke" aria-controls="real_stroke" role="tab" data-toggle="tab"><?= $lang->line('real_stroke') ?></a></li>
			<li role="presentation"><a href="#real_pick_fee" aria-controls="real_pick_fee" role="tab" data-toggle="tab"><?= $lang->line('real_pick_fee') ?></a></li>
	<?php else: ?>
	<?php endif; ?>
<?php else: ?>
<?php endif; ?>	

		</ul>
		<!-- Tab panes -->
		<div class="tab-content">
			<!-- Tab 1 -->
			<div role="tabpanel" class="tab-pane active" id="home">
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('pick_id') ?></label>
						<div class="checkbox">
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
						<label class="control-label"><?= $lang->line('c_emp_data') ?></label>
					</div>
					<div class="col-sm-6">
					</div>
				</div>		
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('1-1-1') ?></label>
						<div class="checkbox" id='div_country_id'>
<?php if (strval($id) != '0'): ?>
							<?= $info['tw_c'] ?>
<?php else: ?>
							<?= $ary_sel_defult[1] ?>
<?php endif; ?>				
						</div>
					</div>
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('employed_workers_id') ?></label>
						<div >
<?php if (strval($id) != '0'): ?>
							<?= form_dropdown('sel_hire_id', $ary_hire_id, $info['hire_id'], 'class="form-control"'); ?>
<?php else: ?>
							<?= form_dropdown('sel_hire_id', $ary_hire_id, '', 'class="form-control"'); ?>
<?php endif; ?>				
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('client') ?></label>
						<div class="checkbox" id='div_client_id'>
<?php if (strval($id) != '0'): ?>
							<?= $info['c_name_tw'] ?>
<?php else: ?>
							<?= $ary_sel_defult[2] ?>
<?php endif; ?>				
						</div>
					</div>
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('school_id') ?></label>
						<div class="checkbox">
<?php if (strval($id) != '0'): ?>
							<?= form_dropdown('sel_school_id', $ary_school, $info['school_id'], 'class="form-control"'); ?>
<?php else: ?>
							<?= form_dropdown('sel_school_id', $ary_school, '', 'class="form-control"'); ?>
<?php endif; ?>				
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('employer') ?></label>
						<div class="checkbox" id='div_employer_id'>
<?php if (strval($id) != '0'): ?>
							<?= $info['e_name_tw'] ?>
<?php else: ?>
							<?= $ary_sel_defult[3] ?>
<?php endif; ?>				
						</div>
					</div>
					<div class="col-sm-6">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<label for="tab_PickLocalman" class='form-label'> <?= $lang->line('receive_data') ?></label><br />
						<table class="table table-bordered table-hover table-responsive" id="tab_PickLocalman">
							<thead>
								<tr >
									<th class="text-center">#</th>
									<th class="text-center text-nowrap"><?= $lang->line('pick_localman') ?></th>
									<th class="text-center text-nowrap"><?= $lang->line('p_localman_tel') ?></th>
								</tr>
							</thead>
							<tbody>
<?php if(count($ary_PickLocalman) > 0): ?>
<?php foreach ($ary_PickLocalman as $item): ?>
								<tr id="<?= 'addr_PickLocalman'.($item['row'] - 1) ?>">
									<td>
										<?= ($item['row']) ?>
										<input type='hidden' name='row_PickLocalman[]' value='<?= ($item['row']) ?>'>
									</td>
									<td>
										<input type="text" name='localman_PickLocalman[]' value='<?= ($item['localman']) ?>' class="form-control"/>
									</td>
									<td>
										<input type="text" name='localman_tel_PickLocalman[]' value='<?= ($item['localman_tel']) ?>' class="form-control"/>
									</td>
								</tr>
<?php endforeach;?>
								<tr id='<?php echo 'addr_PickLocalman'.count($ary_PickLocalman) ?>'></tr>
<?php else: ?>
								<tr id='addr_PickLocalman0'>
									<td>
										1
										<input type='hidden' name='row_PickLocalman[]' value='1'>
									</td>
									<td>
										<input type="text" name='localman_PickLocalman[]' class="form-control"/>
									</td>
									<td>
										<input type="text" name='localman_tel_PickLocalman[]' class="form-control"/>
									</td>
								</tr>
								<tr id='addr_PickLocalman1'></tr>
<?php endif; ?>
							</tbody>
						</table>
						<a class="add_row btn btn-warning pull-left" prefix='PickLocalman'><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
						<a class="delete_row pull-right btn btn-danger" prefix='PickLocalman'><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></a>
						<div class='row mb20' ps='for_add_del_button'>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('date_dep') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<div class='input-group date' id='datetimepicker'>
								<input type="text" class="form-control" name="txt_date_dep" value='<?= $info['date_dep']?>' pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" required readonly>
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-calendar"></span>
								</span>
							</div>
<?php else: ?>
							<div class='input-group date' id='datetimepicker'>
								<input type="text" class="form-control" name="txt_date_dep" value='' pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" required readonly>
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-calendar"></span>
								</span>
							</div>
<?php endif; ?>	
						</div>
					</div>
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('date_arr') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<div class='input-group date' id='datetimepicker'>
								<input type="text" class="form-control" name="txt_date_arr" value='<?= $info['date_arr']?>' pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" required readonly>
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-calendar"></span>
								</span>
							</div>
<?php else: ?>
							<div class='input-group date' id='datetimepicker'>
								<input type="text" class="form-control" name="txt_date_arr" value='' pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" required readonly>
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
						<label class="control-label"><?= $lang->line('localmandescr') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<input type="text" class="form-control" name="txt_localmandescr" value='<?= $info['localmandescr']?>'>
<?php else: ?>
							<input type="text" class="form-control" name="txt_localmandescr" value=''>
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
							<input type="text" class="form-control" name="txt_descr" value='<?= $info['descr']?>'>
<?php else: ?>
							<input type="text" class="form-control" name="txt_descr" value=''>
<?php endif; ?>	
						</div>
					</div>
					<div class="col-sm-6">
					</div>
				</div>
			</div>
			<!-- tab 2 -->
			<div role="tabpanel" class="tab-pane" id="expected_pick">
				<div class="form-group">
					<div class="col-sm-12">
						<label for="tab_exp" class='form-label'> <?= $lang->line('expected_pick_delegate') ?></label><br />
						<table id='tblmain' class="table table-bordered table-hover table-responsive">
						</table>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<label for="tab_PickArr" class='form-label'> <?= $lang->line('1-1-5') ?></label><br />
						<table class="table table-bordered table-hover table-responsive" id="tab_PickArr">
							<thead>
								<tr >
									<th width="2%" class="text-center">#</th>
									<th width="9%" class="text-center text-nowrap"><?= $lang->line('hire_type') ?></th>
									<th width="14%" class="text-center text-nowrap"><?= $lang->line('date') ?></th>
									<th width="20%" class="text-center text-nowrap"><?= $lang->line('contact_id') ?></th>
									<th width="15%" class="text-center text-nowrap"><?= $lang->line('1-1-5') ?></th>
									<th width="20%" class="text-center text-nowrap"><?= $lang->line('dep_time').'/'.$lang->line('depspot') ?></th>
									<th width="20%" class="text-center text-nowrap"><?= $lang->line('arr_time').'/'.$lang->line('arrspot') ?></th>
								</tr>
							</thead>
							<tbody>
<?php if(count($ary_PickArr) > 0): ?>
<?php foreach ($ary_PickArr as $item): ?>
								<tr id="<?= 'addr_PickArr'.($item['row'] - 1) ?>">
									<td>
										<?= ($item['row']) ?>
										<input type='hidden' name='row_PickArr[]' value='<?= ($item['row']) ?>'>
									</td>
									<td>
	<?php if (date("Y-m-d") >= $info['date_dep']): ?>										
										<?= form_dropdown('type_PickArr[]',$ary_type_pickarr,$item['type'], 'class="form-control" disabled="disabled"');?>
	<?php else: ?>
										<?= form_dropdown('type_PickArr[]',$ary_type_pickarr,$item['type'], 'class="form-control"');?>
	<?php endif; ?>
									</td>
									<td>
										<div class='input-group date' id='datetimepicker2'>
											<input type="text" class="form-control" name="date_PickArr[]" value='<?= ($item['date']) ?>' pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" required readonly>
	<?php if (date("Y-m-d") >= $info['date_dep']): ?>
	<?php else: ?>											
											<span class="input-group-addon">
												<span class="glyphicon glyphicon-calendar"></span>
											</span>
	<?php endif; ?>										
										</div>
									</td>
									<td>
	<?php if (date("Y-m-d") >= $info['date_dep']): ?>
										<input type="hidden" name='client_emp_id_PickArr[]' value='<?= ($item['client_emp_id']) ?>' class="form-control" row="<?= ($item['row']) ?>" />
										<?= form_dropdown('contact_id_from_PickArr[]',$ary_contact_id_from,$item['contact_id_from'], 'class="form-control" row="'.$item['row'].'" disabled="disabled"');?>
										<div class="input-group">
		<?php if (strval($item['contact_id']) != '-1'): ?>
											<?= form_dropdown('contact_id_PickArr[]',($item['name_tw']==''?array($item['contact_id'] => $item['c_name_tw']):array($item['contact_id'] => $item['name_tw'])), $item['contact_id'], 'class="form-control" otype="contact_id_arr" row="'.$item['row'].'" disabled="disabled"' ); ?>
		<?php else: ?>
											<?= form_dropdown('contact_id_PickArr[]', array('-1'=>'未選取'), 0, 'class="form-control" otype="contact_id_arr" row="'.$item['row'].'" disabled="disabled"'); ?>
		<?php endif; ?>
											<div class="input-group-btn">
												<button ftype='contact_id_arr' row='<?= ($item['row']) ?>' class="fsearch btn btn-primary" disabled="disabled"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
											</div>
										</div>
	<?php else: ?>
										<input type="hidden" name='client_emp_id_PickArr[]' value='<?= ($item['client_emp_id']) ?>' class="form-control" row="<?= ($item['row']) ?>" />
										<?= form_dropdown('contact_id_from_PickArr[]',$ary_contact_id_from,$item['contact_id_from'], 'class="form-control" row="'.$item['row'].'"');?>
										<div class="input-group">
		<?php if (strval($item['contact_id']) != '-1'): ?>
											<?= form_dropdown('contact_id_PickArr[]',($item['name_tw']==''?array($item['contact_id'] => $item['c_name_tw']):array($item['contact_id'] => $item['name_tw'])), $item['contact_id'], 'class="form-control" otype="contact_id_arr" row="'.$item['row'].'"' ); ?>
		<?php else: ?>
											<?= form_dropdown('contact_id_PickArr[]', array('-1'=>'未選取'), 0, 'class="form-control" otype="contact_id_arr" row="'.$item['row'].'"'); ?>
		<?php endif; ?>
											<div class="input-group-btn">
												<button ftype='contact_id_arr' row='<?= ($item['row']) ?>' class="fsearch btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
											</div>
										</div>
	<?php endif; ?>									
									</td>
									<td>
	<?php if (date("Y-m-d") >= $info['date_dep']): ?>
										<?= form_dropdown('dep_id_PickArr[]',$ary_dep_id,$item['dep_id'], 'class="form-control" row="'.$item['row'].'" disabled="disabled"'); ?>
	<?php else: ?>
										<?= form_dropdown('dep_id_PickArr[]',$ary_dep_id,$item['dep_id'], 'class="form-control" row="'.$item['row'].'"'); ?>
	<?php endif; ?>
									</td>
									<td>
										<input type="text" name='dep_time_PickArr[]' value='<?= ($item['dep_time_PickArr']) ?>' class="form-control" row="<?=$item['row']?>" readonly/>
									</td>
									<td>
										<input type="text" name='arr_time_PickArr[]' value='<?= ($item['arr_time_PickArr']) ?>' class="form-control" row="<?=$item['row']?>" readonly/>
									</td>
								</tr>
<?php endforeach;?>
								<tr id='<?php echo 'addr_PickArr'.count($ary_PickArr) ?>'></tr>
<?php else: ?>
								<tr id='addr_PickArr0'>
									<td>
										1
										<input type='hidden' name='row_PickArr[]' value='1'>
									</td>
									<td>
										<?= form_dropdown('type_PickArr[]', $ary_type_pickarr, '', 'class="form-control" '); ?>
									</td>
									<td>
										<div class='input-group date' id='datetimepicker2'>
											<input type="text" class="form-control" name="date_PickArr[]" value='' pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" required readonly>
											<span class="input-group-addon">
												<span class="glyphicon glyphicon-calendar"></span>
											</span>
										</div>
									</td>
									<td>
										<input type="hidden" name='client_emp_id_PickArr[]' class="form-control" row="1"/>
										<?= form_dropdown('contact_id_from_PickArr[]', $ary_contact_id_from, '', 'class="form-control" row="1" '); ?>
										<div class="input-group">										
											<?= form_dropdown('contact_id_PickArr[]', array('-1'=>'未選取'), 0, 'class="form-control" otype="contact_id_arr" row="1" '); ?>
											<div class="input-group-btn">
												<button ftype='contact_id_arr' row='1' class="fsearch btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
											</div>
										</div>
									</td>
									<td>
										<?= form_dropdown('dep_id_PickArr[]', $ary_dep_id, '', 'class="form-control" row="1" '); ?>
									</td>
									<td>
										<input type="text" name='dep_time_PickArr[]' value="<?= $ary_numbersel_defult[2].' / '.$ary_numbersel_defult[4]?>"  class="form-control" row="1" readonly/>
									</td>
									<td>
										<input type="text" name='arr_time_PickArr[]' value="<?= $ary_numbersel_defult[3].' / '.$ary_numbersel_defult[5]?>" class="form-control" row="1" readonly/>
									</td>
								</tr>
								<tr id='addr_PickArr1'></tr>
<?php endif; ?>
							</tbody>
						</table>
<?php if (strval($id) != '0'): ?>						
	<?php if (date("Y-m-d") >= $info['date_dep']): ?>
	<?php else: ?>					
						<a class="add_row btn btn-warning pull-left" prefix='PickArr'><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
						<a class="delete_row pull-right btn btn-danger" prefix='PickArr'><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></a>
	<?php endif; ?>
<?php else: ?>
						<a class="add_row btn btn-warning pull-left" prefix='PickArr'><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
						<a class="delete_row pull-right btn btn-danger" prefix='PickArr'><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></a>
<?php endif; ?>
						<div class='row mb20' ps='for_add_del_button'>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<label for="tab_PickHotel" class='form-label'> <?= $lang->line('1-1-6') ?></label><br />
						<table class="table table-bordered table-hover table-responsive" id="tab_PickHotel">
							<thead>
								<tr>
									<th width="2%" class="text-center">#</th>
									<th width="15%" class="text-center text-nowrap"><?= $lang->line('date').'/'.$lang->line('need') ?></th>
									<th width="15%" class="text-center text-nowrap"><?= $lang->line('contact_id') ?></th>
									<th width="20%" class="text-center text-nowrap"><?= $lang->line('hotelname').'/'.$lang->line('1-1-7') ?></th>
									<th width="23%" class="text-center text-nowrap"><?= $lang->line('hotelnameen').'/'.$lang->line('url') ?></th>
									<th width="25%" class="text-center text-nowrap"><?= $lang->line('phone').'/'.$lang->line('tw_address') ?></th>
								</tr>
							</thead>
							<tbody>
<?php if(count($ary_PickHotel) > 0): ?>
<?php foreach ($ary_PickHotel as $item): ?>
								<tr id="<?= 'addr_PickHotel'.($item['row'] - 1) ?>">
									<td>
										<?= ($item['row']) ?>
										<input type='hidden' name='row_PickHotel[]' value='<?= ($item['row']) ?>'>
									</td>
									<td>
										<div class='input-group date' id='datetimepicker2'>
											<input type="text" class="form-control" name="date_PickHotel[]" value='<?= ($item['date']) ?>' pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" required readonly>
	<?php if (date("Y-m-d") < $info['date_dep']): ?>
											<span class="input-group-addon">
												<span class="glyphicon glyphicon-calendar"></span>
											</span>
	<?php endif; ?>
										</div>
	<?php if (date("Y-m-d") >= $info['date_dep']): ?>
										<input type="text" name='need_PickHotel[]' value='<?= ($item['need']) ?>' class="form-control" readonly/>
	<?php else: ?>
										<input type="text" name='need_PickHotel[]' value='<?= ($item['need']) ?>' class="form-control" />
	<?php endif; ?>
									</td>
									<td>
	<?php if (date("Y-m-d") >= $info['date_dep']): ?>
										<input type="hidden" name='client_emp_id_PickHotel[]' value='<?= ($item['client_emp_id']) ?>' class="form-control" row="<?= ($item['row']) ?>" />
										<?= form_dropdown('contact_id_from_PickHotel[]',$ary_contact_id_from,$item['contact_id_from'], 'class="form-control" row="'.$item['row'].'" disabled="disabled"');?>
										<div class="input-group">
		<?php if (strval($item['contact_id']) != '-1'): ?>
											<?= form_dropdown('contact_id_PickHotel[]',($item['name_tw']==''?array($item['contact_id'] => $item['c_name_tw']):array($item['contact_id'] => $item['name_tw'])), $item['contact_id'], 'class="form-control" otype="contact_id" row="'.$item['row'].'" disabled="disabled"' ); ?>
		<?php else: ?>
											<?= form_dropdown('contact_id_PickHotel[]', array('-1'=>'未選取'), 0, 'class="form-control" otype="contact_id" row="'.$item['row'].'" disabled="disabled"'); ?>
		<?php endif; ?>
											<div class="input-group-btn">
												<button ftype='contact_id' row='<?= ($item['row']) ?>' class="fsearch btn btn-primary" disabled="disabled"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
											</div>
										</div>
	<?php else: ?>
										<input type="hidden" name='client_emp_id_PickHotel[]' value='<?= ($item['client_emp_id']) ?>' class="form-control" row="<?= ($item['row']) ?>" />
										<?= form_dropdown('contact_id_from_PickHotel[]',$ary_contact_id_from,$item['contact_id_from'], 'class="form-control" row="'.$item['row'].'"');?>
										<div class="input-group">
		<?php if (strval($item['contact_id']) != '-1'): ?>
											<?= form_dropdown('contact_id_PickHotel[]',($item['name_tw']==''?array($item['contact_id'] => $item['c_name_tw']):array($item['contact_id'] => $item['name_tw'])), $item['contact_id'], 'class="form-control" otype="contact_id" row="'.$item['row'].'"' ); ?>
		<?php else: ?>
											<?= form_dropdown('contact_id_PickHotel[]', array('-1'=>'未選取'), 0, 'class="form-control" otype="contact_id" row="'.$item['row'].'"'); ?>
		<?php endif; ?>
											<div class="input-group-btn">
												<button ftype='contact_id' row='<?= ($item['row']) ?>' class="fsearch btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
											</div>
										</div>
	<?php endif; ?>
									</td>
									<td>
	<?php if (date("Y-m-d") >= $info['date_dep']): ?>										
										<?= form_dropdown('hotel_id_PickHotel[]',$ary_hotel_id,$item['hotel_id'], 'class="form-control" row="'.$item['row'].'" disabled="disabled"'); ?>
										<?= $item['room_id_PickHotel']?>
	<?php else: ?>
										<?= form_dropdown('hotel_id_PickHotel[]',$ary_hotel_id,$item['hotel_id'], 'class="form-control" row="'.$item['row'].'"'); ?>
										<?= $item['room_id_PickHotel']?>
	<?php endif; ?>									
									</td>
									<td>
										<input type="text" name='en_PickHotel[]' value='<?= ($item['en_PickHotel']) ?>' class="form-control" row="<?=$item['row']?>" readonly/>
										<input type="text" name='site_PickHotel[]' value='<?= ($item['site_PickHotel']) ?>' class="form-control" row="<?=$item['row']?>" readonly/>
									</td>
									<td>
										<input type="text" name='phone_PickHotel[]' value='<?= ($item['phone_PickHotel']) ?>' class="form-control" row="<?=$item['row']?>" readonly/>
										<input type="text" name='address_PickHotel[]' value='<?= ($item['address_PickHotel']) ?>' class="form-control" row="<?=$item['row']?>" readonly/>
									</td>
								</tr>
<?php endforeach;?>
								<tr id='<?php echo 'addr_PickHotel'.count($ary_PickHotel) ?>'></tr>
<?php else: ?>
								<tr id='addr_PickHotel0'>
									<td>
										1
										<input type='hidden' name='row_PickHotel[]' value='1'>
									</td>
									<td>
										<div class='input-group date' id='datetimepicker2'>
											<input type="text" class="form-control" name="date_PickHotel[]" value='' pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" required readonly>
											<span class="input-group-addon">
												<span class="glyphicon glyphicon-calendar"></span>
											</span>
										</div>
										<input type="text" name='need_PickHotel[]' class="form-control"/>
									</td>
									<td>
										<input type="hidden" name='client_emp_id_PickHotel[]' class="form-control" row="1"/>
										<?= form_dropdown('contact_id_from_PickHotel[]', $ary_contact_id_from, '', 'class="form-control" row="1" '); ?>
										<div class="input-group">										
											<?= form_dropdown('contact_id_PickHotel[]', array('-1'=>'未選取'), 0, 'class="form-control" otype="contact_id" row="1" '); ?>
											<div class="input-group-btn">
												<button ftype='contact_id' row='1' class="fsearch btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
											</div>
										</div>
									</td>
									<td>
										<?= form_dropdown('hotel_id_PickHotel[]', $ary_hotel_id, '', 'class="form-control" row="1" '); ?>
										<?= form_dropdown('room_id_PickHotel[]', $ary_room_id, '', 'class="form-control" row="1" '); ?>
									</td>
									<td>
										<input type="text" name='en_PickHotel[]' value='<?= $ary_hotelsel_defult[2] ?>' class="form-control" row="1" readonly/>
										<input type="text" name='site_PickHotel[]' value='<?= $ary_hotelsel_defult[3] ?>' class="form-control" row="1" readonly/>
									</td>
									<td>
										<input type="text" name='phone_PickHotel[]' value='<?= $ary_hotelsel_defult[4] ?>' class="form-control" row="1" readonly/>
										<input type="text" name='address_PickHotel[]' value='<?= $ary_hotelsel_defult[5] ?>' class="form-control" row="1" readonly/>
									</td>
								</tr>
								<tr id='addr_PickHotel1'></tr>
<?php endif; ?>
							</tbody>
						</table>
<?php if (strval($id) != '0'): ?>						
	<?php if (date("Y-m-d") < $info['date_dep']): ?>
						<a class="add_row btn btn-warning pull-left" prefix='PickHotel'><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
						<a class="delete_row pull-right btn btn-danger" prefix='PickHotel'><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></a>
	<?php endif; ?>
<?php else: ?>
						<a class="add_row btn btn-warning pull-left" prefix='PickHotel'><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
						<a class="delete_row pull-right btn btn-danger" prefix='PickHotel'><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></a>
<?php endif; ?>
						<div class='row mb20' ps='for_add_del_button'>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<label for="tab_pickContact" class='form-label'> <?= $lang->line('schedule_contact') ?></label><br />
						<table class="table table-bordered table-hover table-responsive" id="tab_pickContact">
							<thead>
								<tr>
									<th width="5%" class="text-center">#</th>
									<th width="15%" class="text-center text-nowrap"><?= $lang->line('contact_id') ?></th>
									<th width="25%" class="text-center text-nowrap"><?= $lang->line('schedule_contact') ?></th>
									<th width="55%" class="text-center text-nowrap"><?= $lang->line('email') ?></th>
								</tr>
							</thead>
							<tbody>
<?php if(count($ary_pickContact) > 0): ?>
<?php foreach ($ary_pickContact as $item): ?>
								<tr id="<?= 'addr_pickContact'.($item['row'] - 1) ?>">
									<td>
										<?= ($item['row']) ?>
										<input type='hidden' name='row_pickContact[]' value='<?= ($item['row']) ?>'>
									</td>
	<?php if (date("Y-m-d") >= $info['date_dep']): ?>										
									<td>
										<?= form_dropdown('is_contact_from_pickContact[]',$ary_contact_id_from,$item['is_contact_from'], 'class="form-control" row="'.$item['row'].'" disabled="disabled"');?>
									</td>
									<td>									
										<div class="input-group">
		<?php if (strval($item['contact_id']) != '-1'): ?>
											<?= form_dropdown('contact_id_pickContact[]',($item['name_tw']==''?array($item['contact_id'] => $item['c_name_tw']):array($item['contact_id'] => $item['name_tw'])), $item['contact_id'], 'class="form-control" otype="contact_id_con" row="'.$item['row'].'" disabled="disabled"' ); ?>
		<?php else: ?>
											<?= form_dropdown('contact_id_pickContact[]', array('-1'=>'未選取'), 0, 'class="form-control" otype="contact_id_con" row="'.$item['row'].'" disabled="disabled"'); ?>
		<?php endif; ?>
											<div class="input-group-btn">
												<button ftype='contact_id_con' row='<?= ($item['row']) ?>' class="fsearch btn btn-primary" disabled="disabled"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
											</div>
										</div>
									</td>
	<?php else: ?>
									<td>	
										<?= form_dropdown('is_contact_from_pickContact[]',$ary_contact_id_from,$item['is_contact_from'], 'class="form-control" row="'.$item['row'].'"');?>
									</td>
									<td>
										<div class="input-group">
		<?php if (strval($item['contact_id']) != '-1'): ?>
											<?= form_dropdown('contact_id_pickContact[]',($item['name_tw']==''?array($item['contact_id'] => $item['c_name_tw']):array($item['contact_id'] => $item['name_tw'])), $item['contact_id'], 'class="form-control" otype="contact_id_con" row="'.$item['row'].'"' ); ?>
		<?php else: ?>
											<?= form_dropdown('contact_id_pickContact[]', array('-1'=>'未選取'), 0, 'class="form-control" otype="contact_id_con" row="'.$item['row'].'"'); ?>
		<?php endif; ?>
											<div class="input-group-btn">
												<button ftype='contact_id_con' row='<?= ($item['row']) ?>' class="fsearch btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
											</div>
										</div>
									</td>
									<td>										
										<input type="text" name='email_pickContact[]' value='<?= ($item['email']) ?>' class="form-control" row="<?=$item['row']?>"/>
									</td>
	<?php endif; ?>
								</tr>
<?php endforeach;?>
								<tr id='<?php echo 'addr_pickContact'.count($ary_pickContact) ?>'></tr>
<?php else: ?>
								<tr id='addr_pickContact0'>
									<td>
										1
										<input type='hidden' name='row_pickContact[]' value='1'>
									</td>
									<td>
										<?= form_dropdown('is_contact_from_pickContact[]', $ary_contact_id_from, '', 'class="form-control" row="1" '); ?>
									</td>
									<td>
										<div class="input-group">										
											<?= form_dropdown('contact_id_pickContact[]', array('-1'=>'未選取'), 0, 'class="form-control" otype="contact_id_con" row="1" '); ?>
											<div class="input-group-btn">
												<button ftype='contact_id' row='1' class="fsearch btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
											</div>
										</div>
									</td>
									<td>
										<input type="text" name='email_pickContact[]' value='' class="form-control" row="1" readonly/>
									</td>
								</tr>
								<tr id='addr_pickContact1'></tr>
<?php endif; ?>
							</tbody>
						</table>
<?php if (strval($id) != '0'): ?>						
	<?php if (date("Y-m-d") < $info['date_dep']): ?>
						<a class="add_row btn btn-warning pull-left" prefix='pickContact'><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
						<a class="delete_row pull-right btn btn-danger" prefix='pickContact'><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></a>
	<?php endif; ?>
<?php else: ?>
						<a class="add_row btn btn-warning pull-left" prefix='pickContact'><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
						<a class="delete_row pull-right btn btn-danger" prefix='pickContact'><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></a>
<?php endif; ?>						

						<div class='row mb20' ps='for_add_del_button'>
						</div>
					</div>
				</div>				
			</div>
			<!-- tab 3 -->
			<div role="tabpanel" class="tab-pane" id="expected_stroke">
				<div class="form-group">
					<div class="col-sm-12">
						<table class="table table-bordered table-hover table-responsive" id="tab_PickStroke">
							<thead>
								<tr >
									<th width="2%" class="text-center">#</th>
									<th width="15%" class="text-center text-nowrap"><?= $lang->line('date') ?></th>
									<th width="15%" class="text-center text-nowrap"><?= $lang->line('time') ?></th>
									<th width="32%" class="text-center text-nowrap"><?= $lang->line('item') ?></th>
									<th width="35%" class="text-center text-nowrap"><?= $lang->line('desc') ?></th>
								</tr>
							</thead>
							<tbody>
<?php if(count($ary_PickStroke) > 0): ?>
<?php foreach ($ary_PickStroke as $item): ?>
								<tr id="<?= 'addr_PickStroke'.($item['row'] - 1) ?>">
									<td>
										<?= ($item['row']) ?>
										<input type='hidden' name='row_PickStroke[]' value='<?= ($item['row']) ?>'>
									</td>
									<td>
										<div class='input-group date' id='datetimepicker2'>
											<input type="text" class="form-control" name="date_PickStroke[]" value='<?= ($item['date']) ?>' pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" required readonly>
	<?php if (date("Y-m-d") < $info['date_dep']): ?>
											<span class="input-group-addon">
												<span class="glyphicon glyphicon-calendar"></span>
											</span>
	<?php endif; ?>
										</div>
									</td>
	<?php if (date("Y-m-d") >= $info['date_dep']): ?>									
									<td>
										<input type="text" name='time_PickStroke[]' value='<?= ($item['time']) ?>' class="form-control" placeholder='00:00~00:00' pattern="[0-9]{2}:[0-9]{2}~[0-9]{2}:[0-9]{2}" readonly disabled="disabled"/>
									</td>
									<td>
										<input type="text" name='item_PickStroke[]' value='<?= ($item['item']) ?>' class="form-control" readonly/>
									</td>
									<td>
										<input type="text" name='descr_PickStroke[]' value='<?= ($item['descr']) ?>' class="form-control" readonly/>
									</td>
	<?php else: ?>
									<td>
										<input type="text" name='time_PickStroke[]' value='<?= ($item['time']) ?>' class="form-control" placeholder='00:00~00:00' pattern="[0-9]{2}:[0-9]{2}~[0-9]{2}:[0-9]{2}" />
									</td>
									<td>
										<input type="text" name='item_PickStroke[]' value='<?= ($item['item']) ?>' class="form-control"/>
									</td>
									<td>
										<input type="text" name='descr_PickStroke[]' value='<?= ($item['descr']) ?>' class="form-control"/>
									</td>
	<?php endif; ?>									
								</tr>
<?php endforeach;?>
								<tr id='<?php echo 'addr_PickStroke'.count($ary_PickStroke) ?>'></tr>
<?php else: ?>
								<tr id='addr_PickStroke0'>
									<td>
										1
										<input type='hidden' name='row_PickStroke[]' value='1'>
									</td>
									<td>
										<div class='input-group date' id='datetimepicker2'>
											<input type="text" class="form-control" name="date_PickStroke[]" value='' pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" required readonly>
											<span class="input-group-addon">
												<span class="glyphicon glyphicon-calendar"></span>
											</span>
										</div>
									</td>
									<td>
										<input type="text" name='time_PickStroke[]' class="form-control" placeholder='00:00~00:00' pattern="[0-9]{2}:[0-9]{2}~[0-9]{2}:[0-9]{2}"/>
									</td>
									<td>
										<input type="text" name='item_PickStroke[]' class="form-control" />
									</td>
									<td>
										<input type="text" name='descr_PickStroke[]' class="form-control" />
									</td>
								</tr>
								<tr id='addr_PickStroke1'></tr>
<?php endif; ?>
							</tbody>
						</table>
<?php if (strval($id) != '0'): ?>						
	<?php if (date("Y-m-d") < $info['date_dep']): ?>
						<a class="add_row btn btn-warning pull-left" prefix='PickStroke'><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
						<a class="delete_row pull-right btn btn-danger" prefix='PickStroke'><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></a>
	<?php endif; ?>
<?php else: ?>
						<a class="add_row btn btn-warning pull-left" prefix='PickStroke'><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
						<a class="delete_row pull-right btn btn-danger" prefix='PickStroke'><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></a>
<?php endif; ?>						
						<div class='row mb20' ps='for_add_del_button'>
						</div>
					</div>
				</div>
			</div>
			<!-- tab 4 -->
			<div role="tabpanel" class="tab-pane" id="expected_pick_fee">
				<div class="form-group">
					<div class="col-sm-12">
						<table class="table table-bordered table-hover table-responsive" id="tab_PickFee">
							<thead>
								<tr >
									<th width="2%" class="text-center">#</th>
									<th width="15%" class="text-center text-nowrap"><?= $lang->line('date') ?></th>
									<th width="10%" class="text-center text-nowrap"><?= $lang->line('pay_item').'/'.$lang->line('oversea_client') ?></th>
									<th width="23%" class="text-center text-nowrap"><?= $lang->line('detail') ?></th>
									<th width="10%" class="text-center text-nowrap"><?= $lang->line('qty').'/'.$lang->line('roomprice') ?></th>
									<th width="10%" class="text-center text-nowrap"><?= $lang->line('money').'/'.$lang->line('money_us') ?></th>
									<th width="30%" class="text-center text-nowrap"><?= $lang->line('desc') ?></th>
								</tr> 
							</thead>
							<tbody>
<?php if(count($ary_PickFee) > 0): ?>
<?php foreach ($ary_PickFee as $item): ?>
								<tr id="<?= 'addr_PickFee'.($item['row'] - 1) ?>">
									<td>
										<?= ($item['row']) ?>
										<input type='hidden' name='row_PickFee[]' value='<?= ($item['row']) ?>'>
									</td>
									<td>
										<div class='input-group date' id='datetimepicker2'>
											<input type="text" class="form-control" name="date_PickFee[]" value='<?= ($item['date']) ?>' pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" required readonly>
	<?php if (date("Y-m-d") < $info['date_dep']): ?>										
											<span class="input-group-addon">
												<span class="glyphicon glyphicon-calendar"></span>
											</span>
	<?php endif; ?>
										</div>
									</td>
	<?php if (date("Y-m-d") >= $info['date_dep']): ?>									
									<td>
										<input type="text" name='item_PickFee[]' value='<?= ($item['item']) ?>' class="form-control" readonly/>
										<?= form_dropdown('site_PickFee[]',$ary_site_pickfee,$item['site'], 'class="form-control" row="'.$item['row'].'" disabled="disabled"'); ?>
									</td>
									<td>
										<textarea name='detail_PickFee[]' class='form-control' readonly><?= $item['detail']?></textarea>
									</td>
									<td>
										<input type="text" name='qty_PickFee[]' value='<?= ($item['qty']) ?>' class="form-control" pattern="[0-9]+" readonly/>
										<input type="text" name='price_PickFee[]' value='<?= ($item['price']) ?>' class="form-control" pattern="[0-9]+(\.){0,1}[0-9]{0,4}" readonly/>
									</td>
									<td>
										<input type="text" name='money_PickFee[]' value='<?= ($item['money']) ?>' class="form-control" pattern="[0-9]+" readonly/>
										<input type="text" name='money_en_PickFee[]' value='<?= ($item['money_en']) ?>' class="form-control" pattern="[0-9]+(\.){0,1}[0-9]{0,4}" readonly/>
									</td>
									<td>
										<textarea name='descr_PickFee[]' class='form-control' readonly><?= $item['descr']?></textarea>
									</td>
	<?php else: ?>
									<td>
										<input type="text" name='item_PickFee[]' value='<?= ($item['item']) ?>' class="form-control"/>
										<?= form_dropdown('site_PickFee[]',$ary_site_pickfee,$item['site'], 'class="form-control" row="'.$item['row'].'"'); ?>
									</td>
									<td>
										<textarea name='detail_PickFee[]' class='form-control'><?= $item['detail']?></textarea>
									</td>
									<td>
										<input type="text" name='qty_PickFee[]' value='<?= ($item['qty']) ?>' class="form-control" pattern="[0-9]+"/>
										<input type="text" name='price_PickFee[]' value='<?= ($item['price']) ?>' class="form-control" pattern="[0-9]+(\.){0,1}[0-9]{0,4}"/>
									</td>
									<td>
										<input type="text" name='money_PickFee[]' value='<?= ($item['money']) ?>' class="form-control" pattern="[0-9]+"/>
										<input type="text" name='money_en_PickFee[]' value='<?= ($item['money_en']) ?>' class="form-control" pattern="[0-9]+(\.){0,1}[0-9]{0,4}"/>
									</td>
									<td>
										<textarea name='descr_PickFee[]' class='form-control'><?= $item['descr']?></textarea>
									</td>
	<?php endif; ?>									
								</tr>
<?php endforeach;?>
								<tr id='<?php echo 'addr_PickFee'.count($ary_PickFee) ?>'></tr>
<?php else: ?>
								<tr id='addr_PickFee0'>
									<td>
										1
										<input type='hidden' name='row_PickFee[]' value='1'>
									</td>
									<td>
										<div class='input-group date' id='datetimepicker2'>
											<input type="text" class="form-control" name="date_PickFee[]" value='' pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" required readonly>
											<span class="input-group-addon">
												<span class="glyphicon glyphicon-calendar"></span>
											</span>
										</div>
									</td>
									<td>
										<input type="text" name='item_PickFee[]' class="form-control" />
										<?= form_dropdown('site_PickFee[]', $ary_site_pickfee, '', 'class="form-control" row="1" '); ?>
									</td>
									<td>
										<textarea name='detail_PickFee[]' class='form-control'></textarea>
									</td>
									<td>
										<input type="text" name='qty_PickFee[]' class="form-control" pattern="[0-9]+"/>
										<input type="text" name='price_PickFee[]' class="form-control" pattern="[0-9]+(\.){0,1}[0-9]{0,4}"/>
									</td>
									<td>
										<input type="text" name='money_PickFee[]' class="form-control" pattern="[0-9]+"/>
										<input type="text" name='money_en_PickFee[]' class="form-control" pattern="[0-9]+(\.){0,1}[0-9]{0,4}"/>
									</td>
									<td>
										<textarea name='descr_PickFee[]' class='form-control'></textarea>
									</td>
								</tr>
								<tr id='addr_PickFee1'></tr>
<?php endif; ?>
							</tbody>
						</table>
<?php if (strval($id) != '0'): ?>						
	<?php if (date("Y-m-d") < $info['date_dep']): ?>
						<a class="add_row btn btn-warning pull-left" prefix='PickFee'><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
						<a class="delete_row pull-right btn btn-danger" prefix='PickFee'><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></a>
	<?php endif; ?>
<?php else: ?>
						<a class="add_row btn btn-warning pull-left" prefix='PickFee'><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
						<a class="delete_row pull-right btn btn-danger" prefix='PickFee'><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></a>
<?php endif; ?>						
						<div class='row mb20' ps='for_add_del_button'>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('desc') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
	<?php if (date("Y-m-d") >= $info['date_dep']): ?>
							<input type="text" class="form-control" name="txt_fee_descr" value='<?= $info['fee_descr']?>' readonly>
	<?php else: ?>
							<input type="text" class="form-control" name="txt_fee_descr" value='<?= $info['fee_descr']?>'>
	<?php endif; ?>						
<?php else: ?>
							<input type="text" class="form-control" name="txt_fee_descr" value=''>
<?php endif; ?>	
						</div>
					</div>
					<div class="col-sm-6">
					</div>
				</div>
			</div>
			<!-- tab 5 -->
			<div role="tabpanel" class="tab-pane" id="real_pick">
				<div class="form-group">
					<div class="col-sm-12">
						<label for="tab_exp" class='form-label'> <?= $lang->line('real_pick_delegate') ?></label><br />
						<table id='tblmain2' class="table table-bordered table-hover table-responsive">
						</table>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<label for="tab_PickArr_r" class='form-label'> <?= $lang->line('1-1-5') ?></label><br />
						<table class="table table-bordered table-hover table-responsive" id="tab_PickArr_r">
							<thead>
								<tr >
									<th class="text-center">#</th>
									<th class="text-center text-nowrap"><?= $lang->line('hire_type') ?></th>
									<th class="text-center text-nowrap"><?= $lang->line('date') ?></th>
									<th class="text-center text-nowrap"><?= $lang->line('contact_id') ?></th>
									<th class="text-center text-nowrap"><?= $lang->line('dep_id') ?></th>
									<th class="text-center text-nowrap"><?= $lang->line('dep_time').'/'.$lang->line('depspot') ?></th>
									<th class="text-center text-nowrap"><?= $lang->line('arr_time').'/'.$lang->line('arrspot') ?></th>
								</tr>
							</thead>
							<tbody>
<?php if(count($ary_PickArr_r) > 0): ?>
<?php foreach ($ary_PickArr_r as $item): ?>
								<tr id="<?= 'addr_PickArr_r'.($item['row'] - 1) ?>">
									<td>
										<?= ($item['row']) ?>
										<input type='hidden' name='row_PickArr_r[]' value='<?= ($item['row']) ?>'>
									</td>
									<td>
										<?= form_dropdown('type_PickArr_r[]',$ary_type_pickarr,$item['type'], 'class="form-control" ');?>
									</td>
									<td>
										<div class='input-group date' id='datetimepicker'>
											<input type="text" class="form-control" name="date_PickArr_r[]" value='<?= ($item['date']) ?>' pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" required readonly>
											<span class="input-group-addon">
												<span class="glyphicon glyphicon-calendar"></span>
											</span>
										</div>
									</td>
									<td>
										<input type="hidden" name='client_emp_id_PickArr_r[]' value='<?= ($item['client_emp_id']) ?>' class="form-control" row="<?= ($item['row']) ?>" />
										<?= form_dropdown('contact_id_from_PickArr_r[]',$ary_contact_id_from,$item['contact_id_from'], 'class="form-control" row="'.$item['row'].'"');?>
										<div class="input-group">
	<?php if (strval($item['contact_id']) != '-1'): ?>
											<?= form_dropdown('contact_id_PickArr_r[]',($item['name_tw']==''?array($item['contact_id'] => $item['c_name_tw']):array($item['contact_id'] => $item['name_tw'])), $item['contact_id'], 'class="form-control" otype="contact_id_ar" row="'.$item['row'].'"' ); ?>
	<?php else: ?>
											<?= form_dropdown('contact_id_PickArr_r[]', array('-1'=>'未選取'), 0, 'class="form-control" otype="contact_id_ar" row="'.$item['row'].'"'); ?>
	<?php endif; ?>
											<div class="input-group-btn">
												<button ftype='contact_id_ar' row='<?= ($item['row']) ?>' class="fsearch btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Search...</button>
											</div>
										</div>
									</td>
									<td>
										<?= form_dropdown('dep_id_PickArr_r[]',$ary_dep_id,$item['dep_id'], 'class="form-control" row="'.$item['row'].'"'); ?>
									</td>
									<td>
										<input type="text" name='dep_time_PickArr_r[]' value='<?= ($item['dep_time_PickArr']) ?>' class="form-control" row="<?=$item['row']?>" readonly/>
									</td>
									<td>
										<input type="text" name='arr_time_PickArr_r[]' value='<?= ($item['arr_time_PickArr']) ?>' class="form-control" row="<?=$item['row']?>" readonly/>
									</td>
								</tr>
<?php endforeach;?>
								<tr id='<?php echo 'addr_PickArr_r'.count($ary_PickArr_r) ?>'></tr>
<?php else: ?>
								<tr id='addr_PickArr_r0'>
									<td>
										1
										<input type='hidden' name='row_PickArr_r[]' value='1'>
									</td>
									<td>
										<?= form_dropdown('type_PickArr_r[]', $ary_type_pickarr, '', 'class="form-control" '); ?>
									</td>
									<td>
										<div class='input-group date' id='datetimepicker'>
											<input type="text" class="form-control" name="date_PickArr_r[]" value='' pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" required readonly>
											<span class="input-group-addon">
												<span class="glyphicon glyphicon-calendar"></span>
											</span>
										</div>
									</td>
									<td>
										<input type="hidden" name='client_emp_id_PickArr_r[]' class="form-control" row="1"/>
										<?= form_dropdown('contact_id_from_PickArr_r[]', $ary_contact_id_from, '', 'class="form-control" row="1" '); ?>
										<div class="input-group">										
											<?= form_dropdown('contact_id_PickArr_r[]', array('-1'=>'未選取'), 0, 'class="form-control" otype="contact_id_ar" row="1" '); ?>
											<div class="input-group-btn">
												<button ftype='contact_id_ar' row='1' class="fsearch btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Search...</button>
											</div>
										</div>
									</td>
									<td>
										<?= form_dropdown('dep_id_PickArr_r[]', $ary_dep_id, '', 'class="form-control" row="1" '); ?>
									</td>
									<td>
										<input type="text" name='dep_time_PickArr_r[]' value="<?= $ary_numbersel_defult[2].' / '.$ary_numbersel_defult[4]?>"  class="form-control" row="1" readonly/>
									</td>
									<td>
										<input type="text" name='arr_time_PickArr_r[]' value="<?= $ary_numbersel_defult[3].' / '.$ary_numbersel_defult[5]?>" class="form-control" row="1" readonly/>
									</td>
								</tr>
								<tr id='addr_PickArr_r1'></tr>
<?php endif; ?>
							</tbody>
						</table>
						<a class="add_row btn btn-warning pull-left" prefix='PickArr_r'><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
						<a class="delete_row pull-right btn btn-danger" prefix='PickArr_r'><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></a>
						<div class='row mb20' ps='for_add_del_button'>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<label for="tab_PickHotel_r" class='form-label'> <?= $lang->line('1-1-6') ?></label><br />
						<table class="table table-bordered table-hover table-responsive" id="tab_PickHotel_r">
							<thead>
								<tr >
									<th class="text-center" >#</th>
									<th class="text-center text-nowrap" width="15%"><?= $lang->line('date') ?></th>
									<th class="text-center text-nowrap" width="20%"><?= $lang->line('contact_id').'/'.$lang->line('need') ?></th>
									<th class="text-center text-nowrap"><?= $lang->line('hotelname').'/'.$lang->line('1-1-7') ?></th>
									<th class="text-center text-nowrap" width="25%"><?= $lang->line('hotelnameen').'/'.$lang->line('url') ?></th>
									<th class="text-center text-nowrap" width="25%"><?= $lang->line('phone').'/'.$lang->line('tw_address') ?></th>
								</tr>
							</thead>
							<tbody>
<?php if(count($ary_PickHotel_r) > 0): ?>
<?php foreach ($ary_PickHotel_r as $item): ?>
								<tr id="<?= 'addr_PickHotel_r'.($item['row'] - 1) ?>">
									<td>
										<?= ($item['row']) ?>
										<input type='hidden' name='row_PickHotel_r[]' value='<?= ($item['row']) ?>'>
									</td>
									<td>
										<div class='input-group date' id='datetimepicker'>
											<input type="text" class="form-control" name="date_PickHotel_r[]" value='<?= ($item['date']) ?>' pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" required readonly>
											<span class="input-group-addon">
												<span class="glyphicon glyphicon-calendar"></span>
											</span>
										</div>
									</td>
									<td>
										<input type="hidden" name='client_emp_id_PickHotel_r[]' value='<?= ($item['client_emp_id']) ?>' class="form-control" row="<?= ($item['row']) ?>" />
										<?= form_dropdown('contact_id_from_PickHotel_r[]',$ary_contact_id_from,$item['contact_id_from'], 'class="form-control" row="'.$item['row'].'"');?>
										<div class="input-group">
	<?php if (strval($item['contact_id']) != '-1'): ?>
											<?= form_dropdown('contact_id_PickHotel_r[]',($item['name_tw']==''?array($item['contact_id'] => $item['c_name_tw']):array($item['contact_id'] => $item['name_tw'])), $item['contact_id'], 'class="form-control" otype="contact_id_r" row="'.$item['row'].'"' ); ?>
	<?php else: ?>
											<?= form_dropdown('contact_id_PickHotel_r[]', array('-1'=>'未選取'), 0, 'class="form-control" otype="contact_id_r" row="'.$item['row'].'"'); ?>
	<?php endif; ?>
											<div class="input-group-btn">
												<button ftype='contact_id_r' row='<?= ($item['row']) ?>' class="fsearch btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Search...</button>
											</div>
										</div>
										<input type="text" name='need_PickHotel_r[]' value='<?= ($item['need']) ?>' class="form-control" />
									</td>
									<td>
										<?= form_dropdown('hotel_id_PickHotel_r[]',$ary_hotel_id,$item['hotel_id'], 'class="form-control" row="'.$item['row'].'"'); ?>
										<?= $item['room_id_PickHotel']?>
									</td>
									<td>
										<input type="text" name='en_PickHotel_r[]' value='<?= ($item['en_PickHotel']) ?>' class="form-control" row="<?=$item['row']?>" readonly/>
										<input type="text" name='site_PickHotel_r[]' value='<?= ($item['site_PickHotel']) ?>' class="form-control" row="<?=$item['row']?>" readonly/>
									</td>
									<td>
										<input type="text" name='phone_PickHotel_r[]' value='<?= ($item['phone_PickHotel']) ?>' class="form-control" row="<?=$item['row']?>" readonly/>
										<input type="text" name='address_PickHotel_r[]' value='<?= ($item['address_PickHotel']) ?>' class="form-control" row="<?=$item['row']?>" readonly/>
									</td>
								</tr>
<?php endforeach;?>
								<tr id='<?php echo 'addr_PickHotel_r'.count($ary_PickHotel_r) ?>'></tr>
<?php else: ?>
								<tr id='addr_PickHotel_r0'>
									<td>
										1
										<input type='hidden' name='row_PickHotel_r[]' value='1'>
									</td>
									<td>
										<div class='input-group date' id='datetimepicker'>
											<input type="text" class="form-control" name="date_PickHotel_r[]" value='' pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" required readonly>
											<span class="input-group-addon">
												<span class="glyphicon glyphicon-calendar"></span>
											</span>
										</div>
									</td>
									<td>
										<input type="hidden" name='client_emp_id_PickHotel_r[]' class="form-control" row="1"/>
										<?= form_dropdown('contact_id_from_PickHotel_r[]', $ary_contact_id_from, '', 'class="form-control" row="1" '); ?>
										<div class="input-group">										
											<?= form_dropdown('contact_id_PickHotel_r[]', array('-1'=>'未選取'), 0, 'class="form-control" otype="contact_id_r" row="1" '); ?>
											<div class="input-group-btn">
												<button ftype='contact_id_r' row='1' class="fsearch btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Search...</button>
											</div>
										</div>
										<input type="text" name='need_PickHotel_r[]' class="form-control"/>
									</td>
									<td>
										<?= form_dropdown('hotel_id_PickHotel_r[]', $ary_hotel_id, '', 'class="form-control" row="1" '); ?>
										<?= form_dropdown('room_id_PickHotel_r[]', $ary_room_id, '', 'class="form-control" row="1" '); ?>
									</td>
									<td>
										<input type="text" name='en_PickHotel_r[]' value='<?= $ary_hotelsel_defult[2] ?>' class="form-control" row="1" readonly/>
										<input type="text" name='site_PickHotel_r[]' value='<?= $ary_hotelsel_defult[3] ?>' class="form-control" row="1" readonly/>
									</td>
									<td>
										<input type="text" name='phone_PickHotel_r[]' value='<?= $ary_hotelsel_defult[4] ?>' class="form-control" row="1" readonly/>
										<input type="text" name='address_PickHotel_r[]' value='<?= $ary_hotelsel_defult[5] ?>' class="form-control" row="1" readonly/>
									</td>
								</tr>
								<tr id='addr_PickHotel_r1'></tr>
<?php endif; ?>
							</tbody>
						</table>
						<a class="add_row btn btn-warning pull-left" prefix='PickHotel_r'><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
						<a class="delete_row pull-right btn btn-danger" prefix='PickHotel_r'><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></a>
						<div class='row mb20' ps='for_add_del_button'>
						</div>
					</div>
				</div>
			</div>
			<!-- tab 6 -->
			<div role="tabpanel" class="tab-pane" id="real_stroke">
				<div class="form-group">
					<div class="col-sm-12">
						<table class="table table-bordered table-hover table-responsive" id="tab_PickStroke_r">
							<thead>
								<tr >
									<th class="text-center">#</th>
									<th class="text-center text-nowrap" width="20%"><?= $lang->line('date') ?></th>
									<th class="text-center text-nowrap" width="20%"><?= $lang->line('time') ?></th>
									<th class="text-center text-nowrap"><?= $lang->line('item') ?></th>
									<th class="text-center text-nowrap"><?= $lang->line('desc') ?></th>
								</tr>
							</thead>
							<tbody>
<?php if(count($ary_PickStroke_r) > 0): ?>
<?php foreach ($ary_PickStroke_r as $item): ?>
								<tr id="<?= 'addr_PickStroke_r'.($item['row'] - 1) ?>">
									<td>
										<?= ($item['row']) ?>
										<input type='hidden' name='row_PickStroke_r[]' value='<?= ($item['row']) ?>'>
									</td>
									<td>
										<div class='input-group date' id='datetimepicker'>
											<input type="text" class="form-control" name="date_PickStroke_r[]" value='<?= ($item['date']) ?>' pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" required readonly>
											<span class="input-group-addon">
												<span class="glyphicon glyphicon-calendar"></span>
											</span>
										</div>
									</td>
									<td>
										<input type="text" name='time_PickStroke_r[]' value='<?= ($item['time']) ?>' class="form-control" placeholder='00:00~00:00' pattern="[0-9]{2}:[0-9]{2}~[0-9]{2}:[0-9]{2}" required />
									</td>
									<td>
										<input type="text" name='item_PickStroke_r[]' value='<?= ($item['item']) ?>' class="form-control"/>
									</td>
									<td>
										<input type="text" name='descr_PickStroke_r[]' value='<?= ($item['descr']) ?>' class="form-control"/>
									</td>
								</tr>
<?php endforeach;?>
								<tr id='<?php echo 'addr_PickStroke_r'.count($ary_PickStroke_r) ?>'></tr>
<?php else: ?>
								<tr id='addr_PickStroke_r0'>
									<td>
										1
										<input type='hidden' name='row_PickStroke_r[]' value='1'>
									</td>
									<td>
										<div class='input-group date' id='datetimepicker'>
											<input type="text" class="form-control" name="date_PickStroke_r[]" value='' pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" required readonly>
											<span class="input-group-addon">
												<span class="glyphicon glyphicon-calendar"></span>
											</span>
										</div>
									</td>
									<td>
										<input type="text" name='time_PickStroke_r[]' class="form-control" placeholder='00:00~00:00' pattern="[0-9]{2}:[0-9]{2}~[0-9]{2}:[0-9]{2}" />
									</td>
									<td>
										<input type="text" name='item_PickStroke_r[]' class="form-control" />
									</td>
									<td>
										<input type="text" name='descr_PickStroke_r[]' class="form-control" />
									</td>
								</tr>
								<tr id='addr_PickStroke_r1'></tr>
<?php endif; ?>
							</tbody>
						</table>
						<a class="add_row btn btn-warning pull-left" prefix='PickStroke_r'><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
						<a class="delete_row pull-right btn btn-danger" prefix='PickStroke_r'><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></a>					
						<div class='row mb20' ps='for_add_del_button'>
						</div>
					</div>
				</div>
			</div>
			<!-- tab 7 -->
			<div role="tabpanel" class="tab-pane" id="real_pick_fee">
				<div class="form-group">
					<div class="col-sm-12">
						<table class="table table-bordered table-hover table-responsive" id="tab_PickFee_r">
							<thead>
								<tr >
									<th class="text-center">#</th>
									<th class="text-center text-nowrap"><?= $lang->line('date') ?></th>
									<th class="text-center text-nowrap"><?= $lang->line('pay_item').'/'.$lang->line('oversea_client') ?></th>
									<th class="text-center text-nowrap"><?= $lang->line('detail') ?></th>
									<th class="text-center text-nowrap"><?= $lang->line('qty').'/'.$lang->line('roomprice') ?></th>
									<th class="text-center text-nowrap"><?= $lang->line('money').'/'.$lang->line('money_us') ?></th>
									<th class="text-center text-nowrap"><?= $lang->line('desc') ?></th>
								</tr>
							</thead>
							<tbody>
<?php if(count($ary_PickFee_r) > 0): ?>
<?php foreach ($ary_PickFee_r as $item): ?>
								<tr id="<?= 'addr_PickFee_r'.($item['row'] - 1) ?>">
									<td>
										<?= ($item['row']) ?>
										<input type='hidden' name='row_PickFee_r[]' value='<?= ($item['row']) ?>'>
									</td>
									<td>
										<div class='input-group date' id='datetimepicker'>
											<input type="text" class="form-control" name="date_PickFee_r[]" value='<?= ($item['date']) ?>' pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" required readonly>
											<span class="input-group-addon">
												<span class="glyphicon glyphicon-calendar"></span>
											</span>
										</div>
									</td>
									<td>
										<input type="text" name='item_PickFee_r[]' value='<?= ($item['item']) ?>' class="form-control"/>
										<?= form_dropdown('site_PickFee_r[]',$ary_site_pickfee,$item['site'], 'class="form-control" row="'.$item['row'].'"'); ?>
									</td>
									<td>
										<textarea name='detail_PickFee_r[]' class='form-control'><?= $item['detail']?></textarea>
									</td>
									<td>
										<input type="text" name='qty_PickFee_r[]' value='<?= ($item['qty']) ?>' class="form-control" pattern="[0-9]+"/>
										<input type="text" name='price_PickFee_r[]' value='<?= ($item['price']) ?>' class="form-control" pattern="[0-9]+(\.){0,1}[0-9]{0,4}"/>
									</td>
									<td>
										<input type="text" name='money_PickFee_r[]' value='<?= ($item['money']) ?>' class="form-control" pattern="[0-9]+"/>
										<input type="text" name='money_en_PickFee_r[]' value='<?= ($item['money_en']) ?>' class="form-control" pattern="[0-9]+(\.){0,1}[0-9]{0,4}"/>
									</td>
									<td>
										<textarea name='descr_PickFee_r[]' class='form-control'><?= $item['descr']?></textarea>
									</td>
								</tr>
<?php endforeach;?>
								<tr id='<?php echo 'addr_PickFee_r'.count($ary_PickFee_r) ?>'></tr>
<?php else: ?>
								<tr id='addr_PickFee_r0'>
									<td>
										1
										<input type='hidden' name='row_PickFee_r[]' value='1'>
									</td>
									<td>
										<div class='input-group date' id='datetimepicker'>
											<input type="text" class="form-control" name="date_PickFee_r[]" value='' pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" required readonly>
											<span class="input-group-addon">
												<span class="glyphicon glyphicon-calendar"></span>
											</span>
										</div>
									</td>
									<td>
										<input type="text" name='item_PickFee_r[]' class="form-control" />
										<?= form_dropdown('site_PickFee_r[]', $ary_site_pickfee, '', 'class="form-control" row="1" '); ?>
									</td>
									<td>
										<textarea name='detail_PickFee_r[]' class='form-control'></textarea>
									</td>
									<td>
										<input type="text" name='qty_PickFee_r[]' class="form-control" pattern="[0-9]+"/>
										<input type="text" name='price_PickFee_r[]' class="form-control" pattern="[0-9]+(\.){0,1}[0-9]{0,4}"/>
									</td>
									<td>
										<input type="text" name='money_PickFee_r[]' class="form-control" pattern="[0-9]+"/>
										<input type="text" name='money_en_PickFee_r[]' class="form-control" pattern="[0-9]+(\.){0,1}[0-9]{0,4}"/>
									</td>
									<td>
										<textarea name='descr_PickFee_r[]' class='form-control'></textarea>
									</td>
								</tr>
								<tr id='addr_PickFee_r1'></tr>
<?php endif; ?>
							</tbody>
						</table>
						<a class="add_row btn btn-warning pull-left" prefix='PickFee_r'><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
						<a class="delete_row pull-right btn btn-danger" prefix='PickFee_r'><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></a>					
						<div class='row mb20' ps='for_add_del_button'>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<label class="control-label"><?= $lang->line('desc') ?></label>
						<div>
<?php if (strval($id) != '0'): ?>
							<input type="text" class="form-control" name="txt_fee_descr2" value='<?= $info['fee_descr2']?>'>					
<?php else: ?>
							<input type="text" class="form-control" name="txt_fee_descr2" value=''>
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
	var i_PickLocalman = $("#tab_PickLocalman" + " tr").length - 2;
	var i_PickArr = $("#tab_PickArr" + " tr").length -2 ;
	var i_PickHotel = $("#tab_PickHotel" + " tr").length -2 ;
	var i_pickContact = $("#tab_pickContact" + " tr").length -2 ;
	var i_PickStroke = $("#tab_PickStroke" + " tr").length -2 ;
	var i_PickFee = $("#tab_PickFee" + " tr").length -2 ;
	var i_PickArr_r = $("#tab_PickArr_r" + " tr").length -2 ;
	var i_PickHotel_r = $("#tab_PickHotel_r" + " tr").length -2 ;
	var i_PickFee_r = $("#tab_PickFee_r" + " tr").length -2 ;
	var i_PickStroke_r = $("#tab_PickStroke_r" + " tr").length -2 ;
	 
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
		if($(this).attr('ftype')=='contact_id_ar'){
			$('#span_modal_title').html('contact_id');
		}else if($(this).attr('ftype')=='contact_id_arr'){
			$('#span_modal_title').html('contact_id');
		}else if($(this).attr('ftype')=='contact_id_r'){
			$('#span_modal_title').html('contact_id');
		}
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
		
		var tmp ='';
		if($('#hid_ftype').val()=='contact_id'){
			tmp = $("select[name='contact_id_from_PickHotel[]'][row="+ $('#hid_frow').val() + "]").val()
		}else if($('#hid_ftype').val()=='contact_id_r'){
			tmp = $("select[name='contact_id_from_PickHotel_r[]'][row="+ $('#hid_frow').val() + "]").val()
		}else if($('#hid_ftype').val()=='contact_id_arr'){
			tmp = $("select[name='contact_id_from_PickArr[]'][row="+ $('#hid_frow').val() + "]").val()
		}else if($('#hid_ftype').val()=='contact_id_ar'){
			tmp = $("select[name='contact_id_from_PickArr_r[]'][row="+ $('#hid_frow').val() + "]").val()
		}
		$.ajax({
			async: false,
			type: "POST",
			url: $('#hid_baseurl').val() + 'bos/apiSearch/' + tmp,
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
		if($('#hid_ftype').val() =='contact_id'){
			$.ajax({
				type: "POST",
				url: $('#hid_baseurl').val() + 'bos/apiGetPickbyClientEmpId/' + $('#sel_search').val()+'/'+$("select[name='contact_id_from_PickHotel[]'][row="+ $('#hid_frow').val() + "]").val(),
				data: '',
				dataType: 'json',
				statusCode: {
					200: function(e) {
						$("input[name='client_emp_id_PickHotel[]'][row="+ $('#hid_frow').val() + "]").val(e[0]);
					}
				},
				error: function() {
				}
			});
		}else if($('#hid_ftype').val() =='contact_id_r'){
			$.ajax({
				type: "POST",
				url: $('#hid_baseurl').val() + 'bos/apiGetPickbyClientEmpId/' + $('#sel_search').val()+'/'+$("select[name='contact_id_from_PickHotel_r[]'][row="+ $('#hid_frow').val() + "]").val(),
				data: '',
				dataType: 'json',
				statusCode: {
					200: function(e) {
						$("input[name='client_emp_id_PickHotel_r[]'][row="+ $('#hid_frow').val() + "]").val(e);
					}
				},
				error: function() {
				}
			});
		}else if($('#hid_ftype').val() =='contact_id_arr'){
			$.ajax({
				type: "POST",
				url: $('#hid_baseurl').val() + 'bos/apiGetPickbyClientEmpId/' + $('#sel_search').val()+'/'+$("select[name='contact_id_from_PickArr[]'][row="+ $('#hid_frow').val() + "]").val(),
				data: '',
				dataType: 'json',
				statusCode: {
					200: function(e) {
						$("input[name='client_emp_id_PickArr[]'][row="+ $('#hid_frow').val() + "]").val(e[0]);
					}
				},
				error: function() {
				}
			});

		}else if($('#hid_ftype').val() =='contact_id_ar'){
			$.ajax({
				type: "POST",
				url: $('#hid_baseurl').val() + 'bos/apiGetPickbyClientEmpId/' + $('#sel_search').val()+'/'+$("select[name='contact_id_from_PickArr_r[]'][row="+ $('#hid_frow').val() + "]").val(),
				data: '',
				dataType: 'json',
				statusCode: {
					200: function(e) {
						$("input[name='client_emp_id_PickArr_r[]'][row="+ $('#hid_frow').val() + "]").val(e);
					}
				},
				error: function() {
				}
			});
		} else if($('#hid_ftype').val() =='contact_id_con') {
			$.ajax({
				type: "POST",
				url: $('#hid_baseurl').val() + 'bos/apiGetPickbyClientEmpId/' + $('#sel_search').val()+'/'+$("select[name='email_pickContact[]'][row="+ $('#hid_frow').val() + "]").val(),
				data: '',
				dataType: 'json',
				statusCode: {
					200: function(e) {
						$("input[name='email_pickContact[]'][row="+ $('#hid_frow').val() + "]").val(e[1]);
					}
				},
				error: function() {
				}
			});
		}


		$(".modal").modal('hide');
	});

	//重設預設
	$("select[name='contact_id_from_PickArr[]']").each(function(){
		$(this).bind("change",function(){
			$('#hid_frow').val($(this).attr('row'));
			$("select[name='contact_id_PickArr[]'][row="+ $('#hid_frow').val() + "] option").remove();
			$("select[name='contact_id_PickArr[]'][row="+ $('#hid_frow').val() + "]").append($("<option></option>").attr("value", -1).text('未選取'));
			$("input[name='client_emp_id_PickArr[]'][row="+ $('#hid_frow').val() + "]").val('');
		});
	});
	$("select[name='contact_id_from_PickArr_r[]']").each(function(){
		$(this).bind("change",function(){
			$('#hid_frow').val($(this).attr('row'));
			$("select[name='contact_id_PickArr_r[]'][row="+ $('#hid_frow').val() + "] option").remove();
			$("select[name='contact_id_PickArr_r[]'][row="+ $('#hid_frow').val() + "]").append($("<option></option>").attr("value", -1).text('未選取'));
			$("input[name='client_emp_id_PickArr_r[]'][row="+ $('#hid_frow').val() + "]").val('');
		});
	});
	$("select[name='contact_id_from_PickHotel[]']").each(function(){
		$(this).bind("change",function(){
			$('#hid_frow').val($(this).attr('row'));
			$("select[name='contact_id_PickHotel[]'][row="+ $('#hid_frow').val() + "] option").remove();
			$("select[name='contact_id_PickHotel[]'][row="+ $('#hid_frow').val() + "]").append($("<option></option>").attr("value", -1).text('未選取'));
			$("input[name='client_emp_id_PickHotel[]'][row="+ $('#hid_frow').val() + "]").val('');
		});
	});
	$("select[name='contact_id_from_PickHotel_r[]']").each(function(){
		$(this).bind("change",function(){
			$('#hid_frow').val($(this).attr('row'));
			$("select[name='contact_id_PickHotel_r[]'][row="+ $('#hid_frow').val() + "] option").remove();
			$("select[name='contact_id_PickHotel_r[]'][row="+ $('#hid_frow').val() + "]").append($("<option></option>").attr("value", -1).text('未選取'));
			$("input[name='client_emp_id_PickHotel_r[]'][row="+ $('#hid_frow').val() + "]").val('');
		});
	});

	$("select[name=sel_hire_id]").each(function() {
		$(this).bind("change",function(){
			var obj_this = $(this);

			$.ajax({
				type: "POST",
				url: $('#hid_baseurl').val() + 'bos/apiGetQuoteHireIdSel/' + $(this).val(),
				data: '',
				dataType: 'json',
				statusCode: {
					200: function(e) {
						$('#div_country_id').html(e[1]);
						$('#div_client_id').html(e[2]);
						$('#div_employer_id').html(e[3]);
					}
				},
				error: function() {
				}
			});
		});
	});

	//create預帶值
	<?php if (strval($id) != '0'): ?>
	<?php else: ?>
		$.ajax({
			type: "POST",
			url: $('#hid_baseurl').val() + 'bos/apiGetPickdepIdSel/' + $("select[name='dep_id_PickArr[]']").val(),
			data: '',
			dataType: 'json',
			statusCode: {
				200: function(e) {
					$("input[name='dep_time_PickArr[]'][row='1']").val(e[2]+' / '+e[4]);
					$("input[name='arr_time_PickArr[]'][row='1']").val(e[3]+' / '+e[5]);
				}
			},
			error: function() {
			}
		});
		$.ajax({
			type: "POST",
			url: $('#hid_baseurl').val() + 'bos/apiGetPickhotelIdSel/' + $("select[name='hotel_id_PickHotel[]']").val(),
			data: '',
			dataType: 'json',
			statusCode: {
				200: function(e) {
					$("input[name='en_PickHotel[]'][row='1']").val(e[2]);
					$("input[name='site_PickHotel[]'][row='1']").val(e[3]);
					$("input[name='phone_PickHotel[]'][row='1']").val(e[4]);
					$("input[name='address_PickHotel[]'][row='1']").val(e[5]);
					$("select[name='room_id_PickHotel[]'][row='1']").html(e[6]);
				}
			},
			error: function() {
			}
		});
	<?php endif; ?>

	$("select[name='dep_id_PickArr[]']").each(function() {
		//重bind要先unbind
		$(this).unbind("change");
		$(this).bind("change",function(){
			var obj_this = $(this);

			$.ajax({
				type: "POST",
				url: $('#hid_baseurl').val() + 'bos/apiGetPickdepIdSel/' + $(this).val(),
				data: '',
				dataType: 'json',
				statusCode: {
					200: function(e) {
						$("input[name='dep_time_PickArr[]'][row='" + obj_this.attr('row') + "']").val(e[2]+' / '+e[4]);
						$("input[name='arr_time_PickArr[]'][row='" + obj_this.attr('row') + "']").val(e[3]+' / '+e[5]);
					}
				},
				error: function() {
				}
			});
		});
	});

	$("select[name='dep_id_PickArr_r[]']").each(function() {
		//重bind要先unbind
		$(this).unbind("change");
		$(this).bind("change",function(){
			var obj_this = $(this);

			$.ajax({
				type: "POST",
				url: $('#hid_baseurl').val() + 'bos/apiGetPickdepIdSel/' + $(this).val(),
				data: '',
				dataType: 'json',
				statusCode: {
					200: function(e) {
						$("input[name='dep_time_PickArr_r[]'][row='" + obj_this.attr('row') + "']").val(e[2]+' / '+e[4]);
						$("input[name='arr_time_PickArr_r[]'][row='" + obj_this.attr('row') + "']").val(e[3]+' / '+e[5]);
					}
				},
				error: function() {
				}
			});
		});
	});

	$("select[name='hotel_id_PickHotel[]']").each(function() {
		//重bind要先unbind
		$(this).unbind("change");
		$(this).bind("change",function(){
			var obj_this = $(this);

			$.ajax({
				type: "POST",
				url: $('#hid_baseurl').val() + 'bos/apiGetPickhotelIdSel/' + $(this).val(),
				data: '',
				dataType: 'json',
				statusCode: {
					200: function(e) {
						$("input[name='en_PickHotel[]'][row='" + obj_this.attr('row') + "']").val(e[2]);
						$("input[name='site_PickHotel[]'][row='" + obj_this.attr('row') + "']").val(e[3]);
						$("input[name='phone_PickHotel[]'][row='" + obj_this.attr('row') + "']").val(e[4]);
						$("input[name='address_PickHotel[]'][row='" + obj_this.attr('row') + "']").val(e[5]);
						$("select[name='room_id_PickHotel[]'][row=" + obj_this.attr('row') + "]").html(e[6]);
					}
				},
				error: function() {
				}
			});
		});
	});

	$("select[name='hotel_id_PickHotel_r[]']").each(function() {
		//重bind要先unbind
		$(this).unbind("change");
		$(this).bind("change",function(){
			var obj_this = $(this);

			$.ajax({
				type: "POST",
				url: $('#hid_baseurl').val() + 'bos/apiGetPickhotelIdSel/' + $(this).val(),
				data: '',
				dataType: 'json',
				statusCode: {
					200: function(e) {
						$("input[name='en_PickHotel_r[]'][row='" + obj_this.attr('row') + "']").val(e[2]);
						$("input[name='site_PickHotel_r[]'][row='" + obj_this.attr('row') + "']").val(e[3]);
						$("input[name='phone_PickHotel_r[]'][row='" + obj_this.attr('row') + "']").val(e[4]);
						$("input[name='address_PickHotel_r[]'][row='" + obj_this.attr('row') + "']").val(e[5]);
						$("select[name='room_id_PickHotel_r[]'][row=" + obj_this.attr('row') + "]").html(e[6]);
					}
				},
				error: function() {
				}
			});
		});
	});
	
	$(".btn-cancel").bind("click",function(){
		window.location = '<?= base_url()?>bos/pick';
	});	
	$("#btn_save").bind("click",function(){
		if(!$("form")[0].checkValidity()) return;

		$.ajax({
			type: "POST",
			url: $('#hid_baseurl').val() + 'bos/pick_doEdit',
			data: $('#form1').serialize(),
			statusCode: {
				200: function() {
					window.location = '<?= base_url()?>bos/pick';
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
		$('#addr_' + prefix + i).children().children().children().attr('row',i + 1);	// replace attr:row
		$('#addr_' + prefix + i).children().children().children().children().attr('row',i + 1);	// replace attr:row
		$('#addr_' + prefix + i).children().first().html((i + 1) + "<input type='hidden' name='row_" + prefix + "[]' value='" + (i + 1) + "'>");	// replace #

		
		$("#tab_" + prefix + " input[row=" + (i + 1) + "]").each(function() {
			$(this).val('');
		});

		$("#tab_" + prefix + " textarea[row=" + (i + 1) + "]").each(function() {
			$(this).val('');
		});


		$('#tab_' + prefix).append('<tr id="addr_'+ prefix + (i+1)+'"></tr>');
		var str = tmp + " = " + eval(tmp) + "+1";
		eval(str);

		$("#tab_" + prefix + " select[row=" + (i + 1) + "]").each(function() {
			//insert一筆，預帶值
			if(($(this).attr('name') == 'dep_id_PickArr[]') && ($(this).attr('row') == (i + 1))){
				var obj_this = $(this);

				$.ajax({
					type: "POST",
					url: $('#hid_baseurl').val() + 'bos/apiGetPickdepIdSel/' + $(this).val(),
					data: '',
					dataType: 'json',
					statusCode: {
						200: function(e) {
							$("input[name='dep_time_PickArr[]'][row='" + obj_this.attr('row') + "']").val(e[2]+' / '+e[4]);
							$("input[name='arr_time_PickArr[]'][row='" + obj_this.attr('row') + "']").val(e[3]+' / '+e[5]);
						}
					},
					error: function() {
					}
				});
			}
			//insert一筆，預帶值
			if(($(this).attr('name') == 'dep_id_PickArr_r[]') && ($(this).attr('row') == (i + 1))){
				var obj_this = $(this);

				$.ajax({
					type: "POST",
					url: $('#hid_baseurl').val() + 'bos/apiGetPickdepIdSel/' + $(this).val(),
					data: '',
					dataType: 'json',
					statusCode: {
						200: function(e) {
							$("input[name='dep_time_PickArr_r[]'][row='" + obj_this.attr('row') + "']").val(e[2]+' / '+e[4]);
							$("input[name='arr_time_PickArr_r[]'][row='" + obj_this.attr('row') + "']").val(e[3]+' / '+e[5]);
						}
					},
					error: function() {
					}
				});
			}
			//insert一筆，預帶值
			if(($(this).attr('name') == 'hotel_id_PickHotel[]') && ($(this).attr('row') == (i + 1))){
				var obj_this = $(this);

				$.ajax({
					type: "POST",
					url: $('#hid_baseurl').val() + 'bos/apiGetPickhotelIdSel/' + $(this).val(),
					data: '',
					dataType: 'json',
					statusCode: {
						200: function(e) {
							$("input[name='en_PickHotel[]'][row='" + obj_this.attr('row') + "']").val(e[2]);
							$("input[name='site_PickHotel[]'][row='" + obj_this.attr('row') + "']").val(e[3]);
							$("input[name='phone_PickHotel[]'][row='" + obj_this.attr('row') + "']").val(e[4]);
							$("input[name='address_PickHotel[]'][row='" + obj_this.attr('row') + "']").val(e[5]);
							$("select[name='room_id_PickHotel[]'][row=" + obj_this.attr('row') + "]").html(e[6]);
						}
					},
					error: function() {
					}
				});
			}
			//insert一筆，預帶值
			if(($(this).attr('name') == 'hotel_id_PickHotel_r[]') && ($(this).attr('row') == (i + 1))){
				var obj_this = $(this);

				$.ajax({
					type: "POST",
					url: $('#hid_baseurl').val() + 'bos/apiGetPickhotelIdSel/' + $(this).val(),
					data: '',
					dataType: 'json',
					statusCode: {
						200: function(e) {
							$("input[name='en_PickHotel_r[]'][row='" + obj_this.attr('row') + "']").val(e[2]);
							$("input[name='site_PickHotel_r[]'][row='" + obj_this.attr('row') + "']").val(e[3]);
							$("input[name='phone_PickHotel_r[]'][row='" + obj_this.attr('row') + "']").val(e[4]);
							$("input[name='address_PickHotel_r[]'][row='" + obj_this.attr('row') + "']").val(e[5]);
							$("select[name='room_id_PickHotel_r[]'][row=" + obj_this.attr('row') + "]").html(e[6]);
						}
					},
					error: function() {
					}
				});
			}
			//insert一筆，預帶值
			if(($(this).attr('name') == 'contact_id_pickContact[]') && ($(this).attr('row') == (i + 1))){
				$(this).val('');
			}
		});
		
		//重設預設
		$("select[name='contact_id_from_PickArr[]']").each(function(){
			$(this).unbind("change");
			$(this).bind("change",function(){
				$('#hid_frow').val($(this).attr('row'));
				$("select[name='contact_id_PickArr[]'][row="+ $('#hid_frow').val() + "] option").remove();
				$("select[name='contact_id_PickArr[]'][row="+ $('#hid_frow').val() + "]").append($("<option></option>").attr("value", -1).text('未選取'));
				$("input[name='client_emp_id_PickArr[]'][row="+ $('#hid_frow').val() + "]").val('');
			});
		});
		$("select[name='contact_id_from_PickArr_r[]']").each(function(){
			$(this).unbind("change");
			$(this).bind("change",function(){
				$('#hid_frow').val($(this).attr('row'));
				$("select[name='contact_id_PickArr_r[]'][row="+ $('#hid_frow').val() + "] option").remove();
				$("select[name='contact_id_PickArr_r[]'][row="+ $('#hid_frow').val() + "]").append($("<option></option>").attr("value", -1).text('未選取'));
				$("input[name='client_emp_id_PickArr_r[]'][row="+ $('#hid_frow').val() + "]").val('');
			});
		});
		$("select[name='contact_id_from_PickHotel[]']").each(function(){
			$(this).unbind("change");
			$(this).bind("change",function(){
				$('#hid_frow').val($(this).attr('row'));
				$("select[name='contact_id_PickHotel[]'][row="+ $('#hid_frow').val() + "] option").remove();
				$("select[name='contact_id_PickHotel[]'][row="+ $('#hid_frow').val() + "]").append($("<option></option>").attr("value", -1).text('未選取'));
				$("input[name='client_emp_id_PickHotel[]'][row="+ $('#hid_frow').val() + "]").val('');
			});
		});
		$("select[name='contact_id_from_PickHotel_r[]']").each(function(){
			$(this).unbind("change");
			$(this).bind("change",function(){
				$('#hid_frow').val($(this).attr('row'));
				$("select[name='contact_id_PickHotel_r[]'][row="+ $('#hid_frow').val() + "] option").remove();
				$("select[name='contact_id_PickHotel_r[]'][row="+ $('#hid_frow').val() + "]").append($("<option></option>").attr("value", -1).text('未選取'));
				$("input[name='client_emp_id_PickHotel_r[]'][row="+ $('#hid_frow').val() + "]").val('');
			});
		});

		$("select[name='dep_id_PickArr[]']").each(function() {
		//重bind要先unbind
			$(this).unbind("change");
			$(this).bind("change",function(){
				var obj_this = $(this);

				$.ajax({
					type: "POST",
					url: $('#hid_baseurl').val() + 'bos/apiGetPickdepIdSel/' + $(this).val(),
					data: '',
					dataType: 'json',
					statusCode: {
						200: function(e) {
							$("input[name='dep_time_PickArr[]'][row='" + obj_this.attr('row') + "']").val(e[2]+' / '+e[4]);
							$("input[name='arr_time_PickArr[]'][row='" + obj_this.attr('row') + "']").val(e[3]+' / '+e[5]);
						}
					},
					error: function() {
					}
				});
			});
		});

		$("select[name='dep_id_PickArr_r[]']").each(function() {
		//重bind要先unbind
			$(this).unbind("change");
			$(this).bind("change",function(){
				var obj_this = $(this);

				$.ajax({
					type: "POST",
					url: $('#hid_baseurl').val() + 'bos/apiGetPickdepIdSel/' + $(this).val(),
					data: '',
					dataType: 'json',
					statusCode: {
						200: function(e) {
							$("input[name='dep_time_PickArr_r[]'][row='" + obj_this.attr('row') + "']").val(e[2]+' / '+e[4]);
							$("input[name='arr_time_PickArr_r[]'][row='" + obj_this.attr('row') + "']").val(e[3]+' / '+e[5]);
						}
					},
					error: function() {
					}
				});
			});
		});

		$("select[name='hotel_id_PickHotel[]']").each(function() {
			//重bind要先unbind
			$(this).unbind("change");
			$(this).bind("change",function(){
				var obj_this = $(this);

				$.ajax({
					type: "POST",
					url: $('#hid_baseurl').val() + 'bos/apiGetPickhotelIdSel/' + $(this).val(),
					data: '',
					dataType: 'json',
					statusCode: {
						200: function(e) {
							$("input[name='en_PickHotel[]'][row='" + obj_this.attr('row') + "']").val(e[2]);
							$("input[name='site_PickHotel[]'][row='" + obj_this.attr('row') + "']").val(e[3]);
							$("input[name='phone_PickHotel[]'][row='" + obj_this.attr('row') + "']").val(e[4]);
							$("input[name='address_PickHotel[]'][row='" + obj_this.attr('row') + "']").val(e[5]);
							$("select[name='room_id_PickHotel[]'][row=" + obj_this.attr('row') + "]").html(e[6]);
						}
					},
					error: function() {
					}
				});
			});
		});

		$("select[name='hotel_id_PickHotel_r[]']").each(function() {
			//重bind要先unbind
			$(this).unbind("change");
			$(this).bind("change",function(){
				var obj_this = $(this);

				$.ajax({
					type: "POST",
					url: $('#hid_baseurl').val() + 'bos/apiGetPickhotelIdSel/' + $(this).val(),
					data: '',
					dataType: 'json',
					statusCode: {
						200: function(e) {
							$("input[name='en_PickHotel_r[]'][row='" + obj_this.attr('row') + "']").val(e[2]);
							$("input[name='site_PickHotel_r[]'][row='" + obj_this.attr('row') + "']").val(e[3]);
							$("input[name='phone_PickHotel_r[]'][row='" + obj_this.attr('row') + "']").val(e[4]);
							$("input[name='address_PickHotel_r[]'][row='" + obj_this.attr('row') + "']").val(e[5]);
							$("select[name='room_id_PickHotel_r[]'][row=" + obj_this.attr('row') + "]").html(e[6]);
						}
					},
					error: function() {
					}
				});
			});
		});

		// search
		$(".fsearch").bind("click",function(){
			$('#span_modal_title').html($(this).attr('ftype'));
			if($(this).attr('ftype')=='contact_id_ar'){
				$('#span_modal_title').html('contact_id');
			}else if($(this).attr('ftype')=='contact_id_arr'){
				$('#span_modal_title').html('contact_id');
			}else if($(this).attr('ftype')=='contact_id_r'){
				$('#span_modal_title').html('contact_id');
			}
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
		url: '<?= base_url()?>bos/apiGetPickbyContactId/<?= ((strval($id) != "0") ? $info["id"]:"") ?>/<?= ((strval($id) != "0") ? 0:"") ?>',
		sortName:"name_tw",
		sortOrder:"asc",
		selectItemName:"toolbar1",
		sidePagination:"client",
		pagination:"true",
		pageSize: 10,
		pageList:"[10, 50, 100]",
		columns: [{
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
			width:"15%",
			class:"text-nowrap"
		},{
			field:'jobtitle' ,
			title: "<?= $lang->line('jobtitle') ?>",
			halign:"center" ,
			align:"left" ,
			width:"15%",
			class:"text-nowrap"
		},{
			field:'descr' ,
			title: "<?= $lang->line('desc') ?>",
			halign:"center" ,
			align:"left" ,
			width:"15%",
			class:"text-nowrap"
		
		}]
	});

	$('#tblmain2').bootstrapTable({
		toggle:"table",
		idField: 'id',
		url: '<?= base_url()?>bos/apiGetPickbyContactId/<?= ((strval($id) != "0") ? $info["id"]:"") ?>/<?= ((strval($id) != "0") ? 1:"") ?>',
		sortName:"name_tw",
		sortOrder:"asc",
		selectItemName:"toolbar1",
		sidePagination:"client",
		pagination:"true",
		pageSize: 10,
		pageList:"[10, 50, 100]",
		columns: [{
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
			width:"15%",
			class:"text-nowrap"
		},{
			field:'jobtitle' ,
			title: "<?= $lang->line('jobtitle') ?>",
			halign:"center" ,
			align:"left" ,
			width:"15%",
			class:"text-nowrap"
		},{
			field:'descr' ,
			title: "<?= $lang->line('desc') ?>",
			halign:"center" ,
			align:"left" ,
			width:"15%",
			class:"text-nowrap"
		
		}]
	});

});
</script>