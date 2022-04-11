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
                                        <input type="submit" class="btn btn-danger" value="Delete">
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
