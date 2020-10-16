<?php

namespace App\Http\Controllers\TeacherEval;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TeacherEval\Question;
use App\Models\Ignug\Catalogue;
use App\Models\Ignug\State;

class QuestionController extends Controller
{
    public function index()
    {
        return Question::all();
    }
    public function show($id)
    {
        $question = Question::findOrFail($id);
        return response()->json([
            'data' =>[
                'question' => $question
            ]
        ]);
    }  
    public function store(Request $request){
        $data = $request->json()->all();

       $dataQuestion = $data['question'];
       $dataState = $data['state'];
       $dataTypeId= $data['type_id'];

        $question = new Question();
        $question->evaluation_type_id = $dataQuestion['evaluation_type_id'];
        $question->code = $dataQuestion['code'];
        $question->order = $dataQuestion['order'];
        $question->name = $dataQuestion['name'];

        $state = State::findOrFail($dataState['id']);
        $type_id = Catalogue::find($dataTypeId['id']);
  
        $question->state()->associate($state);
        $question->type()->associate($type_id);

        $question->save();

        return response()->json([
        'data' => [
            'questions' => $question
        ]
    ], 201);
    }
    public function update(Request $request, $id)
    {
        $data = $request->json()->all();
        $dataQuestion = $data['question'];
        $dataState = $data['state'];
        $dataTypeId= $data['type_id'];

        $question = new Question();
        $question->evaluation_type_id = $dataQuestion['evaluation_type_id'];
        $question->code = $dataQuestion['code'];
        $question->order = $dataQuestion['order'];
        $question->name = $dataQuestion['name'];
        

        $state = State::findOrFail($dataState['id']);
        $type_id = Catalogue::find($dataTypeId['id']);

        $question->state()->associate($state);
        $question->type()->associate($type_id);
        
        $question->save();
        return response()->json([
            'data' => [
                'questions' => $question
            ]
        ], 201);
    }

    public function destroy($id)
    {
        $question = Question::findOrFail($id);
/*         $catalogue->delete(); */
/*         $evaluationType->update([
            'state_id'=>'3'
        ]); */

        $question->state_id = '3';
        $question->save();

        return response()->json([
            'data' => [
                'questions' => $question
            ]
        ], 201);
    }

}
