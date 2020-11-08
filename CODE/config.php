<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

date_default_timezone_set("Asia/Bangkok");

// DATABASE CONNECT SETTINGS (REQUIRED)
define('DB_HOST', '<<EDIT>>'); // Database host 
define('DB_PORT', 3306); // Enter the database port for your mysql server
define('DB_USER', '<<EDIT>>'); // Database user 
define('DB_PASS', '<<EDIT>>'); // Database password 
define('DB_NAME', '<<EDIT>>'); // Database name 

// OTHER SETTINGS (YOU DON'T NEED TO CHANGE THIS IF YOU ARE NOT SURE)
define('DB_PREFIX', ''); // Database prefix use (a-z) and (_), for example: cms_ 
define('DB_CHARSET', 'utf8'); // Mysql charset
define('DB_COLLATE', 'utf8_general_ci'); // Don't change if you are not sure



// CONNECT TO DATABASE
$dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=".DB_CHARSET.";port=".DB_PORT;
$opt = [
		PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
		PDO::ATTR_EMULATE_PREPARES   => false,
		PDO::ATTR_PERSISTENT => true,
];
try {	
	$conn = new PDO($dsn, DB_USER, DB_PASS, $opt);
	
}
catch (PDOException $e) {
    print "Error! " . $e->getMessage() . "<br/>";
    die();
}

if (!extension_loaded('pdo') )
{
	exit('<strong>FATAL ERROR! This software requires PDO extension (PHP Data Objects).</strong> Please contact your hosting!<br /><br />Read more about <a href="http://php.net/manual/en/book.pdo.php" target="_blank">PHP PDO</a>');
}

// LINE Config
$client_id = '<<EDIT>>';
$client_secret = '<<EDIT>>';
$callback_url = '<<EDIT>>';
$api_url = 'https://notify-bot.line.me/oauth/token';

// NOTE 
/*
1.สร้าง Service Provider Url https://notify-bot.line.me/en/
เพื่อให้ได้มาซึ่ง client_id และ client_secret
*/