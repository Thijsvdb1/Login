@extends('layouts.app')

@section('content')
        <div class="pull-left">
            <h2>Edit Profile Information</h2>
        </div>
    <form action="{{ route('update-password') }}" method="POST">
        @csrf
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @elseif (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <label for="oldPasswordInput" class="form-label">Old Password:</label>
                    <input name="old_password" type="password" class="form-control @error('old_password') is-invalid @enderror" id="oldPasswordInput"
                        placeholder="Old Password">
                    @error('old_password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div style="margin-top:10px;" class="col-xs-12 col-sm-12 col-md-12">
                    <label for="newPasswordInput" class="form-label">New Password:</label>
                    <input name="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" id="newPasswordInput"
                        placeholder="New Password">
                    @error('new_password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div style="margin-top:10px;" class="col-xs-12 col-sm-12 col-md-12">
                    <label for="confirmNewPasswordInput" class="form-label">Confirm New Password:</label>
                    <input name="new_password_confirmation" type="password" class="form-control" id="confirmNewPasswordInput"
                        placeholder="Confirm New Password">
                </div>
                <div style="margin-top:10px;" class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <a  class="btn btn-primary"  href="{{ route('home') }}"> Back</a>
                    <button type="submit" style="margin-left:10px;" class="btn btn-primary">{{ trans('save changes')}}</button>        </div>
                </div>
    </form>
@endsection
