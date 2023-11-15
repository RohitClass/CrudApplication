<!DOCTYPE html>
<html lang="en">

<head>
    <title>Laravel Application</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
</head>

<body>

    <div class="container mt-5 d-flex flex-wrap align-content-center justify-content-center">
        <div class="col-4">
            @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <h2 class="text-primary">Login here!</h2>
        <form action="{{ route('submit.submit') }}">
            @csrf
            <div class="mb-3 mt-3">
                <label for="email">Email:</label>
                <input type="email" value="{{ old('email')}}" class="form-control @error("email") is-invalid @enderror" id="email" placeholder="Enter email" name="email">
                @error("email")
                <p class="invalid-feedback">{{$message}}</p>
                @enderror

            </div>
            <div class="mb-3">
                <label for="pwd">Password:</label>
                <input type="password" value="{{ old("password")}}" class="form-control @error("password") is-invalid @enderror" id="pwd" placeholder="Enter password" name="password">
                @error("password")
                <p class="invalid-feedback">{{$message}}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">login</button>
        </form>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var successMessage = document.querySelector('.alert-danger');
        if (successMessage) {
            setTimeout(function () {
                successMessage.style.display = 'none';
            }, 7000);
        }
    });
</script>

</body>

</html>
