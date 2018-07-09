<?php

abstract class ObjectFactoryService{
    public static $pdo;
    public static $config;
    public static $models = [];

    public static function getDb(array $connectParams = null)
    {
        if (!self::$pdo) {
            try {
                $config = [PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION];
                self::$pdo = new PDO($connectParams['db']['dsn'],
                    $connectParams['db']['user'],
                    $connectParams['db']['pass'],
                    $config);
            } catch (PDOException $e) {
                echo 'Failed connection' . $e->getMessage();
            }
        }
        return self::$pdo;
    }

    public static function getConfig()
    {
        if (!self::$config) {
            self::$config = require 'Config/config.php';
        }
        return self::$config;
    }

    public static function getModel($model, $config)
    {
        require 'model/ItemModel.php';
        if (!isset(self::$models[$model])){
            self::$models[$model] = new $model(self::getDb($config));
        }
        return self::$models[$model];
    }
}