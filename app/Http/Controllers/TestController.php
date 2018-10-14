<?php

namespace App\Http\Controllers;

class TestController extends Controller
{

    /**
     * 函数名: index
     * 作用:
     * 参数:
     * @param $a
     * 作者: dudu
     * 时间: 2018/10/01
     * 返回值:
     * @return \stdClass
     */
    public function index()
    {

        $params = [
            'app_id'             => 'sdfa',
            'user_id'            => '', //下单用户ID
            'team_buy_user_type' => '1', //成员身份 0-团员 / 1-团长
            'team_buy_id'        => '20.2', //大团ID
            'team_buy_task_id'   => '0', //小团ID, 团长可留空
        ];
        $rules = [
            'app_id'             => 'required|string',
            'user_id'            => 'string', //下单用户ID
            'team_buy_user_type' => 'required|bool', //成员身份 0-团员 / 1-团长
            'team_buy_id'        => 'required|between:0,100', //大团ID
            'team_buy_task_id'   => 'required|integer|min:0', //小团ID, 团长可留空
        ];

        $validator = \Validator::make($params, $rules);
        $validator->fails();

        var_dump($validator->errors()->all());

    }

    private function checkParams($params)
    {


        return true;
    }

}