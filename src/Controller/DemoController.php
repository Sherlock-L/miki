<?php

namespace Miki\Controller;

use Miki\Model\User;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DemoController
{
    public function createAction($request)
    {
        // 插入数据示例
        //$result = $db->insert('user', [
        //    'nickname'   => '水文',
        //    'username'   => 'shuiwen' . rand(1, 10000),
        //    'password'   => '98998989',
        //    'fullname'   => '刘水文',
        //    'updated_at' => date('Y-m-d H:i:s'),
        //]);
        $counter = [];

        $a = User::model()->findByPk(1);

        $b = User::model()->findByPk(4)->toArray();

        return new JsonResponse(['name' => '水文', 'age' => 22, 'a' => (array)$a, 'b' => $b, 'counter' => $counter]);
    }
}