<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container">
        <div class="container">
            <div class="title">Update Record</div>

            <form action="{{route("update.update")}}" method="POST">
                @csrf
              <div class="user__details">
                <div class="input__box">
                  <span class="details">Name</span>
                  <input type="text" value="{{ $models->Name }}" name="name" placeholder="E.g: John Smith" required>
                </div>
                <div class="input__box">
                    <span class="details">Phone Number</span>
                    <input type="tel" value="{{ $models->Phone }}" name="phone" pattern="[0-9]{10}" placeholder="012-345-6789" required>
                  </div>
                <div class="input__box">
                  <span class="details">Email</span>
                  <input type="email" value="{{ $models->Email }}" name="email" placeholder="johnsmith@gmail.com" required>
                </div>
                <div class="input__box">
                  <span class="details">Country</span>
                  <input type="text" value="{{ $models->Country }}" name="country" placeholder="E.g: India" required>
                </div>
                <input type="hidden" name="id" value="{{ $models->id }}">
              </div>
              <div class="gender__details">
                <input type="radio" name="gender" id="dot-1">
                <input type="radio" name="gender" id="dot-2">
                <input type="radio" name="gender" id="dot-3">
                {{-- <span class="gender__title">Gender</span>
                <div class="category">
                  <label for="dot-1">
                    <span class="dot one"></span>
                    <span>Male</span>
                  </label>
                  <label for="dot-2">
                    <span class="dot two"></span>
                    <span>Female</span>
                  </label>
                  <label for="dot-3">
                    <span class="dot three"></span>
                    <span>Prefer not to say</span>
                  </label>
                </div> --}}
              </div>
              <div class="button">
                <input type="submit" value="Register">
              </div>
            </form>
          </div>
    </div>
</body>
</html>
