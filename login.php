<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Login and Sign Up Page" />
    <meta name="author" content="Astronomy Co." />
    <title>Login / Sign Up - Astronomy Co.</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body class="d-flex flex-column">
    <main class="flex-shrink-0">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container px-5">
                <a class="navbar-brand" href="index.php">Astronomy Co.</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="index.php">Index</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="faq.php">FAQ</a></li>
                        <li class="nav-item"><a class="nav-link" href="contact.php">Contact Us</a></li>
                        <li class="nav-item"><a class="nav-link" href="admin.php">Admin</a></li>
                        <?php if (isset($_SESSION['username'])): ?>
                            <li class="nav-item"><a class="nav-link" href="#">Welcome,
                                    <?php echo htmlspecialchars($_SESSION['username']); ?></a></li>
                            <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
                        <?php else: ?>
                            <li class="nav-item"><a class="nav-link" href="login.php">Login / Sign up</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Page content-->
        <section class="py-5">
            <div class="container px-5">
                <div class="row justify-content-center">
                    <!-- Login Form -->
                    <div class="col-lg-5">
                        <div class="bg-light rounded-3 py-5 px-4 px-md-5 mb-5">
                            <div class="text-center mb-4">
                                <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i
                                        class="bi bi-person-fill"></i></div>
                                <h1 class="fw-bolder">Login</h1>
                                <p class="lead fw-normal text-muted mb-0">Welcome back! Please sign in to continue.</p>
                            </div>
                            <form action="login-action.php" method="POST">
                                <!-- Email input-->
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="login-email" type="email" name="email"
                                        placeholder="name@example.com" required />
                                    <label for="login-email">Email address</label>
                                </div>
                                <!-- Password input-->
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="login-password" type="password" name="password"
                                        placeholder="Password" required />
                                    <label for="login-password">Password</label>
                                </div>
                                <!-- Submit button-->
                                <div class="d-grid">
                                    <button class="btn btn-primary btn-lg" type="submit">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Sign Up Form -->
                    <div class="col-lg-5">
                        <div class="bg-light rounded-3 py-5 px-4 px-md-5 mb-5">
                            <div class="text-center mb-4">
                                <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i
                                        class="bi bi-person-plus-fill"></i></div>
                                <h1 class="fw-bolder">Sign Up</h1>
                                <p class="lead fw-normal text-muted mb-0">Don't have an account? Create one!</p>
                            </div>
                            <form action="signup.php" method="POST">
                                <!-- Name input-->
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="signup-name" type="text" name="name"
                                        placeholder="Enter your name..." required />
                                    <label for="signup-name">Full name</label>
                                </div>
                                <!-- Email input-->
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="signup-email" type="email" name="email"
                                        placeholder="name@example.com" required />
                                    <label for="signup-email">Email address</label>
                                </div>
                                <!-- Password input-->
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="signup-password" type="password" name="password"
                                        placeholder="Password" required />
                                    <label for="signup-password">Password</label>
                                </div>
                                <!-- Confirm Password input-->
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="signup-password-confirm" type="password"
                                        name="password_confirm" placeholder="Confirm Password" required />
                                    <label for="signup-password-confirm">Confirm Password</label>
                                </div>
                                <!-- Submit button-->
                                <div class="d-grid">
                                    <button class="btn btn-primary btn-lg" type="submit">Sign Up</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- Footer-->
    <footer class="bg-dark py-4 mt-auto">
        <div class="container px-5">
            <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                <div class="col-auto">
                    <div class="small m-0 text-white">Copyright &copy; Astronomy Co. 2024</div>
                </div>
                <div class="col-auto">
                    <a class="link-light small" href="#!">Privacy</a>
                    <span class="text-white mx-1">&middot;</span>
                    <a class="link-light small" href="#!">Terms</a>
                    <span class="text-white mx-1">&middot;</span>
                    <a class="link-light small" href="contact.php">Contact</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>