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
		        <div class="form-group" style="padding-top: 20px;">
		            <strong>Project Active:</strong><br>
                    <input type="checkbox" value="0" name="active"> Not active<br>
                    <input type="checkbox" value="1" name="active"> Active
		            {{-- <input type="text" name="active" class="form-control" placeholder="0 is offline - 1 is online "> --}}
		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group" style="padding-top: 20px;">
		            <strong>Code:</strong>
		            <textarea class="form-control" style="height:150px" name="code" placeholder="Code"></textarea>
		        </div>
		    </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group" style="padding-top: 20px;">
		            <strong>Start Date:</strong>
                    <input type="date" max="9999-12-31" name="start_date" class="form-control" placeholder="Like this -> dd-mm-yy">
		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group" style="padding-top: 20px;">
		            <strong>End Date:</strong>
                    <input type="date" max="9999-12-31" name="end_date" class="form-control" placeholder="Like this -> dd-mm-yy">
		        </div>
		    </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group" style="padding-top: 20px;">
		            <strong>Hours:</strong>
                    <input type="number" name="max_hours" class="form-control" placeholder="Hours">
		        </div>
		    </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group" style="padding-top: 10px;">
                    <strong>Participants:</strong>
                    <select  class="form-control" name="assign_to" multiple="" id='user_id'>
                        @foreach($users as $user)
                            <option>{{ $user->name }}</option>
                        @endforeach
                </div>
            </div>

		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		            <button type="submit" class="btn btn-primary">Submit</button>
		    </div>
		</div>
    </form>
@endsection
