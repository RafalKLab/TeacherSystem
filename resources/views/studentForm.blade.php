@extends('template.default')
@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-md-6 mt-3">
            <div class="card">
                <div class="card-header text-center">
                    @isset($student)
                        <h1>Student update</h1>
                    @else
                        <h1>Add new product</h1>
                    @endisset
                </div>
                <div class="card-body">
                    <form method="post"
                       @isset($student)
                          action="{{route('students.update', $student)}}"
                       @else
                          action="{{route('students.store')}}"
                       @endisset
                     >
                        @isset($student)
                            @method('PUT')
                        @endisset
                        @csrf
                        <div class="form-group">
                            <label for="full_name">Student full name</label>
                            <input type="text" class="form-control {{$errors->has('full_name') ? ' is-invalid' : ''}}"
                                   id="full_name"
                                   name="full_name"
                                   placeholder="Student full name"
                                   value="@isset($student){{ $student->full_name }}@endisset">
                            @if($errors->has('full_name'))
                                <span class="text-danger">
                                     {{$errors->first('full_name')}}
                                 </span>
                            @endif
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
