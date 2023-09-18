@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Project</h2>
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

    <form action="{{ route('projects.store') }}" method="POST">
    	@csrf
         <div class="row">
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group" style="padding-top: 20px;">
		            <strong>Name:</strong>
		            <input type="text" name="name" class="form-control" placeholder="Name">
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group" style="padding-top: 20px; padding-bottom: 20px;">
		            <strong>Project Active:</strong>
                    {{-- <input type="checkbox" value="1" name="active">* --}}
		            <input type="text" name="active" class="form-control" placeholder="0 is offline - 1 is online ">
		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group" >
		            <strong>Code:</strong>
		            <textarea class="form-control" style="height:150px" name="code" placeholder="Code"></textarea>
		        </div>
		    </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group" style="padding-top: 20px;">
		            <strong>Start Date:</strong>
                    {{-- <input type="date" name="start_date" id="date" class="form-control" style="width: 100%; display: inline;" required  value="{{ $project->date->format('Y-m-d') }}" > --}}
                    <input type="date" name="start_date" class="form-control" placeholder="Like this -> dd-mm-yy">
		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group" style="padding-top: 20px;">
		            <strong>End Date:</strong>
                    <input type="date" name="end_date" class="form-control" placeholder="Like this -> dd-mm-yy">
		        </div>
		    </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group" style="padding-top: 20px;">
		            <strong>Hours:</strong>
                    <input type="time" name="max_hours" class="form-control" placeholder="Like this -> hh:mm">
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		            <button type="submit" class="btn btn-primary">Submit</button>
		    </div>
		</div>
    </form>
@endsection
