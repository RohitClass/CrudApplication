<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CrudApplication</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">

</head>
<body>

    <div class="container mt-5 flote-right">
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

        <h2 class="text-primary">Student Records</h2>
        <div class="d-flex justify-content-between">
            <a href="{{ route('form.form')}}" class="btn btn-outline-primary my-2 btn-sm p-2 bd-highlight">Add Records</a>
            <h4 class="p-2 bd-highlight text-primary">
                Welcome, {{ Auth::guard('admin')->user()->name }}!
        </h4>
        <a href="{{ route('logout.logout')}}" class="btn btn-outline-danger my-2 btn-sm p-2 bd-highlight">Logout</a>
        </div>

        <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Phone</th>
                <th scope="col">Email</th>
                <th scope="col">Country</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($models as $value)
              <tr>
                <th scope="row">{{ $value->id }}</th>
                <td>{{ $value->Name }}</td>
                <td>{{ $value->Phone }}</td>
                <td>{{ $value->Email }}</td>
                <td>{{ $value->Country }}</td>
                <td><a href="{{route("edit.edit",$value->id)}}" class="btn btn-outline-success my-2 btn-sm">Edit</a></td>
                <td><a href="{{route("delete.delete",$value->id)}}" class="btn btn-outline-danger my-2 btn-sm">Delete</a></td>
              </tr>
              @endforeach
          </table>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var successMessage = document.querySelector('.alert-success');
            if (successMessage) {
                setTimeout(function () {
                    successMessage.style.display = 'none';
                }, 3000);
            }
        });
    </script>
</body>
</html>
