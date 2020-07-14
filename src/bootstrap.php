<?php

error_reporting(-1);
ini_set('display_errors', '1');
defined('SHOW_DEBUG_BACKTRACE') || define('SHOW_DEBUG_BACKTRACE', true);

/**
 * The path to the application directory.
 */
if (! defined('APPPATH'))
{
	define('APPPATH', realpath(__DIR__) . DIRECTORY_SEPARATOR);
}

/**
 * The path to the project root directory. Just above APPPATH.
 */
if (! defined('ROOTPATH'))
{
	define('ROOTPATH', realpath(APPPATH . '../') . DIRECTORY_SEPARATOR);
}

/**
 * The path to the writable directory.
 */
if (! defined('WRITEPATH'))
{
	define('WRITEPATH', realpath(ROOTPATH . 'logs') . DIRECTORY_SEPARATOR);
}

/**
 * The path to our credentials.
 */
if (! defined('AUTHPATH'))
{
	define('AUTHPATH', realpath(ROOTPATH . 'credentials') . DIRECTORY_SEPARATOR);
}

/**
 * Set the credentials path in environment.
 */
$credentials = AUTHPATH . 'firebase.json';

if (! getenv('FIREBASE_CREDENTIALS', true))
{
	putenv('FIREBASE_CREDENTIALS=' . $credentials);
}
if (empty($_ENV['FIREBASE_CREDENTIALS']))
{
	$_ENV['FIREBASE_CREDENTIALS'] = $credentials;
}
if (empty($_SERVER['FIREBASE_CREDENTIALS']))
{
	$_SERVER['FIREBASE_CREDENTIALS'] = $credentials;
}

// Get our App instance
require_once(APPPATH . 'App.php');
$app = new App();

return $app;
