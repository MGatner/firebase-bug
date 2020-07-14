<?php

/**
 * index.php
 *
 * Bootstrap the project
 */

chdir(__DIR__);
$app = require __DIR__ . '/bootstrap.php';
require ROOTPATH . 'vendor/autoload.php';

$app->initialize();
echo $app->run() . PHP_EOL;
