<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Student;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function assignStudents(Request $request, $group_id){
        $this->validate($request,[
            'student_id' => 'required|gt:0'
        ]);
        $group = Group::findOrFail($group_id);
        if(count($group->students) < $group->stud_per_group){
            $student = Student::findOrFail($request->student_id);
            $student->update([
                'group_id' => $group_id,
            ]);
            return redirect()->route('index');
        }else{
            return redirect()->route('index')->with('incorrect', 'The group is full!');
        }
    }
    public function unassignStudents($student_id){
        $student = Student::findOrFail($student_id);
        $student->update([
            'group_id' => 0,
        ]);
        return redirect()->route('index');
    }
}
