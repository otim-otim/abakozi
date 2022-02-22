@section()
    <form method="put" action="{{route('company.update',['id'=>$company->id])}}">
        <div class="mb-3">
            <label for="com_name" class="form-label">Name</label>
            <input type="text" placeholder="{{$company->name}}" class="form-control" id="com_name" name="com_name" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="website" class="form-label">Website</label>
            <input type="text" placeholder="{{$company->website}}" class="form-control" id="website" name="website" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email"  placeholder="{{$company->email}}" class="form-control" id="email" name="email" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="logo" class="form-label">Company Logo</label>
            <input class="form-control" type="file" id="logo" name="logo">
        </div>

        <button type="submit" class="btn btn-primary">Update Company</button>
    </form>
@endsection
