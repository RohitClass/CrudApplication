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
        <h2 class="text-primary">Login here!</h2>
        <form action="{{ route('submit.submit') }}">
            @csrf
            <div class="mb-3 mt-3">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
            </div>
            <div class="mb-3">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

</body>

</html>
