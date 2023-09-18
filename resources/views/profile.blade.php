@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Profile Information</h2>
        </div>

    </div>
</div>

<form
        id="formAccountSettings"
        method="POST"
        action="{{ route('profile.update',auth()->id()) }}"
        enctype="multipart/form-data"
        class="needs-validation"
        role="form"
        novalidate
    >
    @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="name" class="form-label">{{ trans('Name:')}}</label>
                <input class="form-control" type="text" id="name" name="name" value="{{ auth()->user()->name }}" autofocus="" required>
            </div>
        </div>
        <div style="margin-top:10px;" class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="email" class="form-label">{{ trans('Email:')}}</label>
                <input class="form-control" type="text" id="email" name="email" value="{{ auth()->user()->email }}">
            </div>
        </div>
        {{-- class="mt-2" --}}
        <div style="margin-top:10px;" class="col-xs-12 col-sm-12 col-md-12 text-center">
            <a  class="btn btn-primary"  href="{{ route('home') }}"> Back</a>
            <button type="submit" style="margin-left:10px;" class="btn btn-primary">{{ trans('save changes')}}</button>        </div>
    </div>
</form>
@endsection
