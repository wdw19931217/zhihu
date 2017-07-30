<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 2017/7/29
 * Time: 21:30
 */

namespace App\Repositories;


use App\Question;
use App\Topic;

class QuestionRepository
{
    public function getQuestionsFeed()
    {
        return Question::published()->latest('updated_at')->with('user')->get();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function byIdWithTopicsAndAnswers($id)
    {
        return Question::where('id',$id)->with(['answers','topics'])->first();
    }

    /**
     * @param array $attributes
     * @return static
     */
    public function create(array $attributes)
    {
        return Question::create($attributes);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function byId($id)
    {
        return Question::find($id);
    }

    /**
     * @param array $topics
     * @return array
     */
    public function normalizeTopic(array $topics)
    {
        return collect($topics)->map(function ($topic) {
            if(is_numeric($topic)) {
                Topic::find($topic)->increment('questions_count');
                return (int) $topic;
            }
            $newTopic = Topic::create(['name' => $topic,'questions_count' => 1]);
            return $newTopic->id;
        })->toArray();
    }

}