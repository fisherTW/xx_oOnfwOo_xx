<link href='<?= base_url()?>assets/css/bootstrap-nav-wizard.min.css' rel='stylesheet' type='text/css'/>

<div class="form-group">
	<div class="panel panel-primary">
		<div class="panel-heading">
			簽核
		</div>
		<div class="panel-body">
			<div class="form-group">
				<label class="control-label">簽核流程</label>
				<div>
					<ul class="nav nav-wizard">
<?php foreach ($audit['role'] as $key => $item): ?>
	<?php $tmp = ''; ?>
	<?php foreach ($item as $k => $it): ?>
		<?php $tmp .= ($k == 0 ? '' : ' or ').$it; ?>
	<?php endforeach;?>
						<li class="<?= $key == $audit['log']['max_group_log'] ? 'active' : '' ?>">
							<a><span class="badge"><?= $key ?></span> <?= $tmp ?>
								<br>　　<?= isset($audit['log']['ary_lastRound'][$key]) ? $audit['log']['ary_lastRound'][$key]['tw'] : '' ?>
								<br>　　<?= isset($audit['log']['ary_lastRound'][$key]) ? $audit['log']['ary_lastRound'][$key]['date'] : '' ?>
							</a>
						</li>
<?php endforeach;?>
					</ul>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label">簽核狀態</label>
				<div>
					<?= $lang->line($audit['log']['status']) ?>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label">退審原因</label>
				<div>
					<?= $audit['log']['descr'] ?>
				</div>
			</div>
		</div>
	</div>
	<label class="control-label">退審原因</label>
	<input type="text" class="form-control" name="txt_a_descr">
</div>