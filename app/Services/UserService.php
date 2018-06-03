<?php
/**
 * Created by PhpStorm.
 * User: namet
 * Date: 2018/5/12
 * Time: 23:17
 */

namespace App\Services;

use App\OauthUser;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserService extends BaseService
{
    public function loginByOauth2($infos)
    {
        $oauth_info = OauthUser::where(['uid' => $infos['uid'], 'oauth_name' => $infos['driver'],])->first();

        if (!$oauth_info) {
            $user_id = $this->createUserByOauth2($infos);
        } else {
            $user_id = $oauth_info['user_id'];
        }

        return $this->loginByUserId($user_id);
    }

    public function createUserByOauth2($infos)
    {
        $user_id = 0;
        DB::transaction(function () use($infos, &$user_id) {
            $user = User::create([
                'username' => $infos['uname'],
                'avatar' => $infos['avatar'],
                'remember_token' => bcrypt($infos['uname'] . '#' . time()),
                'api_token' => mt_rand(1000000, 9999999),
            ]);

            OauthUser::create([
                'user_id' => $user->id,
                'oauth_name' => $infos['driver'],
                'uid' => $infos['uid'],
                'uname' => $infos['uname'],
                'avatar' => $infos['avatar'],
                'access_token' => $infos['access_token'] ?: '',
                'expire_time' => $infos['expire_time'] ?: 0,
                'refresh_token' => $infos['refresh_token'] ?: '',
                'extends' => '',
            ]);

            $user_id = $user->id;
        });

        return $user_id;
    }

    public function loginByUserId($user_id)
    {
        Auth::loginUsingId($user_id, true);
    }
}
