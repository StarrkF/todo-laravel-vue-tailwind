<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TodoRequest;
use App\Http\Resources\TodoResource;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{

    public function index($userid)
    {
        // return Todo::where('userid',$userid)->orderByDesc('id')->get(); 
        return TodoResource::collection(Todo::where('userid',$userid)->orderByDesc('id')->get()) ;
    }


    public function store(TodoRequest $request,$userid)
    {
            $todo = Todo::create($request->validated()+['userid' => $userid]);
            return  $todo;
    }


    public function update(Request $request, $id)
    {
        $updated=Todo::find($id)->update($request->all());

        return $updated ? "updated" : "was not update";
    }

    public function destroy($id)
    {
        try {
            $deleted = Todo::find($id)->delete();

       return $deleted ? "deleted" : "was not delete";
        } catch (\Throwable $th) {
           return "was not deleted";
        }
       
    }
}
