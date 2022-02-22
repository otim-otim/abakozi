@extends('layouts.master')
@section('content')
    <img src="{{$company->logo}}" alt="{{$company->name . ' logo'}}" class="flex">
    <h5>{{$company->name .' Details'}}</h5>
    <div class="row col-md-12">
        <div class="col col-md-4">
            {{$company->email}}
        </div>
        <div class="col col-md-4">
            {{$company->website}}
        </div>
        <div class="col col-md-4">
            <a href="{{route('company.edit',['id'=>$company->id])}}">Edit Details</a>
        </div>
    </div>
    <div class="row">
        <h4 class="col col-md-8">{{$company->name .' employees'}}</h4>
        <a href="{{route('employee.create',['id'=>$company->id])}}" class="col col-md-4 btn">New Employee</a>
    </div>


    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">phone</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $employee )
                <tr>
                    <th scope="row">1</th>
                    <td>
                        <a href="{{route('employee.show',['id'=>$employee->id])}}">
                            {{$employee->FirstName .''.$employee->LastName}}
                        </a>
                    </td>
                    <td>{{$employee->email}}</td>
                    <td>{{$employee->phone}}</td>
                    <td>
                        <a href="{{route('employee.edit',['id'=>$employee->id])}}">Edit</a>&nbsp;
                        <a href="{{route('employee.destroy',['id'=>$employee->id])}}">delete</a>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

