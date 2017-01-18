<script src='<?= base_url()?>assets/js/bootstrap-datetimepicker.min.js'></script>
<script src='<?= base_url()?>assets/js/bootstrap-table.min.js'></script>
<link href='<?= base_url()?>assets/css/bootstrap-datetimepicker.min.css' rel='stylesheet' type='text/css'/>
<link href='<?= base_url()?>assets/css/bootstrap-table.min.css' rel='stylesheet' type='text/css'/>

<input type='hidden' id='hid_baseurl' value='<?= base_url(); ?>'>

<div class="container">
	<form class="form-horizontal" id='form1'>
		<input type='hidden' name='hid_id' value='<?= $id ?>'>

		<h1><?= $title ?></h1>
		<div class="form-group">
			<div class="col-sm-6">
				<label class="control-label"><?= $lang->line('quote_id') ?></label>
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
				<label class="control-label"><?= $lang->line('q_date_order') ?></label>
				<div class="checkbox" id="div_date_order">
<?php if (strval($id) != '0'): ?>
	<?php if ((strval($info['date_order']) == '0000-00-00')||(strval($info['date_order']) == '')): ?>
					<?= $lang->line('generate_system') ?>
	<?php else: ?>
					<?= $info['date_order'] ?>
	<?php endif; ?>
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
			<div class="col-sm-6">
				<label class="control-label"><?= $lang->line('user_modify') ?></label>
				<div class="checkbox">
<?php if (strval($id) != '0'): ?>
					<?= $info['user_modify_name'] ?>
<?php else: ?>
					<?= $lang->line('generate_system') ?>
<?php endif; ?>				
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-6">
				<label class="control-label"><?= $lang->line('1-1-1') ?></label>
				<div class="checkbox" id='div_country_id'>
<?php if (strval($id) != '0'): ?>
					<?= $ary_country[$info['h_country_id']] ?>
<?php else: ?>
					<?= $ary_sel_defult[1] ?>
<?php endif; ?>				
				</div>
			</div>
			<div class="col-sm-6">
				<label class="control-label"><?= $lang->line('date_check') ?></label>
				<div class="checkbox">
<?php if (strval($id) != '0'): ?>
					<?= $info['date_check'] ?>
<?php else: ?>
					<?= $lang->line('generate_system') ?>
<?php endif; ?>				
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-6">
				<label class="control-label"><?= $lang->line('worker_kind') ?></label>
				<div class="checkbox" id='div_worker_kind'>
<?php if (strval($id) != '0'): ?>	
					<?= $ary_worker_kind[$info['h_worker_kind']] ?>
<?php else: ?>
					<?= $ary_sel_defult[4] ?>
<?php endif; ?>				
				</div>
			</div>
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
		</div>
		<div class="form-group">
			<div class="col-sm-6">
				<label class="control-label"><?= $lang->line('worker_type_major') ?></label>
				<div class="checkbox" id='div_worker_type_major'>
<?php if (strval($id) != '0'): ?>
					<?= $ary_worker_type_major[$info['h_worker_type_major']] ?>
<?php else: ?>
					<?= $ary_sel_defult[5] ?>
<?php endif; ?>				
				</div>
			</div>
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
		</div>
		<div class="form-group">
			<div class="col-sm-6">
				<label class="control-label"><?= $lang->line('worker_type_minor') ?></label>
				<div class="checkbox" id='div_worker_type_minor_id'>
<?php if (strval($id) != '0'): ?>
					<?= $ary_worker_type_minor_id[$info['h_worker_type_minor_id']] ?>
<?php else: ?>
					<?= $ary_sel_defult[6] ?>
<?php endif; ?>				
				</div>
			</div>
			<div class="col-sm-6">
				<label class="control-label"><?= $lang->line('sex') ?></label>
				<div class="checkbox" id='div_gender'>
<?php if (strval($id) != '0'): ?>
					<?= $ary_gender[$info['h_gender']] ?>
<?php else: ?>
					<?= $ary_sel_defult[7] ?>
<?php endif; ?>				
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-6">
				<label class="control-label"><?= $lang->line('qty_require') ?></label>
				<div class="checkbox" id='div_qty_require'>
<?php if (strval($id) != '0'): ?>
					<?= $info['qty_require'] ?>
<?php else: ?>
					<?= $ary_sel_defult[8] ?>
<?php endif; ?>				
				</div>
			</div>
			<div class="col-sm-6">
				<label class="control-label"><?= $lang->line('work_limit') ?></label>
				<div class="checkbox" id='div_work_limit'>
<?php if (strval($id) != '0'): ?>
					<?= $info['work_limit'] ?>
<?php else: ?>
					<?= $ary_sel_defult[9] ?>
<?php endif; ?>				
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-6">
				<label class="control-label"><?= $lang->line('food_type') ?></label>
				<div class="checkbox" id='div_food_type'>
<?php if (strval($id) != '0'): ?>
							<label class="radio-inline">
								<input type="radio" name="rdo_food_type" id="" value=1 onclick="return false" <?= $info['food_type'] == 1 ? 'checked' : '' ?>> <?= $lang->line('free_food_type') ?>
							</label>
							<br>
							<label class="radio-inline">
								<input type="radio" name="rdo_food_type" id="" value=2 onclick="return false" <?= $info['food_type'] == 2 ? 'checked' : '' ?>> <?= $lang->line('other') ?>
							</label>
							<br>
							<label class="radio-inline">
								<input type="radio" name="rdo_food_type" id="" value=3 onclick="return false" <?= $info['food_type'] == 3 ? 'checked' : '' ?>> <?= $lang->line('month_deduct') ?>
							</label>
							<br>
