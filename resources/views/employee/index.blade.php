@section()
    <h6> all Employees</h6>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">phone</th>
                <th scope="col">company</th>
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
                    <td>{{$employee->company->name}}</td>
                    <td>
                        <a href="{{route('employee.edit',['id'=>$employee->id])}}">Edit</a>&nbsp;
                        <a href="{{route('employee.destroy',['id'=>$employee->id])}}">delete</a>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
