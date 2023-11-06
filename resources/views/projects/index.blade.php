@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Project Management</h2>
        </div>
        <div class="pull-right">
            @can('project-create')
            <a class="btn btn-success" href="{{ route('projects.create') }}"> Create New Project</a>
            @endcan
        </div><br>
    </div>
</div>


@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif


<table class="table table-bordered">
 <tr>
   <th>No</th>
   <th>Name</th>
   <th>Active</th>
   <th width="180px">Code</th>
   <th>Start Date</th>
   <th>End Date</th>
   <th>Hours</th>
   <th width="210px">Action</th>
 </tr>
 @foreach ($projects as $project)
 @role('Admin')
 <tr>
    <td>{{ ++$i }}</td>
    <td>{{ $project->name }}</td>
    @if ( $project->active == '0' )
        <td style="background-color: red !important">{{''}}</td>
    @else
        <td style="background-color: lime !important">{{''}}</td>
    @endif
    <td>{{ Str::limit($project->code, 40);}}</td>  {{-- Dit zorgt ervoor dat de string een limiet heeft met de display--}}

    <td>{{ date('d-m-Y', strtotime($project->start_date)) }}</td>
    <td>{{ date('d-m-Y', strtotime($project->end_date)) }}</td>
    <td>{{ $project->max_hours }}</td>
    <td>
        <form action="{{ route('projects.destroy',$project->id) }}" method="POST">
            <a class="btn btn-info" href="{{ route('projects.show',$project->id) }}">Show</a>
            @can('project-edit')
            <a class="btn btn-primary" href="{{ route('projects.edit',$project->id) }}">Edit</a>
            @endcan
            @csrf
            @method('DELETE')
            @can('project-delete')
            <button type="submit" class="btn btn-danger">Delete</button>
            @endcan
        </form>
    </td>
 @endrole

 @role('customer')
 @if ( $project->active == '0' )

 @else
 <tr>
    <td>{{ ++$i }}</td>
    <td>{{ $project->name }}</td>
    <td>{{ Str::limit($project->code, 40);}}</td>  {{-- Dit zorgt ervoor dat de string een limiet heeft met de display--}}

    <td>{{ date('d-m-Y', strtotime($project->start_date)) }}</td>
    <td>{{ date('d-m-Y', strtotime($project->end_date)) }}</td>
    <td>{{ $project->max_hours }}</td>
    <td>
        <form action="{{ route('projects.destroy',$project->id) }}" method="POST">
            <a class="btn btn-info" href="{{ route('projects.show',$project->id) }}">Show</a>
            @can('project-edit')
            <a class="btn btn-primary" href="{{ route('projects.edit',$project->id) }}">Edit</a>
            @endcan
            @csrf
            @method('DELETE')
            @can('project-delete')
            <button type="submit" class="btn btn-danger">Delete</button>
            @endcan
        </form>
    </td>
 @endif
 @endrole
 @endforeach
</table>
@endsection
