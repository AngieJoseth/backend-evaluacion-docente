<?php

namespace App\Http\Controllers\TeacherEval;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class Question extends Controller
{
    public function index(){
        return "Hola mundo";
    } 

    public function store(Request $request){
        return $request;
    }

    public function update(Request $request){
        return $request;
    }

    public function destroy($id){
        return $id;
    }

}