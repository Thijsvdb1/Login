@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Project</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('projects.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('projects.update',$project->id) }}" method="POST">
    	@csrf
        @method('PUT')

         <div class="row">
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Name:</strong>
		            <input type="text" name="name" value="{{ $project->name }}" class="form-control" placeholder="Name">
		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group" style="padding-top: 20px; padding-bottom: 20px;">
		            <strong>Project Active: (Not Active = 0 | Active = 1)</strong>
                    {{-- <input type="checkbox" value="0" name="active"> Not active
                    <input type="checkbox" value="1" name="active">Active --}}
                    <input type="text" name="active" value="{{ $project->active }}" class="form-control" placeholder="Active">
		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Code:</strong>
		            <textarea class="form-control" style="height:150px" name="code" placeholder="Code">{{ $project->code }}</textarea>
		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group" style="padding-top: 20px;">
		            <strong>Start Date:</strong>
		            <input type="date" max="9999-12-31" name="start_date" value="{{ $project->start_date }}" class="form-control" placeholder="Start date">
		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group" style="padding-top: 20px;">
		            <strong>End Date:</strong>
                    <input type="date" max="9999-12-31" name="end_date" value="{{ $project->end_date }}" class="form-control" placeholder="End date">
		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group" style="padding-top: 20px;">
		            <strong>Hours:</strong>
                    <input type="number" name="max_hours" value="{{ $project->max_hours }}" class="form-control" placeholder="Hours">
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		      <button type="submit" class="btn btn-primary">Submit</button>
		    </div>
		</div>
    </form>
@endsection
