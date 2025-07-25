<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - FinanceBuddy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #1e90ff, #00c853);
            color: #fff;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .card {
            border-radius: 15px;
            overflow: hidden;
            background: #fff;
            color: #333;
        }

        .card-header {
            text-align: center;
            padding: 1rem;
            background: linear-gradient(135deg, #1e90ff, #00c853);
            color: #fff;
        }

        .form-control {
            border-radius: 30px;
            padding: 0.75rem 1.5rem;
        }

        .btn-primary {
            border-radius: 30px;
            padding: 0.75rem 1.5rem;
            background: linear-gradient(135deg, #1e90ff, #00c853);
            border: none;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #00c853, #1e90ff);
        }

        .logo {
            width: 100px;
            height: auto;
            margin-bottom: 1rem;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg">
                    <div class="card-header">
                        <img src="http://localhost/financebuddy/public/assets/logo/logo.webp" alt="FinanceBuddy Logo" class="logo">
                        <h3>Welcome Back to FinanceBuddy</h3>
                    </div>
                    <div class="card-body p-4">
                        <form action="login" method="POST">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
                            </div>

                            <?php
                            // session_start();
                            if (isset($_SESSION['error'])) {
                                echo "<p style='color: red;'>" . $_SESSION['error'] . "</p>";
                            }
                            session_unset();
                            ?>
                            <div class="d-flex justify-content-between mb-3">
                                <div>
                                    <input type="checkbox" id="remember" name="remember">
                                    <label for="remember">Remember me</label>
                                </div>
                                <a href="#" class="text-primary">Forgot password?</a>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>

                        </form>
                        <p class="text-center mt-3">
                            Don't have an account? <a href="register.php" class="text-primary">Register</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>