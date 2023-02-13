<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Home</title>

        <style>
            body {
              background-image: url(welcome.jpg);
              background-size: cover;
              background-repeat: no-repeat;
            }
          </style>

    </head>

    <body>
        <h1 style="color:black; text-align: center" >Welcome to My Homepage</h1>

        <h2 style="color:black; text-align: center" ><a href="{{ route('home.signup') }}"> Signup with route name</a></h2>
 <h2 style="color:black; text-align: center" ><a href="{{ url('home/signup') }}"> Signup with route url </a></h2>

      </body>


</html>
