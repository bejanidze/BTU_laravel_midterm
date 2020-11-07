@extends('home')
@section('title','Edit Applicant')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    <form class="form-horizontal" action="{{ route('applicants.update',$applicant->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label class="control-label col-sm-2" for="name">Name:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" value="{{ $applicant->name }}" name="name">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="surname">SurName:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="surname" value="{{ $applicant->surname }}" name="surname">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="phone">Phone:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="phone" value="{{ $applicant->phone }}" name="phone">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="position">Position:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="position" value="{{ $applicant->position }}" name="position">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Update</button>
            </div>
        </div>
    </form>
@endsection
