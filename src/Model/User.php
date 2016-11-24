<?php
namespace Miki\Model;

class User extends Model
{
    public $counter = 0;

    public function __construct()
    {
        $this->counter++;
    }

    //public function getTableName()
    //{
    //    return 'user';
    //}

    /**
     * @param $pk
     * @return static
     */
    public function findByPk($pk)
    {
        $data = self::getDb()->get(strtolower(str_replace(__NAMESPACE__ . '\\', '', __CLASS__)), '*', ['id' => $pk]);

        foreach ($data as $key => $val) {
            $this->$key = $val;
        }
        return $this;
    }
}