<?php else: ?>
							<label class="radio-inline">
								<input type="radio" name="rdo_food_type" id="" value=1 onclick="return false" <?= $ary_sel_defult[10] == 1 ? 'checked' : '' ?>> <?= $lang->line('free_food_type') ?>
							</label>
							<br>
							<label class="radio-inline">
								<input type="radio" name="rdo_food_type" id="" value=2 onclick="return false" <?= $ary_sel_defult[10] == 2 ? 'checked' : '' ?>> <?= $lang->line('other') ?>
							</label>
							<br>
							<label class="radio-inline">
								<input type="radio" name="rdo_food_type" id="" value=3 onclick="return false" <?= $ary_sel_defult[10] == 3 ? 'checked' : '' ?>> <?= $lang->line('month_deduct') ?>
							</label>
<?php endif; ?>			
				</div>
			</div>
			<div class="col-sm-6">
				<label class="control-label"><?= $lang->line('immigration_people') ?></label>
				<div class="checkbox" id='div_qty_immigrate'>
<?php if (strval($id) != '0'): ?>
					<?= $info['h_qty_immigrate'] ?>
<?php else: ?>
					<?= $ary_sel_defult[11] ?>
<?php endif; ?>				
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-5">
				<label class="control-label"><?= $lang->line('insur_labor') ?></label>
				<div class="checkbox" id='div_insur_labor'>
<?php if (strval($id) != '0'): ?>
					<?= $info['insur_labor'] ?>
<?php else: ?>
					<?= $ary_sel_defult[12] ?>
<?php endif; ?>				
				</div>
			</div>
			<div class="col-sm-1">
				<label class="control-label">　</label>
				<div class="checkbox">
					<?= $lang->line('yuan_month') ?>
				</div>
			</div>
			<div class="col-sm-3">
				<label class="control-label"><?= $lang->line('save') ?></label>
				<div class="checkbox" id='div_save'>
<?php if (strval($id) != '0'): ?>
					<?= $info['save'] ?>
<?php else: ?>
					<?= $ary_sel_defult[13] ?>
<?php endif; ?>				
				</div>
			</div>
			<div class="col-sm-3">
				<label class="control-label"><?= $lang->line('save2') ?></label>
				<div class="checkbox" id='div_save2'>
<?php if (strval($id) != '0'): ?>
					<?= $info['save2'] ?>
<?php else: ?>
					<?= $ary_sel_defult[14] ?>
<?php endif; ?>				
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-5">
				<label class="control-label"><?= $lang->line('insur_health') ?></label>
				<div class="checkbox" id='div_insur_health'>
<?php if (strval($id) != '0'): ?>
					<?= $info['insur_health'] ?>
<?php else: ?>
					<?= $ary_sel_defult[15] ?>
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
				<label class="control-label">　</label>
				<div class='checkbox'>
					<label>
<?php if (strval($id) != '0'): ?>
						<input type="checkbox" id="chk_is_check" name='chk_is_check' value="1" <?= ($info['is_check'] & 1) == '1' ? 'checked="checked"' : '' ?>/><?= $lang->line('is_check') ?>
<?php else: ?>
						<input type="checkbox" id="chk_is_check" name='chk_is_check' value="1" /><?= $lang->line('is_check') ?>
<?php endif; ?>
					</label>
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-6">
				<label class="control-label"><?= $lang->line('quote_descr') ?></label>
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
		<div class="form-group">
			<div class="col-sm-12">
				<label class="control-label"><?= $lang->line('q_fee_inbound') ?></label>
				<table class="table table-bordered table-hover table-responsive" id="tab_quoteFeeInbound">
					<thead>
						<tr >
							<th class="text-center">#<br><?= '　'?></th>
							<th class="text-center text-nowrap"><?= $lang->line('1-3-1') ?><br><?= '　'?></th>
							<th class="text-center text-nowrap"><?= $lang->line('1-1-8') ?><br><?= '　'?></th>
							<th class="text-center text-nowrap"><?= $lang->line('quote_exchange_rate') ?><br><?= '　'?></th>
							<th class="text-center text-nowrap"><?= $lang->line('finance_exchange_rate') ?><br><?= '　'?></th>
							<th class="text-center text-nowrap"><?= $lang->line('hire_money')?><br><?= '　'?></th>
							<th class="text-center text-nowrap"><?= $lang->line('money_tw') ?><br><?= $lang->line('rounding')?></th>
						</tr>
					</thead>
					<tbody>
