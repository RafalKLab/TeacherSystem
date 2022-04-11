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
        @asyncWidget('RecentStudents')
        @asyncWidget('RecentGroups')
@endsection
