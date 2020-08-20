<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Student;
use App\Http\Resources\Student as StudentResource; 


class StudentController extends Controller
{
    
    public function store(Request $request)
    {

        $result = Student::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'course' => $request->course,
            'email' => $request->email,
        ]);

        return response()->json(new StudentResource($result), 201);
    }


    public function show(int $id)
    {

        $result = Student::findOrFail($id);

        return response()->json(new StudentResource($result));
    }

    public function showAll()
    {

        $result = Student::all();

       
        return StudentResource::collection($result);
    }

}
