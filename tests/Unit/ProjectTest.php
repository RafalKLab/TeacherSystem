<?php

namespace Tests\Unit;

use App\Models\Group;
use App\Models\Project;
use App\Models\Student;
use Tests\TestCase;

class ProjectTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testProjectCreation()
    {
        $response = $this->call('POST', '/project/set',[
            'name' => 'Test Project',
            'groups_limit' => '2',
            'stud_per_group' => '2',
        ]);
        $project = Project::first();
        $this->assertEquals(2, count($project->groups));
    }

    public function testStudentCreation()
    {
        $response = $this->call('POST', 'api/students',[
            'full_name' => 'Test User'
        ]);
        $response->assertStatus(201);
    }

    public function testStudentAssignToGroup(){
        $TestStudent = Student::orderBy('created_at', 'desc')->first();
        $group = Group::first();
        $this->call('POST', route('assignStudents', $group->id),[
            'student_id' => $TestStudent->id
        ]);
        $TestStudent = Student::orderBy('created_at', 'desc')->first();
        $this->assertEquals($group->id, $TestStudent->group_id);
    }

    public function testStudentDeletionFromGroup(){
        $TestStudent = Student::orderBy('created_at', 'desc')->first();
        $TestStudent->delete();
        $group = Group::first();
        $this->assertEquals(0, count($group->students));
    }

    public function testProjectDeletionWithAllGroups()
    {
        $this->call('DELETE', route('deleteProject'));
        $this->assertEquals(0, count(Group::all()));
    }
}