<? $row=0; ?>						
<?php if(count($ary_quoteFeeInbound) > 0): ?>
<?php foreach ($ary_quoteFeeInbound as $item): ?>
<? $row++;$item['row']=$row; ?>
						<tr id="<?= 'addr_quoteFeeInbound'.($item['row'] - 1) ?>">
							<td>
								<?= ($item['row']) ?>
								<input type='hidden' name='row_quoteFeeInbound[]' value='<?= ($item['row']) ?>'>
							</td>
							<td>
								<?= form_dropdown('fee_id[]', $ary_fee_id_inbound, $item['fee_id'], 'class="form-control" '); ?>
							</td>
							<td>
								<?= form_dropdown('currency_id[]', $ary_currency, $item['currency_id'], 'class="form-control" row="'.$item['row'].'"'); ?>
							</td>
							<td>
								<input type="text" name='quote_exchange_rate[]' value='<?= ($item['quote_exchange_rate']) ?>' class="form-control" row="<?=$item['row']?>"  pattern="[0-9]+(\.){0,1}[0-9]{0,4}"/>
							</td>
							<td>
								<input type="text" name='finance_exchange_rate[]' value='<?= ($item['finance_exchange_rate']) ?>' class="form-control" row="<?=$item['row']?>" readonly/>
							</td>
							<td>
								<input type="text" name='money[]' value='<?= ($item['money']) ?>' class="form-control" pattern="[0-9]+"/>
							</td>
							<td>
<?php if($item['money'] != 0 ): ?>
								<input type="text" name='money_tw[]' value='<?= ($item['money_tw']) ?>' class="form-control" readonly/>
<?php else: ?>
								<input type="text" name='money_tw[]' value="<?= $lang->line('auto_count_after_save')?>" class="form-control" readonly/>
<?php endif; ?>
							</td>
						</tr>
<?php endforeach;?>
						<tr id='<?php echo 'addr_quoteFeeInbound'.count($ary_quoteFeeInbound) ?>'></tr>
<?php else: ?>
						<tr id='addr_quoteFeeInbound0'>
							<td>
								1
								<input type='hidden' name='row_quoteFeeInbound[]' value='1'>
							</td>
							<td>
								<?= form_dropdown('fee_id[]', $ary_fee_id_inbound, '', 'class="form-control" '); ?>
							</td>
							<td>
								<?= form_dropdown('currency_id[]', $ary_currency, '', 'class="form-control" row="1"'); ?>
							</td>
							<td>
								<input type="text" name='quote_exchange_rate[]' class="form-control" row="1" pattern="[0-9]+(\.){0,1}[0-9]{0,4}"/>
							</td>
							<td>
								<input type="text" name='finance_exchange_rate[]' class="form-control" row="1" readonly/>
							</td>
							<td>
								<input type="text" name='money[]' class="form-control" pattern="[0-9]+"/>
							</td>
							<td>
								<input type="text" name='money_tw[]' value="<?= $lang->line('auto_count_after_save')?>" class="form-control" readonly/>
							</td>
						</tr>
						<tr id='addr_quoteFeeInbound1'></tr>
<?php endif; ?>
					</tbody>
				</table>
				<a class="add_row btn btn-warning pull-left" prefix='quoteFeeInbound'><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
				<a class="delete_row pull-right btn btn-danger" prefix='quoteFeeInbound'><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></a>
				<div class='row mb20' ps='for_add_del_button'>
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-12">
				<label class="control-label"><?= $lang->line('q_fee_outbound') ?></label>
				<table class="table table-bordered table-hover table-responsive" id="tab_quoteFeeOutbound">
					<thead>
						<tr >
							<th class="text-center">#<br><?= '　'?></th>
							<th class="text-center text-nowrap"><?= $lang->line('1-3-1') ?><br><?= '　'?></th>
							<th class="text-center text-nowrap"><?= $lang->line('1-1-8') ?><br><?= '　'?></th>
							<th class="text-center text-nowrap" width="15%"><?= $lang->line('quote_exchange_rate') ?><br><?= '　'?></th>
							<th class="text-center text-nowrap" width="15%"><?= $lang->line('finance_exchange_rate') ?><br><?= '　'?></th>
							<th class="text-center text-nowrap" width="15%"><?= $lang->line('hire_money')?><br><?= '　'?></th>
							<th class="text-center text-nowrap" width="15%"><?= $lang->line('money_tw') ?><br><?= $lang->line('rounding')?></th>
							<th class="text-center text-nowrap"><?= $lang->line('man_receive') ?><br><?= '　'?></th>
						</tr>
					</thead>
					<tbody>
<? $row=0; ?>						
<?php if(count($ary_quoteFeeOutbound) > 0): ?>
<?php foreach ($ary_quoteFeeOutbound as $item): ?>
<? $row++;$item['row']=$row; ?>	
						<tr id="<?= 'addr_quoteFeeOutbound'.($item['row'] - 1) ?>">
							<td>
								<?= ($item['row']) ?>
								<input type='hidden' name='row_quoteFeeOutbound[]' value='<?= ($item['row']) ?>'>
							</td>
							<td>
								<?= form_dropdown('fee_id_outbound[]', $ary_fee_id_outbound, $item['fee_id'], 'class="form-control" '); ?>
							</td>
							<td>
								<?= form_dropdown('currency_id_outbound[]', $ary_currency, $item['currency_id'], 'class="form-control" row="'.$item['row'].'"'); ?>
							</td>
							<td>
								<input type="text" name='quote_exchange_rate_outbound[]' value='<?= ($item['quote_exchange_rate']) ?>' class="form-control" row="<?=$item['row']?>" pattern="[0-9]+(\.){0,1}[0-9]{0,4}"/>
							</td>
							<td>
								<input type="text" name='finance_exchange_rate_outbound[]' value='<?= ($item['finance_exchange_rate']) ?>' class="form-control" row="<?=$item['row']?>" readonly/>
							</td>
							<td>
								<input type="text" name='money_outbound[]' value='<?= ($item['money']) ?>' class="form-control" pattern="[0-9]+"/>
							</td>
							<td>
