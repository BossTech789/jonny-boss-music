<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Newsletter Preferences | Jonny Boss
    </title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f5f5f5;
            font-family: Arial, Helvetica, sans-serif;
        }

        .container {
            width: 90%;
            max-width: 550px;
            background: white;
            padding: 45px;
            border-radius: 20px;
            text-align: center;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
        }

        h1 {
            margin-top: 0;
        }

        p {
            color: #666;
            line-height: 1.7;
        }

        .button {
            display: inline-block;
            margin-top: 20px;
            padding: 14px 25px;
            background: #111;
            color: white;
            text-decoration: none;
            border-radius: 8px;
        }

    </style>

</head>

<body>

    <div class="container">

        <h1>
            Jonny Boss
        </h1>

        @if($success)

            <h2>
                You're unsubscribed
            </h2>

        @else

            <h2>
                Something went wrong
            </h2>

        @endif

        <p>
            {{ $message }}
        </p>

        <a
            href="{{ url('/') }}"
            class="button"
        >
            Return to Website
        </a>

    </div>

</body>

</html>
