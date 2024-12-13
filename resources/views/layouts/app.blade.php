<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Website - @yield('title')</title>
    <style>
        body {
            background-color: #000000; /* Dark gray background */
            color: #AEC6CF; /* Light text for contrast */
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            display: flex;
            align-items: center;
            padding: 10px 20px;
            background-color: #000000; /* Slightly darker header */
            border-bottom: 2px solid #444; /* Dark border for separation */
        }

        header img {
            width: 50px;
            height: 50px;
            border: 2px solid #444; /* Dark border around the logo */
            border-radius: 5px;
            margin-right: 15px;
        }

        header h1 {
            margin: 0;
            color: #AEC6CF; 
        }

        .content-wrapper {
            padding: 20px;
        }

        .error-box {
            background-color: #ff4d4d; /* Red background for errors */
            color: #fff;
            border-radius: 5px;
            padding: 10px;
            margin: 20px 0;
        }

        .error-box ul {
            margin: 0;
            padding-left: 20px;
        }

        .error-box li {
            list-style: disc;
        }
    </style>
</head>
<body>
    <header>
        <!-- Placeholder logo -->
        <img src="https://cdn.pixabay.com/photo/2020/01/31/07/53/man-4807395_1280.jpg" alt="Logo">
        <h1>Music Website - @yield('title')</h1>
    </header>

    <div class="content-wrapper">
        @if ($errors->any())
            <div class="error-box">
                <strong>Errors:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </div>
</body>
</html>
