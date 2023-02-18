<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Signup</title>
    <link rel="stylesheet" type="text/css" href="{{ url('style.css') }}">

    <style>

        body {
          background-image: "{{ url('forestbridge.jpg') }}";
          min-height: 100%;
          background-position: center;
          background-size: cover;
        }
        </style>
</head>

<body>
    <div class="login-wrap">
        <div class="login-html">
            <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1"
                class="tab">Sign In</label>
            <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2"
                class="tab">Sign Up</label>
            <div class="login-form">
                <div class="sign-in-htm">
                    <div class="group">
                        <label for="user" class="label">Username</label>
                        <input id="user" type="text" class="input">
                    </div>
                    <div class="group">
                        <label for="pass" class="label">Password</label>
                        <input id="pass" type="password" class="input" data-type="password">
                    </div>
                    <div class="group">
                        <input id="check" type="checkbox" class="check" checked>
                        <label for="check"><span class="icon"></span> Keep me Signed in</label>
                    </div>
                    <div class="group">
                        <input type="submit" class="button" value="Sign In">
                    </div>
                    <div class="hr"></div>

                </div>
                <form action="{{ route('signup.store') }}" method="post">
                    @csrf
                    <div class="sign-up-htm">
                        <div class="group">
                            <label for="name" class="label">Name*</label>
                            <input id="name" name="name" type="text" class="input" required>
                        </div>
                        <div class="group">
                            <label for="username" class="label">Username*</label>
                            <input id="username" name="username" type="text" class="input" required>
                        </div>
                        <div class="group">
                            <label for="pass" class="label">Password*</label>
                            <input id="pass" name="password" type="password" class="input" data-type="password" required>
                        </div>
                        <div class="group">
                            <label for="pass" class="label">Repeat Password*</label>
                            <input id="pass" type="password" class="input" data-type="password" required>
                        </div>
                        <div class="group">
                            <label for="pass" class="label">Email Address*</label>
                            <input id="pass" name="email" type="text" class="input" required>
                        </div>
                        <div class="group">
                            <input type="submit" class="button" value="Sign Up">
                        </div>
                        <div class="hr"></div>
                        <div class="foot-lnk">
                            <label for="tab-1">Already Member?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>


</html>
