<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Student;


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

        return response()->json($result, 201);
    }
}
