<?php
// the entry script URL (without host info) for functional and acceptance tests
// PLEASE ADJUST IT TO THE ACTUAL ENTRY SCRIPT URL
defined('TEST_ENTRY_URL') or define('TEST_ENTRY_URL', '/frontend/web/index-test.php');

// the entry script file path for functional and acceptance tests
defined('TEST_ENTRY_FILE') or define('TEST_ENTRY_FILE', dirname(__DIR__) . '/web/index-test.php');

defined('YII_DEBUG') or define('YII_DEBUG', true);

defined('YII_ENV') or define('YII_ENV', 'test_unit');

$autoloadPath = __DIR__ . '/../../../autoload.php';
$yiiPath = __DIR__ . '/../../../yiisoft/yii2/Yii.php';
if (!file_exists($autoloadPath)) {//For travis
    $autoloadPath = __DIR__ . '/../vendor/autoload.php';
    $yiiPath = __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';
}

require_once($autoloadPath);
require_once($yiiPath);

//require(__DIR__ . '/../../common/config/aliases.php');

// set correct script paths
$_SERVER['SCRIPT_FILENAME'] = TEST_ENTRY_FILE;
$_SERVER['SCRIPT_NAME'] = TEST_ENTRY_URL;
$_SERVER['SERVER_NAME'] = 'localhost';