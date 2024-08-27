<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .hero {
            background: linear-gradient(135deg, #ff66b2, #ff99cc);
            color: #fff;
            padding: 100px 0;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        .hero::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('https://source.unsplash.com/random/1600x900') no-repeat center center;
            background-size: cover;
            opacity: 0.3;
            z-index: -1;
        }
        .hero h1 {
            font-size: 4rem;
            margin-bottom: 20px;
            font-weight: 700;
        }
        .hero p {
            font-size: 1.5rem;
            margin-bottom: 30px;
            font-weight: 300;
        }
        .btn-primary {
            background-color: #ff66b2;
            border: none;
            border-radius: 50px;
            padding: 10px 30px;
            font-size: 1.25rem;
            transition: background-color 0.3s ease;
            color: #fff;
        }
        .btn-primary:hover {
            background-color: #ff3385;
        }
        .features {
            background-color: #f8f9fa;
            padding: 60px 0;
        }
        .features .feature-item {
            text-align: center;
            padding: 20px;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }
        .features .feature-item:hover {
            transform: translateY(-10px);
        }
        .feature-icon {
            font-size: 3rem;
            color: #ff66b2;
            margin-bottom: 20px;
        }
        .feature-title {
            font-size: 1.5rem;
            font-weight: 500;
            margin-bottom: 10px;
        }
        .feature-description {
            font-size: 1rem;
            color: #666;
        }
    </style>
</head>

<body>

    <div class="hero">
        <div class="container">
            <h1>Welcome to the Blog Management System</h1>
            <p>Manage your blog posts efficiently and effectively.</p>
            <a href="{{ route('posts.index') }}" class="btn btn-primary btn-lg">Go to Posts</a>
        </div>
    </div>

    <div class="features">
        <div class="container">
            <div class="row">
                <!-- Example feature item -->
                <div class="col-md-4">
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fa fa-pencil"></i> <!-- Add icon if needed -->
                        </div>
                        <div class="feature-title">Easy Editing</div>
                        <div class="feature-description">Quickly edit your posts with our user-friendly editor.</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fa fa-eye"></i> <!-- Add icon if needed -->
                        </div>
                        <div class="feature-title">Preview Changes</div>
                        <div class="feature-description">See how your posts look before publishing them.</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fa fa-cogs"></i> <!-- Add icon if needed -->
                        </div>
                        <div class="feature-title">Customizable</div>
                        <div class="feature-description">Adjust settings and customize your blog experience.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
