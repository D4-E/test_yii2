<?php

$config = (file_exists(__DIR__ . '/_config_local_db.php')) ?  require(__DIR__ . '/_config_local_db.php') : require(__DIR__ . '/_config.php');

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host='.$config['host'].';dbname='.$config['dbname'],
    'username' => $config['username'],
    'password' => $config['password'],
    'charset' => 'utf8',
    'tablePrefix' => $config['tablePrefix'],
    'on afterOpen' => function($event) {
        $event->sender->createCommand("SET time_zone='+03:00';")->execute();
    },

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];