<?php if($item['money'] != 0 ): ?>
								<input type="text" name='money_tw_outbound[]' value='<?= ($item['money_tw']) ?>' class="form-control" readonly/>
<?php else: ?>
								<input type="text" name='money_tw_outbound[]' value="<?= $lang->line('auto_count_after_save')?>" class="form-control" readonly/>
<?php endif; ?>
							</td>
							<td>
								<?= form_dropdown('man_receive_outbound[]', $ary_man_receive_outbound, $item['man_receive'], 'class="form-control" '); ?>
							</td>
						</tr>
<?php endforeach;?>
						<tr id='<?php echo 'addr_quoteFeeOutbound'.count($ary_quoteFeeOutbound) ?>'></tr>
<?php else: ?>
						<tr id='addr_quoteFeeOutbound0'>
							<td>
								1
								<input type='hidden' name='row_quoteFeeOutbound[]' value='1'>
							</td>
							<td>
								<?= form_dropdown('fee_id_outbound[]', $ary_fee_id_outbound, '', 'class="form-control" '); ?>
							</td>
							<td>
								<?= form_dropdown('currency_id_outbound[]', $ary_currency, '', 'class="form-control" row="1"'); ?>
							</td>
							<td>
								<input type="text" name='quote_exchange_rate_outbound[]' class="form-control" row="1" pattern="[0-9]+(\.){0,1}[0-9]{0,4}"/>
							</td>
							<td>
								<input type="text" name='finance_exchange_rate_outbound[]' class="form-control" row="1" readonly/>
							</td>
							<td>
								<input type="text" name='money_outbound[]' class="form-control" pattern="[0-9]+"/>
							</td>
							<td>
								<input type="text" name='money_tw_outbound[]' value="<?= $lang->line('auto_count_after_save')?>" class="form-control" readonly/>
							</td>
							<td>
								<?= form_dropdown('man_receive_outbound[]', $ary_man_receive, '', 'class="form-control" '); ?>
							</td>
						</tr>
						<tr id='addr_quoteFeeOutbound1'></tr>
<?php endif; ?>
					</tbody>
				</table>
				<a class="add_row btn btn-warning pull-left" prefix='quoteFeeOutbound'><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
				<a class="delete_row pull-right btn btn-danger" prefix='quoteFeeOutbound'><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></a>
				<div class='row mb20' ps='for_add_del_button'>
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-12">
				<label class="control-label"><?= $lang->line('quote_fee') ?></label>
			</div>
		</div>	
		<div class="form-group">
			<div class="col-sm-11 col-sm-offset-1">
				<button class="btn btn-default btn-danger country_fee_remove" fid='tbl_sel_country_fee_1' onclick='return false;'>Remove</button>
				<table id='tbl_sel_country_fee_1'></table>
			</div>
		</div>	

		<div class="form-group">
			<div class="col-sm-12">
				<label class="control-label"><?= $lang->line('q_fee_stage') ?></label>
			</div>
		</div>	
		<div class="form-group">
			<div class="col-sm-11 col-sm-offset-1">
				<button class="btn btn-default btn-danger country_fee_remove" fid='tbl_sel_country_fee_2' onclick='return false;'>Remove</button>
				<table id='tbl_sel_country_fee_2'></table>
			</div>
		</div>	
		<div class="form-group">
			<div class="col-sm-12">
				<label for="tab_exp" class='form-label'> <?= $lang->line('hire_worker') ?></label><br />
				<table id='tblmain' class="table table-bordered table-hover table-responsive">
				</table>
			</div>
		</div>

						
	</form>
	<button id="btn_save" class="btn btn-primary">Save</button>
	<button class="btn btn-default btn-cancel">Cancel</button>
		
</div>

