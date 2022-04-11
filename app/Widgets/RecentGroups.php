<?php

namespace App\Widgets;

use App\Models\Project;
use App\Models\Student;
use Arrilot\Widgets\AbstractWidget;

class RecentGroups extends AbstractWidget
{
    public $reloadTimeout = 10;
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $project = Project::first();
        $students = Student::get();
        return view('widgets.recent_groups', [
            'config' => $this->config,
            'project' => $project,
            'students' => $students
        ]);
    }
}
