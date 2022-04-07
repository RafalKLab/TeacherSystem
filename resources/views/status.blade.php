@extends('template.default')
@section('content')
   <div class="row">
       <div class="card mt-3 mb-3" style="width: 18rem;">
           <div class="card-body">
               <h5 class="card-title">Project name:  <b>{{$project->name}}</b></h5>
               <h6 class="card-title">The number of groups:  <b>{{$project->groups_limit}}</b></h6>
               <h6 class="card-title">Students per group: <b>{{$project->groups()->first()->stud_per_group}}</b></h6>
           </div>
       </div>
   </div>
    <div class="row">
        <div class="col-md-5 mb-3">
            <h1>Students</h1>
            <div class="card">
                <table class="table">
                    <tbody>
                    <tr class="card-header">
                        <th>Full name</th>
                        <th>Group</th>
                        <th>Actions</th>
                    </tr>
                    @if(count($students))
                        @foreach($students as $student)
                            <tr>
                                <td>{{$student->full_name}}</td>
                                <td>
                                    @if($student->group_id != 0)
                                        {{$student->group->name}}
                                    @else
                                        Not assigned
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <form action="{{route('students.destroy', $student)}}" method="POST">
                                            <a href="{{route('students.edit', $student)}}" class="btn btn-warning" type="button">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" class="btn btn-danger show_confirm" value="Delete">
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
            <hr>
            <a href="{{route('students.create')}}" class="btn btn-success" type="button">Add new student </a>
        </div>
    </div>
    <div class="row">
        <i class="fa-solid fa-xmark"></i>
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
                                        <select id="student_selector" name="student_id" class="form-control">
                                            <option value="0">Assign student</option>
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
@endsection
