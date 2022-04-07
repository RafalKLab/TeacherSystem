@extends('template.default')
@section('content')
            <div class="row d-flex justify-content-center">
                <div class="col-md-6 mt-3">
                    <div class="card">
                        <div class="card-header text-center">
                            <h1>Set up a new project!</h1>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{route('projectSet')}}">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Project name</label>
                                    <input type="text" class="form-control {{$errors->has('name') ? ' is-invalid' : ''}}" id="name" name="name" placeholder="Project name">
                                    @if($errors->has('name'))
                                        <span class="text-danger">
                                     {{$errors->first('name')}}
                                 </span>
                                    @endif
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="groups_limit">How many groups participate?</label>
                                    <input type="text" class="form-control {{$errors->has('groups_limit') ? ' is-invalid' : ''}}" id="groups_limit" name="groups_limit">
                                    @if($errors->has('groups_limit'))
                                        <span class="text-danger">
                                     {{$errors->first('groups_limit')}}
                                 </span>
                                    @endif
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="stud_per_group">How many students for each group?</label>
                                    <input type="text" class="form-control {{$errors->has('stud_per_group') ? ' is-invalid' : ''}}" id="stud_per_group" name="stud_per_group">
                                    @if($errors->has('stud_per_group'))
                                        <span class="text-danger">
                                     {{$errors->first('stud_per_group')}}
                                 </span>
                                    @endif
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary">Set up</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
@endsection
