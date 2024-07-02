<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sosmed | Login</title>

    {{-- bootstrap css --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    {{-- bootstrap icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    {{-- css --}}
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    @yield('css')
</head>

<body>

    <div class="container">
        <div class="d-flex justify-content-center align-items-center" style="height: 100vh; height: 100dvh;">
            <div class="card shadow" style="width: 32rem;">
                <div class="card-body">
                    <h1 class="card-title">Login</h1>
                    <div class="card-text">
                        <form method="post" action="{{ route('loginPost') }}" autocomplete="off">
                            @csrf
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" placeholder="Enter your username"
                                    id="username" name="username" value="{{ old('username') }}" autofocus>
                            </div>
                            <div class="mb-5">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" placeholder="Enter your password"
                                    id="password" name="password">
                            </div>
                            <hr class="my-3" style="border-top: 1px solid #f3f5f7;">
                            <small class="d-flex gap-2 justify-content-end">
                                <span class="text-muted">Don't have an account?</span>
                                <a class="text-decoration-none text-primary" href="{{ route('signup') }}">Signup</a>
                            </small>
                            <div class="w-100">
                                <button type="submit" class="btn btn-dark mt-3" style="width: 100%">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>
