@extends('layouts.master')
@section('content')

    <h5>Companies</h5>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">website</th>
                <th scope="col">Logo</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($companies as $company )
                <tr>
                    <th scope="row">1</th>
                    <td><a href="{{route('company.show',['id'=>$company->id])}}">{{$company->name}}</a></td>
                    <td>{{$company->email}}</td>
                    <td>{{$company->website}}</td>
                    <td>
                        <img src="{{$company->logo}}" alt="{{$company->name . ' logo'}}">
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection

