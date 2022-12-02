<?php

namespace App\Repository;

use  \App\Lib\Session;

class Connection
{

    private static $mainInstance = null;

    public static function getMainInstance()
    {
        if (self::$mainInstance === null) {
            return new MysqliDb(array(
                'host' => MAIN_DB_USER_HOST,
                'username' => MAIN_DB_USER,
                'password' => MAIN_DB_PASSWORD,
                'db' => MAIN_DB,
                'port' => 3306,
                'prefix' => '',
                'charset' => 'utf8'
            ));
        }
        return self::$mainInstance;
    }

}
