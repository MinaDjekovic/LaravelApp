<?php

namespace App\Http\Controllers;

use App\Http\Resources\StudentCollection;
use App\Http\Resources\StudentResource;
use App\Models\Student;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        return new StudentCollection($students);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'index' => 'required|string|max:255',
            'faculty_id' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $student = Student::create([
            'name' => $request->name,
            'index' => $request->index,
            'faculty_id' => $request->faculty_id,
            'user_id' => Auth::user()->id
        ]);


        return response()->json(['Student created succesfully.', new StudentResource($student)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return new StudentResource($student);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'index' => 'required|string|max:255',
            'faculty_id' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $student->name = $request->name;
        $student->index = $request->index;
        $student->faculty_id = $request->faculty_id;

        $student->save();

        return response()->json(['Student updated succesfully.', new StudentResource($student)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return response()->json('Student deleted successfully!');
    }
}
