@extends('layouts.master')
@section()
    <h6>Employee Details</h6>
    <h4>First Name: {{$employee->FirstName}}</h4>
    <h4>Last Name: {{$employee->LastName}}</h4>
    <h4>Email: {{$employee->email}}</h4>
    <h4>Phone: {{$employee->phone}}</h4>
    <h4>Company: {{$employee->company->name}}</h4>
    <div class="row">
        <div class="col col-md-6">
            <a href="{{route('employee.edit',['id'=>$employee->id])}}"></a>
        </div>
        <div class="col col-md-6">
            <a href="{{route('employee.destroy',['id'=>$employee->id])}}"></a>
        </div>
    </div>

@endsection
