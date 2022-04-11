<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Project;
use App\Models\Student;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){
        $students = Student::get();
        $project = Project::first();
        if($project){
            return view('status', compact('project', 'students'));
        }else{
            return view('welcome');
        }
    }

    public function set(Request $request){
        $this->validate($request,[
           'name' => 'required',
           'groups_limit' => 'required|gt:0',
           'stud_per_group' => 'required|gt:0',
        ]);

        $project = Project::create([
            'name' => $request->input('name'),
            'groups_limit' => $request->input('groups_limit'),
        ]);
        for($i = 1; $i <= $project->groups_limit; $i++){
            Group::create([
                'name' => 'Group #' . $i,
                'stud_per_group' => $request->input('stud_per_group'),
                'project_id' => $project->id,
            ]);
        }
        return redirect()->route('index');
    }

    public function deleteProject(){
        Group::query()->delete();
        Project::query()->delete();
        Student::query()->delete();
        return redirect()->route('index');
    }
}
