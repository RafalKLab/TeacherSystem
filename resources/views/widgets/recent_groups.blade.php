<div class="row">
    <h1>Groups</h1>
    @foreach($project->groups as $group)
        <div class="col-md-3 mb-3">
            <div class="card">
                <div class="card-header">
                    {{$group->name}}
                    <span class="pull-right">
                                {{count($group->students)}} / {{$group->stud_per_group}}
                     </span>
                </div>
                <ul class="list-group list-group-flush">
                    @foreach($group->students as $student)
                        <li class="list-group-item">
                            {{$student->full_name}}
                            <span class="pull-right">
                                        <a href="{{route('unassignStudents', $student->id)}}" style="color: #DC3545"><i class="fa fa-close"></i></a>
                                    </span>
                        </li>
                    @endforeach
                    @if($group->stud_per_group - count($group->students))
                        <form action="{{route('assignStudents', $group->id)}}" method="post">
                            @csrf
                            <li class="list-group-item">
                                <select id="student_selector" name="student_id" class="form-control" required>
                                    <option value="">Assign student</option>
                                    @foreach($students as $student)
                                        @if($student->group_id == 0)
                                            <option value="{{$student->id}}" >{{$student->full_name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </li>
                            <li class="list-group-item">
                                <button type="submit" class="btn btn-success">Save</button>
                            </li>
                        </form>
                    @endif
                </ul>
            </div>
        </div>
    @endforeach
</div>
