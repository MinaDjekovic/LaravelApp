<?php



namespace App\Http\Controllers;

use App\Models\Student;

use Illuminate\Http\Request;

class StudentFacultyController extends Controller
{
    public function index($faculty_id)
    {
        $students = Student::get()->where('faculty_id', $faculty_id);
        if (is_null($students)) {
            return response()->json('Data not found', 404);
        }
        return response()->json($students);
    }

    public function delete($id)
    {
        $student = Student::find($id);
        $student->delete();
    }



    public function update(Request $request, $id)
    {
        $student = Student::find($id);
        if (isset($request->name)) {
            $student->name = $request->name;
        }
        if (isset($request->index)) {
            $student->index = $request->address;
        }
        $student->save();
    }
}
