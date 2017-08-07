<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 2017/8/7
 * Time: 21:25
 */

namespace App\Repositories;


use App\User;

class UserRepository
{
    public function byId($id)
    {
        return User::find($id);
    }
}