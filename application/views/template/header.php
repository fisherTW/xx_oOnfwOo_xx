<!DOCTYPE html>
<!--
   ___               __                 __  __          _____     __          
  / _ \___ _  _____ / /__  ___  ___ ___/ / / /  __ __  / __(_)__ / /  ___ ____
 / // / -_) |/ / -_) / _ \/ _ \/ -_) _  / / _ \/ // / / _// (_-</ _ \/ -_) __/
/____/\__/|___/\__/_/\___/ .__/\__/\_,_/ /_.__/\_, / /_/ /_/___/_//_/\__/_/   
                        /_/                   /___/                           
-->
<html xmlns='http://www.w4.org/1999/xhtml'>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>
			Fisher System
		</title>
		<link href='<?= base_url()?>assets/css/bootstrap.css' rel='stylesheet' type='text/css'/>
		<link href='<?= base_url()?>assets/css/bootstrap-nav-color.css' rel='stylesheet' type='text/css'/>
		<link href='<?= base_url()?>assets/css/validation.css' rel='stylesheet' type='text/css'/>		
		<link href='<?= base_url()?>assets/css/sticky-footer.css' rel='stylesheet' type='text/css'/>		
		<link href='<?= base_url()?>assets/css/header.css' rel='stylesheet' type='text/css'/>		
		<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js'></script>
		<script src='<?= base_url()?>assets/js/moment.js'></script>
		<script src='<?= base_url()?>assets/js/bootstrap.js'></script>

	</head>
	<body>

<input type='hidden' id='hid_sess_user_id' value='<?= $this->session->userdata('user_id'); ?>'>
<input type='hidden' id='hid_sess_role' value='<?= $this->session->userdata('role'); ?>'>
<input type='hidden' id='hid_sess_account' value='<?= $this->session->userdata('account'); ?>'>
<input type='hidden' id='hid_sess_tw' value='<?= $this->session->userdata('tw'); ?>'>

