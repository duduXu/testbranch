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
        $app_id = array_get($params, 'app_id');
        if (Utils::isValidId($app_id) == false) {
            return false;
        }

        $user_id = array_get($params, 'user_id');
        if (empty($user_id) == false && Utils::isValidId($user_id) == false) {
            return false;
        }

        $team_buy_user_type = array_get($params, 'team_buy_user_type');
        if (Utils::isValidNumber($team_buy_user_type) == false) {
            return false;
        }

        $team_buy_id = array_get($params, 'team_buy_id');
        if (Utils::isValidId($team_buy_id) == false) {
            return false;
        }

        $team_buy_task_id = array_get($params, 'team_buy_task_id');
        if (empty($team_buy_task_id) == false && Utils::isValidId($team_buy_task_id) == false) {
            return false;
        }

        return true;
    }

}