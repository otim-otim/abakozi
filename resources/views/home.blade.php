@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Companies</h5>
                                <p class="card-text">checkout companies in the link below   </p>
                                <a href="{{route('company.index')}}" class="btn btn-primary">Go to companies</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Employees</h5>
                                <p class="card-text">checkout employees</p>
                                <a href="{{route('employee.index')}}" class="btn btn-primary">go to employees</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
<div class="col-sm-6">




<a href="#" class="btn btn-primary">Go somewhere</a>