<div class="wrapper">
<nav class="navbar navbar-default">
	<div class="container-fluid">
	<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand headerlogo" href="<?= base_url()?>welcome">NFW</a>
		</div>
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<h4 style="margin-top: 0px;"></h4>
			</ul>
			<ul class="nav navbar-nav">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <?= $lang->line('BOS') ?><span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="<?= base_url()?>bos/hire_factory">2-1-1 <?= $lang->line('2-1-1') ?></a></li>
						<li><a href="<?= base_url()?>bos/hire_non_factory">2-1-2 <?= $lang->line('2-1-2') ?></a></li>
						<li><a href="<?= base_url()?>bos/report">2-1-3 <?= $lang->line('2-1-3') ?></a></li>
						<li><a href="<?= base_url()?>account/listType">2-1-4 <?= $lang->line('2-1-4') ?></a></li>
						<li style='background-color:#F2F4ED'><a href="<?= base_url()?>bos/quote">2-2-1 <?= $lang->line('2-2-1') ?></a></li>
						<li style='background-color:#F2F4ED'><a href="<?= base_url()?>account/listType">2-2-3 <?= $lang->line('2-2-3') ?></a></li>
						<li><a href="<?= base_url()?>bos/pick">2-3-1 <?= $lang->line('2-3-1') ?></a></li>
						<li><a href="<?= base_url()?>account/listType">2-3-2 <?= $lang->line('2-3-2') ?></a></li>
						<li style='background-color:#F2F4ED'><a href="<?= base_url()?>bos/labor">2-4-1 <?= $lang->line('2-4-1') ?></a></li>
						<li style='background-color:#F2F4ED'><a href="<?= base_url()?>account/listType">2-4-2 <?= $lang->line('2-4-2') ?></a></li>
						<li style='background-color:#F2F4ED'><a href="<?= base_url()?>bos/feeoutbound">2-4-3 <?= $lang->line('2-4-3') ?></a></li>
						<li style='background-color:#F2F4ED'><a href="<?= base_url()?>bos/feeLabor">2-4-5 <?= $lang->line('2-4-5') ?></a></li>
					</ul>
				</li>
			</ul>
			<ul class="nav navbar-nav">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <?= $lang->line('CRM') ?><span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="<?= base_url()?>crm/client">3-1-1 <?= $lang->line('3-1-1') ?></a></li>
						<li><a href="<?= base_url()?>crm/employer">3-1-2 <?= $lang->line('3-1-2') ?></a></li>
						<li><a href="<?= base_url()?>crm/fee_client">3-1-3 <?= $lang->line('3-1-3') ?></a></li>
						<li><a href="<?= base_url()?>account/listCompany">3-1-5 <?= $lang->line('3-1-5') ?></a></li>
						<li style='background-color:#F2F4ED'><a href="<?= base_url()?>crm/salesschedule">3-2-1 <?= $lang->line('3-2-1') ?></a></li>
						<li style='background-color:#F2F4ED'><a href="<?= base_url()?>crm/listCompany">3-2-2 <?= $lang->line('3-2-2') ?></a></li>
						<li><a href="<?= base_url()?>crm/listCompany">3-3-1 <?= $lang->line('3-3-1') ?></a></li>
						<li><a href="<?= base_url()?>crm/translate">3-3-2 <?= $lang->line('3-3-2') ?></a></li>
						<li><a href="<?= base_url()?>crm/listCompany">3-3-4 <?= $lang->line('3-3-4') ?></a></li>
					</ul>
				</li>
			</ul>
			<ul class="nav navbar-nav">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <?= $lang->line('EAM') ?><span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="<?= base_url()?>eam/labor">4-1-1 <?= $lang->line('4-1-1') ?></a></li>
						<li><a href="<?= base_url()?>eam/labor2">4-1-2 <?= $lang->line('4-1-2') ?></a></li>
						<li><a href="<?= base_url()?>account/listType">4-1-3 <?= $lang->line('4-1-3') ?></a></li>
						<li><a href="<?= base_url()?>eam/fee_labor">4-1-4 <?= $lang->line('4-1-4') ?></a></li>
						<li><a href="<?= base_url()?>eam/fee_labor2">4-1-5 <?= $lang->line('4-1-5') ?></a></li>
						<li style='background-color:#F2F4ED'><a href="<?= base_url()?>eam/election">4-2-1 <?= $lang->line('4-2-1') ?></a></li>
						<li style='background-color:#F2F4ED'><a href="<?= base_url()?>account/listType">4-2-2 <?= $lang->line('4-2-2') ?></a></li>
						<li style='background-color:#F2F4ED'><a href="<?= base_url()?>eam/election_labor">4-2-3 <?= $lang->line('4-2-3') ?></a></li>
						<li style='background-color:#F2F4ED'><a href="<?= base_url()?>account/listType">4-2-4 <?= $lang->line('4-2-4') ?></a></li>
						<li><a href="<?= base_url()?>eam/tutor">4-3-1 <?= $lang->line('4-3-1') ?></a></li>
						<li><a href="<?= base_url()?>account/listCompany">4-3-2 <?= $lang->line('4-3-2') ?></a></li>
						<li style='background-color:#F2F4ED'><a href="<?= base_url()?>account/listCompany">4-4-1 <?= $lang->line('4-4-1') ?></a></li>
						<li style='background-color:#F2F4ED'><a href="<?= base_url()?>eam/course">4-4-2 <?= $lang->line('4-4-2') ?></a></li>
						<li style='background-color:#F2F4ED'><a href="<?= base_url()?>eam/curriculum">4-4-3 <?= $lang->line('4-4-3') ?></a></li>
						<li style='background-color:#F2F4ED'><a href="<?= base_url()?>eam/examination">4-4-4 <?= $lang->line('4-4-4') ?></a></li>
						<li style='background-color:#F2F4ED'><a href="<?= base_url()?>eam/labor_school">4-4-5 <?= $lang->line('4-4-5') ?></a></li>
						<li><a href="<?= base_url()?>eam/score">4-5-1 <?= $lang->line('4-5-1') ?></a></li>
						<li><a href="<?= base_url()?>account/listCompany">4-5-2 <?= $lang->line('4-5-2') ?></a></li>
						<li><a href="<?= base_url()?>account/listCompany">4-5-3 <?= $lang->line('4-5-3') ?></a></li>
						<li><a href="<?= base_url()?>account/listCompany">4-5-4 <?= $lang->line('4-5-4') ?></a></li>
						<li><a href="<?= base_url()?>account/listCompany">4-5-5 <?= $lang->line('4-5-5') ?></a></li>
						<li><a href="<?= base_url()?>account/listCompany">4-5-6 <?= $lang->line('4-5-6') ?></a></li>
						<li><a href="<?= base_url()?>account/listCompany">4-5-7 <?= $lang->line('4-5-7') ?></a></li>
					</ul>
				</li>
			</ul>
			<ul class="nav navbar-nav">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <?= $lang->line('EDC') ?><span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="<?= base_url()?>docmanage/letter">5-1-1 <?= $lang->line('5-1-1') ?></a></li>
						<li><a href="<?= base_url()?>docmanage/letter_inbound">5-1-2 <?= $lang->line('5-1-2') ?></a></li>
						<li><a href="<?= base_url()?>docmanage/packageTitle">5-1-3 <?= $lang->line('5-1-3') ?></a></li>
						<li><a href="<?= base_url()?>docmanage/packageDetail">5-1-4 <?= $lang->line('5-1-4') ?></a></li>
						<li><a href="<?= base_url()?>docmanage/report">5-1-5 <?= $lang->line('5-1-5') ?></a></li>
						<li style='background-color:#F2F4ED'><a href="<?= base_url()?>docmanage/docSign">5-2-1 <?= $lang->line('5-2-1') ?></a></li>
						<li style='background-color:#F2F4ED'><a href="<?= base_url()?>docmanage/doc_internal">5-2-2 <?= $lang->line('5-2-2') ?></a></li>
					</ul>
				</li>
			</ul>
			<ul class="nav navbar-nav">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <?= $lang->line('FIS') ?><span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="<?= base_url()?>account/listType">6-1-1 <?= $lang->line('6-1-1') ?></a></li>
						<li><a href="<?= base_url()?>account/listType">6-1-2 <?= $lang->line('6-1-2') ?></a></li>
						<li><a href="<?= base_url()?>account/listType">6-1-3 <?= $lang->line('6-1-3') ?></a></li>
						<li><a href="<?= base_url()?>account/listType">6-1-4 <?= $lang->line('6-1-4') ?></a></li>
						<li><a href="<?= base_url()?>account/listType">6-1-5 <?= $lang->line('6-1-5') ?></a></li>
						<li><a href="<?= base_url()?>account/listType">6-1-6 <?= $lang->line('6-1-6') ?></a></li>
						<li><a href="<?= base_url()?>account/listType">6-1-7 <?= $lang->line('6-1-7') ?></a></li>
						<li><a href="<?= base_url()?>account/listType">6-1-8 <?= $lang->line('6-1-8') ?></a></li>
						<li style='background-color:#F2F4ED'><a href="<?= base_url()?>account/listCompany">6-2-1 <?= $lang->line('6-2-1') ?></a></li>
						<li style='background-color:#F2F4ED'><a href="<?= base_url()?>account/listCompany">6-2-2 <?= $lang->line('6-2-2') ?></a></li>
						<li style='background-color:#F2F4ED'><a href="<?= base_url()?>account/listCompany">6-2-3 <?= $lang->line('6-2-3') ?></a></li>
						<li><a href="<?= base_url()?>account/listType">6-3-1 </a></li>
						<li style='background-color:#F2F4ED'><a href="<?= base_url()?>account/listCompany">6-4-1 </a></li>
					</ul>
				</li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
