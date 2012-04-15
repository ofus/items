<?php

require_once 'library/vendor/Doctrine/lib/vendor/doctrine-common/lib/Doctrine/Common/ClassLoader.php';

$classLoader = new \Doctrine\Common\ClassLoader('Doctrine\ORM', realpath(__DIR__ . '/library/vendor/Doctrine/lib'));
$classLoader->register();
$classLoader = new \Doctrine\Common\ClassLoader('Doctrine\DBAL', realpath(__DIR__ . '/library/vendor/Doctrine/lib/vendor/doctrine-dbal/lib'));
$classLoader->register();
$classLoader = new \Doctrine\Common\ClassLoader('Doctrine\Common', realpath(__DIR__ . '/library/vendor/Doctrine/lib/vendor/doctrine-common/lib'));
$classLoader->register();
$classLoader = new \Doctrine\Common\ClassLoader('Symfony', realpath(__DIR__ . '/library/vendor/Doctrine/lib/vendor'));
$classLoader->register();
$classLoader = new \Doctrine\Common\ClassLoader('Entity', realpath(__DIR__ . '/library/Application'));
$classLoader->register();
$classLoader = new \Doctrine\Common\ClassLoader('Proxy',  realpath(__DIR__ . '/library/Skeleton'));
$classLoader->register();

$config = new \Doctrine\ORM\Configuration();
$config->setMetadataCacheImpl(new \Doctrine\Common\Cache\ArrayCache);
$driverImpl = $config->newDefaultAnnotationDriver(array(__DIR__."/library/Application/Entity"));
$config->setMetadataDriverImpl($driverImpl);

$config->setProxyDir(__DIR__ . '/Proxy');
$config->setProxyNamespace('Proxy');

$connectionOptions = array(
    array(
        'driver'    => 'pdo_sqlite',
        'path'      => 'database.sqlite',
    ), array(
        'driver'    => 'pdo_mysql',
        'dbname'    => 'items',
        'host'      => 'localhost',
        'user'      => 'root',
        'password'  => '',
    ),
);

$em = \Doctrine\ORM\EntityManager::create($connectionOptions[0], $config);

$helpers = array(
    'db' => new \Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper($em->getConnection()),
    'em' => new \Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper($em)
);