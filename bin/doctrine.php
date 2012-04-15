<?php
// Define path to application directory
defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));
defined('LIBRARY_PATH')
	|| define('LIBRARY_PATH', realpath(APPLICATION_PATH . '/../library'));
defined('DOCTRINE_PATH')
	|| define('DOCTRINE_PATH', realpath(APPLICATION_PATH . '/../library/vendor/Doctrine'));
// Ensure library/ is on include_path
set_include_path(implode(PATH_SEPARATOR, array(
    LIBRARY_PATH,
	DOCTRINE_PATH,
    realpath(DOCTRINE_PATH . '/lib'),
    realpath(DOCTRINE_PATH . '/lib/vendor'),
    realpath(DOCTRINE_PATH . '/lib/vendor/doctrine-common/lib'),
    realpath(DOCTRINE_PATH . '/lib/vendor/doctrine-dbal/lib'),
    get_include_path(),
)));

require_once 'Doctrine/Common/ClassLoader.php';

$classLoader = new \Doctrine\Common\ClassLoader('Doctrine');
$classLoader->register();
$classLoader = new \Doctrine\Common\ClassLoader('Symfony', realpath(DOCTRINE_PATH . '/lib/vendor'));
//$classLoader = new \Doctrine\Common\ClassLoader('Symfony', 'Doctrine');

$classLoader->register();

$configFile = getcwd() . DIRECTORY_SEPARATOR . 'cli-config.php';

$helperSet = null;
if (file_exists($configFile)) {
    if ( ! is_readable($configFile)) {
        trigger_error(
            'Configuration file [' . $configFile . '] does not have read permission.', E_ERROR
        );
    }

    require $configFile;

    foreach ($GLOBALS as $helperSetCandidate) {
        if ($helperSetCandidate instanceof \Symfony\Component\Console\Helper\HelperSet) {
            $helperSet = $helperSetCandidate;
            break;
        }
    }
}

$helperSet = ($helperSet) ?: new \Symfony\Component\Console\Helper\HelperSet();

\Doctrine\ORM\Tools\Console\ConsoleRunner::run($helperSet);
