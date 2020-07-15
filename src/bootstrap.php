<?php

require __DIR__.'/../vendor/autoload.php';

error_reporting(-1);
ini_set('display_errors', '1');
defined('SHOW_DEBUG_BACKTRACE') || define('SHOW_DEBUG_BACKTRACE', true);

if (!getenv('GOOGLE_APPLICATION_CREDENTIALS')) {
    putenv('GOOGLE_APPLICATION_CREDENTIALS='.__DIR__.'/../credentials/firebase.json');
}
