<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Signup</title>

        <style>
            form {
              width: 500px;
              margin: 50px auto;
              padding: 50px;
              background-color: #f2f2f2;
              border-radius: 10px;
              box-shadow: 0px 0px 10px 0px #aaa;
            }

            input[type="text"],
            input[type="email"],
            input[type="password"] {
              width: 100%;
              padding: 12px;
              margin: 8px 0;
              box-sizing: border-box;
              border-radius: 4px;
              border: 1px solid #ccc;
            }

            label {
              font-size: 14px;
              font-weight: bold;
              margin-bottom: 8px;
              display: block;
            }

            input[type="submit"] {
              width: 100%;
              padding: 12px;
              background-color: #4CAF50;
              color: white;
              border: none;
              border-radius: 4px;
              cursor: pointer;
              margin-top: 20px;
            }

            input[type="submit"]:hover {
              background-color: #3e8e41;
            }
          </style>

    </head>

    <body>
        <h1 style="text-align: center">
            Please Signup to access full features
        </h1>
        <form action="{{ route('home.create') }}" method="post">
            @csrf
          <label for="username">Username:</label>
          <input type="text" id="username" name="username5" required>

          <label for="email">Email:</label>
          <input type="email" id="email" name="email" required>

          <label for="password">Password:</label>
          <input type="password" id="password" name="password" required>

          <input type="submit" value="Sign Up">
        </form>
      </body>


</html>



