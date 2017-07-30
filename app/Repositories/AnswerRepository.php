<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 2017/7/29
 * Time: 23:56
 */

namespace App\Repositories;


use App\Answer;

class AnswerRepository
{
    public function create(array $attributes)
    {
        return Answer::create($attributes);
    }

}