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

define('SITE_TITLE', 	'Bookmart Online Store');
define('META_DESC', 	'Bookmart Online Store - Ebooks');
define('META_KEYWORDS', 'Bookmart Online Store - Ebooks');

define('UPLOADS_PATH',  'C:/xampp/htdocs/bookmart/uploads/');
define('EBOOKS_PATH', 	'C:/xampp/htdocs/books/');
define('THUMBS_PATH', 	UPLOADS_PATH.'thumbs/');

define('PRODUCTS_LIMIT', 		20);
define('PRODUCTS_LIMIT_BM', 	18);
define('CATEGORIES_LIMIT', 		20);
define('PAGES_LIMIT', 			20);
define('USERS_LIMIT',           20);
define('ORDERS_LIMIT', 			20);

define('SALT_RESET_CODE', '23476@@*#$');

//sandbox url   - https://www.sandbox.paypal.com/cgi-bin/webscr
//live url      - https://www.paypal.com/cgi-bin/webscr
define('PAYPAL_CHECKOUT_URL', 	 'https://www.sandbox.paypal.com/cgi-bin/webscr');
define('PAYPAL_RECEIVER_EMAIL',  'payments@bookmart.com');
define('CURRENCY_CODE',          'USD');
define('CURRENCY_SYMBOL',         '$');

//SMTP params for auto emails
define('SMTP_HOST', 	'smtp.mediamaxx.in');
define('SMTP_PORT', 	25);
define('SMTP_USER', 	'info@bookmart.mediamaxx.in');
define('SMTP_PASS', 	'password@0');

/* End of file constants.php */
/* Location: ./application/config/constants.php */