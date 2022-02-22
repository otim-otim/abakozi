@section()
    <form method="put" action="{{route('employee.update',['id'=>$employee->id])}}">
        <div class="mb-3">
            <label for="fname" class="form-label">First Name</label>
            <input type="text" placeholder="{{$employee->FirstName}}" class="form-control" id="fname" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="lname" class="form-label">Last Name</label>
            <input type="text" placeholder="{{$employee->LastName}}" class="form-control" id="lname" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email"  placeholder="{{$employee->email}}" class="form-control" id="email" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text"  placeholder="{{$employee->phone}}" class="form-control" id="phone" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Company</label>
            <select class="form-select" aria-label="Default select example">
                <option selected value="{{$employee->company->id}}">{{$employee->company->name}}</option>
                @foreach ($companies as $company )
                    @if ($company->id !== $employee->company->id )
                        <option value="{{$company->id}}">{{$company->name}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