<script type="text/javascript">
$(function () {
	$('#tbl_sel_country_fee_1').bootstrapTable({
		toggle:"table",
		checkboxHeader: true,
		idField: 'id',
		url: '',
		sortName:"tw",
		sortOrder:"asc",
		selectItemName:"toolbar1",
		sidePagination:"client",
		pagination:"true",
		pageSize: 10,
		pageList:"[10, 50, 100]",
		columns: [{
			checkbox: true,
		},{
			field:'fe_tw' ,
			title: "<?= $lang->line('1-3-1') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"15%",
			class:"text-nowrap"
		},{
			field:'cu_tw' ,
			title: "<?= $lang->line('1-1-8') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"5%",
			class:"text-nowrap"
		},{
			field:'' ,
			title: "<?= $lang->line('quote_exchange_rate') ?>",
			halign:"center" ,
			align:"left" ,
			width:"15%",
			class:"text-nowrap",
			formatter: quoteexchangerate1formatter
		},{
			field:'' ,
			title: "<?= $lang->line('hire_money') ?>",
			halign:"center" ,
			align:"left" ,
			width:"15%",
			class:"text-nowrap",
			formatter: hiremoney1formatter
		},{
			field:'' ,
			title: "<?= $lang->line('money_tw').'<br>'.$lang->line('rounding') ?>",
			halign:"center" ,
			align:"left" ,
			width:"15%",
			class:"text-nowrap",
			formatter: roundingformatter
		},{
			field:'c_tw' ,
			title: "<?= $lang->line('country_id') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"5%",
			class:"text-nowrap"
		},{
			field:'man_receive' ,
			title: "<?= $lang->line('man_receive') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"15%",
			class:"text-nowrap"
		},{
			field:'method_receive' ,
			title: "<?= $lang->line('method_receive') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"15%",
			class:"text-nowrap"
		}]
	});
	$('#tbl_sel_country_fee_2').bootstrapTable({
		toggle:"table",
		checkboxHeader: true,
		idField: 'id',
		url: '',
		sortName:"tw",
		sortOrder:"asc",
		selectItemName:"toolbar1",
		sidePagination:"client",
		pagination:"true",
		pageSize: 10,
		pageList:"[10, 50, 100]",
		columns: [{
			checkbox: true,
		},{
			field:'fe_tw' ,
			title: "<?= $lang->line('1-3-1') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"15%",
			class:"text-nowrap"
		},{
			field:'cu_tw' ,
			title: "<?= $lang->line('1-1-8') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"5%",
			class:"text-nowrap"
		},{
			field:'' ,
			title: "<?= $lang->line('quote_exchange_rate') ?>",
			halign:"center" ,
			align:"left" ,
			width:"15%",
			class:"text-nowrap",
			formatter: quoteexchangerate2formatter
		},{
			field:'' ,
			title: "<?= $lang->line('hire_money') ?>",
			halign:"center" ,
			align:"left" ,
			width:"15%",
			class:"text-nowrap",
			formatter: hiremoney1formatter
		},{
			field:'' ,
			title: "<?= $lang->line('money_tw').'<br>'.$lang->line('rounding') ?>",
			halign:"center" ,
			align:"left" ,
			width:"15%",
			class:"text-nowrap",
			formatter: roundingformatter
		},{
			field:'stage_no_start' ,
			title: "<?= $lang->line('stage_no_start') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"15%",
			class:"text-nowrap"
		},{
			field:'stage_no_end' ,
			title: "<?= $lang->line('stage_no_end') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"15%",
			class:"text-nowrap"
		},{
			field:'c_tw' ,
			title: "<?= $lang->line('country_id') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"5%",
			class:"text-nowrap"
		},{
			field:'man_receive' ,
			title: "<?= $lang->line('man_receive') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"15%",
			class:"text-nowrap"
		},{
			field:'method_receive' ,
			title: "<?= $lang->line('method_receive') ?>",
			halign:"center" ,
			align:"left" ,
			sortable:"true" ,
			width:"15%",
			class:"text-nowrap"
		}]
	});

	var i_quoteFeeInbound = $("#tab_quoteFeeInbound" + " tr").length - 2;
	var i_quoteFeeOutbound = $("#tab_quoteFeeOutbound" + " tr").length - 2;
	var i_quoteFee = $("#tab_quoteFee" + " tr").length - 2;
	var i_quoteFeeStage = $("#tab_quoteFeeStage" + " tr").length - 2;
	

	$("input[name='chk_is_check']").each(function() {
		$(this).bind("change",function(){
			if($("#chk_is_check").is(':checked')==true){
				$('#div_date_order').html("<?= date("Y-m-d") ?>");
			}else{
				$('#div_date_order').html("<?= $lang->line('generate_system') ?>");
			}
		});
	});

	$("select[name=sel_hire_id]").bind("change",function(){
		$.ajax({
			async: false,
			type: "POST",
			url: $('#hid_baseurl').val() + 'bos/apiGetQuoteHireIdSel/' + $(this).val(),
			data: '',
			dataType: 'json',
			statusCode: {
				200: function(e) {
					$('#div_country_id').html(e[1]);
					$('#div_client_id').html(e[2]);
					$('#div_employer_id').html(e[3]);
					$('#div_worker_kind').html(e[4]);
					$('#div_worker_type_major').html(e[5]);
					$('#div_worker_type_minor_id').html(e[6]);
					$('#div_gender').html(e[7]);
					$('#div_qty_require').html(e[8]);
					$('#div_work_limit').html(e[9]);
					$('#div_food_type').html(e[10]);
					$('#div_qty_immigrate').html(e[11]);
					$('#div_insur_labor').html(e[12]);
					$('#div_save').html(e[13]);
					$('#div_save2').html(e[14]);
					$('#div_insur_health').html(e[15]);
				}
			},
			error: function() {
			}
		});

		// country_fee
		$.ajax({
			type: "POST",
			async: false,
			url: <?= "'".base_url()."'"; ?> + 'config/apiGetCountryFeeByHireId/',
			data: {val: $(this).val() },
			dataType: 'json',
			statusCode: {
				200: function(data) {
					$('#tbl_sel_country_fee_1').bootstrapTable('append', data[1]);
					$('#tbl_sel_country_fee_2').bootstrapTable('append', data[0]);
				}
			},
			error: function() {
			}
		});

		$('#tblmain').bootstrapTable('refresh',
			{url: '<?= base_url()?>bos/apiGetMappingHireSpecialid/' + $(this).val()
		});
	});

	//create預帶值
	<?php if (strval($id) != '0'): ?>
	<?php else: ?>
		$.ajax({
			type: "POST",
			url: $('#hid_baseurl').val() + 'bos/apiGetQuoteCurrencySel/' + $("select[name='currency_id[]']").val(),
			data: '',
			dataType: 'json',
			statusCode: {
				200: function(e) {
					$("input[name='finance_exchange_rate[]'][row='1']").val(e[1]);
					$("input[name='quote_exchange_rate[]'][row='1']").val(e[2]);
					$("input[name='finance_exchange_rate_outbound[]'][row='1']").val(e[1]);
					$("input[name='quote_exchange_rate_outbound[]'][row='1']").val(e[2]);
					$("input[name='quote_exchange_rate_quoteFee[]'][row='1']").val(e[2]);
					$("input[name='quote_exchange_rate_quoteFeeStage[]'][row='1']").val(e[2]);
				}
			},
			error: function() {
			}
		});
	<?php endif; ?>

	$('.country_fee_apply').bind("click",function(){


		return false;
	});

	$('.country_fee_remove').bind("click",function(){
		var ids = new Array();
		var tmp = $(this).attr('fid');
		var obj = $('#' + tmp).bootstrapTable('getSelections');
		for(var i = 0; i < obj.length; i++) {
			ids[i] = obj[i].id;
		}
		$('#' + tmp).bootstrapTable('remove', {field: 'id', values: ids});
	});

	$("select[name='currency_id[]']").each(function() {
		$(this).bind("change",function(){
			var obj_this = $(this);

			$.ajax({
				type: "POST",
				url: $('#hid_baseurl').val() + 'bos/apiGetQuoteCurrencySel/' + $(this).val(),
				data: '',
				dataType: 'json',
				statusCode: {
					200: function(e) {
						$("input[name='finance_exchange_rate[]'][row='" + obj_this.attr('row') + "']").val(e[1]);
						$("input[name='quote_exchange_rate[]'][row='" + obj_this.attr('row') + "']").val(e[2]);
					}
				},
				error: function() {
				}
			});
		});
	});

	$("select[name='currency_id_outbound[]']").each(function() {
		$(this).bind("change",function(){
			var obj_this = $(this);

			$.ajax({
				type: "POST",
				url: $('#hid_baseurl').val() + 'bos/apiGetQuoteCurrencySel/' + $(this).val(),
				data: '',
				dataType: 'json',
				statusCode: {
					200: function(e) {
						$("input[name='finance_exchange_rate_outbound[]'][row='" + obj_this.attr('row') + "']").val(e[1]);
						$("input[name='quote_exchange_rate_outbound[]'][row='" + obj_this.attr('row') + "']").val(e[2]);
					}
				},
				error: function() {
				}
			});
		});
	});

	$("select[name='currency_id_quoteFee[]']").each(function() {
		$(this).bind("change",function(){
			var obj_this = $(this);

			$.ajax({
				type: "POST",
				url: $('#hid_baseurl').val() + 'bos/apiGetQuoteCurrencySel/' + $(this).val(),
				data: '',
				dataType: 'json',
				statusCode: {
					200: function(e) {
						$("input[name='quote_exchange_rate_quoteFee[]'][row='" + obj_this.attr('row') + "']").val(e[2]);
					}
				},
				error: function() {
				}
			});
		});
	});

	$("select[name='currency_id_quoteFeeStage[]']").each(function() {
		$(this).bind("change",function(){
			var obj_this = $(this);

			$.ajax({
				type: "POST",
				url: $('#hid_baseurl').val() + 'bos/apiGetQuoteCurrencySel/' + $(this).val(),
				data: '',
				dataType: 'json',
				statusCode: {
					200: function(e) {
						$("input[name='quote_exchange_rate_quoteFeeStage[]'][row='" + obj_this.attr('row') + "']").val(e[2]);
					}
				},
				error: function() {
				}
			});
		});
	});
	//radio值給hidden
	$('input[type="radio"]').each(function(){
		$(this).bind("click",function(){
			if($(this).attr('name').slice(0,-2) == 'method_receive_quoteFee'){
				$('input[name="method_receive_quoteFee[]"][row="'+$(this).attr('row')+'"]').val($(this).attr('value'));
			}else if($(this).attr('name').slice(0,-2) == 'method_receive_quoteFeeStage'){
				$('input[name="method_receive_quoteFeeStage[]"][row="'+$(this).attr('row')+'"]').val($(this).attr('value'));
			}else{

			}
		});
	});

	$('.date').datetimepicker({
		format: 'YYYY-MM-DD',
		keepInvalid: true,
		ignoreReadonly: true,
		useCurrent: true
	});

	$(".btn-cancel").bind("click",function(){
		window.location = '<?= base_url()?>bos/quote';
	});	
	
	$("#btn_save").bind("click",function(){
		if(!$("form")[0].checkValidity()) return;

		$.ajax({
			type: "POST",
			url: $('#hid_baseurl').val() + 'bos/quote_doEdit',
			data: $('#form1').serialize(),
			statusCode: {
				200: function() {
					window.location = '<?= base_url()?>bos/quote';
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
		if(prefix == 'quoteFeeStage'){
			checkedtmp = $('#addr_' + prefix +'0').html().replace(/"method_receive_quoteFeeStage_1"/g, "method_receive_quoteFeeStage_"+(i + 1));
			$('#addr_' + prefix + i).html(checkedtmp);
		}else{
			$('#addr_' + prefix + i).html($('#addr_' + prefix +'0').html());
		}
		
		$('#addr_' + prefix + i).children().children().attr('row',i + 1);	// replace attr:row
		$('#addr_' + prefix + i).children().first().html((i + 1) + "<input type='hidden' name='row_" + prefix + "[]' value='" + (i + 1) + "'>");	// replace #
		
		//radio重新給row
		$('#addr_' + prefix + i).children().children().children().attr('row',i + 1);
		$('#addr_' + prefix + i).children().children().children().children().attr('row',i + 1);

		$("#tab_" + prefix + " input[row=" + (i + 1) + "]").each(function() {
			if(($(this).attr('type') != 'hidden')&&($(this).attr('name') != 'method_receive_quoteFee_'+ (i + 1))&&($(this).attr('name') != 'method_receive_quoteFeeStage_'+ (i + 1))) {
				$(this).val('');	
			}
			($(this).attr('name') == 'money_tw[]' ? $('input[name="money_tw[]"][row="'+(i + 1)+'"]').val("<?= $lang->line('auto_count_after_save')?>"):"");
			($(this).attr('name') == 'money_tw_outbound[]' ? $('input[name="money_tw_outbound[]"][row="'+(i + 1)+'"]').val("<?= $lang->line('auto_count_after_save')?>"):"");
			($(this).attr('name') == 'money_tw_quoteFee[]' ? $('input[name="money_tw_quoteFee[]"][row="'+(i + 1)+'"]').val("<?= $lang->line('auto_count_after_save')?>"):"");
			($(this).attr('name') == 'money_tw_quoteFeeStage[]' ? $('input[name="money_tw_quoteFeeStage[]"][row="'+(i + 1)+'"]').val("<?= $lang->line('auto_count_after_save')?>"):"");
		});

		$('#tab_' + prefix).append('<tr id="addr_'+ prefix + (i+1)+'"></tr>');
		var str = tmp + " = " + eval(tmp) + "+1";
		eval(str);

		$("#tab_" + prefix + " select[row=" + (i + 1) + "]").each(function() {
			//insert一筆，預帶值
			if(($(this).attr('name') == 'currency_id[]') && ($(this).attr('row') == (i + 1))){
				var obj_this = $(this);

				$.ajax({
					type: "POST",
					url: $('#hid_baseurl').val() + 'bos/apiGetQuoteCurrencySel/' + $(this).val(),
					data: '',
					dataType: 'json',
					statusCode: {
						200: function(e) {
							$("input[name='finance_exchange_rate[]'][row='" + obj_this.attr('row') + "']").val(e[1]);
							$("input[name='quote_exchange_rate[]'][row='" + obj_this.attr('row') + "']").val(e[2]);
						}
					},
					error: function() {
					}
				});
			}
			//insert一筆，預帶值
			if(($(this).attr('name') == 'currency_id_outbound[]') && ($(this).attr('row') == (i + 1))){
				var obj_this = $(this);

				$.ajax({
					type: "POST",
					url: $('#hid_baseurl').val() + 'bos/apiGetQuoteCurrencySel/' + $(this).val(),
					data: '',
					dataType: 'json',
					statusCode: {
						200: function(e) {
							$("input[name='finance_exchange_rate_outbound[]'][row='" + obj_this.attr('row') + "']").val(e[1]);
							$("input[name='quote_exchange_rate_outbound[]'][row='" + obj_this.attr('row') + "']").val(e[2]);
						}
					},
					error: function() {
					}
				});
			}
			//insert一筆，預帶值
			if(($(this).attr('name') == 'currency_id_quoteFee[]') && ($(this).attr('row') == (i + 1))){
				var obj_this = $(this);

				$.ajax({
					type: "POST",
					url: $('#hid_baseurl').val() + 'bos/apiGetQuoteCurrencySel/' + $(this).val(),
					data: '',
					dataType: 'json',
					statusCode: {
						200: function(e) {
							$("input[name='quote_exchange_rate_quoteFee[]'][row='" + obj_this.attr('row') + "']").val(e[2]);
						}
					},
					error: function() {
					}
				});
			}
			//insert一筆，預帶值
			if(($(this).attr('name') == 'currency_id_quoteFeeStage[]') && ($(this).attr('row') == (i + 1))){
				var obj_this = $(this);

				$.ajax({
					type: "POST",
					url: $('#hid_baseurl').val() + 'bos/apiGetQuoteCurrencySel/' + $(this).val(),
					data: '',
					dataType: 'json',
					statusCode: {
						200: function(e) {
							$("input[name='quote_exchange_rate_quoteFeeStage[]'][row='" + obj_this.attr('row') + "']").val(e[2]);
						}
					},
					error: function() {
					}
				});
			}

		});

		$("select[name='currency_id[]']").each(function() {
			//重bind要先unbind
			$(this).unbind("change");
			$(this).bind("change",function(){
				var obj_this = $(this);

				$.ajax({
					type: "POST",
					url: $('#hid_baseurl').val() + 'bos/apiGetQuoteCurrencySel/' + $(this).val(),
					data: '',
					dataType: 'json',
					statusCode: {
						200: function(e) {
							$("input[name='finance_exchange_rate[]'][row='" + obj_this.attr('row') + "']").val(e[1]);
							$("input[name='quote_exchange_rate[]'][row='" + obj_this.attr('row') + "']").val(e[2]);
						}
					},
					error: function() {
					}
				});
			});
		});

		$("select[name='currency_id_outbound[]']").each(function() {
			//重bind要先unbind
			$(this).unbind("change");
			$(this).bind("change",function(){
				var obj_this = $(this);

				$.ajax({
					type: "POST",
					url: $('#hid_baseurl').val() + 'bos/apiGetQuoteCurrencySel/' + $(this).val(),
					data: '',
					dataType: 'json',
					statusCode: {
						200: function(e) {
							$("input[name='finance_exchange_rate_outbound[]'][row='" + obj_this.attr('row') + "']").val(e[1]);
							$("input[name='quote_exchange_rate_outbound[]'][row='" + obj_this.attr('row') + "']").val(e[2]);
						}
					},
					error: function() {
					}
				});
			});
		});

		$("select[name='currency_id_quoteFee[]']").each(function() {
			//重bind要先unbind
			$(this).unbind("change");
			$(this).bind("change",function(){
				var obj_this = $(this);

				$.ajax({
					type: "POST",
					url: $('#hid_baseurl').val() + 'bos/apiGetQuoteCurrencySel/' + $(this).val(),
					data: '',
					dataType: 'json',
					statusCode: {
						200: function(e) {
							$("input[name='quote_exchange_rate_quoteFee[]'][row='" + obj_this.attr('row') + "']").val(e[2]);
						}
					},
					error: function() {
					}
				});
			});
		});

		$("select[name='currency_id_quoteFeeStage[]']").each(function() {
			//重bind要先unbind
			$(this).unbind("change");
			$(this).bind("change",function(){
				var obj_this = $(this);

				$.ajax({
					type: "POST",
					url: $('#hid_baseurl').val() + 'bos/apiGetQuoteCurrencySel/' + $(this).val(),
					data: '',
					dataType: 'json',
					statusCode: {
						200: function(e) {
							$("input[name='quote_exchange_rate_quoteFeeStage[]'][row='" + obj_this.attr('row') + "']").val(e[2]);
						}
					},
					error: function() {
					}
				});
			});
		});
		//radio值給hidden
		$('input[type="radio"]').each(function(){
			$(this).bind("click",function(){
				if($(this).attr('name').slice(0,-2) == 'method_receive_quoteFee'){
					$('input[name="method_receive_quoteFee[]"][row="'+$(this).attr('row')+'"]').val($(this).attr('value'));
				}else if($(this).attr('name').slice(0,-2) == 'method_receive_quoteFeeStage'){
					$('input[name="method_receive_quoteFeeStage[]"][row="'+$(this).attr('row')+'"]').val($(this).attr('value'));
				}else{

				}
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

	$('#tblmain').bootstrapTable({
		toggle:"table",
		idField: 'id',
		url: '<?= base_url()?>bos/apiGetMappingHireSpecialid/<?= ((strval($id) != "0") ? $info["hire_id"]:"'+$('select[name=sel_hire_id]').val()+'") ?>',
		sortName:"no",
		sortOrder:"asc",
		selectItemName:"toolbar1",
		sidePagination:"client",
		pagination:"true",
		pageSize: 10,
		pageList:"[10, 50, 100]",
		columns: [{
			field:'no' ,
			title: "<?= $lang->line('student_no') ?>",
			halign:"center" ,
			align:"left" ,
			width:"10%",
			class:"text-nowrap"
		},{
			field:'name_tw' ,
			title: "<?= $lang->line('name_tw') ?>",
			halign:"center" ,
			align:"left" ,
			width:"15%",
			class:"text-nowrap"
		},{
			field:'name_en' ,
			title: "<?= $lang->line('name_en') ?>",
			halign:"center" ,
			align:"left" ,
			width:"15%",
			class:"text-nowrap"
		},{
			field:'tel' ,
			title: "<?= $lang->line('tel') ?>",
			halign:"center" ,
			align:"left" ,
			width:"15%",
			class:"text-nowrap"
		},{
			field:'tel2' ,
			title: "<?= $lang->line('tel2') ?>",
			halign:"center" ,
			align:"left" ,
			width:"15%",
			class:"text-nowrap"
		},{
			field:'address' ,
			title: "<?= $lang->line('tw_address') ?>",
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

function quoteexchangerate1formatter(value, row, index) {
	var ary_ret = [
		"<input type='text' class='form-control' name='quoteexchangerate1[]' value='" + row.quote_exchange_rate + "' pattern='[0-9]+(\.){0,1}[0-9]{0,4}'>"
	];

	return ary_ret.join('');
}
function quoteexchangerate2formatter(value, row, index) {
	var ary_ret = [
		"<input type='text' class='form-control' name='quoteexchangerate2[]' value='" + row.quote_exchange_rate + "' pattern='[0-9]+(\.){0,1}[0-9]{0,4}'>"
	];

	return ary_ret.join('');
}
// all hidden here
function hiremoney1formatter(value, row, index) {
	var ary_ret = [
		"<input type='text' class='form-control' name='hiremoney1[]' value=" + row.money + " pattern='[0-9]+(\.){0,1}[0-9]{0,4}'>",
		"<input type='hidden' name='country_fee_id1[]' value=" + row.id + ">"
	];

	return ary_ret.join('');
}
// all hidden here
function hiremoney2formatter(value, row, index) {
	var ary_ret = [
		"<input type='text' class='form-control' name='hiremoney2[]' value=" + row.money + " pattern='[0-9]+(\.){0,1}[0-9]{0,4}'>",
		"<input type='hidden' name='country_fee_id2[]' value=" + row.id + ">"
	];

	return ary_ret.join('');
}
function roundingformatter(value, row, index) {
	var ary_ret = [
		<?= "'".$lang->line('auto_count_after_save')."'" ?>
	];

	return ary_ret.join('');
}


</script>