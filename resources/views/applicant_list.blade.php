@extends('home')
@section('title','Applicants')
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
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Surname</th>
            <th>Position</th>
            <th>Phone</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($applicants as $applicant)
            <tr>
                <td>{{ $applicant->id }}</td>
                <td>{{ $applicant->name }}</td>
                <td>{{ $applicant->surname }}</td>
                <td>{{ $applicant->position }}</td>
                <td>{{ $applicant->phone }}</td>
                <td>
                    <form action="{{ route('applicants.hire',$applicant->id) }}" method="post">
                        @csrf
                        <input type="hidden" name="is_hired" value="{{ $applicant->is_hired?0:1 }}">
                        @if($applicant->is_hired)
                            <button class="btn btn-danger">Make UnHired</button>
                        @else
                            <button class="btn btn-success">Make Hired</button>
                        @endif
                    </form>
                </td>
                <td><a class="btn btn-primary" href="/applicants/{{$applicant->id}}/edit">Edit</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
