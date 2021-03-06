<?php

namespace App\Models\TeacherEval;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use App\Models\Ignug\State;
use App\Models\Ignug\Catalogue;
use App\Models\TeacherEval\Answer;


class Question extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;

    protected $connection = 'pgsql-teacher-eval';

    protected $fillable = [
        'code',
        'order',
        'name',
    ];

    public function evaluationType()
    {
        return $this->belongsTo(EvaluationType::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function type()
    {
        return $this->belongsTo(Catalogue::class);
    }

    public function answerQuestion()
    {
        return $this->hasMany(AnswerQuestion::class);
    } 
    public function answers()
    {
        return $this->belongsToMany(Answer::class,'answer_question','question_id', 'answer_id')->withTimestamps();
    }


}