@extends('layouts.master')
@section('content')
    <form method="post" action="{{route('company.store')}}">
         @csrf
        <div class="mb-3">
            <label for="com_name" class="form-label">Name</label>
            <input type="text"  class="form-control" id="com_name" name="com_name" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="website" class="form-label">Website</label>
            <input type="text"  class="form-control" id="website" name="website" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email"   class="form-control" id="email" name="email" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="logo" class="form-label">Company Logo</label>
            <input class="form-control" type="file" id="logo" name="logo">
        </div>

        <button type="submit" class="btn btn-primary">Add Company</button>
    </form>
@endsection
