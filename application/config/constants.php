<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');

define('ROLE_ADMIN',		'99');
define('ROLE_VP',			'15');
define('ROLE_FINANCE_IN_S',	'14');
define('ROLE_FINANCE_IN',	'13');
define('ROLE_FINANCE_OUT_S','12');
define('ROLE_FINANCE_OUT',	'11');
define('ROLE_GENERAL_S',	'10');
define('ROLE_GENERAL',		'9');
define('ROLE_SCHOOL_S',		'8');
define('ROLE_SCHOOL',		'7');
define('ROLE_TRANS_S',		'6');
define('ROLE_TRANS',		'5');
define('ROLE_SERVICE_S',	'4');
define('ROLE_SERVICE',		'3');
define('ROLE_SALES_S',		'2');
define('ROLE_SALES',		'1');

define('DOC_TYPE_LETTER',			'5.1');
define('DOC_TYPE_SIGN',				'5.2');
define('DOC_TYPE_INSIDE',			'5.3');
define('DOC_TYPE_LETTER_BACK',		'5.4');
define('ETC_TYPE_RACE',				'6.3');
define('ETC_TYPE_SHIFT',			'6.4');
define('ETC_TYPE_OVERTIME',			'6.5');
define('ETC_TYPE_FAITH',			'6.7');
define('ETC_TYPE_PICK',				'6.8');

define('COUNTRY_ID_ID',				'9');
define('COUNTRY_ID_PH',				'12');
define('COUNTRY_ID_VN',				'13');

define('LETTER_TYPE_RECRUIT', '1');
define('LETTER_TYPE_VISA', '2');

define('WORKER_TYPE_FACTORY',		'1');
define('WORKER_TYPE_MAID',			'2');
define('WORKER_TYPE_CARE',			'3');
define('WORKER_TYPE_TRANS',			'4');
define('WORKER_TYPE_FISHER',		'5');

define('WORKER_KIND_NEW',			'1');
define('WORKER_KIND_INTRODUCE',		'2');
define('WORKER_KIND_POINT',			'3');
define('WORKER_KIND_POINT_RETURN',	'4');
define('WORKER_KIND_DIRECT',		'5');

define('KEY_GOOGLE_CAPTCHA', '6LfwBQgTAAAAAB2KOjOzXYbgNRwOZlyyPmAyftlv');
define('URL_GOOGLE_CAPTCHA', 'https://www.google.com/recaptcha/api/siteverify');

define('JSON_NETWORK_TYPE',json_encode(array(
	1 => '無網路',
	2 => '免費網路',
	3 => '自費網路'
)));
define('JSON_WORKER_TYPE',json_encode(array(
	WORKER_TYPE_FACTORY => '廠工',
	WORKER_TYPE_MAID => '女傭',
	WORKER_TYPE_CARE => '養護工',
	WORKER_TYPE_TRANS => '雙語人員',
	WORKER_TYPE_FISHER => '漁工'
)));
define('JSON_WORKER_KIND',json_encode(array(
	WORKER_KIND_NEW => '新工',
	WORKER_KIND_INTRODUCE => '介紹工',
	WORKER_KIND_POINT => '指定工',
	WORKER_KIND_POINT_RETURN => '指定回鍋工',
	WORKER_KIND_DIRECT => '直聘工'
)));
define('JSON_MAN_RECEIVE',json_encode(array(
	1 => '勞工',
	2 => '雇主',
	3 => '客戶',
	4 => '介紹中心'
)));
define('JSON_METHOD_RECEIVE',json_encode(array(
	1 => '勞工自行付款',
	2 => '由台灣收款'
)));
define('JSON_LANGUAGE',json_encode(array(
	1 => '中文',
	2 => '英文',
	3 => '台語',
	4 => '客語'
)));
define('JSON_LEVEL',json_encode(array(
	1 => '佳',
	2 => '尚可',
	3 => '學習中',
	4 => '完全不會'
)));
define('JSON_EDUCATION',json_encode(array(
	1 => '不拘',
	2 => '小學',
	3 => '國中',
	4 => '高職',
	5 => '高中',
	6 => '大專',
	7 => '大學',
	8 => '碩士',
	9 => '博士',
	10 => '其他'
)));
define('JSON_FOOD',json_encode(array(
	1 => '葷',
	2 => '素',
	3 => '葷，不食豬肉',
	4 => '願意配合雇主'	
)));
define('JSON_MARRIAGE',json_encode(array(
	1 => '不拘',
	2 => '已婚',
	3 => '未婚',
	4 => '離婚',
	5 => '喪偶',
	6 => '分居'
)));
define('JSON_ARRSPOT',json_encode(array(
	1 => '桃園機場',
	2 => '台中機場',
	3 => '高雄機場'
)));
define('JSON_FEETYPE',json_encode(array(
	1 => '收',
	2 => '支',
	3 => '退'
)));
define('JSON_STATUS_CASE',json_encode(array(
	0 => '已結案',
	1 => '進行中'
)));


/* End of file constants.php */
/* Location: ./application/config/constants.php */