<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8" />
	<title>Login</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<!-- BEGIN GLOBAL MANDATORY STYLES -->
	<link href="<?= base_url()?>assets/login/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?= base_url()?>assets/login/plugins/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?= base_url()?>assets/login/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?= base_url()?>assets/login/css/style-metro.css" rel="stylesheet" type="text/css"/>
	<link href="<?= base_url()?>assets/login/css/style.css" rel="stylesheet" type="text/css"/>
	<link href="<?= base_url()?>assets/login/css/style-responsive.css" rel="stylesheet" type="text/css"/>
	<link href="<?= base_url()?>assets/login/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
	<link href="<?= base_url()?>assets/login/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/login/plugins/select2/select2_metro.css" />
	<!-- END GLOBAL MANDATORY STYLES -->
	<!-- BEGIN PAGE LEVEL STYLES -->
	<link href="<?= base_url()?>assets/login/css/pages/login-soft.css" rel="stylesheet" type="text/css"/>
	<link href="<?= base_url()?>assets/css/login_g.css" rel="stylesheet" type="text/css"/>
	<!-- END PAGE LEVEL STYLES -->
	<link rel="shortcut icon" href="favicon.ico" />
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="login">
	<!-- BEGIN LOGO -->
	<div class="logo">
	</div>
	<!-- END LOGO -->
	<!-- BEGIN LOGIN -->
	<div class="content">
		<!-- BEGIN LOGIN FORM -->
		<form class="form-vertical login-form" id="form1" method="post">
			<input type='hidden' id='baseUrl' value='<?= base_url()?>'>
			<div class="text-center">
				<img src="http://placekitten.com/g/150/260">
			</div>
			<h3 class="form-title text-center">查詢系統</h3>
			<div class="alert alert-error hide">
				<button class="close" data-dismiss="alert"></button>
				<span>Enter any username and password.</span>
			</div>
			<div class="control-group">
				<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
				<label class="control-label visible-ie8 visible-ie9">Username</label>
				<div class="controls">
					<div class="input-icon left">
						<i class="icon-user"></i>
						<input class="m-wrap placeholder-no-fix" type="text" name="txt_loginAccount" id="txt_loginAccount" placeholder="Account"/>
					</div>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label visible-ie8 visible-ie9">Password</label>
				<div class="controls">
					<div class="input-icon left">
						<i class="icon-lock"></i>
						<input class="m-wrap placeholder-no-fix" type="password" name="txt_loginPassword" id="txt_loginPassword" placeholder="Password"/>
					</div>
				</div>
			</div>
			<div class="control-group">
				<div class="controls">
					<div class="g-recaptcha" data-sitekey="6LfwBQgTAAAAABHY3S-tCzyET_wfOnDRpMl99GyX"></div>
				</div>
			</div>
			<div class="form-actions">

				<button id='btn_login' type="button" class="btn blue pull-right">
				Login <i class="m-icon-swapright m-icon-white"></i>
				</button>            
			</div>
			<div class="forget-password">
			</div>
			<div class="create-account">
				<p>
					Developed by Fisher.
				</p>
			</div>
		</form>
		<!-- END LOGIN FORM -->        

	</div>
	<div class='modal fade'>
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h2 class="modal-title">Loading...</h2>
				</div>
					<div class='ea'>
						<img src='http://placekitten.com/g/64/64'>
					</div>
			</div>
		</div>
	</div>
	<!-- END LOGIN -->
	<!-- BEGIN COPYRIGHT -->
	<div class="copyright">
	</div>
	<!-- END COPYRIGHT -->
	<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
	<!-- BEGIN CORE PLUGINS -->   <script src="<?= base_url()?>assets/login/plugins/jquery-1.10.1.min.js" type="text/javascript"></script>
	<script src="<?= base_url()?>assets/login/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
	<!-- IMPORTANT! Load jquery-ui-1.10.1.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
	<script src="<?= base_url()?>assets/login/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>      
	<script src="<?= base_url()?>assets/login/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?= base_url()?>assets/login/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js" type="text/javascript" ></script>
	<!--[if lt IE 9]>
	<script src="<?= base_url()?>assets/login/plugins/excanvas.min.js"></script>
	<script src="<?= base_url()?>assets/login/plugins/respond.min.js"></script>  
	<![endif]-->   
	<script src="<?= base_url()?>assets/login/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
	<script src="<?= base_url()?>assets/login/plugins/jquery.blockui.min.js" type="text/javascript"></script>  
	<script src="<?= base_url()?>assets/login/plugins/jquery.cookie.min.js" type="text/javascript"></script>
	<script src="<?= base_url()?>assets/login/plugins/uniform/jquery.uniform.min.js" type="text/javascript" ></script>
	<!-- END CORE PLUGINS -->
	<!-- BEGIN PAGE LEVEL PLUGINS -->
	<script src="<?= base_url()?>assets/login/plugins/jquery-validation/dist/jquery.validate.min.js" type="text/javascript"></script>
	<script src="<?= base_url()?>assets/login/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="<?= base_url()?>assets/login/plugins/select2/select2.min.js"></script>
	<!-- END PAGE LEVEL PLUGINS -->
	<!-- BEGIN PAGE LEVEL SCRIPTS -->
	<script src='https://www.google.com/recaptcha/api.js'></script>
	<script src="<?= base_url()?>assets/login/scripts/app.js" type="text/javascript"></script>
	<script src="<?= base_url()?>assets/login/scripts/login-soft.js" type="text/javascript"></script>      
	<script src="<?= base_url()?>assets/js/account.js" type="text/javascript"></script>      
	<!-- END PAGE LEVEL SCRIPTS --> 
	<script>
		jQuery(document).ready(function() {     
		  App.init();
		  Login.init();
		});
	</script>
	<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>