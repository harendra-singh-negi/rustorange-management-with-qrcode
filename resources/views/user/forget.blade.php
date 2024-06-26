<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <title>{{ $bs->website_title }}</title>
    <link rel="icon" href="{{ asset('assets/front/img/' . $bs->favicon) }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/forget.css') }}">
</head>

<body>
    <div class="login-page">
        <div class="text-center mb-4">
            <img class="login-logo" src="{{ asset('assets/front/img/' . $bs->logo) }}" width="100" alt="">
        </div>
        <div class="form">
            @if (session()->has('success'))
                <div class="alert alert-success fade show" role="alert">
                    <strong>Success!</strong> {{ session('success') }}
                </div>
            @endif
            <form class="login-form" action="{{ route('admin.forget.mail') }}" method="POST">
                @csrf
                <input type="email" name="email" placeholder="Enter email address" />
                @if ($errors->has('email'))
                    <p class="text-danger text-left">{{ $errors->first('email') }}</p>
                @endif
                <button type="submit">Send Mail</button>
            </form>

            <p class="back-link">
                <a href="{{ route('admin.login') }}">&lt;&lt; Back</a>
            </p>
        </div>
    </div>



    <script src="{{ asset('assets/admin/js/core/jquery.min.js') }}"></script>

    <script src="{{ asset('assets/admin/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/core/bootstrap.min.js') }}"></script>
  
    <script src="{{ asset('assets/admin/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

</body>

</html>
