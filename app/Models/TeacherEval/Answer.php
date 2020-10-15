<?php

<<<<<<< HEAD
namespace App\Models;

use App\Models\Ignug\State;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    protected $connection = 'pgsql-teacher-eval';
    protected $fillable=[
        'code',
        'order',
        'name',
        'value'
    ];
    public function state()
    {
        return $this->belongsTo(State::class);
    }
    public function type()
    {
        return $this->belongsTo(Type::class);
    }
=======
namespace App\Models\TeacherEval;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;
>>>>>>> e6a024fa36c780b4b4b9f3451952b4f75f743fe9
}