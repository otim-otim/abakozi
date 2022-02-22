@extends('layouts.master')
@section()
    <form method="post" action="{{route('employee.store',['id'=>$company->id])}}">
        <div class="mb-3">
            <label for="fname" class="form-label">First Name</label>
            <input type="text"  class="form-control" id="fname" name="fname" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="lname" class="form-label">Last Name</label>
            <input type="text"  class="form-control" id="lname" name="lname" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email"   class="form-control" id="email" name="email" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text"   class="form-control" id="phone" name="phone" aria-describedby="emailHelp">
        </div>

        <button type="submit" class="btn btn-primary">Add Employee</button>
    </form>
@endsection
