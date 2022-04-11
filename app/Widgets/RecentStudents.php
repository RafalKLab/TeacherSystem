<?php

namespace App\Widgets;

use App\Models\Student;
use Arrilot\Widgets\AbstractWidget;

class RecentStudents extends AbstractWidget
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
        //
        $students = Student::get();
        return view('widgets.recent_students', [
            'config' => $this->config,
            'students' => $students
        ]);
    }
}