<?php if (($this->session->userdata('role') == ROLE_ADMIN) || $this->session->userdata('role') == ROLE_SERVICE_S): ?>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> <?= $lang->line('BAS') ?><span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="<?= base_url()?>config/country">1-1-1 <?= $lang->line('1-1-1') ?></a></li>
						<li><a href="<?= base_url()?>config/school">1-1-2 <?= $lang->line('1-1-2') ?></a></li>
						<li><a href="<?= base_url()?>config/account">1-1-3 <?= $lang->line('1-1-3') ?></a></li>
						<li><a href="<?= base_url()?>config/airline">1-1-4 <?= $lang->line('1-1-4') ?></a></li>
						<li><a href="<?= base_url()?>config/flight">1-1-5 <?= $lang->line('1-1-5') ?></a></li>
						<li><a href="<?= base_url()?>config/hotel">1-1-6 <?= $lang->line('1-1-6') ?></a></li>
						<li><a href="<?= base_url()?>config/room">1-1-7 <?= $lang->line('1-1-7') ?></a></li>
						<li><a href="<?= base_url()?>config/currency">1-1-8 <?= $lang->line('1-1-8') ?></a></li>
						<li><a href="<?= base_url()?>config/area">1-1-9 <?= $lang->line('1-1-9') ?></a></li>
						<li><a href="<?= base_url()?>config/industry">1-1-10 <?= $lang->line('1-1-10') ?></a></li>
						<li><a href="<?= base_url()?>config/auth">1-1-11 <?= $lang->line('1-1-11') ?></a></li>
						<li style='background-color:#F2F4ED'><a href="<?= base_url()?>config/emp_position">1-2-1 <?= $lang->line('1-2-1') ?></a></li>
						<li style='background-color:#F2F4ED'><a href="<?= base_url()?>config/emp_dep">1-2-2 <?= $lang->line('1-2-2') ?></a></li>
						<li style='background-color:#F2F4ED'><a href="<?= base_url()?>config/emp">1-2-3 <?= $lang->line('1-2-3') ?></a></li>
						<li><a href="<?= base_url()?>config/fee">1-3-1 <?= $lang->line('1-3-1') ?></a></li>
						<li><a href="<?= base_url()?>config/country_fee">1-3-2 <?= $lang->line('1-3-2') ?></a></li>
					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> <?= $lang->line('ETC') ?><span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="<?= base_url()?>config2/talk">1-4-1 <?= $lang->line('1-4-1') ?></a></li>
						<li><a href="<?= base_url()?>config2/talkmethod">1-4-2 <?= $lang->line('1-4-2') ?></a></li>
						<li><a href="<?= base_url()?>config2/trans">1-4-3 <?= $lang->line('1-4-3') ?></a></li>
						<li><a href="<?= base_url()?>config2/reasonschool">1-4-4 <?= $lang->line('1-4-4') ?></a></li>
						<li><a href="<?= base_url()?>config2/reasongiveup">1-4-5 <?= $lang->line('1-4-5') ?></a></li>
						<li style='background-color:#F2F4ED'><a href="<?= base_url()?>config2/doc/<?= DOC_TYPE_LETTER?>">1-5-1 <?= $lang->line('1-5-1') ?></a></li>
						<li style='background-color:#F2F4ED'><a href="<?= base_url()?>config2/doc/<?= DOC_TYPE_SIGN?>">1-5-2 <?= $lang->line('1-5-2') ?></a></li>
						<li style='background-color:#F2F4ED'><a href="<?= base_url()?>config2/doc/<?= DOC_TYPE_INSIDE?>">1-5-3 <?= $lang->line('1-5-3') ?></a></li>
						<li style='background-color:#F2F4ED'><a href="<?= base_url()?>config2/doc/<?= DOC_TYPE_LETTER_BACK?>">1-5-4 <?= $lang->line('1-5-4') ?></a></li>
						<li><a href="<?= base_url()?>config2/schooltime">1-6-1 <?= $lang->line('1-6-1') ?></a></li>
						<li><a href="<?= base_url()?>config2/schoolclass">1-6-2 <?= $lang->line('1-6-2') ?></a></li>
						<li><a href="<?= base_url()?>config2/doc/<?= ETC_TYPE_RACE?>">1-6-3 <?= $lang->line('1-6-3') ?></a></li>
						<li><a href="<?= base_url()?>config2/doc/<?= ETC_TYPE_SHIFT?>">1-6-4 <?= $lang->line('1-6-4') ?></a></li>
						<li><a href="<?= base_url()?>config2/doc/<?= ETC_TYPE_OVERTIME?>">1-6-5 <?= $lang->line('1-6-5') ?></a></li>
						<li><a href="<?= base_url()?>config2/worker_type">1-6-6 <?= $lang->line('1-6-6') ?></a></li>
						<li><a href="<?= base_url()?>config2/doc/<?= ETC_TYPE_FAITH?>">1-6-7 <?= $lang->line('1-6-7') ?></a></li>
						<li><a href="<?= base_url()?>config2/doc/<?= ETC_TYPE_PICK?>">1-6-8 <?= $lang->line('1-6-8') ?></a></li>
					</ul>
				</li>
<?php endif; ?>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class='glyphicon glyphicon-globe'></span> Language <span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href='<?=base_url(); ?>langswitch/switchLanguage/tw'><?php if($this->session->userdata('site_lang') == 'tw'):?><span class="glyphicon glyphicon-ok"></span><?php endif;?> 正體中文</a></li>
						<li><a href='<?=base_url(); ?>langswitch/switchLanguage/en'><?php if($this->session->userdata('site_lang') == 'en'):?><span class="glyphicon glyphicon-ok"></span><?php endif;?> English</a></li>
					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?= $account ?><span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="<?= base_url()?>account/changePassword"><?= $lang->line('changePassword') ?></a></li>
						<li class="divider"></li>
						<li><a href="<?= base_url()?>account/doLogout"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>登出</a></li>
					</ul>
				</li>
			</ul>

		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>
