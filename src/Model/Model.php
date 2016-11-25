<?php
namespace Miki\Model;

class Model
{
    private static $models = array();

    private $aa;

    /**
     * @var \medoo
     */
    private static $db;

    public static function setDb($db)
    {
        self::$db = $db;
    }

    public static function getDb()
    {
        return self::$db;
    }

    /**
     * @param null $className
     * @return static
     */
    public static function model($className = null)
    {
        if (empty($className)) {
            $className = static::class;
        }

        if (!array_key_exists($className, self::$models)) {
            self::$models[$className] = new $className();
        }
        return self::$models[$className];
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return get_object_vars($this);
    }
}