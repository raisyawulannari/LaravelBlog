<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background-color: #f0f4f8; /* Warna latar belakang yang lembut */
            color: #333;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header {
            padding: 1rem 2rem;
            background-color: #007bff; /* Biru cerah */
            color: #ffffff;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .header-title {
            font-size: 2rem;
            font-weight: bold;
        }

        nav a {
            color: #ffffff;
            text-decoration: none;
            font-weight: bold;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            transition: background-color 0.3s, transform 0.3s;
        }

        nav a:hover {
            background-color: #0056b3; /* Biru gelap saat hover */
            transform: translateY(-2px);
        }

        main {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            text-align: center;
        }

        .welcome-card {
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            max-width: 600px;
            width: 100%;
            margin: auto;
        }

        .welcome-card h2 {
            margin: 0 0 1rem 0;
            font-size: 2.5rem;
            color: #007bff;
        }

        .welcome-card p {
            margin: 0 0 1.5rem 0;
            font-size: 1.2rem;
            color: #666;
        }

        .btn-get-started {
            display: inline-block;
            background-color: #007bff;
            color: #ffffff;
            padding: 0.75rem 1.5rem;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
            text-transform: uppercase;
            transition: background-color 0.3s, transform 0.3s;
        }

        .btn-get-started:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }

        footer {
            padding: 1rem;
            background-color: #007bff;
            color: #ffffff;
            text-align: center;
        }

        footer p {
            margin: 0;
            font-size: 0.9rem;
        }
    </style>
</head>

<body>
    <header>
        <div class="header-title">MyApp</div>
        <nav>
            @auth
                <a href="{{ route('dashboard') }}">Dashboard</a>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @else
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
            @endauth
        </nav>
    </header>

    <main>
        <div class="welcome-card">
            <h2>Welcome to MyApp</h2>
            <p>We are delighted to have you here. Explore our platform and start your journey with us.</p>
            @guest
                <a href="{{ route('login') }}" class="btn-get-started">Get Started</a>
            @endguest
        </div>
    </main>

    <footer>
        <p>&copy; {{ date('Y') }} My Application. All Rights Reserved.</p>
    </footer>
</body>

</html>
